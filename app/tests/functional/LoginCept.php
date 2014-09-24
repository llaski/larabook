<?php 

$I = new FunctionalTester($scenario);
$I->am('a larabook member');
$I->wantTo('log in to my larabook account');

$I->signIn();

$I->seeInCurrentUrl('/statuses');
$I->see('Welcome back');

$I->assertTrue(Auth::check());