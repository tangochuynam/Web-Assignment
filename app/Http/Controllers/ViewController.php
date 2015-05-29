<?php 
namespace App\Http\Controllers;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\User;
use App\image;
use App\Quan_cafe;
use App\Admin;
use App\bai_dang;
use Response;
include(app_path().'/Http/Controllers/simple_html_dom.php');
class ViewController extends Controller {
	/*// de goi view trong laravel 5 ta dung view ($view, $data = array(), $mergeData = array())
	$view la ten view da tao
	$data la mag du lieu truyen vao cho view thao tac de hien thi
	$mergeData la mang du lieu se dc merge voi $data bang ham array_merge 
	$view la bat buocm, con 2 tham so kia la tuy chon 
*/
	// if use subfolder for View type subfolder.nameOfView
	public function getTest($id) {
		return view ("mainlayout");
		// return view('app');
	}
	//end-TEST
	public function getFacebook() {
		return view("Facebook_Login.index");
	}
	public function getMainlayout() {
		$myfile = fopen("test.json", "w") or die("Unable to open file!");
		$array = DB::select('select * from quan_cafe');
		$txt = json_encode($array);
		fwrite($myfile, $txt);
		fclose($myfile);
		return View('mainlayout');
	}
	public function getMainlayoutTest() {
		$myfile = fopen("test.json", "w") or die("Unable to open file!");
		$array = DB::select('select * from quan_cafe');
		$txt = json_encode($array);
		fwrite($myfile, $txt);
		fclose($myfile);
		$data = DB::table('quan_cafe')->where("ANH_DAI_DIEN","!=","NULL")->get();
		$data = json_encode($data);
		$data = json_decode($data,true);
		$image = [];
		for($i = 0; $i < count($data); $i++) {
			$image[$i] = $data[$i]['ANH_DAI_DIEN'];
		}
		return View('mainlayout-test')->with('data',$data)->with('image',$image);
	}

	public function postDoLogin() {
		 $inputs = array("username" => Input::get('username'),"password" => Input::get('password'));
		if(User::check_login(Input::get("username"),md5(sha1(Input::get("password"))))){
 			Session::put("username",Input::get("username"));
 			Session::put("password",Input::get("password"));
 			return "success";
 		}
		else return "fail";
	}
	public function getDoLogin() {
		if(Session::has("username")) {
			return view("mainlayout");
		} else 
			echo "error";
	}

	public function getLogin() {
		return view("login");
	}
/*
	public function postMainlayout() {
 		if(User::check_login(Input::get("username"),md5(sha1(Input::get("password"))))){
 			Session::put("logined","true");
 			$username = Input::get('username');

 			$html = file_get_html('/Users/tnhnam/Desktop/laravel-final/resources/views/mainlayout.blade.php');
 			//  test thu trc khi vo lam that 
 			// $txt = $html->getElementById("#test_btn");
 			// $txt->innertext = "hello baby";
 			// $txt->setAttribute("style","color:green");
 			// echo $login_btn;
 			// $login->innertext = "Where are you";
 			
 			// echo $html;
 			$login_btn = $html->getElementById("#login_btn");
 			$login_btn->setAttribute("style","display: none");
 			// $name_login = $html->getElementById("#Name_Login");
 			// $name_login->innertext = Input::get('username');

 			// // $logout_btn = $html->getElementById("#logout_btn");
 			// // $logout_btn->setAttribute("style","display:initial");
 			$html->save('/Users/tnhnam/Desktop/laravel-final/resources/views/mainlayout-backup.blade.php');
 			return Redirect::to("mainlayout");
 		}
		else return View("login")->with("error_message","Tên đăng nhập hoặc mật khẩu không đúng");
 	}
 */

	public function getRegister() {
 		return View("register");
 	}

 	public function postRegister() {
 		$username = Input::get("username_1");
 		$email = Input::get("email_1");
 		$x = User::where("user","=",$username)->count();
  		if((DB::table("thanh_vien")->where("user","=",$username)->count() > 0) || (DB::table("thanh_vien")->where("email","=",$email)->count() > 0 )) {
 			return "fail";
 		} else {
 			$user = new User();
			$user->user=Input::get("username_1");
			$user->password=md5(sha1(Input::get("password_1")));
			$user->email=Input::get("email_1");
			$user->save();
 			return "success";
 		}
 			
 	}

 	public function getUpdateProfile() {
 		if (!Session::has("logined"))
			return Redirect::to("login");
 		else 
 			return View("update-profile");
 	}

 	public function postUpdateProfile() {
 		$update = array("TEN_THANH_VIEN" => Input::get("TEN_THANH_VIEN"),
 						"GIOI_TINH" => Input::get("GIOI_TINH"),
 						"TINH_TRANG_HON_NHAN" => Input::get("TINH_TRANG_HON_NHAN"),
 						"THANH_PHO/TINH" => Input::get("THANH_PHO/TINH"),
 						"QUAN/HUYEN" => Input::get("QUAN/HUYEN"));
 		DB::table('THANH_VIEN')->where("user","=",Session::get('user_input'))
								->orWhere("email","=",Session::get('user_input'))->update($update);
		echo "Cập nhật thông tin thành công";
 	}

 	public function getLogout() {
 		Session::forget("username");
		return Redirect::to("mainlayout");
 	}


 	public function getUpload() {
 		return view('upload');
 	}

 	public function postUpload() {
 		$name = Input::file('photo')->getClientOriginalName();
		$destinationPath = 'img_upload';
		Input::file('photo')->move($destinationPath, $name);
		$image = new image();
		$image->image_name = $name;
		$image->image_url = "img_upload/".$name;
		$image->save();
		echo "<img src='$image->image_url'/>";
 	}

 	public function getInsert() {
 		return view('insert');
 	}

 	// ko xai dung de test 
 	public function getSearch() {

 		$keyword = Input::get("keyword");
		$data = DB::table('quan_cafe')->where("ten_quan","like","%$keyword%")
										->orWhere("dia_chi","like","%$keyword%")->get();
		$txt = json_encode($data);
		$a = json_decode($txt,true);
		if ($a != NULL) {
			for ($i=0; $i < count($a) ; $i++) { 
				foreach ($a[$i] as $key => $value) {
					if ($key != 'ANH_DAI_DIEN')
						echo $key.": ".$value."<br>";
					else {
						$b = $a[$i]['ANH_DAI_DIEN'];
						echo $key.": <img src='$b'/> <br>";
					}
				}
				echo "<br><br>";
			}		

		}
		else echo 'Không tìm thấy dữ liệu';
 	}
 	// ko xai nua 
 	public function postSearch() {
 		$keyword = Input::get("keyword");
		$data = DB::table('quan_cafe')->where("ten_quan","like","%$keyword%")
										->orWhere("dia_chi","like","%$keyword%")->get();
		$txt = json_encode($data);
		$a = json_decode($txt,true);
		if ($a != NULL) {
			for ($i=0; $i < count($a) ; $i++) { 
				foreach ($a[$i] as $key => $value) {
					if ($key != 'ANH_DAI_DIEN')
						echo $key.": ".$value."<br>";
					else {
						$b = $a[$i]['ANH_DAI_DIEN'];
						echo $key.": <img src='$b'/> <br>";
					}
				}
				echo "<br><br>";
			}		

		}
		else echo 'Không tìm thấy dữ liệu';
		// return $a[0]['ANH_DAI_DIEN'];
		// echo "<img src='$b'/>";
		// return $a[0];
	}
	// Dung Phuong thuc get thay vi post khi nhan nut Search tai vi khi nhan enter or refresh trang thi URL ko thay doi 
	public function getSearchCafe() {
		$keyword = Input::get("keyword");
		$keyword = trim($keyword);
		$data = DB::table('quan_cafe')->where("ten_quan","like","%$keyword%")
										->orWhere("dia_chi","like","%$keyword%")->get();
		$data = json_encode($data);
		$data = json_decode($data,true);
		$image = [];
		for ($i=0; $i < count($data) ; $i++) {
			$image[$i] = $data[$i]['ANH_DAI_DIEN'];
		}
		return View("search-cafe")->with('data',$data)->with('image',$image);
	}
		// truyen 1 mang qua view voi -> with (ten dai dien de goi o view ben kia, mang truyen vao)
		
	public function getDetails($id) {
		$data = DB::table('quan_cafe')->where("ma_quan","=","$id")->get();
		$data = json_encode($data);
		$data = json_decode($data,true);
		$image = $data[0]['ANH_DAI_DIEN'];

		$baidang = DB::table('BAI_DANG')->where("ma_quan","=",$id)->get();
		$baidang = json_encode($baidang);
		$baidang = json_decode($baidang,true);

		$address = $data[0]['DIA_CHI'];
        $prepAddr = str_replace(' ','+',$address);
        $geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
        $output= json_decode($geocode);
        $lat = $output->results[0]->geometry->location->lat;
        $long = $output->results[0]->geometry->location->lng;
		return View("details")->with('data',$data)->with('image',$image)->with('baidang',$baidang)->with('lat',$lat)->with('long',$long)->with('address',$address);
	}

	//View for Admin
	public function getAdminLogin() {
		return View ("admin_login");
	}

	public function postAdminLogin() {
 		if(Admin::check_login(Input::get("username"),Input::get("password"))){
 			Session::put("admin_logined","true");
 			return Redirect::to("admin-mainlayout");
 		}
		else return View("admin_login")->with("error_message","Tên đăng nhập hoặc mật khẩu không đúng");
 	}

 	public function getAdminMainlayout() {
 		if (!Session::has("admin_logined"))
			return Redirect::to("admin-login");
 		else 
			return View ("admin_mainlayout");
	}

	public function getAdminThanhvien() {
 		if (!Session::has("admin_logined"))
			return Redirect::to("admin-login");
 		else {
	 		$user = DB::table('THANH_VIEN')->get();
	 		$user = json_encode($user);
			$user = json_decode($user,true);
			return View ("admin_thanhvien")->with('user',$user);
		}
	}

	public function getAdminDeleteThanhvien($id) {
		if (!Session::has("admin_logined"))
			return Redirect::to("admin-login");
 		else {
			$user = DB::table('THANH_VIEN')->where("MA_THANH_VIEN","=",$id)->delete();
			$user = DB::table('THANH_VIEN')->get();
	 		$user = json_encode($user);
			$user = json_decode($user,true);
			return View ("admin_thanhvien")->with('user',$user);
		}
	}

	public function getAdminEditThanhvien($id) {
		if (!Session::has("admin_logined"))
			return Redirect::to("admin-login");
		else {
			$user = DB::table('THANH_VIEN')->where("MA_THANH_VIEN","=",$id)->get();
			$user = json_encode($user);
			$user = json_decode($user,true);
			return View ("admin_edit_thanhvien")->with('user',$user);
		}
	}

	public function postAdminEditThanhvien($id) {
		$update = array("TEN_THANH_VIEN" => Input::get("TEN_THANH_VIEN"));
 		DB::table('THANH_VIEN')->where("MA_THANH_VIEN","=",$id)->update($update);
		echo "Cập nhật thông tin thành công";
	}

	public function postBaiDang() {
		$user = DB::table('THANH_VIEN')->where("user","=",Session::get("username"))->get();
		$user = json_encode($user);
		$user = json_decode($user,true);

		$baidang = new bai_dang();
		$baidang->MA_THANH_VIEN = $user[0]['MA_THANH_VIEN'];
		$baidang->MA_QUAN = Input::get("cafe_id");
		$baidang->NOI_DUNG = Input::get("content");
		$baidang->save();
	}

	public function getAdminQuancafe() {
 		if (!Session::has("admin_logined"))
			return Redirect::to("admin-login");
 		else {
	 		$quan = DB::table('QUAN_CAFE')->get();
	 		$quan = json_encode($quan);
			$quan = json_decode($quan,true);
			return View ("admin_quancafe")->with('quan',$quan);
		}
	}

	public function getAdminDeleteQuancafe($id) {
		if (!Session::has("admin_logined"))
			return Redirect::to("admin-login");
 		else {
			$quan = DB::table('QUAN_CAFE')->where("MA_QUAN","=",$id)->delete();
			$quan = DB::table('QUAN_CAFE')->get();
	 		$quan = json_encode($quan);
			$quan = json_decode($quan,true);
			return View ("admin_quancafe")->with('quan',$quan);
		}
	}

	public function getAdminEditQuancafe($id) {
		if (!Session::has("admin_logined"))
			return Redirect::to("admin-login");
		else {
			$quan = DB::table('QUAN_CAFE')->where("MA_QUAN","=",$id)->get();
			$quan = json_encode($quan);
			$quan = json_decode($quan,true);
			return View ("admin_edit_quancafe")->with('quan',$quan);
		}
	}

	public function postAdminEditQuancafe($id) {
		$update = array("TEN_QUAN" => Input::get("TEN_QUAN"),
 						"DIA_CHI" => Input::get("DIA_CHI"),
 						"GIA_THAP_NHAT" => Input::get("GIA_THAP_NHAT"),
 						"GIA_CAO_NHAT" => Input::get("GIA_CAO_NHAT"),
 						"WIFI" => Input::get("WIFI"),
 						"MAY_LANH" => Input::get("MAY_LANH"),
 						"CHO_DAU_XE_HOI" => Input::get("CHO_DAU_XE_HOI"),
 						"SO_DIEN_THOAI" => Input::get("SO_DIEN_THOAI"),
 						"GIO_MO_CUA" => Input::get("GIO_MO_CUA"),
 						"GIO_DONG_CUA" => Input::get("GIO_DONG_CUA"),
 						"THICH_HOP_CHO_DOI_TUONG" => Input::get("THICH_HOP_CHO_DOI_TUONG"),
 						"KHONG_GIAN" => Input::get("KHONG_GIAN"));
 		DB::table('QUAN_CAFE')->where("MA_QUAN","=",$id)->update($update);
		echo "Cập nhật thông tin thành công";
	}

	public function getAdminBaidang() {
 		if (!Session::has("admin_logined"))
			return Redirect::to("admin-login");
 		else {
	 		$baidang = DB::table('BAI_DANG')->get();
	 		$baidang = json_encode($baidang);
			$baidang = json_decode($baidang,true);
			return View ("admin_baidang")->with('baidang',$baidang);
		}
	}

	public function getAdminDeleteBaidang($id) {
		if (!Session::has("admin_logined"))
			return Redirect::to("admin-login");
 		else {
			$baidang = DB::table('BAI_DANG')->where("MA_BAI_DANG","=",$id)->delete();
			$baidang = DB::table('BAI_DANG')->get();
	 		$baidang = json_encode($baidang);
			$baidang = json_decode($baidang,true);
			return View ("admin_baidang")->with('baidang',$baidang);
		}
	}
}