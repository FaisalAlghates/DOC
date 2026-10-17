#!/bin/sh
# Boots the app: a fresh key, a seeded SQLite database with a demo user, then the web server on $PORT (10000 by default).
set -e
cd /app

export APP_KEY="${APP_KEY:-base64:$(head -c 32 /dev/urandom | base64)}"
export APP_URL="${APP_URL:-${RENDER_EXTERNAL_URL:-http://localhost:${PORT:-10000}}}"

touch "$DB_DATABASE"
php artisan migrate --force
if [ ! -f storage/.seeded ]; then
  php artisan db:seed --force || true
  php artisan tinker --execute="App\Models\User::firstOrCreate(['email' => 'demo@example.com'], ['name' => 'Demo', 'password' => 'demo-pass-123', 'role' => 'admin']);"
  touch storage/.seeded
fi
php artisan storage:link >/dev/null 2>&1 || true

exec php artisan serve --host=0.0.0.0 --port="${PORT:-10000}"
