<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class ShopContext implements Context
{
    private $catalog;
    private $productPricer;
    private $shop;
    private $product;
    private $shops;
    
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->catalog = new \Fake\ProductCatalog;
        $this->productPricer = new \ProductPricer($this->catalog);
        $this->shops = new \Fake\Shops;
    }

    /** 
     * @Transform :productName 
     */
    public function transformProductName($productName)
    {
        return ProductName::fromString($productName);
    }

    /**
     * @Transform :shopName
     */
     public function transformShopName($shopName)
     {
         return ShopName::fromString($shopName);
     }

    /**
     * @Transform :price
     */
    public function transformPrice($price)
    {
        return Price::fromString($price);
    }

    /**
     * @Given I have a shop named :shopName
     */
    public function iHaveAShopNamed(ShopName $shopName)
    {
        $this->shop = Shop::named($shopName);
    }

    /**
     * @Given there's a product named :productName
     */
    public function theresAProductNamed(ProductName $productName)
    {
        $this->product = Product::named($productName);
    }

    /**
     * @Given this product is listed in the catalog
     */
    public function thisProductIsListedInTheCatalog()
    {
        $this->catalog->listProduct($this->product);
    }

    /**
     * @Given this product is not listed on my shop priced products
     */
    public function thisProductIsNotListedOnMyShopPricedProducts()
    {
        $this->productPricer->unlistProductFromShop($this->shop,$this->product);
    }

    /**
     * @When I add this product priced DZD :price to my shop from the catalog
     */
    public function iAddThisProductPricedDzdToMyShopFromTheCatalog(Price $price)
    {
        $this->productPricer->listProductForShop($this->product,$price,$this->shop);
    }

    /**
     * @Then the this product will be available in my shop priced products
     */
    public function theThisProductWillBeAvailableInMyShopPricedProducts()
    {
        assert($this->shop->hasProduct($this->product));
    }

    /**
     * @When offer free shops orders is registered with the following information:
     */
    public function offerFreeShopsOrdersIsRegisteredWithTheFollowingInformation(TableNode $table)
    {
        foreach ($table as $row) {
            $shopName = ShopName::fromString($row['shop_name']);
            $mobile = Mobile::fromString($row['mobile']);
            $address = new Address($row['address_street'],$row['address_wilaya'],$row['address_city']);
            $contactInformation = new ContactInformation($mobile,$address);
            $shop = Shop::registerForFree($shopName, $contactInformation );
            $this->shops->add($shop);
        }
    }

    /**
     * @Then the shop enablement will be marked as enabled
     */
    public function theShopEnablementWillBeMarkedAsEnabled()
    {
        $shops = $this->all();
        foreach ($this->shops->all() as $shop) {
            assert($shop->isEnabled() == true);
        }
    }

    /**
     * @Then the duration of this enablement will be three months from now
     */
    public function theDurationOfThisEnablementWillBeThreeMonthsFromNow()
    {
        throw new PendingException();
    }
}
