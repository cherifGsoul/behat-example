Feature: Shop registration

   In order to have a shop in the website
   As a shop owner
   My shop should be registered based on my order

   Scenario: Valid registration with free cost offer

   When offer free shops orders is registered with the following information:
    | shop_name   |  mobile      | address_street   | address_wilaya | address_city | offer |
    | Great shop  |  0774804851  | nowhere he we go | 23             | El Bouni     | free  |
   Then the shop enablement will be marked as enabled
   And the duration of this enablement will be three months from now
   