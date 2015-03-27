<?php namespace App\Http\Controllers;

use App\Library\PlayerModel;
use Carbon\Carbon;


class PlayerController extends Controller {

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
		
		return view('player/profile');
	}

	public function editAdd() {
		return view('player/addInfo');
	}

	public function getAll($user_id)
	{
		$player = new PlayerModel();
		$overall = $player->getAll($user_id);
		$keys = [];
		$values = [];
		foreach ($overall as $pair) {
			$date = Carbon::createFromFormat('Y-m-d', $pair->created_at);
			$keys[] = $date->toFormattedDateString();
			$values[] = $pair->total;
		}

		return [$keys, $values];
	}

	public function chartData($user_id, $metric)
	{
		//call model and get the info

		$player = new PlayerModel();
		$getChoice = $player->getGraphChoice($user_id, $metric);
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
