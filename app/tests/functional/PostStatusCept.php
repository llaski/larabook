<?php 

$I = new FunctionalTester($scenario);
$I->am('a larabook member');
$I->wantTo('post status to profile');

$I->signIn();

$I->amOnPage('statuses');

$I->postAStatus('My First Post');

$I->seeInCurrentUrl('statuses');
$I->see('My First Post');