<?php
defined('BASEPATH') OR exit('No direct script access allowed ');
class Matches extends CI_Controller {

    function __construct() {
        parent::__construct(); 
        $this->load->model('Matches_model');
        $this->user_id = isset($this->session->get_userdata()['user_details'][0]->id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
    }

    /**
     * This function is used for show users list
     * @return Void
     */
    public function index(){
        is_login();
        if(CheckPermission("matches", "own_read")){
            $this->load->view('include/header');
            $this->load->view('matches_table');                
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
            $this->Matches_model->delete($id); 
        }
        redirect(base_url().'matches/', 'refresh');
    }


    /**
     * This function is used to create datatable in users list page
     * @return Void
     */
    public function dataTable (){
        is_login();
        $table = 'matches';
        $primaryKey = 'matches_id';
        $columns = array(
         array( 'db' => 'matches_id', 'dt' => 0 ),array( 'db' => 'matches_team', 'dt' => 1 ),array( 'db' => 'matches_aganist', 'dt' => 2 ),array( 'db' => 'matches_champ', 'dt' => 3 ),array( 'db' => 'matches_place', 'dt' => 4 ),array( 'db' => 'matches_date', 'dt' => 5 ),array( 'db' => 'matches_team_result', 'dt' => 6 ),array( 'db' => 'matches_aganist_result', 'dt' => 7 ),array( 'db' => 'matches_id', 'dt' => 8 )
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
         
         $champ=getDataByid('champ',$output_arr['data'][$key][3],'champ_id'); 
         $output_arr['data'][$key][3] = $champ->champ_title;

         if(CheckPermission($table, "all_update")){
             $output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a id="btnEditRow" class="modalButtonmatches mClass"  href="javascript:;" type="button" data-src="'.$id.'" title="Edit"><i class="fa fa-pencil" data-id=""></i></a>';
         }else if(CheckPermission($table, "own_update") && (CheckPermission($table, "all_update")!=true)){
            $user_id =getRowByTableColomId($table,$id,'users_id','user_id');
            if($user_id==$this->user_id){
             $output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a id="btnEditRow" class="modalButtonmatches mClass"  href="javascript:;" type="button" data-src="'.$id.'" title="Edit"><i class="fa fa-pencil" data-id=""></i></a>';
         }
     }
     
     if(CheckPermission($table, "all_delete")){
         $output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a style="cursor:pointer;" data-toggle="modal" class="mClass" onclick="setId('.$id.', \'matches\')" data-target="#cnfrm_delete" title="delete"><i class="fa fa-trash-o" ></i></a>';}
         else if(CheckPermission($table, "own_delete") && (CheckPermission($table, "all_delete")!=true)){
            $user_id =getRowByTableColomId($table,$id,'users_id','user_id');
            if($user_id==$this->user_id){
             $output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a style="cursor:pointer;" data-toggle="modal" class="mClass" onclick="setId('.$id.', \'matches\')" data-target="#cnfrm_delete" title="delete"><i class="fa fa-trash-o" ></i></a>';
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
        $matches_aganist_image = 'user.png';
        $matches_team = $this->input->post('matches_team');
        $matches_aganist = $this->input->post('matches_aganist');
        $matches_champ = $this->input->post('matches_champ');
        $matches_place = $this->input->post('matches_place');
        $matches_date = $this->input->post('matches_date');
        $matches_team_result = $this->input->post('matches_team_result');
        $matches_aganist_result = $this->input->post('matches_aganist_result');
        $matches_time = $this->input->post('matches_time');

        
        if($this->input->post('matches_id')) {
            $id = $this->input->post('matches_id');
        }
        if(isset($this->session->userdata ('user_details')[0]->users_id)) {
            $redirect = 'matches';
        } else {
          redirect(base_url().'user/login', 'refresh');
      }
      if($this->input->post('fileOld')) {  
        $newname = $this->input->post('fileOld');
        $matches_aganist_image =$newname;
    } else {
        
        $matches_aganist_image ='user.png';
    }
    foreach($_FILES as $name => $fileInfo)
    { 
       if(!empty($_FILES[$name]['name'])){
        $newname=$this->upload(); 
        
        $matches_aganist_image =$newname;
    } else {  
        if($this->input->post('fileOld')) {  
            $newname = $this->input->post('fileOld');
            
            $matches_aganist_image =$newname;
        } else {
            
            $matches_aganist_image ='user.png';
        } 
    } 
}
if($id != '') {
    $matches_id = $this->input->post('matches_id');        
    $dataedit['matches_aganist_image']=$matches_aganist_image;
    $dataedit['matches_team'] = $this->input->post('matches_team');
    $dataedit['matches_aganist'] = $this->input->post('matches_aganist');
    $dataedit['matches_champ'] = $this->input->post('matches_champ');
    $dataedit['matches_place'] = $this->input->post('matches_place');
    $dataedit['matches_date'] = $this->input->post('matches_date');
    $dataedit['matches_team_result'] = $this->input->post('matches_team_result');
    $dataedit['matches_aganist_result'] = $this->input->post('matches_aganist_result');
    $dataedit['matches_time'] = $this->input->post('matches_time');

    if(isset($data['edit'])){
        unset($data['edit']);
    }
    $this->Matches_model->updateRow('matches', 'matches_id', $matches_id, $dataedit);
    $this->session->set_flashdata('messagePr', 'تم تعديل البيانات بنجاح');
    redirect( base_url().'matches', 'refresh');
} else { 
 if($this->input->post('user_type') != 'admin') {
    $data = $this->input->post();
                //$data['token'] = $this->generate_token();
                 //$data['matches_id'] = $this->id;
    $data['matches_team'] = $matches_team;
    $data['matches_aganist'] = $matches_aganist;
    $data['matches_champ'] = $matches_champ;
    $data['matches_aganist_image'] = $matches_aganist_image;
    $data['matches_place'] = $matches_place;
	           // $data['matches_team_result'] = $matches_team_result;
	            //$data['matches_aganist_result'] = $matches_aganist_result;
    $data['matches_date']=$matches_date;
    $data['matches_time']=$matches_time;
    
    unset($data['submit']);
    $this->Matches_model->insertRow('matches', $data);
    $this->session->set_flashdata('messagePr', 'done!!!!!');

    redirect( base_url().'matches', 'refresh');
} else {
    $this->session->set_flashdata('messagePr', 'can not edit you not admin' );
    redirect( base_url().'user/login', 'refresh');
}
}

}

public function get_modal() {
    is_login();
    if($this->input->post('id')){
        $data['userData'] = getDataByid('matches',$this->input->post('id'),'matches_id'); 
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
