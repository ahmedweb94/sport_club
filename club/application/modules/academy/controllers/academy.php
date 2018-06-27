<?php
defined('BASEPATH') OR exit('No direct script access allowed ');
class Academy extends CI_Controller {

    function __construct() {
        parent::__construct(); 
        $this->load->model('Academy_model');
        $this->user_id = isset($this->session->get_userdata()['user_details'][0]->id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
    }

    /**
     * This function is used for show users list
     * @return Void
     */
    public function index(){
        is_login();
        if(CheckPermission("academy", "own_read")){
            $this->load->view('include/header');
            $this->load->view('academy_table');                
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
            $this->Academy_model->delete($id); 
        }
        redirect(base_url().'academy/', 'refresh');
    }


    /**
     * This function is used to create datatable in users list page
     * @return Void
     */
    public function dataTable (){
        is_login();
        $table = 'academy';
        $primaryKey = 'academy_id';
        $columns = array(
         array( 'db' => 'academy_id', 'dt' => 0 ),array( 'db' => 'academy_title', 'dt' => 1 ),array( 'db' =>'academy_pros', 'dt' => 2 ),array( 'db' => 'academy_images', 'dt' => 3 ),array( 'db' => 'academy_price_m', 'dt' => 4 ),array( 'db' => 'academy_price_y', 'dt' => 5 ),array( 'db' => 'academy_id', 'dt' => 6 )
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
             $output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a id="btnEditRow" class="modalButtonacademy mClass"  href="javascript:;" type="button" data-src="'.$id.'" title="Edit"><i class="fa fa-pencil" data-id=""></i></a>';
         }else if(CheckPermission($table, "own_update") && (CheckPermission($table, "all_update")!=true)){
            $user_id =getRowByTableColomId($table,$id,'users_id','user_id');
            if($user_id==$this->user_id){
             $output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a id="btnEditRow" class="modalButtonacademy mClass"  href="javascript:;" type="button" data-src="'.$id.'" title="Edit"><i class="fa fa-pencil" data-id=""></i></a>';
         }
     }
     
     if(CheckPermission($table, "all_delete")){
         $output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a style="cursor:pointer;" data-toggle="modal" class="mClass" onclick="setId('.$id.', \'academy\')" data-target="#cnfrm_delete" title="delete"><i class="fa fa-trash-o" ></i></a>';}
         else if(CheckPermission($table, "own_delete") && (CheckPermission($table, "all_delete")!=true)){
            $user_id =getRowByTableColomId($table,$id,'users_id','user_id');
            if($user_id==$this->user_id){
             $output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a style="cursor:pointer;" data-toggle="modal" class="mClass" onclick="setId('.$id.', \'academy\')" data-target="#cnfrm_delete" title="delete"><i class="fa fa-trash-o" ></i></a>';
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
        $academy_images = 'user.png';
        $academy_title = $this->input->post('academy_title');
        $academy_pros = $this->input->post('academy_pros');
        $academy_price_m=$this->input->post('academy_price_m');
        $academy_price_y=$this->input->post('academy_price_y');        
        if($this->input->post('academy_id')) {
            $id = $this->input->post('academy_id');
        }
        if(isset($this->session->userdata ('user_details')[0]->users_id)) {
            $redirect = 'academy';
        } else {
          redirect(base_url().'user/login', 'refresh');
      }
      if($this->input->post('fileOld')) {  
        $newname = $this->input->post('fileOld');
        $academy_images =$newname;
    } else {
        
        $academy_images ='user.png';
    }
    foreach($_FILES as $name => $fileInfo)
    { 
       if(!empty($_FILES[$name]['name'])){
        $newname=$this->upload(); 
        
        $academy_images =$newname;
    } else {  
        if($this->input->post('fileOld')) {  
            $newname = $this->input->post('fileOld');
            
            $academy_images =$newname;
        } else {
            
            $academy_images ='user.png';
        } 
    } 
}
if($id != '') {
    $academy_id = $this->input->post('academy_id');        
    $dataedit['academy_images']=$academy_images;
    $dataedit['academy_title'] = $this->input->post('academy_title');
    $dataedit['academy_pros'] = $this->input->post('academy_pros');
    $dataedit['academy_price_m'] = $this->input->post('academy_price_m');
    $dataedit['academy_price_y'] = $this->input->post('academy_price_y');

    if(isset($data['edit'])){
        unset($data['edit']);
    }
    $this->Academy_model->updateRow('academy', 'academy_id', $academy_id, $dataedit);
    $this->session->set_flashdata('messagePr', 'تم تعديل البيانات بنجاح');
    redirect( base_url().'academy', 'refresh');
} else { 
    if($this->input->post('user_type') != 'admin') {
        $data = $this->input->post();
                //$data['token'] = $this->generate_token();
                //$data['academy_id'] = $this->id;
        $data['academy_title'] = $academy_title;
        $data['academy_pros'] = $academy_pros;
        $data['academy_images'] = $academy_images;
        $data['academy_price_m'] = $academy_price_m;
        $data['academy_price_y'] = $academy_price_y;

        unset($data['submit']);
        $this->Academy_model->insertRow('academy', $data);
        redirect( base_url().'academy', 'refresh');
    } else {
        $this->session->set_flashdata('messagePr', 'انت لا تملك عضوية' );
        redirect( base_url().'user/login', 'refresh');
    }
}

}

public function get_modal() {
    is_login();
    if($this->input->post('id')){
        $data['userData'] = getDataByid('academy',$this->input->post('id'),'academy_id'); 
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
