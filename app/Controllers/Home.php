<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Schema;

class Home extends BaseController {
	
	public function index() {

		if (session() -> get('id') == NULL || session() -> get('id') < 0 || session() -> get('id') == ' ') {

			echo view('pages/login');

		} else if (session() -> get('id') > 0) {

			return redirect() -> to('/Home/dashboard');

		}
		
	}

	public function history() {

		if (session() -> get('id') == NULL || session() -> get('id') < 0 || session() -> get('id') == ' ') {

			return redirect() -> to('/Home/');

		} else if (session() -> get('id') > 0) {

			$Schema = new Schema();

			$on = 'history._user = user.id_user';

			$setting['data_setting'] = $Schema -> getWhere2('user', ['id_user' => session() -> get('id')]);
			$fetch['data_history'] = $Schema -> visual_table_join2('history', 'user', $on);


			echo view('_layout/header');
			echo view('_layout/menu', $setting);
			echo view('pages/history', $fetch);
			echo view('_layout/footer');

		}

	}

	public function dashboard() {

		if (session() -> get('id') == NULL || session() -> get('id') < 0 || session() -> get('id') == ' ') {

			return redirect() -> to('/Home/');

		} else if (session() -> get('id') > 0) {

			$Schema = new Schema();

			$on = 'foto.user_foto = user.id_user';
			$onalbum = 'album.user_album = user.id_user';

			$setting['data_setting'] = $Schema -> getWhere2('user', ['id_user' => session() -> get('id')]);
			$fetch['data_foto'] = $Schema -> visual_table_join2('foto', 'user', $on);
			$fetch['data_album'] = $Schema -> visual_table_join2('album', 'user', $onalbum);

			foreach ($fetch['data_foto'] as &$photo) {
				$photo['likeCount'] = $Schema	-> countLike($photo['id_foto']);
				$photo['commentCount'] = $Schema->commentLike($photo['id_foto']);
			}

			echo view('_layout/header');
			echo view('_layout/menu', $setting);
			echo view('pages/dashboard', $fetch);
			echo view('_layout/footer');

		}

	}

	// Login, Logout, & Register

		public function auth_login() {
			
			$Schema = new Schema();
			
			$username = $this -> request -> getPost('username');
			$password = $this -> request -> getPost('password');

			if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
				
				$_data = array('Email' => $username, 'Password' => md5($password));

			} else {

				$_data = array('Username' => $username, 'Password' => md5($password));

			}
			
			$data_filter = $Schema -> getWhere2('user', $_data);

			if ($data_filter > 0) {

				session() -> set('id', $data_filter['id_user']);
				session() -> set('username', $data_filter['username']);
				session() -> set('email', $data_filter['email']);
				session() -> set('level', $data_filter['_level']);

				return redirect() -> to('/Home/dashboard');

			} else {

				return redirect() -> to('/Home/');

			};

		}

		public function auth_logout() {

			if (session() -> get('id') == NULL || session() -> get('id') < 0 || session() -> get('id') == ' ') {

				return redirect() -> to('/Home/');

			} else if (session() -> get('id') > 0) {

				session() -> destroy();

				return redirect() -> to('/Home/');

			}

		}

}