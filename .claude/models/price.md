# Module: Price

**Route:** `Route::resource('/price', PriceController::class)` вЂ” exists but controller is empty
**Controller:** `app/Http/Controllers/Admin/PriceController.php` вЂ” empty skeleton
**Livewire:** not yet created
**View (section):** `resources/views/admin/sections/prices.blade.php` вЂ” static placeholder
**Type:** Livewire (large dataset вЂ” all items with prices)

---

## Models Used
- `Price` вЂ” `id, name` вЂ” price type definitions (e.g. id=1 Purchase, id=2 Sell, id=3 Wholesale)
- `PriceData` вЂ” `item_id, price_id, value` вЂ” actual price per item+price_type
- `ShopPrice` вЂ” `item_id, shop_id, price_id, value` вЂ” shop-specific price overrides
- `Item` вЂ” `id, name, category_id, partner_id`
- `Category` вЂ” for filter
- `Partner` вЂ” for filter

## Steps

- [ ] **1. Update Controller** вЂ” `index()` в†’ return `admin.price.index`; also `priceTypes()` method to load `Price::all()` for the type selector
- [ ] **2. Livewire Component** вЂ” `PriceTable` with filters:
  - `priceTypeId` (default = 2 sell price)
  - `categoryId`
  - `partnerId`
  - `search` (item name)
  - `noPrice` (bool вЂ” items with no price set)
  - `perPage`
- [ ] **3. Livewire View** вЂ” table: Item, Category, Partner, Price value (or "вЂ”" with pill-danger if missing), Last updated; price type tab/selector at top
- [ ] **4. Section view** вЂ” `sections/prices.blade.php` в†’ extends layout, embeds Livewire
- [ ] **5. Sidebar** вЂ” Prices link currently `href="#"` в†’ wire to `admin.price.index`

## Build Notes

### Core query
```php
Item::with(['category', 'partner'])
    ->addSelect([
        'price_value' => PriceData::select('value')
            ->whereColumn('item_id', 'items.id')
            ->where('price_id', $this->priceTypeId)
            ->limit(1),
        'price_updated' => PriceData::select('updated_at')
            ->whereColumn('item_id', 'items.id')
            ->where('price_id', $this->priceTypeId)
            ->latest()
            ->limit(1),
    ])
    ->when($this->noPrice, fn($q) => $q->whereDoesntHave('prices', fn($q) => $q->where('price_id', $this->priceTypeId)))
    ->paginate($this->perPage);
```

### Price type tabs
Show `Price::all()` as tab buttons at top. Active tab = `$priceTypeId`. Default = 2.

### Missing price highlight
If `price_value` is null в†’ show `<span class="pill pill-danger">no price</span>` instead of value.

### Analyst insight
Add computed "margin %" column when both purchase (id=1) and sell (id=2) prices exist:
`margin = (sell - purchase) / purchase * 100`
