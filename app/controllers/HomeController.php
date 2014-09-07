<?php

class HomeController extends BaseController {

	public function index()
	{
		DB::raw('show databases;');
		return View::make('pages.home');
	}

}
