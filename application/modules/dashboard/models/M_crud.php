<?php
class M_crud extends CI_Model{

    function get_data($tables){
        $hasil=$this->db->query("SELECT * FROM ".$tables."");
        return $hasil;
    }

    function add_data($tables, $data){
        $hasil = $this->db->insert($tables, $data);
        return $hasil;
    }
    function get_data_pendaftar_by_id($id){
        $this->db->where('id_pendaftaran_jalur_seleksi', $id);
        $hasil = $this->db->get('data_pendaftar');
        return $hasil;
    }
    function get_data_dokumen_by_id($id){
        $this->db->where('id_pendaftaran_jalur_seleksi', $id);
        $hasil = $this->db->get('dokumen_pendaftar');
        return $hasil;
    }

    function update_pemilihan_prodi($id_pendaftaran_jalur_seleksi,$data){
        $this->db->set('tahap_seleksi',3);
        $this->db->where('id', $id_pendaftaran_jalur_seleksi);
        $this->db->update('pendaftaran_jalur_seleksi');

        $this->db->set($data);
        $this->db->where('id_pendaftaran_jalur_seleksi', $id_pendaftaran_jalur_seleksi);
        $this->db->update('data_pendaftar');

        date_default_timezone_set('Asia/Jakarta');
        $this->db->set('tanggal_pemilihan_prodi', ''.date('Y-m-d H:i:s').'');
        $this->db->where('id_pendaftaran_jalur_seleksi', $id_pendaftaran_jalur_seleksi);
        $hasil = $this->db->update('tanggal_tahap_pendaftaran');

        return $hasil;
    }

    function update_pengisian_data($id_pendaftaran_jalur_seleksi,$data){
        $this->db->set('tahap_seleksi',4);
        $this->db->where('id', $id_pendaftaran_jalur_seleksi);
        $this->db->update('pendaftaran_jalur_seleksi');

        $this->db->set($data);
        $this->db->where('id_pendaftaran_jalur_seleksi', $id_pendaftaran_jalur_seleksi);
        $this->db->update('data_pendaftar');

        date_default_timezone_set('Asia/Jakarta');
        $this->db->set('tanggal_pengisian_data', ''.date('Y-m-d H:i:s').'');
        $this->db->where('id_pendaftaran_jalur_seleksi', $id_pendaftaran_jalur_seleksi);
        $hasil = $this->db->update('tanggal_tahap_pendaftaran');

        return $hasil;
    }

    function update_upload_dokumen($id_pendaftaran_jalur_seleksi,$data){
        //update tanggal seleksi
        $this->db->set('tahap_seleksi',5);
        $this->db->where('id', $id_pendaftaran_jalur_seleksi);
        $this->db->update('pendaftaran_jalur_seleksi');

        //update tanggal tahap pendaftaran
        date_default_timezone_set('Asia/Jakarta');
        $this->db->set('tanggal_upload_dokumen', ''.date('Y-m-d H:i:s').'');
        $this->db->where('id_pendaftaran_jalur_seleksi', $id_pendaftaran_jalur_seleksi);
        $hasil = $this->db->update('tanggal_tahap_pendaftaran');

        return $hasil;
    }
    function update_upload_pas_foto($id_pendaftaran_jalur_seleksi,$data){
        $this->db->set('pas_foto',$data);
        $this->db->where('id_pendaftaran_jalur_seleksi', $id_pendaftaran_jalur_seleksi);
        $this->db->update('dokumen_pendaftar');
    }
    function update_upload_ijazah($id_pendaftaran_jalur_seleksi,$data){
        $this->db->set('ijazah',$data);
        $this->db->where('id_pendaftaran_jalur_seleksi', $id_pendaftaran_jalur_seleksi);
        $this->db->update('dokumen_pendaftar');
    }
    function update_upload_kartu_identitas($id_pendaftaran_jalur_seleksi,$data){
        $this->db->set('kartu_identitas',$data);
        $this->db->where('id_pendaftaran_jalur_seleksi', $id_pendaftaran_jalur_seleksi);
        $this->db->update('dokumen_pendaftar');
    }
    function update_upload_kartu_keluarga($id_pendaftaran_jalur_seleksi,$data){
        $this->db->set('kartu_keluarga',$data);
        $this->db->where('id_pendaftaran_jalur_seleksi', $id_pendaftaran_jalur_seleksi);
        $this->db->update('dokumen_pendaftar');
    }
    function update_upload_transkrip_nilai($id_pendaftaran_jalur_seleksi,$data){
        $this->db->set('transkrip_nilai',$data);
        $this->db->where('id_pendaftaran_jalur_seleksi', $id_pendaftaran_jalur_seleksi);
        $this->db->update('dokumen_pendaftar');
    }
    function update_upload_sertifikat_pendukung($id_pendaftaran_jalur_seleksi,$data){
        $this->db->set('sertifikat_pendukung',$data);
        $this->db->where('id_pendaftaran_jalur_seleksi', $id_pendaftaran_jalur_seleksi);
        $this->db->update('dokumen_pendaftar');
    }

    function tampil_data(){
        return $this->db->get('dokumen_pendaftar');
    }

    function add_data_pendaftaran($tables, $data){
        //INSERT KE TABLE DATA PENDAFTAR, DOKUMEN PENDAFTAR, TANGGAL TAHAP PENDAFTARAN, DAFTAR ULANG
        $hasil                          = $this->db->insert($tables, $data);
        $id_pendaftaran_jalur_seleksi   = $this->db->insert_id();

        $insert_data = array(
            'id_pendaftaran_jalur_seleksi'	=> $id_pendaftaran_jalur_seleksi,
        );
        if($hasil > 0):
            $this->db->insert('tanggal_tahap_pendaftaran', $insert_data);
            $this->db->insert('dokumen_pendaftar', $insert_data);
            $this->db->insert('data_pendaftar', $insert_data);
            $this->db->insert('daftar_ulang', $insert_data);

            return TRUE;
        else:
            return FALSE;
        endif;
    }

    function delete_data($tables, $id){
        $hasil = $this->db->delete($tables, array('id' => $id));
        return $hasil;
    }

    function data_pendaftaran_by_id($id_users){
        $this->db->select('*');
        $this->db->from('jalur_seleksi');
        $this->db->join('pendaftaran_jalur_seleksi', 'pendaftaran_jalur_seleksi.id_jalur_seleksi = jalur_seleksi.id');
        $this->db->where('pendaftaran_jalur_seleksi.id_users', $id_users);
        $hasil = $this->db->get();
        return $hasil;
    }
    
    function data_jalur_seleksi_aktif(){
        $this->db->where('status_seleksi', 1);
        $hasil = $this->db->get('jalur_seleksi');
        return $hasil;
    }
    function minus_kuota_jalur_seleksi($id_jalur_seleksi=""){
        $this->db->set('kuota_pendaftar', 'kuota_pendaftar-1',FALSE);
        $this->db->where('id', $id_jalur_seleksi);
        $this->db->update('jalur_seleksi');
        $hasil = $this->db->get('jalur_seleksi');
        return $hasil;
    }
    function detail_jalur_seleksi($id_jalur_seleksi=""){
        $this->db->where('id', $id_jalur_seleksi);
        $hasil = $this->db->get('jalur_seleksi');
        return $hasil;
    }

    function pendaftaran_jalur_seleksi_details($id=""){
        $this->db->select('*');
        $this->db->from('jalur_seleksi');
        $this->db->join('pendaftaran_jalur_seleksi', 'pendaftaran_jalur_seleksi.id_jalur_seleksi = jalur_seleksi.id');
        $this->db->where('pendaftaran_jalur_seleksi.id', $id);
        $hasil = $this->db->get();
        return $hasil;
    }

    function tanggal_tahap_pendaftaran($id){
        $this->db->where('id_pendaftaran_jalur_seleksi', $id);
        $hasil = $this->db->get('tanggal_tahap_pendaftaran');
        return $hasil;
    }

    public function penguncian($kunci_data_update)
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->db->set([
            'tahap_seleksi' => 6,
            'tanggal_terakhir_dirubah' => date('Y-m-d H:i:s'),
            'status_daftar_ulang' => 1,
        ]);
        $this->db->where('id_users', $this->session->userdata('users_id'));
        $this->db->update('pendaftaran_jalur_seleksi');

        return ;
    }

    public function cek_kunci() {
        $cek_kunci = $this->db->select('tahap_seleksi, tanggal_terakhir_dirubah')->from('pendaftaran_jalur_seleksi')->where('id_users', $this->session->userdata('users_id'))->get();
        return json_encode($cek_kunci->result());
    }

    public function nama_jalur_aktif()
    {
        $nama_jalur_aktif = $this->db->select('nama_jalur, price')->from('jalur_seleksi')->where('status_seleksi', 1)->get();
        return json_encode($nama_jalur_aktif->result());
    }

    public function bayar_sukses($value='')
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->db->set([
            'tahap_seleksi' => 7,
            'tanggal_terakhir_dirubah' => date('Y-m-d H:i:s'),
        ]);
        $this->db->where('id_users', $this->session->userdata('users_id'));
        $this->db->update('pendaftaran_jalur_seleksi');

        return ;
    }
}