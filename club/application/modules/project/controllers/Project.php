<?php
defined('BASEPATH') OR exit('No direct script access allowed ');
class Project extends CI_Controller {

    function __construct() {
        parent::__construct(); 
        $this->load->model('Project_model');
        $this->user_id = isset($this->session->get_userdata()['user_details'][0]->id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
    }

    /**
     * This function is used for show users list
     * @return Void
     */
    public function index(){
        is_login();
        if(CheckPermission("project", "own_read")){
            $this->load->view('include/header');
            $this->load->view('project_table');                
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
            $this->Project_model->delete($id); 
        }
        redirect(base_url().'project/', 'refresh');
    }


    /**
     * This function is used to create datatable in users list page
     * @return Void
     */
    public function dataTable (){
        is_login();
        $table = 'project';
        $primaryKey = 'project_id';
        $columns = array(
         array( 'db' => 'project_id', 'dt' => 0 ),array( 'db' => 'project_title', 'dt' => 1 ),array( 'db' => 'project_description', 'dt' => 2 ),array( 'db' => 'project_image', 'dt' => 3 ),array( 'db' => 'project_section', 'dt' => 4 ),array( 'db' => 'project_id', 'dt' => 5 )
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
         
         $section=getDataByid('project_section',$output_arr['data'][$key][4],'section_id'); 
         $output_arr['data'][$key][4] = $section->section_title;

         if(CheckPermission($table, "all_update")){
             $output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a id="btnEditRow" class="modalButtonproject mClass"  href="javascript:;" type="button" data-src="'.$id.'" title="Edit"><i class="fa fa-pencil" data-id=""></i></a>';
         }else if(CheckPermission($table, "own_update") && (CheckPermission($table, "all_update")!=true)){
            $user_id =getRowByTableColomId($table,$id,'users_id','user_id');
            if($user_id==$this->user_id){
             $output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a id="btnEditRow" class="modalButtonproject mClass"  href="javascript:;" type="button" data-src="'.$id.'" title="Edit"><i class="fa fa-pencil" data-id=""></i></a>';
         }
     }
     
     if(CheckPermission($table, "all_delete")){
         $output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a style="cursor:pointer;" data-toggle="modal" class="mClass" onclick="setId('.$id.', \'project\')" data-target="#cnfrm_delete" title="delete"><i class="fa fa-trash-o" ></i></a>';}
         else if(CheckPermission($table, "own_delete") && (CheckPermission($table, "all_delete")!=true)){
            $user_id =getRowByTableColomId($table,$id,'users_id','user_id');
            if($user_id==$this->user_id){
             $output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a style="cursor:pointer;" data-toggle="modal" class="mClass" onclick="setId('.$id.', \'project\')" data-target="#cnfrm_delete" title="delete"><i class="fa fa-trash-o" ></i></a>';
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
        $project_image = 'user.png';
        $project_title = $this->input->post('project_title');
        $project_description = $this->input->post('project_description');
        $project_section = $this->input->post('project_section');
        if($this->input->post('project_id')) {
            $id = $this->input->post('project_id');
        }
        if(isset($this->session->userdata ('user_details')[0]->users_id)) {
            $redirect = 'project';
        } else {
          redirect(base_url().'user/login', 'refresh');
      }
      if($this->input->post('fileOld')) {  
        $newname = $this->input->post('fileOld');
        $project_image =$newname;
    } else {
        
        $project_image ='user.png';
    }
    foreach($_FILES as $name => $fileInfo)
    { 
       if(!empty($_FILES[$name]['name'])){
        $newname=$this->upload(); 
        
        $project_image =$newname;
    } else {  
        if($this->input->post('fileOld')) {  
            $newname = $this->input->post('fileOld');
            
            $project_image =$newname;
        } else {
            
            $project_image ='user.png';
        } 
    } 
}
if($id != '') {
    $project_id = $this->input->post('project_id');        
    $dataedit['project_image']=$project_image;
    $dataedit['project_title'] = $this->input->post('project_title');
    $dataedit['project_description'] = $this->input->post('project_description');
    $dataedit['project_section'] = $this->input->post('project_section');

    if(isset($data['edit'])){
        unset($data['edit']);
    }
    $this->Project_model->updateRow('project', 'project_id', $project_id, $dataedit);
    $this->session->set_flashdata('messagePr', 'تم تعديل البيانات بنجاح');
    redirect( base_url().'project', 'refresh');
} else { 
 if (isset($this->session->userdata ('user_details')[0]->users_id)){
    $data = $this->input->post();
                //$data['token'] = $this->generate_token();
                 //$data['project_id'] = $this->id;
    $data['project_title'] = $project_title;
    $data['project_description'] = $project_description;
    $data['project_section'] = $project_section;
    $data['project_image'] = $project_image;
    
    
    
    unset($data['submit']);
    $this->Project_model->insertRow('project', $data);
    $this->session->set_flashdata('messagePr', 'done!!!!!');

    redirect( base_url().'project', 'refresh');
} else {
    $this->session->set_flashdata('messagePr', 'can not edit you not admin' );
    redirect( base_url().'user/login', 'refresh');
}
}

}

public function get_modal() {
    is_login();
    if($this->input->post('id')){
        $data['userData'] = getDataByid('project',$this->input->post('id'),'project_id'); 
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
