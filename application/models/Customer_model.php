<?php

class Customer_model extends CI_Model {


        public function getCustomerList(){
            $result = array();
            $this->load->database();
            $customer = $this->db->get('customer_list')->result_array();
            foreach($customer as $value):
                $contacts = $this->db->get_where('customer_contacts',array('customer_id'=>$value['customer_id']))->result_array()[0];
                $debt     = array('customer_debt' => $this->getCustomerDebt($value['customer_id']));
                $result[]=array_merge($value,$contacts,$debt);
            endforeach;

            return $result;

        }

        public function getCustomerDebt($customerid){
           
            $this->load->model('transaction_model');
           
            $projects = $this->getCustomerActiveProjects($customerid);
           
            $customerDebt = 0; 
           
            if(count($projects)>0):
           
                foreach($projects as $value):
           
                    $customerDebt += $this->transaction_model->getProjectBalance($value['project_id']);
           
                endforeach;       
           
                return $customerDebt;
           
            else:
           
                return $customerDebt;
           
            endif;

        }

        public function getCustomerActiveProjects($customerid){
           
            $this->load->database();
         
            $result= $this->db->select('project_id')->from('project_list')->where(array('customer_id'=>$customerid,'isOpportunity'=>0))->get()->result_array();

            return $result;
        }

        public function getCustomer($id){

            $this->load->database();
            
            $customer = $this->db->get_where('customer_list',array('customer_id'=>$id))->result_array()[0]; 
            
            $contacts = $this->db->get_where('customer_contacts',array('customer_id'=>$id))->result_array();
                
            $result=array_merge($customer,...$contacts);

            return $result;

        }

        public function deleteCustomer($id){
            $this->load->database();
            $this->db->delete('customer_list', array('customer_id' => $id));
            $this->db->delete('customer_contacts', array('customer_id' => $id));
        }


        public function addCustomerInfo($data = array()){

            $this->load->database();

            $this->db->insert('customer_list', $data);

            $insertId = $this->db->insert_id();

            return $insertId;

        }

        public function addCustomerContacts($data = array()){

            $this->load->database();

            $this->db->insert('customer_contacts', $data);
                     
        }

        
        public function editCustomerInfo($data=array()){
            $this->load->database();
            $this->db->where('customer_id', $data['customer_id']);
            unset($data['customer_id']);
            $this->db->update('customer_list', $data);
        }
        
        public function editCustomerContacts($data=array()){
            $this->load->database();
            $this->db->where('customer_id', $data['customer_id']);
            unset($data['customer_id']);
            $this->db->update('customer_contacts', $data);
        }

        public function getCustomerNotes($customerid){
            $this->load->database();
            $notes = $this->db->get_where('customer_notes',array('customer_id'=>$customerid))->result_array(); 
            return $notes;
        }

        public function deleteCustomerNote($noteid){
           
            $this->load->database();
           
            $customerid = $this->db->get_where('customer_notes',array('note_id'=>$noteid))->result_array()[0]['customer_id']; 
           
            $this->db->delete('customer_notes', array('note_id' => $noteid));
           
            return  $customerid;
        }

        
        public function addCustomerNote($data = array()){

            $this->load->database();

            $this->db->insert('customer_notes', $data);
                     
        }

               
        public function editCustomerNote($data=array()){
            $this->load->database();
            $this->db->where('note_id', $data['note_id']);
            unset($data['note_id']);
            $this->db->update('customer_notes', $data);
        }

}



?>