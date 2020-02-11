<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('report_model');
        $this->load->model('event_model');
        $this->load->model('settings_model');
        $session_data = $this->session->all_userdata();

        if(!isset($session_data['logged_in']))
            redirect(URL.'login');
        
           $data['basic_report']    =   $this->report_model->getBasicReport();
           
           $data['active_customer'] =   $this->report_model->getActiveProjectCustomer();

           $data['event_list']      =   $this->event_model->getEventList();

           $data['last_stages']     =   $this->report_model->getThisWeekDeadlineStages();    

           $data['currency']     =   $this->settings_model->getCurrency();      

           $header['seo_title']     =   'Dashboard';
           
           $header['seo_desc']     =   'Freelancer CRM';

           $this->load->view('header',$header);

           $this->load->view('left_panel');

           $this->load->view('main',$data);

           $this->load->view('footer');

           $this->load->view('main_local_js');
    }
    
    public function login(){
        $this->load->view('login');
    }
    public function logincheck(){

        $this->load->library('session');
        $this->load->helper('url');

        $this->load->model('user_model');
  
        $user = $this->input->post('user');
        $pass = $this->input->post('pass');
        $userinfo = $this->user_model->getUserPass($user);

        if( password_verify($pass,$userinfo['user_pass'])){

            $this->session->set_userdata('logged_in', 'furkan');
            
            redirect(URL);

        }else{

            $data['warning_message'] = "Passworld or Username is not Correct please try again!";
                
            $header['seo_title']        =   'Error';
           
            $header['seo_desc']         =   'Freelancer CRM';
           
            $this->load->view('header',$header);
    
            $this->load->view('common_warning',$data);

            redirect(URL.'login');
        
        }
       
    }

    public function logout(){

        $this->load->library('session');

        $this->load->helper('url');

        $this->session->sess_destroy();
        
        redirect(URL.'login');
    }
}
