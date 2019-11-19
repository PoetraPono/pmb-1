<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }
 
    public function index()
    {
        if($this->session->userdata('is_logged_in')){
            redirect('explore');
        }else{
            $data['title'] = 'Silahkan Masuk';
            $this->template->display('login',$data);
        } 
        
    }

    function __encrip_password($password) {
        return md5($password);
    }

    function validate_credentials()
    {   

        $this->load->model('login_model');

        $user_name = $this->input->post('email');
        $password = $this->__encrip_password($this->input->post('password'));

        $is_valid = $this->login_model->validate($user_name, $password);
        
        if($is_valid->num_rows()>0)
        {
            foreach ($is_valid->result() as $key) {
                $user_data['id_user']=$key->id_user;
                $user_data['username']=$key->username;
                $user_data['level']=$key->level;
                $user_data['is_logged_in']=true;
                $this->session->set_userdata($user_data);
            }
            if($this->session->userdata('level')=='admin'){
                redirect('admin');
            }elseif($this->session->userdata('level')=='user'){
                redirect('explore');
            }
            
        }
        else // incorrect username or password
        {
            $data['message_error'] = TRUE;
            $data['title'] = " Terjadi Kesalahan ! Silahkan periksa kembali.";
            $this->template->display('login',$data);   
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('home');
    }

}