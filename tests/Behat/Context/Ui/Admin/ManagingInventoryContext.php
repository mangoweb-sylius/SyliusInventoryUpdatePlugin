<?php

declare(strict_types=1);

namespace Tests\MangoSylius\InventoryUpdatePlugin\Behat\Context\Ui\Admin;

use Behat\Behat\Context\Context;
use Sylius\Behat\NotificationType;
use Sylius\Behat\Service\NotificationCheckerInterface;
use Tests\MangoSylius\InventoryUpdatePlugin\Behat\Page\Admin\Inventory\IndexPageInterface;

final class ManagingInventoryContext implements Context
{
    /** @var IndexPageInterface */
    private $indexPage;

    /**
     * @var NotificationCheckerInterface
     */
    private $notificationChecker;

    public function __construct(
        IndexPageInterface $indexPage,
        NotificationCheckerInterface $notificationChecker
    ) {
        $this->indexPage = $indexPage;
        $this->notificationChecker = $notificationChecker;
    }

    /**
     * @When I want to browse inventory
     */
    public function iWantToBrowseInventory()
    {
        $this->indexPage->open();
    }

    /**
     * @Then I should see that the :productVariantName variant has :quantity quantity on hand
     */
    public function iShouldSeeThatTheProductVariantHasQuantityOnHand(
        string $productVariantName,
        int $quantity
    ) {
        assert($this->indexPage->getOnHandForVariantWithName($productVariantName) === $quantity);
    }

    /**
     * @When /^I change on hand quantity to (\d+) for the "([^"]*)" variant$/
     */
    public function iChangeOnHandQuantityToForTheVariant(
        int $onHand,
        string $productVariantName
    ) {
        $this->indexPage->setOnHandForVariantWithName($productVariantName, $onHand);
    }

    /**
     * @Given /^I save the stock$/
     */
    public function iSaveTheStock()
    {
        $this->indexPage->clickOnTheSaveStockButton();
    }

    /**
     * @Given /^I should be notified that current stock values were saved$/
     */
    public function iShouldBeNotifiedThatCurrentStockValuesWereSaved()
    {
        $this->notificationChecker->checkNotification('Current stock values were saved', NotificationType::success());
    }
}
