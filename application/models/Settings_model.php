<?php

class Settings_model extends CI_Model {

        public function getCurrency(){
            $this->load->database();
            $result =   $this->db->get_where('settings_list',array('setting_name'=>'currency'))->result_array()[0]['setting_value'];
            return $result;
        }

        public function editCurrency($data=array()){
            $this->load->database();
            $this->db->where('setting_name', 'currency');
            $this->db->update('settings_list', $data);
        }

        public function userNameCheck($username){
            $this->load->database();
            $this->db->select('user_name');
            $this->db->from('user_list');
            $this->db->where('user_name =',$username);
            $result = $this->db->get()->num_rows();

            if($result>0):
                return false;
            else:
                return true;
            endif;
            
        }

        public function resetAllData(){

            $this->load->database();
            
            $this->db->truncate('customer_contacts');
            $this->db->truncate('customer_notes');
            $this->db->truncate('customer_list');
            $this->db->truncate('event_list');
            $this->db->truncate('project_categories');
            $this->db->truncate('project_stages');
            $this->db->truncate('project_detail');
            $this->db->truncate('project_list');
            $this->db->truncate('transaction_list');
        }
}



?>