<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Search_m extends CI_Model {
                        
public function search($keyword){
    $this->db->select('*');
    $this->db->from('tb_siswa');
    $this->db->like('nis',$keyword);
    return $this->db->get()->row_array();
                                
}
                        
                            
                        
}
                        
/* End of file Search.php */
    
                        