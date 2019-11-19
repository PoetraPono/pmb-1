<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

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
		$this->load->library('encryption');
		$this->load->model('m_wilayah');
		$this->load->model('m_registrasi');
		$this->load->model('m_login');
		$this->load->helper('email');
    }
	public function index()
	{
		if($this->session->userdata('is_logged_in')){
			redirect('dashboard');
		}else{
			$this->load->view('akun');
		}
	}
	public function registrasi()
	{	
		$data['provinsi']=$this->m_wilayah->get_provinsi();
		$this->load->view('registrasi', $data);
	}

	function post_registrasi(){
		$email 				= $this->input->post('email');
		$password 			= $this->encryption->encrypt($this->input->post('password'));
		$namalengkap 		= $this->input->post('namalengkap');
		$provtempatlahir 	= $this->input->post('provtempatlahir');
		$kabtempatlahir 	= $this->input->post('kabtempatlahir');
		$tempatlahir 		= $this->input->post('tempatlahir');
		$tanggallahir 		= $this->input->post('lahir_tgl_year')."-".$this->input->post('lahir_tgl_month')."-".$this->input->post('lahir_tgl_day');
		$jnskelamin 		= $this->input->post('jnskelamin');
		$namaibu 			= $this->input->post('namaibu');     
		$role 				= "mahasiswa";     

		//form validation run
		$this->load->library('form_validation'); 
		$this->form_validation->set_rules('email', 'Email', 'callback_rolekey_exists');


		if ($this->form_validation->run() == TRUE) // Only add new option if it is unique
		{   
			//1. Insert to USERS
			$users = array(
				'email' 	=> $email,
				'password' 	=> $password,
				'role' 		=> $role
			);
			
			$users_id = $this->m_registrasi->post_users($users);

			// var_dump($users_id);

			//2. If Success to USERS_DETAILS
			$users_details = array(
				'users_id' 					=> $users_id,
				'nama_lengkap' 				=> $namalengkap,
				'provinsi_tempat_lahir' 	=> $provtempatlahir,
				'kabupaten_tempat_lahir' 	=> $kabtempatlahir,
				'tempat_lahir' 				=> $tempatlahir,
				'tanggal_lahir' 			=> $tanggallahir,
				'jenis_kelamin' 			=> $jnskelamin,
				'nama_ibu_kandung' 			=> $namaibu,
			);

			$result = $this->m_registrasi->post_users_details($users_details);
			// var_dump($result);

			if($result > 0)
			{
				$this->session->set_flashdata('success', "SUCCESS");
				redirect($_SERVER['HTTP_REFERER']);
			}
		}
		else
		{
			$this->session->set_flashdata('error', "ERROR");
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	function rolekey_exists($email) {
		$hasil = $this->m_registrasi->mail_exists($email);
		return $hasil;
	}

	function get_kabupaten(){
        $id=$this->input->post('id');
        $data=$this->m_wilayah->get_kabupaten($id);
        echo json_encode($data);
	}
	
	public function post_login(){
		$email 				= $this->input->post('email');
		$password 			= $this->input->post('password');

		$is_valid = $this->m_login->validate($email, $password);
	
		if($is_valid == TRUE)
        {
			// var_dump($is_valid);
			$query = $this->m_login->get_users_data($email);
			// var_dump($query->result_array());
			// die();
			if($query->num_rows()>0)
			{
				foreach ($query->result() as $row) {
					$user_data['users_id']=$row->users_id;
					$user_data['email']=$row->email;
					$user_data['nama_lengkap']=$row->nama_lengkap;
					$user_data['role']=$row->role;
					$user_data['is_logged_in']=true;
					$this->session->set_userdata($user_data);
				}
				redirect('dashboard');
			}
		}else{
			$this->session->set_flashdata('error', "ERROR");
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
}
