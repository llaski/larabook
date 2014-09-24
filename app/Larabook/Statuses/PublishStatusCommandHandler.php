<?php namespace Larabook\Statuses;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use Larabook\Statuses\StatusRepository;
use Larabook\Statuses\Status;

class PublishStatusCommandHandler implements CommandHandler {

	use DispatchableTrait;

	protected $repository;

	public function __construct(StatusRepository $statusRepository)
	{
		$this->repository = $statusRepository;
	}

	public function handle($command)
	{		
		$status = Status::publish($command->body);
		
		$this->repository->save($status, $command->userId);

		$this->dispatchEventsFor($status);
		
		return $status;
	}
}