<?php
defined('BASEPATH') OR exit('No direct script access allowed ');
class Achive extends CI_Controller {

    function __construct() {
        parent::__construct(); 
        $this->load->model('Achive_model');
        $this->user_id = isset($this->session->get_userdata()['user_details'][0]->id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
    }

    /**
     * This function is used for show users list
     * @return Void
     */
    public function index(){
        is_login();
        if(CheckPermission("achive", "own_read")){
            $this->load->view('include/header');
            $this->load->view('achive_table');                
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
            $this->Achive_model->delete($id); 
        }
        redirect(base_url().'achive/', 'refresh');
    }
    /**
     * This function is used to create datatable in users list page
     * @return Void
     */
    public function dataTable (){
        is_login();
        $table = 'achive';
        $primaryKey = 'achive_id';
        $columns = array(
         array( 'db' => 'achive_id', 'dt' => 0 ),array( 'db' => 'achive_title', 'dt' => 1 ),array( 'db' =>'achive_description', 'dt' => 2 ),array( 'db' => 'achive_images', 'dt' => 3 ),array( 'db' => 'achive_id', 'dt' => 4 )
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
             $output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a id="btnEditRow" class="modalButtonachive mClass"  href="javascript:;" type="button" data-src="'.$id.'" title="Edit"><i class="fa fa-pencil" data-id=""></i></a>';
         }else if(CheckPermission($table, "own_update") && (CheckPermission($table, "all_update")!=true)){
            $user_id =getRowByTableColomId($table,$id,'users_id','user_id');
            if($user_id==$this->user_id){
             $output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a id="btnEditRow" class="modalButtonachive mClass"  href="javascript:;" type="button" data-src="'.$id.'" title="Edit"><i class="fa fa-pencil" data-id=""></i></a>';
         }
     }

     if(CheckPermission($table, "all_delete")){
         $output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a style="cursor:pointer;" data-toggle="modal" class="mClass" onclick="setId('.$id.', \'achive\')" data-target="#cnfrm_delete" title="delete"><i class="fa fa-trash-o" ></i></a>';}
         else if(CheckPermission($table, "own_delete") && (CheckPermission($table, "all_delete")!=true)){
            $user_id =getRowByTableColomId($table,$id,'users_id','user_id');
            if($user_id==$this->user_id){
             $output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a style="cursor:pointer;" data-toggle="modal" class="mClass" onclick="setId('.$id.', \'achive\')" data-target="#cnfrm_delete" title="delete"><i class="fa fa-trash-o" ></i></a>';
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
        $achive_images = 'user.png';
        $achive_title = $this->input->post('achive_title');
        $achive_description = $this->input->post('achive_description');
//$achive_date=$this->input->post('achive_date');
        if($this->input->post('achive_id')) {
            $id = $this->input->post('achive_id');
        }
        if(isset($this->session->userdata ('user_details')[0]->users_id)) {
            $redirect = 'achive';
        } else {
          redirect(base_url().'user/login', 'refresh');
      }
      if($this->input->post('fileOld')) {  
        $newname = $this->input->post('fileOld');
        $achive_images =$newname;
    } else {

        $achive_images ='user.png';
    }
    foreach($_FILES as $name => $fileInfo)
    { 
       if(!empty($_FILES[$name]['name'])){
        $newname=$this->upload(); 

        $achive_images =$newname;
    } else {  
        if($this->input->post('fileOld')) {  
            $newname = $this->input->post('fileOld');

            $achive_images =$newname;
        } else {

            $achive_images ='user.png';
        } 
    } 
}
if($id != '') {
    $achive_id = $this->input->post('achive_id');        
    $dataedit['achive_images']=$achive_images;
    $dataedit['achive_title'] = $this->input->post('achive_title');
    $dataedit['achive_description'] = $this->input->post('achive_description');
//$dataedit['achive_date'] = $this->input->post('achive_date');

    if(isset($data['edit'])){
        unset($data['edit']);
    }
    $this->Achive_model->updateRow('achive', 'achive_id', $achive_id, $dataedit);
    $this->session->set_flashdata('messagePr', 'تم تعديل البيانات بنجاح');
    redirect( base_url().'achive', 'refresh');
} else { 
    if($this->input->post('user_type') != 'admin') {
        $data = $this->input->post();
                //$data['token'] = $this->generate_token();
                //$data['achive_id'] = $this->id;
        $data['achive_title'] = $achive_title;
        $data['achive_description'] = $achive_description;
        $data['achive_images'] = $achive_images;
                //$data['achive_date'] = $achive_date;

        unset($data['submit']);
        $this->Achive_model->insertRow('achive', $data);
        redirect( base_url().'achive', 'refresh');
    } else {
        $this->session->set_flashdata('messagePr', 'انت لا تملك عضوية' );
        redirect( base_url().'user/login', 'refresh');
    }
}

}

public function get_modal() {
    is_login();
    if($this->input->post('id')){
        $data['userData'] = getDataByid('achive',$this->input->post('id'),'achive_id'); 
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
