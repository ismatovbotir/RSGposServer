# Module: Stock

**Route:** not yet created
**Controller:** not yet created
**Livewire:** not yet created
**View (section):** `resources/views/admin/sections/stock.blade.php` вЂ” static placeholder only
**Type:** Livewire (potentially large, filters + sort)

---

## Models Used
- `Stock` вЂ” `id, item_id, shop_id, qty, stock_date`; latest record per item+shop = current stock
- `StockData` вЂ” stock movement history (if exists)
- `Item` вЂ” `id, name, category_id`
- `Category` вЂ” for filter dropdown
- `Shop` вЂ” for filter dropdown

## Steps

- [ ] **1. Controller** вЂ” create `StockController` in `app/Http/Controllers/Admin/`; `index()` в†’ return `admin.stock.index`
- [ ] **2. Livewire Component** вЂ” `StockTable` with filters:
  - `shopId` (default = `env('SHOP',1)`)
  - `categoryId`
  - `alertOnly` (bool toggle вЂ” show only stock в‰¤ 0)
  - `perPage`
  - Sort: `qty asc` by default (worst stock first)
- [ ] **3. Livewire View** вЂ” KPI row (total items tracked, low stock count в‰¤5, out of stock count); table: Item, Category, Qty (red if в‰¤0, orange if в‰¤5), Stock date, Shop; stock bar visual
- [ ] **4. Section view** вЂ” `sections/stock.blade.php` в†’ extends layout, `@livewire('admin.stock-table')`
- [ ] **5. Route** вЂ” add `Route::get('/stock', [StockController::class, 'index'])->name('stock.index')`
- [ ] **6. Sidebar** вЂ” Stock link currently `href="#"` в†’ wire to route

## Build Notes

### Core query вЂ” latest stock per item
```php
Stock::with(['item.category'])
    ->whereIn('id', function($sub) {
        $sub->selectRaw('MAX(id)')
            ->from('stocks')
            ->where('shop_id', $this->shopId)
            ->groupBy('item_id');
    })
    ->when($this->categoryId, fn($q,$v) => $q->whereHas('item', fn($q) => $q->where('category_id',$v)))
    ->when($this->alertOnly, fn($q) => $q->where('qty', '<=', 0))
    ->orderBy('qty', 'asc')
    ->paginate($this->perPage);
```

### KPI counts
```php
$baseStock = Stock::whereIn('id', /* same MAX(id) subquery */)->where('shop_id', $shopId);
$lowCount  = (clone $baseStock)->where('qty', '<=', 5)->where('qty', '>', 0)->count();
$outCount  = (clone $baseStock)->where('qty', '<=', 0)->count();
```

### Stock bar
Relative bar: `width = min(100, qty / maxQty * 100)%` вЂ” use `stock-bar-ok` / `stock-bar-low` CSS classes.

### Analyst insight
"Days of supply" = `qty Г· avg_daily_sells` вЂ” can be added using `Sell` model:
```php
Sell::where('item_id', $item_id)->where('shop_id', $shop_id)
    ->where('abc_date', '>=', now()->subDays(30)->toDateString())
    ->avg('qty')
```
Add as optional column with tooltip.
