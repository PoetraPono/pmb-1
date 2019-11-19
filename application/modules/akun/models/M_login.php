<?php
class M_login extends CI_Model{
    
    function validate($email,$password)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        // var_dump($email);
        // var_dump($password);
        // var_dump($query->num_rows());
        if( $query->num_rows() > 0 ){ 

            $this->db->from('users');
            $this->db->where('email', $email);
            $query = $this->db->get(); 

            // var_dump($query->row()->password);
            $pass_in_db = $this->encryption->decrypt($query->row()->password);
            // var_dump($pass_in_db);
            if($password == $pass_in_db){
                return TRUE;
            }else{
                return FALSE;
            }
        } else { 
            return FALSE; 
        }

    }

    function get_users_data($email){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('users_details', 'users_details.users_id = users.id');
        $this->db->where('email',$email);
        $query = $this->db->get();
        // $this->db->where('email', $email);
        // $query = $this->db->get('users');
        return $query;
    }


    
}