agence_de_voyage
================

###### Télécharger le repositories : *agence_de_voyage*

    git clone https://github.com/salonsalsa/agence_de_voyage.git

###### Configuration Apache dans le fichier httpd.conf
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


###### Une fois effectué aller sur votre navigateur et tester avec :
    http://localhost:8080

> Team_Rocket
