<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Siswa_model extends CI_Model {
                        
public function getAllSiswa(){
    $data = $this->db->get('tb_siswa');
    return $data->result();
                                
}
public function getAllPetugas(){
    $data = $this->db->get('tb_petugas');
    return $data->result();
}
                        
                            
                        
}
                        
/* End of file Siswa_model.php */
    
                        