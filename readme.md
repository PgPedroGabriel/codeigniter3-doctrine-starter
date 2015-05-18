#Usage

first install composer in your machine

before:
```
$ php composer install
```
the doctrine will be downloaded.


set your config file in application/config/config.php


install bower

before use
```
$ bower install
```

remember to enable mod_rewrite in you apache server.


TO use doctrine CLi comands execute

```
$ php vendor/bin/doctrine orm:schema-tool:[your command] --dump-sql
```
