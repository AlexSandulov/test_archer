<?php
namespace Tests\Codeception\Acceptance;

use Tests\Codeception\AcceptanceTester;
use Tests\Codeception\Helper\Count;
use Tests\Codeception\Helper\FindElementonpage;
use Tests\Codeception\Helper\Login;

class FbFriendsCountCest
{
    protected $friends = 104; //number of expected friends
    protected $friendsPage = '/aleksandr.sandulov.3/friends_all'; //test user friends page

    public function _before(AcceptanceTester $I, Login $loginHelper)
    {
        $loginUser = $loginHelper->getLoginUserInfo();
        $I->amOnPage('/login/');
        $I->waitForElementVisible('#email', 20);
        $I->fillField('#email', $loginUser['name']);
        $I->fillField('#pass', $loginUser['password']);
        $I->click('#loginbutton');
        $I->waitForElementVisible('#pagelet_composer', 20);

    }

    use \Codeception\Util\Shared\Asserts;
    /**
     * @env facebook_live
     * @group medium
     * @tr-suite 1
     * @tr-case 1
     **/
    public function countAllFriends(AcceptanceTester $I, Count $countHelper, FindElementonpage $findtextHelper, $attribute = '#pagelet_timeline_medley_movies')
    {
        $I->amOnPage($this->friendsPage);
        $I->waitForElementVisible('#pagelet_timeline_medley_friends', 10);
        do {
            $I->scrollTo('#pagelet_dock');
        } while (empty($findtextHelper->findElementFromCurrentPage($attribute)));
        $count=$countHelper->countItems($this->friendsPage);
        var_dump($count);
        $this->assertEquals($this->friends,$count,'Check friends quantity');
    }
}
