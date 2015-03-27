<?php namespace App\Http\Controllers;

use App\Library\CoachModel;
use Carbon\Carbon;


class CoachController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$results = self::getAllPlayers();
		return view('coach/profile', ['results'=>$results]);
	}

	public function getAllPlayers()
	{
		$coach = new CoachModel();
		$overall = $coach->getAllPlayers();
		return ($overall);
	}

	public function getAll($user_id)
	{
		$coach = new CoachModel();
		$overall = $coach->getAll($user_id);
		$keys = [];
		$values = [];
		foreach ($overall as $pair) {
			$date = Carbon::createFromFormat('Y-m-d', $pair->created_at);
			$keys[] = $date->toFormattedDateString();
			$values[] = $pair->total;
		}

		return [$keys, $values];
	}

	public function chartData($metric)
	{
		//call model and get the info

		$player = new PlayerModel();
		$getChoice = $player->getGraphChoice(\Auth::User()->user_id, $metric);
		$keys = [];
		$values = [];
		foreach ($getChoice as $pair) {

			$date = Carbon::createFromFormat('Y-m-d', $pair->created_at);
			$keys[] = $date->toFormattedDateString();
			$values[] = $pair->{$metric};
		}

		return [$keys, $values];
	}
	

}
