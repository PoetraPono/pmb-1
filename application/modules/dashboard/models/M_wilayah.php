<?php
class M_wilayah extends CI_Model{
 
    function get_provinsi(){
        $hasil=$this->db->query("SELECT * FROM _provinsi");
        return $hasil;
    }
 
    function get_kabupaten($id){
        $hasil=$this->db->query("SELECT * FROM _kabupaten WHERE provinsi_id='$id'");
        return $hasil->result();
    }
    function get_list_kabupaten($id){
        $hasil=$this->db->query("SELECT * FROM _kabupaten WHERE provinsi_id='$id'");
        return $hasil;
    }
}