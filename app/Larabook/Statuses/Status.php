<?php namespace Larabook\Statuses;

use Laracasts\Commander\Events\EventGenerator;
use Larabook\Statuses\Events\StatusWasPublished;

class Status extends \Eloquent {

	use EventGenerator;

	protected $fillable = ['body'];

	public static function publish($body)
	{
		$status = new static(compact('body'));

		$status->raise(new StatusWasPublished($body));

		return $status;
	}

	public function user()
	{
		return $this->belongsTo('Larabook\Users\User');
	}
}
