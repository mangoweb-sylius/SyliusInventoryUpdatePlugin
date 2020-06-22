<p align="center">
    <a href="https://www.mangoweb.cz/en/" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/38423357?s=200&v=4"/>
    </a>
</p>

<h1 align="center">
    Inventory update plugin
    <br />
    <a href="https://packagist.org/packages/mangoweb-sylius/sylius-inventory-update-plugin" title="License" target="_blank">
        <img src="https://img.shields.io/packagist/l/mangoweb-sylius/sylius-inventory-update-plugin.svg" />
    </a>
    <a href="https://packagist.org/packages/mangoweb-sylius/sylius-inventory-update-plugin" title="Version" target="_blank">
        <img src="https://img.shields.io/packagist/v/mangoweb-sylius/sylius-inventory-update-plugin.svg" />
    </a>
    <a href="https://travis-ci.org/mangoweb-sylius/SyliusInventoryUpdatePlugin" title="Build status" target="_blank">
        <img src="https://img.shields.io/travis/mangoweb-sylius/SyliusInventoryUpdatePlugin/master.svg" />
    </a>
</h1>

## Installation

1. `composer require mangoweb-sylius/sylius-inventory-update-plugin`
1. Add plugin classes to your `config/bundles.php`:
   ```php
   return [
      ...
      MangoSylius\InventoryUpdatePlugin\MangoSyliusInventoryUpdatePlugin::class => ['all' => true],
   ];
   ```
1. Add resource to `config/packages/_sylius.yaml`
    ```yaml
    imports:
         ...
         - { resource: "@MangoSyliusInventoryUpdatePlugin/Resources/config/resources.yml" }
    ```
1. Add routing to `config/_routes.yaml`
    ```yaml
    mango_sylius_extended_channels:
        resource: '@MangoSyliusInventoryUpdatePlugin/Resources/config/routing.yml'
        prefix: /admin
    ```
   
## Development

### Usage

- Develop your plugin in `/src`
- See `bin/` for useful commands

### Testing


After your changes you must ensure that the tests are still passing.

```bash
$ composer install
$ bin/console doctrine:schema:create -e test
$ bin/behat
$ bin/phpstan.sh
$ bin/ecs.sh
```

License
-------
This library is under the MIT license.

Credits
-------
Developed by [manGoweb](https://www.mangoweb.eu/).
