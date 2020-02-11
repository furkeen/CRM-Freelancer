<?php

class Event_model extends CI_Model {


        public function getEventList(){
            $this->load->database();
            $event = $this->db->get('event_list')->result_array();
            // foreach($customer as $value):
            //     $contacts = $this->db->get_where('customer_contacts',array('customer_id'=>$value['customer_id']))->result_array()[0];
            //     $debt     = array('customer_debt' => $this->getCustomerDebt($value['customer_id']));
            //     $result[]=array_merge($value,$contacts,$debt);
            // endforeach;
            if(count($event)>0){
                return $event;
            }else{
                return $this->defaultEvent();
            }
            

        }

        public function addEventInfo($data = array()){

            $this->load->database();

            $this->db->insert('event_list', $data);
                     
        }

        public function deleteEventInfo($eventid){

            $this->load->database();

            $this->db->delete('event_list', array('event_id' => $eventid));
        }

                
        public function editEventInfo($data=array()){

            $this->load->database();

            $this->db->where('event_id', $data['event_id']);

            unset($data['event_id']);
            
            $this->db->update('event_list', $data);
        }

        public function defaultEvent(){
            return 
            array(
                array(
                'event_id'      =>  0,
                'event_detail'  =>  'example detail',
                'event_date'    =>  '2020-02-06 13:00:00',
                'event_color'   =>  'success'
                ),
            );
        }


}
