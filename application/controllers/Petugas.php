<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Petugas extends CI_Controller {

public function __construct()
{
    parent::__construct();
    if ($this->session->userdata('role_id') != 2) {
        if (!$this->session->userdata('username')) {
            redirect('auth');
                
        }
        redirect('petugas','refresh');
    }
}

public function index()
{
     $this->pembayaran();           
}
public function pembayaran()
    {
        $data['user'] = $this->db->get_where('tb_user',['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('nis', 'NIS', 'trim|required');
        
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title' => 'Pembayaran',
                'history' => $this->db->query("SELECT * FROM tb_transaksi INNER JOIN tb_bulan ON tb_transaksi.id_bulan = tb_bulan.id_bulan INNER JOIN tb_spp ON tb_transaksi.id_spp = tb_spp.id_spp INNER JOIN tb_siswa ON tb_siswa.id_siswa = tb_transaksi.id_siswa ORDER BY id_transaksi DESC")->result_array()
            ];
            $this->t->load('petugas/template','petugas/search',$data);
        } else { 
            $keyword = $this->input->post('nis');
            
            redirect('petugas/result/'.$keyword,'refresh');
        }
    }
    public function result($keyword)
    {
        $data['user'] = $this->db->get_where('tb_user',['username' => $this->session->userdata('username')])->row_array();

        $data['title'] = 'Data Pembayaran Siswa';
        $data['bulan'] = $this->db->get('tb_bulan')->result_array();
        // $data['siswa'] = $this->Search_m->search($keyword);
        $data['siswa'] = $this->db->query("SELECT * FROM tb_siswa WHERE nis = $keyword")->row_array();
        // $data['siswa'] = $this->db->get_where('tb_siswa',['nis', $keyword])->row_array();
        // var_dump($query);
        // die;
        if ($data['siswa']) {
            
            $this->t->load('petugas/template','petugas/result',$data);
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">NIS tidak ada ! </div>');
            
            redirect('petugas/pembayaran','refresh');
            
        }
    }
    public function bayar($id_bulan,$id_siswa,$id_petugas,$id_spp,$nis)
    {
     
        $data = [
            'id_transaksi' => time(),
            'id_bulan' => $id_bulan,
            'id_siswa' => $id_siswa,
            'id_petugas' => $id_petugas,
            'id_spp' => $id_spp,
            'status' => 'Lunas',
            'date_created' => date("Y-m-d",time())
        ];
        $this->db->insert('tb_transaksi',$data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pembayaran berhasil !</div>');
        
        redirect('petugas/result/'.$nis,'refresh');
        
    }
    public function deleteTransaksi($id,$nis)
    {
        $this->db->where('id_transaksi',$id);
        $this->db->delete('tb_transaksi');
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data berhasil dihapus !</div>');
        
        redirect('petugas/result/'.$nis,'refresh');
        
    }
        
}
        
    /* End of file  Petugas.php */
        
                            