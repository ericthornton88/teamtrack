<?php 
namespace App\Library;
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

}




