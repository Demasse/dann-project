# Dann Project

Bienvenue dans le projet **Dann** ! Ce projet est construit avec le framework Laravel, offrant une base robuste et élégante pour le développement d'applications web modernes.

## Prérequis

Avant de commencer, assurez-vous d'avoir les éléments suivants installés sur votre machine :

- PHP >= 8.1
- Composer
- Node.js & npm
- MySQL ou un autre système de gestion de base de données compatible

## Installation

1. Clonez le dépôt :

   ```bash
   git clone https://github.com/votre-utilisateur/dann-project.git
   cd dann-project
2. Installez les dépendances PHP avec Composer :
 composer install
3. Installez les dépendances JavaScript avec npm :
 npm install
4. Configurez le fichier .env :
Copiez le fichier .env.example et renommez-le en .env. Mettez à jour les informations de connexion à la base de données et d'autres configurations nécessaires.
 cp .env.example .env
5.Générez la clé de l'pplication
php artisan key:generate
6. Exécutez les migrations pour créer les tables dans la base de données :
   php artisan migrate
7.Compilez les assets front-end :
npm run dev

8.Lancer le serveur de développement
Démarrez le serveur local avec la commande suivante :

L'application sera accessible à l'adresse http://localhost:8000.

Fonctionnalités
Authentification utilisateur (inscription, connexion, réinitialisation de mot de passe)
Gestion des utilisateurs
Intégration avec Tailwind CSS pour le design
Architecture MVC avec Laravel
Contribution
Les contributions sont les bienvenues ! Veuillez consulter le guide de contribution dans la documentation Laravel.

Licence
Ce projet est sous licence MIT.

Développé avec ❤️ en utilisant Laravel. ```
