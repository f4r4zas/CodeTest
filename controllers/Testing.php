<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
include_once('Home.php');
class Testing extends Home
{
    //variable for storing error message
    private $error;
    //variable for storing success message
    private $success;
    //use CodeIgniter\HTTP\Response;
    
	public function __construct(){
		parent::__construct();
	}
    
    
    public function uni(){
        $query = $this->db->query("SELECT *
                                  FROM amazetal_universities
                                  JOIN new_amazetal_universities ON new_amazetal_universities.uni_name LIKE CONCAT('%', amazetal_universities.uni_name ,'%')");
        $basic_user_info = $query->result();
        
        
        $uni_ids = array();
        foreach($basic_user_info as $row)
        {
            $uni_ids[] = $row->uni_id;
            
            $this->db->delete('new_amazetal_universities', array('uni_id' => $row->uni_id)); 
        }
        
        /*
        SELECT amazetal_universities.*, new_amazetal_universities.uni_name as new_uni_name, new_amazetal_universities.uni_rank as new_uni_rank
                                  FROM amazetal_universities
                                  JOIN new_amazetal_universities ON new_amazetal_universities.uni_name LIKE CONCAT('%', amazetal_universities.uni_name ,'%')
                                  where amazetal_universities.uni_rank != new_amazetal_universities.uni_rank
        */
        
        
        
        /*$query = $this->db->query("INSERT INTO amazetal_universities ( 
                                  uni_name, 
                                  uni_rank ) 
                            SELECT uni_name, 
                                   uni_rank
                            FROM new_amazetal_universities");
        $basic_user_info = $query->result();*/
         
        
        
        
        
        echo '<pre>';
        print_r($uni_ids);
        echo '</pre>';
    }
    
    
    public function comp(){
        $query = $this->db->query("SELECT *
                                  FROM amazetal_companies
                                  JOIN new_amazetal_companies ON new_amazetal_companies.company_name LIKE CONCAT('%', amazetal_companies.company_name ,'%')");
        $basic_user_info = $query->result();
        
        
        $company_ids = array();
        foreach($basic_user_info as $row)
        {
            $company_ids[] = $row->company_id;
            
            $this->db->delete('new_amazetal_companies', array('company_id' => $row->company_id)); 
        }
        
        /*$query = $this->db->query("INSERT INTO amazetal_companies ( 
                                  uni_name, 
                                  uni_rank ) 
                            SELECT uni_name, 
                                   uni_rank
                            FROM new_amazetal_companies");
        $basic_user_info = $query->result();*/
         
        
        
        
        
        echo '<pre>';
        print_r($company_ids);
        echo '</pre>';
    }
    
    public function location(){
        $city = 'Kissimmee';
        $this->db->select('*');
        $this->db->from('amazetal_cities');
        $this->db->join('amazetal_states', 'amazetal_cities.state_id = amazetal_states.id','left');
        $this->db->join('amazetal_countries', 'amazetal_countries.id = amazetal_states.country_id','left');
        $this->db->join('amazetal_location_matrix', 'amazetal_cities.id = amazetal_location_matrix.location_city','left');
        
        $this->db->like("amazetal_cities.city_name",$city);
        $this->db->where("amazetal_countries.country_name","United States");
        $query = $this->db->get();
        $basic_user_info = $query->result();
        
        echo "<pre>";
        print_r($basic_user_info);
        echo "</pre>";
    }
    
    
    public function all_cand_no_skills(){
        $this->db->select('amazetal_test_status.test_taken,amazetal_users.login_email,amazetal_users.fullname');
        $this->db->from('amazetal_users');
        $this->db->join('amazetal_test_status', 'amazetal_users.user_id = amazetal_test_status.user_id','inner');
        $this->db->join('amazetal_user_skill', 'amazetal_users.user_id = amazetal_user_skill.user_id','left');
        $this->db->where("amazetal_users.role",'candidates');
        //$this->db->where("amazetal_test_status.test_taken",1);
        $this->db->where("amazetal_user_skill.user_skill_id",NULL);
        $query = $this->db->get();
        $basic_user_info = $query->result();
        
        echo $this->db->last_query();
        
        
        echo "<br /><pre>";
        print_r($basic_user_info);
        echo "</pre>";
    }
    
    
    
    
    
    public function all_cand_no_skills1(){
        $this->db->select('amazetal_users.user_id,amazetal_user_role.role_exp');
        $this->db->from('amazetal_users');
        $this->db->join('amazetal_test_status', 'amazetal_users.user_id = amazetal_test_status.user_id','inner');
        $this->db->join('amazetal_user_skill', 'amazetal_users.user_id = amazetal_user_skill.user_id','left');
        $this->db->join('amazetal_user_role', 'amazetal_users.user_id = amazetal_user_role.user_id','left');
        $this->db->where("amazetal_users.role",'candidates');
        //$this->db->where("amazetal_test_status.test_taken",1);
        $this->db->where("amazetal_user_skill.user_skill_id",NULL);
        $query = $this->db->get();
        $basic_user_info = $query->result();
        
        //echo $this->db->last_query();
        
        
        echo "<br /><pre>";
        print_r($basic_user_info);
        echo "</pre>";
    }
    
    
    
    function filterd_experts($candidate_id){
        
	

		//$data = $this->html_content();
        
        
        /*$this->db->select('*');
        $this->db->from('amazetal_users');
        $query_exp = $this->db->get();
        $query_exp_result = $query_exp->result();
        
        foreach($query_exp_result as $query_exp_result1)
        {
            if(empty($query_exp_result1->calculated_years_exp) && !empty($query_exp_result1->total_year_exp))
            {
                $expert_years_of_exp = $query_exp_result1->total_year_exp;
                if($expert_years_of_exp != "6+"){
                    $expert_years_of_exp1 = explode('-',$expert_years_of_exp);
                    $expert_years_of_exp_final =  $expert_years_of_exp1[1] - $expert_years_of_exp1[0];
                } else {
                    $expert_years_of_exp_final = 6;
                }
                $calculated_years_exp['calculated_years_exp'] = $expert_years_of_exp_final;            
                $this->Get_db->update_record($calculated_years_exp,DB_PREFIX.'users','user_id', $query_exp_result1->user_id);
            }
        }*/
        
        
        //$candidate_id = 116; 
        
                                   /*                              *
                                    *         Candidate's data     *
                                    *                              */
        
        $this->db->select('*,SUM(amazetal_user_edu.uni_score) as total_uni_score,SUM(amazetal_universities.uni_rank) as total_uni_rank,SUM(amazetal_companies.company_rank) as total_company_rank');
        $this->db->from('amazetal_users');
        $this->db->join('amazetal_user_role', 'amazetal_user_role.user_id = amazetal_users.user_id','left');
        $this->db->join('amazetal_user_edu', 'amazetal_user_edu.user_id = amazetal_users.user_id','left');
        $this->db->join('amazetal_universities', 'amazetal_universities.uni_id = amazetal_user_edu.uni_id','left');
        $this->db->join('amazetal_user_companies', 'amazetal_user_companies.user_id = amazetal_users.user_id','left'); 
        $this->db->join('amazetal_interested_area', 'amazetal_user_role.area_id = amazetal_interested_area.area_id','left'); 
        $this->db->join('amazetal_user_skill', 'amazetal_user_skill.user_id = amazetal_users.user_id','left');
        $this->db->join('amazetal_skill', 'amazetal_user_skill.skill_id = amazetal_skill.skill_id','left');
        $this->db->join('amazetal_companies', 'amazetal_user_companies.company_id = amazetal_companies.company_id','left');
        $this->db->join('amazetal_cities', 'amazetal_cities.id = amazetal_users.location_id','left');
        $this->db->join('amazetal_states', 'amazetal_cities.state_id = amazetal_states.id','left');
        $this->db->join('amazetal_countries', 'amazetal_countries.id = amazetal_states.country_id','left');
        $this->db->join('amazetal_location_matrix', 'amazetal_cities.id = amazetal_location_matrix.location_city','left');
        $this->db->join('amazetal_role', 'amazetal_user_role.role_id = amazetal_role.role_id','left');
        $this->db->where('amazetal_users.user_id',$candidate_id);
        $this->db->group_by('amazetal_users.user_id'); 
        $query = $this->db->get();
        $basic_user_info = $query->result();
        //if(!empty($basic_user_info)){
        $candidate_info = $basic_user_info[0];
        /*} else {
            return false;
        }*/
        
        echo "<pre>";
        print_r($candidate_info);
        echo "</pre>";
        exit();
        
       
        
        
                            /*                              *
                            *   Algorithm validations       *
                            *                               */
            $expert_array = array('amazetal_users.role'=>'career_experts');
            
            $expert_array['amazetal_users.profile_completion >='] = 101;
            
            $expert_array['amazetal_users.calculated_years_exp >='] = $candidate_info->calculated_years_exp;
            
            $expert_array['total_uni_score >='] = $candidate_info->total_uni_score;
            
            $expert_array['amazetal_users.Career_Track'] = $candidate_info->Career_Track;
            
            //$expert_array['role_name'] = $candidate_info->role_name;




                            /*                              *
                             *         Experts data         *
                             *                              */
                            
        $this->db->select('*,SUM(amazetal_user_edu.uni_score) as total_uni_score, amazetal_users.user_id as expert_id, SUM(amazetal_universities.uni_rank) as total_uni_rank, SUM(amazetal_companies.company_rank) as total_company_rank',false);
        $this->db->from('amazetal_users');
        $this->db->join('amazetal_user_role', 'amazetal_user_role.user_id = amazetal_users.user_id','left');
        $this->db->join('amazetal_user_edu', 'amazetal_user_edu.user_id = amazetal_users.user_id','left');
        $this->db->join('amazetal_universities', 'amazetal_universities.uni_id = amazetal_user_edu.uni_id','left');
        $this->db->join('amazetal_user_companies', 'amazetal_user_companies.user_id = amazetal_users.user_id','left');
        $this->db->join('amazetal_companies', 'amazetal_user_companies.company_id = amazetal_companies.company_id','left');
        $this->db->join('amazetal_cities', 'amazetal_cities.id = amazetal_users.location_id','left');
        $this->db->join('amazetal_states', 'amazetal_cities.state_id = amazetal_states.id','left');
        $this->db->join('amazetal_countries', 'amazetal_countries.id = amazetal_states.country_id','left');
        $this->db->join('amazetal_location_matrix', 'amazetal_cities.id = amazetal_location_matrix.location_city','left');
        $this->db->join('amazetal_role', 'amazetal_user_role.role_id = amazetal_role.role_id','left'); 
        $this->db->join('amazetal_interested_area', 'amazetal_user_role.area_id = amazetal_interested_area.area_id','left'); 
        $this->db->join('amazetal_user_skill', 'amazetal_user_skill.user_id = amazetal_users.user_id','left');
        $this->db->join('amazetal_skill', 'amazetal_user_skill.skill_id = amazetal_skill.skill_id','left');
        
        $this->db->where($expert_array);      
        
        
        $this->db->group_by('amazetal_users.user_id'); 
        $query = $this->db->get();
        
        
        
        
        return $query->result();
        
        //$data['query'] = $this->db->last_query();
                
        //$data['all_experts'] = $query_result;
        
        
        
    }
    
    
	public function index(){
	

		//$data = $this->html_content();
        
        
        $this->db->select('*');
        $this->db->from('amazetal_users');
        $query_exp = $this->db->get();
        $this->db->group_by('user_id'); 
        $query_exp_result = $query_exp->result();
        
        foreach($query_exp_result as $query_exp_result1)
        {
            
            
            if($query_exp_result1->role === 'candidates' || $query_exp_result1->role === 'career_experts')
            {
                
                if($query_exp_result1->profile_completion >= 100)
                {
                    //echo "<pre>";
                    //print_r($query_exp_result1);
                    //echo "</pre>";
                    //exit();
                
                    $this->db->select('SUM(uni_score) as total_uni_score');
                    $this->db->from('amazetal_user_edu');
                    $this->db->where('user_id',$query_exp_result1->user_id);
                    //$this->db->group_by('user_id'); 
                    $query_edu = $this->db->get();
                    
                    $query_edu_result = $query_edu->result();
                    
                    //echo "<pre>";
                    //print_r($query_edu_result);
                    //echo "</pre>";
                    foreach($query_edu_result as $query_edu_result1)
                    {
                       
                        
                        $calculated_edu['total_uni_score'] = $query_edu_result1->total_uni_score;            
                       // $this->Get_db->update_record($calculated_edu,DB_PREFIX.'users','user_id', $query_exp_result1->user_id);
                    }
                
                }
            }
            
            
            
            /*if(empty($query_exp_result1->calculated_years_exp) && !empty($query_exp_result1->total_year_exp))
            {
                $expert_years_of_exp = $query_exp_result1->total_year_exp;
                if($expert_years_of_exp != "6+"){
                    $expert_years_of_exp1 = explode('-',$expert_years_of_exp);
                    $expert_years_of_exp_final =  $expert_years_of_exp1[1] - $expert_years_of_exp1[0];
                } else {
                    $expert_years_of_exp_final = 6;
                }
                $calculated_years_exp['calculated_years_exp'] = $expert_years_of_exp_final;            
                $this->Get_db->update_record($calculated_years_exp,DB_PREFIX.'users','user_id', $query_exp_result1->user_id);
            }*/
            
            
            
            
            
            
        }
        
        
        //exit();
        
        
        $candidate_id = 12; 
        
                                   /*                              *
                                    *         Candidate's data     *
                                    *                              */
        
        $this->db->select('*,SUM(amazetal_universities.uni_rank) as total_uni_rank,SUM(amazetal_companies.company_rank) as total_company_rank');
        $this->db->from('amazetal_users');
        $this->db->join('amazetal_user_role', 'amazetal_user_role.user_id = amazetal_users.user_id','inner');
        $this->db->join('amazetal_user_edu', 'amazetal_user_edu.user_id = amazetal_users.user_id','inner');
        $this->db->join('amazetal_universities', 'amazetal_universities.uni_id = amazetal_user_edu.uni_id','left');
        $this->db->join('amazetal_user_companies', 'amazetal_user_companies.user_id = amazetal_users.user_id','left'); 
        $this->db->join('amazetal_interested_area', 'amazetal_user_role.area_id = amazetal_interested_area.area_id','left'); 
        $this->db->join('amazetal_user_skill', 'amazetal_user_skill.user_id = amazetal_users.user_id','inner');
        $this->db->join('amazetal_skill', 'amazetal_user_skill.skill_id = amazetal_skill.skill_id','inner');
        $this->db->join('amazetal_companies', 'amazetal_user_companies.company_id = amazetal_companies.company_id','left');
        $this->db->join('amazetal_cities', 'amazetal_cities.id = amazetal_users.location_id','inner');
        $this->db->join('amazetal_states', 'amazetal_cities.state_id = amazetal_states.id','inner');
        $this->db->join('amazetal_countries', 'amazetal_countries.id = amazetal_states.country_id','inner');
        $this->db->join('amazetal_location_matrix', 'amazetal_cities.id = amazetal_location_matrix.location_city','left');
        //$this->db->join('amazetal_role', 'amazetal_user_role.role_id = amazetal_role.role_id','left');
        //$this->db->where('amazetal_user_role.user_id',$candidate_id);
        
        $this->db->group_by('amazetal_users.user_id'); 
        $query = $this->db->get();
        $basic_user_info = $query->result();
        $candidate_info = $basic_user_info[0];
        
        
        /*echo "<pre>";
        print_r($candidate_info);
        echo "</pre>";*/
       
        
        
                            /*                              *
                            *   Algorithm validations       *
                            *                               */
            $expert_array = array('amazetal_users.role'=>'career_experts');
            
            //$expert_array['amazetal_users.calculated_years_exp >='] = $candidate_info->calculated_years_exp;
            
            //$expert_array['amazetal_user_edu.uni_score'] = $candidate_info->uni_score;
            
            //$expert_array['amazetal_users.Career_Track'] = $candidate_info->Career_Track;
            
            $expert_array['amazetal_user_role.role_name'] = $candidate_info->role_name;
        
        
             
        
        


        
                            /*                              *
                             *         Experts data         *
                             *                              */
                            
        $this->db->select('*,SUM(amazetal_universities.uni_rank) as total_uni_rank,SUM(amazetal_companies.company_rank) as total_company_rank');
        $this->db->from('amazetal_users');
        $this->db->join('amazetal_user_role', 'amazetal_user_role.user_id = amazetal_users.user_id','left');
        $this->db->join('amazetal_user_edu', 'amazetal_user_edu.user_id = amazetal_users.user_id','left');
        $this->db->join('amazetal_universities', 'amazetal_universities.uni_id = amazetal_user_edu.uni_id','left');
        $this->db->join('amazetal_user_companies', 'amazetal_user_companies.user_id = amazetal_users.user_id','left');
        $this->db->join('amazetal_companies', 'amazetal_user_companies.company_id = amazetal_companies.company_id','left');
        /*$this->db->join('amazetal_cities', 'amazetal_cities.id = amazetal_users.location_id','inner');
        $this->db->join('amazetal_states', 'amazetal_cities.state_id = amazetal_states.id','inner');
        $this->db->join('amazetal_countries', 'amazetal_countries.id = amazetal_states.country_id','inner');
        $this->db->join('amazetal_location_matrix', 'amazetal_cities.id = amazetal_location_matrix.location_city','left');*/
        //$this->db->join('amazetal_role', 'amazetal_user_role.role_id = amazetal_role.role_id','left'); 
        //$this->db->join('amazetal_interested_area', 'amazetal_user_role.area_id = amazetal_interested_area.area_id','left'); 
        //$this->db->join('amazetal_user_skill', 'amazetal_user_skill.user_id = amazetal_users.user_id','inner');
        //$this->db->join('amazetal_skill', 'amazetal_user_skill.skill_id = amazetal_skill.skill_id','inner');
        
        $this->db->where($expert_array);      
        
        
        $this->db->group_by('amazetal_users.user_id'); 
        $query = $this->db->get();
        $query_result = $query->result();
        
        $data['query'] = $this->db->last_query();
                
        $data['all_experts'] = $query_result;
        
        
        echo "<pre>";
        print_r($data['all_experts']);
        echo "</pre>";
        
       
    }
    
    //appends all error messages
    private function handle_error($err) {
        $this->error .= $err . "rn";
    }
 
    //appends all success messages
    private function handle_success($succ) {
        $this->success .= $succ . "rn";
    }
    
    
    function video_upload(){
        $data = array();
        /*echo "<pre>";
        print_r($this->input->post());
        echo "</pre>";*/
        
        
        if ($this->input->post('filename')) {
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
                            //$this->handle_error('Select a video file.');
                            $data['msg'] = 'Select a video file.';
                        }
                        //if file was selected then proceed to upload
                        if (!$is_file_error) {
                            //load the preferences
                            $this->load->library('upload', $config);
                            //check file successfully uploaded. 'video_name' is the name of the input
                            if (!$this->upload->do_upload('video_name')) {
                                //if file upload failed then catch the errors
                                //$this->handle_error($this->upload->display_errors());
                                $data['msg'] = $this->upload->display_errors();
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
                            //$this->handle_success('Video was successfully uploaded to direcoty <strong>' . $upload_path . '</strong>.');
                            $data['msg'] = 'Video was successfully uploaded to direcoty <strong>' . $upload_path . $video_data['file_name'].$video_data['file_type']. '</strong>.';
                            
                            $to_inset_data = array();
                            $to_inset_data['video'] = $upload_path.$video_data['file_name'];
                            $to_inset_data['job_unique_id'] = $job_unique_id;
                            $to_inset_data['uploader'] = $email;
                            
                            //$directory_path = ""
                            //$this->db->insert('amazetal_job_videos', $data);
                            //echo shell_exec("ffmpeg -i ".$upload_path.$video_data['file_name']." ".$upload_path.$video_data['file_name'].".flv"); 
                            //shell_exec("ffmpegPath  -i sample.mov-s 1280x720 -metadata title='Sample' -bufsize 1835k -b:v 1000k -vcodec libx264 -acodec libfdk_aac sample.mp4");
                        }
                        
                        
                        echo $data['msg'];
                    }else{
                    //load the error and success messages
                    //$data['errors'] = $this->error;
                    //$data['success'] = $this->success;
                    
                    
                    
                    
                    
                    $data['pageTitle'] = "Upload video";
                    /*echo '<pre>';
                    print_r($data);
                    echo '</pre>';*/
                    
                    //$this->load->view('Home_header', @$data);
                    $this->load->view('view_job_video_test', @$data);
                    //$this->load->view('Home_footer', @$data);
                    }
    }
    
    
    function new_upload(){
        if ($this->input->post('video_name')) {
        $file				= 'video_name';
        $config['upload_path']		= './upload/video_folder/';
        $config['allowed_types'] 	= 'mov|mpeg|mp3|avi';
        $config['max_size']		= '50000';
        $config['max_width']  		= '';
        $config['max_height']  		= '';
        
        $this->upload->initialize($config);
        $this->load->library('upload', $config);
        
        if(!$this->upload->do_upload($file))
        {
        	// If there is any error
        	$err_msgs .= 'Error in Uploading video '.$this->upload->display_errors().'<br />';
        }
        else
        {
        	$data=array('upload_data' => $this->upload->data());
        	$video_path = $data['upload_data']['file_name'];
        
        	$directory_path 	 = $data['upload_data']['file_path'];
        	$directory_path_full      = $data['upload_data']['full_path'];
        	$file_name 		= $data['upload_data']['raw_name'];
        	
        	// ffmpeg command to convert video
        				
        	exec("ffmpeg -i ".$directory_path_full." ".$directory_path.$file_name.".flv"); 
        // $file_name is same file name that is being uploaded but you can give your custom video name after converting So use something like myfile.flv.
        	
        	/// In the end update video name in DB 
        	$array = array(
        		'video' => $file_name.'.'.'flv',
        		);
        	//$this->db->set($array);
        	//$this->db->where('id',$id); // Table where you put video name
        	//$query = $this->db->update('user_videos'); 	
        }
        
        }
    }
    
    
    
    function add_skills_to(){
        if ($this->input->post('video_name')) {
        $file				= 'video_name';
        $config['upload_path']		= './upload/video_folder/';
        $config['allowed_types'] 	= 'mov|mpeg|mp3|avi';
        $config['max_size']		= '50000';
        $config['max_width']  		= '';
        $config['max_height']  		= '';
        
        $this->upload->initialize($config);
        $this->load->library('upload', $config);
        
        if(!$this->upload->do_upload($file))
        {
        	// If there is any error
        	$err_msgs .= 'Error in Uploading video '.$this->upload->display_errors().'<br />';
        }
        else
        {
        	$data=array('upload_data' => $this->upload->data());
        	$video_path = $data['upload_data']['file_name'];
        
        	$directory_path 	 = $data['upload_data']['file_path'];
        	$directory_path_full      = $data['upload_data']['full_path'];
        	$file_name 		= $data['upload_data']['raw_name'];
        	
        	// ffmpeg command to convert video
        				
        	exec("ffmpeg -i ".$directory_path_full." ".$directory_path.$file_name.".flv"); 
        // $file_name is same file name that is being uploaded but you can give your custom video name after converting So use something like myfile.flv.
        	
        	/// In the end update video name in DB 
        	$array = array(
        		'video' => $file_name.'.'.'flv',
        		);
        	//$this->db->set($array);
        	//$this->db->where('id',$id); // Table where you put video name
        	//$query = $this->db->update('user_videos'); 	
        }
        
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
    
    
    
    function update_job_slug(){
        $this->db->select('amazetal_job.*,amazetal_users.company_id');
        $this->db->from('amazetal_job');
        $this->db->join('amazetal_users', 'amazetal_job.emp_id = amazetal_users.user_id','inner');
        $query = $this->db->get();
        $query_result = $query->result();
        
        foreach($query_result as $job){
            if(empty($job->slug)){
             $save['slug'] = $this->slugify($job->company_id).'-'.$this->slugify($job->job_title).'-'.$this->slugify($job->job_unique_id);
                     
             $this->Get_db->update_record($save,'amazetal_job','job_unique_id', $job->job_unique_id);   
            }
        }
        
        
    }
    
    
    public function ajax_upload_file()
    {
        $status = "";
    $msg = "";
    $file_element_name = 'video_name';
     
    /*if (empty($_POST['filename']))
    {
        $status = "error";
        $msg = "Please enter a title";
    }*/
     
    if ($status != "error")
    {
        //file upload destination
        $upload_path = './upload/jobvideo/';
        $config['upload_path'] = $upload_path;
        //allowed file types. * means all types
        $config['allowed_types'] = 'wmv|mp4|avi|mov';
        //allowed max file size. 0 means unlimited file size
        $config['max_size'] = '0';
        //max file name size
        //$config['max_filename'] = '255';
        //whether file name should be encrypted or not
        $config['encrypt_name'] = FALSE;
        
        
        /*$config['upload_path'] = './files/';
        $config['allowed_types'] = 'gif|jpg|png|doc|txt';
        $config['max_size'] = 1024 * 8;
        $config['encrypt_name'] = TRUE;*/
        
        //store video info once uploaded
        $data = array();
        //check for errors
        /*$is_file_error = FALSE;
        //check if file was selected for upload
        if (!$_FILES) {
            $is_file_error = TRUE;
            $status = 'error';
            $msg = 'Select a video file.';
        }
        
        if (!$is_file_error) {*/
 
        $this->load->library('upload', $config);
 
        if (!$this->upload->do_upload($file_element_name))
        {
            $status = 'error';
            $msg = $this->upload->display_errors('', '');
        }
        else
        {
            $data = $this->upload->data();
            $file_id = $this->files_model->insert_file($data['file_name'], $_POST['filename']);
            if($file_id)
            {
                $status = "success";
                $msg = "File successfully uploaded";
            }
            else
            {
                unlink($data['full_path']);
                $status = "error";
                $msg = "Something went wrong when saving the file, please try again.";
            }
        }
        @unlink($_FILES[$file_element_name]);
       // }

    }
    echo json_encode(array('status' => $status, 'msg' => $msg));
    }
    
    
    function save_file(){
        set_time_limit(0);
        
        $url = "https://ucarecdn.com/5cdcf2ac-e6d5-464d-b4b5-2a9847ad7bcd/SupriyaGadhaveTester1.mp4";
       
        $dir = "./upload/video_folder/";
        
       //$content = file_get_contents($url);
        //file_put_contents($dir . basename($url), $content);
       //$url = "https://ucarecdn.com/5cdcf2ac-e6d5-464d-b4b5-2a9847ad7bcd/SupriyaGadhaveTester1.mp4";
       
        //$dir = "./upload/video_folder/";
        $lfile = fopen($dir . basename($url), "w+");
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_TIMEOUT, 50);
        curl_setopt($ch, CURLOPT_URL, $url);
        //curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1)');
        curl_setopt($ch, CURLOPT_FILE, $lfile);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_exec($ch);
        if (curl_errno($ch)) {
				echo 'Error:' . curl_error($ch);
			} 
        curl_close($ch);
        fclose($lfile);
        if (curl_errno($ch)) {
				echo 'Error:' . curl_error($ch);
			}
        //curl_close($ch);
    }
    
    
    function uploadcare_file(){
       
        $demopublickey = '5c13c29e2a2e499b512c';
        $demoprivatekey = 'fa3f316e16aada5ca434';
        $ch = curl_init();

			//curl_setopt($ch, CURLOPT_URL, "https://api.uploadcare.com/files/b635798c-1fb2-4aac-bd00-aeb7f086890d/storage/");
            curl_setopt($ch, CURLOPT_URL, "https://api.uploadcare.com/files/?limit=100&ordering=-size");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			$headers = array();
			$headers[] = "Authorization: Uploadcare.Simple $demopublickey:$demoprivatekey";
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$result = curl_exec($ch);
            if (curl_errno($ch)) {
				echo 'Error:' . curl_error($ch);
			}
			curl_close ($ch);
            $decoded_result = json_decode($result);
            
            foreach($decoded_result->results as $file){
                echo "<pre>";
    			echo "uuid: ". $file->uuid.'<br />';
                echo "original_file_url: ". $file->original_file_url;
                echo "</pre>"; 
            }
            
			
    }
    
    
    function file_convert(){
        $curl = curl_init();
        
        $post_fields = array( 'input'=>	
                	array(
                        array(
                            "type" => "remote",
                            "source" => "http://ec2-52-26-41-11.us-west-2.compute.amazonaws.com/upload/video_folder/hm_1539510782.mov"
                        )
                    
                    ),
            	'conversion'=>	
            	array(
                    array(
                        "target" => "mp4"
                    )		  
            			  
   			    )
               );

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api2.online-convert.com/jobs",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => json_encode($post_fields),
          CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "postman-token: 99cbd39b-b00f-c91b-fce6-9ef800485d98",
            "x-oc-api-key: f5cd2604eef90efd2c8accea539fc972"
          ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
            echo "<pre>";
          print_r($response);
          echo "</pre>";
        }
    }
    
    
    function file_convert_http(){

        $endpoint = 'https://api2.online-convert.com/jobs';
        $apikey = 'f5cd2604eef90efd2c8accea539fc972';
        $debug = FALSE;
    
        $json_resquest = '{
            "input": [{
                "type": "remote",
                "source": "http://ec2-52-26-41-11.us-west-2.compute.amazonaws.com/upload/video_folder/hm_1539510782.mov"
             }],
            "conversion": [{
                "target": "mp4"
             }]
        }';
    
        // No need to change parameters below this line.
    
        $ch = curl_init($endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_resquest);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'X-Oc-Api-Key: '.$apikey,
            'Content-Type: application/json',
            'cache-control: no-cache'
        ));
        if ($debug) {
            curl_setopt($ch, CURLOPT_HEADER, TRUE);
            curl_setopt($ch, CURLINFO_HEADER_OUT, TRUE);
        }
    
        $response = curl_exec($ch);
        $info = curl_getinfo($ch);
        $error =  curl_error($ch);
        curl_close($ch);
        if ($debug) {
            /*echo "<pre>";
            print_r($info);
            echo "</pre>";*/
        }
        $decoded = json_decode($response);
        //echo "<pre>";
            echo $decoded->id;
            //echo "</pre>";
        //echo ."\n";
        if (!empty($error)) {
            echo $error;
        }
    }
    
    
    function conversion_status(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api2.online-convert.com/jobs/bf641786-4989-4d86-9b28-20e35d453c46",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "x-oc-api-key: f5cd2604eef90efd2c8accea539fc972"
          ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
            $decoded = json_decode($response);
            //echo "<pre>";
            echo $decoded->output[0]->uri;
            //echo "</pre>";
          //echo $response;
        }
    }


    
    
}