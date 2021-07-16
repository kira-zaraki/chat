
# Chat system 

system de chat base sur HTML-CSS, PHP MVC CORE , JAVASCRIPT JQUERY, WAMP ENVIRONEMENT sans middleware ou system de gestion de socket

## Installation

- Clone le projets sur le dossier racine de votre serveur local
- Lance le serveur
- modifie les variable de configuration situe dans le racine de projet  

```php
<?php 
/* ./config.php */
define('CONTROLLER', 'chat'); // contrôleur principal 
define('ACTION', 'home'); // action principal 
define('DBNAME', 'chat'); // nom de votre database
define('BDUSERNAME', 'root'); // username 
define('DBPASSWORD', ''); // password

?>
```
- crée une base de donne vide sur l'assistant phpmyadmin mètre sur votre navigateur **(localhost:[port]/phpmyadmin)**  le nom de base donne doit entre similaire la celle indique a sur votre fichier de config

- âpre initialise votre projet on visitent sur votre navigateur 

```url
localhost:[port]/chat/init
```
- apre visite le racine de votre site web


## exemple
```url
localhost:[port]/chat
```
