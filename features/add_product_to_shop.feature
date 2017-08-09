Feature: Add product to the shop

   In order to people can see available products in my shop
   As a shop owner
   I need to be able to add products to my shop

   @notesting
   Scenario: Add product
    Given I have a shop named "Great shop"
    And there's a product named "Samsung S8" 
    And this product is listed in the catalog
    And this product is not listed on my shop priced products
    When I add this product priced DZD 50000 to my shop from the catalog
    Then the this product will be available in my shop priced products
