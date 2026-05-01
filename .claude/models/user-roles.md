# Module: Users & Roles

**Route:** not yet created
**Controller:** not yet created
**Livewire:** not yet created
**Type:** Server-side CRUD (small dataset)

---

## Goal
Admins can create users and assign them roles + shop access.
- `admin` role → can see all data, all shops
- `manager` (or custom) role → can only see their assigned shop(s)
- Dashboard/receipts/orders must respect shop scope based on logged-in user

---

## Models Needed
- `User` — already exists (`App\Models\User`); needs `role` + shop pivot
- `Role` — new model: `id, name (admin|manager|cashier)`, or use a simple string column on User
- `UserShop` — pivot: `user_id, shop_id` (which shops a user has access to)
- `Shop` — for the shop assignment UI

---

## Approach Options

### Option A — Simple (recommended for this project)
Add `role` enum column to `users` table (`admin`, `manager`, `cashier`) + `UserShop` pivot table.
No package needed. Middleware checks `auth()->user()->role`.

### Option B — Spatie Laravel Permission package
Full RBAC with permissions per route. Overkill unless you need fine-grained per-action permissions.

**Recommendation: Option A** — matches the project's "no over-engineering" principle.

---

## Steps

- [ ] **1. Migration: add role to users** — `$table->enum('role', ['admin','manager','cashier'])->default('cashier')`
- [ ] **2. Migration: user_shop pivot** — `user_id, shop_id` — which shops a user can access
- [ ] **3. Update User model** — add `role` cast, `shops()` hasMany pivot relation, helper methods: `isAdmin()`, `canAccessShop(int $shopId)`
- [ ] **4. Middleware: ShopScope** — new middleware that filters data by user's assigned shops when `role != admin`
- [ ] **5. Controller: UserController** — `index()` list users, `create/store` new user with role + shop assignment, `edit/update`
- [ ] **6. View: user list** — table: Name, Email, Role pill, Assigned shops, Last login
- [ ] **7. View: create/edit user form** — name, email, password, role select, shop checkboxes (multi-assign)
- [ ] **8. Apply shop scoping** — DashboardController, ReceiptTable, OrderTable, StockTable all check `auth()->user()->canAccessShop($shopId)` or scope queries automatically
- [ ] **9. Route** — `Route::resource('/user', UserController::class)`
- [ ] **10. Sidebar** — add Users link under System section

---

## Build Notes

### Role pills
- `admin` → `pill-done` (green)
- `manager` → `pill-new` (blue)
- `cashier` → `pill-info` (light blue)

### Shop scoping in Livewire
Add a `scopeToUser(Builder $query): Builder` helper in a trait or base class:
```php
protected function scopeToUser(Builder $query, string $shopColumn = 'shop_id'): Builder
{
    $user = auth()->user();
    if ($user->role === 'admin') return $query;
    $shopIds = $user->shops()->pluck('shop_id');
    return $query->whereIn($shopColumn, $shopIds);
}
```

### Password
Use `bcrypt()` on store/update. Never show in edit form — separate "change password" section.

### User model helpers
```php
public function isAdmin(): bool { return $this->role === 'admin'; }
public function shops(): BelongsToMany { return $this->belongsToMany(Shop::class, 'user_shops'); }
public function canAccessShop(int $shopId): bool {
    return $this->isAdmin() || $this->shops->contains('id', $shopId);
}
```
