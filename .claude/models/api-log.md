# Module: API Log

**Route:** not yet created
**Controller:** not yet created
**Livewire:** not yet created
**View (section):** `resources/views/admin/sections/apilogs.blade.php` вЂ” static placeholder
**Type:** Livewire (high volume, filters + pagination, default today)

---

## Models Used
- `ApiRequestLog` вЂ” auto-logged by `ApiRequestLogger` middleware; columns to check via migration

## Steps

- [ ] **1. Check migration** вЂ” read `database/migrations/*api_request_log*` to confirm columns before building
- [ ] **2. Controller** вЂ” create `ApiLogController` in `app/Http/Controllers/Admin/`; `index()` в†’ return `admin.api-log.index`
- [ ] **3. Livewire Component** вЂ” `ApiLogTable` with filters:
  - `date` (default today)
  - `method` (GET/POST/PUT/DELETE)
  - `statusCode` (200/4xx/5xx grouping)
  - `path` (text search)
  - `perPage` (default 50)
  - Sort: `created_at desc`
- [ ] **4. Livewire View** вЂ” KPI row (total requests, error rate %, unique IPs); table: Method pill, Path, Status (colored), IP, Duration, Time; no detail modal needed
- [ ] **5. Route** вЂ” `Route::get('/api-log', [ApiLogController::class, 'index'])->name('api-log.index')`
- [ ] **6. Sidebar** вЂ” API Logs link currently `href="#"` в†’ wire to route

## Build Notes

### Method pills
- GET в†’ `pill-get` (green)
- POST в†’ `pill-post` (blue)
- PUT в†’ `pill-put` (orange)
- DELETE в†’ `pill-delete` (red)

### Status code coloring
- 2xx в†’ `color:#3b6d11` (green)
- 4xx в†’ `color:#854f0b` (orange)
- 5xx в†’ `color:#a32d2d` (red)

### Error rate KPI
```php
$errorCount = (clone $query)->where('status_code', '>=', 400)->count();
$errorRate  = $total > 0 ? round($errorCount / $total * 100, 1) : 0;
```

### Note on volume
API logs can be very high volume. Always default to `whereDate('created_at', $today)` to avoid loading millions of rows. The `CleanupApiLogs` command purges old logs.
