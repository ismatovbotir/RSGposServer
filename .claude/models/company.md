# Module: Company

**Route:** `Route::resource('/company', CompanyController::class)` вЂ” exists
**Controller:** `app/Http/Controllers/Admin/CompanyController.php`
**View:** need to check/create `resources/views/admin/sections/company.blade.php`
**Type:** Simple server-side (1-3 companies typically)

---

## Models Used
- `Company` вЂ” `id, name, stir(tax id), vat(bool), address, phone` (confirm via migration)
- `Shop` вЂ” `withCount('shops')`

## Steps

- [ ] **1. Check model + migration** вЂ” read `app/Models/Company.php` and its migration to confirm columns
- [ ] **2. Update Controller** вЂ” `index()` в†’ `Company::withCount('shops')->get()`, return `admin.company.index`
- [ ] **3. View** вЂ” simple table: ID, Name, STIR, VAT pill, Shops count; or a detail card layout if only 1 company
- [ ] **4. Sidebar** вЂ” no dedicated sidebar link yet; could be under Settings

## Notes
- Typically only 1 company record exists вЂ” consider a single-record detail view instead of a list
