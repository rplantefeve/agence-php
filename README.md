agence_de_voyage
================

### Télécharger le repositories : *agence_de_voyage*

    git clone https://github.com/salonsalsa/agence_de_voyage.git

### Lorsque l'on bascule sur la debug ne pas oublier de faire :

    // Faire un composer
    composer update -v

    // Faire un drop schema
    app/console doctrine:schema:drop (--force)

    // Faire un update schema
    app/console doctrine:schema:update --force

    // Charger les différentes Fixtures
    app/console doctrine:fixtures:load

### Configuration Apache dans le fichier httpd.conf
    Exemple : /wamp/bin/apache/apache2.4.23/conf/httpd.conf

    Listen 8080

    <VirtualHost agence.local:80>
    ServerName agence.local

    DocumentRoot "/home/sam/Documents/php/agence_de_voyage/web"
    LogLevel warn
    CustomLog logs/agence.local_access.log common
    ErrorLog logs/agence.local_error.log

    <Directory "/home/sam/Documents/php/agence_de_voyage/web">
        AllowOverride All
        Order allow,deny
        Allow from all
        Require all granted
        <IfModule mod_negotiation.c>
            Options -MultiViews
        </IfModule>

        <IfModule mod_rewrite.c>
            RewriteEngine On

            RewriteCond %{REQUEST_URI}::$1 ^(/.+)/(.*)::\2$
            RewriteRule ^(.*) - [E=BASE:%1]

            RewriteCond %{HTTP:Authorization} .
            RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

            RewriteCond %{ENV:REDIRECT_STATUS} ^$
            RewriteRule ^app\.php(/(.*)|$) %{ENV:BASE}/$2 [R=301,L]


            RewriteCond %{REQUEST_FILENAME} -f
            RewriteRule .? - [L]

            RewriteRule .? %{ENV:BASE}/app.php [L]
        </IfModule>

        <IfModule !mod_rewrite.c>
            <IfModule mod_alias.c>
                RedirectMatch 302 ^/$ /app.php/
            </IfModule>
        </IfModule>
    </Directory>
    <Directory "/home/sam/Documents/php/agence_de_voyage/app">
        <IfModule mod_authz_core.c>
            Require all denied
        </IfModule>
        <IfModule !mod_authz_core.c>
            Order deny,allow
            Deny from all
        </IfModule>
    </Directory>
    <Directory "/home/sam/Documents/php/agence_de_voyage/src">
        <IfModule mod_authz_core.c>
            Require all denied
        </IfModule>
        <IfModule !mod_authz_core.c>
            Order deny,allow
            Deny from all
        </IfModule>
    </Directory>

</VirtualHost>
### Configuration de : parameters.yml
Il faut créer un fichier : parameters.yml et le placer dans app/config

Il faut y placer ces lignes :

>Adapter les différents paramètres suivant votre machine

    # This file is auto-generated during the composer install
    parameters:
        database_driver: pdo_sqlite
        database_path: "%kernel.root_dir%/data.db3"
        database_host: 127.0.0.1
        database_port: 3306
        database_name: agence
        database_user: root
        database_password: root
        mailer_transport: smtp
        mailer_host: 127.0.0.1
        mailer_user: null
        mailer_password: null
        secret: f25d29cad78e6b2aca067f4ce8ef50caea90837c


### Il faut par la suite faire un composer
    # Soit par netbeans ou autre IDE Compatible ou :
    composer update -v

### Une fois effectué aller sur votre navigateur et tester avec :
    http://localhost:8080

### Databases and the Doctrine ORM

    http://symfony.com/doc/2.8/doctrine.html

### Crud symfony
    http://symfony.com/doc/current/bundles/SensioGeneratorBundle/commands/generate_doctrine_crud.html


> Team_Rocket
