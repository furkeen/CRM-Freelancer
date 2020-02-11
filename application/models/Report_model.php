<?php

class Report_model extends CI_Model {

        public function getBasicReport(){
            $completed = array('completed_project' => $this->getCompletedProjectReport());
            $draft     = array('draft_project' => $this->getDraftProjectReport());
            $started   = array('started_project' => $this->getStartedProjectReport());
            $customer   = array('customer_report' => $this->getCustomerBasicReport());
            return array_merge($completed,$draft,$started,$customer);
        }


        public function getCompletedProjectReport(){
            $totalsum = 0;
            $numrow = 0;
            $this->load->database();
            // $project = $this->db->get_where('project_list',array('isOpportunity' => 0 , 'isFinished' => 0))->result_array();
            $totalsum   += $this->db->select_sum('project_budget')->from('project_list')->where(array('isOpportunity' => 0 , 'isFinished' => 1))->get()->result_array()[0]['project_budget'];
            $numrow     += $this->db->get_where('project_list',array('isOpportunity' => 0 , 'isFinished' => 1))->num_rows();
            return array('total_sum' => $totalsum,'count' => $numrow);
        }

        public function getDraftProjectReport(){
            $totalsum = 0;
            $numrow = 0;
            $this->load->database();
            // $project = $this->db->get_where('project_list',array('isOpportunity' => 0 , 'isFinished' => 0))->result_array();
            $totalsum   += $this->db->select_sum('project_budget')->from('project_list')->where(array('isOpportunity' => 1 , 'isFinished' => 0))->get()->result_array()[0]['project_budget'];
            $numrow     += $this->db->get_where('project_list',array('isOpportunity' => 1 , 'isFinished' => 0))->num_rows();
            return array('total_sum' => $totalsum,'count' => $numrow);
        }

        public function getStartedProjectReport(){
            $totalsum = 0;
            $numrow = 0;
            $this->load->database();
            $totalsum   += $this->db->select_sum('project_budget')->from('project_list')->where(array('isOpportunity' => 0 , 'isFinished' => 0))->get()->result_array()[0]['project_budget'];
            $numrow     += $this->db->get_where('project_list',array('isOpportunity' => 0 , 'isFinished' => 0))->num_rows();
            return array('total_sum' => $totalsum,'count' => $numrow);
        }


        public function getCustomerBasicReport(){
            $totalCustomer = 0;
            $totalDebt     = 0;
            $this->load->database();
            $this->load->model('customer_model');
            $totalCustomer += $this->db->get('customer_list')->num_rows();
            $customer = $this->db->select('customer_id')->from('customer_list')->get()->result_array();
            foreach($customer as $value):
                $totalDebt     += $this->customer_model->getCustomerDebt($value['customer_id']);
            endforeach;

            return array('total_customer' => $totalCustomer, 'total_debt' =>$totalDebt);

        }

        public function getActiveProjectCustomer(){
            $result = array();
            $this->load->database();
            $customer = $this->db->select('customer_id')->from('project_list')->where(array('isOpportunity'=>0,'isFinished'=>0))->get()->result_array();
            $this->load->model('customer_model');
            foreach($customer as $value):
            $customerInfo = $this->customer_model->getCustomer($value['customer_id']);
            $customerDebt = array('customer_debt' => $this->customer_model->getCustomerDebt($value['customer_id']));
            $activeStages = array('active_stages' => $this->getCustomerActiveStages($value['customer_id']));
            $result[] = array_merge($customerInfo,$customerDebt,$activeStages);
            endforeach;
            return $result;
        }

        public function getCustomerActiveStages($customerid){
            $activestages = 0;
            $this->load->database();
            $this->load->model('customer_model');
            $projects = $this->customer_model->getCustomerActiveProjects($customerid);
            foreach($projects as $value):
                $activestages += $this->db->select('stages_id')->from('project_stages')->where(array('project_id' => $value['project_id'],'stages_status'=>0))->get()->num_rows();
            endforeach;
            return $activestages;
        }

        public function getThisWeekDeadlineStages(){
            $date = strtotime("+7 day");
            $date = date('Y-m-d',  $date);

            $this->load->database();
            $this->db->select('*');
            $this->db->from('project_stages'); 
            $this->db->where("stages_deadline <=", $date);
            $this->db->order_by('stages_deadline', 'ASC');
            $stages = $this->db->get()->result_array();
            return $stages;
        }
     
}



?>