<?php
namespace Tests\MangoSylius\InventoryUpdatePlugin\Behat\Page\Admin\Inventory;

use Sylius\Behat\Page\Admin\Inventory\IndexPageInterface as BaseIndexPageInterface;

interface IndexPageInterface extends BaseIndexPageInterface
{
    public function getOnHandForVariantWithName($variantName);

    public function setOnHandForVariantWithName($variantName, $onHand);

    public function clickOnTheSaveStockButton();
}