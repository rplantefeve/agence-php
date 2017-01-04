agence_de_voyage
================

### Télécharger le repositories : *agence_de_voyage*

    git clone https://github.com/salonsalsa/agence_de_voyage.git

### Configuration Apache dans le fichier httpd.conf
    Exemple : /wamp/bin/apache/apache2.4.23/conf/httpd.conf

    Listen 8080

    <VirtualHost \*:8080>
      DocumentRoot "/srv/http/agence_de_voyage/web"
      DirectoryIndex index.php
      <Directory "/srv/http/agence_de_voyage/web">
        AllowOverride All
        Order Allow,Deny
        Allow from All
      </Directory>

      <Directory "/srv/http/agence_de_voyage/lib/vendor/symfony/data/web/sf">
        AllowOverride All
        Allow from All
      </Directory>

        ErrorLog /var/log/httpd/project_error.log
        CustomLog /var/log/httpd/project_access.log combined
    </VirtualHost>

### Configuration de : parameters.yml
Il faut créer un fichier : parameters.yml et le placer dans app/config

Il faut y placer ces lignes :

>Adapter les différents paramètres suivant votre machine

    # This file is auto-generated during the composer install
    parameters:
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


### Une fois effectué aller sur votre navigateur et tester avec :
    http://localhost:8080

### Databases and the Doctrine ORM

    http://symfony.com/doc/2.8/doctrine.html

### Crud symfony
    http://symfony.com/doc/current/bundles/SensioGeneratorBundle/commands/generate_doctrine_crud.html


> Team_Rocket
