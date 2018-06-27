<?php
class Trip_model extends CI_Model {       
	function __construct(){            
		parent::__construct();
		$this->user_id =isset($this->session->get_userdata()['user_details'][0]->id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
	}


  	/**
     * This function is used to delete test
     * @param: $id - id of test table
     */
  	function delete($id='') {
  		$this->db->where('trip_id', $id);  
  		$this->db->delete('trip'); 
  	}

  	
  	/**
      * This function is used to select data form table  
      */
  	function get_data_by($tableName='', $value='', $colum='',$condition='') {	
  		if((!empty($value)) && (!empty($colum))) { 
  			$this->db->where($colum, $value);
  		}
  		$this->db->select('*');
  		$this->db->from($tableName);
  		$query = $this->db->get();
  		return $query->result();
  	}

	/**
      * This function is used to Insert record in table  
      */
	public function insertRow($table, $data){
		$this->db->insert($table, $data);
		return  $this->db->insert_id();
	}

	/**
      * This function is used to Update record in table  
      */
	public function updateRow($table, $col, $colVal, $data) {
		$this->db->where($col,$colVal);
		$this->db->update($table,$data);
		return true;
	}
}
