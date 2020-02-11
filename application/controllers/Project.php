<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

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
        $this->load->model('project_model');
        
        $this->load->model('settings_model');

        $data['project_list']       =   $this->project_model->getProjectList();
        
        $data['opportunity_list']   =   $this->project_model->getOpportunityList();
       
        $data['complete_list']      =   $this->project_model->getCompletedProjectList();

        $data['currency']     =   $this->settings_model->getCurrency();      

       
        $header['seo_title']        =   'Project Listing';
       
        $header['seo_desc']         =   'Freelancer CRM';
       

        $this->load->view('header',$header);
        
        $this->load->view('left_panel');
        
        $this->load->view('project_listing',$data);
        
        $this->load->view('footer');
    }

    public function viewProject($projectid)
    {
        $this->load->model('project_model');
        
        $data['project_detail']=$this->project_model->getProjectAllInfo($projectid);
        
        $header['seo_title']    = 'Project Detail';
        
        $header['seo_desc']     = 'Freelancer CRM';
        

        $this->load->view('header',$header);
        
        $this->load->view('left_panel');
        
        $this->load->view('project_view',$data);
        
        $this->load->view('footer');
    }



    public function addProject()
    {
        $this->load->model('project_model');
       
        $data['customer_list']=$this->project_model->getCustomerList();
       
        $data['project_category']=$this->project_model->getProjectCategory();
       
        $header['seo_title']    =   'Add Porject';
       
        $header['seo_desc']     =   'Freelancer CRM';
       

        $this->load->view('header',$header);
       
        $this->load->view('left_panel');
       
        $this->load->view('project_add', $data);
       
        $this->load->view('footer');
    }

    public function editProject($projectid)
    {
        $this->load->model('project_model');

        $data['customer_list']      =   $this->project_model->getCustomerList();
        
        $data['project_category']   =   $this->project_model->getProjectCategory();
        
        $data['project_base']       =   $this->project_model->getProjectBaseInfo($projectid);
                
        $header['seo_title']        =   'Edit Project';
        
        $header['seo_desc']         =   'Freelancer CRM';
        
        $this->load->view('header',$header);
           
        $this->load->view('left_panel');
        
        $this->load->view('project_edit',$data);
        
        $this->load->view('footer');
    }
}
