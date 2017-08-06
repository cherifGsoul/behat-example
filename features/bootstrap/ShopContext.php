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
     * @Given there's a product named :productName in the catalog
     */
    public function theresAProductNamedInTheCatalog(ProductName $productName)
    {
        $product = Product::named($productName);
        $this->catalog->add($product);
    }

    /**
     * @Given I have a shop named :shopName
     */
    public function iHaveAShopNamed(ShopName $shopName)
    {
        $this->shop = Shop::named($shopName);
    }

    /**
     * @When I add :productName priced DZD :price to my shop from the catalog
     */
    public function iAddPricedDzdToMyShopFromTheCatalog(ProductName $productName, Price $price)
    {
        $this->productPricer->priceProductForShop($productName,$price,$this->shop);
    }

    /**
     * @Then the count of my shop products will be :count
     */
    public function theCountOfMyShopProductsWillBe($count)
    {
        assert($this->shop->count() == $count);
    }
}
