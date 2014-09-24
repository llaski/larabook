<?php namespace Larabook\Statuses\Events;

Class StatusWasPublished {

	public $body;

	public function __construct($body)
	{
		$this->body = $body;
	}
}