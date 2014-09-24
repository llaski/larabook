<?php 
$I = new FunctionalTester($scenario);
$I->am('A Guest');
$I->wantTo('Signup for a Larabook Account');

$I->amOnPage('/');
$I->click('Sign Up');
$I->seeCurrentUrlEquals('/register');

$I->fillField('Username:', 'John Doe');
$I->fillField('Email:', 'john@example.com');
$I->fillField('Password:', 'demo');
$I->fillField('Password Confirmation:', 'demo');
$I->click('Sign Up');

$I->seeCurrentUrlEquals('');
$I->see('Larabook');
$I->seeRecord('users', [
	'username' => 'John Doe'
]);

$I->assertTrue(Auth::check());