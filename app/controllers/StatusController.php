<?php

use Larabook\Core\CommandBus; 
use Larabook\Forms\PublishStatusForm;
use Larabook\Statuses\StatusRepository; 
use Larabook\Statuses\PublishStatusCommand; 

class StatusController extends \BaseController {

	use CommandBus;

	protected $publishStatusForm;
	protected $statusRepository;

	public function __construct(PublishStatusForm $publishStatusForm, StatusRepository $statusRepository)
	{
		$this->publishStatusForm = $publishStatusForm;
		$this->statusRepository = $statusRepository;
	}

	/**
	 * Display a listing of the resource.
	 * GET /sessions
	 *
	 * @return Response
	 */
	public function index()
	{
		$statuses = $this->statusRepository->getAllForUser(Auth::user());

		return View::make('statuses.index')->with('statuses', $statuses);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /sessions/create
	 *
	 * @return Response
	 */
	public function create()
	{
		
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /sessions
	 *
	 * @return Response
	 */
	public function store()
	{
		$this->publishStatusForm->validate(Input::only('body'));

		$command = new PublishStatusCommand(Input::get('body'), Auth::user()->id);
		$status = $this->execute($command);

		Flash::message('Your status has been updated!');
		return Redirect::refresh();
	}

	/**
	 * Display the specified resource.
	 * GET /sessions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /sessions/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /sessions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /sessions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}