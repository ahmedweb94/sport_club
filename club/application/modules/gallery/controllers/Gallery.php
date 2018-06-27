<?php
defined('BASEPATH') OR exit('No direct script access allowed ');
class Gallery extends CI_Controller {

  function __construct() {
    parent::__construct(); 
    $this->load->model('Gallery_model');
    $this->user_id = isset($this->session->get_userdata()['user_details'][0]->id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
  }

    /**
     * This function is used for show users list
     * @return Void
     */
    public function index(){
      is_login();
      if(CheckPermission("gallery", "own_read")){
        $this->load->view('include/header');
        $this->load->view('gallery_table');                
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
        $this->Gallery_model->delete($id); 
      }
      redirect(base_url().'gallery/', 'refresh');
    }


    /**
     * This function is used to create datatable in users list page
     * @return Void
     */
    public function dataTable (){
      is_login();
      $table = 'gallery';
      $primaryKey = 'gallery_id';
      $columns = array(
       array( 'db' => 'gallery_id', 'dt' => 0 ),array( 'db' => 'gallery_title', 'dt' => 1 )
       ,array( 'db' => 'gallery_description', 'dt' => 2 ),array( 'db' => 'gallery_images', 'dt' => 3 ),array( 'db' => 'gallery_id', 'dt' => 4 )
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
       $album_image=unserialize($output_arr['data'][$key][count($output_arr['data'][$key])  - 2] );
       $output_arr['data'][$key][count($output_arr['data'][$key])  - 2]="<img src=".base_url()."/assets/images/".$album_image[0]." style='width:30px; height:30px;'>";
       $output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a id="btnEditRow" class="modalButtongallery mClass"  href="javascript:;" type="button" data-src="'.$id.'"  data-view="1"  title="Show"><i class="fa fa-eye" data-id=""></i></a>';

       if(CheckPermission($table, "all_update")){
         $output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a id="btnEditRow" class="modalButtongallery mClass"  href="javascript:;" type="button" data-src="'.$id.'" title="Edit"><i class="fa fa-pencil" data-id=""></i></a>';
       }else if(CheckPermission($table, "own_update") && (CheckPermission($table, "all_update")!=true)){
        $user_id =getRowByTableColomId($table,$id,'users_id','user_id');
        if($user_id==$this->user_id){
         $output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a id="btnEditRow" class="modalButtongallery mClass"  href="javascript:;" type="button" data-src="'.$id.'" title="Edit"><i class="fa fa-pencil" data-id=""></i></a>';
       }
     }
     
     if(CheckPermission($table, "all_delete")){
       $output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a style="cursor:pointer;" data-toggle="modal" class="mClass" onclick="setId('.$id.', \'gallery\')" data-target="#cnfrm_delete" title="delete"><i class="fa fa-trash-o" ></i></a>';}
       else if(CheckPermission($table, "own_delete") && (CheckPermission($table, "all_delete")!=true)){
        $user_id =getRowByTableColomId($table,$id,'users_id','user_id');
        if($user_id==$this->user_id){
         $output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a style="cursor:pointer;" data-toggle="modal" class="mClass" onclick="setId('.$id.', \'gallery\')" data-target="#cnfrm_delete" title="delete"><i class="fa fa-trash-o" ></i></a>';
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
    public function add_edit($gallery_id='') {   
      $data = $this->input->post();
      $gallery_title = $this->input->post('gallery_title');
      $gallery_description = $this->input->post('gallery_description');
      if($this->input->post('gallery_id')) {
        $gallery_id = $this->input->post('gallery_id');
      }
      if(isset($this->session->userdata ('user_details')[0]->users_id)) {
        $redirect = 'gallery';
      } else {
        redirect(base_url().'user/login', 'refresh');
      }
      
      if($gallery_id != '') {
        $gallery_id = $this->input->post('gallery_id');        
        $data['gallery_title'] = $this->input->post('gallery_title');
        $data['gallery_description'] = $this->input->post('gallery_description');
        $files = $_FILES;
        $count = count($_FILES['gallery_images']['name']);
        for($i=0; $i<$count; $i++)
        {
          $_FILES['gallery_images']['name']= $files['gallery_images']['name'][$i];
          $_FILES['gallery_images']['type']= $files['gallery_images']['type'][$i];
          $_FILES['gallery_images']['tmp_name']= $files['gallery_images']['tmp_name'][$i];
          $_FILES['gallery_images']['error']= $files['gallery_images']['error'][$i];
          $_FILES['gallery_images']['size']= $files['gallery_images']['size'][$i];
               $this->set_upload_options();//function defination below
               $upload_data[] = $this->upload();
                //$name_array[] = $upload_data;
             }
             $data['gallery_images'] = serialize($upload_data);
             if(isset($data['edit'])){
              unset($data['edit']);
            }
            $this->Gallery_model->updateRow('gallery', 'gallery_id', $gallery_id, $data);
            $this->session->set_flashdata('messagePr', 'تم تعديل البيانات بنجاح');
            redirect( base_url().'gallery', 'refresh');
          } else { 
            if($this->input->post('user_type') != 'admin') {
              $data = $this->input->post();
                //$data['token'] = $this->generate_token();
              $data['gallery_id'] = $this->id;
              $data['gallery_title'] = $gallery_title;
              $data['gallery_description'] = $gallery_description;
              $files = $_FILES;
              $count = count($_FILES['gallery_images']['name']);
              for($i=0; $i<$count; $i++)
              {
                $_FILES['gallery_images']['name']= $files['gallery_images']['name'][$i];
                $_FILES['gallery_images']['type']= $files['gallery_images']['type'][$i];
                $_FILES['gallery_images']['tmp_name']= $files['gallery_images']['tmp_name'][$i];
                $_FILES['gallery_images']['error']= $files['gallery_images']['error'][$i];
                $_FILES['gallery_images']['size']= $files['gallery_images']['size'][$i];
               $this->set_upload_options();//function defination below
               $upload_data[] = $this->upload();
                //$name_array[] = $upload_data;
             }
             $data['gallery_images'] = serialize($upload_data);
             unset($data['submit']);
             $this->Gallery_model->insertRow('gallery', $data);
             redirect( base_url().'gallery', 'refresh');
           } else {
            $this->session->set_flashdata('messagePr', 'انت لا تملك عضوية' );
            redirect( base_url().'user/login', 'refresh');
          }
        }
        
      }

      public function get_modal() {
        is_login();

        if($this->input->post('view')){
          $data['userData'] = getDataByid('gallery',$this->input->post('id'),'gallery_id');
          $data['view']="1"; 
          echo $this->load->view('add_form', $data, true);
        }else{
          if($this->input->post('id')){
 //$this->input->post('more_id');
            $data['userData'] = getDataByid('gallery',$this->input->post('id'),'gallery_id'); 
            echo $this->load->view('add_form', $data, true);
          } else {
            echo $this->load->view('add_form', '', true);
          }}
          exit;
        }












        function set_upload_options()
        { 
  // upload an image options
         $config = array();
         $config['upload_path'] = 'assets/images/'; //give the path to upload the image in folder
         $config['remove_spaces']=TRUE;
         $config['encrypt_name'] = TRUE; // for encrypting the name
         $config['allowed_types'] = 'gif|jpg|png';
         $config['max_size'] = '78000';
         $config['overwrite'] = FALSE;
         $config['file_name'] = $newname;
         $this->load->library('upload', $config);
         move_uploaded_file($tmpname,"assets/images/".$newname);
         return $newname;
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
