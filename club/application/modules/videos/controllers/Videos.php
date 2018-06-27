<?php
defined('BASEPATH') OR exit('No direct script access allowed ');
class Videos extends CI_Controller {

    function __construct() {
        parent::__construct(); 
        $this->load->model('Videos_model');
        $this->user_id = isset($this->session->get_userdata()['user_details'][0]->id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
    }

    /**
     * This function is used for show users list
     * @return Void
     */
    public function index(){
        is_login();
        if(CheckPermission("videos", "own_read")){
            $this->load->view('include/header');
            $this->load->view('videos_table');                
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
            $this->Videos_model->delete($id); 
        }
        redirect(base_url().'videos/', 'refresh');
    }


    /**
     * This function is used to create datatable in users list page
     * @return Void
     */
    public function dataTable (){
        is_login();
        $table = 'videos';
        $primaryKey = 'videos_id';
        $columns = array(
         array( 'db' => 'videos_id', 'dt' => 0 ),array( 'db' => 'videos_title', 'dt' => 1 )
         ,array( 'db' => 'videos_description', 'dt' => 2 ),array( 'db' => 'videos_link', 'dt' => 3 ),array( 'db' => 'videos_id', 'dt' => 4 )
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
         $output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a id="btnEditRow" class="modalButtonvideos mClass"  href="javascript:;" type="button" data-src="'.$id.'"  data-view="1"  title="Show"><i class="fa fa-eye" data-id=""></i></a>';

         if(CheckPermission($table, "all_update")){
             $output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a id="btnEditRow" class="modalButtonvideos mClass"  href="javascript:;" type="button" data-src="'.$id.'" title="Edit"><i class="fa fa-pencil" data-id=""></i></a>';
         }else if(CheckPermission($table, "own_update") && (CheckPermission($table, "all_update")!=true)){
            $user_id =getRowByTableColomId($table,$id,'users_id','user_id');
            if($user_id==$this->user_id){
             $output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a id="btnEditRow" class="modalButtonvideos mClass"  href="javascript:;" type="button" data-src="'.$id.'" title="Edit"><i class="fa fa-pencil" data-id=""></i></a>';
         }
     }
     
     if(CheckPermission($table, "all_delete")){
         $output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a style="cursor:pointer;" data-toggle="modal" class="mClass" onclick="setId('.$id.', \'videos\')" data-target="#cnfrm_delete" title="delete"><i class="fa fa-trash-o" ></i></a>';}
         else if(CheckPermission($table, "own_delete") && (CheckPermission($table, "all_delete")!=true)){
            $user_id =getRowByTableColomId($table,$id,'users_id','user_id');
            if($user_id==$this->user_id){
             $output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a style="cursor:pointer;" data-toggle="modal" class="mClass" onclick="setId('.$id.', \'videos\')" data-target="#cnfrm_delete" title="delete"><i class="fa fa-trash-o" ></i></a>';
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
    public function add_edit($videos_id='') {   
        $data = $this->input->post();
        $videos_title = $this->input->post('videos_title');
        $videos_description = $this->input->post('videos_description');
        $videos_link = $this->input->post('videos_link');
        if($this->input->post('videos_id')) {
            $videos_id = $this->input->post('videos_id');
        }
        if(isset($this->session->userdata ('user_details')[0]->users_id)) {
            $redirect = 'videos';
        } else {
          redirect(base_url().'user/login', 'refresh');
      }
      
      if($videos_id != '') {
        $videos_id = $this->input->post('videos_id');        
        $data['videos_title'] = $this->input->post('videos_title');
        $data['videos_description'] = $this->input->post('videos_description');
        $data['videos_link'] = $this->input->post('videos_link');

        if(isset($data['edit'])){
            unset($data['edit']);
        }
        $this->Videos_model->updateRow('videos', 'videos_id', $videos_id, $data);
        $this->session->set_flashdata('messagePr', 'تم تعديل البيانات بنجاح');
        redirect( base_url().'videos', 'refresh');
    } else { 
        if($this->input->post('user_type') != 'admin') {
            $data = $this->input->post();
                //$data['token'] = $this->generate_token();
                //$data['videos_id'] = $this->id;
            $data['videos_title'] = $videos_title;
            $data['videos_description'] = $videos_description;
            $data['videos_link'] = $videos_link;
            unset($data['submit']);
            $this->Videos_model->insertRow('videos', $data);
            redirect( base_url().'videos', 'refresh');
        } else {
            $this->session->set_flashdata('messagePr', 'انت لا تملك عضوية' );
            redirect( base_url().'user/login', 'refresh');
        }
    }
    
}

public function get_modal() {
    is_login();
    if($this->input->post('view')){
        $data['userData'] = getDataByid('videos',$this->input->post('id'),'videos_id'); 
        $data['view']="1";
        echo $this->load->view('add_form', $data, true);
    }else{
        if($this->input->post('id')){
 //$this->input->post('more_id');
            $data['userData'] = getDataByid('videos',$this->input->post('id'),'videos_id'); 
            echo $this->load->view('add_form', $data, true);
        } else {
            echo $this->load->view('add_form', '', true);
        }
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
