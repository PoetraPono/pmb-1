<?php
class M_registrasi extends CI_Model{
    
    function mail_exists($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        var_dump($query->num_rows() > 0 );
        if( $query->num_rows() > 0 ){ return FALSE; } else { return TRUE; }
    }
 
    function post_users($data){
        $this->db->insert('users', $data);
        $users_id = $this->db->insert_id();
        return $users_id;
    }

    function post_users_details($data){
        $hasil = $this->db->insert('users_details', $data);
        return $hasil;
    }


    
}