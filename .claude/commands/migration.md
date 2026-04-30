# Create Migration

Create a Laravel migration for: $ARGUMENTS

Include:
- Proper table name (snake_case, plural)
- All columns with correct types and nullable/default settings
- Foreign key constraints with cascading rules
- Timestamps (created_at, updated_at)
- Soft delete column if this is a transactional/important table
- Indexes on columns used in WHERE/JOIN/ORDER BY
- Complete down() method that reverses up()

Show the Artisan command to generate it, then the full migration file.
