<?php namespace App\Http\Controllers;

use App\Library\PlayerModel;
use Carbon\Carbon;


class PlayerController extends Controller {

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
		if (\Auth::User()->is_admin == 1) {
			return redirect('/coach/profile');
		}
		return view('player/profile');
	}

	public function editAdd() {
		return view('player/addInfo');
	}

	public function updateInfo() {
		$user_id = \Auth::User()->user_id;
		$player = new PlayerModel();
		$player->updateInfo($user_id);

		return redirect('player/profile');
	}

	public function addInfo() {
		$user_id = \Auth::User()->user_id;
		$player = new PlayerModel();
		$player->addInfo($user_id);
		return redirect('player/profile');
	}

	public function getEditInfo($user_id) {
		$player = new PlayerModel();
		$dates = $player->getDates($user_id);
		$pairs = [];
		$ugly = '';
		$pretty = '';
		foreach ($dates as $date) {
			$ugly = $date->created_at;
			$oneDate = Carbon::createFromFormat('Y-m-d', $date->created_at);
			$pretty = $oneDate->toFormattedDateString();
			$pairs[$ugly] = $pretty;
		}
		return $pairs;
	}

	public function getInputValues($user_id, $date) {
		$player = new PlayerModel();
		$values = $player->getCurrentValues($user_id, $date);
		return $values;
	}

	public function blankInput($user_id) {
		$player = new PlayerModel(); 
		$values = $player->getblankCategories($user_id);

		return $values;
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
