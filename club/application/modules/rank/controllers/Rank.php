<?php
defined('BASEPATH') OR exit('No direct script access allowed ');
class Rank extends CI_Controller {

  function __construct() {
    parent::__construct(); 
    $this->load->model('Rank_model');
    $this->user_id = isset($this->session->get_userdata()['user_details'][0]->id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
  }

    /**
     * This function is used for show users list
     * @return Void
     */
    public function index(){
      is_login();
      if(CheckPermission("rank", "own_read")){
        $this->load->view('include/header');
        $this->load->view('rank_table');                
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
        $this->Rank_model->delete($id); 
      }
      redirect(base_url().'rank/', 'refresh');
    }


    /**
     * This function is used to create datatable in users list page
     * @return Void
     */
    public function dataTable (){
      is_login();
      $table = 'rank';
      $primaryKey = 'rank_id';
      $columns = array(
       array( 'db' => 'rank_id', 'dt' => 0 ),array( 'db' => 'rank_team', 'dt' => 1 ),array( 'db' => 'rank_champ', 'dt' => 2 ),array( 'db' => 'rank_rank', 'dt' => 3 ),array( 'db' => 'rank_id', 'dt' => 4 )
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
       
       $team=getDataByid('team',$output_arr['data'][$key][1],'team_id'); 
       $output_arr['data'][$key][1] = $team->team_title;
       
       $champ=getDataByid('champ',$output_arr['data'][$key][2],'champ_id'); 
       $output_arr['data'][$key][2] = $champ->champ_title;

       if(CheckPermission($table, "all_update")){
         $output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a id="btnEditRow" class="modalButtonrank mClass"  href="javascript:;" type="button" data-src="'.$id.'" title="Edit"><i class="fa fa-pencil" data-id=""></i></a>';
       }else if(CheckPermission($table, "own_update") && (CheckPermission($table, "all_update")!=true)){
        $user_id =getRowByTableColomId($table,$id,'users_id','user_id');
        if($user_id==$this->user_id){
         $output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a id="btnEditRow" class="modalButtonrank mClass"  href="javascript:;" type="button" data-src="'.$id.'" title="Edit"><i class="fa fa-pencil" data-id=""></i></a>';
       }
     }
     
     if(CheckPermission($table, "all_delete")){
       $output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a style="cursor:pointer;" data-toggle="modal" class="mClass" onclick="setId('.$id.', \'rank\')" data-target="#cnfrm_delete" title="delete"><i class="fa fa-trash-o" ></i></a>';}
       else if(CheckPermission($table, "own_delete") && (CheckPermission($table, "all_delete")!=true)){
        $user_id =getRowByTableColomId($table,$id,'users_id','user_id');
        if($user_id==$this->user_id){
         $output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a style="cursor:pointer;" data-toggle="modal" class="mClass" onclick="setId('.$id.', \'rank\')" data-target="#cnfrm_delete" title="delete"><i class="fa fa-trash-o" ></i></a>';
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

      $rank_rank = $this->input->post('rank_rank');
      $rank_team = $this->input->post('rank_team');
      $rank_champ = $this->input->post('rank_champ');
      if($this->input->post('rank_id')) {
        $id = $this->input->post('rank_id');
      }
      if(isset($this->session->userdata ('user_details')[0]->users_id)) {
        $redirect = 'rank';
      } else {
        redirect(base_url().'user/login', 'refresh');
      }
      
      if($id != '') {
        $rank_id = $this->input->post('rank_id');        
        $dataedit['rank_rank'] = $this->input->post('rank_rank');
        $dataedit['rank_team'] = $this->input->post('rank_team');
        $dataedit['rank_champ'] = $this->input->post('rank_champ');

        if(isset($data['edit'])){
          unset($data['edit']);
        }
        $this->Rank_model->updateRow('rank', 'rank_id', $rank_id, $dataedit);
        $this->session->set_flashdata('messagePr', 'تم تعديل البيانات بنجاح');
        redirect( base_url().'rank', 'refresh');
      } else { 
       if (isset($this->session->userdata ('user_details')[0]->users_id)){
        $data = $this->input->post();
                //$data['token'] = $this->generate_token();
                 //$data['rank_id'] = $this->id;
        $data['rank_rank'] = $rank_rank;
        $data['rank_team'] = $rank_team;
        $data['rank_champ'] = $rank_champ;
        
        
        unset($data['submit']);
        $this->Rank_model->insertRow('rank', $data);
        $this->session->set_flashdata('messagePr', 'done!!!!!');

        redirect( base_url().'rank', 'refresh');
      } else {
        $this->session->set_flashdata('messagePr', 'can not edit you not admin' );
        redirect( base_url().'user/login', 'refresh');
      }
    }
    
  }

  public function get_modal() {
    is_login();
    if($this->input->post('id')){
      $data['userData'] = getDataByid('rank',$this->input->post('id'),'rank_id'); 
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
