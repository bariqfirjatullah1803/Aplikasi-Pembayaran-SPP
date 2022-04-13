<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Admin extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role_id') != 1) {
            if (!$this->session->userdata('username')) {
                redirect('auth');
                    
            }
            redirect('petugas','refresh');
        }

        
    }
    
    public function index()
    {
        

        $this->siswa();
    }

    // Role

    public function role()
    {
        $data['user'] = $this->db->get_where('tb_user',['username' => $this->session->userdata('username')])->row_array();
        $this->form_validation->set_rules('role', 'Role', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data = [
                'title' => 'Data Role',
                'role' => $this->db->get('tb_role')->result_array()
            ];
            $this->t->load('admin/template','admin/role',$data);
        } else {
            $data = [
                'role' => htmlspecialchars($this->input->post('role', true))
            ];

            $this->db->insert('tb_role', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role telah di tambahkan !</div>');
            redirect('admin/role');
        }
    }
    
    public function roleEdit()
    {
        $data['user'] = $this->db->get_where('tb_user',['username' => $this->session->userdata('username')])->row_array();

        $id = htmlspecialchars($this->input->post('idRole',true));
        $data = [
            'role' => htmlspecialchars($this->input->post('role', true))
        ];
        
        $this->db->where('id_role', $id);
        $this->db->update('tb_role', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role telah di edit !</div>');
            redirect('admin/role');
    }

    public function roleDelete($id)
    {
        $data['user'] = $this->db->get_where('tb_user',['username' => $this->session->userdata('username')])->row_array();

        $this->db->where('id_role',$id);
        $this->db->delete('tb_role');
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Role berhasil di hapus ! </div>');
        redirect('admin/role');
    }

    // Kelas
    public function kelas()
    {
        $data['user'] = $this->db->get_where('tb_user',['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('kelas','Kelas','trim|required');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'trim|required');
        
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title' => 'Data Kelas',
                'kelas' => $this->db->get('tb_kelas')->result_array()
            ];
            $this->t->load('admin/template','admin/kelas',$data);
        } else {
            $data = [
                'kelas' => htmlspecialchars($this->input->post('kelas',true)),
                'jurusan' => htmlspecialchars($this->input->post('jurusan',true))
            ];
            $this->db->insert('tb_kelas',$data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kelas telah di tambahkan ! </div>');
            
            redirect('admin/kelas','refresh');
        }
    }
    public function kelasEdit()
    {
        $data['user'] = $this->db->get_where('tb_user',['username' => $this->session->userdata('username')])->row_array();

        $id = htmlspecialchars($this->input->post('idKelas',true));
        $data = [
            'kelas' => htmlspecialchars($this->input->post('kelas',true)),
            'jurusan' => htmlspecialchars($this->input->post('jurusan',true))
        ];
        $this->db->where('id_kelas',$id);
        $this->db->update('tb_kelas',$data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kelas berhasil di edit ! </div>');
        redirect('admin/kelas','refresh');
    }

    public function kelasDelete($id)
    {
        $data['user'] = $this->db->get_where('tb_user',['username' => $this->session->userdata('username')])->row_array();

        $this->db->where('id_kelas',$id);
        $this->db->delete('tb_kelas');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kelas berhasil di hapus ! </div>');
        redirect('admin/kelas','refresh');
        
    }

    public function test()
    {
        $query = $this->db->query("SELECT MAX(id_siswa) AS idMax FROM tb_siswa")->row_array();
        $id_siswa = $query['idMax'];
        
        $no = (int) substr($id_siswa,3,3);
        $no++;

        $char = "S";
        $id_siswa = $char . sprintf("%04s", $no);
        echo $id_siswa;
    }
    // Siswa

    public function siswa()
    {
        $data['user'] = $this->db->get_where('tb_user',['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('nis', 'NIS', 'trim|required|numeric|is_unique[tb_siswa.nis]',[
            'is_unique' => 'NIS sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'trim|required');
        
        
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title' => 'Data Siswa',
                'siswa' => $this->db->query("SELECT * FROM tb_siswa ORDER BY nama ASC")->result_array(),
                'kelas' => $this->db->get('tb_kelas')->result_array(),
                'tahun' => $this->db->get('tb_spp')->result_array(),
            ];
            $this->t->load('admin/template','admin/siswa',$data);
        } else {
            
            $data = [
                'id_siswa' => $this->input->post('idSiswa'),
                'nis' => htmlspecialchars($this->input->post('nis',true)),
                'nama' => htmlspecialchars($this->input->post('nama',true)),
                'kelas' => $this->input->post('kelas',true),
                'tahun' => $this->input->post('tahun',true),
            ];
           
            
            $this->db->insert('tb_siswa',$data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data siswa telah di tambahkan ! </div>');
            
            redirect('admin/siswa','refresh');
        }
        
    }

    public function siswaEdit()
    {
        $data['user'] = $this->db->get_where('tb_user',['username' => $this->session->userdata('username')])->row_array();

        $id_siswa = $this->input->post('idSiswa');
        $data = [
            'nis' => htmlspecialchars($this->input->post('nis',true)),
            'nama' => htmlspecialchars($this->input->post('nama',true)),
            'kelas' => $this->input->post('kelas',true),
        ];
        
        $this->db->where('id_siswa',$id_siswa);
        $this->db->update('tb_siswa',$data);
        // var_dump($test);
        // die;
        
        
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data siswa berhasil di edit ! </div>');
        redirect('admin/siswa','refresh');
    }

    public function siswaDelete($id)
    {
        $data['user'] = $this->db->get_where('tb_user',['username' => $this->session->userdata('username')])->row_array();

        $this->db->where('id_siswa',$id);
        $this->db->delete('tb_siswa');
        
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data siswa berhasil di hapus ! </div>');
        redirect('admin/siswa','refresh');
        
    }

    // Petugas
    public function petugas()
    {
        $data['user'] = $this->db->get_where('tb_user',['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        
        
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title' => 'Data Petugas',
                'petugas' => $this->db->get('tb_petugas')->result_array(),
            ];
            $this->t->load('admin/template','admin/petugas',$data);
        } else {
            
            $data = [
                'id_petugas' => $this->input->post('idPetugas'),
                'nama' => htmlspecialchars($this->input->post('nama',true)),
                'username' => htmlspecialchars($this->input->post('username',true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            ];

            $user = [
                'id_user' => $this->input->post('idPetugas'),
                'nama' => htmlspecialchars($this->input->post('nama',true)),
                'username' => htmlspecialchars($this->input->post('username',true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => 2,
            ];
           
            
            $this->db->insert('tb_petugas',$data);
            $this->db->insert('tb_user',$user);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data petugas telah di tambahkan ! </div>');
            
            redirect('admin/petugas','refresh');
        }
    }

    public function petugasEdit()
    {
        $data['user'] = $this->db->get_where('tb_user',['username' => $this->session->userdata('username')])->row_array();

        $id_petugas = $this->input->post('idPetugas', true);
        $data = [
            'id_petugas' => $this->input->post('idPetugas'),
            'nama' => htmlspecialchars($this->input->post('nama',true)),
            'username' => htmlspecialchars($this->input->post('username',true)),
        ];
        $this->db->where('id_petugas',$id_petugas);
        $this->db->update('tb_petugas',$data);
        $user = [
            'nama' => htmlspecialchars($this->input->post('nama',true)),
            'username' => htmlspecialchars($this->input->post('username',true)),
        ];
        
        $this->db->where('id_user',$id_petugas);
        $this->db->update('tb_user',$user);
        
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data petugas berhasil di edit ! </div>');
        redirect('admin/petugas','refresh');
    }

    public function petugasPassword()
    {
        $data['user'] = $this->db->get_where('tb_user',['username' => $this->session->userdata('username')])->row_array();

        $id_petugas = $this->input->post('idPetugas',true);
        $data = [
            'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
        ];
        $this->db->where('id_petugas',$id_petugas);
        $this->db->update('tb_petugas',$data);
        $this->db->where('id_user',$id_petugas);
        $this->db->update('tb_user',$data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data petugas berhasil di edit ! </div>');
        redirect('admin/petugas','refresh');
    }
    public function petugasDelete($id)
    {
        $data['user'] = $this->db->get_where('tb_user',['username' => $this->session->userdata('username')])->row_array();

        $this->db->where('id_petugas',$id);
        $this->db->delete('tb_petugas');
        $this->db->where('id_user',$id);
        $this->db->delete('tb_user');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data petugas berhasil di hapus ! </div>');
        redirect('admin/petugas','refresh');
        
    }

    // Data SPP

    public function spp()
    {
        $data['user'] = $this->db->get_where('tb_user',['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('tahun', 'Tahun', 'trim|required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data = [
                'title' => 'Data SPP',
                'spp' => $this->db->get('tb_spp')->result_array()
            ];
            $this->t->load('admin/template','admin/spp',$data);
        } else {
            $data = [
                'tahun' => htmlspecialchars($this->input->post('tahun', true)),
                'nominal' => htmlspecialchars($this->input->post('nominal', true)),
            ];

            $this->db->insert('tb_spp', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" spp="alert">Data telah di tambahkan !</div>');
            redirect('admin/spp');
        }
    }
    
    public function sppEdit()
    {
        $data['user'] = $this->db->get_where('tb_user',['username' => $this->session->userdata('username')])->row_array();

        $id = htmlspecialchars($this->input->post('idSpp',true));
        $data = [
            'tahun' => htmlspecialchars($this->input->post('tahun', true)),
            'nominal' => htmlspecialchars($this->input->post('nominal', true)),
        ];
        
        $this->db->where('id_spp', $id);
        $this->db->update('tb_spp', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data telah di edit !</div>');
            redirect('admin/spp');
    }

    public function sppDelete($id)
    {
        $data['user'] = $this->db->get_where('tb_user',['username' => $this->session->userdata('username')])->row_array();

        $this->db->where('id_spp',$id);
        $this->db->delete('tb_spp');
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data berhasil di hapus ! </div>');
        redirect('admin/spp');
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
            $this->t->load('admin/template','admin/search',$data);
        } else { 
            $keyword = $this->input->post('nis');
            
            redirect('admin/result/'.$keyword,'refresh');
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
            
            $this->t->load('admin/template','admin/result',$data);
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">NIS tidak ada ! </div>');
            
            redirect('admin/pembayaran','refresh');
            
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
        
        redirect('admin/result/'.$nis,'refresh');
        
    }
    public function deleteTransaksi($id,$nis)
    {
        $this->db->where('id_transaksi',$id);
        $this->db->delete('tb_transaksi');
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data berhasil dihapus !</div>');
        
        redirect('admin/result/'.$nis,'refresh');
        
    }

    public function date()
    {
        $date1 = $this->input->post('date1');
        $date2 = $this->input->post('date2');

        echo $date1.'<br>'.$date2;
        echo '<br>'.date("Y-m-d",time());
    }
         
}
        
    /* End of file  Admin.php */
        
                            