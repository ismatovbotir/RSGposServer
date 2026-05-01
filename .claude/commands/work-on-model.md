# Work on Admin Module: $ARGUMENTS

You are starting or continuing work on the **$ARGUMENTS** admin module of POS Server.

## Your workflow

1. Read `.claude/models/$ARGUMENTS.md` (lowercase the argument if needed — e.g. "Order" → `order.md`)
2. Print a clear status table showing each step: ✅ Done | 🔲 Todo | ⚠️ Partial
3. Identify the **first incomplete step** and present a concrete plan for it (what files will be created/changed, what queries will run, what the UI will look like)
4. **Wait for the user to confirm** before writing any code ("shall I proceed?" or "go on")
5. After finishing a step, mark it done in the model file and show the updated status table
6. Ask: "Step N done. Move to step N+1?" — don't auto-proceed

## Rules for every step

- Follow all conventions in CLAUDE.md (existing patterns, no new abstractions)
- For large datasets: use Livewire with `WithPagination` + `wire:model.live` filters
- For small/static datasets: simple controller + blade view extending `admin.layout`
- Always extend `admin.layout`, never create standalone HTML
- Use existing CSS classes from `public/assets/admin/css/admin.css` — no inline Bootstrap
- Controllers go in `app/Http/Controllers/Admin/`
- Livewire components go in `app/Livewire/Admin/`
- Blade views go in `resources/views/admin/sections/` (and `livewire/admin/` for Livewire)
- Always read a file before editing it
- Present plan → wait for confirm → then write code

## If model file not found

Say: "No model file found for '$ARGUMENTS'. Available models are listed in `.claude/models/`. Did you mean one of: order, stock, price, sell, abc, api-log, price-checker, shop, company?"
