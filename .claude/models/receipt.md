# Module: Receipt

**Route:** `GET /admin/receipt` в†’ `admin.receipt.index`
**Controller:** `app/Http/Controllers/Admin/ReceiptController.php`
**Livewire:** `app/Livewire/Admin/ReceiptTable.php`
**View (section):** `resources/views/admin/sections/receipts.blade.php`
**View (Livewire):** `resources/views/livewire/admin/receipt-table.blade.php`
**Type:** Livewire (high volume, real-time filter + pagination)

---

## Models Used
- `Receipt` вЂ” main table: `id, no, receipt_date, cashier, shift, shop_id, pos_id, status(bool), sub_total, discount, total, fiscal, receipt_h`
- `ReceiptItem` вЂ” line items: `receipt_id, item_id, qty, price, sub_total, discount, total`
- `ReceiptPayment` вЂ” payments: `receipt_id, type(cash|card), value`
- `Item` вЂ” eager loaded via `ReceiptItem::item()`
- `Shop` вЂ” for shop name dropdown

## Steps

- [x] **1. Controller** вЂ” `index()` returns `admin.receipt.index`
- [x] **2. Livewire Component** вЂ” `ReceiptTable` with filters: `date`, `cashier`, `shopId`, `paymentType`, `status`, `perPage`; `openReceipt()` / `closeModal()` for detail modal
- [x] **3. Livewire View** вЂ” KPI row (total, revenue, avg), filter bar, table (No, Date/Time, Cashier, Shop, Items, Total, Payment, Status, Fiscal), detail modal with items + payments
- [x] **4. Route** вЂ” `Route::resource('/receipt', ReceiptController::class)->only(['index','show'])`
- [x] **5. Sidebar** вЂ” Receipts link wired

## Notes
- Status filter: `''` = all, `'1'` = completed, `'0'` = cancelled вЂ” cast to bool in query
- KPI `$summary` clones the filtered query before pagination
- Cashier dropdown loads distinct cashiers for the selected date
- Modal uses `wire:click.self="closeModal"` + `@keydown.escape.window`
- `receipt_h` available for hourly grouping (used in Dashboard)
- Shop column currently shows `shop_id` int вЂ” TODO: eager load shop name

## Potential improvements
- [ ] Eager load `shop` relation в†’ show shop name instead of ID
- [ ] Add export to CSV button
- [ ] Cashier performance sub-page (group by cashier в†’ receipts, revenue, avg basket, cancellation rate)
