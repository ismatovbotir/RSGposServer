# Module: Category

**Route:** `GET /admin/category` → `admin.category.index`
**Controller:** `app/Http/Controllers/Admin/CategoryController.php`
**View:** `resources/views/admin/sections/categories.blade.php`
**Type:** Simple server-side (small dataset, no Livewire needed)

---

## Models Used
- `Category` — `id, name, category_id (self-referential parent FK)`
- `Item` — `withCount('items')`

## Steps

- [x] **1. Controller** — `index()` loads `Category::with('parent')->withCount('items')->orderBy('category_id')->orderBy('id')->get()`
- [x] **2. View** — flat table with child rows indented (`padding-left:24px`) when `category_id` is set, shows parent name, item count
- [x] **3. Route** — `Route::resource('/category', CategoryController::class)`
- [x] **4. Sidebar** — Categories link wired

## Notes
- Self-referential: `Category::parent()` → `belongsTo(Category::class, 'category_id')`
- `Category::children()` → `hasMany(Category::class, 'category_id')`
- Flat list approach (not recursive tree) for simplicity — children shown indented inline
