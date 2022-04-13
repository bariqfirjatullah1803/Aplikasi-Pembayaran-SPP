<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Laporan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('Siswa_model');
        
    }
    public function index()
    {
        if ($this->session->userdata('role_id') != 1) {
            if (!$this->session->userdata('username')) {
                redirect('auth');
                    
            }
            redirect('petugas','refresh');
        }
        $data = [
            'title' => 'Laporan'
        ];
        $this->t->load('admin/template','admin/laporan',$data);
    }
    function printSiswa(){

        $data['title'] = 'Data Laporan Siswa';
        $data['siswa'] = $this->db->get('tb_siswa')->result_array();
        $this->t->load('laporan/template','laporan/siswa',$data);

    }

    public function getSiswa()
    {
        $data =  $this->Siswa_model->getAllSiswa();
        $i = 1;
        foreach ($data as $row ) {
            echo "<tr>";
            echo "<td>".$i."</td>";
            echo "<td>".$row->nis."</td>";
            echo "<td>".$row->nama."</td>";
            echo "<td>".$row->kelas."</td>";
            echo "<td>".$row->tahun."</td>";
            echo "</tr>";
            $i++;
        }
    }
    public function printPetugas()
    {
        $data = [
            'title' => 'Data Laporan Petugas',
            'petugas' => $this->Siswa_model->getAllPetugas(),

        ];
        $this->t->laod('laporan/template','laporan/petugas',$data);
    }
    public function getPetugas()
    {
        $data = $this->Siswa_model->getAllPetugas();
        $i = 1;
        foreach ($data as $row ) {
            echo "<tr>";
            echo "<td>".$i."</td>";
            echo "<td>".$row->id_petugas."</td>";
            echo "<td>".$row->nama."</td>";
            echo "<td>".$row->username."</td>";
            echo "<td>".$row->password."</td>";
            echo "</tr>";
            $i++;
        }
    }
    public function siswa()
    {
        $this->form_validation->set_rules('kelas', 'Kelas', 'trim|required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->db->from('tb_siswa');
            $this->db->order_by('nama','asc');
            $siswa = $this->db->get();
            $data['siswa'] = $siswa->result_array();
            $data['title'] = 'Laporan Data Siswa';
            $data['Gkelas'] = $this->db->query('SELECT kelas FROM tb_siswa GROUP BY kelas ORDER BY kelas ASC')->result_array();
            $this->t->load('admin/template','laporan/siswa',$data);
        } else {
            $kelas = $this->input->post('kelas');
            $data['siswa'] = $this->db->get_where('tb_siswa',['kelas' =>$kelas ])->result_array();
            $data['title'] = 'Laporan Data Siswa';
            $data['Gkelas'] = $this->db->query('SELECT kelas FROM tb_siswa GROUP BY kelas ORDER BY kelas ASC')->result_array();
            $data['kelas'] = $kelas;
            $this->t->load('admin/template','laporan/siswa',$data);
            
        }
        
    }
    public function petugas()
    {
        $data['title'] = "Laporan Data Petugas";
        $data['petugas'] = $this->db->get('tb_petugas')->result_array();
        $this->t->load('admin/template','laporan/petugas',$data);
    }
    public function spp($id)
    {
        $data['spp'] = $this->db->query("SELECT * FROM tb_transaksi INNER JOIN tb_bulan ON tb_transaksi.id_bulan = tb_bulan.id_bulan INNER JOIN tb_spp ON tb_transaksi.id_spp = tb_spp.id_spp INNER JOIN tb_siswa ON tb_siswa.id_siswa = tb_transaksi.id_siswa WHERE id_transaksi = $id")->row_array();
        $data['title'] = $data['spp']['id_transaksi'];
        $data['script'] = '';
        $this->load->view('laporan/spp',$data);
    }
    public function cetakSPP($id)
    {
        $data['spp'] = $this->db->query("SELECT * FROM tb_transaksi INNER JOIN tb_bulan ON tb_transaksi.id_bulan = tb_bulan.id_bulan INNER JOIN tb_spp ON tb_transaksi.id_spp = tb_spp.id_spp INNER JOIN tb_siswa ON tb_siswa.id_siswa = tb_transaksi.id_siswa WHERE id_transaksi = $id")->row_array();
        $data['title'] = $data['spp']['id_transaksi'];
        $data['script'] = '<script>window.print()</script>';
        $this->load->view('laporan/spp',$data);

    }
    public function pdf($id)
    {
        $data['spp'] = $this->db->query("SELECT * FROM tb_transaksi INNER JOIN tb_bulan ON tb_transaksi.id_bulan = tb_bulan.id_bulan INNER JOIN tb_spp ON tb_transaksi.id_spp = tb_spp.id_spp INNER JOIN tb_siswa ON tb_siswa.id_siswa = tb_transaksi.id_siswa WHERE id_transaksi = $id")->row_array();
        $this->pdf->setPaper('A4','potrait');
        $this->pdf->filename = $id.".pdf";
        $this->pdf->load_view('laporan/spp',$data);
    }
    public function data_pembayaran()
    {
        $this->form_validation->set_rules('tanggalawal', 'Tanggal Awal', 'trim|required');
        $this->form_validation->set_rules('tanggalakhir', 'Tanggal Akhir', 'trim|required');
        
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Laporan Data Pembayaran';
            $data['pembayaran'] = $this->db->query("SELECT * FROM tb_transaksi INNER JOIN tb_bulan ON tb_transaksi.id_bulan = tb_bulan.id_bulan INNER JOIN tb_spp ON tb_transaksi.id_spp = tb_spp.id_spp INNER JOIN tb_siswa ON tb_siswa.id_siswa = tb_transaksi.id_siswa ORDER BY id_transaksi DESC")->result_array();
            $data['tanggal'] = '';
            $this->t->load('admin/template','laporan/data-pembayaran',$data);
        } else {
            $tanggalawal =  $this->input->post('tanggalawal');
            $tanggalakhir =  $this->input->post('tanggalakhir');
            $data['title'] = 'Laporan Data Pembayaran';
            $data['pembayaran'] = $this->db->query("SELECT * FROM tb_transaksi INNER JOIN tb_bulan ON tb_transaksi.id_bulan = tb_bulan.id_bulan INNER JOIN tb_spp ON tb_transaksi.id_spp = tb_spp.id_spp INNER JOIN tb_siswa ON tb_siswa.id_siswa = tb_transaksi.id_siswa WHERE tb_transaksi.date_created BETWEEN '$tanggalawal' AND '$tanggalakhir' ORDER BY tb_transaksi.date_created ASC")->result_array();
            $data['tanggal'] = [$tanggalawal,$tanggalakhir];
            $this->t->load('admin/template','laporan/data-pembayaran',$data);

        }
        
    }
        
}
        
    /* End of file  Laporan.php */
        
                            