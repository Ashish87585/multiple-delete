<?php 
class Home_model extends CI_Model{
    public function getAll(){
        $this->db->select('*');
        $this->db->from('data');
        return $this->db->get()->result_array();
    }

    function delete_multiple($ids) {
		$data = $this->db->where_in('id', $ids)->delete('data');
		if ($data) {
			echo "1";
		} else {
			echo "0";
		}
	}
}
?>