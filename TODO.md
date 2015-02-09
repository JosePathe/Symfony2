* [1] Mettre à jour les sources de votre fork avec le dépôt d'origine

    1. Ajoutez à votre fork le remote du projet d'origine

git remote add projet_original_master https://github.com/jeromefath/Symfony2

    2. Mettez à jour votre fork en local

git fetch projet_original_master

    3. Fusionnez (merge) maintenant votre copie locale avec le projet d'origine

git checkout master

git merge projet_original_master/master

    4. Corriger les conflits éventuels

http://alainericgauthier.com/git/gerer_les_conflits_de_fusion

    5. Validez vos changements

git commit -a -m "Synchronisation avec le projet original"

    6. Envoyez vos changements sur github

git push

* [2] Gestion de thèmes bootstrap

    1. Ajouter 1 ou X thème bootstrap (http://bootswatch.com) dans le MmiBootstrapBundle
        
        * Ajoutez les fichiers css dans les ressources de votre bundle

    2. Créer une nouvelle route pour contrôler le thème dans le MmiBootstrapBundle

        * Envoyez en paramètre le nom du thème à utiliser

        * Stockez en session le nom du thème

        * Redirigez l'utilisateur (prévoir la possibilité de spécifier une url de redirection)

    3. Chargement du thème dans le MmiBootstrapBundle 

        * Modifiez le layout pour charger les fichiers css du thème dont le nom est stocké en session

    4. Gestion du thème dans le MmiBlogBundle

        * Modifiez la navbar du blog pour ajouter un menu déroulant permettant de modifier le thème à utiliser (lorsque l'utilisateur clique sur le lien d'un thème, il doit être redirigé vers la homepage du blog)

* [3] Lecture d'un flux RSS ou Atom
        
    1. Utiliser Composer pour charger un composant tiers
    
        * Ajoutez le composant ZendFeed (ZendFramework), interface de programmation pour la gestion de flux RSS et Atom http://framework.zend.com/manual/current/en/modules/zend.feed.introduction.html

        * Lancez la commande "php composer.phar require zendframework/zend-feed:2.0.*"

        * Lancez la commande "php composer.phar require zendframework/zend-http:2.0.*"

    2. Afficher un flux RSS dans la sidebar du MmiBlogBundle

        * Créez une nouvelle classe controller appelée FeedController
        
        * Créez une nouvelle méthode qui devra utiliser le composant ZendFeed pour lire un flux RSS de votre choix. Envoyez les informations issues du flux à un fichier de template pour afficher les entrées dans une liste html

        * Appelez la méthode render depuis votre layout pour afficher la liste html dans votre sidebar  {{ render(controller('MmiBlogBundle:Feed:votreMethode')) }}