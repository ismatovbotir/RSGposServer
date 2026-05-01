# Module: Price Checker

**Route:** not yet created (separate from `PriceCheckerController` which is a public API)
**Controller:** `app/Http/Controllers/Admin/PriceCheckerController.php` — empty skeleton
**Livewire:** not yet created
**View (section):** `resources/views/admin/sections/pricechecker.blade.php` — static placeholder
**Type:** Server-side (device list) + Livewire (scan history/stats)

---

## Models Used
- `PriceChecker` — device config: `id(uuid?), name, shop_id, theme_id, sleep` (and possibly `last_seen`)
- `PriceChekerStatistic` — lookup history: `price_checker_id, item_id(nullable), barcode, found(bool), created_at`
- `Shop` — for shop name
- `Theme` — for theme name

## Steps

- [ ] **1. Check models** — read `app/Models/PriceChecker.php` and `app/Models/PriceChekerStatistic.php` to confirm columns and relations
- [ ] **2. Update Controller** — `index()` loads devices with shop + scan count today; returns view with `$devices` and `$statsByDevice`
- [ ] **3. View (device list)** — extends `admin.layout`; KPI row (total devices, scans today, not-found rate %); table: Name, Shop, Theme, Sleep(s), Scans today, Last seen
- [ ] **4. Livewire Component** — `PriceCheckerStats` — scan history feed for a selected device with filters: device, date, found/not-found toggle
- [ ] **5. Section view** — `sections/pricechecker.blade.php` → extends layout, device table + Livewire stats
- [ ] **6. Route** — `Route::get('/price-checker', [PriceCheckerController::class, 'index'])->name('price-checker.index')`
- [ ] **7. Sidebar** — Price Checker link currently `href="#"` → wire to route

## Build Notes

### Note on naming
Model is `PriceChecker` but statistic model is `PriceChekerStatistic` (typo: missing 'c'). Use as-is.

### Not-found rate
```php
$totalScans  = PriceChekerStatistic::whereDate('created_at', today())->count();
$notFound    = PriceChekerStatistic::whereDate('created_at', today())->where('found', false)->count();
$notFoundRate = $totalScans > 0 ? round($notFound / $totalScans * 100, 1) : 0;
```

### Analyst insight
Items frequently scanned but not found = candidates for adding to catalog or fixing barcodes.
Show "Top 10 not-found barcodes today" as a separate small table.
