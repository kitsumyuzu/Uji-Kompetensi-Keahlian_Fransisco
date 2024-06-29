<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Schema;

class User extends BaseController {
	
	public function index() {

		if (session() -> get('id') == NULL || session() -> get('id') < 0 || session() -> get('id') == ' ') {

			echo view('pages/login');

		} else if (session() -> get('id') > 0) {

			$Schema = new Schema();

			$fetch['data_user'] = $Schema -> visual_table('user');
			$setting['data_setting'] = $Schema -> getWhere2('user', ['id_user' => session() -> get('id')]);

			echo view('_layout/header');
			echo view('_layout/menu', $setting);
			echo view('pages/user', $fetch);
			echo view('_layout/footer');

		}
		
	}

	public function create_user() {

		if (session() -> get('id') == NULL || session() -> get('id') < 0 || session() -> get('id') == ' ') {

			return redirect() -> to('/Home/');

		} else if (session() -> get('id') > 0) {

			$Schema = new Schema();

			$setting['data_setting'] = $Schema -> getWhere2('user', ['id_user' => session() -> get('id')]);

			echo view('_layout/header');
			echo view('_layout/menu', $setting);
			echo view('pages/insert_user');
			echo view('_layout/footer');

		}
		
	}

	public function edit_user($id) {

		if (session() -> get('id') == NULL || session() -> get('id') < 0) {

			return redirect() -> to('/Home/');

		} else if (session() -> get('id') > 0) {

			$Schema = new Schema();

				$fetch['data_user'] = $Schema -> getWhere2('user', ['id_user' => $id]);
				$setting['data_setting'] = $Schema -> getWhere2('user', ['id_user' => session() -> get('id')]);

			echo view('_layout/header');
			echo view('_layout/menu', $setting);
			echo view('pages/update_user', $fetch);
			echo view('_layout/footer');
		}

	}

	public function view_register() {

		if (session() -> get('id') == NULL || session() -> get('id') < 0 || session() -> get('id') == ' ') {

			echo view('pages/register');
			
		} else if (session() -> get('id') > 0) {
			
			return redirect() -> to('/Home/dashboard');

		}

	}

	public function auth_register() {

		$Schema = new Schema();

		$username = $this -> request -> getPost('username');
		$email = $this -> request -> getPost('email');
		$password = $this -> request -> getPost('password');
		$nama_lengkap = $this -> request -> getPost('nama_lengkap');
		$alamat = $this -> request -> getPost('alamat');
		$foto = $this -> request -> getPost('foto');

		if (session() -> get('id') == NULL || session() -> get('id') < 0 || session() -> get('id') == ' ') {

			if ($foto && $foto -> isValid() && ! $foto -> hasMoved()) {
                    
				if ($foto == 'default-profile.png' || NULL) {

					$images = $foto -> getRandomName();
					$foto -> move('assets/src/stored_profile/', $images);

				} else {

					$images = $foto -> getRandomName();
					$foto -> move('assets/src/stored_profile/', $images);

				}

			} else {

				$images = 'default-profile.png';

			}

			$Schema -> create_data('user', [
				'username' => $username,
				'email' => $email,
				'password' => md5($password),
				'nama_lengkap' => $nama_lengkap,
				'alamat' => $alamat,
				'_level' => '2',
				'_profile' => $images
			]);
			
			return redirect() -> to('/Home/');

		} else if (session() -> get('id') > 0) {

			return redirect() -> to('/Home/');

		}

	}

	public function insert_user() {

		$Schema = new Schema();

		$username = $this -> request -> getPost('username');
		$email = $this -> request -> getPost('email');
		$password = $this -> request -> getPost('password');
		$profile = $this -> request -> getFile('profile');
		$nama_lengkap = $this -> request -> getPost('nama_lengkap');
		$alamat = $this -> request -> getPost('alamat');

		if (in_array(session() -> get('level'), [1]) && session() -> get('id') > 0) {

			if ($profile && $profile -> isValid() && ! $profile -> hasMoved()) {

				if ($profile == 'default-profile.png' || NULL || ' ') {

					$images = $profile -> getRandomName();
					$profile -> move('assets/src/stored_profile/', $images);

				} else {

					$images = $profile -> getRandomName();
					$profile -> move('assets/src/stored_profile/', $images);

				}

			} else {

				$images = 'default-profile.png';

			}

			$Schema -> create_data('user', [
				'username' => $username,
				'email' => $email,
				'password' => md5($password),
				'nama_lengkap' => $nama_lengkap,
				'alamat' => $alamat,
				'_profile' => $images,
				'_level' => '2',
			]);

			$Schema -> create_data('history', [
				'_user' => session() -> get('id'),
				'_tanggal' => date('Y-m-d H:i:s'),
				'_detail' => 'menambahkan user baru'
			]);

			return redirect() -> to('/User/');

		} else {

			return redirect() -> to('/Home/');

		}

	}

	public function update_user() {

		$Schema = new Schema();

		$id = $this -> request -> getPost('id');
		$oldprofile = $this -> request -> getPost('oldprofile');

		$username = $this -> request -> getPost('username');
		$email = $this -> request -> getPost('email');
		$profile = $this -> request -> getFile('profile');
		$nama_lengkap = $this -> request -> getPost('nama_lengkap');
		$alamat = $this -> request -> getPost('alamat');

		if (in_array(session() -> get('level'), [1]) && session() -> get('id') > 0) {

			if ($profile && $profile -> isValid() && ! $profile -> hasMoved()) {

				if ($profile == 'default-profile.png' || NULL || ' ') {

					$images = $profile -> getRandomName();
					$profile -> move('assets/src/stored_profile/', $images);

				} else {

					if (file_exists('assets/src/stored_profile/'.$profile)) {

						unlink('assets/src/stored_profile/'.$oldprofile);

					} else {

						$images = $profile -> getRandomName();
						$profile -> move('assets/src/stored_profile/', $images);

					}

				}

			} else {

				if ($oldprofile == 'default-profile.png' || NULL || ' ') {

					$images = 'default-profile.png';

				} else {

					$images = $oldprofile;

				}

			}

			$Schema -> update_data('user', [
				'username' => $username,
				'email' => $email,
				'nama_lengkap' => $nama_lengkap,
				'alamat' => $alamat,
				'_profile' => $images,
			], ['id_user' => $id]);

			$Schema -> create_data('history', [
				'_user' => session() -> get('id'),
				'_tanggal' => date('Y-m-d H:i:s'),
				'_detail' => 'mengupdate data user : ' . $username
			]);

			return redirect() -> to('/User/');

		} else {

			return redirect() -> to('/Home/');

		}

	}

	public function delete_user($id) {

		$Schema = new Schema();

		$data = $Schema->getWhere2('user', ['id_user' => $id]);

		$Schema -> delete_data('user', ['id_user' => $id]);

		$Schema -> create_data('history', [
			'_user' => session() -> get('id'),
			'_tanggal' => date('Y-m-d H:i:s'),
			'_detail' => 'menghapus data user : ' . $data['username']
		]);

		return redirect() -> to('/User/');

	}

}