<?php namespace Larabook\Statuses;

use Larabook\Statuses\Status;
use Larabook\Users\User;

class StatusRepository {

	public function save(Status $status, $userId)
	{
		return User::findOrFail($userId)->statuses()->save($status);
	}

	public function getAllForUser(User $user)
	{
		return $user->statuses;
	}
}