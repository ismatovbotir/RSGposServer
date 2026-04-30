# New Module Scaffold

Create a complete Laravel module for: $ARGUMENTS

Generate in this order:
1. Migration (with up/down, soft deletes if transactional)
2. Eloquent Model (fillable, relationships, casts, SoftDeletes if needed)
3. Form Requests (Store + Update)
4. Resource Controller (index, create, store, show, edit, update, destroy)
5. Policy (viewAny, view, create, update, delete)
6. Routes (resource route in web.php or api.php)
7. Basic Blade views (index, create/edit form, show) OR API Resource class

Follow all conventions in CLAUDE.md. Show Artisan commands used.
