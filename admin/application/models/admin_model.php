<?php

class admin_model extends CI_Model{
    
    
    public function adminReg($data){
        $this->db->insert('admin',$data);
    }
    
    
    public function getUser()
    {
        return $this->db->get('user')->result();
    }
    public function remUser($id){
        $this->db->where('id',$id);
        if($this->db->delete('user'))
            return 1;
        else
            return 0;
    }
    public function getConfirmBook()
    {
        return $this->db->get('confirm_booking')->result();
    }
    public function getFailedBook()
    {
        return $this->db->get('failed_booking')->result();
    }
}

?>