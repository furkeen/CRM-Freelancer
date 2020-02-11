<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

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
        $this->load->model('transaction_model');

        $this->load->model('settings_model');
        
        $data['transaction_list']   =   $this->transaction_model->getTransactionList();
        
        $data['project_list']       =   $this->transaction_model->getProjectList();

        $data['currency']           =   $this->settings_model->getCurrency();      

        
        // $data['balance']         =   $this->transaction_model->projectBalance(1);
        
        $header['seo_title']        =   'Transactions';
        
        $header['seo_desc']         =   'Freelancer CRM';
        
        
        $this->load->view('header',$header);
           
        $this->load->view('left_panel');
        
        $this->load->view('transaction_listing',$data);
        
        $this->load->view('footer');
    }

 
}
