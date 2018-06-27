<?php
defined('BASEPATH') OR exit('No direct script access allowed ');
class News extends CI_Controller {

    function __construct() {
        parent::__construct(); 
        $this->load->model('News_model');
        $this->user_id = isset($this->session->get_userdata()['user_details'][0]->id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
    }

    /**
     * This function is used for show users list
     * @return Void
     */
    public function index(){
        is_login();
        if(CheckPermission("news", "own_read")){
            $this->load->view('include/header');
            $this->load->view('news_table');                
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
            $this->News_model->delete($id); 
        }
        redirect(base_url().'news/', 'refresh');
    }


    /**
     * This function is used to create datatable in users list page
     * @return Void
     */
    public function dataTable (){
        is_login();
        $table = 'news';
        $primaryKey = 'news_id';
        $columns = array(
         array( 'db' => 'news_id', 'dt' => 0 ),array( 'db' => 'news_title', 'dt' => 1 ),array( 'db' => 'news_description', 'dt' => 2 ),array( 'db' => 'news_image', 'dt' => 3 ),array( 'db' => 'news_section', 'dt' => 4 ),array( 'db' => 'news_date', 'dt' => 5 ),array( 'db' => 'news_id', 'dt' => 6 )
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
         
         $section=getDataByid('news_section',$output_arr['data'][$key][4],'section_id'); 
         $output_arr['data'][$key][4] = $section->section_title;

         if(CheckPermission($table, "all_update")){
             $output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a id="btnEditRow" class="modalButtonnews mClass"  href="javascript:;" type="button" data-src="'.$id.'" title="Edit"><i class="fa fa-pencil" data-id=""></i></a>';
         }else if(CheckPermission($table, "own_update") && (CheckPermission($table, "all_update")!=true)){
            $user_id =getRowByTableColomId($table,$id,'users_id','user_id');
            if($user_id==$this->user_id){
             $output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a id="btnEditRow" class="modalButtonnews mClass"  href="javascript:;" type="button" data-src="'.$id.'" title="Edit"><i class="fa fa-pencil" data-id=""></i></a>';
         }
     }
     
     if(CheckPermission($table, "all_delete")){
         $output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a style="cursor:pointer;" data-toggle="modal" class="mClass" onclick="setId('.$id.', \'news\')" data-target="#cnfrm_delete" title="delete"><i class="fa fa-trash-o" ></i></a>';}
         else if(CheckPermission($table, "own_delete") && (CheckPermission($table, "all_delete")!=true)){
            $user_id =getRowByTableColomId($table,$id,'users_id','user_id');
            if($user_id==$this->user_id){
             $output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a style="cursor:pointer;" data-toggle="modal" class="mClass" onclick="setId('.$id.', \'news\')" data-target="#cnfrm_delete" title="delete"><i class="fa fa-trash-o" ></i></a>';
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
        $news_image = 'user.png';
        $news_title = $this->input->post('news_title');
        $news_description = $this->input->post('news_description');
        $news_section = $this->input->post('news_section');
        if($this->input->post('news_id')) {
            $id = $this->input->post('news_id');
        }
        if(isset($this->session->userdata ('user_details')[0]->users_id)) {
            $redirect = 'news';
        } else {
          redirect(base_url().'user/login', 'refresh');
      }
      if($this->input->post('fileOld')) {  
        $newname = $this->input->post('fileOld');
        $news_image =$newname;
    } else {
        
        $news_image ='user.png';
    }
    foreach($_FILES as $name => $fileInfo)
    { 
       if(!empty($_FILES[$name]['name'])){
        $newname=$this->upload(); 
        
        $news_image =$newname;
    } else {  
        if($this->input->post('fileOld')) {  
            $newname = $this->input->post('fileOld');
            
            $news_image =$newname;
        } else {
            
            $news_image ='user.png';
        } 
    } 
}
if($id != '') {
    $news_id = $this->input->post('news_id');        
    $dataedit['news_image']=$news_image;
    $dataedit['news_title'] = $this->input->post('news_title');
    $dataedit['news_description'] = $this->input->post('news_description');
    $dataedit['news_section'] = $this->input->post('news_section');

    if(isset($data['edit'])){
        unset($data['edit']);
    }
    $this->News_model->updateRow('news', 'news_id', $news_id, $dataedit);
    $this->session->set_flashdata('messagePr', 'تم تعديل البيانات بنجاح');
    redirect( base_url().'news', 'refresh');
} else { 
 if (isset($this->session->userdata ('user_details')[0]->users_id)){
    $data = $this->input->post();
                //$data['token'] = $this->generate_token();
                 //$data['news_id'] = $this->id;
    $data['news_title'] = $news_title;
    $data['news_description'] = $news_description;
    $data['news_section'] = $news_section;
    $data['news_image'] = $news_image;
    
    $data['news_date']= date("Y-m-d H:i:s"); 
    
    $data['user_id'] = $this->session->userdata ('user_details')[0]->users_id;
    
    unset($data['submit']);
    $this->News_model->insertRow('news', $data);
    $this->session->set_flashdata('messagePr', 'done!!!!!');

    redirect( base_url().'news', 'refresh');
} else {
    $this->session->set_flashdata('messagePr', 'can not edit you not admin' );
    redirect( base_url().'user/login', 'refresh');
}
}

}

public function get_modal() {
    is_login();
    if($this->input->post('id')){
        $data['userData'] = getDataByid('news',$this->input->post('id'),'news_id'); 
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
