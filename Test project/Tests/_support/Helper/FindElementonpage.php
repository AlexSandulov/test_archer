<?php
namespace Tests\Codeception\Helper;

use \Codeception\Module\WebDriver;
use Facebook\WebDriver\Remote\RemoteWebElement;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class FindElementonpage extends \Codeception\Module
{

    public function findElementFromCurrentPage($attribute):array
    {
        /* @var WebDriver $browser */
        /* @var RemoteWebElement $productLink */
        $browser = $this->getModule('WebDriver');
        $searchText = $browser->_findElements($attribute);
        return $searchText;
    }
}
