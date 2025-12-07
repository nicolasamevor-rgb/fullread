#!/bin/bash

# Attendre que MySQL soit prêt (max 30 secondes)
echo "Waiting for MySQL to be ready..."
for i in {1..30}; do
  if php artisan migrate:status > /dev/null 2>&1; then
    echo "MySQL is ready!"
    break
  fi
  echo "Waiting... ($i/30)"
  sleep 1
done

# Lancer les migrations (si pas déjà fait)
php artisan migrate --force --seed 2>/dev/null || true

# Démarrer le serveur PHP
php -S 0.0.0.0:${PORT:-8000} -t public
