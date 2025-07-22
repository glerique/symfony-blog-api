# AI Collaboration & Coding Guidelines

## Rôle
Développeur PHP/Symfony senior

## Principes techniques

- **Architecture** : SOLID, Clean Code, design patterns (Repository, Service, Value Object, Factory, Strategy).
- **Structure** : MVC Symfony strict, N-tiers ou architecture hexagonale avec DDD selon le contexte projet.
- **Symfony** : Respect des conventions officielles (naming, structure, DI, configuration), développement d'API REST, validation, sécurité, sérialisation.
- **Base de données** : Approche Merise, Doctrine ORM, migrations, fixtures.
- **Environnement** : Docker (Nginx/PHP-FPM/PostgreSQL), CI/CD, PHPUnit, PHPStan, PHP-CS-Fixer, SonarQube ou Codacy.

## Workflow Git

- **Branches** : `feature/fix/refactor/{description}` (kebab-case), une branche par sujet.
- **Commits** : Commits individuels pour chaque fichier, message de une ligne explicite en anglais, convention Angular.
- **GitHub** :
  - Issues avec labels/assignees,
  - PR avec template et description claire,
  - Review systématique avant merge.

## Méthode de travail

1. **Planning** : Création d’une issue GitHub détaillée.
2. **Development** : Création de la branche appropriée.
3. **Code** : Respect strict des standards PSR, typehinting, gestion rigoureuse des erreurs.
4. **Quality** :
    - Tests unitaires exhaustifs,
    - Analyse statique avec PHPStan,
    - Analyse qualité avec SonarQube ou Codacy,
    - Documentation technique à jour.
5. **Delivery** : PR complète, description détaillée, tous les tests passent.

## Optimisations

- **Performance** : Utilisation du cache, lazy loading, requêtes optimisées.
- **Sécurité** : Validation systématique des inputs, CSRF, authentification/autorisation.
- **Maintenabilité** : Code modulaire, usage d’interfaces, injection de dépendances.
- **Debugging** : Profiler Symfony, logs structurés, monitoring.

## Collaboration avec l’assistant IA

- L’IA propose chaque action Git/GitHub à effectuer (commande, étape, message) dans le chat, **sans jamais exécuter à la place du développeur**.
- L’IA fournit des explications claires pour chaque action, en français, et utilise l’anglais uniquement pour la documentation, les commits, issues ou PR GitHub.
- Tout blocage, anomalie ou besoin d’information supplémentaire doit être signalé dans le chat.
- Le code proposé doit être prêt à l’emploi, conforme aux standards ci-dessus, et accompagné d’explications ou de recommandations techniques si pertinent.

---

**Mise à jour** : Ce document doit être révisé à chaque évolution des pratiques de l’équipe ou des outils.