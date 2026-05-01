# Module: Order

**Route:** `GET /admin/order` в†’ `admin.order.index`
**Controller:** `app/Http/Controllers/Admin/OrderController.php` вЂ” exists but points to old views
**Livewire:** not yet created
**View (section):** `resources/views/admin/sections/orders.blade.php` вЂ” static placeholder only
**Type:** Livewire (high volume, filters + pagination + detail modal)

---

## Models Used
- `Order` вЂ” uses `HasUuids`; columns: `id(uuid), no, shop_id, status (via lastStatus), created_at`
- `OrderItem` вЂ” `order_id(uuid), item_id, order_qty, delivery_qty, order_price, delivery_price`
- `OrderStatus` вЂ” `order_id, status(string), created_at`; `lastStatus()` via `latestOfMany()`
- `Fiscal` вЂ” `order_id, url, type, total, created_at`
- `Item` вЂ” eager loaded via `OrderItem::item()`
- `Shop` вЂ” for shop name

## Steps

- [ ] **1. Update Controller** вЂ” `index()` в†’ return `admin.order.index`; keep `show()` or remove (modal handles detail)
- [ ] **2. Livewire Component** вЂ” `OrderTable` with filters:
  - `date` (default today, `Asia/Tashkent`)
  - `shopId` (select, all shops)
  - `status` (select: all / new / fiscal / completed / cancelled)
  - `perPage` (20/50/100)
  - Sort: `created_at` desc by default
  - `openOrder(string $uuid)` / `closeModal()`
- [ ] **3. Livewire View** вЂ” KPI row (count, revenue, completion rate); table columns: No, Date/Time, Shop, Items, Total, Status, Fiscal; detail modal with: items table (name, qty, price, total) + status timeline + fiscal URL link
- [ ] **4. Update section view** вЂ” `sections/orders.blade.php` в†’ extends `admin.layout`, embeds `@livewire('admin.order-table')`
- [ ] **5. Route** вЂ” already exists: `Route::resource('/order', OrderController::class)`; only `index` needed
- [ ] **6. Sidebar** вЂ” Orders link already wired to `admin.order.index`

## Build Notes

### KPI row
```php
$completedToday = (clone $query)->whereHas('lastStatus', fn($q) => $q->where('status', 'completed'))->count();
$completionRate = $totalToday > 0 ? round($completedToday / $totalToday * 100) : 0;
```

### Status filter
`Order` doesn't have a direct `status` column вЂ” status is in `OrderStatus`. Filter via:
```php
->when($this->status, fn($q, $v) => $q->whereHas('lastStatus', fn($q) => $q->where('status', $v)))
```

### Status pill mapping
- `new` в†’ `pill-new`
- `fiscal` в†’ `pill-fiscal`
- `completed` в†’ `pill-done`
- `cancelled` в†’ `pill-cancelled`

### Order UUID
Order IDs are UUIDs. `openOrder(string $uuid)` stores `$this->selectedId` as string.
```php
public ?string $selectedId = null;
```

### Fiscal URL
`$order->fiscals->first()?->url` вЂ” link opens in new tab.

### Status timeline in modal
Loop `$order->statuses()->orderBy('created_at')->get()` вЂ” show each status with timestamp as a vertical timeline.
