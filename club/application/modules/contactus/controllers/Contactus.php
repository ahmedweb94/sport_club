<?php
defined('BASEPATH') OR exit('No direct script access allowed ');
class Contactus extends CI_Controller {

    function __construct() {
        parent::__construct(); 
		$this->load->model('Contactus_model');
$this->user_id = isset($this->session->get_userdata()['user_details'][0]->id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
    }

    /**
     * This function is used for show users list
     * @return Void
     */
    public function index(){
        is_login();
        if(CheckPermission("contactus", "own_read")){
            $this->load->view('include/header');
            $this->load->view('contactus_table');                
            $this->load->view('include/footer');            
        } else {
            $this->session->set_flashdata('messagePr', 'لا تملك تصاريح هذه العملية');
            redirect( base_url().'user/profile', 'refresh');
        }
    }

    /**
     * This function is used to delete users
     * @return Void
     */
    public function delete($id){
        is_login(); 
        $ids = explode('-', $id);
        foreach ($ids as $id) {
            $this->Contactus_model->delete($id); 
        }
       redirect(base_url().'contactus/', 'refresh');
    }


    /**
     * This function is used to create datatable in users list page
     * @return Void
     */
    public function dataTable (){
        is_login();
	    $table = 'contactus';
    	$primaryKey = 'contactus_id';
    	$columns = array(
           array( 'db' => 'contactus_id', 'dt' => 0 ),array( 'db' => 'contactus_name', 'dt' => 1 ),array( 'db' => 'contactus_email', 'dt' => 2 )
,array( 'db' => 'contactus_dess', 'dt' => 3 ),array( 'db' => 'contactus_id', 'dt' => 4 )
		);

        $sql_details = array(
			'user' => $this->db->username,
			'pass' => $this->db->password,
			'db'   => $this->db->database,
			'host' => $this->db->hostname
		);
		
		$output_arr = SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns);
		foreach ($output_arr['data'] as $key => $value) {
			$id = $output_arr['data'][$key][count($output_arr['data'][$key])  - 1];
			$output_arr['data'][$key][count($output_arr['data'][$key])  - 1] = '';

			if(CheckPermission($table, "all_update")){
			$output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a id="btnEditRow" class="modalButtoncontactus mClass"  href="javascript:;" type="button" data-src="'.$id.'" title="Edit"><i class="fa fa-eye" data-id=""></i></a>';
			}else if(CheckPermission($table, "own_update") && (CheckPermission($table, "all_update")!=true)){
				$user_id =getRowByTableColomId($table,$id,'users_id','user_id');
				if($user_id==$this->user_id){
			$output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a id="btnEditRow" class="modalButtoncontactus mClass"  href="javascript:;" type="button" data-src="'.$id.'" title="Edit"><i class="fa fa-eye" data-id=""></i></a>';
				}
			}
			
			if(CheckPermission($table, "all_delete")){
			$output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a style="cursor:pointer;" data-toggle="modal" class="mClass" onclick="setId('.$id.', \'contactus\')" data-target="#cnfrm_delete" title="delete"><i class="fa fa-trash-o" ></i></a>';}
			else if(CheckPermission($table, "own_delete") && (CheckPermission($table, "all_delete")!=true)){
				$user_id =getRowByTableColomId($table,$id,'users_id','user_id');
				if($user_id==$this->user_id){
			$output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a style="cursor:pointer;" data-toggle="modal" class="mClass" onclick="setId('.$id.', \'contactus\')" data-target="#cnfrm_delete" title="delete"><i class="fa fa-trash-o" ></i></a>';
				}
			}
            $output_arr['data'][$key][0] = '<input type="checkbox" name="selData" value="'.$output_arr['data'][$key][0].'">';
		}
		echo json_encode($output_arr);
    }


    /**
     * This function is used to add and update users
     * @return Void
     */
    public function add_edit($id='') {   
        $data = $this->input->post();
$contactus_name = $this->input->post('contactus_name');
$contactus_email = $this->input->post('contactus_email');
$contactus_phone = $this->input->post('contactus_phone');
//$contactus_title = $this->input->post('contactus_title');
$contactus_dess = $this->input->post('contactus_dess');
//$contactus_date = $this->input->post('contactus_date');
        if($this->input->post('contactus_id')) {
            $id = $this->input->post('contactus_id');
        }/*
        if(isset($this->session->userdata ('user_details')[0]->users_id)) {
                $redirect = 'contactus';
        } else {
          redirect(base_url().'user/login', 'refresh');
        }
        
        
        if($id != '') {
$contactus_id = $this->input->post('contactus_id');        
$dataedit['contactus_name'] = $this->input->post('contactus_name');
$dataedit['contactus_email'] = $this->input->post('contactus_email');
$dataedit['contactus_phone'] = $this->input->post('contactus_phone');
//$dataedit['contactus_title'] = $this->input->post('contactus_title');
$dataedit['contactus_dess'] = $this->input->post('contactus_dess');
//$dataedit['contactus_date'] = $this->input->post('contactus_date');

            if(isset($data['edit'])){
                unset($data['edit']);
            }
            $this->Contactus_model->updateRow('contactus', 'contactus_id', $contactus_id, $dataedit);
            $this->session->set_flashdata('messagePr', 'تم تعديل البيانات بنجاح');
            redirect( base_url().'contactus', 'refresh');
        } else { */
            if(isset ($data['submit'])){
                $data = $this->input->post();
                //$data['token'] = $this->generate_token();
                //$data['contactus_id'] = $this->id;
                $data['contactus_name'] = $contactus_name;
                $data['contactus_email'] = $contactus_email;
                $data['contactus_phone'] = $contactus_phone;
	        //$data['contactus_title'] = $contactus_title;
                $data['contactus_dess'] = $contactus_dess;
               // $data['contactus_date'] = $contactus_date;
            
                unset($data['submit']);
                $this->Contactus_model->insertRow('contactus', $data);
                redirect( base_url().'contactus', 'refresh');
            }
        }
    
    

   public function get_modal() {
        is_login();
        if($this->input->post('id')){
            $data['userData'] = getDataByid('contactus',$this->input->post('id'),'contactus_id'); 
            echo $this->load->view('add_form', $data, true);
        } else {
            echo $this->load->view('add_form', '', true);
        }
        exit;
    }



    /**
     * This function is used to upload file
     * @return Void
     */
    function upload() {
        foreach($_FILES as $name => $fileInfo)
        {
            $filename=$_FILES[$name]['name'];
            $tmpname=$_FILES[$name]['tmp_name'];
            $exp=explode('.', $filename);
            $ext=end($exp);
            $newname=  $exp[0].'_'.time().".".$ext; 
            $config['upload_path'] = 'assets/images/';
            $config['upload_url'] =  base_url().'assets/images/';
            $config['allowed_types'] = "gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp";
            $config['max_size'] = '2000000'; 
            $config['file_name'] = $newname;
            $this->load->library('upload', $config);
            move_uploaded_file($tmpname,"assets/images/".$newname);
            return $newname;
        }
    }
  

}
?>
