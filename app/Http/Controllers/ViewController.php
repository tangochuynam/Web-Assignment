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
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\BootstrapThreePresenter;
use Illuminate\Support\Collection;
use Socialize;
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
	public function getMainlayout() {
		$myfile = fopen("test.json", "w") or die("Unable to open file!");
		$array = DB::table('quan_cafe')->where("XAC_NHAN_CUA_ADMIN","!=",0)->get();
		$txt = json_encode($array);
		fwrite($myfile, $txt);
		fclose($myfile);
		return View('mainlayout');
	}
	public function getMainlayoutTest() {
		$myfile = fopen("test.json", "w") or die("Unable to open file!");
		$array = DB::table('quan_cafe')->where("XAC_NHAN_CUA_ADMIN","!=",0)->get();
		$txt = json_encode($array);
		fwrite($myfile, $txt);
		fclose($myfile);
		$datas = Quan_cafe::where("XAC_NHAN_CUA_ADMIN","!=",0)->where("ANH_DAI_DIEN","!=","NULL")->orderBy("MA_QUAN","desc")->paginate(9);
		// $data = DB::table('quan_cafe')->where("XAC_NHAN_CUA_ADMIN","!=",0)->where("ANH_DAI_DIEN","!=","NULL")->get();
		$datas->setPath('');
		// $data = json_encode($data);
		// $data = json_decode($data,true);
		// $image = [];
		// for($i = 0; $i < count($data); $i++) {
		// 	$image[$i] = $data[$i]['ANH_DAI_DIEN'];
		// }
		return View('mainlayout-test')->with('datas',$datas)/*->with('image',$image)*/;
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
		return Redirect::to("mainlayout-test");
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
		$data = Quan_cafe::where("XAC_NHAN_CUA_ADMIN","!=",0)->where("ten_quan","like","%$keyword%")
						->orWhere("XAC_NHAN_CUA_ADMIN","!=",0)->where("dia_chi","like","%$keyword%")->get();
		// $data = Quan_cafe::where("ten_quan","like","%$keyword%")
		// 													->orWhere("dia_chi","like","%$keyword%")->paginate(1);
		
		// $data->setPath('search-cafe?keyword='.$keyword);
		// $data = json_encode($data);
		// $data = json_decode($data,true);
		// $image = [];
		// for ($i=0; $i < count($data) ; $i++) {
		// 	$image[$i] = $data[$i]['ANH_DAI_DIEN'];
		// }
		return View("search-cafe")->with('data',$data);
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
        if($geocode != NULL) {
		    $lat = $output->results[0]->geometry->location->lat;
		    $long = $output->results[0]->geometry->location->lng;
		}
		else {
	        $lat = 0;
	        $long = 0;
	        $address = "Error network";
	    }
		return View("details")->with('data',$data)->with('image',$image)->with('baidang',$baidang)->with('lat',$lat)->with('long',$long)->with('address',$address);
	}

	public function getAddQuancafe() {
		if (Session::has("username")) {
			return View ("add_quancafe");
		}
		else {
			return View("login_request");
		}
	}

	public function postAddQuancafe() {
		$rules=array(
		"ten_quan"=>"required",
		"dia_chi"=>"required");		
		if(!Validator::make(Input::all(),$rules)->fails()){
			$name = Input::file('ANH_DAI_DIEN')->getClientOriginalName();
			$destinationPath = 'coffee_IMG';
			Input::file('ANH_DAI_DIEN')->move($destinationPath, $name);
			// $destinationPath1 = 'details/coffee_IMG';
			// Input::file('ANH_DAI_DIEN')->move($destinationPath1, $name);
			$quan_cafe=new Quan_cafe();
			$quan_cafe->ten_quan=Input::get("ten_quan");
			$quan_cafe->dia_chi=Input::get("dia_chi");
			$quan_cafe->gia_thap_nhat=Input::get("gia_thap_nhat");
			$quan_cafe->gia_cao_nhat=Input::get("gia_cao_nhat");
			$quan_cafe->wifi=Input::get("wifi");
			$quan_cafe->may_lanh=Input::get("may_lanh");
			$quan_cafe->cho_dau_xe_hoi=Input::get("cho_dau_xe_hoi");
			$quan_cafe->so_dien_thoai=Input::get("so_dien_thoai");
			$quan_cafe->gio_mo_cua=Input::get("gio_mo_cua");
			$quan_cafe->gio_dong_cua=Input::get("gio_dong_cua");
			$quan_cafe->thich_hop_cho_doi_tuong=Input::get("thich_hop_cho_doi_tuong");
			$quan_cafe->khong_gian=Input::get("khong_gian");
			$quan_cafe->ANH_DAI_DIEN="coffee_IMG/".$name;
			$quan_cafe->save();
			return "Thêm địa điểm thành công";
		}
		else return "Thêm địa điểm không thành công";
	}

	public function postBaiDang() {
		if (Session::has("username")) {
			$user = DB::table('THANH_VIEN')->where("user","=",Session::get("username"))->get();
			$user = json_encode($user);
			$user = json_decode($user,true);

			$baidang = new bai_dang();
			$baidang->MA_THANH_VIEN = $user[0]['MA_THANH_VIEN'];
			$baidang->MA_QUAN = Input::get("cafe_id");
			$baidang->NOI_DUNG = Input::get("content");
			$baidang->save();
			return Redirect::to("details/".$baidang->MA_QUAN);
		}
		else {
			return View("login_request");
		}
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
			$anh = $quan[0]['ANH_DAI_DIEN'];
			return View ("admin_edit_quancafe")->with('quan',$quan)->with('anh',$anh);
		}
	}

	public function postAdminEditQuancafe($id) {
		// $name = Input::file('ANH_DAI_DIEN')->getClientOriginalName();
		// if ($name == NULL) $name1 = "coffee_IMG/".$name;
		// else $name1 = "coffee_IMG/".$name;
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

	public function getAdminCheckQuancafe($id) {
		if (!Session::has("admin_logined"))
			return Redirect::to("admin-login");
		else {
			$update = array("XAC_NHAN_CUA_ADMIN" => "1");
			DB::table('QUAN_CAFE')->where("MA_QUAN","=",$id)->update($update);
			$quan = DB::table('QUAN_CAFE')->get();
	 		$quan = json_encode($quan);
			$quan = json_decode($quan,true);
			return View ("admin_quancafe")->with('quan',$quan);
		}
	}

	public function getAdminAddQuancafe() {
		if (!Session::has("admin_logined"))
			return Redirect::to("admin-login");
		else {
			return View ("admin_add_quancafe");
		}
	}

	public function postAdminAddQuancafe() {
		$rules=array(
		"ten_quan"=>"required",
		"dia_chi"=>"required");		
		if(!Validator::make(Input::all(),$rules)->fails()){
			$name = Input::file('ANH_DAI_DIEN')->getClientOriginalName();
			$destinationPath = 'coffee_IMG';
			Input::file('ANH_DAI_DIEN')->move($destinationPath, $name);
			Input::file('ANH_DAI_DIEN')->move('details', $name);
			$quan_cafe=new Quan_cafe();
			$quan_cafe->ten_quan=Input::get("ten_quan");
			$quan_cafe->dia_chi=Input::get("dia_chi");
			$quan_cafe->gia_thap_nhat=Input::get("gia_thap_nhat");
			$quan_cafe->gia_cao_nhat=Input::get("gia_cao_nhat");
			$quan_cafe->wifi=Input::get("wifi");
			$quan_cafe->may_lanh=Input::get("may_lanh");
			$quan_cafe->cho_dau_xe_hoi=Input::get("cho_dau_xe_hoi");
			$quan_cafe->so_dien_thoai=Input::get("so_dien_thoai");
			$quan_cafe->gio_mo_cua=Input::get("gio_mo_cua");
			$quan_cafe->gio_dong_cua=Input::get("gio_dong_cua");
			$quan_cafe->thich_hop_cho_doi_tuong=Input::get("thich_hop_cho_doi_tuong");
			$quan_cafe->khong_gian=Input::get("khong_gian");
			$quan_cafe->ANH_DAI_DIEN="coffee_IMG/".$name;
			$quan_cafe->XAC_NHAN_CUA_ADMIN=1;
			$quan_cafe->save();
			return "Thêm địa điểm thành công";
		}
		else return "Thêm địa điểm không thành công";
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

	public function getFacebook() {
		// $code = Input::get('code');
  // 		echo $code;
    	$fb = Socialize::with('facebook');
    	if (Input::has('code')) {
    		$user = $fb->user();
    		// return var_dump($user);
    	}
    	else return $fb->redirect();
  	}

  	public function getFacebookredirect() {

  		// $code = Input::get('code');
  		// echo $code;
    	// else return $fb->redirect();
  		// if (Input::has('code')) {
	    // $user = \Socialize::with('facebook')->user();
	    // if (!empty($code)) {
	    // return Socialize::with('Facebook')->user();
	    // Do your stuff with user data.
	    // print_r($user);die;
	    // dd($user);
	    // echo "co code";
		// }
		// else return Socialize::with('facebook')->redirect();
		// else echo "khong co code";

  			// echo Input::get("code")."<br>";
  			// echo Input::get("state");
		    $user = \Socialize::with('facebook')->user();
		    print_r($user);
		    die;
		

	}

	public function getGithub() {
    	return Socialize::with('github')->redirect();
  	}

  	public function getGithubredirect() {
  		$code = Input::get('code');
  		$user = Socialize::with('github')->user();
  		print_r($user);
  		// return var_dump($user);
  		echo $code;
  	}
}