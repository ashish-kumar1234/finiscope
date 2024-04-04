<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

 
    public function login($email, $password) {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get('login');
        if ($query->num_rows() == 1) {
           return $query->row();  
        } else {
            return false; 
        }
    }
   public function details($formArray)
{
    $this->db->insert('user_details', $formArray);
    return $this->db->insert_id(); 
}

    public function kyc($formArray)
    {
            return $this->db->insert('kyc',$formArray);
            return $this->db->insert_id();
    }

    
}
?>