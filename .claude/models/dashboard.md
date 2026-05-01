# Module: Dashboard

**Route:** `GET /admin/` → `admin.index`
**Controller:** `app/Http/Controllers/Admin/DashboardController.php`
**View:** `resources/views/admin/sections/dashboard.blade.php`
**Type:** Simple controller (no Livewire — server-side render on every page load)

---

## Models Used
- `Receipt` — revenue, count, cancellations (by `receipt_date`, `status`)
- `ReceiptItem` — top items by revenue
- `ReceiptPayment` — cash/card split (by `type`, `value`)
- `Sell` — (not yet used, reserved for sell velocity)

## Steps

- [x] **1. DashboardController** — `index()` with 8 queries: today/yesterday revenue+count, avg basket, payment split, hourly by `receipt_h`, top 10 items from receipt_items, last 7 days trend
- [x] **2. View** — KPI row (4 cards with ▲/▼ delta), hourly bar chart (hours 6-23), top 10 items table, 7-day trend chart, "today at a glance" panel
- [x] **3. Route** — wired to `DashboardController@index`
- [x] **4. Sidebar** — Dashboard link active on `admin.index`

## Notes
- Uses `receipt_h` column (int 0-23) for hourly chart — more reliable than parsing `dateClose`
- Cancellation rate threshold: > 5% shown in red
- Cash/card split shown as inline progress bar
- All numbers use `number_format($v, 0, '.', ' ')` — space as thousands separator (UZ convention)
- `Asia/Tashkent` timezone for all Carbon::now() calls
