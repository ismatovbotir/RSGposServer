# Module: Sell (Sales Analytics)

**Route:** not yet created
**Controller:** not yet created
**Livewire:** not yet created
**View (section):** `resources/views/admin/sections/sells.blade.php` вЂ” static placeholder
**Type:** Livewire (analytics table) + server-side KPI cards

---

## Models Used
- `Sell` вЂ” `item_id, shop_id, qty, margin, total, abc_date`; no `timestamps`; unique on `(shop_id, item_id, abc_date)`
- `Item` вЂ” `id, name, category_id`
- `Category` вЂ” for filter and grouping
- `Shop` вЂ” for shop filter

## Steps

- [ ] **1. Controller** вЂ” create `SellController` in `app/Http/Controllers/Admin/`; `index()` в†’ return `admin.sell.index`
- [ ] **2. Livewire Component** вЂ” `SellTable` with filters:
  - `dateFrom` / `dateTo` (date range, default last 30 days)
  - `shopId`
  - `categoryId`
  - `groupBy` вЂ” toggle: `item` (default) or `category`
  - `perPage`
  - Sort: `total desc` by default
- [ ] **3. Livewire View** вЂ” KPI row (period revenue, units sold, unique items, top category); table: Item/Category, Qty sold, Revenue, Margin, Days with sales; bar showing revenue share vs total
- [ ] **4. Section view** вЂ” `sections/sells.blade.php` в†’ extends layout, embeds Livewire
- [ ] **5. Route** вЂ” `Route::get('/sell', [SellController::class, 'index'])->name('sell.index')`
- [ ] **6. Sidebar** вЂ” Sells link currently `href="#"` в†’ wire to route

## Build Notes

### Core query (grouped by item)
```php
Sell::with('item.category')
    ->select('item_id', DB::raw('SUM(qty) as total_qty'), DB::raw('SUM(total) as total_revenue'), DB::raw('SUM(margin) as total_margin'), DB::raw('COUNT(DISTINCT abc_date) as days_sold'))
    ->whereBetween('abc_date', [$this->dateFrom, $this->dateTo])
    ->when($this->shopId, fn($q,$v) => $q->where('shop_id',$v))
    ->when($this->categoryId, fn($q,$v) => $q->whereHas('item', fn($q) => $q->where('category_id',$v)))
    ->groupBy('item_id')
    ->orderByDesc('total_revenue')
    ->paginate($this->perPage);
```

### Group by category
```php
Sell::join('items','sells.item_id','=','items.id')
    ->join('categories','items.category_id','=','categories.id')
    ->select('categories.id','categories.name', DB::raw('SUM(sells.qty) as total_qty'), DB::raw('SUM(sells.total) as total_revenue'))
    ->groupBy('categories.id','categories.name')
    ->orderByDesc('total_revenue')
```

### Sell velocity (days of supply)
`avg_daily_qty = total_qty / days_in_range` вЂ” compare vs current stock for days-of-supply KPI.

### Analyst note
`abc_date` is the sale date. `margin` = sell price - cost. Both stored per day per item per shop.
Revenue share bar: `width = item_revenue / period_total_revenue * 100%`
