# Module: Shop

**Route:** `Route::resource('/shop', ShopController::class)` вЂ” exists
**Controller:** `app/Http/Controllers/Admin/ShopController.php` вЂ” has `index()` pointing to old views
**View (section):** need to create `resources/views/admin/sections/shops.blade.php`
**Type:** Simple server-side (few shops, no Livewire needed)

---

## Models Used
- `Shop` вЂ” `id, name, company_id, price_id, area`
- `Company` вЂ” `id, name`
- `Price` вЂ” price type assigned to shop
- `PriceChecker` вЂ” `withCount('checkers')`
- `Pos` вЂ” POS terminals per shop

## Steps

- [ ] **1. Update Controller** вЂ” `index()` в†’ load with relations, return `admin.shop.index`
- [ ] **2. View** вЂ” extends `admin.layout`; table: ID, Name (with "active" pill if `env('SHOP')==id`), Company, Price type, Area, Pos count, Checker count
- [ ] **3. Route** вЂ” already exists
- [ ] **4. Sidebar** вЂ” Shops link already wired to `admin.shop.index`

## Build Notes

### Active shop highlight
```php
$activeShopId = (int) env('SHOP', 1);
// In blade: @if($shop->id === $activeShopId) <span class="pill pill-new">active</span> @endif
```

### Controller query
```php
Shop::with(['company', 'price'])
    ->withCount(['checkers', 'pos'])
    ->orderBy('id')
    ->get()
```
(Confirm `pos` relation name on Shop model before building)
