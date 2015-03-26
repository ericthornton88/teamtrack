<?php 
namespace App\Library;
use DB;

class CoachModel {
	
	public function getGraphChoice($user_id, $metric) {
		$results = DB::select('
			SELECT ' . $metric . ', date(metric.created_at) as created_at from metric
			JOIN user USING (user_id)
			WHERE user_id = :user_id
			ORDER BY created_at
		', [':user_id' => $user_id]);
		
		return $results;
	}
	public function getAllPlayers() {
		$results = DB::select('
			SELECT * 
			FROM user
		');

		return $results;
	}

}




