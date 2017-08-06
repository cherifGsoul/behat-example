<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    private $shop;
    private $catalog;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->catalog = new Fake\ProductCatalog;
    }

    /**
     * @Given I have a shop named :name wihtout products
     */
    public function iHaveAShopNamedWihtoutProducts($name)
    {
        $this->shop = Shop::namedWithoutProducts($name);
    }

    /**
     * @Given there's a product named :name in the catalog
     */
    public function theresAProductNamedInTheCatalog($name)
    {
        $product = Product::named($name);
        $this->catalog->add($product);
    }

    /**
     * @When I add :name to my shop product from the catalog
     */
    public function iAddToMyShopProductFromTheCatalog($name)
    {
        $this->shop->add($name,$this->catalog);
    }

    /**
     * @Then the number of my shop products will be :count
     */
    public function theNumberOfMyShopProductsWillBe($count)
    {
        assert($this->shop->count() == $count);
    }

    /**
     * @When I add :arg1 to my shop product from the catalog and priced DZD :arg2
     */
    public function iAddToMyShopProductFromTheCatalogAndPricedDzd($name, $price)
    {
        $this->shop->addShopProductPriced($name,$price,$this->catalog);
    }
}
