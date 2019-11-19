<?php
class M_datatables extends CI_Model{

    function get_program_studi(){
        $this->datatables->select('id, nama_prodi, jenis_pendidikan');
        $this->datatables->from('program_studi');
        $this->datatables->add_column('edit', '<a href="javascript:void(0)" title="Edit" onclick="edit_prodi($1)"><i class="icon fas fa-edit text-primary"></i></a>', 'id');
        // $this->datatables->add_column('edit', '<a href="'.base_url().'dashboard/prodi/edit/$1"><i class="icon fas fa-edit text-primary"></i></a>', 'id');
        $this->datatables->add_column('delete','<a href="'.base_url().'dashboard/prodi/delete/$1"><i class="icon fas fa-trash text-danger"></i></a>', 'id');
        return $this->datatables->generate();
    }

    public function update($tables,$where, $data)
    {
        $this->db->update($tables, $data, $where);
        return $this->db->affected_rows();
    }

    public function get_by_id_users($tables,$id)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('users_details', 'users_details.users_id = users.id');
        $this->db->where('users.id',$id);
        $query = $this->db->get();

        // $this->db->from($tables);
        // $this->db->where('id',$id);
        // $query = $this->db->get();
 
        return $query->row();
    }
    public function get_by_id_single($tables,$id)
    {
        // $this->db->select('*');
        // $this->db->from('users');
        // $this->db->join('users_details', 'users_details.users_id = users.id');
        // $this->db->where('users.id',$id);
        // $query = $this->db->get();

        $this->db->from($tables);
        $this->db->where('id',$id);
        $query = $this->db->get();
 
        return $query->row();
    }

    function get_data_pendaftar(){
        $this->datatables->select('users.id, email, aktivasi');
        $this->datatables->where('role','mahasiswa');
        $this->datatables->from('users');
        $this->datatables->join('users_details', 'users.id = users_details.users_id');
        $this->datatables->select('nama_lengkap, tempat_lahir, tanggal_lahir, jenis_kelamin, nama_ibu_kandung,created_date');
        $this->datatables->add_column('edit', '<a href="javascript:void(0)" title="Edit" onclick="edit_pendaftar($1)"><i class="icon fas fa-edit text-primary"></i></a>', 'users.id');
        $this->datatables->add_column('delete','<a href="'.base_url().'dashboard/pendaftar/delete/$1"><i class="icon fas fa-trash text-danger"></i></a>', 'users.id');
        return $this->datatables->generate();
    }

    function get_jalur_seleksi(){
        $this->datatables->select('id, kode_jalur_seleksi, nama_jalur, deskripsi, start_pendaftaran, end_pendaftaran, kuota_pendaftar, status_seleksi');
        $this->datatables->from('jalur_seleksi');
        $this->datatables->add_column('edit', '<a href="javascript:void(0)" title="Edit" onclick="edit_jalur_seleksi($1)"><i class="icon fas fa-edit text-primary"></i></a>', 'id');
        $this->datatables->add_column('delete','<a href="'.base_url().'dashboard/jalur_seleksi/delete/$1"><i class="icon fas fa-trash text-danger"></i></a>', 'id');
        return $this->datatables->generate();
    }
    
}