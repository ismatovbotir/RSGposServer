# CLAUDE.md — POS Server

## Project Overview

**POS Server** is a Laravel 10 (PHP 8.1) fullstack application serving as the backend for a retail Point-of-Sale ecosystem. It exposes REST APIs consumed by:
- A **mobile app** (cashier/POS terminals)
- A **cash desk** (local terminal)
- **Wolt** food delivery platform (webhook + OAuth integration)

**Dev environment:** Laragon on Windows  
**Project root:** `D:\laragon\www\posServer`  
**Database:** MySQL — `posservice`  
**App URL:** `http://localhost`

---

## Tech Stack

| Layer | Technology |
|---|---|
| Framework | Laravel 10 |
| PHP | ^8.1 |
| Database | MySQL / MariaDB (`posservice`) |
| Auth (API) | Custom Bearer token (`APP_TOKEN` env) via `VerifyXToken` middleware |
| Auth (web) | Laravel UI (session-based) |
| Frontend | Blade + Livewire 3 + DashLite UI kit |
| API Docs | l5-swagger (OpenAPI) |
| HTTP Client | GuzzleHTTP (Wolt API calls) |
| QR Codes | simplesoftwareio/simple-qrcode |

---

## API Architecture

Routes are split into **4 groups** in `routes/api.php`:

```
local.api middleware    → /api/*                (local network only, no token)
x.token middleware      → /api/mobApp/*         (mobile POS terminals, Bearer token)
local.api middleware    → /api/cashDesk/*       (local cash desk)
x.token middleware      → /api/globalCashDesk/* (remote cash desk, Bearer token)
```

### Custom Middleware
- **`LocalOnly`** (`local.api`) — restricts access to local network requests only
- **`VerifyXToken`** (`x.token`) — validates `Authorization: Bearer {APP_TOKEN}` header against `config('services.api.token')`
- **`ApiRequestLogger`** — logs all API requests to `api_request_logs` table

---

## Controllers

### `app/Http/Controllers/Api/` — REST API
| Controller | Purpose |
|---|---|
| `OrderController` | Orders from mobile POS (UUID-based, Wolt orders) |
| `ReceiptController` | Cash desk receipts |
| `ItemController` | Product catalog + mobile sync |
| `CategoryController` | Product categories |
| `PriceController` | Price management + bulk sync |
| `PriceDataController` | Price data per shop/price-type |
| `StockController` | Stock levels |
| `SellController` | Sales recording |
| `BarcodeController` | Barcode lookup |
| `PartnerController` | Suppliers/partners |
| `ShopController` | Shop config |
| `FiscalController` | Fiscal receipt integration |
| `WoltController` | Wolt webhook + OAuth |

### `app/Http/Controllers/Admin/` — Web Admin Panel
CategoryController, ClientController, CompanyController, ItemController, OrderController, PartnerController, PriceCheckerController, PriceController, SettingController, ShopController, WoltController

### Livewire Components (`app/Livewire/`)
- `Order/Index` — live order dashboard
- `PriceChecker/Show` — price lookup terminal UI
- `Wolt/Token` — Wolt OAuth token management

---

## Domain Models

### Core POS
| Model | Key Notes |
|---|---|
| `Item` | Products; has barcodes, prices, stocks, sells. Uses `currentStock()` per shop via `SHOP` env |
| `Category` | Product categories |
| `Barcode` | Multiple barcodes per item |
| `Partner` | Suppliers/partners |
| `Price` | Price types (e.g. sell=2, wholesale, etc.) |
| `PriceData` | Actual price value per item+price_type |
| `ShopPrice` | Price overrides per shop |
| `Stock` | Stock snapshot per shop+date |
| `StockData` | Stock movement data |
| `Shop` | Shops/branches |
| `Department` | Departments within shops |
| `DepartmentItem` | Items assigned to departments |

### Orders & Receipts
| Model | Key Notes |
|---|---|
| `Order` | Uses `HasUuids`; has items, statuses, fiscals |
| `OrderItem` | Line items (order_qty, delivery_qty, order_price, delivery_price) |
| `OrderStatus` | Status log (new → fiscal → completed); `lastStatus()` via `latestOfMany()` |
| `Fiscal` | Fiscal receipt record linked to order |
| `Receipt` | Cash desk receipt |
| `ReceiptItem` | Receipt line items |
| `ReceiptPayment` | Payment records per receipt |
| `Sell` | Individual sale record |
| `Pos` | POS terminal config |

### Wolt Integration
| Model | Key Notes |
|---|---|
| `Wolt` | Wolt venue/menu config |
| `WoltToken` | OAuth access/refresh tokens |
| `WoltUser` | Wolt user mapping |
| `WoltWebhook` | Incoming webhook log |

### BI / Analytics
| Model | Key Notes |
|---|---|
| `Abc` | ABC analysis results |
| `AbcDaily` | Daily ABC breakdown |
| `PriceChecker` | Price checker device config |
| `PriceChekerStatistic` | Price lookup statistics |
| `ApiRequestLog` | API request log (auto-cleaned via `CleanupApiLogs` command) |

### Other
`Company`, `User`, `Theme`, `ThemeParameter`, `Mark`, `Attribute`

---

## Artisan Commands (`app/Console/Commands/`)

| Command class | Purpose |
|---|---|
| `CleanupApiLogs` | Purges old API request logs |
| `Fiscal` / `FiscalOpen` / `FiscalClose` | Fiscal shift management |
| `PriceCheck` | Sync/check prices |
| `Wolt` | General Wolt sync |
| `WoltOrders` | Pull Wolt orders |
| `WoltPrice` | Push prices to Wolt |
| `WoltStock` | Push stock to Wolt |
| `WoltToken` / `WoltTokenRefresh` | Manage Wolt OAuth tokens |

---

## API Resources (`app/Http/Resources/`)

`OrderResource`, `OrderItemResource`, `OrderStatusResource`, `OrderFiscalResource`, `ItemResource`, `ItemArrResource`, `CategoryResource`, `BarcodeResource`, `PriceResource`, `StockResource`

---

## Current Code Patterns (as-is)

These reflect how the project is actually written — follow these patterns when adding new code:

- **Models use `$guarded = []`** — all fields mass-assignable. Be careful with sensitive fields.
- **Validation in controllers** via `Validator::make()` — no Form Request classes yet.
- **No Service layer** — business logic is inline in controllers.
- **`Order` uses `HasUuids`** — IDs are UUIDs, not integers.
- **`SHOP` env variable** is used in model methods (`Item::currentStock()`) to scope queries to the current shop.
- **Swagger annotations** from l5-swagger are expected on API controllers.
- **Price type `id=2`** is the sell price (used in `Item::sellPrice()`).

---

## Improvement Areas (suggest when relevant)

When reviewing or writing new code, gently suggest these improvements if appropriate:
- Move validation to **Form Request** classes
- Use `$fillable` instead of `$guarded = []` on sensitive models
- Extract complex controller logic into **Service** classes
- Replace `env()` calls inside models with `config()` calls

---

## Environment Variables (key ones)

```
APP_NAME=Laravel
APP_ENV=local
DB_DATABASE=posservice
DB_USERNAME=root
SHOP=1                          # Active shop ID, used in model queries
APP_TOKEN=xF38j92x81Sdf93...   # Bearer token for x.token middleware
WOLT_SERVICE_NAME=AndalusWolt
WOLT_CLIENT_SECRET=...
WOLT_ORDER_EVENTS=created,production,ready,delivered,canceled
```

---

## Common Artisan Commands

```bash
php artisan migrate                   # Run pending migrations
php artisan migrate:rollback          # Rollback last batch
php artisan db:seed                   # Run DatabaseSeeder
php artisan make:model Foo -m         # Model + migration
php artisan make:controller Api/FooController --resource
php artisan route:list --path=api     # List API routes
php artisan tinker                    # Interactive REPL
php artisan l5-swagger:generate       # Regenerate Swagger docs
```

---

## Security Notes

- API routes without `x.token` rely on `local.api` (network-level restriction) — not suitable for public exposure.
- `$guarded = []` on all models means any field can be mass-assigned — watch for user-controlled input.
- `.env` contains real secrets (APP_TOKEN, WOLT keys) — never commit to version control.
- `VerifyXToken` checks `Authorization: Bearer` header against `config('services.api.token')`.

---

## Developer Notes

- Developer is an experienced **Laravel developer**, beginner in C#.
- When explaining patterns, briefly note why it's the Laravel way.
- Keep code practical and copy-pasteable.
- When in doubt about existing structure, ask before assuming.
- Prefer explicit readable code over clever one-liners.
