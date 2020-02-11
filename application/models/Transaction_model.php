<?php

class Transaction_model extends CI_Model {



        public function getTransactionList(){
            $result = array();
            $this->load->database();
            $transaction = $this->db->get('transaction_list')->result_array();
            foreach($transaction as $value):
                $projectName = $this->getProjectName($value['project_id'])[0];
                $projectBalance = array('project_balance' => $this->getProjectBalance($value['project_id']));
                $result[]=array_merge($value,$projectName,$projectBalance);
            endforeach;

            return $result;

        }

        public function getProjectList(){
            $this->load->database();
            $result= $this->db->select('project_id,project_name')->from('project_list')->where(array('isOpportunity'=>0))->get()->result_array();
            return $result;
        }

        public function getProjectName($projectId){

            $this->load->database();
            $result= $this->db->select('project_name')->from('project_list')->where(array('project_id'=>$projectId))->get()->result_array();
            // print_r($result);
            return $result;
        }

        public function addTransaction($data = array()){

            $this->load->database();

            $this->db->insert('transaction_list', $data);

        }

        
        public function deleteTransactionInfo($transactionid){
            $this->load->database();
            $this->db->delete('transaction_list', array('transaction_id' => $transactionid));
        }

        public function editTransactionInfo($data=array()){
            $this->load->database();
            $this->db->where('transaction_id', $data['transaction_id']);
            unset($data['transaction_id']);
            $this->db->update('transaction_list', $data);
        }

        public function getProjectBalance($projectid){
            $this->load->database();
            $budget= $this->db->select('project_budget')->from('project_list')->where(array('project_id'=>$projectid))->get()->result_array()[0]['project_budget'];
            $transactions= $this->db->select_sum('transaction_amount')->from('transaction_list')->where(array('project_id'=>$projectid))->get()->result_array()[0]['transaction_amount'];
            return($budget-$transactions);
        }






}



?>