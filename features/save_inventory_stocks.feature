@save_inventory_stocks
Feature: Save inventory stocks
    In order to update inventory
    As an Administrator
    I want to have an appropriate button on inventory list view

    Background:
        Given the store operates on a single channel in "United States"
        And the store has a "Wyborowa Vodka" configurable product
        And the product "Wyborowa Vodka" has "Wyborowa Vodka Exquisite" variant priced at "$40.00"
        And there are 2 units of "Wyborowa Vodka Exquisite" variant of product "Wyborowa Vodka" available in the inventory
        And the store has a "Screwdriver" configurable product
        And the product "Screwdriver" has "Torx T4" variant priced at "$40.00"
        And there are 6 units of "Torx T4" variant of product "Screwdriver" available in the inventory
        And I am logged in as an administrator

    @ui
    Scenario: Being able to update product stocks
        When I want to browse inventory
        And I should see that the "Wyborowa Vodka Exquisite" variant has 2 quantity on hand
        And I should see that the "Torx T4" variant has "6" quantity on hand
        And I change on hand quantity to 4 for the "Wyborowa Vodka Exquisite" variant
        And I change on hand quantity to 7 for the "Torx T4" variant
        And I save the stock
        Then I should be notified that current stock values were saved
        And I should see that the "Wyborowa Vodka Exquisite" variant has 4 quantity on hand
        And I should see that the "Torx T4" variant has "7" quantity on hand
