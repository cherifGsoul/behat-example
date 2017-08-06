Feature: Add product to the shop

   In order to people can see available products in my shop
   As a shop owner
   I need to be able to add products to my shop

   Scenario: Add product
    Given there's a product named "Samsung S8" in the catalog
    And I have a shop named "Great shop"
    When I add "Samsung S8" priced DZD 50000 to my shop from the catalog
    Then the count of my shop products will be 1
