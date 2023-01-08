# myapp
Project Safer Immobilier
Ce Projet consiste a fournir des biens aux differents porteur de projet en vue de leur eviter un deplacement, tout en recherchant ce qu'ils veulent. il consiste à presenter des biens aux clients , des biens par catégorie, de choisir plusieur bien par des critére, de mettre des bien en favoris et de se le faire envoyer,d'afficher tous les biens et aussi de nous contactez en cas de bien non disponible sur notre site.

🚀 A Propos de Nous
Nous sommes deux qui avons Travaillé sur ce projet: -VELAR FRANCOIS TANO And MARILYSE KONAN

Installation
Pour Installer le project Safer, il faut taper les commandes suivantes :

D'abord vous devez crée un repertoire de dossier dans votre environnement de travailler(Windows) et dans lequel vous allez cloner le projet dans le repertoire.

installer tous les composantes du Composer,en tapant :
 $composer install
Ensuite pour une choérence des Données vous allez effectué certaine commande:

Crée une base de données de meme nom que la base qui se trouve dans le fichier.

Après installer le composer qui s'occupe du chargement d'image, en tapant:

$composer require vich/uploader-bundle
N'oubliez pas de faire la migration des données, en tapant:
 $php bin/console Doctrine:migration:migrate
N'oubliez pas de mettre en marche votre server Local.
Maintenant vous pouvez lancer le projet

Documentation
Documentation symfony

Pour la partie Admin, il faut taper:

http://127.0.0.1:8000/Admin dans L'Url. cela vous dirigera vers une page de connection pour un admin.

Si la base de Données est vide alors il n'aura pas de connection, dans ce cas il faut crée un admin en allant sur

http://127.0.0.1:8000/register il remplir le formulaire. Apres avoir finir de remplir le formulaire un message de cofirmation lui est envoyé par mail. et vous devez le confirmer pour pouvoir avoir accès à la partie Admin.

Après avoir confirmer votre mail, le systeme le reconnait comme admin puisque un utilisateur n'a pas besoin de se connecter.

Apres etre connecter , il faut ajouter des categorie ensuite pour aller ajouter des biens sinon vous n'y pourrez pas.

vous pouvez maintenant charger la base de données qui vous à été donnée.
-Merci pour l'attention et bon visite à vous.

Authors
velar tano (https://github.com/velartano)

Marilyse Konan

Bundles
nous avons utilisez plus de trois 3 Bundles qui sont:

Bundles EASYADMIN : pour l'administration
Bundles Vich/Uploaded :pour la gestion de l'image
Bundles de fixtures : pour la generation de faux données pour le test du site
Bundles de Sécurité : pour la Sécurité
