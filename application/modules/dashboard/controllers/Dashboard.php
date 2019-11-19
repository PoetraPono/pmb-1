<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Inheritance Dashboard from CI_Controller
class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct(){
		parent::__construct();
		$this->load->model('m_wilayah');
		$this->load->model('m_datatables');
		$this->load->model('m_crud');

    }
	public function index()
	{
		if($this->session->userdata('is_logged_in') && $this->session->userdata('role') == 'superadmin'){
			$this->template->display('dashboard');
		}elseif($this->session->userdata('is_logged_in') && $this->session->userdata('role') == 'mahasiswa'){
			redirect('dashboard/pendaftaran');
		}else{
			redirect('akun');
		}
	}

	function logout(){
		$this->session->sess_destroy();
    	redirect('akun');
	}

	//mengelola data program studi
	function prodi($params1="",$params2=""){
		if($this->session->userdata('is_logged_in')== TRUE):
			$data['breadcumbs_header'] = 'Kelola Program Studi';
			$this->template->display('program_studi', $data);

			//GET PRODI
			if($params1 == "get"):
				$this->output->set_content_type('application/json');
				$this->output->set_output($this->m_datatables->get_program_studi());
			endif;
			
			//ADD PRODI
			if($params1 == "add"):
				$nama_prodi 			= $this->input->post('nama_prodi');
				$jenis_pendidikan 		= $this->input->post('jenis_pendidikan');

				$prodi_data = array(
					'nama_prodi'	=> $nama_prodi,
					'jenis_pendidikan'	=> $jenis_pendidikan,
				);
				$result = $this->m_crud->add_data('program_studi',$prodi_data);
				
				if($result > 0)
				{
					$this->session->set_flashdata('success', "SUCCESS");
					redirect($_SERVER['HTTP_REFERER']);
				}else{
					$this->session->set_flashdata('error', "ERROR");
					redirect($_SERVER['HTTP_REFERER']);
				}

			endif;

			//EDIT PRODI
			if($params1 == "edit"):
				$data = $this->m_datatables->get_by_id_single('program_studi',$params2);
				$this->output->set_content_type('application/json');
				$this->output->set_output(json_encode($data));
				// echo json_encode($data);
			endif;

			if($params1 == "post_edit"):
				$data = array(
						'nama_prodi' => $this->input->post('modal_nama_prodi'),
						'jenis_pendidikan' => $this->input->post('modal_jenis_pendidikan')
					);
				$this->m_datatables->update('program_studi',array('id' => $this->input->post('modal_id')), $data);
				$this->output->set_content_type('application/json');
				$this->output->set_output(json_encode(array("status" => TRUE)));
			endif;

			//DELETE PRODI
			if($params1 == "delete"):
				//hapus by params2 = id_prodi
				$result = $this->m_crud->delete_data('program_studi',$params2);
				if($result > 0)
				{
					$this->session->set_flashdata('success', "SUCCESS");
					redirect($_SERVER['HTTP_REFERER']);
				}else{
					$this->session->set_flashdata('error', "ERROR");
					redirect($_SERVER['HTTP_REFERER']);
				}
			endif;
		else:
			redirect('akun');
		endif;
	}

	//fungsi mengelola data pendaftar
	function pendaftar($params1="",$params2=""){
		if($this->session->userdata('is_logged_in')== TRUE):
			$data['breadcumbs_header'] = 'Kelola Data Pendaftaran';
			$this->template->display('pendaftar', $data);

			//GET 
			if($params1 == "get"):
				$this->output->set_content_type('application/json');
				$this->output->set_output($this->m_datatables->get_data_pendaftar());
			endif;
			
			//ADD
			// if($params1 == "add"):
			// 	$nama_prodi 			= $this->input->post('nama_prodi');
			// 	$jenis_pendidikan 		= $this->input->post('jenis_pendidikan');

			// 	$prodi_data = array(
			// 		'nama_prodi'	=> $nama_prodi,
			// 		'jenis_pendidikan'	=> $jenis_pendidikan,
			// 	);
			// 	$result = $this->m_crud->add_data('program_studi',$prodi_data);
				
			// 	if($result > 0)
			// 	{
			// 		$this->session->set_flashdata('success', "SUCCESS");
			// 		redirect($_SERVER['HTTP_REFERER']);
			// 	}else{
			// 		$this->session->set_flashdata('error', "ERROR");
			// 		redirect($_SERVER['HTTP_REFERER']);
			// 	}

			// endif;

			//EDIT
			if($params1 == "edit"):
				$data = $this->m_datatables->get_by_id_users('program_studi',$params2);
				$this->output->set_content_type('application/json');
				$this->output->set_output(json_encode($data));
				// echo json_encode($data);
			endif;

			if($params1 == "post_edit"):
				$data = array(
						'nama_prodi' => $this->input->post('modal_nama_prodi'),
						'jenis_pendidikan' => $this->input->post('modal_jenis_pendidikan')
					);
				$this->m_datatables->update('program_studi',array('id' => $this->input->post('modal_id')), $data);
				$this->output->set_content_type('application/json');
				$this->output->set_output(json_encode(array("status" => TRUE)));
			endif;

			//DELETE
			if($params1 == "delete"):
				//hapus by params2 = id_prodi
				$result = $this->m_crud->delete_data('program_studi',$params2);
				if($result > 0)
				{
					$this->session->set_flashdata('success', "SUCCESS");
					redirect($_SERVER['HTTP_REFERER']);
				}else{
					$this->session->set_flashdata('error', "ERROR");
					redirect($_SERVER['HTTP_REFERER']);
				}
			endif;
		else:
			redirect('akun');
		endif;
	}

	//fungsi pendaftaran jalur seleksi
	function jalur_seleksi($params1="",$params2=""){
		if($this->session->userdata('is_logged_in')== TRUE):
			$data['breadcumbs_header'] = 'Kelola Jalur Seleksi';
			$this->template->display('jalur_seleksi', $data);

			//GET 
			if($params1 == "get"):
				$this->output->set_content_type('application/json');
				$this->output->set_output($this->m_datatables->get_jalur_seleksi());
			endif;
			
			//ADD 
			if($params1 == "add"):
				$kode_jalur_seleksi			= $this->input->post('kode_jalur_seleksi');
				$nama_jalur_seleksi 		= $this->input->post('nama_jalur_seleksi');
				
				$date1 						= strtotime($this->input->post('tgl_buka'));
				$tgl_buka 					= date('Y-m-d H:i:s',$date1);

				$kuota_pendaftar 			= $this->input->post('kuota_pendaftar');
				$status_seleksi 			= $this->input->post('status_seleksi');
				
				$date2 						= strtotime($this->input->post('tgl_tutup'));
				$tgl_tutup 					= date('Y-m-d H:i:s',$date2);

				$deskripsi 					= $this->input->post('deskripsi');

				// var_dump($tgl_buka);
				// die();

				$data = array(
					'kode_jalur_seleksi'	=> $kode_jalur_seleksi,
					'nama_jalur'			=> $nama_jalur_seleksi,
					'start_pendaftaran'		=> $tgl_buka,
					'kuota_pendaftar'		=> $kuota_pendaftar,
					'status_seleksi'		=> $status_seleksi,
					'end_pendaftaran'		=> $tgl_tutup,
					'deskripsi'				=> $deskripsi,
				);
				$result = $this->m_crud->add_data('jalur_seleksi',$data);
				
				if($result > 0)
				{
					$this->session->set_flashdata('success', "SUCCESS");
					redirect($_SERVER['HTTP_REFERER']);
				}else{
					$this->session->set_flashdata('error', "ERROR");
					redirect($_SERVER['HTTP_REFERER']);
				}

			endif;

			//EDIT 
			if($params1 == "edit"):
				$data = $this->m_datatables->get_by_id_single('jalur_seleksi',$params2);
				$this->output->set_content_type('application/json');
				$this->output->set_output(json_encode($data));
				// echo json_encode($data);
			endif;

			if($params1 == "post_edit"):
				$data = array(
					'kode_jalur_seleksi' => $this->input->post('modal_kode_jalur_seleksi'),
					'nama_jalur' => $this->input->post('modal_nama_jalur'),
					'start_pendaftaran' => $this->input->post('modal_tgl_buka'),
					'kuota_pendaftar' => $this->input->post('modal_kuota_pendaftar'),
					'status_seleksi' => $this->input->post('modal_status_seleksi'),
					'end_pendaftaran' => $this->input->post('modal_end_pendaftaran'),
					'deskripsi' => $this->input->post('deskripsi')
				);
				$this->m_datatables->update('jalur_seleksi',array('id' => $this->input->post('modal_id')), $data);
				$this->output->set_content_type('application/json');
				$this->output->set_output(json_encode(array("status" => TRUE)));
			endif;

			//DELETE 
			if($params1 == "delete"):
				//hapus by params2 = id
				$result = $this->m_crud->delete_data('jalur_seleksi',$params2);
				if($result > 0)
				{
					$this->session->set_flashdata('success', "SUCCESS");
					redirect($_SERVER['HTTP_REFERER']);
				}else{
					$this->session->set_flashdata('error', "ERROR");
					redirect($_SERVER['HTTP_REFERER']);
				}
			endif;
		else:
			redirect('akun');
		endif;
	}

	function pendaftaran($params1="",$params2="", $params3=""){
		if($this->session->userdata('is_logged_in')== TRUE):
			$data['breadcumbs_header'] = '';
			$data['riwayat_pendaftaran'] = $this->m_crud->data_pendaftaran_by_id($this->session->userdata('users_id'))->result_array();
			$data['jalur_seleksi_aktif'] = $this->m_crud->data_jalur_seleksi_aktif()->result_array();
			$cek = json_decode($this->m_crud->cek_kunci(), true);

			if(empty($params1)):
				$this->template->display('pendaftaran', $data);
			else:

				//DETAIL 
				if($params1 == "details"):
					$data_pendaftaran_details['id_pendaftaran'] = $params2;
					$data_pendaftaran_details['details'] = $this->m_crud->pendaftaran_jalur_seleksi_details($params2)->row();
					$data_pendaftaran_details['tanggal_tahap_pendaftaran'] = $this->m_crud->tanggal_tahap_pendaftaran($params2)->row();
					$this->template->display('pendaftaran_details', $data_pendaftaran_details);
				endif;

				//APPLY
				if($params1 == "apply"):
					$pendaftaran_data['id_jalur_seleksi'] = $params2;
					$pendaftaran_data['users_id'] = $this->session->userdata('users_id');
					$pendaftaran_data['detail_jalur_seleksi'] = $this->m_crud->detail_jalur_seleksi($params2)->row();
					$this->template->display('pendaftaran_apply', $pendaftaran_data);
				endif;

				//POST APPLY
				if($params1 == "post_apply"):
					date_default_timezone_set('Asia/Jakarta');
					$apply_data = array(
						'id_jalur_seleksi'	=> $params2,
						'id_users'	=> $this->session->userdata('users_id'),
						'tanggal_pendaftaran' => date('Y-m-d H:i:s'),
					);
					//minus kuota
					$minus_kuota = $this->m_crud->minus_kuota_jalur_seleksi($params2);
					$result = $this->m_crud->add_data_pendaftaran('pendaftaran_jalur_seleksi',$apply_data);
					if($result > 0)
					{
						$this->session->set_flashdata('success', "SUCCESS");
						redirect('dashboard/pendaftaran');
					}else{
						$this->session->set_flashdata('error', "ERROR");
						redirect($_SERVER['HTTP_REFERER']);
					}
				endif;

				//PEMILIHAN PRODI
				if($params1 == "pemilihan_prodi"):

					if ($cek[0]['tahap_seleksi'] > 5) {
						redirect('dashboard/pendaftaran/details/'.$params2);
					}

					$pemilihan_prodi['id_pendaftaran_jalur_seleksi'] 	= $params2;
					$pemilihan_prodi['users_id'] 						= $this->session->userdata('users_id');
					$pemilihan_prodi['prodi']							= $this->m_crud->get_data('program_studi');
					$pemilihan_prodi['data_pendaftar']					= $this->m_crud->get_data_pendaftar_by_id($params2);
					$this->template->display('step_pendaftaran/pemilihan_prodi', $pemilihan_prodi);

					if($params2 == "update"):
						$data = array(
							'pemilihan_prodi'	=> $this->input->post('pemilihan_prodi'),
						);
						$result = $this->m_crud->update_pemilihan_prodi($params3,$data);
						
						if($result > 0)
						{
							$this->session->set_flashdata('success', "SUCCESS");
							redirect('dashboard/pendaftaran/details/'.$params3);
						}else{
							$this->session->set_flashdata('error', "ERROR");
							redirect($_SERVER['HTTP_REFERER']);
						}
					endif;
				endif;

				//PENGISIAN DATA
				if($params1 == "pengisian_data"):
					if ($cek[0]['tahap_seleksi'] > 5) {
						redirect('dashboard/pendaftaran/details/'.$params2);
					}

					$pengisian_data['id_pendaftaran_jalur_seleksi'] 	= $params2;
					$pengisian_data['users_id'] 						= $this->session->userdata('users_id');
					$pengisian_data['prodi']							= $this->m_crud->get_data('program_studi');
					$pengisian_data['provinsi']							= $this->m_wilayah->get_provinsi();
					$pengisian_data['data_pendaftar']					= $this->m_crud->get_data_pendaftar_by_id($params2);
					$pengisian_data['kabupaten']						= $this->m_wilayah->get_list_kabupaten($this->m_crud->get_data_pendaftar_by_id($params2)->row()->provinsi);
					$this->template->display('step_pendaftaran/pengisian_data', $pengisian_data);

					if($params2 == "update"):
						$data = array(
							'email_aktif'	=> $this->input->post('email_aktif'),
							'nik'	=> $this->input->post('nomor_induk_kependudukan'),
							'jenis_identitas'	=> $this->input->post('jenis_identitas'),
							'nomor_identitas_berfoto'	=> $this->input->post('nomor_identitas_berfoto'),
							'tanggal_mulai_berlaku'	=> $this->input->post('tanggal_mulai_berlaku'),
							'alamat_tinggal'	=> $this->input->post('alamat_tinggal'),
							'provinsi'	=> $this->input->post('provinsi'),
							'kabupaten'	=> $this->input->post('kabupaten'),
							'kodepos'	=> $this->input->post('kodepos'),
							'nomor_hp'	=> $this->input->post('nomor_hp'),
							'nomor_whatsapp'	=> $this->input->post('nomor_whatsapp'),
						);
						$result = $this->m_crud->update_pengisian_data($params3,$data);
						
						if($result > 0)
						{
							$this->session->set_flashdata('success', "SUCCESS");
							redirect('dashboard/pendaftaran/details/'.$params3);
						}else{
							$this->session->set_flashdata('error', "ERROR");
							redirect($_SERVER['HTTP_REFERER']);
						}
					endif;
				endif;


				// Penguncian Data
				if ($params1 == "penguncian_data") {
					if ($cek[0]['tahap_seleksi'] > 5) {
						redirect('dashboard/pendaftaran/details/'.$params2);
					}

					$pemilihan_prodi['id_pendaftaran_jalur_seleksi'] 	= $params2;
					$pemilihan_prodi['users_id'] 						= $this->session->userdata('users_id');
					$pemilihan_prodi['prodi']							= $this->m_crud->get_data('program_studi');
					$pemilihan_prodi['data_pendaftar']					= $this->m_crud->get_data_pendaftar_by_id($params2);
					$this->template->display('step_pendaftaran/penguncian_data', $pemilihan_prodi);

					if ($params2 == 'update') {
						$kunci_data_update = array(
							'tahap_seleksi'	=> 5,
							'tanggal_terakhir_diubah' => date('Y-m-d H:i:s'),
						);
						$result = $this->m_crud->penguncian($params3,$kunci_data_update);

						if($result)
						{
							$this->session->set_flashdata('success', "SUCCESS");
							redirect('dashboard/pendaftaran/details/'.$params3);
						}else{
							$this->session->set_flashdata('error', "ERROR");
							redirect($_SERVER['HTTP_REFERER']);
						}
					}
				}

				// Pembayaran
				if ($params1 == "pembayaran") {
					$nama_jalur_aktif = json_decode($this->m_crud->nama_jalur_aktif(), true);
					$url = 'https://my.ipaymu.com/payment';  // URL Payment iPaymu           
					  $params = array(   // Prepare Parameters            
					   'key'      => '2FA0CCC2-61B1-4C8E-A493-8C9F838DE108', // API Key Merchant / Penjual
					   'action'   => 'payment',
					   'product'  => $nama_jalur_aktif[0]['nama_jalur'],
					   'price'    => $nama_jalur_aktif[0]['price'], // Total Harga
					   'quantity' => 1,
					   'comments' => 'Keterangan Produk', // Optional
					   'ureturn'  => base_url() . 'dashboard/pendaftaran?q=',
					   //'unotify'  => 'http://websiteanda.com/notify.php',
					   //'ucancel'  => base_url() . 'dashboard/pendaftaran/',
					  
					   /* Parameter tambahan untuk pembayaran COD
					   * ----------------------------------------------- */
					   //'weight'     => array(1, 1), // Berat barang (satuan kilo, menerima array)
					   //'dimensi'    => array('1:2:1', '1:1:1'), // Dimensi barang (format => panjang:lebar:tinggi, menerima array)
					   //'postal_code'=> '80361',  // Kode pos untuk custom pikcup
					   //'address'    => 'Jalan Raya Kuta, No 88R, Badung, Bali', // Alamat untuk custom pickup
					   /* ----------------------------------------------- */
					  
					   /* Parameter tambahan untuk custom payment page (hanya menampilkan satu metode pembayaran)
					   * ----------------------------------------------- */
					   // 'pay_method'  => 'cstore', // Metode pembayaran yang akan ditampilkan (VA BAG => arthagraha, VA Niaga => niaga, VA BNI => bni, Kartu Kredit => cc, Convenience Store (Alfamart/Indomaret) => cstore, COD => cod, Saldo iPaymu => member)
					   // 'pay_channel' => '', // Channel dari metode pembayaran, jika ada (Misal dari metode pembayaran Convenience Store => indomaret, alfamart)
					    'buyer_name'  => $this->session->userdata('nama_lengkap'), // Nama customer/pembeli(opsional) 
					   // 'buyer_phone' => '08123456789', // No HP customer/pembeli (opsional)
					    'buyer_email' => $this->session->userdata('email'), // Email customer/pembeli (opsional)
					   /* ----------------------------------------------- */
					  	
					   'expired' => '24', // 1 Hari
					   'format'   => 'json' // Format: xml atau json. Default: xml
					   );
					  
					  $params_string = http_build_query($params);
					  
					  //open connection
					  $ch = curl_init();
					  
					  curl_setopt($ch, CURLOPT_URL, $url);
					  curl_setopt($ch, CURLOPT_POST, count($params));
					  curl_setopt($ch, CURLOPT_POSTFIELDS, $params_string);
					  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
					  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
					  
					  //execute post
					  $response = curl_exec($ch);
					  $err = curl_error($ch);
					
					  curl_close($ch);
					
					  if ($err) {
					   echo "cURL Error #:" . $err;
					  } else {
					   //echo $response;
					  	$this->template->display('step_pendaftaran/pembayaran', compact('response'));
					  }

					  if ($params2 == 'berhasil') {
					  		$bayar_selesai = array(
								'tahap_seleksi'	=> 5,
								'tanggal_terakhir_diubah' => date('Y-m-d H:i:s'),
							);
							
							$result_bayar = $this->m_crud->penguncian($params3,$bayar_selesai);

							if($result_bayar)
							{
								$this->session->set_flashdata('success', "SUCCESS");
								redirect('dashboard/pendaftaran/details/'.$params3);
							}else{
								$this->session->set_flashdata('error', "ERROR");
								redirect($_SERVER['HTTP_REFERER']);
							}
					  }
				}



				//UPLOAD DOKUMEN



				if($params1 == "upload_dokumen"):
					if ($cek[0]['tahap_seleksi'] > 5) {
						redirect('dashboard/pendaftaran/details/'.$params2);
					}

					$upload_dokumen['id_pendaftaran_jalur_seleksi'] 	= $params2;
					$upload_dokumen['users_id'] 						= $this->session->userdata('users_id');
				    $upload_dokumen['dokumen_pendaftar'] 				= $this->m_crud->get_data_pendaftar_by_id($params2);
					$upload_dokumen['dokumen_pendaftar']				= $this->m_crud->get_data_dokumen_by_id($params2);
					$this->template->display('step_pendaftaran/upload_dokumen', $upload_dokumen);

					if($params2 == "update"):
						$data= (date('Y-m-d H:i:s'));
						// $data = array(
						// 	'email_aktif'	=> $this->input->post('email_aktif'),
						// 	'nik'	=> $this->input->post('nomor_induk_kependudukan'),
						// 	'jenis_identitas'	=> $this->input->post('jenis_identitas'),
						// 	'nomor_identitas_berfoto'	=> $this->input->post('nomor_identitas_berfoto'),
						// 	'tanggal_mulai_berlaku'	=> $this->input->post('tanggal_mulai_berlaku'),
						// 	'alamat_tinggal'	=> $this->input->post('alamat_tinggal'),
						// 	'provinsi'	=> $this->input->post('provinsi'),
						// 	'kabupaten'	=> $this->input->post('kabupaten'),
						// 	'kodepos'	=> $this->input->post('kodepos'),
						// 	'nomor_hp'	=> $this->input->post('nomor_hp'),
						// 	'nomor_whatsapp'	=> $this->input->post('nomor_whatsapp'),
						// );
						$result = $this->m_crud->update_upload_dokumen($params3,$data);
						
						if($result > 0)
						{
							$this->session->set_flashdata('success', "SUCCESS");
							redirect('dashboard/pendaftaran/details/'.$params3);
						}else{
							$this->session->set_flashdata('error', "ERROR");
							redirect($_SERVER['HTTP_REFERER']);
						}
					endif;

					if($params2 == "upload_doc"):
						$config['upload_path']          = './uploads/documents/';
						$config['allowed_types']        = 'jpg|png|pdf';
						$config['encrypt_name'] 		= TRUE;
						$config['overwrite']			= true;
						$config['max_size']             = 2024; // 2MB
						$tampil_data['dokumen_pendaftar'] = $this->m_crud->tampil_data()->result();
						$this->load->library('upload', $config);
						$this->load->helper('url');

						if($this->upload->do_upload("pas_foto")){

							$data = $this->upload->data();
				 
							$image = $data['file_name'];
							 
							$result= $this->m_crud->update_upload_pas_foto($params3,$image);
							echo json_decode($result);
							$this->session->set_flashdata('success', "SUCCESS");
							redirect('dashboard/pendaftaran/upload_dokumen/'.$params3);

						}else if($this->upload->do_upload("ijazah")){

							$data = $this->upload->data();
				 
							$image = $data['file_name'];
							 
							$result= $this->m_crud->update_upload_ijazah($params3,$image);
							echo json_decode($result);
							$this->session->set_flashdata('success', "SUCCESS");
							redirect('dashboard/pendaftaran/upload_dokumen/'.$params3);
						}else if($this->upload->do_upload("kartu_identitas")){

							$data = $this->upload->data();
				 
							$image = $data['file_name'];
							 
							$result= $this->m_crud->update_upload_kartu_identitas($params3,$image);
							echo json_decode($result);
							$this->session->set_flashdata('success', "SUCCESS");
							redirect('dashboard/pendaftaran/upload_dokumen/'.$params3);

						}else if($this->upload->do_upload("kartu_keluarga")){

							$data = $this->upload->data();
				 
							$image = $data['file_name'];
							 
							$result= $this->m_crud->update_upload_kartu_keluarga($params3,$image);
							echo json_decode($result);
							$this->session->set_flashdata('success', "SUCCESS");
							redirect('dashboard/pendaftaran/upload_dokumen/'.$params3);

						}else if($this->upload->do_upload("transkrip_nilai")){

							$data = $this->upload->data();
				 
							$image = $data['file_name'];
							 
							$result= $this->m_crud->update_upload_transkrip_nilai($params3,$image);
							echo json_decode($result);
							$this->session->set_flashdata('success', "SUCCESS");
							redirect('dashboard/pendaftaran/upload_dokumen/'.$params3);

						}else if($this->upload->do_upload("sertifikat_pendukung")){

							$data = $this->upload->data();
				 
							$image = $data['file_name'];
							 
							$result= $this->m_crud->update_upload_sertifikat_pendukung($params3,$image);
							echo json_decode($result);
							$this->session->set_flashdata('success', "SUCCESS");
							redirect('dashboard/pendaftaran/upload_dokumen/'.$params3);
						}
					endif;
				endif;


				
			endif;
			
		else:
			redirect('akun');
		endif;
	}

	private function _uploadDoc($document_name)
	{
		$config['upload_path']          = './uploads/documents/';
		$config['allowed_types']        = 'jpg|png|pdf';
		$config['file_name']            = $document_name;
		$config['overwrite']			= true;
		$config['max_size']             = 2024; // 2MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('image')) {
			return $this->upload->data("file_name");
		}
		
		return "default.jpg";
	}

	//fungsi hitung IPK


}
