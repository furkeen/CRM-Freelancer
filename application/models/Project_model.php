<?php

class Project_model extends CI_Model {

        public function getProjectList(){
            $this->load->database();
            $this->load->model('transaction_model');
            $result=array();
            $project = $this->db->get_where('project_list',array('isOpportunity'=>0,'isFinished'=>0))->result_array();
            if(count($project)>0):
                foreach($project as $value):
                    $projectCat = $this->getProjectCategoryId($value['project_id']);
                    $projectCatName = $this->getCategoryName($projectCat[0]['project_category']);
                    $customerName = $this->getCustomerName($value['customer_id']);
                    $projectBalance = array('project_balance' =>$this->transaction_model->getProjectBalance($value['project_id']));
                    unset($value['customer_id']);
                    $result[]=array_merge($value,$projectBalance,...$projectCatName,...$customerName);
                endforeach;
            endif;
            return $result;

        }

        public function getOpportunityList(){
            $this->load->database();
            $result=array();
            $project = $this->db->get_where('project_list',array('isOpportunity'=>1))->result_array();
            if(count($project)>0):
                foreach($project as $value):
                    $projectCat = $this->getProjectCategoryId($value['project_id']);
                    $projectCatName = $this->getCategoryName($projectCat[0]['project_category']);
                    $customerName = $this->getCustomerName($value['customer_id']);
                    unset($value['customer_id']);
                    $result[]=array_merge($value,...$projectCatName,...$customerName);
                endforeach;
            endif;
            return $result;

        }

        public function getCompletedProjectList(){
            $this->load->database();
            $this->load->model('transaction_model');
            $result=array();
            $project = $this->db->get_where('project_list',array('isOpportunity'=>0,'isFinished'=>1))->result_array();
            if(count($project)>0):
                foreach($project as $value):
                    $projectCat = $this->getProjectCategoryId($value['project_id']);
                    $projectCatName = $this->getCategoryName($projectCat[0]['project_category']);
                    $customerName = $this->getCustomerName($value['customer_id']);
                    $projectBalance = array('project_balance' =>$this->transaction_model->getProjectBalance($value['project_id']));
                    unset($value['customer_id']);
                    $result[]=array_merge($value,$projectBalance,...$projectCatName,...$customerName);
                endforeach;
            endif;
            return $result;

        }

        public function getProjectCategoryId($projectId){

            $this->load->database();
            $result= $this->db->select('project_category')->from('project_detail')->where(array('project_id'=>$projectId))->get()->result_array();
            // print_r($result);
            return $result;
        }

        public function getCategoryName($categoryId){
            $this->load->database();
            $result= $this->db->select('category_name')->from('project_categories')->where(array('category_id'=>$categoryId))->get()->result_array();
            // print_r($result);
            return $result;
        }

        public function getCustomerName($customerid){

            $this->load->database();
            $result= $this->db->select('customer_name,customer_surname')->from('customer_list')->where(array('customer_id'=>$customerid))->get()->result_array();
            // print_r($result);
            return $result;

        }

        public function getProjectStages($projectId){
            $this->load->database();
            return $this->db->order_by('stages_deadline','ASC')->get_where('project_stages',array('project_id'=>$projectId))->result_array();

        }

        public function getProjectAllInfo($projectId){
            $this->load->database();
            $this->load->model('customer_model');
            $project = $this->db->get_where('project_list',array('project_id'=>$projectId))->result_array()[0];
            // $customerInfo = $this->getCustomerName($project['customer_id']);
            $projectDetail = $this->db->get_where('project_detail',array('project_id'=>$projectId))->result_array()[0];
            $categoryName  = $this->getCategoryName($projectDetail['project_category'])[0];
            
            $customerInfo=$this->customer_model->getCustomer($project['customer_id']);
            $projectStages = array('project_stages' => $this->getProjectStages($projectId));
            /// Buraya proje stageleri gelecek
            return array_merge($project,$customerInfo,$projectDetail,$categoryName,$projectStages);
        }

        public function getProjectBaseInfo($projectId){
            $this->load->database();
            $this->load->model('customer_model');
            $project = $this->db->get_where('project_list',array('project_id'=>$projectId))->result_array()[0];
            // $customerInfo = $this->getCustomerName($project['customer_id']);
            $projectDetail = $this->db->get_where('project_detail',array('project_id'=>$projectId))->result_array()[0];
            $categoryName  = $this->getCategoryName($projectDetail['project_category'])[0];
            
            $customerInfo=$this->customer_model->getCustomer($project['customer_id']);
            /// Buraya proje stageleri gelecek
            return array_merge($project,$customerInfo,$projectDetail,$categoryName);
        }

        public function getCustomerList(){
            $this->load->database();
            $result= $this->db->select('customer_id, customer_name, customer_surname')->from('customer_list')->get()->result_array();
            return $result;
        }

        public function getProjectCategory(){
            $this->load->database();
            $result= $this->db->get('project_categories')->result_array();
            return $result;
        }

        
        public function addProjectInfo($data = array()){

            $this->load->database();

            $this->db->insert('project_list', $data);

            $insertId = $this->db->insert_id();

            return $insertId;

        }
        
        public function addProjectDetail($data = array()){

            $this->load->database();

            $this->db->insert('project_detail', $data);

        }
        
        public function addProjectCategoryInfo($data = array()){

            $this->load->database();

            $this->db->insert('project_categories', $data);

        }
        
        public function addProjectStage($data = array()){

            $this->load->database();

            $this->db->insert('project_stages', $data);

        }

             
        public function editProjectStage($data=array()){
            $this->load->database();
            $this->db->where('stages_id', $data['stages_id']);
            unset($data['stages_id']);
            $this->db->update('project_stages', $data);
        }
             
        public function makeProjectStageTrue($stageid){
            $this->load->database();
            $this->db->where('stages_id', $stageid);
            $this->db->update('project_stages', array('stages_status'=>1));
        }
        public function makeProjectStageFalse($stageid){
            $this->load->database();
            $this->db->where('stages_id', $stageid);
            $this->db->update('project_stages', array('stages_status'=>0));
        }

        public function deleteProjectStage($stageid){
            $this->load->database();
            $this->db->delete('project_stages', array('stages_id' => $stageid));
        }

        public function editProjectBase($data=array()){
            $this->load->database();
            $this->db->where('project_id', $data['project_id']);
            unset($data['project_id']);
            $this->db->update('project_list', $data);
            
        }
        public function editProjectDetail($data=array()){
            $this->load->database();
            $this->db->where('project_id', $data['project_id']);
            unset($data['project_id']);
            $this->db->update('project_detail', $data);
            
        }

        public function deleteProjectAll($projectid){
            $this->load->database();
            $this->db->delete('project_list', array('project_id' => $projectid));
            $this->db->delete('project_detail', array('project_id' => $projectid));
            $this->db->delete('project_stages', array('project_id' => $projectid));
        }

        public function deleteProjectCategoryInfo($categoryid){
            $this->load->database();
            $this->db->delete('project_categories', array('category_id' => $categoryid));
        }
             
        public function makeFinishedProject($projectid){
            $this->load->database();
            $this->db->where('project_id', $projectid);
            $this->db->update('project_list', array('isFinished'=>1));
        }
             
        public function makeunFinishedProject($projectid){
            $this->load->database();
            $this->db->where('project_id', $projectid);
            $this->db->update('project_list', array('isFinished'=>0));
        }

        public function hasProjectCategoryData($categoryid){
            $this->load->database();
            $project = $this->db->get_where('project_detail',array('project_category'=>$categoryid))->num_rows();
            if($project>0){
                return true;
            }
            else{
                return false;
            }
        }

        public function editProjectCategory($data=array()){
            $this->load->database();
            $this->db->where('category_id', $data['category_id']);
            unset($data['category_id']);
            $this->db->update('project_categories', $data);
        }


}



?>