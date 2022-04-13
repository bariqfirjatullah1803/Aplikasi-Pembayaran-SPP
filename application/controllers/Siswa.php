<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Siswa extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        
    }
    
    public function index()
    {
        
        if($this->session->userdata('nis')){
            
            redirect('siswa/dashboard','refresh');
        }
        $this->form_validation->set_rules('nomor', 'nomor', 'trim|required');
        
        if ($this->form_validation->run() == false) {
            
            $data['title'] = "Aplikasi Pembayaran SPP";
            $this->load->view('auth/siswa',$data);
        } else {
            $this->_cekNis();
        }
        
    }

    public function _cekNis()
    {
        $nis = $this->input->post('nomor');
            $siswa = $this->db->get_where('tb_siswa',['nis' => $nis])->row_array();
            
            if($siswa){

                $data = [
                    'nis' => $siswa['nis'],
                    'nama' => $siswa['nama'],

                ];

                $this->session->set_userdata($data);
                
                redirect('siswa/dashboard','refresh');
                

            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" > NIS yang anda masukan salah !</div>');
                
                redirect('siswa','refresh');
            }
    }

    public function dashboard()
    {
        if (!$this->session->userdata('nis')) {
          
          redirect('siswa','refresh');
            
        }
        $data['user'] = $this->db->get_where('tb_siswa',['nis' => $this->session->userdata('nis')])->row_array();
        $data['title'] = 'History Pembayaran';
        $this->t->load('siswa/template','siswa/dashboard',$data);
    }
    public function history()
    {
        if (!$this->session->userdata('nis')) {
          
            redirect('siswa','refresh');
              
          }
        $data['user'] = $this->db->get_where('tb_siswa',['nis' => $this->session->userdata('nis')])->row_array();
        $data['title'] = 'History Pembayaran';
        $id_siswa = $data['user']['id_siswa'];
        $data['spp'] = $this->db->query("SELECT * FROM tb_transaksi INNER JOIN tb_bulan ON tb_transaksi.id_bulan = tb_bulan.id_bulan INNER JOIN tb_spp ON tb_transaksi.id_spp = tb_spp.id_spp INNER JOIN tb_siswa ON tb_siswa.id_siswa = tb_transaksi.id_siswa WHERE tb_transaksi.id_siswa = '$id_siswa' ORDER BY tb_transaksi.id_bulan DESC")->result_array();
        $date = date("m");
        // var_dump($date);
        // die;
        $data['realdate'] = $this->db->get_where('tb_bulan',['id_bulan' => $date])->row_array();
        // $data['maxbulan'] = $this->db->query("SELECT max(id_bulan) as maxid FROM tb_transaksi WHERE id_siswa = '$id_siswa'")->row_array();
        $data['maxbulan'] = $this->db->query("SELECT id_bulan FROM tb_transaksi WHERE id_bulan = $date AND id_siswa = '$id_siswa'")->row_array();
        // if ($realdate['id_bulan'] != $maxbulan['maxid']) {
        //     echo 'Belum Lunas';
        // }
        $this->t->load('siswa/template','siswa/history',$data);

    }

    public function bukti()
    {
        if (!$this->session->userdata('nis')) {
          
            redirect('siswa','refresh');
              
          }
        $data['user'] = $this->db->get_where('tb_siswa',['nis' => $this->session->userdata('nis')])->row_array();
        $data['title'] = 'Struk';
        $this->load->view('siswa/bukti',$data);
    }

    public function logout()
    {
        
        $this->session->unset_userdata('nis');
        
        $this->session->unset_userdata('nama');
        
        redirect('siswa','refresh');
        
    }
        
}
        
    /* End of file  Siswa.php */
        
                            