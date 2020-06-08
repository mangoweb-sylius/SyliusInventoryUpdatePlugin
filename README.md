<p align="center">
    <a href="https://www.mangoweb.cz/en/" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/38423357?s=200&v=4"/>
    </a>
</p>

<h1 align="center">Update inventory plugin</h1>

## Installation

1. `composer require mangoweb-sylius/sylius-inventory-update-plugin`
1. Add plugin classes to your `config/bundles.php`:
   ```php
   return [
      ...
      MangoSylius\UpdateInventoryPlugin\MangoSyliusUpdateInventoryPlugin::class => ['all' => true],
   ];
   ```
1. Add resource to `config/packeges/_sylius.yaml`
    ```yaml
    imports:
         ...
         - { resource: "@MangoSyliusExtendedChannelsPlugin/Resources/config/resources.yml" }
    ```
1. Add routing to `config/_routes.yaml`
    ```yaml
    mango_sylius_extended_channels:
        resource: '@MangoSyliusExtendedChannelsPlugin/Resources/config/routing.yml'
        prefix: /admin
    ```
