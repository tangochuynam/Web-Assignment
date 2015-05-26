<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class bai_dang extends Model {
	public $table='BAI_DANG';

	public static function load_baidang($cafe_id){
	   $baidang = bai_dang::where('MA_QUAN', '=', $cafe_id)->get();
       $arr = array();
       foreach ($baidang as $item)
       {
            $acc = User::where("MA_THANH_VIEN","=",$item->MA_THANH_VIEN)->get();
			array_push($arr,array("user" => $acc[0]['TEN_THANH_VIEN'],
								  "content" =>  $item->NOI_DUNG,
								  ));
        }
		return $arr;
	}
}