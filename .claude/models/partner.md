# Module: Partner

**Route:** `GET /admin/partner` → `admin.partner.index`
**Controller:** `app/Http/Controllers/Admin/PartnerController.php`
**View:** `resources/views/admin/sections/partners.blade.php`
**Type:** Simple server-side (small dataset)

---

## Models Used
- `Partner` — `id, name, stir, vat(bool)`
- `Item` — `withCount('items')`

## Steps

- [x] **1. Controller** — `index()` loads `Partner::withCount('items')->orderBy('name')->paginate(50)`
- [x] **2. View** — table: ID, Name, STIR, VAT pill, Items count; pagination links
- [x] **3. Route** — `Route::resource('/partner', PartnerController::class)`
- [x] **4. Sidebar** — Partners link wired

## Notes
- VAT shown as `pill-done` when true, `td-muted —` when false
