<?php

class User_model extends CI_Model {

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

        
        public function addUser($data = array()){

            $this->load->database();

            $this->db->insert('user_list', $data);

        }

        public function getUserList(){
            $this->load->database();
            $userlist = $this->db->get('user_list')->result_array();
            return  $userlist;
        }

               
        public function deleteUserInfo($userid){
            $this->load->database();
            $this->db->delete('user_list', array('user_id' => $userid));
        }


        public function editUserInfo($data=array()){
            $this->load->database();
            $this->db->where('user_id', $data['user_id']);
            unset($data['user_id']);
            $this->db->update('user_list', $data);
        }

        public function getUserPass($username){
            $this->load->database();
            $userinfo = $this->db->get_where('user_list',array('user_name'=>$username))->result_array()[0];
            return $userinfo;
        }
     
}



?>