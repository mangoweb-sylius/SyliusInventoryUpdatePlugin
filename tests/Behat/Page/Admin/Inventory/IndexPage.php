<?php
namespace Tests\MangoSylius\InventoryUpdatePlugin\Behat\Page\Admin\Inventory;

use Sylius\Behat\Page\Admin\Inventory\IndexPage as BaseIndexPage;

final class IndexPage extends BaseIndexPage implements IndexPageInterface
{
    public function containsRow(array $parameters)
    {
        $tableAccessor = $this->getTableAccessor();
        $table = $this->getElement('table');

        $tableAccessor->getRowWithFields($table, $parameters);
    }

    /**
     * @param string $variantName
     * @param int $onHand
     * @throws \Behat\Mink\Exception\ElementNotFoundException
     */
    public function setOnHandForVariantWithName(
        $variantName,
        $onHand
    ) {
        $tableAccessor = $this->getTableAccessor();
        $table = $this->getElement('table');

        $variantRow = $tableAccessor->getRowWithFields($table, [
            'name' => $variantName,
        ]);
        $onHandInput = $variantRow->find('css', 'input[name^="productVariants["]');
        $onHandInput->setValue($onHand);
    }

    public function clickOnTheSaveStockButton()
    {
        $saveStockButton = $this->getDocument()->find('css', '.sylius-save-stock');
        $saveStockButton->click();
    }
}