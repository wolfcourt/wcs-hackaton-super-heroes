# Super Heroes Fight Club

Notre premier hackaton à la WildCodeSchool.

## Informations
* Le client est développée en JavaScript à l'aide du framework [VueJS](https://vuejs.org/).
* Le serveur est lui développé en PHP natif.

## Installation
1. Téléchargez ou clonez le dépôt.
2. Déplacez vous dans le dossier `server/` et éxecutez la commande `composer install`.
3. Retournez à la racine puis executez la commande `sh run.sh`, votre navigateur s'ouvrira.
4. Pour éteindre les serveurs, executez la commande `sh kill-servers.sh`.

## Modifier le serveur (PHP)
> Pensez à vérifier que vous ayez bien les modules installés via composer.
1. Déplacez vous dans le dossier `server/`.
* `server/inc/` => Classes de gestion.
* `server/data/` => Données utilisées pour le jeu.

## Modifier le client (VueJS)
> Le dépôt que vous avez téléchargé dispose déjà d'une version utilisable du client sans que vous ayez quoi que ce soit à effectuer.
1. Déplacez vous dans le dossier `client/`.
2. Executez la commande `npm install`.
3. Effectuez vos modifications dans le code source.
4. Executez l'une des commandes suivantes:
``` bash
# serve with hot reload at localhost:8080
npm run dev

# build for production with minification
npm run build
```
![Illustration](https://i.imgur.com/PZVhNg9.png)

## Développeurs
* Nassgr (https://github.com/Nassgr)
* Wolfcourt (https://github.com/wolfcourt)
* Neimax (https://github.com/Neimax)
* MaximeGOyard (https://github.com/MaximeGOyard)