<?php 
namespace App\Library;
use Request;
use DB;

class PlayerModel {
	
	public function getGraphChoice($user_id, $metric) {
		$results = DB::select('
			SELECT ' . $metric . ', date(metric.created_at) as created_at from metric
			JOIN user USING (user_id)
			WHERE user_id = :user_id
			ORDER BY created_at
		', [':user_id' => $user_id]);
		
		return $results;
	}

	public function getAll($user_id) {
		$results = DB::select('
			SELECT sleep_length + sleep_quality + tiredness_sensation + training_willingness + appetite + soreness + nutrition as total, date(created_at) as created_at 
			FROM metric
			WHERE user_id = :user_id
			ORDER BY created_at
		', [':user_id' => $user_id]);

		return $results;
	}

	public function getDates($user_id) {
		$results = DB::select('
			SELECT date(metric.created_at) as created_at
			FROM metric
			WHERE user_id = :user_id
			ORDER BY created_at
		', [':user_id' => $user_id]);

		return $results;
	}

	public function getCurrentValues($user_id, $date) {
		$results = DB::select('
			SELECT sleep_length, sleep_quality, tiredness_sensation, training_willingness, appetite, soreness, nutrition, date(metric.created_at) as created_at
			FROM metric
			WHERE user_id = :user_id AND created_at = :date
		', [':user_id' => $user_id, ':date' => $date]);

		return $results;
	}

	public function getblankCategories($user_id) {
		$results = DB::select('
			SELECT sleep_length, sleep_quality, tiredness_sensation, training_willingness, appetite, soreness, nutrition, date(metric.created_at) as created_at
			FROM metric
			WHERE user_id = :user_id
		', [':user_id' => $user_id]);

		return $results;
	}

	public function addInfo($user_id) {
		$sleep_length = Request::input('sleep_length');
		$sleep_quality = Request::input('sleep_quality');
		$tiredness_sensation = Request::input('tiredness_sensation');
		$training_willingness = Request::input('training_willingness');
		$appetite = Request::input('appetite');
		$soreness = Request::input('soreness');
		$nutrition = Request::input('nutrition');
		$results = DB::select('
			INSERT INTO metric
			(user_id, sleep_length, sleep_quality, tiredness_sensation, training_willingness, appetite, soreness, nutrition, created_at, updated_at)
			VALUES (:user_id, :sleep_length, :sleep_quality, :tiredness_sensation, :training_willingness, :appetite, :soreness, :nutrition, NOW(), NOW())
		', [':user_id' => $user_id,
			':sleep_length' => $sleep_length,
			':sleep_quality' => $sleep_quality,
			':tiredness_sensation' => $tiredness_sensation,
			':training_willingness' => $training_willingness,
			':appetite' => $appetite,
			':soreness' => $soreness,
			':nutrition' => $nutrition,
			]);
	}

	public function updateInfo($user_id) {
		$sleep_length = Request::input('sleep_length');
		$sleep_quality = Request::input('sleep_quality');
		$tiredness_sensation = Request::input('tiredness_sensation');
		$training_willingness = Request::input('training_willingness');
		$appetite = Request::input('appetite');
		$soreness = Request::input('soreness');
		$nutrition = Request::input('nutrition');
		$created_at = Request::input('created_at');

		DB::update('
			UPDATE metric
			
			SET sleep_length = :sleep_length, sleep_quality = :sleep_quality, 
			tiredness_sensation = :tiredness_sensation, 
			training_willingness = :training_willingness, appetite = :appetite, 
			soreness = :soreness, nutrition = :nutrition, updated_at = NOW()
			
			WHERE created_at = :created_at AND user_id = :user_id

		', [':sleep_length' => $sleep_length,
			':sleep_quality' => $sleep_quality,
			':tiredness_sensation' => $tiredness_sensation,
			':training_willingness' => $training_willingness,
			':appetite' => $appetite,
			':soreness' => $soreness,
			':nutrition' => $nutrition,
			':created_at' => $created_at,
			':user_id' => $user_id
			]);
	}



}




