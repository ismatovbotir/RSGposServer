# Module: Item

**Route:** `GET /admin/item` в†’ `admin.item.index`
**Controller:** `app/Http/Controllers/Admin/ItemController.php`
**Livewire:** `app/Livewire/Admin/ItemTable.php`
**View (section):** `resources/views/admin/sections/items.blade.php`
**View (Livewire):** `resources/views/livewire/admin/item-table.blade.php`
**Type:** Livewire (20kвЂ“100k records, per-column filters + sort + pagination)

---

## Models Used
- `Item` вЂ” `id, name, category_id, partner_id`
- `Category` вЂ” `id, name`
- `Partner` вЂ” `id, name`
- `Barcode` вЂ” `item_id, barcode` (hasMany)
- `PriceData` вЂ” `item_id, price_id, value` (sell price = price_id=2)
- `Stock` вЂ” `item_id, shop_id, qty, stock_date` (latest per shop)

## Steps

- [x] **1. Controller** вЂ” `index()` returns `admin.item.index`
- [x] **2. Livewire Component** вЂ” `ItemTable` with:
  - Per-column filters: `id, name, category, partner, barcode` (click header в†’ inline input)
  - Sort: `id, name, sell_price (subquery), barcodes_count, stock (subquery)`
  - `perPage`: 20/50/100
- [x] **3. Livewire View** вЂ” filterable/sortable headers, table with pill for category, barcode count, sell price, stock qty
- [x] **4. Route** вЂ” `Route::resource('/item', ItemController::class)`
- [x] **5. Sidebar** вЂ” Items link wired

## Notes
- Sell price uses subquery: `PriceData::select('value')->whereColumn('item_id','items.id')->where('price_id',2)->limit(1)`
- Stock uses subquery: `Stock::select('qty')->whereColumn('item_id','items.id')->where('shop_id', env('SHOP',1))->latest('stock_date')->limit(1)`
- `toggleFilter(string $column)` opens/closes inline filter input in header
- `sort(string $column)` toggles asc/desc
- barcode filter uses `whereHas('barcodes', fn($q) => $q->where('barcode', 'like', "%{$v}%"))`
