<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('Admin_model');
         $this->load->helper('url');
    }
	 


    public function dashboard() {
        if ($this->session->userdata('logged_in')) {
 
            $this->load->view('admin/common/sidebar');
            $this->load->view('admin/common/footer');
        } else {
            redirect('login');
        }
    }
    
    public function login(){
        $this->load->view('admin/login');
    }
    
    public function loginUser() {
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        $user = $this->Admin_model->login($email, $password);
        
        if ($user) {
            $session_data = array(
                'id' => $user->id,
                'email' => $user->email,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($session_data);
            $this->session->set_flashdata('success', 'Login successful');
            redirect('dashboard');   
        } else {
            $this->session->set_flashdata('error', 'Invalid username or password');
            redirect('login');
        }
    }
    
    
    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }


    public function user_details(){
        $this->load->view('admin/User_details');
    }
    
    public function insert_details() {
        $formArray = array(
            'name' => $this->input->post('name'),
            'dob' => $this->input->post('dob'),
            'email' => $this->input->post('email'),
            'mobile_no' => $this->input->post('mobile_no'),
            'country' => 'India',  
            'state' => $this->input->post('state'),
            'address' => $this->input->post('address'),
            'pin_code' => $this->input->post('pin_code'),
            'loan_amount' => $this->input->post('loan_amount'),
            'loan_type' => $this->input->post('loan_type'),
             
        );
    
        $this->load->model('Admin_model');
        $loanID = $this->Admin_model->details($formArray);  
        
        if ($loanID) {
            $this->session->set_flashdata('success', 'Data inserted successfully.');
            echo $loanID;  
        } else {
            $this->session->set_flashdata('error', 'Failed to insert data.');
            echo "error";
        }
    }
    
    
    public function loan_kyc(){
        $this->load->database();  
    
 
        $data['userdetail'] = $this->db->order_by('name', 'asc')->get('user_details')->result();
        $data['kyc_details'] = $this->db->order_by('id', 'asc')->get('kyc')->result();
// print_r($data);
// die;
        $this->load->view('admin/loan_kyc',$data);
    }


    public function insert_kyc() {
        $formArray = array();
        
        $upload_path = './uploads/banners/';
        $config = array(
            'upload_path' => $upload_path,
            'allowed_types' => "jpg|png|jpeg|gif|pdf",
            'overwrite' => FALSE,
            'max_size' => 10240,   
        );
    
        $this->load->library('upload', $config);
    
        $fields = ['bank_passbook', 'aadhar', 'pancard', 'bank_transaction', 'salary_slip'];
        foreach ($fields as $field) {
            if (!empty($_FILES[$field]['name'])) {
                if (!$this->upload->do_upload($field)) {
                     
                    $error = $this->upload->display_errors();
                    echo json_encode(array('status' => 'error', 'message' => $error));
                    return;
                } else {
                     
                    $fileData = $this->upload->data();
                    $formArray[$field] = $fileData['file_name'];
                }
            }
        }
        
        $formArray['user_id'] = $this->input->post('user_id');
        $formArray['monthly_income'] = $this->input->post('monthly_income');
    
        $this->load->model('Admin_model');
        $data = $this->Admin_model->kyc($formArray);
    
        if ($data) {
            echo json_encode(array('status' => 'success', 'id' => $data));  
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Failed to insert data into database'));
        }
    }
    
    
 

    public function viewdata() {
		 
		$this->load->database();
		
		 
		$details = $this->db->get('user_details')->result();
        $kyc = $this->db->get('kyc')->result();
	//  print_r($details);
    //  die;
		$data = array(
			'details' => $details,
            'kyc' => $kyc,
			 
		);
        $this->load->view('admin/viewdata',$data);
	}

    public function userdetail()
    {
        $this->load->database();  
    
 
        $data['userdetail'] = $this->db->order_by('name', 'asc')->get('user_details')->result();
print_r($data);
die;
        $this->load->view('admin/loan_kyc', $data);
    }
    
}    
