selectable-bundle
=================

Install
-------

Before this bundle be in packagist you have to add the following lines to your project's composer.json

```json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/rodrigobb/selectable-bundle"
        }
    ],
    "require": {
        "rbbusiness/selectable-bundle": "master"
    }
}
```

TO-DO List
---------

* Clean dependencies (to make it real)
* MAKE TESTs
* Define Interfaces
* Use interfaces as contracts
* Reduce dependencies
* Make core part a library [rodrigobb/selectable](https://github.com/rodrigobb/selectable)
* Remove SonataAdmin dependency (so build an alternative admin) 
* Better translation system
* Remove doctrine dependency (or at least make it an option)

Whole composer.json 
--------------------

Must be cleaned.

```json
{
    "name": "rbbusiness/selectable",
    "type": "symfony-bundle",
    "description": "Symfony administrable and eficient options/choices provider",
    "keywords": ["select", "option", "admin", "sonata"],
    "license": "MIT",
    "authors": [
        {
            "name": "Rodrigo Borrego Bernabé",
            "email": "rodrigobb@gmail.com",
            "homepage": "http://rodri.net"
        }
    ],
    "require": {
	    "php": ">=5.3.3",
        "symfony/symfony": "2.3.*",
        "doctrine/orm": "~2.2,>=2.2.3",
        "doctrine/doctrine-bundle": "~1.2",
        "twig/extensions": "~1.0",
	    "sonata-project/admin-bundle": "2.3.*@dev",
        "sonata-project/doctrine-orm-admin-bundle": "dev-master"
    }
}
```
