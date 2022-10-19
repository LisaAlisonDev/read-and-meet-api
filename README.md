# read-and-meet-api

La partie API du projet ReadAndMeet.


## Initialisation du projet Laravel



Dans le terminal entrez ces commandes :
``` 
   - composer install 
   - npm install
   - php artisan key:generate
   ```

Pour se connecter à une bdd en local (sur windows) dans le 
terminal entrez :
```
   - cp .env.example .env
```
puis remplissez le fichier .env nouvellement crée avec 
les informations de la base de donnée local.

----------------

Pour mettre en place la base de donnée 
et l'alimenter en données de test :

```
   - php artisan migrate
   - php artisan db:seed
```

Pour lancer l'application sur un serveur local :
```
   - php artisan serve
```