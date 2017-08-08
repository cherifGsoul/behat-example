Feature: Shop registration

   In order to have a shop in the website
   As a shop owner
   I need to be able to request registration

   Scenario: Valid registration with free cost offer

   Given A shop registration for the free offer was requested with the following information:
    | shopName   |  mobile     | address_street   | address_wilaya | address_city | duration     |
    | Great shop |  0774804851 | nowhere he we go | 23             | El Bouni     | 3 months     |
   Then the shop enablement will be marked as enabled 
   And the duration of this enablement will be three months from now
   