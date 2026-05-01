# Module: ABC Analysis

**Route:** not yet created
**Controller:** not yet created
**Livewire:** not yet created
**View (section):** `resources/views/admin/sections/abc.blade.php` — static placeholder
**Type:** Server-side (read-only analytics, not real-time)

---

## Models Used
- `Abc` — ABC analysis results snapshot: `item_id, shop_id, class(A|B|C), revenue, revenue_pct, cumulative_pct, qty, abc_date`
- `AbcDaily` — daily breakdown per item
- `Item` — `id, name, category_id`
- `Category` — for filter

## Steps

- [ ] **1. Controller** — create `AbcController` in `app/Http/Controllers/Admin/`; `index()` with:
  - Latest `abc_date` from `Abc` table
  - Summary: count + revenue % per class (A/B/C)
  - Paginated table filtered by class / category
- [ ] **2. View** — extends `admin.layout`; summary cards (A: N items, 80% revenue), paginated table with class pill, revenue, cumulative %, qty; date selector for historical view
- [ ] **3. Route** — `Route::get('/abc', [AbcController::class, 'index'])->name('abc.index')`
- [ ] **4. Sidebar** — ABC Analysis link currently `href="#"` → wire to route

## Build Notes

### Summary cards
```php
$summary = Abc::where('abc_date', $date)->where('shop_id', $shopId)
    ->select('class', DB::raw('COUNT(*) as count'), DB::raw('SUM(revenue_pct) as share'))
    ->groupBy('class')
    ->pluck(null, 'class'); // keyed by 'A','B','C'
```

### Table query
```php
Abc::with('item.category')
    ->where('abc_date', $date)
    ->where('shop_id', $shopId)
    ->when($class, fn($q,$v) => $q->where('class',$v))
    ->when($categoryId, fn($q,$v) => $q->whereHas('item', fn($q) => $q->where('category_id',$v)))
    ->orderBy('cumulative_pct')
    ->paginate(50);
```

### Class pills
- A → `pill-abc-a` (green)
- B → `pill-abc-b` (orange)
- C → `pill-abc-c` (red)

### Analyst insight
Key rule: A-items (80% of revenue) must never be out of stock.
Add "Stock status" column — cross-reference with Stock model.
Show items where class=A AND stock ≤ 0 highlighted in red — these are critical.

### Date selector
Show available dates from `Abc::select('abc_date')->distinct()->orderByDesc('abc_date')->pluck('abc_date')` as a dropdown.
