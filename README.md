# Cut Url Laravel
Its verey simple project laravel

You can create project such as this for 
```
https://www.youtube.com/playlist?list=PL2Pq82trWJJWokD8EvxzpYkYp9gi7YZH0
```

# For you run the project 
## Config files
Edit File `.env` and `config/app.php` and `lang/{lang}/welcome.php` For Name WebSite
## Run WebSite
You Can Run In CLI For:
```
php artisan serve
```
Or Create File `.htaccess` In Apache
```
<IfModule mod_rewrite.c>
<IfModule mod_negotiation.c>
    Options -MultiViews
</IfModule>

RewriteEngine On

RewriteCond %{REQUEST_FILENAME} -d [OR]
RewriteCond %{REQUEST_FILENAME} -f
RewriteRule ^ ^$1 [N]

RewriteCond %{REQUEST_URI} (\.\w+$) [NC]
RewriteRule ^(.*)$ public/$1

RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^ server.php
</IfModule>
```
