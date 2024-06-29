<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Schema;

class Content extends BaseController {
	
	public function index() {

		if (session() -> get('id') == NULL || session() -> get('id') < 0 || session() -> get('id') == ' ') {

			echo view('pages/login');

		} else if (session() -> get('id') > 0) {

			$Schema = new Schema();

			$on = 'album.user_album = user.id_user';

			$fetch['data_album'] = $Schema -> visual_table_join2('album', 'user', $on);
			$setting['data_setting'] = $Schema -> getWhere2('user', ['id_user' => session() -> get('id')]);

			echo view('_layout/header');
			echo view('_layout/menu', $setting);
			echo view('pages/upload_image', $fetch);
			echo view('_layout/footer');

		}
		
	}

	public function update_image($id) {

		if (session() -> get('id') == NULL || session() -> get('id') < 0 || session() -> get('id') == ' ') {

			echo view('pages/login');

		} else if (session() -> get('id') > 0) {

			$Schema = new Schema();

			$on = 'album.user_album = user.id_user';

			$fetch['data_foto'] = $Schema -> getWhere2('foto', ['id_foto' => $id]);
			$fetch['data_album'] = $Schema -> visual_table_join2('album', 'user', $on);
			$setting['data_setting'] = $Schema -> getWhere2('user', ['id_user' => session() -> get('id')]);

			echo view('_layout/header');
			echo view('_layout/menu', $setting);
			echo view('pages/update_image', $fetch);
			echo view('_layout/footer');

		}

	}

	public function view_comment($id)
{
    if (session()->get('id') == NULL || session()->get('id') < 0 || session()->get('id') == ' ') {
        echo view('pages/login');
    } else if (session()->get('id') > 0) {
        $Schema = new Schema();

        $on = 'komentarfoto._komentaruser = user.id_user';

        $fetch['data_foto'] = $Schema->getWhere2('foto', ['id_foto' => $id]);
        $fetch['data_komen'] = $Schema->visual_table_join2('komentarfoto', 'user', $on);
				$setting['data_setting'] = $Schema -> getWhere2('user', ['id_user' => session() -> get('id')]);

        echo view('_layout/header');
        echo view('_layout/menu', $setting);
        echo view('pages/view_comment', $fetch);
        echo view('_layout/footer');
    }
}

	public function view_album($id) {

		if (session() -> get('id') == NULL || session() -> get('id') < 0 || session() -> get('id') == ' ') {

			echo view('pages/login');

		} else if (session() -> get('id') > 0) {

			$Schema = new Schema();

			$on = 'album.id_album = foto.album_foto';
			$on2 = 'foto.user_foto = user.id_user';
			$fetch['data_foto'] = $Schema -> visual_table_join3('foto', 'album', 'user', $on, $on2);
			$fetch['filter_album'] = $Schema -> getWhere2('album', ['id_album' => $id]);
			$setting['data_setting'] = $Schema -> getWhere2('user', ['id_user' => session() -> get('id')]);

			foreach ($fetch['data_foto'] as &$photo) {
				$photo['likeCount'] = $Schema	-> countLike($photo['id_foto']);
				$photo['commentCount'] = $Schema->commentLike($photo['id_foto']);
			}

			echo view('_layout/header');
			echo view('_layout/menu', $setting);
			echo view('pages/view_folder', $fetch);
			echo view('_layout/footer');

		}

	}

	// CRUD

	public function create_album() {

		if (session() -> get('id') == NULL || session() -> get('id') < 0 || session() -> get('id') == ' ') {

			return redirect() -> to('/Home/');

		} else if (session() -> get('id') > 0) {
			
			$Schema = new Schema();

			$judul_album = $this -> request -> getPost('nama_album');
			$deskripsi_album = $this -> request -> getPost('deskripsi_album');

			$Schema -> create_data('album', [
				'nama_album' => $judul_album,
				'deskripsi' => $deskripsi_album,
				'tanggal_di_buat' => date('Y-m-d'),
				'user_album' => session() -> get('id')
			]);
			
			$Schema -> create_data('history', [
				'_user' => session() -> get('id'),
				'_tanggal' => date('Y-m-d H:i:s'),
				'_detail' => 'membuat album baru : ' . $judul_album
			]);
			
			return redirect() -> to('/Home/dashboard');

		}

	}

	public function create_comment() {

		if (session() -> get('id') == NULL || session() -> get('id') < 0 || session() -> get('id') == ' ') {

			return redirect() -> to('/Home/');

		} else if (session() -> get('id') > 0) {
			
			$Schema = new Schema();

			$id = $this -> request -> getPost('id');
			$comment = $this -> request -> getPost('comment');

			$Schema -> create_data('komentarfoto', [
				'_komentarfoto' => $id,
				'_komentaruser' => session() -> get('id'),
				'isi_komentar' => $comment,
				'tanggal_komentar' => date('Y-m-d')
			]);

			$Schema -> create_data('history', [
				'_user' => session() -> get('id'),
				'_tanggal' => date('Y-m-d H:i:s'),
				'_detail' => 'mengomentari foto : ' . $comment
			]);
			
			return redirect() -> to('/Content/view_comment/'.$id);

		}

	}

	public function upload_image() {

		if (session() -> get('id') == NULL || session() -> get('id') < 0 || session() -> get('id') == ' ') {

			return redirect() -> to('/Home/');

		} else if (session() -> get('id') > 0) {
			
			$Schema = new Schema();

			$foto = $this -> request -> getFile('foto');
			$judul_foto = $this -> request -> getPost('judul_foto');
			$album_foto = $this -> request -> getPost('album_foto');
			$deskripsi_foto = $this -> request -> getPost('deskripsi_foto');

			if ($foto && $foto -> isValid() && ! $foto -> hasMoved()) {

				$images = $foto -> getRandomName();
				$foto -> move('assets/src/stored_images/', $images);

			}

			$Schema -> create_data('foto', [
				'judul_foto' => $judul_foto,
				'deskripsi_foto' => $deskripsi_foto,
				'tanggal_unggah' => date('Y-m-d'),
				'lokasi_file' => $images,
				'album_foto' => $album_foto,
				'user_foto' => session() -> get('id')
			]);

			$Schema -> create_data('history', [
				'_user' => session() -> get('id'),
				'_tanggal' => date('Y-m-d H:i:s'),
				'_detail' => 'mengupload foto baru'
			]);
			
			return redirect() -> to('/Home/dashboard');

		}
        
	}

	public function action_update_image() {

		if (session() -> get('id') == NULL || session() -> get('id') < 0 || session() -> get('id') == ' ') {

			return redirect() -> to('/Home/');

		} else if (session() -> get('id') > 0) {
			
			$Schema = new Schema();

			$ids = $this -> request -> getPost('id');
			$oldfoto = $this -> request -> getPost('oldfoto');
			$foto = $this -> request -> getFile('foto');
			$judul_foto = $this -> request -> getPost('judul_foto');
			$album_foto = $this -> request -> getPost('album_foto');
			$deskripsi_foto = $this -> request -> getPost('deskripsi_foto');

			if ($foto && $foto -> isValid() && ! $foto -> hasMoved()) {

				if ($foto == 'no-image.jpg' || NULL || ' ') {

					$images = $foto -> getRandomName();
					$foto -> move('assets/src/stored_images/', $images);

				} else {

					if (file_exists('assets/src/stored_images/'.$foto)) {

						unlink('assets/src/stored_images/'.$oldfoto);

					} else {

						$images = $foto -> getRandomName();
						$foto -> move('assets/src/stored_images/', $images);

					}

				}

			} else {

				if ($oldfoto == 'no-image.jpg' || NULL || ' ') {

					$images = 'no-image.jpg';

				} else {

					$images = $oldfoto;

				}

			}

			$Schema -> update_data('foto', [
				'judul_foto' => $judul_foto,
				'deskripsi_foto' => $deskripsi_foto,
				'lokasi_file' => $images,
				'album_foto' => $album_foto,
			], ['id_foto' => $ids]);

			$Schema -> create_data('history', [
				'_user' => session() -> get('id'),
				'_tanggal' => date('Y-m-d H:i:s'),
				'_detail' => 'mengupdate data foto : ' . $judul_foto
			]);
			
			return redirect() -> to('/Home/dashboard');

		}

	}

	public function action_delete_image($id) {

		if (session() -> get('id') == NULL || session() -> get('id') < 0 || session() -> get('id') == ' ') {

			return redirect() -> to('/Home/');

		} else if (session() -> get('id') > 0 && in_array(session() -> get('level'), [1])) {
			
			$Schema = new Schema();

				$foto = $Schema->getWhere2('foto', ['id_foto' => $id]);

				if ($foto) {
					
					$imagePath = 'assets/src/stored_images/'.$foto['lokasi_file'];
					
					if (file_exists($imagePath) && $foto['LokasiFile'] !== 'no-image.jpg') {
						unlink($imagePath);
					}

					$Schema->delete_data('foto', ['id_foto' => $id]);
				}

				$Schema -> create_data('history', [
					'_user' => session() -> get('id'),
					'_tanggal' => date('Y-m-d H:i:s'),
					'_detail' => 'menghapus data foto : ' . $foto['judul_foto']
				]);
			
			return redirect() -> to('/Home/dashboard');

		}

	}

	// Ajax Request Handler

	public function toggleLike()
	{
		$Schema = new Schema();

		$fotoID = $this->request->getPost('fotoID');
		$userID = $this->request->getPost('userID');

		$isLiked = $Schema->checkLike($fotoID, $userID);

		if ($isLiked) {
			$Schema->removeLike($fotoID, $userID);
		} else {
			$Schema->addLike($fotoID, $userID);
		}

		$likeCount = $Schema->countLikes($fotoID);

		$response = [
			'likeCount' => $likeCount,
			'liked' => !$isLiked,
		];

		return $this->response->setJSON($response);
	}

}