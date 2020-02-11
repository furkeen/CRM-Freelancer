<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');

        $session_data = $this->session->all_userdata();

        if(!isset($session_data['logged_in']))
            redirect(URL.'login');
    }

    public function addCustomer()
    {
        $this->load->model('customer_model');

        $customer['customer_name'] = $this->input->post('customer_name');

        $customer['customer_surname'] = $this->input->post('customer_surname');

        $customer['customer_image'] = $this->input->post('customer_imagelink');


        $contact['customer_id'] = $this->customer_model->addCustomerInfo($customer);

        $contact['customer_mobile'] = $this->input->post('customer_mobile');

        $contact['customer_email'] = $this->input->post('customer_email');

        $contact['customer_phone'] = $this->input->post('customer_phone');

        $this->customer_model->addCustomerContacts($contact);


        $this->load->helper('url');

        redirect(URL . 'customer/listing');
    }

    public function editCustomer($id)
    {
        $this->load->model('customer_model');

        $customer['customer_id'] = $id;

        $customer['customer_name'] = $this->input->post('customer_name');

        $customer['customer_surname'] = $this->input->post('customer_surname');

        $customer['customer_image'] = $this->input->post('customer_imagelink');
        
        $this->customer_model->editCustomerInfo($customer);


        $contact['customer_id'] = $id;

        $contact['customer_mobile'] = $this->input->post('customer_mobile');

        $contact['customer_email'] = $this->input->post('customer_email');

        $contact['customer_phone'] = $this->input->post('customer_phone');

        $this->customer_model->editCustomerContacts($contact);


        $this->load->helper('url');

        redirect(URL . 'customer/listing');
    }

    public function deleteCustomer($id)
    {
        $this->load->model('customer_model');
      
        $this->customer_model->deleteCustomer($id);

        $this->load->helper('url');

        redirect(URL . 'customer/listing');

    }

    public function addProject()
    {

        // print_r($_POST);

        $this->load->model('project_model');

        $project['customer_id'] = $this->input->post('customer_id');

        $project['project_name'] = $this->input->post('project_name');

        $project['project_budget'] = $this->input->post('project_budget');
       
        $project['isOpportunity'] = $this->input->post('isOpportunity');

        $details['project_id'] = $this->project_model->addProjectInfo($project);

        $details['project_category'] = $this->input->post('project_category');

        $details['project_detail'] = $this->input->post('project_details');


        $this->project_model->addProjectDetail($details);

        $this->load->helper('url');

        redirect(URL . 'project/listing');
    }

    public function editProject($projectid){

        // print_r($_POST);

        $this->load->model('project_model');

        $project['project_id'] = $projectid;

        $project['customer_id'] = $this->input->post('customer_id');

        $project['project_name'] = $this->input->post('project_name');

        $project['project_budget'] = $this->input->post('project_budget');

        $project['isOpportunity'] = $this->input->post('isOpportunity');

        $details['project_id'] = $projectid;

        $details['project_category'] = $this->input->post('project_category');

        $details['project_detail'] = $this->input->post('project_details');


        $this->project_model->editProjectBase($project);

        $this->project_model->editProjectDetail($details);

        $this->load->helper('url');

        redirect(URL . 'project/listing');
    }

    
    public function deleteProject($projectid)
    {
        $this->load->model('project_model');
      
        $this->project_model->deleteProjectAll($projectid);

        $this->load->helper('url');

        redirect(URL . 'project/listing');

    }

    public function ajaxAddStages () {
        // print_r($_POST);

        $details['project_id']     = $this->input->post('project_id');

        $details['stages_deadline']    = $this->input->post('stages_date');

        $details['stages_detail'] = $this->input->post('stage_details');

        $details['stages_status']  = 0;

        $this->load->model('project_model');

        $this->project_model->addProjectStage($details);

        echo "true";

    }

    public function editStage($stageid)
    {
        $this->load->model('project_model');

        $stage['stages_id'] = $stageid;

        $stage['project_id'] = $this->input->post('project_id');

        $stage['stages_detail'] = $this->input->post('stage_details');

        $stage['stages_deadline'] = $this->input->post('stages_date');
        
        $this->project_model->editProjectStage($stage);

        $this->load->helper('url');

        redirect(URL . 'project/viewproject/'.$this->input->post('project_id'));
    }

    public function changeStageStatusTrue($stageid){
        $this->load->model('project_model');
        $this->project_model->makeProjectStageTrue($stageid);
        $this->load->helper('url');
        $this->load->library('user_agent');
        redirect($this->agent->referrer(), 'refresh'); 
    }

    public function changeStageStatusFalse($stageid){
        $this->load->model('project_model');
        $this->project_model->makeProjectStageFalse($stageid);
        $this->load->helper('url');
        $this->load->library('user_agent');
        redirect($this->agent->referrer(), 'refresh'); 
    }

    public function deleteStage($stageid){
        $this->load->model('project_model');
        $this->project_model->deleteProjectStage($stageid);
        $this->load->helper('url');
        $this->load->library('user_agent');
        redirect($this->agent->referrer(), 'refresh'); 
    }

    public function addTransaction()
    {
        print_r($_POST);

        $this->load->model('transaction_model');

        $transaction['project_id'] = $this->input->post('project_id');

        $transaction['transaction_amount'] = $this->input->post('transaction_amount');

        $transaction['transaction_date'] = $this->input->post('transaction_date');

        $this->transaction_model->addTransaction($transaction);


        $this->load->helper('url');

        redirect(URL . 'transaction/listing');
    }

    public function deleteTransaction($transactionid){
        
        $this->load->model('transaction_model');
        
        $this->transaction_model->deleteTransactionInfo($transactionid);
        
        $this->load->helper('url');

        redirect(URL . 'transaction/listing');
    }

    public function editTransaction()
    {
        $this->load->model('transaction_model');


        $transaction['transaction_id'] = $this->input->post('transaction_id');

        $transaction['project_id'] = $this->input->post('project_id');

        $transaction['transaction_amount'] = $this->input->post('transaction_amount');

        $transaction['transaction_date'] = $this->input->post('transaction_date');
        
        $this->transaction_model->editTransactionInfo($transaction);


        $this->load->helper('url');

        redirect(URL . 'transaction/listing');
    }

    public function ajaxGetProjectBalance($projectid){
        $this->load->model('transaction_model');
        echo $this->transaction_model->getProjectBalance($projectid);
    }

    
    public function deleteNote($noteid)
    {
        $this->load->model('customer_model');
      
        $customerid = $this->customer_model->deleteCustomerNote($noteid);

        $this->load->helper('url');

        redirect(URL . 'customer/customernotes/'.$customerid);

    }

    public function addNote($customerid){
       
        $date = date('Y-m-d');

        $note['customer_id'] = $customerid;

        $note['note_content'] = $this->input->post('note_content');

        $note['note_date'] = $date;

        $this->load->model('customer_model');

        $this->customer_model->addCustomerNote($note);

        $this->load->helper('url');

        redirect(URL . 'customer/customernotes/'.$customerid);
    }

    
    public function editNote($customerid)
    {
        $date = date('Y-m-d');

        $this->load->model('customer_model');

        $note['customer_id'] = $customerid;

        $note['note_content'] = $this->input->post('note_content');

        $note['note_date'] = $date;

        $note['note_id'] = $this->input->post('note_id');
        
        $this->customer_model->editCustomerNote($note);

        $this->load->helper('url');

        redirect(URL . 'customer/customernotes/'.$customerid);
    }

    public function completeProject($projectid){
        $this->load->model('project_model');
        $this->project_model->makeFinishedProject($projectid);
        $this->load->helper('url');
        redirect(URL.'project/listing'); 
    }
    public function uncompleteProject($projectid){
        $this->load->model('project_model');
        $this->project_model->makeUnfinishedProject($projectid);
        $this->load->helper('url');
        redirect(URL.'project/listing'); 
    }

    public function addProjectCategory(){

        $category['category_name'] = $this->input->post('category_name');

        $this->load->model('project_model');

        $this->project_model->addProjectCategoryInfo($category);

        $this->load->helper('url');

        redirect(URL . 'settings');
    }

    public function deleteProjectCategory($categoryid){

        $this->load->model('project_model');
        $haveData = $this->project_model->hasProjectCategoryData($categoryid);

        if(!$haveData):

        $this->project_model->deleteProjectCategoryInfo($categoryid);

        else:

        $data['warning_message'] = "This Category Has Project. You Cannot Delete!";
                
        $header['seo_title']        =   'Error';
       
        $header['seo_desc']         =   'Freelancer CRM';
       
        $this->load->view('header',$header);

        $this->load->view('common_warning',$data);

        endif;

        header("Refresh:3; url=".URL . "settings") ;

    }
    public function editProjectCategories(){
        // print_r($_POST);
        // echo '<hr>';
        $this->load->model('project_model');

        $catids     = $this->input->post('category_id');

        $catnames   = $this->input->post('category_name');

        $categories = array_combine($catids, $catnames); 

        foreach ($categories as $key => $value):

            $category['category_id'] = $key;

            $category['category_name'] = $value;

            $this->project_model->editProjectCategory($category);

        endforeach;


        $this->load->helper('url');

        redirect(URL . 'settings');
    }

    public function addEvent(){
        

        $event['event_detail'] = $this->input->post('event_content');
      
        $event['event_date'] = $this->input->post('event_date').' '.$this->input->post('event_time');

        $event['event_color'] = $this->input->post('event_color');


        $this->load->model('event_model');

        $this->event_model->addEventInfo($event);

        $this->load->helper('url');

        redirect(URL);
    }

    public function editEvent(){
        

        $event['event_id'] = $this->input->post('event_id');

        $event['event_detail'] = $this->input->post('event_content');
      
        $event['event_date'] = $this->input->post('event_date').' '.$this->input->post('event_time');

        $event['event_color'] = $this->input->post('event_color');


        $this->load->model('event_model');

        $this->event_model->editEventInfo($event);

        $this->load->helper('url');

        redirect(URL);
    }

    public function deleteEvent($eventid)
    {
        $this->load->model('event_model');
      
        $this->event_model->deleteEventInfo($eventid);

        $this->load->helper('url');

        redirect(URL);

    }

    public function ajaxEventEdit($eventid){

        $event['event_id'] = $eventid;
        
        $event['event_date'] = $this->input->post('new_date');

        $this->load->model('event_model');

        $this->event_model->editEventInfo($event);

        echo 'true';
    }

    public function addUser(){

        $this->load->helper('url');

        print_r($_POST);
        echo '<hr>';
        
        $user['user_name']  =   $this->input->post('username');
        
        $user['user_pass']  =   password_hash($this->input->post('passworld'),PASSWORD_DEFAULT);
        
        print_r($user);     
        echo '<hr>';

        $this->load->model('user_model');

        $isValid = $this->user_model->userNameCheck($user['user_name']);
        if($isValid):
            
            $this->user_model->addUser($user);

            redirect(URL.'settings');

        else:

            $data['warning_message'] = "This Username Already Taken, Please Try Again!";
                
            $header['seo_title']        =   'Error';
           
            $header['seo_desc']         =   'Freelancer CRM';
           
            $this->load->view('header',$header);
    
            $this->load->view('common_warning',$data);

        endif;
    }

    public function deleteUser($userid)
    {
        $this->load->model('user_model');
      
        $this->user_model->deleteUserInfo($userid);

        $this->load->helper('url');

        redirect(URL . 'settings');
        
    }

    public function editUser($userid){
        

        $user['user_id']   = $userid;

        $user['user_name'] = $this->input->post('user_name');
      
        $user['user_pass'] = password_hash($this->input->post('user_pass'),PASSWORD_DEFAULT);


        $this->load->model('user_model');

        $this->user_model->editUserInfo($user);

        $this->load->helper('url');

        redirect(URL.'settings');
    }

    public function ajaxCurrencyChange(){

        $currency['setting_value'] = $this->input->post('currency');

        $this->load->model('settings_model');

        $this->settings_model->editCurrency($currency);

        echo 'true';

    }

    public function deleteAllData(){

        $this->load->model('settings_model');

        $this->settings_model->resetAllData();

        $this->load->helper('url');

        redirect(URL.'settings');
    }
}
