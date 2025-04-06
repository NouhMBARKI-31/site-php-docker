# 🌐 Projet : Site PHP avec Docker

Ce projet est un mini site PHP développé dans un environnement Docker.  
Il comprend plusieurs pages : accueil, contact, à propos, et un espace admin protégé.

## ✨ Fonctionnalités

- 🏠 Page d’accueil
- 📬 Formulaire de contact (les messages sont enregistrés dans un fichier `messages.txt`)
- 🔐 Zone admin avec identifiants + affichage des messages
- 🔓 Déconnexion possible
- 🐳 Exécuté dans un conteneur Docker

## 🛠 Technologies utilisées

- PHP 8.2
- HTML/CSS
- Docker
- Git

## 🚀 Lancer le site en local (Docker)

```bash
docker run -d -p 8081:80 -v ~/formation-linux/mon-site-php:/var/www/html php:8.2-apache
