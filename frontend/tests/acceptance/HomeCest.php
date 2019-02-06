<?php
namespace frontend\tests\acceptance;

use frontend\tests\AcceptanceTester;
use yii\helpers\Url;

class HomeCest
{
    public function checkHome(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/index'));
        $I->see('My Application');

        $I->seeLink('About');
        $I->click('About');

        //$I->wait(5); // wait for page to be opened

        $I->see('About');

        $I->seeLink('TaskList');
        $I->click('TaskList');

        //$I->see('number'); не работает

        //$I->seeLink('Create Tasks'); не работает


    }
}
