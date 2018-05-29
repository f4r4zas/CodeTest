<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{
		
    function __construct(){
        parent::__construct();
        $this->load->model('Get_db','', TRUE);
        $this->load->model('Candidate_model','', TRUE);
        $this->load->helper(array('form'), '', TRUE);
        $this->load->model('person_model', 'person');
        $this->load->model('email_template', 'email_template');
		$this->load->library(array('form_validation'));
		$this->load->library('custom_functions');
		$this->uid = $this->session->userdata('logged_in')['user_id'];
        //$this->output->cache(10);
    }
    
    function grab_image(){
        $url  = 'https://ucarecdn.com/3e615244-de18-40b5-98de-16752c2ddd2f/';
        $path = 'test.mp4';
        $fp = fopen($path, 'w');
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_FILE, $fp);
        $data = curl_exec($ch);
        curl_close($ch);
        fclose($fp);
    }
    
    function download_image1(){
        $image_url = "https://ucarecdn.com/3e615244-de18-40b5-98de-16752c2ddd2f/";
        $image_file = "test.mp4";
        $fp = fopen ($image_file, 'w+');              // open file handle
    
        $ch = curl_init($image_url);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // enable if you want
        curl_setopt($ch, CURLOPT_FILE, $fp);          // output to file
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 1000);      // some large value to allow curl to run for a long time
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
        // curl_setopt($ch, CURLOPT_VERBOSE, true);   // Enable this line to see debug prints
        curl_exec($ch);
    
        curl_close($ch);                              // closing curl handle
        fclose($fp);                                  // closing file handle
    }
    
    function get_skills(){
        $this-> db->select('*');
		$this->db->from('amazetal_skill');
        $this->db->like('skill_name', $this->input->post('skill'),'after');
		
		$query = $this->db->get();
		$result = $query->result();
        $output = "";
        
        if(!empty($result)) {
        //$fetched = array();    
            $output .= '<ul class="amazetal_skills">';
        
        foreach($result as $amazetal_skills) {
        
                $output .= '<li class="fetched_skills">'.$amazetal_skills->skill_name.'</li>';
        } 
            $output .= '</ul>';
            
        } else {
            
            $output = "";
            /*$output .= '<ul id="beneficiary-list">';
                $output .= '<li onClick="selectbeneficiary(\'\',\'\');">No beneficiary found</li>';
            $output .= '</ul>';*/    
        } 
        
        echo $output; 
    }
    
    function get_universities(){
        $this-> db->select('*');
		$this->db->from('amazetal_universities');
        $this->db->like('uni_name', $this->input->post('university'),'after');
		
		$query = $this->db->get();
		$result = $query->result();
        $output = "";
        
        if(!empty($result)) {
        //$fetched = array();    
            $output .= '<ul class="amazetal_universities">';
        
        foreach($result as $amazetal_universities) {
        
                $output .= '<li class="fetched_universities">'.$amazetal_universities->uni_name.'</li>';
        } 
            $output .= '</ul>';
            
        } else {
            
            $output = "";
            /*$output .= '<ul id="beneficiary-list">';
                $output .= '<li onClick="selectbeneficiary(\'\',\'\');">No beneficiary found</li>';
            $output .= '</ul>';*/    
        } 
        
        echo $output; 
    }
    
    function get_company_matrix(){
        $this-> db->select('*');
		$this->db->from('amazetal_companies');
        $this->db->like('company_name', $this->input->post('company'),'after');
		
		$query = $this->db->get();
		$result = $query->result();
        $output = "";
        
        if(!empty($result)) {
        //$fetched = array();    
            $output .= '<ul class="amazetal_companies">';
        
        foreach($result as $amazetal_companies) {
        
                $output .= '<li class="fetched_companies">'.$amazetal_companies->company_name.'</li>';
        } 
            $output .= '</ul>';
            
        } else {
            
            $output = "";
            /*$output .= '<ul id="beneficiary-list">';
                $output .= '<li onClick="selectbeneficiary(\'\',\'\');">No beneficiary found</li>';
            $output .= '</ul>';*/    
        } 
        
        echo $output; 
    }

    function index(){
    	$data = $this->html_content();
		$data['cand_carousel_data'] = $this->Get_db->get_details_by_multiple_column('cms_carousel',array('for'=>'candidates'))[0];
        $data['emp_carousel_data'] = $this->Get_db->get_details_by_multiple_column('cms_carousel',array('for'=>'employers'))[0];
        $data['exp_carousel_data'] = $this->Get_db->get_details_by_multiple_column('cms_carousel',array('for'=>'experts'))[0];
        $data['sec1']= $this->Get_db->get_details_all('static_home_section1');
        $data['sec3']= $this->Get_db->get_details_all('static_home_section3');
        $data['cand_sec']= $this->Get_db->get_details_all('static_home_candidate_section');
        $data['emp_sec']= $this->Get_db->get_details_all('static_home_employer_section');
        $data['exp_sec']= $this->Get_db->get_details_all('static_home_expert_section');
        $data['all_section_2_home'] = $this->Get_db->get_details_all("static_home_all_section_2");
        
        
        $data['pageTitle'] = $data['sec1'][0]->meta_title;

        $data['pageDesc'] = $data['sec1'][0]->meta_desc;
        $data['noFollow'] = $data['sec1'][0]->noFollow;
        $data['noIndex'] = $data['sec1'][0]->noIndex;
        $data['user_agent'] = $this->getBrowser();

        //print_r($this->getBrowser());
        /*$data["home_tab_candidate_sec1"] = $this->Get_db->get_details_all('static_home_section1');*/

        $this->load->view('Home_header', @$data);
        $this->load->view('Home_body', @$data);
        $this->load->view('Home_footer', @$data);
		// $this->About_us();
    }
	
	function html_content($profile=true){
	   // echo $profile;
	   //$data = array();
       //if($this->session->userdata('logged_in')['user_id']){}
       $user_id = "0"; 
	   if($profile != 1){
		   $user_id=  $profile;
	   } else {
	       
           $current_result = $this->Get_db->get_details_by_multiple_column('amazetal_users',array('user_id'=>$this->uid));
            if(!empty($current_result)){
           if(!empty($current_result[0]->created_by) && $current_result[0]->role == "recruiter"){
            $parent_result = $this->Get_db->get_details_by_multiple_column('amazetal_users',array('user_id'=>$current_result[0]->created_by));
            $user_id =  $parent_result[0]->user_id;
           }else {
            $user_id =  $this->uid;
            $data['emp_profile']->account_manager = "yes";
           }
           
           $data['this_user_info'] = $current_result[0];
           }
		    
	   }
       $companies = $this->Get_db->get_all(DB_PREFIX."companies");
       
       foreach($companies as $company){
        $data['companies'][$company->company_id]=$company->company_name;
       }

		$data['time_zone'] = array(
			1 => 'CST (Central Standard Time)',
			2 => 'EST(Eastern Standard Time)',
			3 => 'PST (Pacific Standard Time)',
			4 => 'MST(Mountain Standard Time)'
		);
        
        
        
		
		
		
			$qr_basic_info = $this->Get_db->get_details_by_multiple_column(DB_PREFIX.'users',array('user_id'=>$user_id));
			if(!empty($qr_basic_info[0])){
				$data['user_info'] = $qr_basic_info[0] ;
                
                
                
                $this->db->select('*');
                $this->db->from('amazetal_job'); 
                $this->db->where('status','2');
                $this->db->where('emp_id',$qr_basic_info[0]->user_id);
                $posted_exp_jobs = $this->db->get();
                $total_posted_exp_jobs = $posted_exp_jobs->num_rows();
                
                $this->db->select('*');
                $this->db->from('amazetal_job'); 
                $this->db->where('emp_id',$qr_basic_info[0]->user_id);
                $posted_jobs = $this->db->get();
                $total_posted_jobs = $posted_jobs->num_rows();
                
                $data['total_posted_jobs'] = $total_posted_jobs - $total_posted_exp_jobs;
                
                //$data['total_posted_jobs'] = $this->Get_db->record_count_mojo('amazetal_job',array("emp_id"=>$qr_basic_info[0]->user_id, 'status !='=>'2'));
                $jobs_available_to_post = $qr_basic_info[0]->can_post - $data['total_posted_jobs'];
                if($jobs_available_to_post > 0){
                    $data['jobs_available_to_post'] = $jobs_available_to_post;
                } else {
                    $data['jobs_available_to_post'] = '0';
                }
                
                
                
                
                
				$amazetal_user_role = $this->Get_db->get_details_by_multiple_column(DB_PREFIX.'user_role',array('user_id'=>$user_id));
				$amazetal_user_companies = $this->Get_db->get_details_by_multiple_column(DB_PREFIX.'user_companies',array('user_id'=>$user_id));
				$amazetal_user_edu = $this->Get_db->get_details_by_multiple_column(DB_PREFIX.'user_edu',array('user_id'=>$user_id));
				$amazetal_user_skill = $this->Get_db->get_details_by_multiple_column(DB_PREFIX.'user_skill',array('user_id'=>$user_id));
                
                
                
                
                $this->db->select('*');
                $this->db->from('amazetal_job_invite');
                if($data['user_info']->role == 'employer'){
                    $this->db->where('emp_id',$user_id);
                } else {
                    $this->db->where('user_id',$user_id);    
                }
                $this->db->where('status',0); 
                $user_invites_pending = $this->db->get();
                $data['user_info']->amazetal_user_invites_pending = $user_invites_pending->num_rows(); 
                
                $this->db->select('*,amazetal_job_interview.status as interview_status,amazetal_job_invite.status as invite_status,amazetal_job_invite.location as invite_location');
                $this->db->from('amazetal_job_invite'); 
                $this->db->join('amazetal_job_interview', 'amazetal_job_invite.invite_id = amazetal_job_interview.invite_id','inner');
                if($data['user_info']->role == 'employer'){
                    $this->db->where('amazetal_job_invite.emp_id',$user_id);
                } else {
                    $this->db->where('amazetal_job_invite.user_id',$user_id);    
                }
                $this->db->where('amazetal_job_interview.status',0); 
                $user_interview_pending = $this->db->get();
                $data['user_info']->amazetal_user_interview_pending = $user_interview_pending->num_rows();
                
                $this->db->select('*,amazetal_job_offer.status as offer_status,amazetal_job_invite.status as invite_status,amazetal_job_invite.location as job_location');
                $this->db->from('amazetal_job_invite'); 
                $this->db->join('amazetal_job_interview', 'amazetal_job_invite.invite_id = amazetal_job_interview.invite_id','inner');
                $this->db->join('amazetal_job_offer', 'amazetal_job_interview.interview_id = amazetal_job_offer.interview_id','inner');
                if($data['user_info']->role == 'employer'){
                    $this->db->where('amazetal_job_invite.emp_id',$user_id);
                } else {
                    $this->db->where('amazetal_job_invite.user_id',$user_id);    
                }
                $this->db->where('amazetal_job_offer.status',0); 
                $job_offer_pending = $this->db->get();
                $data['user_info']->amazetal_user_offers_pending = $job_offer_pending->num_rows();
                
                
                $this->db->select('*');
                $this->db->from('amazetal_job_invite'); 
                $this->db->where('user_id',$user_id);
                $this->db->where('status',1);  
                $user_invites_accepted = $this->db->get();
                $data['user_info']->amazetal_user_invites_accepted = $user_invites_accepted->num_rows();
                
                $this->db->select('*,amazetal_job_invite.status as invite_status,amazetal_job_invite.location as invite_location');
                $this->db->from('amazetal_job_invite'); 
                $this->db->join('amazetal_job_interview', 'amazetal_job_invite.invite_id = amazetal_job_interview.invite_id','inner');
                if($data['user_info']->role == 'employer'){
                    $this->db->where('amazetal_job_invite.emp_id',$user_id);
                } else {
                    $this->db->where('amazetal_job_invite.user_id',$user_id);    
                }
                $this->db->where('amazetal_job_interview.status',1); 
                $user_interview_accepted = $this->db->get();
                $data['user_info']->amazetal_user_interview_accepted = $user_interview_accepted->num_rows();
                
                $this->db->select('*,amazetal_job_invite.status as invite_status,amazetal_job_invite.location as job_location');
                $this->db->from('amazetal_job_invite'); 
                $this->db->join('amazetal_job_interview', 'amazetal_job_invite.invite_id = amazetal_job_interview.invite_id','inner');
                $this->db->join('amazetal_job_offer', 'amazetal_job_interview.interview_id = amazetal_job_offer.interview_id','inner');
                if($data['user_info']->role == 'employer'){
                    $this->db->where('amazetal_job_invite.emp_id',$user_id);
                } else {
                    $this->db->where('amazetal_job_invite.user_id',$user_id);    
                }
                $this->db->where('amazetal_job_offer.status',1); 
                $job_offer_accepted = $this->db->get();
                $data['user_info']->amazetal_user_offers_accepted = $job_offer_accepted->num_rows();
				
				// print_r($amazetal_user_role);
if(!empty($amazetal_user_companies)){
foreach($amazetal_user_companies as $key => $value){
	if($value->company_id != 0){
		$vall = $this-> Get_db-> get_details_by_multiple_column
							(DB_PREFIX.'companies',array('company_id'=>$value->company_id));
		if(!empty($vall)){
			$amazetal_user_companies[$key]->Fetch_from_db = $vall[0];
		}
		
		 

	}
}
}
if(!empty($amazetal_user_edu)){
foreach($amazetal_user_edu as $key => $value){
	if($value->uni_id != 0){
		
		$val = $this->	Get_db->get_details_by_multiple_column
							(DB_PREFIX.'universities',array('uni_id'=>$user_id));
		if(!empty($val)){
				$amazetal_user_edu[$key]->Fetch_from_db = $val[0];
		}
		 

	}
}
}				
			
				
				//GET USER EMPLOYEMENT RECORD
				$user_employement_record_by_date = array();
				$qr_user_employement_record = $this->Candidate_model->employmentRecord($user_id);
				if(!empty($qr_user_employement_record)){
					foreach($qr_user_employement_record as $emp_key => $emp_value){
						//GET YEAR ONLY 
						if(!empty($emp_value->ending_date)){
							$year = trim(explode(',',$emp_value->ending_date)[1]);
						}else{
							$year = 'w'; //STILL WORKING/STUDYING, TO GET THE TOP POSITION IN SORTING.
						}
						$user_employement_record_by_date[$year . '_' . $emp_value->user_companies_id ] = $emp_value;
						$starting_year = NULL;
						$ending_year = NULL;
						$ending_month = NULL;
						//ADD ANOTHER KEY
						if(!empty($emp_value->starting_date)){
							$starting_year = trim(explode(',',$emp_value->starting_date)[1]);
							$starting_month = substr(trim(explode(',',$emp_value->starting_date)[0]),0,3);
							
						}
						if(!empty($emp_value->ending_date)){
							$ending_year = trim(explode(',',$emp_value->ending_date)[1]);
							$ending_month= substr(trim(explode(',',$emp_value->ending_date)[0]),0,3);
							
						}else{
							
							$ending_year =  'Working';
						}
						
						$emp_value->year_range = $starting_month . ' ' . $starting_year . ' - ' . $ending_month . ' ' . $ending_year;
					}
				}
				krsort($user_employement_record_by_date);
				
				//GET USER EDUCATION RECORD
				$user_education_record_by_date = array();
				$qr_user_employement_record = $this->Candidate_model->educationRecord($user_id);
				if(!empty($qr_user_employement_record)){
					foreach($qr_user_employement_record as $emp_key => $emp_value){
						//GET YEAR ONLY 
						
						if(!empty($emp_value->ending_date)){
							$year = trim(explode(',',$emp_value->ending_date)[1]);
						}else{
							$year = 'w'; //STILL WORKING/STUDYING, TO GET THE TOP POSITION IN SORTING.
						}
						$user_education_record_by_date[ $year . '_' . $emp_value->user_edu_id ] = $emp_value;
						$starting_year = NULL;
						$ending_year = NULL;
						//ADD ANOTHER KEY
						if(!empty($emp_value->starting_date)){
							$starting_year = trim(explode(',',$emp_value->starting_date)[1]);
							$starting_month = substr(trim(explode(',',$emp_value->starting_date)[0]),0,3);
						}
						if(!empty($emp_value->ending_date)){
							$ending_year = trim(explode(',',$emp_value->ending_date)[1]);
							$ending_month= substr(trim(explode(',',$emp_value->ending_date)[0]),0,3);
						}else{
							$ending_month = '';
							$ending_year =  'Studying';
						}
						
						$emp_value->year_range = $starting_month . ' ' . $starting_year . ' - ' . $ending_month . ' ' . $ending_year;
					}
				}
				krsort($user_education_record_by_date);
				
				// print_r($data['user_info']->user_id);
										
				
				 $amazetal_assign_expert_val = $this->	Get_db->get_details_by_multiple_column
							(DB_PREFIX.'assign_expert',array('user_id'=>$data['user_info']->user_id, 'pending_status !='=>2));

                $data['user_info']->amazetal_assign_expert = array();
						
							// die();
				if(!empty($amazetal_assign_expert_val)){
					foreach($amazetal_assign_expert_val as $key => $values){
							$expert_details = $this->	Get_db->get_details_by_multiple_column
							(DB_PREFIX.'users',array('user_id'=>$values->expert_id));
							$data['user_info']->amazetal_assign_expert[$key] = $values;
							$data['user_info']->amazetal_assign_expert[$key]->expert_details = @$expert_details;
						}
					}
				 
				
				
				$data['user_info']->amazetal_user_companies = $amazetal_user_companies;
				$data['user_info']->amazetal_user_skill = $this->Candidate_model->getUserSkills($user_id);
				$data['user_info']->amazetal_user_edu = $amazetal_user_edu;
				$data['user_info']->amazetal_user_role = $this->Candidate_model->getUserRole($user_id);
				$data['user_info']->amazetal_user_interested_area = $this->Candidate_model->getUserInterestedArea($user_id);
				$data['user_info']->prefered_location_of_work = $this->Get_db->preferedLocationOfWork($user_id);
				$data['user_info']->user_employment_record = $user_employement_record_by_date;
				$data['user_info']->user_edu_record = $user_education_record_by_date;
                $data['user_info']->favourites = $this->Get_db->get_details_by_multiple_column(DB_PREFIX.'favourites',array('user_id'=>$user_id));
                
                /*$current_emp_company_array = array('amazetal_users.user_id'=>$user_id);
                $current_emp_company = $this->Get_db->left_single_join_where('amazetal_companies','amazetal_users','company_id','company_id',$current_emp_company_array);
                if(isset($current_emp_company[0])){
                    $data['user_info']->company_name = $current_emp_company[0]->company_name;
                } else{
                    $data['user_info']->company_name = "Amazetal";//$current_emp_company[0]->company_name;
                }*/
                
                //$current_emp_company = $this->Get_db->left_single_join_where('amazetal_companies','amazetal_users','company_id','company_id',$current_emp_company_array);
                if($qr_basic_info[0]->company_id != NULL){
                    $data['user_info']->company_name = $qr_basic_info[0]->company_id;
                } else{
                    $data['user_info']->company_name = "Amazetal";//$current_emp_company[0]->company_name;
                }
				
			} 
		
		
		$data['Sliders'] = $this->Get_db->get_details_all('slider');
		$where_array = array(
				'testimonials_type' => 'For Candidates'
			);
    	$data['testimonials_For_Candidates'] = $this->Get_db->get_details_by_multiple_column('testimonials',$where_array);
		
		
		$where_array = array(
				'testimonials_type' => 'For Career Experts'
			);
    	$data['testimonials_For_expert'] = $this->Get_db->get_details_by_multiple_column('testimonials',$where_array);
		
		
		
		$where_array = array(
				'testimonials_type' => 'For Employers'
			);
    	$data['testimonials_For_Employer'] = $this->Get_db->get_details_by_multiple_column('testimonials',$where_array);
		
		
		
		$where_array = array(
				'Cms_Content_key' => 'section_2'
			);
    	$content = $this->Get_db->get_details_by_multiple_column('cms_content',$where_array);
    	$data['home']['section_2'] =  $content[0]->Cms_Content_Meta;
		
		$where_array = array(
				'Cms_Content_key' => 'section_2_youtube_video_candidate'
			);
    	$content = $this->Get_db->get_details_by_multiple_column('cms_content',$where_array);
    	$data['home']['section_2_youtube_video_candidate'] =  $content[0]->Cms_Content_Meta;
		
		$where_array = array(
				'Cms_Content_key' => 'section_2_youtube_video_Employers'
			);
    	$content = $this->Get_db->get_details_by_multiple_column('cms_content',$where_array);
    	$data['home']['section_2_youtube_video_Employers'] =  $content[0]->Cms_Content_Meta;
		
		$where_array = array(
				'Cms_Content_key' => 'section_2_youtube_video_Career_Experts'
			);
    	$content = $this->Get_db->get_details_by_multiple_column('cms_content',$where_array);
    	$data['home']['section_2_youtube_video_Career_Experts'] =  $content[0]->Cms_Content_Meta;

        $data["home"]["section_3_exp"]  =  $this->Get_db->get_details_all('static_home_expert_section');

    	$content = $this->Get_db->get_details_all('static_home_all_section_2');

        $data['home']['section_3_can_head'] =  $content[0]->r1_heading;
    	$data['home']['section_3_can_desc'] =  $content[0]->r1_desc;
    	$data['home']['section_3_can_image'] =  $content[0]->r1_image;

        $data['home']['section_3_emp_head'] =  $content[1]->r1_heading;
    	$data['home']['section_3_emp_desc'] =  $content[1]->r1_desc;
    	$data['home']['section_3_emp_image'] =  $content[1]->r1_image;


        $data['home']['section_3_exp_head'] =  $content[2]->r1_heading;
    	$data['home']['section_3_exp_desc'] =  $content[2]->r1_desc;
    	$data['home']['section_3_exp_image'] =  $content[2]->r1_image;

    	$content = $this->Get_db->get_details_all('static_home_candidate_section');
    	$data['home']['section_4_1_title'] =  $content[0]->col1_title;
    	$data['home']['section_4_1_text'] =  $content[0]->col1_text;
    	$data['home']['section_4_1_img'] =  $content[0]->col1_img;
    	$data['home']['section_4_1_link'] =  $content[0]->col1_link;

        $data['home']['section_4_2_title'] =  $content[0]->col2_title;
    	$data['home']['section_4_2_text'] =  $content[0]->col2_text;
    	$data['home']['section_4_2_img'] =  $content[0]->col2_img;
    	$data['home']['section_4_2_link'] =  $content[0]->col2_link;

        $data['home']['section_4_3_title'] =  $content[0]->col3_title;
    	$data['home']['section_4_3_text'] =  $content[0]->col3_text;
    	$data['home']['section_4_3_img'] =  $content[0]->col3_img;
    	$data['home']['section_4_3_link'] =  $content[0]->col3_link;

        $data['home']['section_4_4_title'] =  $content[0]->col4_title;
    	$data['home']['section_4_4_text'] =  $content[0]->col4_text;
    	$data['home']['section_4_4_img'] =  $content[0]->col4_img;
    	$data['home']['section_4_4_link'] =  $content[0]->col4_link;
		
		//section 5_5------------------------------
		$where_array = array(
				// 'datetime' => $get_date,
				'Cms_Content_key' => 'section_5_1'
		);

    	$content = $this->Get_db->get_details_by_multiple_column('cms_content',$where_array);
    	$data['home']['section_5_1'] =  $content[0]->Cms_Content_Meta;
		
		
		$where_array = array(
				// 'datetime' => $get_date,
				'Cms_Content_key' => 'section_5_2'
		);
    	
        $content = $this->Get_db->get_details_by_multiple_column('cms_content',$where_array);
    	$data['home']['section_5_2'] =  $content[0]->Cms_Content_Meta;
		
		
		$where_array = array(
				// 'datetime' => $get_date,
				'Cms_Content_key' => 'section_5_3'
			);
    	$content = $this->Get_db->get_details_by_multiple_column('cms_content',$where_array);
    	$data['home']['section_5_3'] =  $content[0]->Cms_Content_Meta;
		
		
		$where_array = array(
				// 'datetime' => $get_date,
				'Cms_Content_key' => 'section_5_4'
			);
    	$content = $this->Get_db->get_details_by_multiple_column('cms_content',$where_array);
    	$data['home']['section_5_4'] =  $content[0]->Cms_Content_Meta;
		
		
		$where_array = array(
				// 'datetime' => $get_date,
				'Cms_Content_key' => 'section_5_5'
			);
    	$content = $this->Get_db->get_details_by_multiple_column('cms_content',$where_array);
    	$data['home']['section_5_5'] =  $content[0]->Cms_Content_Meta;
		//section 5_5------------------------------
		
		
		//section section_6_1------------------------------
		$where_array = array(
				// 'datetime' => $get_date,
				'Cms_Content_key' => 'section_6_1'
			);
    	$content = $this->Get_db->get_details_by_multiple_column('cms_content',$where_array);
    	$data['home']['section_6_1'] =  $content[0]->Cms_Content_Meta;
		
		$where_array = array(
				// 'datetime' => $get_date,
				'Cms_Content_key' => 'section_6_2'
			);
    	$content = $this->Get_db->get_details_by_multiple_column('cms_content',$where_array);
    	$data['home']['section_6_2'] =  $content[0]->Cms_Content_Meta;


    	$data['privacy']['data'] =  $this->_get_privacy();
    	$data['help']['data'] =  $this->_get_help();
        $data["home"]["for_candi_stats"] = $this->Get_db->get_details_all('static_home_section3');
        $data["home"]["for_emp_section_3"] = $this->Get_db->get_details_all('static_home_employer_section');
		
		
		if(!empty($this->uid)){
			
		
			$count_pending_where = "(pending_status='0') AND review_status != 1 AND expert_id =".$this->uid;
			$count_pending = $this-> Get_db-> get_details_by_multiple_column
							(DB_PREFIX.'assign_expert',$count_pending_where);
			
			$count_Progress_where = "(pending_status='1' AND review_status='0' AND expert_id=".$this->uid.")";
			$count_Progress = $this-> Get_db-> get_details_by_multiple_column
							(DB_PREFIX.'assign_expert',$count_Progress_where);
			
			$count_completed_where = "(pending_status='1' AND review_status='1' AND expert_id=".$this->uid.")";
			$count_completed = $this-> Get_db-> get_details_by_multiple_column
							(DB_PREFIX.'assign_expert',$count_completed_where);
							
				$where_array_rejected = array(	
					'pending_status' => 2,
					'expert_id' => 	$this->uid
				);
				$assign_expert_where_array_rejected = $this-> Get_db-> get_details_by_multiple_column
							(DB_PREFIX.'assign_expert',$where_array_rejected);
			 
			 @$data['count_rejected'] =  (empty(count($assign_expert_where_array_rejected)))?'0':count($assign_expert_where_array_rejected);
			 @$data['count_pending'] =  (empty(count($count_pending)))?'0':count($count_pending);
			 @$data['count_Progress'] =  (empty(count($count_Progress)))?'0':count($count_Progress);
			 @$data['count_completed'] =  (empty(count($count_completed)))?'0':count($count_completed);
			 
			 
			 
			$data['controller_name'] =  $this->router->fetch_class();

			 
			 
			 
		}
		
		
		
		
		
		
		
		
		return $data;
		
	}

	public function _get_help()
    {
        $help_tbl = $this->Get_db->get_details_all_order_by('help','type','ASC');
      
        $count_help_tbl = count($help_tbl);
        $arr_temp = array();
        for($i=0;$i<$count_help_tbl;++$i)
        {
            if(!empty($help_tbl[$i]->heading))
            {
                $temp_subheading = json_decode($help_tbl[$i]->sub_heading);
                $temp_content = json_decode($help_tbl[$i]->content);
                $count_key = count($temp_subheading);
                for($j=0;$j<$count_key;++$j)
                {
                   /* $arr_temp[$help_tbl[$i]->type][$help_tbl[$i]->heading][] = array(
                        'head'=>$temp_subheading[$j],
                        'cont'=>$temp_content[$j],
                    );*/
                     $arr_temp[$help_tbl[$i]->type][] = array(
                        'head'=>$temp_subheading[$j],
                        'cont'=>$temp_content[$j],
                    );
                }
            }
            
                
        }
         return $arr_temp;
    }
    
	 public function _get_privacy()
    {
       
        $privacy_tbl = $this->Get_db->get_details_all('privacy');
       
        $count_privacy_tbl = count($privacy_tbl);
        $arr_temp = array();
        for($i=0;$i<$count_privacy_tbl;++$i)
        {
            if(!empty($privacy_tbl[$i]->heading))
            {
                $temp_subheading = json_decode($privacy_tbl[$i]->sub_heading);
                $temp_content = json_decode($privacy_tbl[$i]->content);
                $count_key = count($temp_subheading);
                for($j=0;$j<$count_key;++$j)
                {
                    $arr_temp[$privacy_tbl[$i]->heading][] = array(
                        'head'=>$temp_subheading[$j],
                        'cont'=>$temp_content[$j],
                    );
                }
            }
        }

        return $arr_temp;
      
    }
	
	function Save_video(){
			$dataString = $_POST['data'];
			print_r($dataString);
			
			$where_array = array('Cms_Content_Meta' => $dataString['element_t_save']);
			$id = $this->Get_db->update_record($where_array,'cms_content','Cms_Content_key',$dataString['save_to']);
			
			
			
	}
	function update_dp(){
			
			
			
			
			$where_array = array(
				'user_id' => $this->uid
			);
			$old_dp = $this->Get_db->get_details_by_multiple_column(DB_PREFIX.'users',$where_array);
			
			$old_dpp = explode("/",$old_dp[0]->$_POST['f_to_save']);
			
			// echo "<pre>";	
				// print_r($_POST['f_to_save']);
				// print_r( $old_dpp[3] );
			// echo "</pre>";	
			
			if(!empty($old_dpp[3])){
				$this->Get_db->delete_uploadcare_file($old_dpp[3],'5c13c29e2a2e499b512c','fa3f316e16aada5ca434');
				
			}
				
			
			
			$what_to_save = array(	$_POST['f_to_save'] => $_POST['cdnUrl'] );
			$id = $this->Get_db->update_record(		
									$what_to_save, 
									DB_PREFIX.'users',// which table to save
									'user_id', // where column is equal to 
									$this->uid // where column value equal to
									);
			// print_r( $where_array );
			
	}

	function update_profile()
	{
		if(isset($_POST['undefined']))unset($_POST['undefined']);

		$status = true;
		$error = array();
		$this->form_validation->set_error_delimiters('<p>', '</p>');
		if($this->input->post('step')==1)
		{
	        /*$this->form_validation->set_rules('fullname', 'Full Name', 'trim|required',
	            array('required' => 'You must provide a %s.')
	        );
	        // |regex_match[/^\([0-9]{3}\)[0-9]{3}-[0-9]{4}$/]
	        $this->form_validation->set_rules('phone', 'phone', 'trim|required',
	            array('required' => 'You must provide a %s.','regex_match'=>'Number must be US format.')
	        );
	        $this->form_validation->set_rules('place', 'Location', 'trim|required',
	            array('required' => 'You must provide a %s.')
	        ); */
                        
            $optional_fields = array('timezone_id');
			 //print_r($_POST['phone']);
			 //exit();
            foreach($this->input->post() as $key => $value)
	        {
	           	           
			
				if(in_array($key,$optional_fields)){
					
					continue;
				}
                elseif($key == "phone"){
                  if(empty(trim($value)) || $value == " " || strlen($value) < 14 ){
                        $status = FALSE;
				        $error[$key] = '<p>Minimum character length of Phone is 10.</p>';
                    } else {
                        continue;
                    }
               } else {
					
					if(is_array($value)){
						
						foreach($value as $row_val){
						  
							if(empty($row_val)){
								$status = FALSE;
								$error[$key] = '<p>You must provide this Field.</p>';
							}
						}
					}
                    elseif($value == "0"){
						
				        continue;
				    }
                    
				    elseif( empty(trim($value)) || $value == " " || preg_match('/\A\s*\z/', $value) ){
						
				        $status = FALSE;
				        $error[$key] = '<p>You must provide this Field.</p>';
				    }else{
						//do nothing
					
					}
                    
                    
				}
				
			  
	        	
	        }
			
		}elseif($this->input->post('step')==2)
		{
		  $optional_fields = array('about_me','what_are_you_looking_to_do_in_your_next_job','what_are_you_really_good_at','what_have_you_done','why_are_you_looking_for_new_opportunities');
		      foreach ($this->input->post() as $key => $value)
	           {
				
				if(in_array($key,$optional_fields)){
					continue;
				}else{
					
					if(is_array($value)){
						foreach($value as $row_val){
							if(empty(trim($row_val))){
								$status = FALSE;
								$error[$key] = '<p>You must provide this Field.</p>';
							}
						}
					}
				    elseif(empty(trim($value))){
						
				        $status = FALSE;
				        $error[$key] = '<p>You must provide this Field.</p>';
				    }else{
						//do nothing
					}
                    
                    
				    /*$this->form_validation->set_rules($key, 'Field', 'trim|required',
    					   array('required' => 'You must provide this %s.')
    					);*/
				    
                    /*if(is_array($key)){
                        foreach ($key as $row => $value)
	                       {
	                           
	                           $this->form_validation->set_rules($key[$row], 'Field', 'trim|required',
            					   array('required' => 'You must provide this %s.')
            					);
	                       }
                    }else{
					
    					/*$this->form_validation->set_rules($key, 'Field', 'trim|required',
    					   array('required' => 'You must provide this %s.')
    					);
                    }*/
				}
				
			  
	        	
	        }
			/* foreach ($this->input->post() as $key => $value)
	        {
	        	 $this->form_validation->set_rules($key, 'Field', 'trim|required',
	         	   array('required' => 'You must provide this %s.')
	     	   );
	        }*/

	      /*  $this->form_validation->set_rules('what_have_you_done', 'Field', 'trim|required',
	            array('required' => 'You must provide this %s.')
	        );
	        
	        $this->form_validation->set_rules('what_are_you_really_good_at', 'Field', 'trim|required',
	            array('required' => 'You must provide this %s.')
	        );
	        $this->form_validation->set_rules('next_job', 'Field', 'trim|required',
	            array('required' => 'You must provide this %s.')
	        ); 
	        $this->form_validation->set_rules('new_opportunities', 'Field', 'trim|required',
	            array('required' => 'You must provide this %s.')
	        ); */
		}elseif($this->input->post('step')==3)
		{
			 /*foreach ($this->input->post() as $key => $value)
	        {
	           
	        	 $this->form_validation->set_rules($key, 'Field', 'trim|required',
	         	   array('required' => 'You must provide this %s.')
	     	   );
	        }*/
            $optional_fields = array();
            foreach ($this->input->post() as $key => $value)
	        {
				
				if(in_array($key,$optional_fields)){
					continue;
				}else{
					
					if(is_array($value)){
						foreach($value as $row_val){
							if(empty(trim($row_val))){
								$status = FALSE;
								$error[$key] = '<p>You must provide this Field.</p>';
							}
						}
					}
				    elseif(empty(trim($value))){
						
				        $status = FALSE;
				        $error[$key] = '<p>You must provide this Field.</p>';
				    }else{
						//do nothing
					}
                    
                    
				    /*$this->form_validation->set_rules($key, 'Field', 'trim|required',
    					   array('required' => 'You must provide this %s.')
    					);*/
				    
                    /*if(is_array($key)){
                        foreach ($key as $row => $value)
	                       {
	                           
	                           $this->form_validation->set_rules($key[$row], 'Field', 'trim|required',
            					   array('required' => 'You must provide this %s.')
            					);
	                       }
                    }else{
					
    					/*$this->form_validation->set_rules($key, 'Field', 'trim|required',
    					   array('required' => 'You must provide this %s.')
    					);
                    }*/
				}
				
			  
	        	
	        }
 				
		}elseif($this->input->post('step')==4)
		{
			
            //if(is_array($_POST['company_matrix'])) {
                    
              foreach($_POST['company_matrix'] as $x => $oneTextFieldsValue) {
                if(empty(trim($oneTextFieldsValue))){
					$status = FALSE;
					$error["company_matrix[]|".$x] = '<p>You must provide this Field.</p>';
				}
                // Validate $oneTextFieldsValue...
              }
              
              foreach($_POST['textinput-title'] as $x => $oneTextFieldsValue) {
                if(empty(trim($oneTextFieldsValue))){
					$status = FALSE;
					$error["textinput-title[]|".$x] = '<p>You must provide this Field.</p>';
				}
                // Validate $oneTextFieldsValue...
              }
              /*echo "<pre>";
              print_r($_POST);
              echo "</pre>";*/
              
              foreach($_POST['still_working'] as $x => $oneTextFieldsValue) {
                if($oneTextFieldsValue == 'no'){
                    $StartMonthYear = trim($_POST['emp_startmonth'][$x])." ".trim($_POST['emp_startyear'][$x]);//strtotime(date("F Y")); 
                    $EndMonthYear = trim($_POST['emp_endmonth'][$x])." ".trim($_POST['emp_endyear'][$x]);
                    $startemp = strtotime($StartMonthYear);
                    $endemp = strtotime($EndMonthYear);
                    if($startemp >= $endemp){
                        $status = FALSE;
    				    $error["emp_endmonth[]|".$x] = '<p>End date must be greater than start date.</p>';
                    }
                }
                // Validate $oneTextFieldsValue...
              }
              
            //}
            /*for($x = 1; $x <= $this->input->post('total_emp'); $x++) {
                
                
                if(empty(trim($_POST['company_matrix'][$x])) && $_POST['company_matrix'][$x] != '0'){
						
				        $status = FALSE;
				        $error["company_matrix[]|".$x] = '<p>You must provide this Field.</p>';
				}
                
                if(empty(trim($_POST['textinput-title'][$x])) && $_POST['textinput-title'][$x] != '0'){
						
				        $status = FALSE;
				        $error["textinput-title[]|".$x] = '<p>You must provide this Field.</p>';
				}
                
                if($_POST['still_working'][$x] == 'no'){
                    $StartMonthYear = trim($_POST['emp_startmonth'][$x])." ".trim($_POST['emp_startyear'][$x]);//strtotime(date("F Y")); 
                    $EndMonthYear = trim($_POST['emp_endmonth'][$x])." ".trim($_POST['emp_endyear'][$x]);
                    $startemp = strtotime($StartMonthYear);
                    $endemp = strtotime($EndMonthYear);
                    if($startemp >= $endemp){
                        $status = FALSE;
    				    $error["emp_endmonth[]|".$x] = '<p>End date must be greater than start date.</p>';
                    }
                }
                
                
                
            }*/
            
            
            
            foreach($_POST['universities'] as $x => $oneTextFieldsValue) {
                if(empty(trim($oneTextFieldsValue))){
					$status = FALSE;
					$error["universities[]|".$x] = '<p>You must provide this Field.</p>';
				}
                // Validate $oneTextFieldsValue...
              }
              
              foreach($_POST['edu_degree'] as $x => $oneTextFieldsValue) {
                if(empty(trim($oneTextFieldsValue))){
					$status = FALSE;
					$error["edu_degree[]|".$x] = '<p>You must provide this Field.</p>';
				}
                // Validate $oneTextFieldsValue...
              }
              
              foreach($_POST['still_studying'] as $x => $oneTextFieldsValue) {
                if($oneTextFieldsValue == 'no'){
                    $StartMonthYear = trim($_POST['edu_startmonth'][$x])." ".trim($_POST['edu_startyear'][$x]);//strtotime(date("F Y")); 
                    $EndMonthYear = trim($_POST['edu_endmonth'][$x])." ".trim($_POST['edu_endyear'][$x]);
                    $startemp = strtotime($StartMonthYear);
                    $endemp = strtotime($EndMonthYear);
                    if($startemp >= $endemp){
                        $status = FALSE;
    				    $error["edu_endmonth[]|".$x] = '<p>End date must be greater than start date.</p>';
                    }
                }
                // Validate $oneTextFieldsValue...
              }
              
            /*for($xx = 1; $xx <= $this->input->post('total_edu'); $xx++) { 
                if(empty(trim($_POST['universities'][$xx])) && $_POST['universities'][$xx] != '0'){
						
				        $status = FALSE;
				        $error["universities[]|".$xx] = '<p>You must provide this Field.</p>';
				}
                
                if(empty(trim($_POST['edu_degree'][$xx])) && $_POST['edu_degree'][$xx] != '0'){
						
				        $status = FALSE;
				        $error["edu_degree[]|".$xx] = '<p>You must provide this Field.</p>';
				}
                
                if($_POST['still_studying'][$xx] == "no"){
                    $StartMonthYear = trim($_POST['edu_startmonth'][$xx])." ".trim($_POST['edu_startyear'][$xx]);//strtotime(date("F Y")); 
                    $EndMonthYear = trim($_POST['edu_endmonth'][$xx])." ".trim($_POST['edu_endyear'][$xx]);
                    $startedu = strtotime($StartMonthYear);
                    $endedu = strtotime($EndMonthYear);
                    if($startedu >= $endedu){
                        $status = FALSE;
    				    $error["edu_endmonth[]|".$xx] = '<p>End date must be greater than start date.</p>';
                    }
                }
                
            }*/
            
            $optional_fields = array('emp_startmonth','edu_degree','universities','edu_startmonth','github','coupon_question','company_matrix','textinput-title','emp_endmonth','emp_endyear','still_working','still_studying','award_received','journals_published','edu_endmonth','major_courses','emp_work');

			foreach ($this->input->post() as $key => $value)
	        {
				
				
				if(in_array($key,$optional_fields)){
					continue;
				}else{
					
					if(is_array($value)){
						foreach($value as $row_val){
							if(empty(trim($row_val))){
								$status = FALSE;
								$error[$key] = '<p>You must provide this Field.</p>';
							}
						}
					}
				    elseif(empty(trim($value)) && $value != '0'){
						
				        $status = FALSE;
				        $error[$key] = '<p>You must provide this Field.</p>';
				    }else{
						//do nothing
					}
                    
                    
				    
				}
				
			  
	        	
	        }
			
		
		}elseif($this->input->post('step')==5)
		{
			 /*foreach ($this->input->post() as $key => $value)
	        {
	        	 $this->form_validation->set_rules($key, 'Field', 'trim|required',
	         	   array('required' => 'You must provide this %s.')
	     	   );
	        }*/
            $optional_fields = array('linkedin','employment_type','job_presence');
            foreach ($this->input->post() as $key => $value)
	        {
				
				if(in_array($key,$optional_fields)){
					continue;
				}else{
					
					if(is_array($value)){
						foreach($value as $row_val){
							if(empty(trim($row_val))){
								$status = FALSE;
								$error[$key] = '<p>You must provide this Field.</p>';
							}
						}
					}
                    elseif($value == "0"){
						
				        continue;
				    }
				    elseif(empty(trim($value))){
						
				        $status = FALSE;
				        $error[$key] = '<p>You must provide this Field.</p>';
				    }else{
						//do nothing
					}
                    
                    
				    /*$this->form_validation->set_rules($key, 'Field', 'trim|required',
    					   array('required' => 'You must provide this %s.')
    					);*/
				    
                    /*if(is_array($key)){
                        foreach ($key as $row => $value)
	                       {
	                           
	                           $this->form_validation->set_rules($key[$row], 'Field', 'trim|required',
            					   array('required' => 'You must provide this %s.')
            					);
	                       }
                    }else{
					
    					/*$this->form_validation->set_rules($key, 'Field', 'trim|required',
    					   array('required' => 'You must provide this %s.')
    					);
                    }*/
				}
				
			  
	        	
	        }
 				
		}
		elseif($this->input->post('step')==6)
		{
			/* foreach ($this->input->post() as $key => $value)
	        {
	        	 $this->form_validation->set_rules($key, 'Field', 'trim|required',
	         	   array('required' => 'You must provide this %s.')
	     	   );
	        }*/
            $optional_fields = array('certification','online_course','app_website','sig_achievement');
            foreach ($this->input->post() as $key => $value)
	        {
				
				if(in_array($key,$optional_fields)){
					continue;
				}else{
					
					if(is_array($value)){
						foreach($value as $row_val){
							if(empty(trim($row_val))){
								$status = FALSE;
								$error[$key] = '<p>You must provide this Field.</p>';
							}
						}
					}
				    elseif(empty(trim($value))){
						
				        $status = FALSE;
				        $error[$key] = '<p>You must provide this Field.</p>';
				    }else{
						//do nothing
					}
                    
                    
				    /*$this->form_validation->set_rules($key, 'Field', 'trim|required',
    					   array('required' => 'You must provide this %s.')
    					);*/
				    
                    /*if(is_array($key)){
                        foreach ($key as $row => $value)
	                       {
	                           
	                           $this->form_validation->set_rules($key[$row], 'Field', 'trim|required',
            					   array('required' => 'You must provide this %s.')
            					);
	                       }
                    }else{
					
    					/*$this->form_validation->set_rules($key, 'Field', 'trim|required',
    					   array('required' => 'You must provide this %s.')
    					);
                    }*/
				}
				
			  
	        	
	        }
 				
		}elseif($this->input->post('step')==7)
		{
 				// This step is not mandatory as per FS Document
				// Below we are validating if inputs are valid URL or not

			/* foreach ($this->input->post() as $key => $value)
	        {
	        	if($key != 'hobbies')
	        	{
	           		 $this->form_validation->set_rules($key, 'Field', 'valid_url');
	        	}
	        }*/
            foreach ($this->input->post() as $key => $value)
	        {
            $optional_fields[] = $key;
				
				if(in_array($key,$optional_fields)){
					continue;
				}else{
					
					if(is_array($value)){
						foreach($value as $row_val){
							if(empty(trim($row_val))){
								$status = FALSE;
								$error[$key] = '<p>You must provide this Field.</p>';
							}
						}
					}
				    elseif(empty(trim($value))){
						
				        $status = FALSE;
				        $error[$key] = '<p>You must provide this Field.</p>';
				    }else{
						//do nothing
					}
                    
                    
				    /*$this->form_validation->set_rules($key, 'Field', 'trim|required',
    					   array('required' => 'You must provide this %s.')
    					);*/
				    
                    /*if(is_array($key)){
                        foreach ($key as $row => $value)
	                       {
	                           
	                           $this->form_validation->set_rules($key[$row], 'Field', 'trim|required',
            					   array('required' => 'You must provide this %s.')
            					);
	                       }
                    }else{
					
    					/*$this->form_validation->set_rules($key, 'Field', 'trim|required',
    					   array('required' => 'You must provide this %s.')
    					);
                    }*/
				}
				
			  
	        	
	        }
			
		}elseif($this->input->post('step')==8){
			
/* 			echo '<pre>';
			print_r($this->input->post());
			echo '<pre>';	
			exit(); */		
            
            
            	
			
 			foreach ($this->input->post() as $key => $value){
 			    $uppercase = preg_match('@[A-Z]@', $value);
                $lowercase = preg_match('@[a-z]@', $value);
                $number    = preg_match('@[0-9]@', $value);
                
                
				if($key == 'step'){
					continue;
				}
				
				if($value == ""){
					
					$status = FALSE;
					$error[$key] = '<p>You must provide this Field.</p>';
					
				}elseif($value ==  'not_matched'){
					$status = FALSE;
					$error[$key] = '<p>Password not matched.</p>';
				} elseif($key == "password" && $value != 'not_matched' && (!$uppercase || !$lowercase || !$number)){
				    $status = FALSE;
					$error[$key] = '<p>Can not set weak password.</p>';
				}
                
	        }
		
		}
		
	  if ($status == FALSE)
        {
            //$status= FALSE;
            // Loop through $_POST and get the keys
	        // foreach ($this->input->post() as $key => $value)
	        // {
	            // $errors[$key] = form_error($key);
	        // }
	        $response['errors'] = array_filter($error); // Some might be empty
	       
            $error['error_count'] = count($response['errors']);  

        }  
        else
        {
            
            if($this->input->post('step') == 4){
               
                $table_emp = DB_PREFIX.'user_companies';	
				$table_edu = DB_PREFIX.'user_edu';
                
                $countRec_emp = $this->Get_db->record_count_custom($table_emp,array('user_id'=> $this->uid));
                $countRec_edu = $this->Get_db->record_count_custom($table_edu,array('user_id'=> $this->uid));
                if($countRec_edu>0)
  	             {
            	 	$this->Get_db->deleteData($table_edu,array('user_id'=>$this->uid));  
            	 }
                 
                 if($countRec_emp>0)
            	 {
            	 	$this->Get_db->deleteData($table_emp,array('user_id'=>$this->uid));  
            	 }
        	 
                
                

        		$data_user['total_year_exp'] = $this->input->post('year_exp');
        		$data_user['no_companies'] =  $this->input->post('numb_comp');
        		$data_user['current_salary'] =  $this->input->post('base_salary');
        		$data_user['no_reportee'] =  $this->input->post('num_reportees');
        		$data_user['awards'] =  $this->input->post('award_received');
        		$data_user['journal'] =  $this->input->post('journals_published');
        		
        		$id = $this->Get_db->update_record(		
        									$data_user, 
        									DB_PREFIX.'users',// which table to save,, amazetal_user_role | other_user_role
        									'user_id', // where column is equal to 
        									$this->uid // where column value equal to
        								);
                
                
                /*EMPLOYMENT HISTORY*/
                

				
                $temp_arr = array();
        		foreach($this->input->post('company_matrix') as $key=>$val)
        		{   
        		  //if(isset($this->input->post('still_working')[$key]) && !empty($this->input->post('still_working')[$key])){
        		      //echo $this->input->post('still_working')[$key];
                     
        		  //}
                  //exit();
                  
                    $temp_arr[$key]['title'] = $this->input->post('textinput-title')[$key];
                    $temp_arr[$key]['starting_date'] = $this->input->post('emp_startmonth')[$key].", ".$this->input->post('emp_startyear')[$key];

                    $temp_arr[$key]['ending_date'] = $this->input->post('still_working')[$key] != "yes" ?  $this->input->post('emp_endmonth')[$key].", ".$this->input->post('emp_endyear')[$key]:NULL;
					
                    $temp_arr[$key]['still_working'] = $this->input->post('still_working')[$key] == "yes" ? '1':'0';
                    $temp_arr[$key]['work_desc'] = $this->input->post('emp_work')[$key];
                    $temp_arr[$key]['user_id'] = $this->uid;
                    
                    $this-> db->select('*');
            		$this->db->from('amazetal_companies');
                    $this->db->like('company_name', $this->input->post('company_matrix')[$key],'after');
            		
            		$matrix_query = $this->db->get();
            		$matrix_result = $matrix_query->result();
                    
                    if(!empty($matrix_result)) {
                    
                        $temp_arr[$key]['company_id'] = $matrix_result[0]->company_id;
                        $temp_arr[$key]['other_company_name'] = '';
                    
                    } else {
                       $temp_arr[$key]['company_id'] = NULL;
                       $temp_arr[$key]['other_company_name'] = $this->input->post('company_matrix')[$key]; 
                    }
                    
        		}
                
              
                /*EDUCATION HISTORY*/
				
				$allowed_edu = array('Bachelors','Masters','PHD');
                $temp_arr1 = array();
                $uni_score = 0;
        		foreach($this->input->post('universities') as $key=>$val)
        		{
        		  
                    $this->db->select('*');
            		$this->db->from('amazetal_universities');
                    $this->db->like('uni_name', $this->input->post('universities')[$key],'after');
            		
            		$university_query = $this->db->get();
            		$university_result = $university_query->result();
                    
                    if(!empty($university_result)) {
                        if($university_result[0]->uni_rank >= 1 && $university_result[0]->uni_rank <= 10){
        					$uni_score = 80;
        				}elseif($university_result[0]->uni_rank >= 11 && $university_result[0]->uni_rank <= 30){
        					$uni_score = 60;
        				}elseif($university_result[0]->uni_rank >= 31 && $university_result[0]->uni_rank <= 100){
        					$uni_score = 40;
        				}else{
        					$uni_score = 20;
        				}
                        
                        
                        $temp_arr1[$key]['uni_id'] = $university_result[0]->uni_id;
                        $temp_arr1[$key]['other_uni'] = '';
                        
                    }else{
                        $uni_score = 20;
                        $temp_arr1[$key]['uni_id'] = NULL;
                        $temp_arr1[$key]['other_uni'] = $this->input->post('universities')[$key];
                    }
        		  
                    /*if($this->input->post('universities')[$key]!='other'){
                		$this->db->select('*');
                		$this->db->from('amazetal_universities');
                		$this->db->where('uni_id',$this->input->post('universities')[$key]);
                		$qr =$this->db->get();
                		$result = $qr->result();
                        

                		if(!empty($result)){
                			foreach($result as $row){
                				if($row->uni_rank >= 1 && $row->uni_rank <= 10){
                					$uni_score = 80;
                				}elseif($row->uni_rank >= 11 && $row->uni_rank <= 30){
                					$uni_score = 60;
                				}elseif($row->uni_rank >= 31 && $row->uni_rank <= 100){
                					$uni_score = 40;
                				}else{
                					$uni_score = 20;
                				}
                			}
                		}
                    
                    } else {
                        $uni_score = 20;
                    }*/
                    //$temp_arr1[$key]['title'] = $this->input->post('textinput-title')[$key];
                    $temp_arr1[$key]['starting_date'] = $this->input->post('edu_startmonth')[$key].", ".$this->input->post('edu_startyear')[$key];
                    $temp_arr1[$key]['ending_date'] = $this->input->post('still_studying')[$key] != "yes" ? $this->input->post('edu_endmonth')[$key].", ".$this->input->post('edu_endyear')[$key]:NULL;
                    $temp_arr1[$key]['still_studying'] = $this->input->post('still_studying')[$key] == "yes" ? '1':'0';
                    $temp_arr1[$key]['major_courses'] = $this->input->post('major_courses')[$key];
                    $temp_arr1[$key]['user_id'] = $this->uid;
                    $temp_arr1[$key]['uni_score'] = $uni_score;
                    $temp_arr1[$key]['degree_id'] = in_array($this->input->post('edu_degree')[$key],$allowed_edu) ?  $this->input->post('edu_degree')[$key] : 'other' ;
                    $temp_arr1[$key]['other_degree'] = in_array($this->input->post('edu_degree')[$key],$allowed_edu) ?  '' : 'other' ;
        	
                }
                
                

                $id_edu_update = $this->Get_db->add_multiple_insert_record($table_edu,$temp_arr1);
                $id_emp_update = $this->Get_db->add_multiple_insert_record($table_emp,$temp_arr);
                
                 /*echo "<pre>";
                print_r($this->input->post());
                echo "</pre>";
                exit();*/
            //$profile_completion_step = $this->input->post('step');
			
			#check profile completion step in db
			$db_step = $this->Get_db->get_details_by_sinlge_column('profile_completion_step','amazetal_users',array('user_id'=>$this->uid));
            /*if($db_step[0]->profile_completion_step >= 100){
                $profile_completion_step = $this->input->post('step');
            } else {
                $profile_completion_step = 8;
            }
			if($db_step[0]->profile_completion_step > $profile_completion_step){
				$profile_completion_step = $db_step[0]->profile_completion_step;
			}*/
            $profile_completion_step = 8;
			
        	unset($_POST['step']);
			$profile_data = array();
			$profile_data['profile_completion_step'] = $profile_completion_step;
            
				//if($profile_completion_step == 8){
					$profile_data['profile_completion'] = 100;
                    
                    $profile_data['approval'] = 1;
				//}
            
            
            
	
	
		
		
		 
	
		//	 echo '<pre>
		 //';
		//	 print_r($profile_data);
		//	 echo '<pre>';
		//	 exit();
        	$id = $this->Get_db->update_record(		
									$profile_data, 
									DB_PREFIX.'users',// which table to save
									'user_id', // where column is equal to 
									$this->uid // where column value equal to
									);
                
                /*if(!$id_edu_update){
                    $error['singlebutton'] = '<span style="color:red;">education data not saved.</span>';
                }
                
                if(!$id_emp_update){
                    $error['singlebutton'] = '<span style="color:red;">employement data not saved.</span>';
                }*/
                
                
                
            } elseif($this->input->post('step') == '8'){
				$profile_completion_step = $this->input->post('step');
				
				#check profile completion step in db
				$db_step = $this->Get_db->get_details_by_sinlge_column('profile_completion_step','amazetal_users',array('user_id'=>$this->uid));
				if($db_step[0]->profile_completion_step > $profile_completion_step){
					$profile_completion_step = $db_step[0]->profile_completion_step;
				}
				
				unset($_POST['step']);
				if(isset($_POST['password'])){
					$_POST['password'] = md5($_POST['password']);
				}
				$profile_data = $_POST;
				$profile_data['profile_completion_step'] = $profile_completion_step;
				if($profile_data['profile_completion_step'] == 8){
					$profile_data['profile_completion'] = 100;
                    
                    $profile_data['approval'] = 1;
				}
				// echo '<pre>
			// ';
				// print_r($profile_data);
				// echo '<pre>';
				// exit();
				$id = $this->Get_db->update_record(		
					$profile_data, 
					DB_PREFIX.'users',// which table to save
					'user_id', // where column is equal to 
					$this->uid // where column value equal to
				);
			}else {
            
		
				//$profile_completion_step = $this->input->post('step');
				
				#check profile completion step in db
				$db_step = $this->Get_db->get_details_by_sinlge_column('profile_completion_step','amazetal_users',array('user_id'=>$this->uid));
                if($this->input->post('step') == 1 && $db_step[0]->profile_completion_step <= 2){
                    $profile_completion_step = 2;
                }elseif($this->input->post('step') == 5 && $db_step[0]->profile_completion_step <= 4){
                    $profile_completion_step = 4;
                } else {
                    $profile_completion_step = $this->input->post('step');
                }
				if($db_step[0]->profile_completion_step > $profile_completion_step){
					$profile_completion_step = $db_step[0]->profile_completion_step;
				}
				
				unset($_POST['step']);
				$profile_data = $_POST;
				$profile_data['profile_completion_step'] = $profile_completion_step;
				if($profile_data['profile_completion_step'] == 8){
					$profile_data['profile_completion'] = 100;
                    
                    $profile_data['approval'] = 1;
				}
				// echo '<pre>
			// ';
				// print_r($profile_data);
				// echo '<pre>';
				// exit();
				$id = $this->Get_db->update_record(		
					$profile_data, 
					DB_PREFIX.'users',// which table to save
					'user_id', // where column is equal to 
					$this->uid // where column value equal to
				);
            }
        }
        echo json_encode(array("status" => $status,"Error_Mess" => $error,'Posted_data'=>$this->input->post()));		
		die();
	}

	function update_role_skills()
	{
		if(isset($_POST['undefined']))unset($_POST['undefined']);
		$status = true;
		$errors = array();
		$inserted_data = array();
		$inserted_skill = array();
		$table = '';
		$id = '';

				$inserted_skill['skill_name'] = $this->input->post('other-skill-text');
				$inserted_skill['skill_id'] = $this->input->post('skill');
				$inserted_skill['skill_exp'] = $this->input->post('skill_exp');
				$inserted_skill['skill_expertise'] = $this->input->post('skill_expertise');
			
				$temp = array();
				foreach($arr['name'] as $key=>$val)
				{
					$temp[$key][] = $this->input->post('other-skill-text')[$key];
					$temp[$key][] = $this->input->post('skill')[$key];
					$temp[$key][] = $this->input->post('skill_exp')[$key];
					$temp[$key][] =  $this->input->post('skill_expertise')[$key];
					$temp[$key][] = $this->uid;
				}
		
	//add_multiple_insert_record($to,$data) // $to , $data
		
	 echo json_encode($temp);		
		die();

	//	$this->form_validation->set_error_delimiters('<span style="color:red;">', '</span>');
	//	if($this->input->post('step') == 3)
	//	{
	       /* $this->form_validation->set_rules('fullname', 'Full Name', 'trim|required',
	            array('required' => 'You must provide a %s.')
	        );	      
	        $this->form_validation->set_rules('phone', 'phone', 'trim|required',
	            array('required' => 'You must provide a %s.','regex_match'=>'Number must be US format.')
	        );
	        $this->form_validation->set_rules('place', 'Location', 'trim |required',
	            array('required' => 'You must provide a %s.')
	        ); */

	//	}
		/*elseif($this->input->post('step')==2)
		{
			 foreach ($this->input->post() as $key => $value)
	        {
	        	 $this->form_validation->set_rules($key, 'Field', 'trim|required',
	         	   array('required' => 'You must provide this %s.')
	     	   );
	        }
		}*/

	/*  if (true) //$this->form_validation->run() == FALSE
        {
            $status= FALSE;
            // Loop through $_POST and get the keys
	        foreach ($this->input->post() as $key => $value)
	        {
	            $errors[$key] = form_error($key);
	        }
	        $response['errors'] = array_filter($errors); // Some might be empty
	       
            $errors['error_count'] = count($response['errors']);  

        }  
        else
        {*/
        	unset($_POST['step']);
        	
				$table = DB_PREFIX.'user_role';	
				$table_skill = DB_PREFIX.'user_skill';	
				$temp = array_filter($this->input->post('other_role_name'));
						
        		$inserted_data['role_exp'] = $this->input->post('role_exp');
				$inserted_data['role_id'] = $this->input->post('role_id'); 

		
				$inserted_data['role_name'] = (empty($temp))?'':(isset($temp[0]))?$temp[0]:$temp[1];       	
				$inserted_data['area_id'] = $this->input->post('area_id');
				
							
				$inserted_data['user_id'] = $this->uid;

				$inserted_skill['user_id'] = $this->uid;
				$inserted_skill['skill_name'] = $this->uid;
				$inserted_skill['skill_exp'] = $this->uid;
				$inserted_skill['skill_expertise'] = $this->uid;
				$inserted_skill['skill_id'] = $this->uid;

        	/*$id = $this->Get_db->update_record(		
										$inserted_data, 
										$table,// which table to save,, amazetal_user_role | other_user_role
										'user_id', // where column is equal to 
										$this->uid // where column value equal to
									);*/
        	 $countRec = $this->Get_db->record_count_custom($table,array('user_id'=> $this->uid));
        	 $countRec_skill = $this->Get_db->record_count_custom($table_skill,array('user_id'=> $this->uid));
        	 if($countRec<1)
        	 {
        	 	$id = $this->Get_db->add_insert_record($table,$inserted_data);        	 	
        	 }else{
        	 	$id = $this->Get_db->update_record(		
										$inserted_data, 
										$table,// which table to save,, amazetal_user_role | other_user_role
										'user_id', // where column is equal to 
										$this->uid // where column value equal to
									);

        	 }

			 if($countRec_skill<1)
        	 {
        	 	$id = $this->Get_db->add_insert_record($table_skill,$inserted_data);        	 	
        	 }else{
        	 	$id = $this->Get_db->update_record(		
										$inserted_data, 
										$table_skill,// which table to save,, amazetal_user_role | other_user_role
										'user_id', // where column is equal to 
										$this->uid // where column value equal to
									);

        	 }

        	 //($db_name,$where_array)  
										 // which table to save,, amazetal_user_role | other_user_role
								

      //  }
        echo json_encode(array("status" => $status,"Error_Mess" => $errors,"data" => $_POST,'res'=>$id,'interested_area'=>$inserted_data));		
		die();
	}

	function Save_body()
	{
			echo "<pre>";	
			$dataString = $_POST['data'];
			print_r($dataString);
			echo "</pre>";
			$dataString['element_t_save'] = trim(str_replace('<a id="save_text" contenteditable="false"> Update</a>' , "" ,$dataString['element_t_save']));
			$where_array = array('Cms_Content_Meta' => str_replace('contenteditable="true"' , "" ,$dataString['element_t_save']));
			$id = $this->Get_db->update_record($where_array,'cms_content','Cms_Content_key',$dataString['save_to']);
	}
	// function Candidiate_register()
 //    {		
 //        $this->load->view('Home_header', @$data);
 //        $this->load->view('view_signup', @$data);
 //        // $this->load->view('view_help', @$data);
 //        $this->load->view('Home_footer', @$data);
 //    }
	function About_us()
    {	
		$data = $this->html_content();
		$data['db_table']= $this->Get_db->get_details_all('static_about_us');
		if(isset($this->session->userdata('logged_in')['user_id']) && $this->session->userdata('logged_in')['user_role'] == "employer")
        {
            $data['carousel_data'] = $this->Get_db->get_details_by_multiple_column('cms_carousel',array('for'=>'employers'))[0];
        }
        elseif(isset($this->session->userdata('logged_in')['user_id']) && $this->session->userdata('logged_in')['user_role'] == "career_experts")
        {
            $data['carousel_data'] = $this->Get_db->get_details_by_multiple_column('cms_carousel',array('for'=>'experts'))[0];
        }
        else
        {
		  $data['carousel_data'] = $this->Get_db->get_details_by_multiple_column('cms_carousel',array('for'=>'candidates'))[0];
        }
        $data['pageTitle'] = $data['db_table'][0]->meta_title;
        $data['pageDesc'] = $data['db_table'][0]->meta_desc;
        $data['noFollow'] = $data['db_table'][0]->noFollow;
        $data['noIndex'] = $data['db_table'][0]->noIndex;
        
        $this->load->view('Home_header', @$data);
        $this->load->view('view_about_us', @$data);
        $this->load->view('carousel_company_helped', @$data);
        $this->load->view('Home_footer', @$data);
    }
    
    function validate_videocode($val)
	{
	   
       $where_array = "(tm1_email LIKE '%{$email}%' OR tm2_email LIKE '%{$email}%' OR hm_email LIKE '%{$email}%')";
        $this->db->select('*');
        $this->db->from('amazetal_job');
        //$this->db->where($where_array);
        $this->db->where("video_code",$val);
        $query = $this->db->get();
        $query_result = $query->result();
        if(!empty($query_result)){
	       return true;
        }
        else{
	    //$this->form_validation->set_message('coupon_question', 'Please read and accept our terms and conditions.');
	    return false;
        }
	}
    
    function post_job_video($job_unique_id = null,$email = null){
        
        
        
        
        if(!empty($job_unique_id) && !empty($email)){
            $email = urldecode($email);
        $data = $this->html_content();
        
        $this->db->select('*');
        $this->db->from('amazetal_job');
        $this->db->where("job_unique_id",$job_unique_id);
        //$this->db->where("status !=",NULL);
        $jobquery3 = $this->db->get();
        $jobquery_result3 = $jobquery3->result();
        
        if(!empty($jobquery_result3)){
            if(!empty($jobquery_result3[0]->status)){
                $data['job_ava'] = "no";
            } else {
                $data['job_ava'] = "yes";
            }
        } else {
            $data['job_ava'] = "no";
        }
        $video_code = $this->input->post("videocode");
        
        $this->form_validation->set_rules('videocode', 'Video Code', 'required|callback_validate_videocode',
                array('required' => 'You must provide %s.',
                'validate_videocode' => 'Invalid %s.')
            );
        
            //if(isset($video_code) && !empty($video_code)){
        //if ($this->form_validation->run() == FALSE && !$this->input->post('video_upload')){
            if ($this->form_validation->run() == FALSE){
                $data['pageTitle'] = "Upload video";
                $this->load->view('Home_header', @$data);
                $this->load->view('view_job_videocode', @$data);
                $this->load->view('Home_footer', @$data);
                
            } else {
                $where_array = "(tm1_email LIKE '%{$email}%' OR tm2_email LIKE '%{$email}%' OR hm_email LIKE '%{$email}%')";
                $this->db->select('*');
                $this->db->from('amazetal_job');
                $this->db->where($where_array);
                $this->db->where("video_code",$video_code);
                $query = $this->db->get();
                $query_result = $query->result();
                if(!empty($query_result)){
                    
                    $data['job_unique_id'] = $job_unique_id;
                    $data['uploader_email'] = $email;
                    
                    $where_array = "(tm1_email LIKE '%{$email}%')";
                    $this->db->select('*');
                    $this->db->from('amazetal_job');
                    $this->db->where($where_array);
                    $this->db->where("video_code",$video_code);
                    $query1 = $this->db->get();
                    $query_result1 = $query1->result();
                    
                    if(!empty($query_result1)){
                        $data['uploader_role'] = "tm1";
                    }
                    
                    $where_array = "(tm2_email LIKE '%{$email}%')";
                    $this->db->select('*');
                    $this->db->from('amazetal_job');
                    $this->db->where($where_array);
                    $this->db->where("video_code",$video_code);
                    $query2 = $this->db->get();
                    $query_result2 = $query2->result();
                    
                    if(!empty($query_result2)){
                        $data['uploader_role'] = "tm2";
                    }
                    
                    
                    
                    $where_array = "(hm_email LIKE '%{$email}%')";
                    $this->db->select('*');
                    $this->db->from('amazetal_job');
                    $this->db->where($where_array);
                    $this->db->where("video_code",$video_code);
                    $query3 = $this->db->get();
                    $query_result3 = $query3->result();
                    
                    if(!empty($query_result3)){
                        $data['uploader_role'] = "hm";
                    }
                    
                    
                    /*if ($this->input->post('video_upload')) {
                        //set preferences
                        //file upload destination
                        $upload_path = './upload/jobvideo/';
                        $config['upload_path'] = $upload_path;
                        //allowed file types. * means all types
                        $config['allowed_types'] = 'wmv|mp4|avi|mov';
                        //allowed max file size. 0 means unlimited file size
                        $config['max_size'] = '0';
                        //max file name size
                        $config['max_filename'] = '255';
                        //whether file name should be encrypted or not
                        $config['encrypt_name'] = FALSE;
                        
                        //$config['file_name'] = random_string('alnum', 16);
                        //store video info once uploaded
                        $video_data = array();
                        //check for errors
                        $is_file_error = FALSE;
                        //check if file was selected for upload
                        if (!$_FILES) {
                            $is_file_error = TRUE;
                            $this->handle_error('Select a video file.');
                        }
                        //if file was selected then proceed to upload
                        if (!$is_file_error) {
                            //load the preferences
                            $this->load->library('upload', $config);
                            //check file successfully uploaded. 'video_name' is the name of the input
                            if (!$this->upload->do_upload('video_name')) {
                                //if file upload failed then catch the errors
                                $this->handle_error($this->upload->display_errors());
                                $is_file_error = TRUE;
                            } else {
                                //store the video file info
                                $video_data = $this->upload->data();
                            }
                        }
                        // There were errors, we have to delete the uploaded video
                        if ($is_file_error) {
                            if ($video_data) {
                                $file = $upload_path . $video_data['file_name'];
                                if (file_exists($file)) {
                                    unlink($file);
                                }
                            }
                        } else {
                            $data['video_name'] = $video_data['file_name'];
                            $data['video_path'] = $upload_path;
                            $data['video_type'] = $video_data['file_type'];
                            $this->handle_success('Video was successfully uploaded to direcoty <strong>' . $upload_path . '</strong>.');
                            
                            $to_inset_data = array();
                            $to_inset_data['video'] = $upload_path.$video_data['file_name'];
                            $to_inset_data['job_unique_id'] = $job_unique_id;
                            $to_inset_data['uploader'] = $email;
                            $this->db->insert('amazetal_job_videos', $data);
                        }
                    }*/
                    //load the error and success messages
                    //$data['errors'] = $this->error;
                    //$data['success'] = $this->success;
                    
                    
                    
                    
                    
                    $data['pageTitle'] = "Upload video";
                    $this->load->view('Home_header', @$data);
                    $this->load->view('view_job_video', @$data);
                    $this->load->view('Home_footer', @$data);
                } else {
                   $data['pageTitle'] = "404 Not Found";
            		$this->load->view('404_header',@$data);
                    $this->load->view('404');
                    $this->load->view('Home_footer', @$data); 
                }
                
            }
        
        
        
        
        } else {
            $data['pageTitle'] = "404 Not Found";
    		$this->load->view('404_header',@$data);
            $this->load->view('404');
            $this->load->view('Home_footer', @$data);
        }
    }
    
    
    function job_detail($job_unique_id = null)
    {	
		$data = $this->html_content();
        $jobdata = array();
        
        if(!empty($job_unique_id)){
            $where_array = "job_unique_id ='{$job_unique_id}' OR slug = '{$job_unique_id}'";
            $jobdata = $this->Get_db->get_details_by_multiple_column('amazetal_job',$where_array);
             
        }
        
        if(!empty($jobdata)){
            $job_unique_id = $jobdata[0]->job_unique_id;

        $check_save = $this->Get_db->get_details_by_multiple_column('amazetal_favourite_job',array('user_id' =>$this->uid,'job_unique_id'=>$jobdata[0]->job_unique_id));
         if(!empty($check_save)){
            $data['saved_job'] = "yes";
         }else {
            $data['saved_job'] = "no";
         }
        $companydata = $this->Get_db->get_details_by_multiple_column('amazetal_users',array('user_id'=>$jobdata[0]->emp_id));    
        $data['jobdata'] = $jobdata[0];
        $data['companydata'] = $companydata[0];
        
        $glassdoor = (file_get_contents("http://api.glassdoor.com/api/api.htm?t.p=191531&t.k=dEBGsoWSb1a&userip=0.0.0.0&useragent=&format=json&v=1&action=employers&q=".urlencode($companydata[0]->company_id)));
        
        $data['glassdoor'] = json_decode($glassdoor);
        
        $data['benifits'] = array(
			1 => 'Health Insurance',
			2 => 'Retirement',
			3 => 'Paid Vacations',
			//4 => 'Vacations',
            4 => 'Tuition Reimbursements',
            5 => 'Life Insurance',
            6 => 'Family and Parenting',
            7 => 'Career Development',
            8 => 'Corporate Discounts',
            9 => 'Wellness',
            10 => 'Financial Plans'
		      );
		
        $data['pageTitle'] = $jobdata[0]->job_title;
        $data['pageDesc'] = "";
        $data['noFollow'] = 1;
        $data['noIndex'] = 1;
        
        
        $increase_views = $jobdata[0]->views+1;
        $data_to_update = array('views'=>$increase_views);
		//$id = $this->Get_db->update_record($where_array,'amazetal_job','Cms_Content_key',$dataString['save_to']);
        
        $id = $this->Get_db->update_record(		
					$data_to_update, 
					'amazetal_job',// which table to save
					'job_unique_id', // where column is equal to 
					$job_unique_id // where column value equal to
				);
        
        /*if($data['user_info']->role == "candidates"){
            
        }*/
        $data['candApplied'] = 0;
        $check_apply = $this->Get_db->get_details_by_multiple_column('amazetal_job_applied',array('job_id'=>$job_unique_id, 'candidate_id' => $this->uid));
        if(!empty($check_apply)){  
            $data['candApplied'] = 1;
            //$this->db->insert('amazetal_job_applied', $this->input->post());
            //$insert = $this->db->insert_id();
        }
        
        
        $this->load->view('Home_header', @$data);
        $this->load->view('view_job_detail', @$data);
        $this->load->view('Home_footer', @$data);
        
        } else {
            $data['pageTitle'] = "404 Not Found";
    		$this->load->view('404_header',@$data);
            $this->load->view('404');
            $this->load->view('Home_footer', @$data);
        }
    }
    
    
    function job_search_filter()
    {	
		$status =TRUE;
        $errors = array();
        $errors['error_count'] = 0;
        
        $keyword=$this->input->post('keyword');
        $location = $this->input->post('location');
        $salrange = $this->input->post('salary_range');
        $jobtype = $this->input->post('jobtype');
        $sponsorship = $this->input->post('sponsorship');
        $relocate = $this->input->post('relocate');
        $bonus = $this->input->post('bonus');
        $exp_level = $this->input->post('exp_level');
        
        
        
        if(isset($keyword) && !empty($keyword))
        {
            $keyword_array = "(amazetal_job.job_desc LIKE '%{$keyword}%' OR amazetal_job.job_title LIKE '%{$keyword}%' OR amazetal_job.required_skills LIKE '%{$keyword}%')";
        }
        
        
        if(isset($location) && !empty($location))
        {
            $location_array = "(amazetal_job.job_location LIKE '%{$location}%')";
        }
        
        
        
        if(isset($salrange) && !empty($salrange))
        {
            $salrange_array = "(amazetal_job.salary_range LIKE '%{$salrange}%')";
        }
        
        if(isset($jobtype) && !empty($jobtype))
        {
            $jobtype_array = "(amazetal_job.job_type LIKE '%{$jobtype}%')";
        }
        
        
        if(isset($sponsorship) && (!empty($sponsorship)) || $sponsorship == "0")
        {
            
            
            $sponsorship_array = "(amazetal_job.is_sponsorship LIKE '%{$sponsorship}%')";
        }
        
        if(isset($relocate) && (!empty($relocate)) || $relocate == "0")
        {
            $relocate_array = "(amazetal_job.is_relocate LIKE '%{$relocate}%')";
        }
        
        
        if(isset($bonus) && (!empty($bonus) || $bonus == "0"))
        {
            $bonus_array = "(amazetal_job.bonus LIKE '%{$bonus}%')";
        }
        
        
        if(isset($exp_level) && !empty($exp_level))
        {
            $exp_level_array = "(amazetal_job.exp_level LIKE '%{$exp_level}%')";
        }
        
        
        
        
        $this->db->select('amazetal_job.*,amazetal_users.company_id');
        $this->db->from('amazetal_job');
        $this->db->join('amazetal_users', 'amazetal_job.emp_id = amazetal_users.user_id','inner');
        $this->db->where('amazetal_job.status',1);
        
        
        
        if(isset($jobtype) && !empty($jobtype))
        {
            $this->db->where($jobtype_array);
        }
        
        if(isset($salrange) && !empty($salrange))
        {
            $this->db->where($salrange_array);
        }
        
        
        if(isset($keyword) && !empty($keyword))
        {
            $this->db->where($keyword_array);
        }
        
        
        if(isset($location) && !empty($location)){
            $this->db->where($location_array);
        }
        
        
        if(isset($sponsorship) && $sponsorship == "undefined")
        {
            //$this->db->where($sponsorship_array);
        }
        elseif(isset($sponsorship) && (!empty($sponsorship)) || $sponsorship == "0")
        {
            $this->db->where($sponsorship_array);
        }
        
        if(isset($relocate) && $relocate == "undefined")
        {
            //$this->db->where($relocate_array);
        }
        elseif(isset($relocate) && (!empty($relocate)) || $relocate == "0")
        {
            $this->db->where($relocate_array);
        }
        
        
        if(isset($bonus) && $bonus == "undefined")
        {
            //$this->db->where($bonus_array);
        }
        elseif(isset($bonus) && (!empty($bonus)) || $bonus == "0")
        {
            $this->db->where($bonus_array);
        }
        
        
        if(isset($exp_level) && !empty($exp_level))
        {
            $this->db->where($exp_level_array);
        }
        
        
        
        $this->db->order_by("date_modified", "desc");
        $query = $this->db->get();
        $query_result = $query->result();
        
        if(empty($query_result)){
        $data_html = '<li class="box featured"></p>No job found related to your search</p></li>';
        }else{
        $data_html = '';
        
        foreach($query_result as $job){
        $data_html .= '<li class="box featured">
            <div class="autohide pull-right" style="margin-top:2px;">
                    <a target="_blank" href="'.base_url().'home/job_detail/'.$job->job_unique_id.'" rel="nofollow" class="btn btn-primary btn-empty btn-xs">View</a>
                
            </div>
            <h3 class="mt5 mb5">
                <a target="_blank" href="'. base_url().'home/job_detail/'.$job->job_unique_id.'" title="'. $job->job_title.'">'. $job->job_title.'</a>
            </h3>

            <ul class="list-unstyled list-columns sm row pb5">
                <li class="col-md-3 col-sm-6 col-xs-6 evay">
                    <div class="text-muted jobtypein">Job Type</div>
                    '. $job->job_type.'
                </li>
                <li class="col-md-3 col-sm-6 col-xs-6 evay">
                    <div class="text-muted jobopenin">No. Job Openings</div>
                    '. $job->job_openings.'
                </li>
                <li class="col-md-3 col-sm-6 col-xs-6 evay">
                    <div class="text-muted jobexpin">Experience Level</div>
                        '. $job->exp_level.'
                </li>
                <li class="col-md-3 col-sm-6 col-xs-6 last evay">
                    <div class="text-muted jobsalaryin">Salary</div>
                    '. $job->salary_range.'
                </li>
            </ul>
            <div class="mt10 mb10 text-sm-sm">
                    <!--<img src="/assets/images/logoinnpic.jpg" width="50" title="" alt="" class="pull-right mt5 ml10">-->
                    <p>'. substr($job->job_desc, 0, 200).'</p>
            </div>
            <div class="row text-sm">
                <div class="col-md-9 col-sm-9 col-xs-8 text-success">
                    <div class="localin">
            <span class="fa fa-map-marker"></span>                    
            '. $job->job_location.'
            </div>

             <div class="companyname">
             <a style="color: #468847;" href="'. $this->custom_functions->checkHttpUrl($job->website).'"><i class="fa fa-link" aria-hidden="true"></i> '. $job->company_id.'</a>
            </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-4 text-right text-muted datedin">Posted on '. date("M d Y", strtotime($job->date_modified)).'</div>
            </div>
        </li>';
       } 
     } 
     
     
     echo json_encode(array("status" => $status,"Error_Mess" => $errors,"result_html"=>$data_html,'keys'=>$this->input->post()));
    }
    
    function job_search()
    {	
		$data = $this->html_content();
		
        $data['pageTitle'] = "Search Job";
        $data['pageDesc'] = "";
        $data['noFollow'] = 1;
        $data['noIndex'] = 1;
        
        $keyword=$this->input->post('keyword');
        $location = $this->input->post('location');
        $exprange = $this->input->post('exprange');
        $salrange = $this->input->post('salary_range');
        $jobtype = $this->input->post('jobtype');
        $sponsorship = $this->input->post('sponsorship');
        $relocate = $this->input->post('relocate');
        $bonus = $this->input->post('bonus');
        $exp_level = $this->input->post('exp_level');
        
        
        
        if(isset($keyword) && !empty($keyword))
        {
            $keyword_array = "(job_desc LIKE '%{$keyword}%' OR job_title LIKE '%{$keyword}%' OR required_skills LIKE '%{$keyword}%')";
        }
        
        
        if(isset($location) && !empty($location))
        {
            $location_array = "(job_location LIKE '%{$location}%')";
        }
        
        
        
        if(isset($salrange) && !empty($salrange))
        {
            $salrange_array = "(salary_range LIKE '%{$salrange}%')";
        }
        
        if(isset($jobtype) && !empty($jobtype))
        {
            $jobtype_array = "(job_type LIKE '%{$jobtype}%')";
        }
        
        
        if(isset($sponsorship) && (!empty($sponsorship)) || $sponsorship == "0")
        {
            
            
            $sponsorship_array = "(is_sponsorship LIKE '%{$sponsorship}%')";
        }
        
        if(isset($relocate) && (!empty($relocate)) || $relocate == "0")
        {
            $relocate_array = "(is_relocate LIKE '%{$relocate}%')";
        }
        
        
        if(isset($bonus) && (!empty($bonus) || $bonus == "0"))
        {
            $bonus_array = "(bonus LIKE '%{$bonus}%')";
        }
        
        
        if(isset($exp_level) && !empty($exp_level))
        {
            $exp_level_array = "(exp_level LIKE '%{$exp_level}%')";
        }
        
        
        
        
        
        
        
        
        
        //$candidates_array[]
        
        $this->db->select('amazetal_job.*,amazetal_users.company_id');
        $this->db->from('amazetal_job');
        $this->db->join('amazetal_users', 'amazetal_job.emp_id = amazetal_users.user_id','inner');
        $this->db->where('amazetal_job.status',1);
        
        
        if(isset($jobtype) && !empty($jobtype))
        {
            $this->db->where($jobtype_array);
        }
        
        if(isset($salrange) && !empty($salrange))
        {
            $this->db->where($salrange_array);
        }
        
        
        if(isset($keyword) && !empty($keyword))
        {
            $this->db->where($keyword_array);
        }
        
        
        if(isset($location) && !empty($location)){
            $this->db->where($location_array);
        }
        
        if(isset($sponsorship) && (!empty($sponsorship)) || $sponsorship == "0")
        {
            $this->db->where($sponsorship_array);
        }
        
        if(isset($relocate) && (!empty($relocate)) || $relocate == "0")
        {
            $this->db->where($relocate_array);
        }
        
        
        if(isset($bonus) && (!empty($bonus)) || $bonus == "0")
        {
            $this->db->where($bonus_array);
        }
        
        
        
        if(isset($exp_level) && !empty($exp_level))
        {
            $this->db->where($exp_level_array);
        }
        
        
        
        $this->db->order_by("date_modified", "desc");
        $query = $this->db->get();
        $query_result = $query->result();
        
        $data['query'] = $this->db->last_query();
                
        $data['all_jobs'] = $query_result;
        
        $this->load->view('Home_header', @$data);
        $this->load->view('view_job_search', @$data);
        $this->load->view('Home_footer', @$data);
    }

	function Profile_completion()
    {	
        
	
		// print_r($this->session->userdata('logged_in'));
		 if ($this->session->userdata('logged_in')['session_status']) {
			$data = $this->html_content();
		
        if($data['user_info']->role != 'candidates'){
            if($data['user_info']->role == "1" || $data['user_info']->role == "2") {
    			 redirect('/');
    		 }
            
    		if($data['user_info']->role == "career_experts"){
    			redirect('/expert-profile-completion', 'refresh');						 		
    		}
            
            if($data['user_info']->role == "employer"){
    			redirect('/employer-profile-completion', 'refresh');						 		
    		}
        
        }
			
			
	// echo "<pre>";
	// print_r($data['user_info']->role);
	// echo "</pre>";

		 
			
			/*
            #GET PENDING INTERVIEW
    		$qr_pending_interview = $this->Candidate_model->pendingInvite();
    		$data['dashboard']['pending_interview'] = !empty($qr_pending_interview) ? count($qr_pending_interview) : '0';
    		
    		#GET ACCEPTED INTERVIEW
    		$qr_accepted_interview = $this->Candidate_model->acceptedInvite();
    		$data['dashboard']['accepted_interview'] = !empty($qr_accepted_interview) ? count($qr_accepted_interview) : '0';
    		
    		#PENDING JOBS OFFER
    		$qr_pending_job_offer = $this->Candidate_model->pendingJobOffer();
    		$data['dashboard']['pending_job_offer'] = !empty($qr_pending_job_offer) ? count($qr_pending_job_offer) : '0';
    		
    		#PENDING JOBS OFFER
    		$qr_accepted_job_offer = $this->Candidate_model->acceptedJobOffer();
    		$data['dashboard']['accepted_job_offer'] = !empty($qr_accepted_job_offer) ? count($qr_accepted_job_offer) : '0';
    		$data['dashboard']['suggested_expert'] = $this->Get_db->filterd_experts(@$this->session->userdata('logged_in')['user_id']);
    		#TOTAL APPLIED JOBS
    		$qr_applied_job = $this->Get_db->get_details_by_sinlge_column('applied_id','amazetal_applied_jobs',array('user_id'=> $this->uid));
    		$data['dashboard']['total_applied_jobs'] = !empty($qr_applied_job) ? count($qr_applied_job) : '0';
            */			 
			#GET BASIC INFO
			$data['interested_area'] = $this->Get_db->get_details_all(DB_PREFIX.'interested_area');
			//$data['skill'] = $this->Get_db->get_details_all(DB_PREFIX.'skill');
			//$data['company_matrix'] = $this->Get_db->get_details_all(DB_PREFIX.'companies');
			//$data['universities'] = $this->Get_db->get_details_all(DB_PREFIX.'universities');
			$data['user_prefer_roles'] = $this->Get_db->get_details_by_column_all('amazetal_user_role','user_id',$this->uid);
            $data['user_skills'] = $this->Get_db->get_details_by_column_all('amazetal_user_skill','user_id',$this->uid);
			$data['prefer_roles'] = $this->Get_db->get_group_concat();
		//	$data['get_location_matrix_join'] = $this->Get_db->get_location_matrix_join();
			$data['get_location_matrix_join'] = $this->Candidate_model->getLocationDetail();
			// $data['get_location_matrix_join'] =$this->Get_db->get_details_all(DB_PREFIX.'location_matrix');
			$data['step'] = $this->Get_db->get_details_by_sinlge_column('profile_completion_step','amazetal_users',array('user_id'=>$this->uid));
            
            $data['pageTitle'] = "Profile Completion";
            $data['user_agent'] = $this->getBrowser();
            if($data['user_info']->profile_completion >= 100){
              $this->load->view('view_candidate_profile_completion_header', @$data);  
              $this->load->view('view_candidate_profile_completion', @$data);  
            }
            else{
                $this->load->view('view_candidate_create_profile_completion_header', @$data);
                $this->load->view('view_candidate_create_profile_completion', @$data);    
            }
			
			//
			$this->load->view('Home_footer', @$data);
		 } else {
			 redirect('sign-in');
		 }
		
		
    }
    
    
    /*function location_test(){
        echo "<pre>";
        print_r($this->Candidate_model->getLocationDetail()) ;
        echo "</pre>";
    }
    
    function save_file_states(){
        $responses = (file_get_contents(base_url().'home/location_test'));
        
        $response = json_encode($responses);
        
        print_r($response);
        
        $fp = fopen('amazetal_states.json', 'w');
            fwrite($fp, $response);
            fclose($fp);
            
            
    }*/
    
    
    
    function getLocationDetailByState()
    {
        $data = array();
        $state_id = $this->input->post('state_id');
        $data = $this->Candidate_model->getLocationDetailByState($state_id);
        
        $output = '';//'<select name="location_id" id="" class="selectpicker update-5 required_custom"  data-live-search="true" title="Please select a state first">';
        foreach($data as $cities){
            $output .='<option value="'.$cities->city_id.'">'.$cities->city_name.'</option>';
        }
        //$output .='</select>';
        //$result = json_encode($data);
        echo $output;
    }
    
    
	function view_expert_profile_completion()
    {	
	
		// print_r($this->session->userdata('logged_in'));
		 if ($this->session->userdata('logged_in')['session_status']) {
			$data = $this->html_content();
		
			     if($data['user_info']->role == "1" || $data['user_info']->role == "2") {
        			 redirect('/');
        		 }
				if($data['user_info']->role == "candidates"){
					redirect('/candidate-profile-completion', 'refresh');						 		
				}
				if($data['user_info']->role == "employer" || $data['user_info']->role == "recruiter"){
					redirect('/employer-profile-completion', 'refresh');						 		
				}
			
			#GET BASIC INFO
			$data['interested_area'] = $this->Get_db->get_details_all(DB_PREFIX.'interested_area');
			$data['amazetal_role'] = $this->Get_db->get_details_all('amazetal_role');
			usort($data['amazetal_role'], function($a, $b)
			{
				return strcmp($a->role_name, $b->role_name);
			});
				  	/* echo "<pre>";
						print_r($data['amazetal_role']); 
						
					echo "</pre>";  */
				
			//($from,$other_table,$another_table,$from_field,$other_table_field,$another_table_field)
			//$data['user_role'] = $this->Get_db->many_to_many_inner_join('amazetal_role'); 
			
			$data['skill'] = $this->Get_db->get_details_all(DB_PREFIX.'skill');
			$data['company_matrix'] = $this->Get_db->get_details_all(DB_PREFIX.'companies');
			
			
			
			$data['universities'] = $this->Get_db->get_details_all(DB_PREFIX.'universities');
            $data['step'] = $this->Get_db->get_details_by_sinlge_column('profile_completion_step','amazetal_users',array('user_id'=>$this->uid));
			// echo "<pre>";
				// print_r($data['universities']);
			// echo "</pre>";
			//$data['prefer_roles'] = $this->Get_db->get_details_all_order_by('prefer_roles','faculty_id','ASC');
			$data['prefer_roles'] = $this->Get_db->get_group_concat();
            
            $data['pageTitle'] = "Profile Completion";
			$data['user_agent'] = $this->getBrowser();
            
			$this->load->view('view_expert_profile_completion_header', @$data);
			$this->load->view('view_expert_profile_completion', @$data);
			$this->load->view('Home_footer', @$data);
		 } else {
			 redirect('sign-in');
		 }
		
		
    }
	function view_employer_profile_completion()
    {	
	
		// print_r($this->session->userdata('logged_in'));
		 if ($this->session->userdata('logged_in')['session_status']) {
		  $uid = $this->session->userdata('logged_in')['user_id'];
			$data = $this->html_content();
            
            $where = array('user_id',$uid);
            
            $data['benifits'] = array(
			1 => 'Health Insurance',
			2 => 'Retirement',
			3 => 'Paid Vacations',
            4 => 'Tuition Reimbursements',
            5 => 'Life Insurance',
            6 => 'Family and Parenting',
            7 => 'Career Development',
            8 => 'Corporate Discounts',
            9 => 'Wellness',
            10 => 'Financial Plans'
		      );
            
            
		

	// echo "<pre>";
	// print_r($data['user_info']);
	// echo "</pre>";

		
			             if($data['user_info']->role == "1" || $data['user_info']->role == "2") {
                			 redirect('/');
                		 }
						if($data['user_info']->role == "candidates"){
							redirect('/candidate-profile-completion', 'refresh');						 		
						}
						if($data['user_info']->role == "expert"){
							redirect('/expert-profile-completion', 'refresh');						 		
						}
                        
                        
                        
                        
			
			#GET BASIC INFO
			$data['interested_area'] = $this->Get_db->get_details_all(DB_PREFIX.'interested_area');
			$data['skill'] = $this->Get_db->get_details_all(DB_PREFIX.'skill');
			$data['company_matrix'] = $this->Get_db->get_details_all(DB_PREFIX.'companies');
			$data['universities'] = $this->Get_db->get_details_all(DB_PREFIX.'universities');
			//$data['prefer_roles'] = $this->Get_db->get_details_all_order_by('prefer_roles','faculty_id','ASC');
			$data['prefer_roles'] = $this->Get_db->get_group_concat();
			
            $data['pageTitle'] = "Profile Completion";
            $data['user_agent'] = $this->getBrowser();
            $data['step'] = $this->Get_db->get_details_by_sinlge_column('profile_completion_step','amazetal_users',array('user_id'=>$this->uid));
            
			$this->load->view('view_employer_profile_completion_header', @$data);
			$this->load->view('view_employer_profile_completion', @$data);
			$this->load->view('Home_footer', @$data);
		 } else {
			 redirect('sign-in');
		 }
		
		
    }
	public function limitText($text, $limit) {
      if (str_word_count($text, 0) > $limit) {
          $words = str_word_count($text, 2);
          $pos = array_keys($words);
          $text = substr($text, 0, $pos[$limit]) . '...';
      }
      return $text;
    }
	function Blog($cat=null)
	{
	   $blogpost = $this->Get_db->get_details_by_multiple_column('static_blog_post',array('slug'=>$cat));
       if($cat != null && !empty($blogpost))
       {
            $data = $this->html_content();
		
			$data['blog_full_post']= $this->Get_db->get_details_by_multiple_column('static_blog_post',array('slug'=>$cat));
		
		if(isset($this->session->userdata('logged_in')['user_id']) && ($this->session->userdata('logged_in')['user_role'] == "employer" || $this->session->userdata('logged_in')['user_role'] == "recruiter") )
        {
            $data['carousel_data'] = $this->Get_db->get_details_by_multiple_column('cms_carousel',array('for'=>'employers'))[0];
        }
        elseif(isset($this->session->userdata('logged_in')['user_id']) && $this->session->userdata('logged_in')['user_role'] == "career_experts")
        {
            $data['carousel_data'] = $this->Get_db->get_details_by_multiple_column('cms_carousel',array('for'=>'experts'))[0];
        }
        else
        {
		  $data['carousel_data'] = $this->Get_db->get_details_by_multiple_column('cms_carousel',array('for'=>'candidates'))[0];
        }
        
        
        $data['blog_recommended_post']= $this->Get_db->get_details_by_multiple_column('static_blog_post',array('recommended'=>1));
        $this-> db->select('*');
		$this->db->from('static_blog_post');
        $this->db->where('popular', 1);
        $this->db->where('popular_order !=', NULL);
        $this->db->order_by('popular_order',"asc");
        $query = $this->db->get();
		$result = $query->result();
        $data['blog_popular_post']= $result;//$this->Get_db->get_details_by_multiple_column('static_blog_post',array('popular'=>1));
        
        
        $data['blog_featured_post']= $this->Get_db->get_details_by_multiple_column('static_blog_post',array('featured'=>1));
        
        $data['pageTitle'] = $data['blog_full_post'][0]->meta_title;
        $data['pageDesc'] = $data['blog_full_post'][0]->meta_desc;
        $data['noFollow'] = $data['blog_full_post'][0]->noFollow;
        $data['noIndex'] = $data['blog_full_post'][0]->noIndex;
		$this->load->view('Home_header', @$data);
        $this->load->view('view_blog_detail', @$data);
        //$this->load->view('carousel_company_helped', @$data);
        $this->load->view('Home_footer', @$data);
        
       }else{
       
	   $cat = urldecode($cat);
		$data = $this->html_content();
		
		
		#-------BLOG POST-------#
		$data['blog_post'] = array();
        $this->db->select('*');
		$this->db->from('static_blog_post');
        $this->db->order_by("datecreated", "desc");
        /*if(!empty($cat)){
            $this->db->like('category',urldecode($cat));
        }*/
		$query = $this->db->get();
		$qr_blog_post = $query->result();
        
        if(!empty($qr_blog_post)){
          foreach($qr_blog_post as $all_cat){
    				$data['all_category'][] = $all_cat->category;
                
			}  
        }
         
        
		//$qr_blog_post = $this->Get_db->get_details_all('static_blog_post');
        if(!empty($qr_blog_post) && !empty($cat)){
          foreach($qr_blog_post as $all_post){
                if($all_post->category == $cat){
    				$decoded = trim(strip_tags($all_post->blog_content));
    				$all_post->blog_content = $this->limitText($decoded,9);
    				$data['blog_post'][] = $all_post;
                }
			}  
        }
		else if(!empty($qr_blog_post) && empty($cat)){
			foreach($qr_blog_post as $all_post){
				$decoded = trim(strip_tags($all_post->blog_content));
				$all_post->blog_content = $this->limitText($decoded,9);
				$data['blog_post'][] = $all_post;
			}
		}
		
		#-------BLOG PAGE-------#
		$data['qr_blog_page'] = $this->Get_db->get_details_all('static_blog_page');
		if(isset($this->session->userdata('logged_in')['user_id']) && ($this->session->userdata('logged_in')['user_role'] == "employer" || $this->session->userdata('logged_in')['user_role'] == "recruiter"))
        {
            $data['carousel_data'] = $this->Get_db->get_details_by_multiple_column('cms_carousel',array('for'=>'employers'))[0];
        }
        elseif(isset($this->session->userdata('logged_in')['user_id']) && $this->session->userdata('logged_in')['user_role'] == "career_experts")
        {
            $data['carousel_data'] = $this->Get_db->get_details_by_multiple_column('cms_carousel',array('for'=>'experts'))[0];
        }
        else
        {
		  $data['carousel_data'] = $this->Get_db->get_details_by_multiple_column('cms_carousel',array('for'=>'candidates'))[0];
        }
        $data['pageTitle'] = $data['qr_blog_page'][0]->meta_title;
        $data['pageDesc'] = $data['qr_blog_page'][0]->meta_desc;
        $data['noFollow'] = $data['qr_blog_page'][0]->noFollow;
        $data['noIndex'] = $data['qr_blog_page'][0]->noIndex;
		$this->load->view('Home_header', @$data);
        $this->load->view('view_blog', @$data);
        $this->load->view('carousel_company_helped', @$data);
        $this->load->view('Home_footer', @$data);
        
        }
	}
    
    function slugify($text)
    {
      // replace non letter or digits by -
      $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    
      // transliterate
      $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    
      // remove unwanted characters
      $text = preg_replace('~[^-\w]+~', '', $text);
    
      // trim
      $text = trim($text, '-');
    
      // remove duplicate -
      $text = preg_replace('~-+~', '-', $text);
    
      // lowercase
      $text = strtolower($text);
    
      if (empty($text)) {
        return 'n-a';
      }
    
      return $text;
    }
    
    function blog_slug(){
        //$this->Get_db->get_details_by_multiple_column('static_blog_post',array('slug'=>NULL));
        $all_blog = $this->Get_db->get_details_all('static_blog_post');
        
        foreach($all_blog as $blog){
            $slug = $this->slugify($blog->blog_heading);
            $data['slug'] = $slug;
            echo  $slug."<br />";
            $this->Get_db->update_data('static_blog_post',$data,array('id'=>$blog->id));
        }
    }
	
	function blogFullPost($id){
	
		$data = $this->html_content();
		/*if(!empty($id)){
			$data['blog_full_post']= $this->Get_db->get_details_by_multiple_column('static_blog_post',array('id'=>$id));
		}*/
        if(!empty($id)){
			$data['blog_full_post']= $this->Get_db->get_details_by_multiple_column('static_blog_post',array('slug'=>$id));
		}
		if(isset($this->session->userdata('logged_in')['user_id']) && ($this->session->userdata('logged_in')['user_role'] == "employer" || $this->session->userdata('logged_in')['user_role'] == "recruiter"))
        {
            $data['carousel_data'] = $this->Get_db->get_details_by_multiple_column('cms_carousel',array('for'=>'employers'))[0];
        }
        elseif(isset($this->session->userdata('logged_in')['user_id']) && $this->session->userdata('logged_in')['user_role'] == "career_experts")
        {
            $data['carousel_data'] = $this->Get_db->get_details_by_multiple_column('cms_carousel',array('for'=>'experts'))[0];
        }
        else
        {
		  $data['carousel_data'] = $this->Get_db->get_details_by_multiple_column('cms_carousel',array('for'=>'candidates'))[0];
        }
        
        
        $data['blog_recommended_post']= $this->Get_db->get_details_by_multiple_column('static_blog_post',array('recommended'=>1));
        $this-> db->select('*');
		$this->db->from('static_blog_post');
        $this->db->where('popular', 1);
        $this->db->where('popular_order !=', NULL);
        $this->db->order_by('popular_order',"asc");
        $query = $this->db->get();
		$result = $query->result();
        $data['blog_popular_post']= $result;//$this->Get_db->get_details_by_multiple_column('static_blog_post',array('popular'=>1));
        
        
        $data['blog_featured_post']= $this->Get_db->get_details_by_multiple_column('static_blog_post',array('featured'=>1));
        
        $data['pageTitle'] = $data['blog_full_post'][0]->meta_title;
        $data['pageDesc'] = $data['blog_full_post'][0]->meta_desc;
        $data['noFollow'] = $data['blog_full_post'][0]->noFollow;
        $data['noIndex'] = $data['blog_full_post'][0]->noIndex;
		$this->load->view('Home_header', @$data);
        $this->load->view('view_blog_detail', @$data);
        //$this->load->view('carousel_company_helped', @$data);
        $this->load->view('Home_footer', @$data);
	}
    
    function newsletter_unsubscribe($email,$active_url){
        if(empty($email) || empty($active_url)){
          redirect(site_url().'?unsubscribe=no','refresh');
          //echo "asdads";
	       die();   
        } else {
            $decoded_email = urldecode($email);
            
            $check_email = $this->Get_db->get_details_by_multiple_column('newsletter_subscribers',array('subscriber_email'=>$decoded_email));
        
            $encoded_email = urlencode(md5($decoded_email));
            if(!empty($check_email) && $encoded_email === $active_url){
                $this->db->where('subscriber_email', $decoded_email);
                $this->db->delete('newsletter_subscribers');
                //echo "xcvxcxc";
                redirect(site_url().'?unsubscribe=yes','refresh');
    			die();
            } else {
               redirect(site_url().'?unsubscribe=no','refresh');
               //echo "fgdff";
    	       die(); 
            }
        }
        
    }
    
    function newsletter_signup(){
        $errors = array();
        $this->form_validation->set_rules('newsletter_email', 'Email address', 'trim|required|valid_email|is_unique[newsletter_subscribers.subscriber_email]',
                array('required' => 'You must provide an %s.',
                'is_unique' => 'email already exist')
            ); 
        if ($this->form_validation->run() == FALSE)
        {
            
            // Loop through $_POST and get the keys
	        foreach ($this->input->post() as $key => $value)
	        {
	            $errors[$key] = form_error($key);
	        }
	        $errors = array_filter($errors); // Some might be empty

            //$errors['error_count'] = count($response['errors']);    
        }
        else
        { 
            $data['subscriber_email'] = $this->input->post('newsletter_email');
            $insert = $this->Get_db->add_insert_record('newsletter_subscribers',$data);
        }
        
        echo json_encode(array("Error_Mess" => $errors,'data'=>$this->input->post()));
        die();
    }
	
	function Candidiate_register()
	{
		$sess = $this->session->userdata('logged_in');

        if($sess['session_status']){
			redirect(site_url());
			die();
		}
		$data = $this->html_content();
        $data['db_table'] = $this->Get_db->get_details_all('static_sign_up');
        $data['pageTitle'] = $data['db_table'][0]->meta_title;
        $data['pageDesc'] = $data['db_table'][0]->meta_desc;
        $data['noFollow'] = $data['db_table'][0]->noFollow;
        $data['noIndex'] = $data['db_table'][0]->noIndex;
		$this->load->view('Home_header', @$data);
        $this->load->view('view_candidiate_register', @$data);
        $this->load->view('Home_footer', @$data);
	}
	function accept_terms($val)
	{
	    if ($val != "")
        { 
	       return true;
        }
        else{
	    //$this->form_validation->set_message('coupon_question', 'Please read and accept our terms and conditions.');
	    return false;
        }
	}
    
    function corporate_email($val){
        
        
        if (preg_match('/(.+)gmail(\..+)$/', $val)) {
            return false;
        } elseif (preg_match('/(.+)outlook(\..+)$/', $val)) {
            return false;
        } elseif (preg_match('/(.+)hotmail(\..+)$/', $val)) {
            return false;
        } elseif (preg_match('/(.+)live(\..+)$/', $val)) {
            return false;
        } elseif (preg_match('/(.+)yahoo(\..+)$/', $val)) {
            return false;
        } else {
            return true;
        }
        /*if ($val != "")
        { 
	       return true;
        }
        else{
	       return false;
        }*/
    }
    
    
    
    function strength_meter($val){
        
        $uppercase = preg_match('@[A-Z]@', $val);
        $lowercase = preg_match('@[a-z]@', $val);
        $number    = preg_match('@[0-9]@', $val);
        
        if(!$uppercase || !$lowercase || !$number) {
          // tell the user something went wrong
          return false;
        } else {
            return true;
        }
        
    }

    public function add_candidiate(){
			
        $status="";
        $errors = array();
         $data  = array();
        $errors['error_count'] = 0;
        	/*$time_start = microtime(true);
			$time_start = (int)$time_start;
			$time_temp = time() . rand(10*45, 100*98);
			$time_temp = (int)$time_temp;
			$time_start = $time_start+$time_temp;
			$time_start = (int)$time_start;*/
            
            
            $time_start = time();
            $time_start = $time_start + (7 * 24 * 60 * 60 * 60);


        $this->form_validation->set_error_delimiters('<span style="color:red;">', '</span>');
        if($this->input->post('role') != 'employer'){
            $this->form_validation->set_rules('Email', 'Email', 'trim|required|valid_email|is_unique[amazetal_users.login_email]',
                array('required' => 'You must provide an %s.',
                'is_unique' => 'User already exist')
            ); 
            
            $this->form_validation->set_rules( 'coupon_question','Terms & Conditions and Privacy Policy', 'trim|required|callback_accept_terms',
                array('required' => 'You must accept %s.',
                'accept_terms' => 'You must accept %s.')
            );
        }
        
        
        
        
        
        // $this->form_validation->set_rules('confirm', 'Password Confirmation', 'matches[password]',
			// array('required' => 'Password Doesn\'t Match.')
    	// );

        
        if($this->input->post('role') == 'candidates'){
            
            $this->form_validation->set_rules('phone', 'phone', 'trim|required|min_length[14]',
    			array('required' => 'You must provide a %s number.',
                'min_length' => 'Minimum length of %s is 10 characters.')
        	);
            
            $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]|callback_strength_meter',
    			array('required' => 'You must provide a %s.',
                    'strength_meter' => 'You must provide a strong %s')
        	);
            
            $this->form_validation->set_rules('search_location', 'search_location', 'trim|required',
    			array('required' => 'You must provide a location.')
        	);
            
            $this->form_validation->set_rules( 'canfullname','full name', 'trim|required',
                array('required' => 'You must provide a full name.')
            );
        }
		//|callback_corporate_email
        else if($this->input->post('role') == 'employer'){
            
            $this->form_validation->set_rules( 'coupon_question','Terms & Conditions and Privacy Policy', 'trim|required|callback_accept_terms',
                array('required' => 'Please accept %s.',
                'accept_terms' => 'Please accept %s.')
            );
            
            $this->form_validation->set_rules('Email', 'Email', 'trim|required|valid_email|is_unique[amazetal_users.login_email]',
                array('required' => 'Please provide an %s.',
                'corporate_email' => 'You must provide corporate email.',
                'is_unique' => 'User already exist')
            );
            
            $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]|callback_strength_meter',
    			array('required' => 'You must provide a %s.',
                    'strength_meter' => 'Please provide a strong %s')
        	); 
            
            // $this->form_validation->set_rules('confirmemail', 'Corporate email address confirmation', 'matches[Email]',
    			// array('required' => 'Corporate email Doesn\'t Match.')
        	// );
            $this->form_validation->set_rules('phone', 'phone', 'trim|required|min_length[14]',
    			array('required' => 'Please provide a phone number.',
                'min_length' => 'Minimum length of %s is 10 characters.')
        	);            
            
            $this->form_validation->set_rules('search_location2', 'search_location', 'trim|required',
                array('required' => 'Please provide a location.')
            );
            $this->form_validation->set_rules('fullname', 'fullname', 'trim|required',
            array('required' => 'Please provide a full name.')
            );
            $this->form_validation->set_rules('company', 'company', 'trim|required',
            array('required' => 'Please provide a company name.')
            );
            /*$this->form_validation->set_rules('reason', 'reason', 'trim|required',
            array('required' => 'Please provide a %s.')
            );*/
        }
        else if($this->input->post('role') == 'career_experts'){
            
            $this->form_validation->set_rules('phone', 'phone', 'trim|required|min_length[14]',
    			array('required' => 'You must provide a %s number.',
                'min_length' => 'Minimum length of %s is 10 characters.')
        	);
            
            $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]|callback_strength_meter',
    			array('required' => 'You must provide a %s.',
                    'strength_meter' => 'You must provide a strong %s')
        	);
            
            $this->form_validation->set_rules('search_location3', 'search_location', 'trim|required',
                array('required' => 'You must provide a location.')
            );
			// $this->form_validation->set_rules('confirm_email', 'Confirm email', 'required|matches[Email]',
                // array('required' => 'You must provide a %s.')
            // );
			/* $this->form_validation->set_rules('how_did_you_hear_about_us_hidden', 'How did you hear about us', 'required',
                array('required' => 'You must provide a %s.')
            );
			 */
			$this->form_validation->set_rules('fullname', 'fullname', 'trim|required',
				array('required' => 'You must provide a full name.')
            );
        }
        
        
        
        

        // $this->form_validation->set_rules('timezone', 'timezone', 'required',
            // array('required' => 'You must Select %s.')
        // );
    	//$this->form_validation->set_rules('place', 'place', 'trim|required',
			//array('required' => 'You must provide a %s.')
    	//);
        /*$this->form_validation->set_rules('cityLat', 'cityLat', 'required',
			array('required' => 'You must provide a %s.')
    	);
    	$this->form_validation->set_rules('cityLng', 'cityLng', 'required',
			array('required' => 'You must provide a %s.')
    	);*/
        

        if ($this->form_validation->run() == FALSE)
        {
            $status= FALSE;
            // Loop through $_POST and get the keys
	        foreach ($this->input->post() as $key => $value)
	        {
	            // Add the error message for this field
	            // echo $key;
	            $errors[$key] = form_error($key);
	        }
	        $response['errors'] = array_filter($errors); // Some might be empty
	        /*   echo "<pre>";  
                    print_r($response['errors']);
                echo "</pre>"; */
            $errors['error_count'] = count($response['errors']);    
                    // die();
            // $errors['warning']=json_encode($response['errors']);
        } 
        else
        {
            
            
            $status =TRUE;
			// echo "<pre>";
				// print_r($this->input->post());
			// die();
			
			
            
            //$company = $this->Get_db->get_details_by_column("company_matrix","id",$this->input->post('company'));
      	
               
            // if(!empty($this->input->post('role'))){
            if($this->input->post('role') == 'employer'){
               $data = array(
                    'role'              =>$this->input->post('role'),
                    'login_email'   =>strtolower($this->input->post('Email')),
                    'password'          =>md5($this->input->post('password')),
                    'fullname'          =>$this->input->post('fullname'),
                    'phone'             =>$this->input->post('phone'),
                    'place'             =>$this->input->post('search_location2'),
                    'Lat'               =>$this->input->post('cityLat'),
                    'Lng'               =>$this->input->post('cityLng'),
                    'company_id'        =>$this->input->post('company'),
                    'profile_completion'   =>  50,
                    'profile_completion_step' => '0',
                    'approval'          =>'1',
                    'master_pass'       => md5('N$8ubREd')
                    //'block_current_candidates'         =>$this->input->post('blockcand'),
                    // 'timezone_id'       =>$this->input->post('timezone'),
                    
                ); 
            }
            elseif($this->input->post('role') == 'candidates'){
                $data = array(
                    'role'              =>$this->input->post('role'),
                    'login_email'   =>strtolower($this->input->post('Email')),
                    'password'          =>md5($this->input->post('password')),
					'fullname'          => @$this->input->post('canfullname'),
					'how_did_you_hear_about_us'          => @$this->input->post('how_did_you_hear_about_us'),
                    'phone'             =>$this->input->post('phone'),
                    'place'             =>$this->input->post('search_location'),
                    'Lat'               =>$this->input->post('cityLat'),
                    'Lng'               =>$this->input->post('cityLng'),
                    // 'timezone_id'       =>$this->input->post('timezone'),
                    'approval'          =>1,
                    'profile_completion'=>0,
                    'master_pass'       => md5('N$8ubREd')
                );
                
				if($this->input->post('newsletter_question') == 1){
        			$newsdata = array(
                        'subscriber_email'   =>  strtolower($this->input->post('Email'))
                    );
                    
                    $add_news = $this->db->insert('newsletter_subscribers', $newsdata);
                }
            }
            else{
                $data = array(
                    'role'              =>$this->input->post('role'),
                    'login_email'   =>strtolower($this->input->post('Email')),
                    'password'          =>md5($this->input->post('password')),
					'fullname'          => @$this->input->post('fullname'),
					'how_did_you_hear_about_us'          => @$this->input->post('how_did_you_hear_about_us_hidden'),
                    'phone'             =>$this->input->post('phone'),
                    'place'             =>$this->input->post('search_location3'),
                    'Lat'               =>$this->input->post('cityLat'),
                    'Lng'               =>$this->input->post('cityLng'),
                    // 'timezone_id'       =>$this->input->post('timezone'),
                    'approval'          =>1,
                    'profile_completion'=>0,
                    'master_pass'       => md5('N$8ubREd')
                );
            }

            /*
				$a = urlencode(base64_encode($this->input->post('Email'))); // To Encode
				$b = base64_decode(urldecode(ltrim($a,'='))); // To Decode
				@signup
            */
			$data['verification_code'] =urlencode(base64_encode($this->input->post('Email')).mt_rand());
			$data['user_status'] = 0;
			
		
			//$data['profile_completion'] = 0;
			$url = site_url().'/VerifyLogin/activation_link/'.urlencode($this->input->post('Email')).'/'.$data['verification_code'];
            
            $data['unique_id'] = $time_start;
            
            $data['date_created'] = date('Y-m-d H:i:s');
            
            //die();

            $insert = $this->Get_db->add_insert_record(DB_PREFIX.'users',$data);
            if($insert>0){
            		/*$email_details = array(
						'recipient' =>$this->input->post('Email'),
						'subject' => 'Verification Email - Amazetal',
						'message' => 'Hello,<br>Your account is successfully registered on our site.
							<a href="'.$url.'" style="">Click here to get verified</a>',
						'heading' => 'Welcome to Amazetal'
					); 
					$this->Get_db->send_email($email_details);*/
					
					
            	/* $config = Array(        		           
		            'mailtype'  => 'html'
		        );
            	$this->load->library('email',$config);

				$this->email->from('admin@Amazetal.com', 'Admin - Amazetal');
				$this->email->to($this->input->post('Email'));

				$this->email->subject('Verification Email - Amazetal');
				$this->email->message('Hello,<br>Your account is successfully registered on our site.
					<a href="'.$url.'" style="">Click here to get verified</a>');

				$this->email->send();*/
                
                $email_data = array(
        			'to' => $this->input->post('Email'),
        			'subject' => 'Verification Email - AmazeTal',
        			'message' => '<p>We\'re happy to have you on-board! Please click on the "Verify Email" button below to verify your email address and we will get you started right away.<p>',
                    'button' => '<p><a height = "40" width = "420" line-height="38" class="btn_link" style="background: #518ed2;padding:0 10px;border-radius:3px;display:inline-block; color: #fff;font-size: 16px;height: 40px;min-width: 100px; max-width: 420px; line-height: 38px;text-decoration: none;" href="'.$url.'">Verify Email</a></p>' 
                    //inside button
                    //'<br /><br />
                    //<p><a href="'.base_url().'how_it_works">Click Here</a> to learn more about how AmazeTal can help you. Welcome again!</p>'
        		);
        		$this->email_template->template($email_data);
				//email send to admins

				$where_array = 'role = 1 OR role = 2';
				$Admins_emails = $this->Get_db->get_details_by_multiple_column('amazetal_users',$where_array);
				$remove_s = rtrim($this->input->post('role'), 's');
                $remove_s = str_replace('_'," ",$remove_s);
                if($this->input->post('role') == 'candidates'){
                    $named= $this->input->post("canfullname");
                }else {
                    $named= $this->input->post('fullname');
                }
				if(!empty($Admins_emails)){
					foreach($Admins_emails as $emails){
						 $email_data1 = array(
							'to' => $emails->login_email,
							'subject' => 'New User SignUp',
							'message' => 'Congrats! You have one new '.ucfirst($remove_s).' signup named '.$named.'. Please check and take appropriate action.',
							'button' => '<p><a height = "40" width = "420" line-height="38" class="btn_link" style="background: #518ed2;padding:0 10px;border-radius:3px;display:inline-block; color: #fff;font-size: 16px;height: 40px;min-width: 100px; max-width: 420px; line-height: 38px;text-decoration: none;" href="'.base_url().'Amazetal_Admin">LOGIN</a></p>' 
						);
						$this->email_template->template($email_data1);	
					}
				}

            }

        }
        echo json_encode(array("status" => $status,"Error_Mess" => $errors,'data'=>$data, 'posted_data' => $this->input->post()));
        die();
    }

	// function timezone_check(){
	// 	if($this->input->post('timezone') == ''){
	// 		return TRUE;
	// 	}
	// 	else{
	// 		return FALSE;
	// 	}
	// }

	function Career()
	{
		$data = $this->html_content();
		if(isset($this->session->userdata('logged_in')['user_id']) && ($this->session->userdata('logged_in')['user_role'] == "employer" || $this->session->userdata('logged_in')['user_role'] == "recruiter"))
        {
            $data['carousel_data'] = $this->Get_db->get_details_by_multiple_column('cms_carousel',array('for'=>'employers'))[0];
        }
        elseif(isset($this->session->userdata('logged_in')['user_id']) && $this->session->userdata('logged_in')['user_role'] == "career_experts")
        {
            $data['carousel_data'] = $this->Get_db->get_details_by_multiple_column('cms_carousel',array('for'=>'experts'))[0];
        }
        else
        {
		  $data['carousel_data'] = $this->Get_db->get_details_by_multiple_column('cms_carousel',array('for'=>'candidates'))[0];
        }
		$data['db_table'] = $this->Get_db->get_details_all('static_career_advice');
        $data['db_post'] = $this->Get_db->get_details_all('static_career_post');
        $data['pageTitle'] = $data['db_table'][0]->meta_title;
        $data['pageDesc'] = $data['db_table'][0]->meta_desc;
        $data['noFollow'] = $data['db_table'][0]->noFollow;
        $data['noIndex'] = $data['db_table'][0]->noIndex;
		$this->load->view('Home_header', @$data);
        $this->load->view('view_career', @$data);
		$this->load->view('carousel_company_helped', @$data);
        $this->load->view('Home_footer', @$data);
	}
	function Contact()
	{
		$data = $this->html_content();
        $data['db_table']= $this->Get_db->get_details_all('static_contact_us');
		if(isset($this->session->userdata('logged_in')['user_id']) && ($this->session->userdata('logged_in')['user_role'] == "employer" || $this->session->userdata('logged_in')['user_role'] == "recruiter"))
        {
            $data['carousel_data'] = $this->Get_db->get_details_by_multiple_column('cms_carousel',array('for'=>'employers'))[0];
        }
        elseif(isset($this->session->userdata('logged_in')['user_id']) && $this->session->userdata('logged_in')['user_role'] == "career_experts")
        {
            $data['carousel_data'] = $this->Get_db->get_details_by_multiple_column('cms_carousel',array('for'=>'experts'))[0];
        }
        else
        {
		  $data['carousel_data'] = $this->Get_db->get_details_by_multiple_column('cms_carousel',array('for'=>'candidates'))[0];
        }
        $data['pageTitle'] = $data['db_table'][0]->meta_title;
        $data['pageDesc'] = $data['db_table'][0]->meta_desc;
        $data['noFollow'] = $data['db_table'][0]->noFollow;
        $data['noIndex'] = $data['db_table'][0]->noIndex;
		$this->load->view('Home_header', @$data);
        $this->load->view('view_contact', @$data);
        $this->load->view('carousel_company_helped', @$data);
        $this->load->view('Home_footer', @$data);
	}
	function contact_us_email(){
        $email_data = array(
            'to' => 'info@amazetal.com',
            'subject' => 'Contact form query',
            'message' => '<div style="text-align: center">
                            <table border="1px" style="text-align: center" width="99%">
                            <tr><td>
                            <h2>Contact form query</h2>
                            </td></tr>
                            <tr>
                            <td><br>
                            <label><b>User Name: </b></label>
                            '.print_r($this->input->post('username'),true).'
                            <br>
                            <br>
                            </td></tr>
                            <tr>
                            <td><br>
                            <label><b>User Email: </b></label>
                            '.print_r($this->input->post('useremail'),true). '
                            <br>
                            <br>
                            </td></tr>
                            <tr>
                            <td>
                            <br><br>
                            <label><b>General Question: </b></label>
                            <span style="color:#bb0000">' .print_r($this->input->post('general_q'),true).'?</span>
                            <br><br>
                            <br>
                            <label><b>Comment: </b></label>
                            '.print_r($this->input->post('msg'),true). '
                            <br><br>
                            </td></tr>
                           </table>
                           </div>',


        );
        if($this->input->post('username') != "" && $this->input->post('useremail') != ""){
        $abc = $this->email_template->generaltemplate($email_data);
        $output =  'email sent';
            print_r($output);
        }
    }

	function Help_center()
	{
		$data = $this->html_content();

        $data['questions'] = array();
        $help_questions = $this->Get_db->get_details_all('static_help_questions');
        if(!empty($help_questions)){
            foreach($help_questions as $all_post){
                $decoded = trim(strip_tags($all_post->help_ans));
                $all_post->help_ans = $decoded;
                $data['questions'][] = $all_post;
            }
        }
		if(isset($this->session->userdata('logged_in')['user_id']) && ($this->session->userdata('logged_in')['user_role'] == "employer" || $this->session->userdata('logged_in')['user_role'] == "recruiter"))
        {
            $data['carousel_data'] = $this->Get_db->get_details_by_multiple_column('cms_carousel',array('for'=>'employers'))[0];
        }
        elseif(isset($this->session->userdata('logged_in')['user_id']) && $this->session->userdata('logged_in')['user_role'] == "career_experts")
        {
            $data['carousel_data'] = $this->Get_db->get_details_by_multiple_column('cms_carousel',array('for'=>'experts'))[0];
        }
        else
        {
		  $data['carousel_data'] = $this->Get_db->get_details_by_multiple_column('cms_carousel',array('for'=>'candidates'))[0];
        }
        $data['db_table']= $this->Get_db->get_details_all('static_help_center');
        $data['pageTitle'] = $data['db_table'][0]->meta_title;
        $data['pageDesc'] = $data['db_table'][0]->meta_desc;
        $data['noFollow'] = $data['db_table'][0]->noFollow;
        $data['noIndex'] = $data['db_table'][0]->noIndex;
		$this->load->view('Home_header', @$data);
        $this->load->view('view_help_center', @$data);
        $this->load->view('carousel_company_helped', @$data);
        $this->load->view('Home_footer', @$data);
	}
	function Press()
	{
		$data = $this->html_content();
        $data['db_table']= $this->Get_db->get_details_all('static_press_page');
        $data['db_press_post']= $this->Get_db->get_details_all_post('static_press_blog');
		if(isset($this->session->userdata('logged_in')['user_id']) && ($this->session->userdata('logged_in')['user_role'] == "employer" || $this->session->userdata('logged_in')['user_role'] == "recruiter"))
        {
            $data['carousel_data'] = $this->Get_db->get_details_by_multiple_column('cms_carousel',array('for'=>'employers'))[0];
        }
        elseif(isset($this->session->userdata('logged_in')['user_id']) && $this->session->userdata('logged_in')['user_role'] == "career_experts")
        {
            $data['carousel_data'] = $this->Get_db->get_details_by_multiple_column('cms_carousel',array('for'=>'experts'))[0];
        }
        else
        {
		  $data['carousel_data'] = $this->Get_db->get_details_by_multiple_column('cms_carousel',array('for'=>'candidates'))[0];
        }
        $data['pageTitle'] = $data['db_table'][0]->meta_title;
        $data['pageDesc'] = $data['db_table'][0]->meta_desc;
        $data['noFollow'] = $data['db_table'][0]->noFollow;
        $data['noIndex'] = $data['db_table'][0]->noIndex;
		$this->load->view('Home_header', @$data);
        $this->load->view('view_press', @$data);
        @$data['page_name'] = 'press';
        $this->load->view('carousel_company_helped', @$data);
        $this->load->view('Home_footer', @$data);
	}
    function pressFullPost($id){

        $data = $this->html_content();
        if(!empty($id)){
            $data['press_full_post']= $this->Get_db->get_details_by_multiple_column('static_press_blog',array('press_post_id'=>$id));
        }
        if(isset($this->session->userdata('logged_in')['user_id']) && ($this->session->userdata('logged_in')['user_role'] == "employer" || $this->session->userdata('logged_in')['user_role'] == "recruiter"))
        {
            $data['carousel_data'] = $this->Get_db->get_details_by_multiple_column('cms_carousel',array('for'=>'employers'))[0];
        }
        elseif(isset($this->session->userdata('logged_in')['user_id']) && $this->session->userdata('logged_in')['user_role'] == "career_experts")
        {
            $data['carousel_data'] = $this->Get_db->get_details_by_multiple_column('cms_carousel',array('for'=>'experts'))[0];
        }
        else
        {
		  $data['carousel_data'] = $this->Get_db->get_details_by_multiple_column('cms_carousel',array('for'=>'candidates'))[0];
        }
        
        $data['pageTitle'] = $data['press_full_post'][0]->meta_title;
        $data['pageDesc'] = $data['press_full_post'][0]->meta_desc;
        $data['noFollow'] = $data['press_full_post'][0]->noFollow;
        $data['noIndex'] = $data['press_full_post'][0]->noIndex;
        $this->load->view('Home_header', @$data);
        $this->load->view('view_press_detail', @$data);
        $this->load->view('carousel_company_helped', @$data);
        $this->load->view('Home_footer', @$data);
    }
	function Privacy()
	{
		
		$data = $this->html_content();
        $data['db_table']= $this->Get_db->get_details_all('static_p_policy');
        $data['pageTitle'] = $data['db_table'][0]->meta_title;
        $data['pageDesc'] = $data['db_table'][0]->meta_desc;
        $data['noFollow'] = $data['db_table'][0]->noFollow;
        $data['noIndex'] = $data['db_table'][0]->noIndex;
		$this->load->view('Home_header', @$data);
        $this->load->view('view_privacy', @$data);
        $this->load->view('Home_footer', @$data);
	}
	
	
    function Sign_in_app()
	{
		$sess = $this->session->userdata('logged_in');
		
		//if($sess['session_status']){
			//redirect(site_url());
			//die();
		//}
			$data = $this->html_content();
			$data['background_image'] ="";
			$qr_bg_image = $this->Get_db->get_details_by_multiple_column('static_signin',array('id'=>0));
			$qr_bg_image = json_decode($qr_bg_image[0]->page_background_image);
		
			if(!empty($qr_bg_image)){
				$data['sign_in_background'] = $qr_bg_image[0];
			}
			
			
// echo "<pre>";
	// print_r($data);
// echo "</pre>";
            $qr = $this->Get_db->get_details_by_multiple_column('static_signin',array('id'=>0));

            $data['pageTitle'] = $qr[0]->meta_title;
            $data['pageDesc'] = $qr[0]->meta_desc;
            $data['noFollow'] = $qr[0]->noFollow;
            $data['noIndex'] = $qr[0]->noIndex;

	
			//$this->load->view('Home_header', @$data);
	        $this->load->view('view_sign_in_app', @$data);
	        //$this->load->view('Home_footer', @$data);
		
		
		
	}
    
    
    
    
    
	function Sign_in()
	{
		$sess = $this->session->userdata('logged_in');
		
		if($sess['session_status']){
			redirect(site_url());
			die();
		}
			$data = $this->html_content();
			$data['background_image'] ="";
			$qr_bg_image = $this->Get_db->get_details_by_multiple_column('static_signin',array('id'=>0));
			$qr_bg_image = json_decode($qr_bg_image[0]->page_background_image);
		
			if(!empty($qr_bg_image)){
				$data['sign_in_background'] = $qr_bg_image[0];
			}
			
			
// echo "<pre>";
	// print_r($data);
// echo "</pre>";
            $qr = $this->Get_db->get_details_by_multiple_column('static_signin',array('id'=>0));

            $data['pageTitle'] = $qr[0]->meta_title;
            $data['pageDesc'] = $qr[0]->meta_desc;
            $data['noFollow'] = $qr[0]->noFollow;
            $data['noIndex'] = $qr[0]->noIndex;

	
			$this->load->view('Home_header', @$data);
	        $this->load->view('view_sign_in', @$data);
	        $this->load->view('Home_footer', @$data);
		
		
		
	}
    
    
    function site_404()
	{
		$data = $this->html_content();
        $data['pageTitle'] = "404 Not Found";
		$this->load->view('404_header');
        $this->load->view('404');
        $this->load->view('Home_footer', @$data);
	}
    
    
    
    
    function new_password($hash=null)
	{
		$sess = $this->session->userdata('logged_in');
	
		if($sess['session_status']){
			redirect(site_url());
			die();
		}
		$data = $this->html_content();
        $data['pageTitle'] = "Set Password";
		$this->load->view('Home_header', @$data);
        $this->load->view('view_new_password', @$data);
        $this->load->view('Home_footer', @$data);
	}   
    
    

	function Forget_password()
	{
		$sess = $this->session->userdata('logged_in');
	
		if($sess['session_status']){
			redirect(site_url());
			die();
		}
		$data = $this->html_content();
        $data['pageTitle'] = "Forgot Password";
		$this->load->view('Home_header', @$data);
        $this->load->view('view_forget_password', @$data);
        $this->load->view('Home_footer', @$data);
	}
	function Team()
	{
		$data = $this->html_content();
		$data['team_page_db'] = $this->Get_db->get_details_all('static_team');
		$data['team_group1'] = $this->Get_db->get_details_by_multiple_column('static_team_member',array('team_group'=>'1'));
		$data['team_group2'] = $this->Get_db->get_details_by_multiple_column('static_team_member',array('team_group'=>'2'));
        $data['team_group3'] = $this->Get_db->get_details_by_multiple_column('static_team_member',array('team_group'=>'3'));
        if(isset($this->session->userdata('logged_in')['user_id']) && ($this->session->userdata('logged_in')['user_role'] == "employer" || $this->session->userdata('logged_in')['user_role'] == "recruiter"))
        {
            $data['carousel_data'] = $this->Get_db->get_details_by_multiple_column('cms_carousel',array('for'=>'employers'))[0];
        }
        elseif(isset($this->session->userdata('logged_in')['user_id']) && $this->session->userdata('logged_in')['user_role'] == "career_experts")
        {
            $data['carousel_data'] = $this->Get_db->get_details_by_multiple_column('cms_carousel',array('for'=>'experts'))[0];
        }
        else
        {
		  $data['carousel_data'] = $this->Get_db->get_details_by_multiple_column('cms_carousel',array('for'=>'candidates'))[0];
        }
        $data['pageTitle'] = $data['team_page_db'][0]->meta_title;
        
        $data['pageDesc'] = $data['team_page_db'][0]->meta_desc;
        $data['noFollow'] = $data['team_page_db'][0]->noFollow;
        $data['noIndex'] = $data['team_page_db'][0]->noIndex;
		$this->load->view('Home_header', @$data);
        $this->load->view('view_team', @$data);
        $this->load->view('carousel_company_helped', @$data);
        $this->load->view('Home_footer', @$data);
	}
	function Terms_condition()
	{
		$data = $this->html_content();
        $data['db_table']= $this->Get_db->get_details_all('static_terms_conditions');
        $data['pageTitle'] = $data['db_table'][0]->meta_title;
        $data['pageDesc'] = $data['db_table'][0]->meta_desc;
        $data['noFollow'] = $data['db_table'][0]->noFollow;
        $data['noIndex'] = $data['db_table'][0]->noIndex;
		$this->load->view('Home_header', @$data);
        $this->load->view('view_terms_condition', @$data);
        $this->load->view('Home_footer', @$data);
	}
	function Why_amazetal()
	{
		$data = $this->html_content();
        $data['db_table']= $this->Get_db->get_details_all('static_why');
        $data['pageTitle'] = $data['db_table'][0]->meta_title;
        $data['pageDesc'] = $data['db_table'][0]->meta_desc;
        $data['noFollow'] = $data['db_table'][0]->noFollow;
        $data['noIndex'] = $data['db_table'][0]->noIndex;
		$this->load->view('Home_header', @$data);
        $this->load->view('view_why_amazetal', @$data);
        $this->load->view('view_help', @$data);
        $this->load->view('Home_footer', @$data);
	}
	
 function logout()
    {

            // echo "man";
            $this->session->unset_userdata('logged_in');

            $f = trim($this->input->get('f'));
            if (!empty($f) and $f == "1") {
                redirect('/Amazetal_Admin', 'refresh');
            } else {
                redirect('/sign-in', 'refresh');
            }

    }
	
	
	function add_expert_data(){
        $errors=array();
        $errors['error_count']=0;
		$post=$this->input->post();
		
		
		if($post['form-name'] == 'form-one'){
				$this->form_validation->set_rules('fullname', 'Full Name', 'required',
                                array('required' => 'You must provide a %s.')
				);
			   /* $this->form_validation->set_rules('login_email', 'Email', 'required',
										array('required' => 'You must provide a %s.')
				); */
				$this->form_validation->set_rules('phone', 'Phone Number', 'required',
										array('required' => 'You must provide a %s.')
				);
				$this->form_validation->set_rules('search_location3', 'Current Location', 'required',
										array('required' => 'You must provide a %s.')
				);
				$this->form_validation->set_rules('timezone_id', 'Time Zone', 'required',
										array('required' => 'You must provide a %s.')
				);
				$this->form_validation->set_rules('how_did_you_hear_about_us', 'How did you hear about us', 'required',
										array('required' => 'You must provide a %s.')
				);
			   
				$this->form_validation->set_rules('postal_address', 'Postal Address', 'required',
										array('required' => 'You must provide a %s.')
				);
		}
		if($post['form-name'] == 'form-two'){
				$this->form_validation->set_rules('Let_people_know_what_your_background_is_and_what_you_are_good_at', 'Let people know what your background is and what you are good at', 'required',
                                array('required' => 'You must provide a %s.')
				);
			
		}
		
		if($post['form-name'] == 'form-three'){
				$this->form_validation->set_rules('coverage_area', 'Coverage Area', 'required',
                                array('required' => 'You must provide a %s.')
				);
				
				$this->form_validation->set_rules('interested_area', 'Interested Area', 'required',
                                array('required' => 'You must provide a %s.')
				);
			
				$this->form_validation->set_rules('amazetal_role[]', 'Preferred Role', 'required',
                                array('required' => 'You must provide a %s.')
				);
			
				$this->form_validation->set_rules('Relevant_Experience_in_Role', 'Relevant Experience in Role', 'required',
                                array('required' => 'You must provide a %s.')
				);
				$this->form_validation->set_rules('skill[]', 'skill', 'required',
                                array('required' => 'You must provide a %s.')
				);
			
				$this->form_validation->set_rules('skill_exp[]', 'Skills Experience', 'required',
                                array('required' => 'You must provide a %s.')
				);
				$this->form_validation->set_rules('skill_expertise[]', 'Skills Expertise', 'required',
                                array('required' => 'You must provide a %s.')
				);
				$this->form_validation->set_rules('other-skill-val[]', 'Other Skill', 'required',
                                array('required' => 'You must provide a %s.')
				);
			
		}
		
		
		
		
		
	
	echo "<pre>";
		print_r($post);
		print_r(validation_errors());
	echo "</pre>";
     
        if ($this->form_validation->run() == FALSE)
        {
			
				// validation_errors();
				// Loop through $_POST and get the keys
            foreach ($this->input->post() as $key => $value)
            {
					// echo 'sdas';
					$errors[$key] = form_error($key);
					$errors['error_count']++;
            }
            $response['errors'] = array_filter($errors); // Some might be empty
            $errors['error_count'] = count($response['errors']);

        }  else{
			
			
			
			
			
			// echo "<pre>";
				unset($post['search_location3']);
				unset($post['form-name']);
				// print_r($post);
			// echo "</pre>";
				$id = $this->Get_db->update_record(		
									$post, 
									DB_PREFIX.'users',// which table to save
									'user_id', // where column is equal to 
									$this->uid // where column value equal to
									);
		
               /*  $data = array(
                    'uni_name'   =>  $this->input->post('uni_name'),
                    // 'faculty'   =>  $this->input->post('faculty'),
                    'uni_rank'   =>  $this->input->post('rank'),
                    // 'city'   =>  $this->input->post('city_dropdown'),
                    // 'state'   =>  $this->input->post('state_dropdown'),
                    // 'country'   =>  $this->input->post('country_dropdown')
                );
                $insert = $this->person->save_university($data); */

        }
        echo json_encode(array("status" => TRUE,"Error_Mess" => $errors));
    }
	
	public function getTabIndex(){
		$step = $this->Get_db->get_details_by_sinlge_column('profile_completion_step','amazetal_users',array('user_id'=>$this->uid));
		print_r(json_encode($step[0]));
	}
	
	
	public function how_it_works(){
        $data = $this->html_content();
        $data['db_table'] = $this->Get_db->get_details_all('static_how_it_works');
        $data['pageTitle'] = $data['db_table'][0]->meta_title;
        $data['pageDesc'] = $data['db_table'][0]->meta_desc;
        $data['noFollow'] = $data['db_table'][0]->noFollow;
        $data['noIndex'] = $data['db_table'][0]->noIndex;
        $this->load->view('Home_header', @$data);
        $this->load->view('view_how_it_works', @$data);
        $this->load->view('Home_footer', @$data);
    }
	
   public function copyright(){
		 $data = $this->html_content();
        $data['db_table'] = $this->Get_db->get_details_all('static_copy_right');
        $data['pageTitle'] = "Copyright";
        $this->load->view('Home_header', @$data);
        $this->load->view('view_copyright', @$data);
        $this->load->view('Home_footer', @$data);
	}
    
    
    public function test_email(){
        $to = $_GET['to'];
        $url = base_url();
		 $email_data = array(
        			'to' => $to,
        			'subject' => 'Verification Email - AmazeTal',
        			'message' => '<p>We\'re happy to have you on-board! Please click on the "Verify Email" button below to verify your email address and we will get you started right away.<p>',
                    'button' => '<p><a height = "40" width = "420" line-height="38" class="btn_link" style="background: #518ed2;padding:0 10px;border-radius:3px;display:inline-block; color: #fff;font-size: 16px;height: 40px;min-width: 100px; max-width: 420px; line-height: 38px;text-decoration: none;" href="'.base_url().'">Verify Email</a></p>' 
        		);
        		$abc = $this->email_template->template($email_data);
                
                 /*if ($abc) {
                    echo 'Message has been sent';   
                } else {
                     echo 'Message could not be sent.';
                    
                    exit;
                }*/
                
               // echo "<pre>";
               // print_r($abc);
	}
	
	 function Profile_viewed_($data_needed){
		$this->db->select("user_id");
		$this->db->from("amazetal_who_viewed_your_profile");
		$this->db->join("amazetal_users","amazetal_users.user_id=amazetal_who_viewed_your_profile.viewed_by_id","inner");
		$this->db->where("amazetal_who_viewed_your_profile.Profile_id",$this->uid);
		$this->db->where("amazetal_users.role",$data_needed);
		$this->db->group_by("amazetal_who_viewed_your_profile.viewed_by_id");
		$query = $this->db->get();
		if(!empty($query->result_array())){
			foreach($query->result_array() as $key => $result){
				if($result['user_id'] != $this->uid){
					$html_content = $this->html_content($result['user_id']);
					$Profile_viewed_candidate[$key] = $html_content['user_info'];
				}
				
			}
			// print_r($Profile_viewed_candidate);
		}
		return @$Profile_viewed_candidate;
	}
	
	public function ajaxCompanySearch(){
		$q = $_POST['q'];
		
		$all_companies = $this->Get_db->get_all_array('amazetal_companies');
	
		if(strlen($q)) {
			$all_companies = array_filter($all_companies, function ($val) use ($q){
				// if(substr($val['company_name'], 0, strlen($q)) === $q){
				if (stripos($val['company_name'], $q) !== false) {
					return true;
				} else {
					return false;
				}

				//Could be shortened to the line below, broken out above to show what it is doing:
				//return strpos($val['Name'], $q) !== false;
			});
		}
		$all_companies[]= array("company_id"=>"other","company_name"=>"Other");
		
		echo json_encode(array_slice(array_values($all_companies), 0, 100));
		//print_r($all_companies);
		
	}
	//Global Footer


    function getBrowser()
    {
        $u_agent = $_SERVER['HTTP_USER_AGENT'];
        $bname = 'Unknown';
        $platform = 'Unknown';
        $version= "";

        //First get the platform?
        if (preg_match('/linux/i', $u_agent)) {
            $platform = 'linux';
        }
        elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
            $platform = 'mac';
        }
        elseif (preg_match('/windows|win32/i', $u_agent)) {
            $platform = 'windows';
        }

        // Next get the name of the useragent yes seperately and for good reason
        if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
        {
            $bname = 'Internet Explorer';
            $ub = "MSIE";
        }
        elseif(preg_match('/Firefox/i',$u_agent))
        {
            $bname = 'Mozilla Firefox';
            $ub = "Firefox";
        }
        elseif(preg_match('/Chrome/i',$u_agent))
        {
            $bname = 'Google Chrome';
            $ub = "Chrome";
        }
        elseif(preg_match('/Safari/i',$u_agent))
        {
            $bname = 'Apple Safari';
            $ub = "Safari";
        }
        elseif(preg_match('/Opera/i',$u_agent))
        {
            $bname = 'Opera';
            $ub = "Opera";
        }
        elseif(preg_match('/Netscape/i',$u_agent))
        {
            $bname = 'Netscape';
            $ub = "Netscape";
        }

        // finally get the correct version number
        $known = array('Version', $ub, 'other');
        $pattern = '#(?<browser>' . join('|', $known) .
            ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
        if (!preg_match_all($pattern, $u_agent, $matches)) {
            // we have no matching number just continue
        }

        // see how many we have
        $i = count($matches['browser']);
        if ($i != 1) {
            //we will have two since we are not using 'other' argument yet
            //see if version is before or after the name
            if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
                $version= $matches['version'][0];
            }
            else {
                $version= $matches['version'][1];
            }
        }
        else {
            $version= $matches['version'][0];
        }

        // check if we have a number
        if ($version==null || $version=="") {$version="?";}

        return array(
            'userAgent' => $u_agent,
            'name'      => $bname,
            'version'   => $version,
            'platform'  => $platform,
            'pattern'    => $pattern
        );
    }
    
    
    function can_video(){
        $data['sec1']= $this->Get_db->get_details_all('static_home_section1');
        $this->load->view('can_video', @$data);
    }
    
    function emp_video(){
        $data['sec1']= $this->Get_db->get_details_all('static_home_section1');
        $this->load->view('emp_video', @$data);
    }
    
    function exp_video(){
        $data['sec1']= $this->Get_db->get_details_all('static_home_section1');
        $this->load->view('exp_video', @$data);
    }



function picture_video_upload()
    {	
        
	
		// print_r($this->session->userdata('logged_in'));
		 if ($this->session->userdata('logged_in')['session_status']) {
			$data = $this->html_content();
		
        
       
			
            
            $data['pageTitle'] = "Profile Completion";
            
            if($data['user_info']->profile_completion >= 100){
              //$this->load->view('view_candidate_profile_completion_header', @$data);  
              $this->load->view('pic_video_upload', @$data);  
            }
            else{
                //$this->load->view('view_candidate_create_profile_completion_header', @$data);
                $this->load->view('pic_video_upload', @$data);    
            }
			
			//
			//$this->load->view('Home_footer', @$data);
		 } else {
			 redirect('sign-in-app');
		 }
		
		
    }
    
function apply_clicked($job_id){
    $jobdata = $this->Get_db->get_details_by_multiple_column('amazetal_job',array('job_unique_id'=>$job_id));
    if(!empty($jobdata)){
    $increase_views = $jobdata[0]->apply_click+1;
    $increase_total_clicks = $jobdata[0]->total_clicks+1;
    $increase_top_cand = $jobdata[0]->apply_top_click+1;
    $increase_cand = $jobdata[0]->apply_click+1;
    
    $cand = $this->Get_db->get_details_by_multiple_column('amazetal_users',array('user_id'=>$this->uid));
    if(!empty($cand)){
    if($cand[0]->role == "candidates" && !empty($cand[0]->spotlight_status)){
      $data_to_update = array('apply_top_click'=>$increase_top_cand,'total_clicks'=>$increase_total_clicks);
        $id = $this->Get_db->update_record(		
    				$data_to_update, 
    				'amazetal_job',// which table to save
    				'job_unique_id', // where column is equal to 
    				$job_id // where column value equal to
    			); 
        
    } else {
        $data_to_update = array('apply_click'=>$increase_cand,'total_clicks'=>$increase_total_clicks);
        $id = $this->Get_db->update_record(		
    				$data_to_update, 
    				'amazetal_job',// which table to save
    				'job_unique_id', // where column is equal to 
    				$job_id // where column value equal to
    			);
      }
      
      $check_apply = $this->Get_db->get_details_by_multiple_column('amazetal_job_applied',array('job_id'=>$job_id, 'candidate_id' => $this->uid));
        if(empty($check_apply)){
            $data_to_insert = array('candidate_id'=>$this->uid,'job_id'=>$job_id);
            $this->db->insert('amazetal_job_applied', $data_to_insert);
            $insert = $this->db->insert_id();
        }
      
      } else {
            $data_to_update = array('apply_click'=>$increase_cand,'total_clicks'=>$increase_total_clicks);
            $id = $this->Get_db->update_record(		
        				$data_to_update, 
        				'amazetal_job',// which table to save
        				'job_unique_id', // where column is equal to 
        				$job_id // where column value equal to
        			);
            $data_to_insert = array('job_id'=>$job_id);
            $this->db->insert('amazetal_job_applied', $data_to_insert);
            $insert = $this->db->insert_id();
      }
   
   }
}


}
?>