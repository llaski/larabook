<?php namespace Larabook\Registration\Events;

use Larabook\Users\User;

Class UserRegistered {

	public $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}
}