Voici la version française du fichier **README** pour le projet **UpCours** :

---

# **UpCours - Plateforme de Cours en Ligne**

**UpCours** est une plateforme de cours en ligne avancée, conçue pour faciliter une expérience d'apprentissage fluide et interactive pour les étudiants et les formateurs. Elle offre des fonctionnalités telles que la création de cours, l'inscription, la gestion, ainsi que des contrôles administratifs, permettant aux utilisateurs de partager, explorer et gérer le contenu éducatif de manière efficace.

## **Technologies Utilisées**

- **PHP (Natifs)** – Langage de script côté serveur utilisé pour la fonctionnalité de l'application web dynamique.
- **MySQL** – Système de gestion de bases de données relationnelles (SGBDR) utilisé pour stocker les données des utilisateurs, les détails des cours et plus encore.
- **Composer** – Gestionnaire de dépendances PHP pour gérer les bibliothèques externes.
- **phpdotenv** – Package utilisé pour charger les variables d'environnement depuis le fichier `.env` pour configurer les paramètres sensibles.
- **Principes de la POO** – Encapsulation, Héritage, Polymorphisme pour créer un code propre, évolutif et maintenable.

## **Fonctionnalités**

### **Rôles Utilisateurs et Fonctionnalités**

#### **Visiteur :**
- Accéder au catalogue de cours avec pagination.
- Rechercher des cours par mots-clés.
- S'inscrire sur la plateforme, en choisissant entre deux rôles : Étudiant ou Formateur.

#### **Étudiant :**
- Parcourir et consulter les détails des cours (par exemple, titre, description, contenu, formateur).
- S'inscrire aux cours après authentification réussie.
- Accéder à une section "Mes Cours" personnalisée pour gérer et suivre les cours inscrits.

#### **Formateur :**
- Créer et gérer des cours, y compris ajouter des contenus comme des vidéos, des documents, des balises et des catégories.
- Modifier, supprimer et voir les inscriptions pour les cours.
- Voir des statistiques comme le nombre d'étudiants inscrits et les cours proposés.

#### **Administrateur :**
- Valider les comptes des formateurs.
- Gérer les utilisateurs en activant, suspendant ou supprimant leurs comptes.
- Gérer le contenu des cours, les balises et les catégories.
- Insérer des balises en masse pour faciliter la catégorisation des cours.
- Accéder aux statistiques globales comme le nombre total de cours, les catégories populaires, et les formateurs les plus performants.

### **Fonctionnalités Transversales :**
- **Balises de Cours** : Les cours sont associés à plusieurs balises pour une meilleure organisation et une recherche plus efficace.
- **Polymorphisme** : Implémenté pour ajouter et afficher les cours de manière flexible, permettant une extension facile des fonctionnalités.
- **Authentification et Autorisation** : Garantit que les utilisateurs ne peuvent accéder qu'aux fonctionnalités en fonction de leurs rôles.

## **Configuration de l'Environnement**

### **Prérequis**

Avant de configurer le projet, assurez-vous d'avoir les éléments suivants :
- PHP 7.4 ou supérieur.
- MySQL 5.7 ou supérieur.
- Composer (gestionnaire de dépendances PHP).
- Un serveur local ou cloud pour exécuter PHP et MySQL (par exemple, XAMPP, WAMP, ou un serveur en ligne).

### **Étapes d'Installation**

1. **Cloner le Dépôt :**

    Pour cloner le dépôt sur votre machine locale, utilisez la commande suivante :

    ```bash
    git clone https://github.com/Black0list/Up_Cours.git
    ```

2. **Installer les Dépendances Composer :**

    Après avoir navigué dans le répertoire du projet, exécutez la commande suivante pour installer les dépendances via Composer :

    ```bash
    cd Up_Cours
    composer install
    ```

3. **Créer le Fichier `.env` :**

    À la racine du projet, créez un fichier `.env` pour gérer les configurations spécifiques à l'environnement, y compris les informations d'identification de votre base de données.

    Exemple :

    ```env
    DB_HOST=localhost
    DB_NAME=upcours_database
    DB_USER=root
    DB_PASS=
    ```

4. **Configuration de la Base de Données :**

    Mettez à jour le fichier `Database.php` pour utiliser les variables d'environnement pour la connexion MySQL. Le package `phpdotenv` chargera les valeurs depuis le fichier `.env`.

    ```php
    use Dotenv\Dotenv;

    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    $servername = $_ENV['DB_HOST'];
    $dbname = $_ENV['DB_NAME'];
    $username = $_ENV['DB_USER'];
    $password = $_ENV['DB_PASS'];
    ```

5. **Configuration de la Base de Données :**

    Créez une base de données MySQL nommée `upcours_database` (ou utilisez le nom de votre choix) et exécutez les scripts SQL pour créer les tables et remplir les données initiales.

6. **Accéder à l'Application :**

    Une fois toutes les dépendances installées et la base de données configurée, ouvrez votre navigateur et accédez à :

    ```http://localhost/Up_Cours```

    Vous devriez maintenant voir la page d'accueil de la plateforme.

## **Structure des Fichiers**

Voici une vue d'ensemble des dossiers et fichiers clés dans le projet :

- **`/Views`** – Contient tous les fichiers HTML/PHP pour afficher l'interface utilisateur.
  - `home.php`, `cours.php`, `tags.php`, `categories.php`, etc.
- **`/Controllers`** – Contient les classes contrôleurs responsables de gérer les interactions des utilisateurs et la logique de l'application (par exemple, `AuthController.php` pour l'authentification).
- **`/Models`** – Contient la logique métier et l'interaction avec la base de données (par exemple, `User.php`, `Course.php`).
- **`/Core/Config`** – Inclut des fichiers de configuration tels que `Database.php` pour la connexion à la base de données.
- **`/vendor`** – Contient les dépendances de Composer comme **phpdotenv**.

## **Système de Routage**

Le projet utilise un système de routage URL de base pour gérer les demandes des utilisateurs. Voici une vue d'ensemble :

- `/form/auth` – Affiche le formulaire de connexion ou d'inscription.
- `/page/cours` – Liste tous les cours disponibles.
- `/auth/register` – Gère le processus d'inscription des utilisateurs.
- `/auth/logout` – Déconnecte l'utilisateur.

