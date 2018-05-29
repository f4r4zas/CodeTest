<?php

#university_view for previous university columns line number 795  #for faculty line number 810
#university_view for country,state,city line number 811-813
defined('BASEPATH') OR exit('No direct script access allowed');

class Person_model extends CI_Model
{

    var $table = 'users';
    var $column = array('user_id', 'user_country', 'f_Name', 'last_Name', 'User_login', 'user_email', 'gender', 'user_join_date_n_time', 'user_status');
    var $order = array('user_id' => 'desc');


    //Ahsan Code Area
    #region Init
    var $table_Categories = 'categories';
    var $column_Categories = array('Category_Name', 'Description', 'Parent_Category', 'cat_id', 'Icon');
    var $order_Categories = array('cat_id' => 'desc');

	var $table_helpful_videos = 'helpful_videos';
    var $column_helpful_videos = array('Video_Title', 'Youtube_video_link', 'helpful_videos_id');
    var $order_helpful_videos = array('helpful_videos_id' => 'desc');

	//WAQ-apr/2
	var $table_achivement = 'achievement';
    var $column_achivement = array('id', 'num_of_jobs', 'category', 'badge_for_bidder', 'badge_for_poster');
    var $order_achivement = array('id' => 'desc');
	//-------till here
	
    var $table_Membership = 'membership';
    var $column_Membership = array('Title', 'Post_Validation', 'Commission', 'Days', 'Description');
    var $order_Membership = array('MemberShipId' => 'desc');

    var $table_jobTitle = 'post_a_job';
    var $column_jobTitle = array('job_id', 'user_id', 'jobTitle', 'Select_Category', 'Job_Complexity', 'Location', 'filebutton', 'Job_Descriptive', 'Availability', 'job_status', 'job_creation_date');
    var $order_jobTitle = array('post_a_job.Job_Title_Id' => 'desc');

    var $table_country = 'countries';
    var $column_country = array('id', 'name', 'iso', 'iso3', 'numcode');
    var $order_country = array('id' => 'desc');


    var $table_cms = 'cms';
    var $column_cms = array('CmsId', 'CmsTitle', 'CmsContent');
    var $order_cms = array('CmsId' => 'desc');

 
    var $table_help_and_supp = 'help_and_supp';
    var $column_help_and_supp = array('help_and_supp_id', 'help_and_supp_help_Icon', 'help_and_supp_help_Heading', 'help_and_supp_help_Short_Content', 'help_and_supp_content');
    var $order_help_and_supp = array('help_and_supp_id' => 'desc');

  
    var $table_page = 'pagetitle';
    var $column_page = array('PageTitleId', 'PageTitle', 'PageContent', 'SubHead1', 'SubHead2', 'SubHead3', 'SubHead4', 'SubHeadContent1', 'SubHeadContent2', 'SubHeadContent3', 'SubHeadContent4', 'icon1', 'icon2', 'icon3', 'icon' );
    var $order_page = array('PageTitleId' => 'desc');

    var $table_question = 'question';
    var $column_question = array('QuestionId', 'Question');
    var $order_question = array('QuestionId' => 'desc');

    var $table_SendYourProposal = 'sendyourproposal';

    #endregion
    //End Ahsan Code Area

    //
    var $table_slider = 'slider';

    var $column_slider = array('SliderId', 'SliderName', 'SliderTemp','slider_title_small','slider_title_big','slider_slogan','slider_desc' );
    var $order_slider = array('SliderId' => 'desc');

    /**********company matrix SECTION START***********/    
    var $table_c_matrix = 'amazetal_companies';
    var $column_c_matrix = array('company_id', 'company_rank', 'company_name');
    // var $order_c_matrix = array('id' => 'desc');
    /**********END company matrix ***********/



    var $table_users = "amazetal_users";


    var $table_blocked_pages = "amazetal_blocked_pages";


    /********* Menu Pages *******/
    var $table_meunu = 'amazetal_menu_pages';
    #region User

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
	
	//WAQ-apr/2
    function get_datatables_achivement()
    {
        $this->_get_datatables_query_achivement();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
		
		@$result = $query->result();
		if($result){
			foreach($result as $res){
				// echo $res->category;
				if($res->category == 0 ){
					// $category = $this->get_by_id_cat($res->category);
				($res->category = "Any Category");
				} else {
					$category = $this->get_by_id_cat($res->category);
				($res->category = $category->Category_Name);
				}
				
			}
			// print_r($result);
		}
		
		
		
        return $result;
    }
	
	private function _get_datatables_query_achivement()
    {
        $this->db->from($this->table_achivement);
        $i = 0;
        foreach ($this->column_achivement as $item) {
            if ($_POST['search']['value'])
                ($i === 0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
            $column_achivement[$i] = $item;
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($column_achivement[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
	
	
    private function _get_datatables_query()
    {

$this->db->select('*');
$this->db->from($this->table);
// $this->db->join('countries', 'users.user_country = countries.id', 'left');
// $this->db->join('users', 'users.user_id = order_history.user_id', 'left');

        //$this->db->from($this->table);

        $i = 0;

        foreach ($this->column as $item) {
            if ($_POST['search']['value'])
                ($i === 0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
            $column[$i] = $item;
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function get_col_detail($id,$table,$col_name,$where_columns_key=null)
    {
        $this ->db->from($table);
        $this ->db-> select($col_name);
		if(!empty($where_columns_key)){
			 $this->db->where($where_columns_key, $id);
		}
       
        $query = $this->db->get()->result();
        return $query;
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function get_by_user_id($user_id)
    {
//		$this->db->select('*');
//		$this->db->from($this->table);
//		$this->db->join('user_meta', 'users.user_id = user_meta.user_id','left ');


        $this->db->from($this->table);
        $this->db->where('users.user_id', $user_id);
        $query = $this->db->get();

        return $query->row();
    }
	
	/*WAQ-apr/2*/
	public function get_by_achievement_id($id)
    {


        $this->db->from($this->table_achivement);
        $this->db->where('id', $id);
        $query = $this->db->get();
		

        return $query->row();
    }
	
    public function save($tablename, $data)
    {
        $this->db->insert($tablename, $data);
        return $this->db->insert_id();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_user_id($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->delete($this->table);
    }

    public function delete_by_achievement_id($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('achievement');
    }

    #endregion User
    //This Is Ahsan Code Area Please Categories//


    #region Categories

    function get_datatables_Categories()
    {
        $this->_get_datatables_query_Categories();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    } 
	function get_datatables_helpful_videos()
    {
        $this->_get_datatables_helpful_videos();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    private function _get_datatables_helpful_videos()
    {
		
		
		
        $this->db->from($this->table_helpful_videos);
        $i = 0;
        foreach ($this->column_helpful_videos as $item) {
            if ($_POST['search']['value'])
                ($i === 0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
            $column_Categories[$i] = $item;
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($column_Categories[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
	private function _get_datatables_query_Categories()
    {
        $this->db->from($this->table_Categories);
        $i = 0;
        foreach ($this->column_Categories as $item) {
            if ($_POST['search']['value'])
                ($i === 0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
            $column_Categories[$i] = $item;
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($column_Categories[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function count_filtered_Categories()
    {
        $this->_get_datatables_query_Categories();
        $query = $this->db->get();
        return $query->num_rows();
    }
	function count_filtered_helpful_videos()
    {
        $this->_get_datatables_helpful_videos();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_Categories()
    {
        $this->db->from($this->table_Categories);
        return $this->db->count_all_results();
    }
	public function count_all_helpful_videos()
    {
        $this->db->from($this->table_helpful_videos);
        return $this->db->count_all_results();
    }

    public function get_by_id_Categories($id)
    {
        $this->db->from($this->table_Categories);
        $this->db->where('cat_id', $id);
        $query = $this->db->get();
        return $query->row();
    }
	public function get_by_helpful_videos($id)
    {
        $this->db->from($this->table_helpful_videos);
        $this->db->where('helpful_videos_id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function delete_by_id_Categories($id)
    {
        $this->db->where('cat_id', $id);
        $this->db->delete($this->table_Categories);
    }

    public function delete_by_id_helpful_videos($id)
    {
        $this->db->where('helpful_videos_id', $id);
        $this->db->delete($this->table_helpful_videos);
    }

    public function save_Categories($data)
    {
        $this->db->insert($this->table_Categories, $data);
        return $this->db->insert_id();
    }

	public function single_col($table ,$col,$where_col,$where_val)
	{
		$this->db->select($col);
		$this->db->where($where_col,$where_val);
		$rs = $this->db->get($table);
		return $rs->result_array();
		
	}
    function get_datatables_country()
    {
        $this->_get_datatables_query_country();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    private function _get_datatables_query_country()
    {
        $this->db->from($this->table_country);
        $i = 0;
        foreach ($this->column_country as $item) {
            if ($_POST['search']['value'])
                ($i === 0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
            $column_country[$i] = $item;
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($column_country[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function count_filtered_country()
    {
        $this->_get_datatables_query_country();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_country()
    {
        $this->db->from($this->table_country);
        return $this->db->count_all_results();
    }

    public function get_by_id_country($id)
    {
        $this->db->from($this->table_country);
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function delete_by_id_country($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table_country);
    }

    public function save_country($data)
    {
        $this->db->insert($this->table_country, $data);
        return $this->db->insert_id();
    }

    public function update_country($where, $data)
    {
        $this->db->update($this->table_country, $data, $where);
        return $this->db->affected_rows();
    }
    #endregion  Country
    //This Is Ahsan End Code Area Please //


    //This Is Ahsan Code Area Please CMS //

    #region CMS

    function get_datatables_cms()
    {
        $this->_get_datatables_query_cms();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function get_datatables_help_and_support()
    {
        $this->_get_datatables_query_help_and_support();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    private function _get_datatables_query_cms()
    {
        $this->db->from($this->table_cms);
        $i = 0;
        foreach ($this->column_cms as $item) {
            if ($_POST['search']['value'])
                ($i === 0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
            $column_cms[$i] = $item;
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($column_cms[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

 

    function count_filtered_cms()
    {
        $this->_get_datatables_query_cms();
        $query = $this->db->get();
        return $query->num_rows();
    }

   

    public function count_all_cms()
    {
        $this->db->from($this->table_cms);
        return $this->db->count_all_results();
    }
 

    public function get_by_id_cms($id)
    {
        $this->db->from($this->table_cms);
        $this->db->where('CmsId', $id);
        $query = $this->db->get();
        return $query->row();
    }


  

    public function delete_by_id_cms($id)
    {
        $this->db->where('CmsId', $id);
        $this->db->delete($this->table_cms);
    }

   

    public function save_cms($data)
    {
        $this->db->insert($this->table_cms, $data);
        return $this->db->insert_id();
    }

    public function update_cms($where, $data)
    {
        $this->db->update($this->table_cms, $data, $where);
        return $this->db->affected_rows();
    }
	
 

    function getCountry()
    {
        $q = $this->db->query("SELECT * FROM `countries`");
        foreach ($q->result() as $rows) {
            $data[] = $rows;
        }
        return $data;
    }

    

   

    function get_datatables_slider()
    {
        $this->_get_datatables_query_slider();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    } 
	

    private function _get_datatables_query_slider()
    {
        $this->db->from($this->table_slider);
        $i = 0;
        foreach ($this->column_slider as $item) {
            if ($_POST['search']['value'])
                ($i === 0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
            $column_slider[$i] = $item;
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($column_slider[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function count_filtered_slider()
    {//slider
        $this->_get_datatables_query_slider();
        $query = $this->db->get();
        return $query->num_rows();
    }


    public function count_all_slider()
    {
        $this->db->from($this->table_slider);
        return $this->db->count_all_results();
    }

		public function get_by_id_slider($id)
		{//slider
			$this->db->from($this->table_slider);
			$this->db->where('SliderId', $id);
			$query = $this->db->get();
			return $query->row();
		}


    public function delete_by_id_slider($id)
    {
        $this->db->where('SliderId', $id);
        $this->db->delete($this->table_slider);
    }

    public function save_slider($data)
    {
        $this->db->insert($this->table_slider, $data);
        return $this->db->insert_id();
    } 
	

    public function update_slider($where, $data)
    {
        $this->db->update($this->table_slider, $data, $where);
        return $this->db->affected_rows();
    }
	
	
    /**********Company Matrix START***********/
    
    function get_datatables_c_matrix()
    {
        $this->_get_datatables_query_c_matrix();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    private function _get_datatables_query_c_matrix()
    {
        $this->db->from($this->table_c_matrix);
        $i = 0;
        foreach ($this->column_c_matrix as $item) {
            if ($_POST['search']['value'])
                ($i === 0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
            $column_c_matrix[$i] = $item;
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($column_c_matrix[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function count_filtered_c_matrix()
    {//c_company
        $this->_get_datatables_query_c_matrix();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_c_matrix()
    {
        $this->db->from($this->table_c_matrix);
        return $this->db->count_all_results();
    }
    /*  START
        GET DATA FROM TABLE AND PUT IT THE FORM- on EDIT BUTTON CLICK*/
    public function get_by_id_c_matrix($id)
    {//slider
        $this->db->from($this->table_c_matrix);
        $this->db->where('company_id', $id);
        $query = $this->db->get();
        return $query->row();
    }
    /*  END
        GET DATA FROM TABLE AND PUT IT THE FORM- on EDIT BUTTON CLICK*/

     /*  START
        SAVE COMPANY DATA*/    
    public function save_c_matrix($data)
    {
        $this->db->insert($this->table_c_matrix, $data);
        return $this->db->insert_id();
    }
    /*****  END
        SAVE COMPANY DATA*****/ 

    /*****  START
        UPDATE COMPANY DATA****/     
    public function update_c_matrix($where, $data)
    {
        $this->db->update($this->table_c_matrix, $data, $where);
        return $this->db->affected_rows();
    }
    /***** END
        UPDATE COMPANY DATA*****/   


    /*****  START
        DELETE COMPANY DATA****/    
    public function delete_by_id_c_matrix($id)
    {
        $this->db->where('company_id', $id);
        $this->db->delete($this->table_c_matrix);
    }
    /*  END
        DELETE COMPANY DATA*/ 
    
    /**********END Company matrix***********/
	

    /**********Faculty START***********/

    var $table_faculty = 'amazetal_interested_area';
    var $column_faculty = array('area_id','area_name');
    // var $order_c_matrix = array('id' => 'desc');

    function get_datatables_faculty()
    {
        $this->_get_datatables_query_faculty();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    private function _get_datatables_query_faculty()
    {
        $this->db->from($this->table_faculty);
        $i = 0;
        foreach ($this->column_faculty as $item) {
            if ($_POST['search']['value'])
                ($i === 0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
            $column_faculty[$i] = $item;
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($column_faculty[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function count_filtered_faculty()
    {//faculty
        $this->_get_datatables_query_faculty();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_faculty()
    {
        $this->db->from($this->table_faculty);
        return $this->db->count_all_results();
    }
    /*  START
        GET DATA FROM TABLE AND PUT IT THE FORM- on EDIT BUTTON CLICK*/
    public function get_by_id_faculty($id)
    {//slider
        $this->db->from($this->table_faculty);
        $this->db->where('area_id', $id);
        $query = $this->db->get();
        return $query->row();
    }
    /*  END
        GET DATA FROM TABLE AND PUT IT THE FORM- on EDIT BUTTON CLICK*/

     /*  START
        SAVE FACULTY DATA*/    
    public function save_faculty($data)
    {
        $this->db->insert($this->table_faculty, $data);
        return $this->db->insert_id();
    }
    /*****  END
        SAVE FACULTY DATA*****/ 

    /*****  START
        UPDATE FACULTY DATA****/     
    public function update_faculty($where, $data)
    {
		
		
		// print_r($where);
		// print_r($data);
        $this->db->update('amazetal_interested_area', $data, $where);
        return $this->db->affected_rows();
    }
    /***** END
        UPDATE FACULTY DATA*****/   


    /*****  START
        DELETE FACULTY DATA****/    
    public function delete_by_id_faculty($id)
    {
        $this->db->where('area_id', $id);
        $this->db->delete($this->table_faculty);
    }
    /*  END
        DELETE FACULTY DATA*/ 
    
    /**********END FACULTY***********/
	 
    /**********University START***********/

    var $table_university = 'amazetal_universities';
    var $column_university = array('uni_id','uni_name','uni_rank');
    // var $column_university = array('university_id','university_name','area_name','city_name','state_name','country_name');
    // var $order_c_matrix = array('id' => 'desc');

    function get_datatables_university()
    {
        $this->_get_datatables_query_university();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    private function _get_datatables_query_university()
    {
        $this->db->from($this->table_university);
        // $this->db->join('amazetal_interested_area', 'universities.faculty = amazetal_interested_area.id', 'left');
        // $this->db->join('cities', 'universities.city = cities.id', 'left');
        // $this->db->join('states', 'cities.state_id = states.id', 'left');
        // $this->db->join('countries', 'states.country_id = countries.id', 'left');
        $i = 0;
        foreach ($this->column_university as $item) {
            if ($_POST['search']['value'])
                ($i === 0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
            $column_university[$i] = $item;
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($column_university[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function count_filtered_university()
    {//university
        $this->_get_datatables_query_university();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_university()
    {
        $this->db->from($this->table_university);
        return $this->db->count_all_results();
    }
    /*  START
        GET DATA FROM TABLE AND PUT IT THE FORM- on EDIT BUTTON CLICK*/
    public function get_by_id_university($id)
    {//slider
        $this->db->from($this->table_university);
        $this->db->where('uni_id', $id);
        $query = $this->db->get();
        return $query->row();
    }
    /*  END
        GET DATA FROM TABLE AND PUT IT THE FORM- on EDIT BUTTON CLICK*/

     /*  START
        SAVE UNIVERSITY DATA*/    
    public function save_university($data)
    {
        $this->db->insert($this->table_university, $data);
        return $this->db->insert_id();
    }
    /*****  END
        SAVE UNIVERSITY DATA*****/ 

    /*****  START
        UPDATE UNIVERSITY DATA****/     
    public function update_university($where, $data)
    {
        $this->db->update($this->table_university, $data, $where);
        return $this->db->affected_rows();
    }
    /***** END
        UPDATE UNIVERSITY DATA*****/   


    /*****  START
        DELETE UNIVERSITY DATA****/    
    public function delete_by_id_university($id)
    {
        $this->db->where('uni_id', $id);
        $this->db->delete($this->table_university);
    }
    /*  END

    
        DELETE UNIVERSITY DATA*/ 
    
    /**********END UNIVERSITY***********/
	
	
	
    /**********Start Testimonials***********/
	
	
	 var $table_testimonials = 'testimonials';
	var $column_testimonials = array('testimonials_id', 'testimonials_pic', 'testimonials_desc','testimonials_name','testimonials_company','testimonials_type','main_heading' );
    var $order_testimonials = array('testimonials_id' => 'desc');
	
	
	
	public function save_testimonials($data)
    {
        $this->db->insert($this->table_testimonials, $data);
        return $this->db->insert_id();
    }
	
	function get_datatables_testimonials()
    {
        $this->_get_datatables_query_testimonials();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
	 private function _get_datatables_query_testimonials()
    {
		
		// echo $_POST['search']['value'];
        $this->db->from($this->table_testimonials);
        $i = 0;
        foreach ($this->column_testimonials as $item) {
            if ($_POST['search']['value'])
                ($i === 0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
            $column_testimonials[$i] = $item;
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($column_testimonials[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

	
	 function count_filtered_testimonials()
    {//slider
        $this->_get_datatables_query_testimonials();
        $query = $this->db->get();
        return $query->num_rows();
    }
	
	public function update_testimonials($where, $data)
    {
        $this->db->update($this->table_testimonials, $data, $where);
        return $this->db->affected_rows();
    }
	public function get_by_id_testimonials($id)
		{//slider
			$this->db->from($this->table_testimonials);
			$this->db->where('testimonials_id', $id);
			$query = $this->db->get();
			return $query->row();
		}
	
	
	/**********End Testimonials***********/
	
	/**********Waleed Models***********/
	
	
	public function delete_by_id_table_record($table_name,$where_columns,$id)
    {
        $this->db->where($where_columns, $id);
        $this->db->delete($table_name);
    }
	
	public function update_publicly($table,$where, $data)
    {
        $this->db->update($table, $data, $where);
        return $this->db->affected_rows();
    }
	
	 public function save_publicly($table,$data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
	
	public function get_by_id_publicly($table,$col,$id)
    {//slider
        $this->db->from($table);
        $this->db->where($col, $id);
        $query = $this->db->get();
        return $query->row();
    }
	
	/**********Waleed Models***********/
	
/**********Location Matrix START***********/

    var $table_location_matrix = 'amazetal_location_matrix';
    // var $column_location_matrix = array();
    var $column_location_matrix= '';
    function get_datatables_location_matrix($table,$column)
    {
        $this->table_location_matrix= $table;
        $this->column_location_matrix= $column;

        $query = $this->db->query("select * FROM ".$this->table_location_matrix);
        $this->_get_datatables_query_location_matrix();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();

        return $query->result();
    }

    public function count_location_matrix_count(){

        $sql = "SELECT * FROM " . $this->table_location_matrix;
        $query = $this->db->query($sql);

        return $query->num_rows();
    }

    private function _get_datatables_query_location_matrix()
    {
/*       $sql = "SELECT * FROM " . $this->table_location_matrix . " inner join
                amazetel_location_type_cost where amazetal_location_matrix.location_type = amazetel_location_type_cost.id";

        $query = $this->db->query($sql);


        return $query->result();
        $this->db->select("*");
        //$this->db->from('amazetal_location_matrix');
        $this->db->from("amazetal_location_matrix");
        // $this->db->join('amazetal_interested_area', 'universities.faculty = amazetal_interested_area.id', 'left');
        $this->db->join('amazetel_location_type_cost', 'amazetal_location_matrix.location_type = amazetel_location_type_cost.id', 'left');

        /*$this->db->join('states', 'cities.state_id = states.id', 'left');
        $this->db->join('location_type', 'amazetal_location_matrix.location_type = amazetel_location_type_cost.cost_price', 'left');

        $i = 0;
        foreach ($this->column_location_matrix as $item) {
            if ($_POST['search']['value'])
                ($i === 0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
            $column_location_matrix[$i] = $item;
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($column_location_matrix[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }

        //$this->db->get();

        var $get_this  = $this->db->result();
                 return $get_this;*/
return 1;
    }

    public function count_filtered_location_matrix()
    {//university

        $this->_get_datatables_query_location_matrix();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_location_matrix()
    {

        $this->db->from($this->table_location_matrix);
        return $this->db->count_all_results();
    }
    /*  START
        GET DATA FROM TABLE AND PUT IT THE FORM- on EDIT BUTTON CLICK*/
    public function get_by_id_location_matrix($table,$col,$id)
    {//slider

        $this->db->from($table);
        $this->db->where($col, $id);
        $query = $this->db->get();
        return $query->row();
    }
    /*  END
        GET DATA FROM TABLE AND PUT IT THE FORM- on EDIT BUTTON CLICK*/

     /*  START
        SAVE UNIVERSITY DATA*/    
    public function save_location_matrix($table,$data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
    /*****  END
        SAVE UNIVERSITY DATA*****/ 

    /*****  START
        UPDATE UNIVERSITY DATA****/     
    public function update_location_matrix($tbl,$where, $data)
    {

       $this->db->update($tbl, $data, $where);
        return $this->db->affected_rows();
    }
    /***** END
        UPDATE UNIVERSITY DATA*****/   


    /*****  START
        DELETE UNIVERSITY DATA****/    
    public function delete_by_id_location($where,$id,$table)
    {
        $this->db->where($where, $id);
        $this->db->delete($table);
    }
    /*  END
        DELETE UNIVERSITY DATA*/ 
    
    /**********END UNIVERSITY***********/
	
	
    /**********Add amazetal_role***********/
	
	
	
	var $table_preferred_roles = 'amazetal_role';
    var $column_preferred_roles = array('role_id','area_name','role_name');
	function get_datatables_preferred_roles()
    {
        $this->_get_datatables_query_preferred_roles();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
	
	
	 private function _get_datatables_query_preferred_roles()
    {

        $this->db->from($this->table_preferred_roles);
		$this->db->join('amazetal_interested_area', 'amazetal_role.area_id = amazetal_interested_area.area_id', 'left');

        $i = 0;
        foreach ($this->column_preferred_roles as $item) {
            if ($_POST['search']['value'])
                ($i === 0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
            $column_preferred_roles[$i] = $item;
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($column_preferred_roles[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

	
	public function count_filtered_preferred_roles()
    {//amazetal_role
        $this->_get_datatables_query_preferred_roles();
        $query = $this->db->get();
        return $query->num_rows();
    }

	  /**********end amazetal_role***********/
	
        /**********University START***********/

    var $table_skill = 'amazetal_skill';
    // var $column_skill = array('skill_id','skill_name','preferred_roles_name');
    var $column_skill = array('skill_id','skill_name');
    // var $order_c_matrix = array('id' => 'desc');

    function get_datatables_skill()
    {
        $this->_get_datatables_query_skill();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    private function _get_datatables_query_skill()
    {
        $this->db->from($this->table_skill);
        // $this->db->join('amazetal_role', 'skills.preferred_role = amazetal_role.role_id', 'left');
        // $this->db->join('cities', 'universities.city = cities.id', 'left');
        // $this->db->join('states', 'cities.state_id = states.id', 'left');
        // $this->db->join('countries', 'states.country_id = countries.id', 'left');
        $i = 0;
        foreach ($this->column_skill as $item) {
            if ($_POST['search']['value'])
                ($i === 0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
            $column_skill[$i] = $item;
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($column_skill[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
	
    ################## Help Center ##################
     var $table_help = 'help';
    var $column_help =  array('id','heading','sub_heading');
    //var $column_help =  array('id','heading','sub_heading','type');
    // var $order_c_matrix = array('id' => 'desc');

    function get_datatables_help()
    {
        $this->_get_datatables_query_help();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    private function _get_datatables_query_help()
    {
        $this->db->from($this->table_help);
       
        $i = 0;
        foreach ($this->column_help as $item) {
            if ($_POST['search']['value'])
                ($i === 0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
            $column_help[$i] = $item;
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($column_help[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
     public function get_by_id_help($id)
    {//slider
        $this->db->from($this->table_help);
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }
    
    public function update_help($where, $data)
    {
        $this->db->update($this->table_help, $data, $where);
        return $this->db->affected_rows();
    }


    public function delete_by_id_help($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table_help);
    }
    ################## Help Center ##################
	##################   PRIVACY   ##################
	
	 var $table_privacy = 'privacy';
     var $column_privacy = array('id','heading','sub_heading');
	
	
	function get_datatables_privacy()
    {
        $this->_get_datatables_query_privacy();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    private function _get_datatables_query_privacy()
    {
        $this->db->from($this->table_privacy);
       
        $i = 0;
        foreach ($this->column_privacy as $item) {
            if ($_POST['search']['value'])
                ($i === 0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
            $column_privacy[$i] = $item;
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($column_privacy[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
	
	 public function get_by_id_privacy($id)
    {//slider
        $this->db->from($this->table_privacy);
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }
	
	public function update_privacy($where, $data)
    {
        $this->db->update($this->table_privacy, $data, $where);
        return $this->db->affected_rows();
    }

	##################   PRIVACY   ##################
	


	
    public function count_filtered_skill()
    {//skill
        $this->_get_datatables_query_skill();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_blocked_pages(){
        $this->_get_datatables_query_skill();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_skill()
    {
        $this->db->from($this->table_skill);
        return $this->db->count_all_results();
    }
    /*  START
        GET DATA FROM TABLE AND PUT IT THE FORM- on EDIT BUTTON CLICK*/
    public function get_by_id_skill($id)
    {//slider
        $this->db->from($this->table_skill);
        $this->db->where('skill_id', $id);
        $query = $this->db->get();
        return $query->row();
    }
	
	
	
    /*  END
        GET DATA FROM TABLE AND PUT IT THE FORM- on EDIT BUTTON CLICK*/

     /*  START
        SAVE skill DATA*/    
    public function save_skill($data)
    {
        $this->db->insert($this->table_skill, $data);
        return $this->db->insert_id();
    }
	
	public function save_insert_public($data,$table){
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
    /*****  END
        SAVE skill DATA*****/ 

    /*****  START
        UPDATE skill DATA****/     
    public function update_skill($where, $data)
    {
        $this->db->update($this->table_skill, $data, $where);
        return $this->db->affected_rows();
    }
    /***** END
        UPDATE skill DATA*****/   


    /*****  START
        DELETE skill DATA****/    
    public function delete_by_id_skill($id)
    {
        $this->db->where('skill_id', $id);
        $this->db->delete($this->table_skill);
    }
    /*  END

    
        DELETE skill DATA*/ 
    
    /**********END skill***********/

    /*****  START
        DELETE privacy DATA****/    
    public function delete_by_id_privacy($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table_privacy);
    }
    /*  END

    
        DELETE privacy DATA*/ 
    
    /**********END privacy***********/


    /********* Amazetel User ********/
    public function admin_user_insert($data){
        $this->db->insert($this->table_users, $data);
        return $this->db->insert_id();
    }

    public function admin_user_delete($id){
        
        $this->db->select('amazetal_job_invite.invite_id,amazetal_job_interview.interview_id,amazetal_job_offer.offer_id');
        $this->db->from('amazetal_job_invite'); 
        $this->db->join('amazetal_job_interview', 'amazetal_job_invite.invite_id = amazetal_job_interview.invite_id','left');
        $this->db->join('amazetal_job_offer', 'amazetal_job_interview.interview_id = amazetal_job_offer.interview_id','left');
        $this->db->where('amazetal_job_invite.emp_id',$id);
        $job_data_emp = $this->db->get();
        $job_data_emp = $job_data_emp->result();
        foreach($job_data_emp as $job_row_emp)
        {
            $this->Get_db->del_record('amazetal_job_offer','offer_id',$job_row_emp->offer_id);
            $this->Get_db->del_record('amazetal_job_interview','interview_id',$job_row_emp->interview_id);
            $this->Get_db->del_record('amazetal_job_invite','invite_id',$job_row_emp->invite_id);
        }
        
        $this->db->select('amazetal_job_invite.invite_id,amazetal_job_interview.interview_id,amazetal_job_offer.offer_id');
        $this->db->from('amazetal_job_invite'); 
        $this->db->join('amazetal_job_interview', 'amazetal_job_invite.invite_id = amazetal_job_interview.invite_id','left');
        $this->db->join('amazetal_job_offer', 'amazetal_job_interview.interview_id = amazetal_job_offer.interview_id','left');
        $this->db->where('amazetal_job_invite.user_id',$id);
        $job_data_user = $this->db->get();
        $job_data_user = $job_data_user->result();
        /*print_r($job_data_emp);
        print_r($job_data_user);
        exit();*/
        foreach($job_data_user as $job_row_user)
        {
            $this->Get_db->del_record('amazetal_job_offer','offer_id',$job_row_user->offer_id);
            $this->Get_db->del_record('amazetal_job_interview','interview_id',$job_row_user->interview_id);
            $this->Get_db->del_record('amazetal_job_invite','invite_id',$job_row_user->invite_id);
        }
        
        
        $this->Get_db->del_record('amazetal_user_role','user_id',$id);
        $this->Get_db->del_record('amazetal_user_skill','user_id',$id);
        $this->Get_db->del_record('amazetal_user_companies','user_id',$id);
        $this->Get_db->del_record('amazetal_user_edu','user_id',$id);
        $this->Get_db->del_record('amazetal_who_viewed_your_profile','viewed_by_id',$id);
        $this->Get_db->del_record('amazetal_user_rewards','user_id',$id);
        $this->Get_db->del_record('amazetal_test_status','user_id',$id);
        $this->Get_db->del_record('amazetal_spotlight_record','user_id',$id);
        $this->Get_db->del_record('amazetal_notifications','from_user',$id);
        $this->Get_db->del_record('amazetal_notifications','to_user',$id);
        $this->Get_db->del_record('amazetal_applied_jobs','user_id',$id);
        $this->Get_db->del_record('amazetal_job_posting_plan','emp_id',$id);
        $this->Get_db->del_record('amazetal_job','emp_id',$id);
        $this->Get_db->del_record('amazetal_favourites','user_id',$id);
        $this->Get_db->del_record('amazetal_favourites','fav_user_id',$id);
        $this->Get_db->del_record('amazetal_career_advice','user_id',$id);
        $this->Get_db->del_record('amazetal_career_advice','expert_id',$id);
        $this->Get_db->del_record('amazetal_assign_expert','user_id',$id);
        $this->Get_db->del_record('amazetal_assign_expert','expert_id',$id);
        $this->Get_db->del_record('amazetal_users','user_id',$id);
    }

    public function admin_get_user_by_id($id){
        $this->db->from($this->table_users);
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function admin_update_user_by_id($data,$where){
        $this->db->update($this->table_users, $data, $where);
        return $this->db->affected_rows();
    }

    /********** Blocked Pages Area ***********/

    public function get_blocked_pages_for_table(){
        $this->db->from($this->table_meunu);
        $query = $this->db->get();
        return $query->result();
    }

    public function update_blocked_pages(){

    }

    public function change_user_status_by_moderator(){

        //$this->db->update()
    }

    public function update_blocked_pages_status_for_modarator($data,$where){

        $this->db->update($this->table_meunu, $data, $where);
    }

    public function add_blocked_pages($data){
        $this->db->insert($this->table_blocked_pages, $data);
        return $this->db->insert_id();
    }

    public function get_blocked_results(){
        $this->db->from($this->table_blocked_pages);
        $query = $this->db->get();
       return $query->num_rows();
    }

    /**** menus pages admin ******/

    public function count_all_menu_pages(){
        $this->db->from($this->table_meunu);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function get_all_menu_pages($moderator = false){
        $this->db->from($this->table_meunu);
        if($moderator){
            $this->db->where('moderator_status',1);
        }
        $query = $this->db->get();
        return $query->result();
    }


    /* Get all eligible users */
    
    function get_all_expert_users($count = false){
        // $query =  $this->Get_db->get_result_query("select user_id,fullname,unique_id from ".$this->table_users);
		$this->db->select('user_id,fullname,unique_id,login_email,profile_completion,approval');
		$this->db->from('amazetal_users');
		$this->db->where('profile_completion >=',100);
        $this->db->where('approval',1);
		$this->db->where('role', 'career_experts');
		$qr = $this->db->get();
		$result = $qr->result();
		
        if($count){
            return count($result);
        }else{
            return $result;
        }
    }

    function get_all_eligible_users($count = false){
        // $query =  $this->Get_db->get_result_query("select user_id,fullname,unique_id from ".$this->table_users);
		$this->db->select('immigration,sponsorship,spotlight_complete_date,how_did_you_hear_about_us,user_id,fullname,unique_id,phone,login_email,profile_completion,video_url,profile_pic,spotlight_status,date_created,spotlight_applied_date');
		$this->db->from('amazetal_users');
		//$this->db->where('spotlight_step !=',NULL);
		$this->db->where('role', 'candidates');
        $this->db->order_by('date_created', 'desc');
		$qr = $this->db->get();
		$result = $qr->result();
		
        if($count){
            return count($result);
        }else{
            return $result;
        }
    }
    
    function educationLatestRecord($id){
        $this->db->select('amazetal_user_edu.*,amazetal_universities.*');
		$this->db->from('amazetal_user_edu');
		$this->db->join('amazetal_universities','amazetal_universities.uni_id = amazetal_user_edu.uni_id','left');
		$this->db->where('user_id',$id);
		$qr = $this->db->get();
		$result = $qr->result();
        
        $user_education_record_by_date = array();
				$qr_user_employement_record = $result;
				if(!empty($qr_user_employement_record)){
					foreach($qr_user_employement_record as $emp_key => $emp_value){
						//GET YEAR ONLY 
						
						if(!empty($emp_value->ending_date)){
							$year = trim(explode(',',$emp_value->ending_date)[1]);
						}else{
							$year = 'w'; //STILL WORKING/STUDYING, TO GET THE TOP POSITION IN SORTING.
						}
						$user_education_record_by_date[ $year . '_' . $emp_value->user_edu_id ] = $emp_value;
					}
				}
				krsort($user_education_record_by_date);
                $first_ele = current($user_education_record_by_date);
                return $first_ele;
    }
	
	function get_all_assigned_experts($user_id){
        
		$this->db->select('amazetal_assign_expert.*,amazetal_users.fullname, amazetal_users.unique_id AS expert_unique_id');
		$this->db->from('amazetal_assign_expert');
		$this->db->join('amazetal_users','amazetal_users.user_id = amazetal_assign_expert.expert_id','left');
		$this->db->where('amazetal_assign_expert.pending_status !=',2);
		$this->db->where('amazetal_assign_expert.user_id',$user_id);
		$result = $this->db->get()->result();
		return $result;
	}
    
    function get_all_assigned_experts1($user_id){
        
		$this->db->select('amazetal_assign_expert.*,amazetal_users.login_email,amazetal_users.fullname, amazetal_users.unique_id AS expert_unique_id');
		$this->db->from('amazetal_assign_expert');
		$this->db->join('amazetal_users','amazetal_users.user_id = amazetal_assign_expert.expert_id','left');
		//$this->db->where('amazetal_assign_expert.pending_status !=',2);
		$this->db->where('amazetal_assign_expert.user_id',$user_id);
		$result = $this->db->get()->result();
		return $result;
	}

    function get_user_email($user_id){
        $data = array(
            "user_id" => $user_id
        );
        $sql = "select login_email from ".$this->table_users." where  unique_id = ".$user_id;
        $query =  $this->Get_db->get_result_query($sql);
        //$result = $this->Get_db->get_col_detail_where_hack($this->table_users,"login_email",$data);
        //return $query;
        return $query;
    }

}
