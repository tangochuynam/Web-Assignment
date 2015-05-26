<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class User extends Model {
	public $table='THANH_VIEN';
	public static function check_login($username,$password){
		$array1=array('username'=>$username);
		$rules=array('username'=>"email");
		if(Validator::make($array1,$rules)->fails())
			$check=User::where("user","=",$username)->where("password","=",$password)->count();
		else
			$check=User::where("email","=",$username)->where("password","=",$password)->count();
		if($check>0)
			return true;
		else return false;
	}
	public static function check_username($username){
		if(User::where("user","=",$username)->count>0)
			return false;
		else return true;
	}
	public static function check_email($email){
		if(User::where("email","=",$email)->count>0)
			return false;
		else return true;
	}
}
