<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');

        $session_data = $this->session->all_userdata();

        if(!isset($session_data['logged_in']))
            redirect(URL.'login');
    }

    public function index(){

        $this->load->model('project_model');
        
        $this->load->model('user_model');

        $this->load->model('settings_model');
        
        $data['project_category'] = $this->project_model->getProjectCategory();

        $data['user_list']        = $this->user_model->getUserList();

        $data['currency']         = $this->settings_model->getCurrency();      

        
        $header['seo_title']      = 'Settings';
        
        $header['seo_desc']       = 'Freelancer CRM';
        
        
        $this->load->view('header',$header);
           
        $this->load->view('left_panel');
        
        $this->load->view('settings_basic',$data);
        
        $this->load->view('footer');

    }
    
 
}
