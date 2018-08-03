<?php

namespace Tests\Codeception\Helper;

use \Codeception\Module;
use \Codeception\Module\WebDriver;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class Count extends Module
{
    public function countItems()
    {
        /* @var WebDriver $browser */
        $browser = $this->getModule('WebDriver');
        $elementsBlock = $browser->_findElements('#pagelet_timeline_medley_friends li[class="_698"]');
        return count($elementsBlock);
    }
}
