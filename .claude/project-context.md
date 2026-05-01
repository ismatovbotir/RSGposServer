# Project Context

## Tech Stack
- **Framework:** Laravel 10, PHP 8.1
- **Database:** MySQL — `posservice`
- **Dev env:** Laragon on Windows (`D:\laragon\www\posServer`)
- **Frontend:** Blade + Livewire 3 + custom admin CSS (no Bootstrap in admin panel)
- **Auth:** Session-based (Laravel UI) for web; Bearer token (`APP_TOKEN`) for API

## Admin Panel — Module Status

| Module        | Controller         | Livewire         | View              | Route   | Status     |
|---------------|--------------------|------------------|-------------------|---------|------------|
| Dashboard     | ✅ DashboardController | —            | ✅ sections/dashboard | ✅   | ✅ Done     |
| Receipt       | ✅ ReceiptController   | ✅ ReceiptTable  | ✅ sections/receipts  | ✅   | ✅ Done     |
| Item          | ✅ ItemController      | ✅ ItemTable     | ✅ sections/items     | ✅   | ✅ Done     |
| Category      | ✅ CategoryController  | —            | ✅ sections/categories| ✅   | ✅ Done     |
| Partner       | ✅ PartnerController   | —            | ✅ sections/partners  | ✅   | ✅ Done     |
| Order         | ⚠️ exists (old views)  | 🔲           | 🔲 sections/orders   | ✅   | 🔲 Todo    |
| Stock         | 🔲                 | 🔲               | 🔲                | 🔲   | 🔲 Todo    |
| Price         | ⚠️ empty skeleton  | 🔲               | 🔲                | ✅   | 🔲 Todo    |
| Sell          | 🔲                 | 🔲               | 🔲                | 🔲   | 🔲 Todo    |
| ABC Analysis  | 🔲                 | 🔲               | 🔲                | 🔲   | 🔲 Todo    |
| API Log       | 🔲                 | 🔲               | 🔲                | 🔲   | 🔲 Todo    |
| Price Checker | ⚠️ empty skeleton  | 🔲               | 🔲                | 🔲   | 🔲 Todo    |
| Shop          | ⚠️ has index()     | —            | 🔲 sections/shops    | ✅   | 🔲 Todo    |
| Company       | ⚠️ unknown state   | —            | 🔲                | ✅   | 🔲 Todo    |
| Users & Roles | 🔲                 | —            | 🔲                | 🔲   | 🔲 Todo    |

## How to Work on a Module
Use the slash command: `/work-on-model <module-name>`

Examples:
- `/work-on-model order`
- `/work-on-model stock`
- `/work-on-model user-roles`

This reads `.claude/models/<module>.md`, shows the step checklist, and walks through each step with plan → confirm → build.

## Key Conventions
- Large datasets → Livewire with `WithPagination` + `wire:model.live` filters
- Small datasets → simple controller + blade, extends `admin.layout`
- All views extend `admin.layout` (never standalone HTML)
- CSS: `public/assets/admin/css/admin.css` — use existing classes
- Numbers: `number_format($v, 0, '.', ' ')` — space as thousands separator
- Timezone: `Carbon::now('Asia/Tashkent')` for all date defaults
- Receipts/Orders default to today's date

## Next Priorities (in order)
1. Users & Roles (new — needed for shop scoping across all modules)
2. Order module
3. Stock module
4. Price module
5. Sell (Sales Analytics)
6. ABC Analysis
7. API Log
8. Price Checker
9. Shop view
10. Company view
