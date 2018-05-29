<?php
Class get_db extends CI_Model{
 
	function get_location_matrix_join()
	{
		/*SELECT lm.*,s.state_name,c.city_name FROM `location_matrix` lm
inner join states s
on lm.lm_state = s.id
inner join cities c
on lm.lm_city = c.id;*/
		$this->db->select('lm.*,s.state_name,c.city_name');
		$this->db->from(DB_PREFIX.'location_matrix as lm');
		$this->db->join('states as s', 'lm.lm_state = s.id');
		$this->db->join(DB_PREFIX.'cities as c', 'lm.lm_city = c.id');
		$query = $this->db->get();
		 if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }

	}

    public function check_profile_completion($where = null){
        $this->db->select('profile_completion');
        $this->db->from('amazetal_users');
        $this->db->where('profile_completion <','100');
        if($where!=null){
            $this->db->where($where);
        }
        $q = $this->db->get();
        return $q->num_rows();
    }

    public function interview_pending(){
        $this->db->select('status');
        $this->db->from('amazetal_job_interview');
        $this->db->where('status','0');
        $q = $this->db->get();
        return $q->num_rows();
    }

    public function job_offer_pending(){
        $this->db->select('status');
        $this->db->from('amazetal_job_offer');
        $this->db->where('status','0');
        $q = $this->db->get();
        return $q->num_rows();
    }
    public function total_not_approved($where = null){
        $this->db->select('approval');
        $this->db->from('amazetal_users');
        $this->db->where('approval','0');
        if($where != null){
            $this->db->where($where);
        }
        $q = $this->db->get();
        return $q->num_rows();
    }
    public function record_count_mojo($db_name,$where_array){
        $this->db->select('*')->from($db_name)->where($where_array);
        $q = $this->db->get();
        return $q->num_rows();
    }

	function get_group_concat()
	{
		 $query = $this->db->query("select GROUP_CONCAT(role_id) as pid,GROUP_CONCAT(role_name) as role, area_id as fid FROM `amazetal_role` Group BY `amazetal_role`.`area_id` ORDER BY `area_id` ASC");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
	}			
	function get_details_by_column($from,$where,$id){
		$this -> db ->select('*');
		$this -> db ->from($from);
		$this -> db ->where($where, $id);
		$this -> db ->limit(1);
		$query = $this->db-> get();
		return $query->result();
	 } 
	 			
	function get_details_by_multiple_column($from,$where_array){
		$this -> db ->select('*');
		$this -> db ->from($from);
		$this -> db ->where($where_array);
		$query = $this->db-> get();
		return $query->result();
	 }  	
	 
	 function get_details_by_sinlge_column($column,$from,$where_array){
		$this->db->select($column);
		$this->db->from($from);
		$this->db->where($where_array);
		$query = $this->db->get();
		return $query->result();
	 }  


	//Waq 19/apr
	function get_distinct_col_detail($table,$col_name, $order = 'asc')
	{
		$this->db->distinct();
		$this -> db ->from($table);
		$this -> db -> select($col_name);
		$this -> db -> order_by($col_name, $order);
		$query = $this->db->get()->result();
		return $query;
	}	 
	//Waq 19/apr
	function get_distinct_col_detail_order($table,$col_name, $order_col, $order = 'asc'){
		$this->db->distinct();
		$this -> db ->from($table);
		$this -> db -> select($col_name);
		$this -> db -> order_by($order_col, $order);
		$query = $this->db->get()->result();
		return $query;
	}	
	function get_query($querys){
		if(!empty($querys)){
			return $this->db->query($querys);
		}
		
	}
	function get_query_for_chat($querys){
		if(!empty($querys)){
			$query = $this->db->query($querys);
			return $query->result_array();
		}
		
	}
	 function get_col_detail($table,$col_name)
	{
		$this->db->select($col_name);
		$this->db->from($table);
		$query = $this->db->get()->result();
		return $query;
	}
    
    function get_col_detail_desc_order($table,$col_name,$order_col)
	{
		$this->db->select($col_name);
		$this->db->from($table);
        $this->db->order_by($order_col, 'desc');
		$query = $this->db->get()->result();
		return $query;
	}
    
    function get_col_detail_where($table,$col_name,$where_array)
	{
		$this -> db ->from($table);
		$this -> db -> select($col_name);
        $this -> db -> where($where_array);
        $this -> db -> where(array("role !=" =>'1'));
		$query = $this->db->get()->result();
		return $query;
	}
    
    
	function get_details_by_multiple_column_for_noti($from,$where_array,$limits){
		$this -> db ->select('*');
		$this -> db ->from($from);
		$this -> db ->where($where_array);
		$this->db->order_by('notifications_id', 'DESC');
		$this->db->limit($limits);
		$query = $this->db-> get();
		
			/* echo "<pre>";
				print_r($query->result());
			echo "</pre>"; */
			 
		
		
		return $query->result();
	 }  
	function get_details_by_multiple_column_for_msg($from,$where_array,$limits){
		$this -> db ->select('*');
		$this -> db ->from($from);
		$this -> db ->where($where_array);
		$this->db->order_by('id', 'ASC');
		$this->db->limit($limits);
		$query = $this->db-> get();
		return $query->result();
	 } 
	 		
	function get_details_by_column_all($from,$where,$id){
		$this -> db -> select('*');
		$this -> db -> from($from);
		$this -> db -> where($where, $id);
		$query = $this -> db -> get();
		return $query->result();
	 } 
	 
	 function get_details_all($from){
		$this -> db -> select('*');
		$this -> db -> from($from);
		$query = $this -> db -> get();
		return $query->result();
	 }
 function get_details_all_post($from){
		$this -> db -> select('*');
		$this -> db -> from($from);
		$this -> db -> order_by("press_post_id","desc");
		$query = $this -> db -> get();
		return $query->result();
	 }

	 function get_details_all_order_by($from,$orderbycolname,$order_by){
		$this -> db -> select('*');
		$this -> db -> from($from);
		$this -> db-> order_by($orderbycolname,$order_by); 
		$query = $this -> db -> get();
		return $query->result();
	 } 
	 
	 function get_details_all_group_by($from,$group_by){
		 
		$this -> db -> select('*');
		$this->db->group_by($group_by); 
		$this -> db -> from($from);
		$query = $this -> db -> get();
		return $query->result();

	  }
	 
	function add_insert_record($to,$data){
		$fa = $this->db->insert($to,$data);
       return $fa;
	}

	function add_multiple_insert_record($to,$data){
		$this->db->insert_batch($to,$data);
		return $this->db->insert_id();
	}
	
	/* function update_record($data,$mytable,$where){
		// $this->db->where($column_name, $id);
		// $this->db->update($mytable, $data); 
		 if($this->db->update($mytable, $data, $where)){
			$this->db->insert($mytable,$data);
		 }
		// print_r($last_id);
	} */
	
	function update_record($data,$mytable,$column_name,$id){
		$this->db->where($column_name, $id);
		$this->db->update($mytable, $data); 
	}
	
	
function update_data($mytable,$data,$where){
		$this->db->where($where);
		$this->db->update($mytable, $data); 
		return $this->db->affected_rows();
	}

	function update_batch_record($mytable,$data,$where){
		$this->db->update_batch($mytable, $data, $where);
	}
	
	
	
	
	function del_record($mytable,$column_name,$id){
		$this->db->where($column_name,$id);
		$this->db->delete($mytable); 
	}
	
	function deleteData($mytable,$where){
		$this->db->where($where);
		$this->db->delete($mytable); 
	}
	
	
	
	 public function record_count($db_name,$where_array) {
		 $this -> db ->where($where_array);
        return $this->db->count_all($db_name);
    }
    
    public function record_count_custom($db_name,$where_array) {
		 $this -> db ->where($where_array);
          $get =  $this->db->get($db_name);
          $rs = $get->result_array();
          $rs1 = count($rs);
          return $rs1;
    }

    public function fetch_record_by_pagination($limit, $start,$db_name,$columname,$orderby,$where_array) {
        $this->db->limit($limit, $start);
		$this -> db-> order_by($columname,$orderby); 
		$this -> db ->where($where_array);
        $query = $this->db->get($db_name);

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   } 

   public function get_result_query($sql){

       $query = $this->db->query($sql);

       return $query->result();
   }



   public function fetch_record_by_pagination_with_search($limit, $start,$db_name,$columname,$orderby,$where_array) {
        $this->db->limit($limit, $start);
		$this -> db-> order_by($columname,$orderby); 
		$this -> db ->where($where_array);
        $query = $this->db->get($db_name);

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
	
	// $heading = true, $message2 = true, $recipient = true, $subject =  true


	function send_email($details = true){
		
		$status = false;
		
		if(@$details['force_email'] == true)
		{
			$status = true;
		}else{
			$uid = "";
			//GET USER ID BY RECEPIENT EMAIL
			$where = array(
			'login_email' => $details['recipient'],
			);
			foreach($this->get_details_by_multiple_column('amazetal_users',$where) as $row)
			{
				$uid = $row->user_id;
			}
			//FOR EXCEPTIONAL CASES WHERE WHERE IS NOT LOGGED IN LIKE FORGOT YOUR PASSWORD 
			if(empty($uid))
			{
				$status = true;
			}
			
			//CHECK IF THE NOTIFICATION OF RECEPIENT EMAIL IS TRUE
			$where_array = array(
				'user_id' => $uid
			);
			foreach($this->get_details_by_multiple_column('amazetal_users',$where_array) as $row)
			{
				if($row->NotifyViaEmails == '1')
				{
					$status = true;
				}
			}
		}
		if($status == true)
		{
			
			require_once 'PHPMailer-master/PHPMailerAutoload.php';
			$this->load->library('Mail');
			
				$data = '
				
				<head>
    <style type="text/css" media="screen">
        body.outlook img {
          width: 100% !important;
          max-width: 100% !important;
        }
		
		@media screen and (max-width:480px) {
	table {
		width: 100%!important;
	}
}
		
		
    </style>
</head>
				
				
				
				
				<div id=":q0" class="ii gt m152ab09a6e683237 adP adO" style="width:100%; max-width: 1000px;">
		<div id=":q1" class="a3s" style="width: 100%;"><u></u>
			<div marginwidth="0" marginheight="0" style="width:100%;">
				<div dir="ltr" style="background-color:#232323 ;margin:0;padding: 20px 0;width:100%">
					<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" >
						<tbody class="width:100%;">
							<tr>
								<td align="center" valign="top" >
									<div>
										<p style="margin-top:0"><a target= "_blank" href="'.site_url().'"><img src="'.site_url().'assets/images/logo.png" alt="Amazetal" style="width:40%;border:none;display:inline;font-size:14px;font-weight:bold;min-height:auto;line-height:100%;outline:none;text-decoration:none;text-transform:capitalize" class="CToWUd"></a>
										</p>
									</div>
									<table border="0" cellpadding="0" cellspacing="0"  style="background-color:#fdfdfd;border:1px solid #000000;border-radius:3px!important">
										<tbody>
											<tr>
												<td align="center" valign="top" style="width: 100%;
    background-color: #C95B5D;">
													<table border="0" cellpadding="0" cellspacing="0"  style="background-color:#C95B5D;border-radius:3px 3px 0 0!important;color:#ffffff;border-bottom:0;font-weight:bold;line-height:100%;vertical-align:middle;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif">
														<tbody>
															<tr>
																<td style="padding:36px 48px;display:block">
																	<h1 style="color:#ffffff;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:30px;font-weight:300;line-height:150%;margin:0;text-align:center">'.$details['heading'].' </h1>
																</td>
															</tr>
														</tbody>
													</table>
												</td>
											</tr>
											<tr>
												<td align="center" valign="top">
													<table border="0" cellpadding="0" cellspacing="0" width="600">
														<tbody>
															<tr>
																<td valign="top" style="background-color:#fdfdfd">
																	<table border="0" cellpadding="20" cellspacing="0" width="100%">
																		<tbody>
																			<tr>
																				<td valign="top" style="padding:48px">
																					<div style="color:#5c5c5c;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:14px;line-height:150%;text-align:left">
																					<p style="margin:0 0 16px">'. $details['message'] .'</p>
																					
																						
																					</div>
																				</td>
																			</tr>
																		</tbody>
																	</table>
																</td>
															</tr>
														</tbody>
													</table>
												</td>
											</tr>
											<tr>
												<td align="center" valign="top">
													<table border="0" cellpadding="10" cellspacing="0" width="600">
														<tbody>
															<tr>
																<td valign="top" style="padding:0">
																	<table border="0" cellpadding="10" cellspacing="0" width="100%">
																		<tbody>
																			<tr>
																				<td colspan="2" valign="middle" style="padding:0 48px 48px 48px;border:0;color:#C95B5D;font-family:Arial;font-size:12px;line-height:125%;text-align:center">
																					<p>We hope you enjoy your time here, <br>
																					Amazetal Team.</p>
																				</td>
																			</tr>
																		</tbody>
																	</table>
																</td>
															</tr>
														</tbody>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<div class="yj6qo"></div>
					<div class="adL">
					</div>
				</div>
				<div class="adL">
				</div>
			</div>
			<div class="adL">
			</div>
		</div>
	</div>

	';






		
			 
		  // $template_html = 'Mail_templ.php';

		  $mail = new Mail();
		  $mail->setMailBody($data);
		
		
			if(!$mail->sendMail($details['subject'], $details['recipient']))
			{
				echo $mail->ErrorInfo;
			}else{
				
			}
			
		
		}
			
	}
	
	
	function send_email_for($details = true){
		
		$status = false;
		
		if(@$details['force_email'] == true)
		{
			$status = true;
		}else{
			$uid = "";
			//GET USER ID BY RECEPIENT EMAIL
			$where = array(
			'login_email' => $details['recipient'],
			);
			foreach($this->get_details_by_multiple_column('amazetal_users',$where) as $row)
			{
				$uid = $row->user_id;
			}
			//FOR EXCEPTIONAL CASES WHERE WHERE IS NOT LOGGED IN LIKE FORGOT YOUR PASSWORD 
			if(empty($uid))
			{
				$status = true;
			}
			
			//CHECK IF THE NOTIFICATION OF RECEPIENT EMAIL IS TRUE
			$where_array = array(
				'user_id' => $uid
			);
			foreach($this->get_details_by_multiple_column(DB_PREFIX.'users',$where_array) as $row)
			{
				if($row->NotifyViaEmails == '1')
				{
					$status = true;
				}
			}
		}
		if($status == true)
		{
			
			require_once 'PHPMailer-master/PHPMailerAutoload.php';
			$this->load->library('Mail');
			
				$data = '
				
				<head>
    <style type="text/css" media="screen">
        body.outlook img {
          width: 100% !important;
          max-width: 100% !important;
        }
		
		@media screen and (max-width:480px) {
	table {
		width: 100%!important;
	}
}
		
		
    </style>
</head>
				
				
				
				
				<div id=":q0" class="ii gt m152ab09a6e683237 adP adO" style="width:100%; max-width: 1000px;">
		<div id=":q1" class="a3s" style="width: 100%;"><u></u>
			<div marginwidth="0" marginheight="0" style="width:100%;">
				<div dir="ltr" style="background-color:#232323 ;margin:0;padding: 20px 0;width:100%">
					<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" >
						<tbody class="width:100%;">
							<tr>
								<td align="center" valign="top" >
									<div>
										<p style="margin-top:0"><a target= "_blank" href="'.site_url().'"><img src="'.site_url().'assets/images/logo.png" alt="Amazetal" style="width:40%;border:none;display:inline;font-size:14px;font-weight:bold;min-height:auto;line-height:100%;outline:none;text-decoration:none;text-transform:capitalize" class="CToWUd"></a>
										</p>
									</div>
									<table border="0" cellpadding="0" cellspacing="0"  style="background-color:#fdfdfd;border:1px solid #000000;border-radius:3px!important">
										<tbody>
											<tr>
												<td align="center" valign="top" style="width: 100%;
    background-color: #C95B5D;">
													<table border="0" cellpadding="0" cellspacing="0"  style="background-color:#C95B5D;border-radius:3px 3px 0 0!important;color:#ffffff;border-bottom:0;font-weight:bold;line-height:100%;vertical-align:middle;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif">
														<tbody>
															<tr>
																<td style="padding:36px 48px;display:block">
																	<h1 style="color:#ffffff;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:30px;font-weight:300;line-height:150%;margin:0;text-align:center">'.$details['heading'].' </h1>
																</td>
															</tr>
														</tbody>
													</table>
												</td>
											</tr>
											<tr>
												<td align="center" valign="top">
													<table border="0" cellpadding="0" cellspacing="0" width="600">
														<tbody>
															<tr>
																<td valign="top" style="background-color:#fdfdfd">
																	<table border="0" cellpadding="20" cellspacing="0" width="100%">
																		<tbody>
																			<tr>
																				<td valign="top" style="padding:48px">
																					<div style="color:#5c5c5c;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:14px;line-height:150%;text-align:left">
																					<p style="margin:0 0 16px">'. $details['message'] .'</p>
																					
																						
																					</div>
																				</td>
																			</tr>
																		</tbody>
																	</table>
																</td>
															</tr>
														</tbody>
													</table>
												</td>
											</tr>
											<tr>
												<td align="center" valign="top">
													<table border="0" cellpadding="10" cellspacing="0" width="600">
														<tbody>
															<tr>
																<td valign="top" style="padding:0">
																	<table border="0" cellpadding="10" cellspacing="0" width="100%">
																		<tbody>
																			<tr>
																				<td colspan="2" valign="middle" style="padding:0 48px 48px 48px;border:0;color:#C95B5D;font-family:Arial;font-size:12px;line-height:125%;text-align:center">
																					<p>We hope you enjoy your time here, <br>
																					Amazetal Team.</p>
																				</td>
																			</tr>
																		</tbody>
																	</table>
																</td>
															</tr>
														</tbody>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<div class="yj6qo"></div>
					<div class="adL">
					</div>
				</div>
				<div class="adL">
				</div>
			</div>
			<div class="adL">
			</div>
		</div>
	</div>

	';






		
			 
		  // $template_html = 'Mail_templ.php';

		  $mail = new Mail();
		  $mail->setMailBody($data);
		
		
			if(!$mail->sendMail($details['subject'], $details['recipient']))
			{
				echo $mail->ErrorInfo;
			}else{
				
			}
			
		
		}
			
	}
		
		
	function delete_uploadcare_file($file_id,$demopublickey,$demoprivatekey){
			// Public key 5c13c29e2a2e499b512c
			// Secret key #1 fa3f316e16aada5ca434
		
		
		
			// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, "https://api.uploadcare.com/files/".$file_id."/storage/");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");

			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			$headers = array();
			$headers[] = "Authorization: Uploadcare.Simple $demopublickey:$demoprivatekey";
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$result = curl_exec($ch);
			print_r($result);
			if (curl_errno($ch)) {
				echo 'Error:' . curl_error($ch);
			}
			curl_close ($ch);
	}
    
    
    
    function get_all($from)
    {
		$this -> db ->select('*');
		$this -> db ->from($from);
		$query = $this->db-> get();
		return $query->result();
    }
     function get_all_array($from)
    {
		$this -> db ->select('*');
		$this -> db ->from($from);
		$query = $this->db-> get();
		return $query->result_array();
    }
    
    function left_single_join($from,$other_table,$from_field,$other_table_field)
    {
        $this->db->select('*');
        $this->db->from($from);
        $this->db->join($other_table, $other_table.'.'.$other_table_field.' = '.$from.'.'.$from_field,'left'); 
        $query = $this->db->get();
        return $query->result();
    }
    
    
    function left_single_join_where($from,$other_table,$from_field,$other_table_field,$where_array)
    {
        $this->db->select('*');
        $this->db->from($from);
        $this->db->join($other_table, $other_table.'.'.$other_table_field.' = '.$from.'.'.$from_field,'left'); 
        $this->db->where($where_array); 
        $query = $this->db->get();
        return $query->result();
        
    }	

    function many_to_many_inner_join($from,$other_table,$another_table,$from_field,$other_table_field,$another_table_field)
    {
        $this->db->select('*');
        $this->db->from($from);
        $this->db->join($other_table, $other_table.'.'.$other_table_field.' = '.$from.'.'.$from_field,'inner'); 
        $this->db->join($another_table, $from.'.'.$from_field.' = '.$another_table.'.'.$another_table_field,'inner');       
        $query = $this->db->get();
        return $query->result();
        
    }	

    function many_to_many_inner_join_where($from,$other_table,$another_table,$from_field,$other_table_field,$another_table_field,$where_array)
    {
        $this->db->select('*');
        $this->db->from($from);
        $this->db->join($other_table, $other_table.'.'.$other_table_field.' = '.$from.'.'.$from_field,'inner'); 
        $this->db->join($another_table, $from.'.'.$from_field.' = '.$another_table.'.'.$another_table_field,'inner'); 
        $this->db->where($where_array); 
        $query = $this->db->get();
        return $query->result();
        
    }
    
    function many_to_many_multi_field_inner_join_where($from,$other_table,$another_table,$from_field,$from_secondfield,$other_table_field,$another_table_field,$where_array)
    {
        $this->db->select('*');
        $this->db->from($from);
        $this->db->join($other_table, $other_table.'.'.$other_table_field.' = '.$from.'.'.$from_field,'inner'); 
        $this->db->join($another_table, $from.'.'.$from_secondfield.' = '.$another_table.'.'.$another_table_field,'inner'); 
        $this->db->where($where_array); 
        $query = $this->db->get();
        return $query->result();
        
    }
    
    
    /*
	
	   $this->db->select('posts.post_id,GROUP_CONCAT(posts.tag) as all_tags');
	   $this->db->from('posts');
	   $this->db->join('posts_tags', 'posts.post_id = post_tags.post_id', 'inner');
	   $this->db->join('tags', 'posts_tags.tag_id = tags.tag_id', 'inner');

    */

    //For user data in admin
    function get_all_users($counting = false){
        $user_json =  $this->get_col_detail(DB_PREFIX . "users", "user_id,login_email,role,fullname,username,user_status,postal_address,unique_id,approval,date_created");

        if($counting){
            return count($user_json);
        }else{
            return $user_json;
        }
    }
    
    
    function get_all_users_where($where_array,$counting = false){
        $user_json =  $this->get_col_detail_where(DB_PREFIX . "users", "user_id,login_email,role,fullname,username,user_status,postal_address,unique_id,approval,date_created",$where_array);

        if($counting){
            return count($user_json);
        }else{
            return $user_json;
        }
    }
    
	
	function preferedLocationOfWork($uid){
		$this->db->select('amazetal_users.location_id,amazetal_cities.id as user_city_id,amazetal_states.id as user_state_id, amazetal_states.state_name, amazetal_cities.city_name');
		$this->db->from('amazetal_users');
		// $this->db->join('amazetal_location_matrix','amazetal_location_matrix.location_id = amazetal_users.location_id','inner');
		$this->db->join('amazetal_cities','amazetal_cities.id = amazetal_users.location_id','inner');
		$this->db->join('amazetal_states','amazetal_states.id = amazetal_cities.state_id','inner');
		$this->db->where('user_id',$uid);
		$this->db->group_by('user_id');
		$qr = $this->db->get();
		$result = $qr->result();
		if(!empty($result)){
			return  $result[0];
		}else{
			return "";
		}
		
	}
    
    
    
    function location_detail_by_city_name($cityname){
        $this->db->select('*');
        $this->db->from('amazetal_cities');
        $this->db->join('amazetal_states', 'amazetal_cities.state_id = amazetal_states.id','inner');
        $this->db->join('amazetal_countries', 'amazetal_countries.id = amazetal_states.country_id','inner');
        $this->db->join('amazetal_location_matrix', 'amazetal_cities.id = amazetal_location_matrix.location_city','left');
        
        $this->db->like("amazetal_cities.city_name",$cityname);
        $this->db->where("amazetal_countries.country_name","United States");
        $query = $this->db->get();
        return $query->result();
    }
    
    
    function filterd_experts($candidate_id){
        
	

		//$data = $this->html_content();
        
        
        $this->db->select('*');
        $this->db->from('amazetal_users');
        $query_exp = $this->db->get();
        $query_exp_result = $query_exp->result();
        
        foreach($query_exp_result as $query_exp_result1)
        {
            if(!empty($query_exp_result1->total_year_exp) && ($query_exp_result1->role == 'candidates' || $query_exp_result1->role == 'career_experts'))
            {
                $expert_years_of_exp = $query_exp_result1->total_year_exp;
                
                if(strpos($expert_years_of_exp, '-') !== false){
                //true = Ranged data like (6 - 8)
                $expert_years_of_exp1 = explode('-',$expert_years_of_exp);
                $expert_years_of_exp_final =  $expert_years_of_exp1[1] - $expert_years_of_exp1[0];
                }else{
                //else = not a ranged data like 16+
                 $expert_years_of_exp_final = 6;
                }
                
               /* if(strpos($expert_years_of_exp1)){
                    
                } else {
                    $expert_years_of_exp_final = 6;
                }*/
                $calculated_years_exp['calculated_years_exp'] = $expert_years_of_exp_final;            
                $this->Get_db->update_record($calculated_years_exp,DB_PREFIX.'users','user_id', $query_exp_result1->user_id);
            }
            
            
            if($query_exp_result1->profile_completion >= 100 && ($query_exp_result1->role == 'candidates' || $query_exp_result1->role == 'career_experts'))
            {
                //echo "<pre>";
                //print_r($query_exp_result1);
                //echo "</pre>";
                //exit();
                
                $this->db->select('SUM(uni_score) as total_uni_score');
                $this->db->from('amazetal_user_edu');
                $this->db->where('user_id',$query_exp_result1->user_id);
                $query_edu = $this->db->get();
                $query_edu_result = $query_edu->result();
                foreach($query_edu_result as $query_edu_result1)
                {
                    
                    $calculated_edu['total_uni_score'] = $query_edu_result1->total_uni_score;            
                    $this->Get_db->update_record($calculated_edu,DB_PREFIX.'users','user_id', $query_exp_result1->user_id);
                }
            }
        }
        
        
        //$candidate_id = 116; 
        
                                   /*                              *
                                    *         Candidate's data     *
                                    *                              */
        
        $this->db->select('*,SUM(amazetal_universities.uni_rank) as total_uni_rank,SUM(amazetal_companies.company_rank) as total_company_rank');
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
        $this->db->join('amazetal_assign_expert', 'amazetal_assign_expert.user_id = amazetal_users.user_id','left');
        $this->db->where('amazetal_users.user_id',$candidate_id);
        $this->db->group_by('amazetal_users.user_id'); 
        $query = $this->db->get();
        $basic_user_info = $query->result();
        //if(!empty($basic_user_info)){
        $candidate_info = $basic_user_info[0];
        /*} else {
            return false;
        }*/
        
        //echo "<pre>";
        //print_r($candidate_info);
        //echo "</pre>";
        //exit();
        
       
        
        
                            /*                              *
                            *   Algorithm validations       *
                            *                               */
            $expert_array = array('amazetal_users.role'=>'career_experts');
            
            $expert_array['amazetal_users.profile_completion >='] = 101;
            
            //$expert_array['amazetal_assign_expert.pending_status !='] = 2;
            
            
            
            
             
             $expert_array['amazetal_users.calculated_years_exp >='] = $candidate_info->calculated_years_exp;///
            
             // $expert_array['amazetal_users.total_uni_score >='] = $candidate_info->total_uni_score;//
            
             // $expert_array['amazetal_users.Career_Track'] = $candidate_info->Career_Track;
            
             $expert_array['amazetal_user_role.role_name'] = $candidate_info->role_name;
            
             // $expert_array['amazetal_user_role.area_id'] = $candidate_info->area_id;




                            /*                              *
                             *         Experts data         *
                             *                              */
                            
        $this->db->select('*,amazetal_users.user_id as expert_id, SUM(amazetal_universities.uni_rank) as total_uni_rank, SUM(amazetal_companies.company_rank) as total_company_rank');
        $this->db->from('amazetal_users');
        $this->db->join('amazetal_user_role', 'amazetal_user_role.user_id = amazetal_users.user_id','left');
        $this->db->join('amazetal_user_edu', 'amazetal_user_edu.user_id = amazetal_users.user_id','left');
        $this->db->join('amazetal_universities', 'amazetal_universities.uni_id = amazetal_user_edu.uni_id','left');
        $this->db->join('amazetal_user_companies', 'amazetal_user_companies.user_id = amazetal_users.user_id','left');
        $this->db->join('amazetal_companies', 'amazetal_user_companies.company_id = amazetal_companies.company_id','left');
        //$this->db->join('amazetal_cities', 'amazetal_cities.id = amazetal_users.location_id','left');
        //$this->db->join('amazetal_states', 'amazetal_cities.state_id = amazetal_states.id','left');
        //$this->db->join('amazetal_countries', 'amazetal_countries.id = amazetal_states.country_id','left');
        //$this->db->join('amazetal_location_matrix', 'amazetal_cities.id = amazetal_location_matrix.location_city','left');
        //$this->db->join('amazetal_role', 'amazetal_user_role.role_id = amazetal_role.role_id','left'); 
        $this->db->join('amazetal_interested_area', 'amazetal_user_role.area_id = amazetal_interested_area.area_id','left'); 
        //$this->db->join('amazetal_user_skill', 'amazetal_user_skill.user_id = amazetal_users.user_id','left');
        //$this->db->join('amazetal_skill', 'amazetal_user_skill.skill_id = amazetal_skill.skill_id','left');
        $this->db->join('amazetal_assign_expert', 'amazetal_assign_expert.expert_id = amazetal_users.user_id','left');
        
        $this->db->where($expert_array);      
        
        
        $this->db->group_by('amazetal_users.user_id'); 
        $query = $this->db->get();
        $first_result = $query->result();
        
        
        
        
        
        $expert_array1 = array('amazetal_users.user_id'=>'650');
        
        
        $this->db->select('*,amazetal_users.user_id as expert_id, SUM(amazetal_universities.uni_rank) as total_uni_rank, SUM(amazetal_companies.company_rank) as total_company_rank');
        $this->db->from('amazetal_users');
        $this->db->join('amazetal_user_role', 'amazetal_user_role.user_id = amazetal_users.user_id','left');
        $this->db->join('amazetal_user_edu', 'amazetal_user_edu.user_id = amazetal_users.user_id','left');
        $this->db->join('amazetal_universities', 'amazetal_universities.uni_id = amazetal_user_edu.uni_id','left');
        $this->db->join('amazetal_user_companies', 'amazetal_user_companies.user_id = amazetal_users.user_id','left');
        $this->db->join('amazetal_companies', 'amazetal_user_companies.company_id = amazetal_companies.company_id','left');
        //$this->db->join('amazetal_cities', 'amazetal_cities.id = amazetal_users.location_id','left');
        //$this->db->join('amazetal_states', 'amazetal_cities.state_id = amazetal_states.id','left');
        //$this->db->join('amazetal_countries', 'amazetal_countries.id = amazetal_states.country_id','left');
        //$this->db->join('amazetal_location_matrix', 'amazetal_cities.id = amazetal_location_matrix.location_city','left');
        //$this->db->join('amazetal_role', 'amazetal_user_role.role_id = amazetal_role.role_id','left'); 
        $this->db->join('amazetal_interested_area', 'amazetal_user_role.area_id = amazetal_interested_area.area_id','left'); 
        //$this->db->join('amazetal_user_skill', 'amazetal_user_skill.user_id = amazetal_users.user_id','left');
        //$this->db->join('amazetal_skill', 'amazetal_user_skill.skill_id = amazetal_skill.skill_id','left');
        $this->db->join('amazetal_assign_expert', 'amazetal_assign_expert.expert_id = amazetal_users.user_id','left');
        
        $this->db->where($expert_array1);      
        
        
        $this->db->group_by('amazetal_users.user_id'); 
        $query1 = $this->db->get();
        $second_result = $query1->result();
        
        
        $expert_array2 = array('amazetal_users.user_id'=>'668');
        
        
        $this->db->select('*,amazetal_users.user_id as expert_id, SUM(amazetal_universities.uni_rank) as total_uni_rank, SUM(amazetal_companies.company_rank) as total_company_rank');
        $this->db->from('amazetal_users');
        $this->db->join('amazetal_user_role', 'amazetal_user_role.user_id = amazetal_users.user_id','left');
        $this->db->join('amazetal_user_edu', 'amazetal_user_edu.user_id = amazetal_users.user_id','left');
        $this->db->join('amazetal_universities', 'amazetal_universities.uni_id = amazetal_user_edu.uni_id','left');
        $this->db->join('amazetal_user_companies', 'amazetal_user_companies.user_id = amazetal_users.user_id','left');
        $this->db->join('amazetal_companies', 'amazetal_user_companies.company_id = amazetal_companies.company_id','left');
        //$this->db->join('amazetal_cities', 'amazetal_cities.id = amazetal_users.location_id','left');
        //$this->db->join('amazetal_states', 'amazetal_cities.state_id = amazetal_states.id','left');
        //$this->db->join('amazetal_countries', 'amazetal_countries.id = amazetal_states.country_id','left');
        //$this->db->join('amazetal_location_matrix', 'amazetal_cities.id = amazetal_location_matrix.location_city','left');
        //$this->db->join('amazetal_role', 'amazetal_user_role.role_id = amazetal_role.role_id','left'); 
        $this->db->join('amazetal_interested_area', 'amazetal_user_role.area_id = amazetal_interested_area.area_id','left'); 
        //$this->db->join('amazetal_user_skill', 'amazetal_user_skill.user_id = amazetal_users.user_id','left');
        //$this->db->join('amazetal_skill', 'amazetal_user_skill.skill_id = amazetal_skill.skill_id','left');
        $this->db->join('amazetal_assign_expert', 'amazetal_assign_expert.expert_id = amazetal_users.user_id','left');
        
        $this->db->where($expert_array2);      
        
        
        $this->db->group_by('amazetal_users.user_id'); 
        $query2 = $this->db->get();
        $third_result = $query2->result();
        
        
        
        
        
        $final_array = array_merge($first_result, $second_result, $third_result);
        
        return $final_array;
        
        //$data['query'] = $this->db->last_query();
                
        //$data['all_experts'] = $query_result;
        
        
        
    }
	
	public function getUserEmail($uid){
		$query = $this->get_details_by_sinlge_column('login_email','amazetal_users',array('user_id'=>$uid));
		$result = !empty($query[0]->login_email) ? $query[0]->login_email : NULL;
		return $result; 
	}
	
	public function advancedFilterExperts($filtered_expert_array,$user_id){
	   /*echo "<pre>";
		  print_r($filtered_expert_array);
          echo "</pre>";*/
		#This function removes rejected experts from array.
		if(!empty($filtered_expert_array)){
		  
          
			foreach($filtered_expert_array as $key => $row){
				//echo $key . '<br>';
                
                $where_array = array(
                                'expert_id' => $row->expert_id,
                                'user_id'   => $user_id,
                                'pending_status' => 2
                                );
                $total = $this->record_count_custom('amazetal_assign_expert',$where_array);
                
                $wherearray = array(
                    "user_id" => $row->expert_id
                );
                
                $expert_block_current_employers = $this->Get_db->get_details_by_multiple_column(DB_PREFIX."users", $wherearray)[0]->block_current_employers;
                
                $expert_block_previous_employers = $this->Get_db->get_details_by_multiple_column(DB_PREFIX."users", $wherearray)[0]->block_previous_employers;
                
                $match_previous_company = $this->match_previous_company_with_not_employer($user_id,$row->expert_id);
                
                $match_current_company = $this->match_current_company_with_not_employer($user_id,$row->expert_id);
                if(($expert_block_current_employers == '1' && $match_current_company == 'found') || ($expert_block_previous_employers == '1' && $match_previous_company == 'found')){
                    /*echo $key;
                     echo "<pre>";
            		  print_r($filtered_expert_array[$key]);
                      echo "</pre>";
                      exit();*/
                    unset($filtered_expert_array[$key]);
                }
			}
		}
        
        $filtered_expert_array1 = array_values($filtered_expert_array);
        
        return $filtered_expert_array1; 
	}
    
    
    public function match_current_company_with_employer($user_id,$employer_id)
    {
        
        $this->db->select('*');
        $this->db->from('amazetal_user_companies');
        $this->db->join('amazetal_users', 'amazetal_user_companies.user_id = amazetal_users.user_id','inner'); 
        $this->db->join('amazetal_companies', 'amazetal_companies.company_id = amazetal_user_companies.company_id','left');
        $this->db->where('amazetal_users.user_id',$user_id);
        $this->db->where('amazetal_user_companies.still_working','1'); 
        $data_user_current_company_query = $this->db->get();
        $data_user_current_company = $data_user_current_company_query->result();
        
        
        //$data_candidates_current_company = $this->Get_db->left_single_join_where('amazetal_user_companies','amazetal_companies','company_id','company_id',array('still_working'=>'1'));
        $current_companies = array();
        foreach($data_user_current_company as $row){
            if(!empty($row->other_company_name) && !in_array($row->other_company_name,$current_companies))
            {
                $current_companies[] = strtolower($row->other_company_name);
            }
            if(!empty($row->company_name) && !in_array($row->company_name,$current_companies))
            {
                $current_companies[] = strtolower($row->company_name);
            }
        }
        $user_current_company = $current_companies;
        
        $wherearray = array(
            "user_id" => $employer_id
        );
        
        $employer_company = strtolower($this->Get_db->get_details_by_multiple_column(DB_PREFIX."users", $wherearray)[0]->company_id);
        
        if(in_array($employer_company,$user_current_company))
        {
            return "found";
        }
        else
        {
            return "not_found";
        }
        
    }
    
    
    
    public function match_previous_company_with_employer($user_id,$employer_id)
    {
        
        $this->db->select('*');
        $this->db->from('amazetal_user_companies');
        $this->db->join('amazetal_users', 'amazetal_user_companies.user_id = amazetal_users.user_id','inner'); 
        $this->db->join('amazetal_companies', 'amazetal_companies.company_id = amazetal_user_companies.company_id','left');
        $this->db->where('amazetal_users.user_id',$user_id);
        $this->db->where('amazetal_user_companies.still_working','0'); 
        $data_user_previous_company_query = $this->db->get();
        $data_user_previous_company = $data_user_previous_company_query->result();
        
        
        //$data_candidates_current_company = $this->Get_db->left_single_join_where('amazetal_user_companies','amazetal_companies','company_id','company_id',array('still_working'=>'1'));
        $previous_companies = array();
        foreach($data_user_previous_company as $row){
            if(!empty($row->other_company_name) && !in_array($row->other_company_name,$previous_companies))
            {
                $previous_companies[] = strtolower($row->other_company_name);
            }
            if(!empty($row->company_name) && !in_array($row->company_name,$previous_companies))
            {
                $previous_companies[] = strtolower($row->company_name);
            }
        }
        $user_previous_company = $previous_companies;
        /*echo "<pre>";
        print_r($user_previous_company);
        echo "</pre>";
        exit();*/
        
        $wherearray = array(
            "user_id" => $employer_id
        );
        
        $employer_company = strtolower($this->Get_db->get_details_by_multiple_column(DB_PREFIX."users", $wherearray)[0]->company_id);
        
        if(in_array($employer_company,$user_previous_company))
        {
            return "found";
        }
        else
        {
            return "not_found";
        }
        
    }
    
    
    
    public function match_previous_company_with_not_employer($user_id,$viewer_id)
    {
        
        $this->db->select('*');
        $this->db->from('amazetal_user_companies');
        $this->db->join('amazetal_users', 'amazetal_user_companies.user_id = amazetal_users.user_id','inner'); 
        $this->db->join('amazetal_companies', 'amazetal_companies.company_id = amazetal_user_companies.company_id','left');
        $this->db->where('amazetal_users.user_id',$user_id);
        $this->db->where('amazetal_user_companies.still_working','0'); 
        $data_user_previous_company_query = $this->db->get();
        $data_user_previous_company = $data_user_previous_company_query->result();
        
        
        //$data_candidates_current_company = $this->Get_db->left_single_join_where('amazetal_user_companies','amazetal_companies','company_id','company_id',array('still_working'=>'1'));
        $previous_companies = array();
        foreach($data_user_previous_company as $row){
            if(!empty($row->other_company_name) && !in_array($row->other_company_name,$previous_companies))
            {
                $previous_companies[] = strtolower($row->other_company_name);
            }
            if(!empty($row->company_name) && !in_array($row->company_name,$previous_companies))
            {
                $previous_companies[] = strtolower($row->company_name);
            }
        }
        $user_previous_company = $previous_companies;
        
        
        
        
        
        
        $this->db->select('*');
        $this->db->from('amazetal_user_companies');
        $this->db->join('amazetal_users', 'amazetal_user_companies.user_id = amazetal_users.user_id','inner'); 
        $this->db->join('amazetal_companies', 'amazetal_companies.company_id = amazetal_user_companies.company_id','left');
        $this->db->where('amazetal_users.user_id',$viewer_id);
        $this->db->where('amazetal_user_companies.still_working','0'); 
        $data_other_user_previous_company_query = $this->db->get();
        $data_other_user_previous_company = $data_other_user_previous_company_query->result();
        
        
        //$data_candidates_current_company = $this->Get_db->left_single_join_where('amazetal_user_companies','amazetal_companies','company_id','company_id',array('still_working'=>'1'));
        $other_previous_companies = array();
        foreach($data_other_user_previous_company as $other_row){
            if(!empty($other_row->other_company_name) && !in_array($other_row->other_company_name,$other_previous_companies))
            {
                $other_previous_companies[] = strtolower($other_row->other_company_name);
            }
            if(!empty($other_row->company_name) && !in_array($other_row->company_name,$other_previous_companies))
            {
                $other_previous_companies[] = strtolower($other_row->company_name); 
            }
        }
        $other_user_previous_company = $other_previous_companies;
        
        
       /* print_r($user_previous_company);
        echo "other start";
        print_r($other_user_previous_company);
        exit();*/
        
        $match_companies = array_intersect($other_user_previous_company,$user_previous_company);
        //$match_companies = 0;
        if(count($match_companies)>0)
        {
            return "found";
        }
        else
        {
            return "not_found";
        }
        
    }
    
    
    public function match_current_company_with_not_employer($user_id,$viewer_id)
    {
        
        $this->db->select('*');
        $this->db->from('amazetal_user_companies');
        $this->db->join('amazetal_users', 'amazetal_user_companies.user_id = amazetal_users.user_id','inner'); 
        $this->db->join('amazetal_companies', 'amazetal_companies.company_id = amazetal_user_companies.company_id','left');
        $this->db->where('amazetal_users.user_id',$user_id);
        $this->db->where('amazetal_user_companies.still_working','1'); 
        $data_user_previous_company_query = $this->db->get();
        $data_user_previous_company = $data_user_previous_company_query->result();
        
        
        //$data_candidates_current_company = $this->Get_db->left_single_join_where('amazetal_user_companies','amazetal_companies','company_id','company_id',array('still_working'=>'1'));
        $previous_companies = array();
        foreach($data_user_previous_company as $row){
            if(!empty($row->other_company_name) && !in_array($row->other_company_name,$previous_companies))
            {
                $previous_companies[] = strtolower($row->other_company_name);
            }
            if(!empty($row->company_name) && !in_array($row->company_name,$previous_companies))
            {
                $previous_companies[] = strtolower($row->company_name);
            }
        }
        $user_previous_company = $previous_companies;
        
        
        
        
        
        
        $this->db->select('*');
        $this->db->from('amazetal_user_companies');
        $this->db->join('amazetal_users', 'amazetal_user_companies.user_id = amazetal_users.user_id','inner'); 
        $this->db->join('amazetal_companies', 'amazetal_companies.company_id = amazetal_user_companies.company_id','left');
        $this->db->where('amazetal_users.user_id',$viewer_id);
        $this->db->where('amazetal_user_companies.still_working','1'); 
        $data_other_user_previous_company_query = $this->db->get();
        $data_other_user_previous_company = $data_other_user_previous_company_query->result();
        
        
        //$data_candidates_current_company = $this->Get_db->left_single_join_where('amazetal_user_companies','amazetal_companies','company_id','company_id',array('still_working'=>'1'));
        $other_previous_companies = array();
        foreach($data_other_user_previous_company as $other_row){
            if(!empty($other_row->other_company_name) && !in_array($other_row->other_company_name,$other_previous_companies))
            {
                $other_previous_companies[] = strtolower($other_row->other_company_name);
            }
            if(!empty($other_row->company_name) && !in_array($other_row->company_name,$other_previous_companies))
            {
                $other_previous_companies[] = strtolower($other_row->company_name);
            }
        }
        $other_user_previous_company = $other_previous_companies;
        
        
        /*print_r($user_previous_company);
        echo "other start";
        print_r($other_user_previous_company);
        exit();*/
        $match_companies = array_intersect($other_user_previous_company,$user_previous_company);
        //$match_companies = 0;
        if(count($match_companies)>0)
        {
            return "found";
        }
        else
        {
            return "not_found";
        }
        
    }

}
