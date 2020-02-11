<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');

        $session_data = $this->session->all_userdata();

        if(!isset($session_data['logged_in']))
            redirect(URL.'login');
    }
    
    
    public function listing()
    {
        $this->load->model('customer_model');

        $this->load->model('settings_model');
       
        $data['customer_list']  =   $this->customer_model->getCustomerList();

        $data['currency']     =   $this->settings_model->getCurrency();      
       
        $header['seo_title']    =   'Customer List';
       
        $header['seo_desc']     =   'Freelancer CRM';
       
       
        $this->load->view('header',$header);
       
        $this->load->view('left_panel');
       
        $this->load->view('customer_listing',$data);
       
        $this->load->view('footer');
    }

    public function addCustomer()
    {
        $header['seo_title']    =   'Add Customer';
        
        $header['seo_desc']     =   'Freelancer CRM';
        
       
        $this->load->view('header',$header);
           
        $this->load->view('left_panel');
        
        $this->load->view('customer_add');
        
        $this->load->view('footer');
    }
    public function editCustomer($id)
    {
        
        $this->load->model('customer_model');
        
        $data['customer']       =   $this->customer_model->getCustomer($id);
        
        $header['seo_title']    =   'Customer Edit';
        
        $header['seo_desc']     =   'Freelancer CRM';
        
        
        $this->load->view('header',$header);
           
        $this->load->view('left_panel');
        
        $this->load->view('customer_edit',$data);
        
        $this->load->view('footer');
    }

    public function customerNotes($customerid){

        $this->load->model('customer_model');
        
        $data['notes']          =   $this->customer_model->getCustomerNotes($customerid);
        
        $data['customer_id']    =   $customerid;

        $header['seo_title']    =   'Customer Notes';
        
        $header['seo_desc']     =   'Freelancer CRM';
        
        
        $this->load->view('header',$header);
                 
        $this->load->view('left_panel');
        
        $this->load->view('customer_notes',$data);
         
        $this->load->view('footer');
            
    }
}
