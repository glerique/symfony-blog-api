# Symfony Blog API avec Authentification

Une API de blog simple construite avec Symfony, implémentant l'architecture hexagonale (Ports & Adapters) avec support Docker et système d'authentification JWT complet.

## 🚀 Fonctionnalités

### Authentification
- ✅ Inscription des utilisateurs avec validation
- ✅ Connexion avec JWT
- ✅ Gestion des profils utilisateurs
- ✅ Changement de mot de passe sécurisé
- ✅ Désactivation de compte
- ✅ Vérification de tokens JWT
- ✅ Protection des endpoints avec sécurité Symfony

### Architecture
- Architecture hexagonale (Ports & Adapters)
- Séparation claire des responsabilités
- Services métier découplés
- Tests unitaires complets
- Support Docker

## 📋 Prérequis

- PHP 8.4+
- Composer
- PostgreSQL 16+
- Redis (optionnel)
- Docker & Docker Compose (optionnel)

## 🛠️ Installation rapide

1. **Clonez le repository :**
```bash
git clone <repository-url>
cd symfony-blog-api
```

2. **Installation automatique :**
```bash
./setup-auth.sh
```

3. **Ou installation manuelle :**
```bash
# Installation des dépendances
composer install

# Copie du fichier d'environnement
cp .env.local.example .env

# Configuration de votre base de données dans .env
# Puis :
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate

# Démarrer le serveur
symfony serve
# ou
php -S localhost:8000 -t public
```

## 🔐 API d'Authentification

### Endpoints disponibles :

| Méthode | Endpoint | Description | Auth requis |
|---------|----------|-------------|-------------|
| `GET` | `/api/health` | Vérification de santé | ❌ |
| `POST` | `/api/auth/register` | Inscription | ❌ |
| `POST` | `/api/auth/login` | Connexion | ❌ |
| `GET` | `/api/auth/profile` | Profil utilisateur | ✅ |
| `PUT` | `/api/auth/profile` | Mise à jour profil | ✅ |
| `PUT` | `/api/auth/change-password` | Changement mot de passe | ✅ |
| `PUT` | `/api/auth/deactivate` | Désactivation compte | ✅ |
| `GET` | `/api/auth/verify` | Vérification token | ✅ |

### Exemple d'utilisation :

```bash
# Inscription
curl -X POST http://localhost:8000/api/auth/register \
  -H "Content-Type: application/json" \
  -d '{
    "email": "user@example.com",
    "password": "password123",
    "firstName": "John",
    "lastName": "Doe"
  }'

# Connexion
curl -X POST http://localhost:8000/api/auth/login \
  -H "Content-Type: application/json" \
  -d '{
    "email": "user@example.com",
    "password": "password123"
  }'

# Accès au profil (avec token reçu)
curl -X GET http://localhost:8000/api/auth/profile \
  -H "Authorization: Bearer YOUR_JWT_TOKEN"
```

## 📖 Documentation

- **[Documentation complète de l'API](AUTH_API_DOCUMENTATION.md)** - Guide détaillé avec tous les endpoints
- **[Collection Postman](postman-collection.json)** - Importez dans Postman pour tester facilement

## 🐳 Docker

```bash
# Démarrer avec Docker
docker-compose up -d

# Exécuter les migrations
docker-compose exec app php bin/console doctrine:migrations:migrate
```

## 🧪 Tests

```bash
# Tous les tests
composer test

# Tests avec couverture
composer test -- --coverage-html coverage

# Analyse statique
composer phpstan

# Linting
composer lint
```

## 🏗️ Architecture du projet

```
src/
├── Controller/          # Contrôleurs REST
│   ├── ApiController.php
│   └── AuthController.php
├── Entity/             # Entités Doctrine
│   └── User.php
├── Repository/         # Repositories Doctrine
│   └── UserRepository.php
├── Service/           # Services métier
│   └── AuthService.php
└── Kernel.php

config/
├── packages/          # Configuration Symfony
└── jwt/              # Clés JWT (générées)

tests/
└── Service/          # Tests unitaires
    └── AuthServiceTest.php
```

## 🔧 Configuration

### Variables d'environnement (.env)

```env
# Base de données
DATABASE_URL="postgresql://user:password@127.0.0.1:5432/database"

# JWT
JWT_SECRET_KEY=%kernel.project_dir%/config/jwt/private.pem
JWT_PUBLIC_KEY=%kernel.project_dir%/config/jwt/public.pem
JWT_PASSPHRASE=

# Redis (optionnel)
REDIS_URL=redis://127.0.0.1:6379
```

### Sécurité

- Mots de passe hashés avec bcrypt
- Tokens JWT signés avec RSA-256
- Validation des données avec Symfony Validator
- Protection CSRF pour les formulaires web
- Contrôles d'accès granulaires

## 🚀 Prochaines étapes

- [ ] API de gestion des articles de blog
- [ ] Système de commentaires
- [ ] Gestion des rôles avancée (ADMIN, MODERATOR)
- [ ] Upload d'images
- [ ] Notifications
- [ ] Rate limiting

## 🤝 Contribution

1. Fork le projet
2. Créez une branche feature (`git checkout -b feature/nouvelle-fonctionnalite`)
3. Committez vos changements (`git commit -am 'Ajout nouvelle fonctionnalité'`)
4. Push vers la branche (`git push origin feature/nouvelle-fonctionnalite`)
5. Ouvrez une Pull Request

## 📝 Licence

Ce projet est sous licence propriétaire.

## 📞 Support

Pour toute question ou support :
- Consultez la [documentation de l'API](AUTH_API_DOCUMENTATION.md)
- Ouvrez une issue sur GitHub
- Contactez l'équipe de développement

---

Made with ❤️ using Symfony 7.3
