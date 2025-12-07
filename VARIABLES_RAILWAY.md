# Variables à configurer sur Railway

## 1. Variables essentielles à ajouter dans Railway Dashboard

### Dans le projet Railway → Variables :

```
APP_NAME=BiblioApp
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:i0fAZZwprEIUgFHrtuogctjoBELAkWJFI0zfD4WyI/8=
APP_URL=https://your-app-name.railway.app

DB_CONNECTION=mysql
SESSION_DRIVER=cookie
QUEUE_CONNECTION=sync
CACHE_STORE=file
LOG_CHANNEL=stack
```

## 2. Variables de base de données

Railway injectera automatiquement via le service MySQL :

-   `DB_HOST` (host MySQL)
-   `DB_PORT` (port MySQL)
-   `DB_USERNAME` (utilisateur)
-   `DB_PASSWORD` (mot de passe)
-   `DB_DATABASE` (nom de la base)

**Alternative** : Si Railway crée `DATABASE_URL`, Laravel va l'utiliser automatiquement.

## 3. Checklist de configuration

-   [ ] App name : BiblioApp
-   [ ] App env : production
-   [ ] App debug : false
-   [ ] App key : `base64:i0fAZZwprEIUgFHrtuogctjoBELAkWJFI0zfD4WyI/8=`
-   [ ] App URL : `https://your-app.railway.app` (remplacer par ton URL Railway)
-   [ ] DB connection : mysql
-   [ ] Session driver : cookie
-   [ ] Queue connection : sync
-   [ ] Cache store : file
-   [ ] MySQL service lié au projet

## 4. Après déploiement

Si tu veux vérifier les variables appliquées :

```bash
railway shell
php artisan env
```

## 5. Notes importantes

-   **APP_URL** doit correspondre à l'URL réelle donnée par Railway
-   **APP_DEBUG=false** obligatoire en production (ne jamais mettre true)
-   **APP_KEY** doit être unique et secret
-   **SESSION_DRIVER=cookie** car la base de données peut ne pas être disponible au démarrage
-   **QUEUE_CONNECTION=sync** pour éviter les jobs background (simple)

## 6. Localisation

Changé de `en` (anglais) à `fr` (français) :

-   APP_LOCALE=fr
-   APP_FALLBACK_LOCALE=fr
-   APP_FAKER_LOCALE=fr_FR
