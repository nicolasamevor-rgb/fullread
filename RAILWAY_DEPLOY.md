# Railway Deployment Guide pour BiblioApp

## Prérequis

1. Compte Railway.app (https://railway.app)
2. Git configuré avec l'accès au repo
3. Dépendances Laravel vérifiées

## Étapes de déploiement

### 1. Préparation locale

```bash
# Vérifier que tout est en ordre
cd BiblioApp
composer install
npm install
npm run build
php artisan config:cache
php artisan route:cache
```

### 2. Vérifier/Créer les fichiers essentiels

-   ✅ `Procfile` — déjà créé
-   ✅ `composer.json` — présent
-   ✅ `.env.example` — présent

### 3. Configuration Railway

#### Via interface web (simple)

1. Se connecter à https://railway.app
2. Créer un nouveau projet ("New Project")
3. Connecter le repo GitHub (nicolasamevor-rgb/fullread)
4. Railway détectera Laravel automatiquement
5. Ajouter les services :
    - **MySQL database** : cliquer "Add service" → MySQL
    - **Vérifier les variables d'environnement** : Rails les injectera automatiquement

#### Via CLI (avancé)

```bash
npm install -g @railway/cli
railway login
railway init
railway add
railway up
```

### 4. Variables d'environnement Railway

Railway va injecter automatiquement (vérifier dans le Dashboard) :

-   `DATABASE_URL` (MySQL) → À convertir
-   `PORT` (pour le serveur)

**À ajouter manuellement dans Railway → Project → Variables** :

```
APP_NAME=BiblioApp
APP_ENV=production
APP_DEBUG=false
APP_KEY=your-generated-key
DB_CONNECTION=mysql
QUEUE_CONNECTION=sync
SESSION_DRIVER=cookie
LOG_CHANNEL=stack
```

**Générer APP_KEY localement** :

```bash
php artisan key:generate --show
```

Puis copier la valeur dans Railway Dashboard.

### 5. Déploiement

1. **Git push déclenche auto le deploy** :
    ```bash
    git push origin main
    ```
2. Railway regardera `Procfile` et `composer.json` → détecte Laravel
3. Lance automatiquement :
    - `composer install`
    - `npm install && npm run build`
    - Migration (`php artisan migrate --force`)

### 6. Vérifier les logs

-   Dashboard Railway → View Logs
-   Ou CLI : `railway logs`

## Erreurs courantes et solutions

### ❌ "SQLSTATE[28000]" (DB auth failed)

→ Variables DB_HOST, DB_USER, DB_PASSWORD mal mappées
→ Vérifier que Railway a bien lié MySQL au projet

### ❌ "Key already exists in cache" (APP_KEY manquante)

→ Ajouter `APP_KEY=base64:...` dans Railway Variables

### ❌ "npm: command not found"

→ Railway doit détecter Node.js ; ajouter `package.json` à la racine (✅ présent)

### ❌ Public folder not found

→ Procfile mauvais format ou chemin erroné
→ Vérifier : `web: vendor/bin/heroku-php-apache2 public/`

### ❌ Migrations échouent

→ En production, utiliser `php artisan migrate --force`
→ Vérifier que DB_HOST/DB_PORT sont corrects

## Checklist avant déploiement

-   [ ] Git push origin main effectué
-   [ ] Procfile présent et valide
-   [ ] composer.json/package.json présents
-   [ ] .env.example rempli correctement
-   [ ] APP_KEY généré et ajouté à Railway
-   [ ] MySQL additionné dans Railway
-   [ ] Variables DB mappées (DATABASE_URL)
-   [ ] Logs consultés pour erreurs

## Après déploiement

1. **Test de l'app**

    ```bash
    # Accéder via l'URL Railroad : https://your-app.railway.app
    ```

2. **Nettoyage cache**

    ```bash
    railway shell
    php artisan cache:clear
    php artisan config:clear
    ```

3. **Vérifier les migrations**
    ```bash
    railway shell
    php artisan migrate:status
    ```

## Support Railway

-   Docs officiales : https://docs.railway.app
-   Discord : https://railway.app/chat
