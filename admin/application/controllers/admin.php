<?php
class admin extends CI_Controller{
    
    public function register(){
        $this->load->view("include/css");
        $this->load->view("include/header");
     
        $this->load->view("admin_register");
           $this->load->view("include/footer");
        
        if($this->input->post('submit')){
            $data['name'] = $this->input->post('name');
            $data['email'] = $this->input->post('email');
            $data['password'] = $this->input->post('pass');
            $cpass = $this->input->post('cpass');
            $data['mobile'] = $this->input->post('mobile');
            if($data['password'] == $cpass){
                $this->admin_model->adminReg($data);
                echo "<script>alert('Admin Registered Successfully')</script>";
            }
        }
    }
    
    public function login(){
        $this->load->view("include/css");
        $this->load->view("include/header");
     
        $this->load->view("admin_login");
           $this->load->view("include/footer");
        
        if($this->input->post('submit')){
            $email = $this->input->post('email');
            $pass = $this->input->post('pass');
            
            $this->db->where('email',$email);
            $d = $this->db->get('admin')->row();
            if($d->password == $pass){
                $data = array(
                    'email'=>$d->email,
                    'mobile'=>$d->mobile,
                    'name'=>$d->name
                );
                $this->session->set_userdata($data);
                redirect('admin/index');
            }
        
        }
    }
    
    public function logout(){
        $array_items = array('name', 'email', 'mobile');

        $this->session->unset_userdata($array_items);
        redirect('admin/login');
    }
   
    
    public function index(){
        $this->load->view("include/css");
        $this->load->view("include/header");
     
        $this->load->view("admin_panel");
           $this->load->view("include/footer");
    }
    public function loadUser()
    {
        $data["rs"] = $this->admin_model->getUser();
        $this->load->view("include/css");
        $this->load->view("include/header");
     
        $this->load->view("user_view",$data);
           $this->load->view("include/footer");
        
    }
    public function removeUser($id){
        $r = $this->admin_model->remUser($id);
        $this->loadUser();
    }
    
    public function confirmBook()
    {
        $data["rs"] = $this->admin_model->getConfirmBook();
        $this->load->view("include/css");
        $this->load->view("include/header");
     
        $this->load->view("confirm_book",$data);
           $this->load->view("include/footer");
    }
    public function failedBook()
    {
        $data["rs"] = $this->admin_model->getFailedBook();
        $this->load->view("include/css");
        $this->load->view("include/header");
     
        $this->load->view("failed_book",$data);
           $this->load->view("include/footer");
    }
    
    
}

?>