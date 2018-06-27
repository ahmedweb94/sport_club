<?php
defined('BASEPATH') OR exit('No direct script access allowed ');
class Home extends CI_Controller {

	function __construct() {
		parent::__construct(); 
		$this->load->model('Home_model');
		$this->user_id = isset($this->session->get_userdata()['user_details'][0]->id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
	}

    /**
     * This function is used for show users list
     * @return Void
     */
    public function index(){
    	$data['result'] = $this->Home_model->get_data_by('setting');
    	$data['title_page'] = "الرئيسية";
    	$query['query']=$this->Home_model->get_data_by('main');
    	$info['news']= $this->Home_model->get_table_data('news',array(),7,'news_id','desc');
    	$info['videos']= $this->Home_model->get_table_row('videos',array(),'videos_link');        
    	$info['sport_news']= $this->Home_model->get_table_data('news',array('news_section'=>1),4,'news_id','desc');
    	$info['trip']= $this->Home_model->get_table_data('trip',array(),1,'trip_id','desc');
    	$info['matches']=$this->Home_model->get_table_data('matches',array(),2,'matches_date','desc');
    	$info['next']= $this->Home_model->get_table_row('activite',array('activite_date' > time()));
    	$info['achive']= $this->Home_model->get_table_data('achive',array(),1,'achive_id','desc');
    	$this->load->view('header2',$data);
    	$this->load->view('gallerymain',$info);
    	$this->load->view('footer',$query);                          
    	
    }

    public function add_sub(){
    	$data = $this->input->post();
    	$data['subscribe_email'] = $this->input->post('subscribe_email');
    	$this->Home_model->insertRow('subscribe', $data);;
    	$data['result'] = $this->Home_model->get_data_by('setting');
    	$data['title_page'] = "الرئيسية";
    	$data['sub_add'] = "yes"; 
    	$this->load->view('header',$data);
    	$this->load->view('gallerymain');
    	$this->load->view('footer');                        
    }

    public function add_mess(){
    	$data = $this->input->post();
    	$data['contactus_name'] = $this->input->post('contactus_name');
    	$data['contactus_email'] = $this->input->post('contactus_email');
    	$data['contactus_phone'] = $this->input->post('contactus_phone');
	       // $data['contactus_title'] = $this->input->post('contactus_title');
    	$data['contactus_dess'] = $this->input->post('contactus_dess');
    	
    	$this->Home_model->insertRow('contactus', $data);
    	$data['result'] = $this->Home_model->get_data_by('setting');
    	$data['title_page'] = "اتصل بنا";
    	$data['sub_add'] = "yes"; 
    	$this->load->view('header',$data);
    	$this->load->view('contactus');
    	$this->load->view('footer');                        
    }



    public function contactus(){
    	$data['result'] = $this->Home_model->get_data_by('setting');
    	$data['title_page'] = "اتصل بنا";
    	$query['query']=$this->Home_model->get_data_by('main');
    	$this->load->view('header',$data);
    	$this->load->view('contactus');  
    	$this->load->view('footer',$query);                                
    }

    public function gallery(){
    	$data['result'] = $this->Home_model->get_data_by('setting');
    	$data['title_page'] = "البومات الصور";
    	$info['images']= $this->Home_model->get_data_by('gallery');
    	$query['query']=$this->Home_model->get_data_by('main');
    	$gallery_id=$_GET['id'];
    	if( $gallery_id != '' ) {
    		$image['images']= $this->Home_model->get_table_row('gallery',array('gallery_id'=>$gallery_id));        
    		$this->load->view('header',$data);
    		$this->load->view('gallery_page',$image); 
    		$this->load->view('footer',$query);  
    	}else{
    		$this->load->view('header',$data);
    		$this->load->view('gallery',$info);  
    		$this->load->view('footer',$query);                             
    	}
    }
    public function news(){ 

    	$data['result'] = $this->Home_model->get_data_by('setting');
    	$data['title_page'] = "الاخبار";
    	$info['news']= $this->Home_model->get_data_by('news');
    	$query['query']=$this->Home_model->get_data_by('main');
    	$news_id=$_GET['id'];
    	if( $news_id != '' ) {
    		$new['news']= $this->Home_model->get_table_row('news',array('news_id'=>$news_id));        
    		$this->load->view('header',$data);
    		$this->load->view('news_page',$new); 
    		$this->load->view('footer',$query);  
    	}else{

    		$this->load->view('header',$data);
    		$this->load->view('news',$info);  
    		$this->load->view('footer',$query); 
    	}
    }
    public function news_sport(){ 

    	$data['result'] = $this->Home_model->get_data_by('setting');
    	$data['title_page'] = "االاخبار الرياضيه";
    	$info['news']= $this->Home_model->get_table_data('news',array('news_section'=>1),'','news_id','desc');
    	$query['query']=$this->Home_model->get_data_by('main');
    	$news_id=$_GET['id'];
    	if( $news_id != '' ) {
    		$new['news']= $this->Home_model->get_table_row('news',array('news_id'=>$news_id));        
    		$this->load->view('header',$data);
    		$this->load->view('news_page',$new); 
    		$this->load->view('footer',$query);  
    	}else{

    		$this->load->view('header',$data);
    		$this->load->view('news',$info);  
    		$this->load->view('footer',$query); 
    	}
    }

    public function videos(){
    	$data['result'] = $this->Home_model->get_data_by('setting');
    	$data['title_page'] = "مكتبة الفيديوهات";
    	$info['videos']= $this->Home_model->get_data_by('videos');
    	$query['query']=$this->Home_model->get_data_by('main');        
    	$this->load->view('header',$data);
    	$this->load->view('videos',$info);  
    	$this->load->view('footer_videos',$query);                          
    }
    
    public function trip(){ 

    	$data['result'] = $this->Home_model->get_data_by('setting');
    	$data['title_page'] = "الرحلات";
    	$query['query']=$this->Home_model->get_data_by('main');
    	$info['trip']= $this->Home_model->get_data_by('trip');
    	$trip_id=$_GET['id'];
    	if( $trip_id != '' ) {
    		$new['trip']= $this->Home_model->get_table_row('trip',array('trip_id'=>$trip_id));        
    		$this->load->view('header',$data);
    		$this->load->view('trip_page',$new); 
    		$this->load->view('footer',$query);  
    	}else{

    		$this->load->view('header',$data);
    		$this->load->view('trip',$info);  
    		$this->load->view('footer',$query); 
    	}
    }
    
    public function party(){ 

    	$data['result'] = $this->Home_model->get_data_by('setting');
    	$data['title_page'] = "الحفلات";
    	$query['query']=$this->Home_model->get_data_by('main');
    	$day= date('Y-m-d');
    	$info['next']= $this->Home_model->get_table_data('party',array('party_date >' =>  time()));
    	$info['pre']= $this->Home_model->get_table_data('party',array('party_date <' => time()));
    	
    	$party_id=$_GET['id'];
    	if( $party_id != '' ) {
    		$new['party']= $this->Home_model->get_table_row('party',array('party_id'=>$party_id));        
    		$this->load->view('header',$data);
    		$this->load->view('party_page',$new); 
    		$this->load->view('footer',$query);  
    	}else{

    		$this->load->view('header',$data);
    		$this->load->view('party',$info);  
    		$this->load->view('footer',$query); 
    	}
    }
    public function activite(){ 

    	$data['result'] = $this->Home_model->get_data_by('setting');
    	$data['title_page'] = "الانشطه الاجتماعيه";
    	$query['query']=$this->Home_model->get_data_by('main');
    	$day= date('Y-m-d');
    	$info['next']= $this->Home_model->get_table_data('activite',array('activite_date' > time()));
    	$info['pre']= $this->Home_model->get_table_data('party',array('activite_date' < time()));
    	
    	$activite_id=$_GET['id'];
    	if( $activite_id != '' ) {
    		$new['party']= $this->Home_model->get_table_row('activite',array('activite_id'=>$activite_id));        
    		$this->load->view('header',$data);
    		$this->load->view('activite_page',$new); 
    		$this->load->view('footer',$query);  
    	}else{

    		$this->load->view('header',$data);
    		$this->load->view('activite',$info);  
    		$this->load->view('footer',$query); 
    	}
    }
    public function achive(){ 

    	$data['result'] = $this->Home_model->get_data_by('setting');
    	$data['title_page'] = " الانجازات";
    	$query['query']=$this->Home_model->get_data_by('main');       
    	$info['achive']= $this->Home_model->get_data_by('achive');

    	
    	$achive_id=$_GET['id'];
    	if( $achive_id != '' ) {
    		$new['achive']= $this->Home_model->get_table_row('achive',array('achive_id'=>$achive_id));        
    		$this->load->view('header',$data);
    		$this->load->view('achive_page',$new); 
    		$this->load->view('footer',$query);  
    	}else{

    		$this->load->view('header',$data);
    		$this->load->view('achive',$info);  
    		$this->load->view('footer',$query); 
    	}
    }
    
    public function matches(){ 
    	$data['result'] = $this->Home_model->get_data_by('setting');
    	$data['title_page'] = " المباريات";
    	$query['query']=$this->Home_model->get_data_by('main');        
    	$info['matches']= $this->Home_model->get_table_data('matches',array(),'','matches_date','desc');
    	$this->load->view('header',$data);
    	$this->load->view('matches',$info); 
    	$this->load->view('footer',$query);  
    }
    public function academy(){ 
    	$data['result'] = $this->Home_model->get_data_by('setting');
    	$data['title_page'] = "الاكاديميه";
    	$query['query']=$this->Home_model->get_data_by('main');        
    	$info['academy']= $this->Home_model->get_table_row('academy',array(),'academy_pros');
    	$this->load->view('header',$data);
    	$this->load->view('academy',$info); 
    	$this->load->view('footer',$query);  
    }
    public function academy_join(){ 
    	$data['result'] = $this->Home_model->get_data_by('setting');
    	$data['title_page'] = "اشتراك الاكاديميه";
    	$query['query']=$this->Home_model->get_data_by('main');       
    	$info['join']= $this->Home_model->get_table_data('academy');
    	$this->load->view('header',$data);
    	$this->load->view('academy_join',$info); 
    	$this->load->view('footer',$query);  
    }
    public function rank(){ 
    	$data['result'] = $this->Home_model->get_data_by('setting');
    	$data['title_page'] = " المباريات";
    	$query['query']=$this->Home_model->get_data_by('main');        
    	$info['rank']= $this->Home_model->get_table_data('rank');
    	$this->load->view('header',$data);
    	$this->load->view('rank',$info); 
    	$this->load->view('footer',$query);  
    }
    public function project(){ 

    	$data['result'] = $this->Home_model->get_data_by('setting');
    	$data['title_page'] = " المشاريع";
    	$query['query']=$this->Home_model->get_data_by('main');
    	$info['project_new']= $this->Home_model->get_table_data('project',array('project_section'=>2));
    	$info['project_old']= $this->Home_model->get_table_data('project',array('project_section'=>1));

    	
    	$project_id=$_GET['id'];
    	if( $project_id != '' ) {
    		$new['project']= $this->Home_model->get_table_row('project',array('project_id'=>$project_id));        
    		$this->load->view('header',$data);
    		$this->load->view('project_page',$new); 
    		$this->load->view('footer',$query);  
    	}else{

    		$this->load->view('header',$data);
    		$this->load->view('project',$info);  
    		$this->load->view('footer',$query); 
    	}
    }
    public function history(){ 
    	$data['result'] = $this->Home_model->get_data_by('setting');
    	$data['title_page'] = " تاريخ النادي";
    	$query['query']=$this->Home_model->get_data_by('main');
    	$info['history']= $this->Home_model->get_table_row('main',array('main_id'=>1),'main_value');
    	$this->load->view('header',$data);
    	$this->load->view('history',$info); 
    	$this->load->view('footer',$query);  
    }
}
?>
