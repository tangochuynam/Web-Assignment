<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Admin extends Model {
	public $table='admin';
	public static function check_login($username,$password){
		$check=Admin::where("username","=",$username)->where("password","=",$password)->count();
		if($check>0)
			return true;
		else return false;
	}
}
