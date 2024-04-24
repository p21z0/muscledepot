<?php

function getConnection()
{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "muscledepot";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection Failed: ".$conn->connect_error);
	}

	return $conn;
}

function get($table_name)
{
	$conn = getConnection();
	$sql = "SELECT * FROM $table_name";
	$result = $conn->query($sql);
	return $result;
}

function get_where($table_name, $id)
{
	$conn = getConnection();
	$sql = "SELECT * FROM $table_name where id=$id";
	$result = $conn->query($sql);
	return $result;
}

function get_where_custom($table_name, $column, $value)
{
	$conn = getConnection();
	$sql = "SELECT * FROM $table_name where ".$column."='".$value."'";
	$result = $conn->query($sql);
	return $result;
}

function get_where_double_and($table_name, $column1, $value1, $column2, $value2)
{
	$conn = getConnection();
	$sql = "SELECT * FROM $table_name where ".$column1." ='".$value1."' and ".$column2."='".$value2."'";
	$result = $conn->query($sql);
	return $result;
}

function get_where_custom_inprocess($table_name, $column)
{
	$conn = getConnection();
	$sql = "SELECT * FROM $table_name where ".$column."";
	$result = $conn->query($sql);
	return $result;
}

function insert($data, $table_name) 
{
	$conn = getConnection();
	$fields = ""; $values = "";

	foreach ($data as $key => $value) {
		$fields = $fields."$key".",";
		$values = $values."'".$value."',";
	}

	$cnt_fields = strlen($fields);
	$cnt_values = strlen($values);

	$fields = substr($fields, 0, $cnt_fields-1);
	$values = substr($values, 0, $cnt_values-1);

	$sql = "INSERT INTO $table_name (".$fields.") values (".$values.")";

	if ($conn->query($sql) === TRUE) {
    	$result =  "Record created successfully";
	} else {
	    $result = "Error: " . $sql . "<br>" . $conn->error;
	}
	return $result;
}

function update($data, $id, $table_name) 
{
	$conn = getConnection();
	$str="";

	foreach ($data as $key => $value) {
		$str = $str.$key."='".$value."',";
	}

	$cnt_str = strlen($str);

	$str = substr($str, 0, $cnt_str-1);

	$sql = "UPDATE $table_name set ".$str." where id='".$id."'";

	if ($conn->query($sql) === TRUE) {
    	$result =  " ";
	} else {
	    $result = "Error: " . $sql . "<br>" . $conn->error;
	}
	return $result;
}

function update_from($data, $id, $table_name, $condition) 
{
	$conn = getConnection();
	$str="";

	foreach ($data as $key => $value) {
		$str = $str.$key."='".$value."',";
	}

	$cnt_str = strlen($str);

	$str = substr($str, 0, $cnt_str-1);

	$sql = "UPDATE $table_name set ".$str." where ".$condition." ='".$id."'";

	if ($conn->query($sql) === TRUE) {
    	$result =  "sucess";
	} else {
	    $result = "Error: " . $sql . "<br>" . $conn->error;
	}
	return $result;
}


function delete($id, $table_name)
{
	$conn = getConnection();
	$sql = "DELETE FROM $table_name where id=$id";
	if ($conn->query($sql) == TRUE) {
		$result = "Record deleted successfully";
	} else {
		$result = "Error: " . $sql . "<br>" . $conn->error;	
	}
	return $result;
}

function delete_from($id, $table_name, $column)
{
	$conn = getConnection();
	$sql = "DELETE FROM $table_name where ".$column."=$id";
	if ($conn->query($sql) == TRUE) {
		$result = "Record deleted successfully";
	} else {
		$result = "Error: " . $sql . "<br>" . $conn->error;	
	}
	return $result;
}

function custom_query($mysql_query)
{
	//for select statements only
	$conn = getConnection();
	$sql = $mysql_query;
	$result = $conn->query($sql);	
	return $result;
}

function base_url()
{
	$project_name = "muscledepot";
	return "http://" . $_SERVER['SERVER_NAME'].'/'.$project_name.'/'; 
}

function get_where_double($table_name, $col1, $value1, $col2, $value2)
{
	$conn = getConnection();
	$sql = "SELECT * FROM $table_name where ".$col1."='".$value1."' and ".$col2."='".$value2."'";
	$result = $conn->query($sql);
	return $result;
}

function get_where_triple($table_name, $col1, $value1, $col2, $value2, $col3, $value3, $col4)
{
	$conn = getConnection();
	$sql = "SELECT DISTINCT $col4 FROM $table_name where $col1=$value1 and $col2=$value2 and $col3=$value3";
	$result = $conn->query($sql);
	return $result;
}

function _hash_string($str)
{
	$hashed_string = sha1($str);//password_hash($str, PASSWORD_BCRYPT, array('cost'=>11));
	return $hashed_string;
}

function _verify_hash($plain_text_str, $hashed_string)
{
	$result = password_verify($plain_text_str, $hashed_string);
	return $result; //[1]TRUE or [0]FALSE
}

function _get_pword_from_username($username, $table_name) 
{
	$user_data = get_where_custom($table_name, "username", $username);
	foreach ($user_data as $key => $row) {
		return $password1 = $row['password1'];
	}
	
}

function generate_random_string($length)
{
	$characters = '23456789abcdefghjkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
	$randomString = '';
	for ($i=0;$i< $length; $i++){
		$randomString .= $characters[rand(0, strlen($characters) - 1)];
	}
	return $randomString;
}

function _get_photo_from_id($table_name, $id) {
	$user_data = get_where($table_name, $id);
	foreach ($user_data as $key => $row) {
		return $photo = $row['photo'];
	}
}

function _get_sliderpic_from_id($table_name, $id) {
	$sliderpic_data = get_where($table_name, $id);
	foreach ($sliderpic_data as $key => $row) {
		return $picture = $row['picture'];
	}
}

function count_rows($table_name)
{
	$conn = getConnection();
	$sql = "SELECT * FROM $table_name";
	$result = $conn->query($sql);
	$rowcount=mysqli_num_rows($result);
	return $rowcount;
}

function count_school_forms($table_name, $school, $year)
{
	$conn = getConnection();
	$sql = "SELECT * FROM $table_name WHERE `school` = '$school' AND `formYear` = '$year'";
	$result = $conn->query($sql);
	$rowcount=mysqli_num_rows($result);
	return $rowcount;
}
function count_by_forms($form_type, $year)
{
	$conn = getConnection();
	$sql = "SELECT * FROM `forms` WHERE `form_type` = '$form_type' AND `formYear` = '$year'";
	$result = $conn->query($sql);
	$rowcount=mysqli_num_rows($result);
	return $rowcount;
}
function count_by_forms_monthly($form_type, $year, $month)
{
	$conn = getConnection();
	$sql = "SELECT * FROM `forms` WHERE `form_type` = '$form_type' AND `formYear` = '$year' AND `formMonth` = '$month'";
	$result = $conn->query($sql);
	$rowcount=mysqli_num_rows($result);
	return $rowcount;
}

function count_school_forms_month($table_name, $school, $year, $month)
{
	$conn = getConnection();
	$sql = "SELECT * FROM $table_name WHERE `school` = '$school' AND `formYear` = '$year' AND `formMonth` = '$month'";
	$result = $conn->query($sql);
	$rowcount=mysqli_num_rows($result);
	return $rowcount;
}

function count_school_forms_day($table_name, $school, $year, $month, $day)
{
	$conn = getConnection();
	$sql = "SELECT * FROM $table_name WHERE `school` = '$school' AND `formYear` = '$year' AND `formMonth` = '$month' AND `formDay` = '$day'";
	$result = $conn->query($sql);
	$rowcount=mysqli_num_rows($result);
	return $rowcount;
}

function count_refno($table_name, $search)
{
	$conn = getConnection();
	$sql = "SELECT * FROM $table_name WHERE `refno` = '$search'";
	$result = $conn->query($sql);
	$rowcount=mysqli_num_rows($result);
	return $rowcount;
}

function count_school_specific_forms($table_name, $school, $status, $year)
{
	$conn = getConnection();
	$sql = "SELECT * FROM $table_name WHERE `school` = '$school' AND `status` = '$status' AND `formYear` = '$year'";
	$result = $conn->query($sql);
	$rowcount=mysqli_num_rows($result);
	return $rowcount;
}
function count_school_specific_inprocess($table_name, $school, $status1, $status2, $status3, $year)
{
	$conn = getConnection();
	$sql = "SELECT * FROM $table_name WHERE `school` = '$school' AND (`status` = '$status1' OR `status` = '$status2' OR `status` = '$status3')  AND `formYear` = '$year'";
	$result = $conn->query($sql);
	$rowcount=mysqli_num_rows($result);
	return $rowcount;
}

function count_school_specific_forms_month($table_name, $school, $status, $year, $month)
{
	$conn = getConnection();
	$sql = "SELECT * FROM $table_name WHERE `school` = '$school' AND `status` = '$status' AND `formYear` = '$year' AND `formMonth` = '$month'";
	$result = $conn->query($sql);
	$rowcount=mysqli_num_rows($result);
	return $rowcount;
}
function count_school_inprocess_forms_month($table_name, $school, $status1, $status2, $year, $month)
{
	$conn = getConnection();
	$sql = "SELECT * FROM $table_name WHERE `school` = '$school' AND (`status` = '$status1' OR `status` = '$status2')  AND `formYear` = '$year' AND `formMonth` = '$month'";
	$result = $conn->query($sql);
	$rowcount=mysqli_num_rows($result);
	return $rowcount;
}
function count_school_specific_forms_day($table_name, $school, $status, $year, $month, $day)
{
	$conn = getConnection();
	$sql = "SELECT * FROM $table_name WHERE `school` = '$school' AND `status` = '$status' AND `formYear` = '$year' AND `formMonth` = '$month' AND `formDay` = '$day'";
	$result = $conn->query($sql);
	$rowcount=mysqli_num_rows($result);
	return $rowcount;
}
function count_school_inprocess_forms_day($table_name, $school, $status1, $status2, $year, $month, $day)
{
	$conn = getConnection();
	$sql = "SELECT * FROM $table_name WHERE `school` = '$school' AND (`status` = '$status1' OR `status` = '$status2') AND `formYear` = '$year' AND `formMonth` = '$month' AND `formDay` = '$day'";
	$result = $conn->query($sql);
	$rowcount=mysqli_num_rows($result);
	return $rowcount;
}

function count_forms_day($table_name, $year, $month, $day)
{
	$conn = getConnection();
	$sql = "SELECT * FROM $table_name WHERE `formYear` = '$year' AND `formMonth` = '$month' AND `formDay` = '$day'";
	$result = $conn->query($sql);
	$rowcount=mysqli_num_rows($result);
	return $rowcount;
}


function count_total_forms($year)
{
	$conn = getConnection();
	$sql = "SELECT * FROM `forms` WHERE `formYear` = '$year'";
	$result = $conn->query($sql);
	$rowcount=mysqli_num_rows($result);
	return $rowcount;
}

function count_total_forms_month($year, $month)
{
	$conn = getConnection();
	$sql = "SELECT * FROM `forms` WHERE `formYear` = '$year' AND `formMonth` = '$month'";
	$result = $conn->query($sql);
	$rowcount=mysqli_num_rows($result);
	return $rowcount;
}

function count_total_forms_day($year, $month, $day)
{
	$conn = getConnection();
	$sql = "SELECT * FROM `forms` WHERE `formYear` = '$year' AND `formMonth` = '$month' AND `formDay` = '$day'";
	$result = $conn->query($sql);
	$rowcount=mysqli_num_rows($result);
	return $rowcount;
}

function count_pending_forms($year)
{
	$conn = getConnection();
	$sql = "SELECT * FROM `forms` WHERE `status` = '0' AND `formYear` = '$year'";
	$result = $conn->query($sql);
	$rowcount=mysqli_num_rows($result);
	return $rowcount;
}

function count_pending_forms_month($year, $month)
{
	$conn = getConnection();
	$sql = "SELECT * FROM `forms` WHERE `status` = '0' AND `formYear` = '$year' AND `formMonth` = '$month'";
	$result = $conn->query($sql);
	$rowcount=mysqli_num_rows($result);
	return $rowcount;
}

function count_pending_forms_day($year, $month, $day)
{
	$conn = getConnection();
	$sql = "SELECT * FROM `forms` WHERE `status` = '0' AND `formYear` = '$year' AND `formMonth` = '$month' AND `formDay` = '$day'";
	$result = $conn->query($sql);
	$rowcount=mysqli_num_rows($result);
	return $rowcount;
}


function count_pending_forms1()
{
	$conn = getConnection();
	$sql = "SELECT * FROM `forms` WHERE `status` = '0'";
	$result = $conn->query($sql);
	$rowcount=mysqli_num_rows($result);
	return $rowcount;
}

function count_deaninProcess_forms($table_name, $school, $status)
{
	$conn = getConnection();
	$sql = "SELECT * FROM $table_name WHERE `school` = '$school' AND `status` = '$status'";
	$result = $conn->query($sql);
	$rowcount=mysqli_num_rows($result);
	return $rowcount;
}

function count_inProcess_forms($year)
{
	$conn = getConnection();
	$sql = "SELECT * FROM `forms` WHERE `status` = '1' OR `status` = '2' AND `formYear` = '$year'";
	$result = $conn->query($sql);
	$rowcount=mysqli_num_rows($result);
	return $rowcount;
}

function count_inProcess_forms_month($year, $month)
{
	$conn = getConnection();
	$sql = "SELECT * FROM `forms` WHERE `status` = '1' OR `status` = '2' OR `status` = '3' AND `formYear` = '$year' AND `formMonth` = '$month'";
	$result = $conn->query($sql);
	$rowcount=mysqli_num_rows($result);
	return $rowcount;
}

function count_inProcess_forms_day($year, $month, $day)
{
	$conn = getConnection();
	$sql = "SELECT * FROM `forms` WHERE `status` = '1' OR `status` = '2' OR `status` = '3'  AND `formYear` = '$year' AND `formMonth` = '$month' AND `formDay` = '$day'";
	$result = $conn->query($sql);
	$rowcount=mysqli_num_rows($result);
	return $rowcount;
}

function count_inProcess_forms1()
{
	$conn = getConnection();
	$sql = "SELECT * FROM `forms` WHERE `status` = '2'";
	$result = $conn->query($sql);
	$rowcount=mysqli_num_rows($result);
	return $rowcount;
}

function count_archived_forms($year)
{
	$conn = getConnection();
	$sql = "SELECT * FROM `forms` WHERE `status` = '6' AND `formYear` = '$year'";
	$result = $conn->query($sql);
	$rowcount=mysqli_num_rows($result);
	return $rowcount;
}

function count_archived_forms_month($year, $month)
{
	$conn = getConnection();
	$sql = "SELECT * FROM `forms` WHERE `status` = '6' AND `formYear` = '$year' AND `formMonth` = '$month'";
	$result = $conn->query($sql);
	$rowcount=mysqli_num_rows($result);
	return $rowcount;
}

function count_archived_forms_day($year, $month, $day)
{
	$conn = getConnection();
	$sql = "SELECT * FROM `forms` WHERE `status` = '6' AND `formYear` = '$year' AND `formMonth` = '$month' AND `formDay` = '$day'";
	$result = $conn->query($sql);
	$rowcount=mysqli_num_rows($result);
	return $rowcount;
}

function count_completed_forms1()
{
	$conn = getConnection();
	$sql = "SELECT * FROM `forms` WHERE `paymentphoto` != '' AND `date_uploaded` != '0000-00-00' AND `status` = '3'";
	$result = $conn->query($sql);
	$rowcount=mysqli_num_rows($result);
	return $rowcount;
}
function count_approved_forms()
{
	$conn = getConnection();
	$sql = "SELECT * FROM `forms` WHERE `date_approved` != '0000-00-00' AND `status` = '4'";
	$result = $conn->query($sql);
	$rowcount=mysqli_num_rows($result);
	return $rowcount;
}

function count_forms_month($year, $month)
{
	$conn = getConnection();
	$sql = "SELECT * FROM `forms` WHERE `formYear` = $year AND `formMonth` = $month";
	$result = $conn->query($sql);
	$rowcount=mysqli_num_rows($result);
	return $rowcount;
}
function get_forms_month($year, $month)
{
	$conn = getConnection();
	$sql = "SELECT * FROM `forms` WHERE `formYear` = $year AND `formMonth` = $month ORDER BY `date` ASC";
	$result = $conn->query($sql);
	return $result;
}
function get_forms_year($year)
{
	$conn = getConnection();
	$sql = "SELECT * FROM `forms` WHERE `formYear` = $year ORDER BY `date` ASC";
	$result = $conn->query($sql);
	return $result;
}

function search_form($table_name, $search)
{
	$conn = getConnection();
	$sql = "SELECT * FROM $table_name where
	 (refno =='$search%')";
	$result = $conn->query($sql);
	return $result;
}

function _fire_email($target_email, $subject, $msg)
{
    $to = $target_email;
    $subject = $subject;
    $message = $msg;
    $headers = "From: cbabaranjr@gmail.com\r\n";
    $headers .= "Content-type: text/html; charset=\"UTF-8\"; format=flowed \r\n";
    mail($to, $subject, $message, $headers);
}

function get_max($table_name)
{
	$mysql_query = "SELECT MAX(id) as last_id FROM $table_name";
	$result = custom_query($mysql_query);
	foreach ($result as $key => $row) {
		return $row['last_id'];
	}
}

function _get_id_from_token($token) 
{
	$result = get_where_custom("tokens", "token", $token);
	foreach ($result as $key => $row) {
		return $row['user_id'];
	}
}

function _get_id_from_username($username) 
{
	$result = get_where_custom("students", "username", $username);
	foreach ($result as $key => $row) {
		return $row['id'];
	}
}

function _get_firstname_from_id($id) 
{
	$user_data = get_where("users", $id);
	foreach ($user_data as $key => $row) {
		return $firstname = $row['firstname'];
	}
}

function _get_status_from_id($id) 
{
	$user_data = get_where("users", $id);
	foreach ($user_data as $key => $row) {
		return $status = $row['status'];
	}
}

function _get_accttype_from_id($id) 
{
	$user_data = get_where("users", $id);
	foreach ($user_data as $key => $row) {
		return $acct_type = $row['acct_type'];
	}
}

function get_fullname_from_id($id)
{
	$user_data = get_where("users", $id);
	foreach ($user_data as $key => $row) {
		return $acct_type = $row['firstname']." ".$row['lastname'];
	}
}

function get_bounce($table_name1, $table_name2, $column1, $column2)
{
	$conn = getConnection();
	$sql = "SELECT * FROM $table_name1 FULL OUTER JOIN $table_name2 ON $table_name1.$column1=$table_name2.$column2 ORDER BY $table_name1.$column1";
	$result = $conn->query($sql);
	return $result;
}

function dati_ayaw_niya_sakin($ngayonshewanna)
{
	$conn = getConnection();
	$sql = "SELECT * FROM attendance FULL OUTER JOIN students ON attendance.s_id=students.id ORDER BY students.id";
	$result = $conn->query($sql);
	return $result;
}

function search_stud($table_name, $search)
{
	$conn = getConnection();
	$sql = "SELECT * FROM $table_name where
	 (id LIKE '%$search%' OR
	 year_level LIKE '%$search%' OR 
	 section LIKE '%$search%' OR 
	 program LIKE '%$search%' OR 
	 firstname LIKE '%$search%' OR 
	 middlename LIKE '%$search%' OR 
	 lastname LIKE '%$search%' OR 
	 email LIKE '%$search%' OR 
	 contact LIKE '%$search%')";
	$result = $conn->query($sql);
	return $result;
}

function search_inactive_stud($table_name, $search)
{
	$conn = getConnection();
	$sql = "SELECT * FROM $table_name where
	 (id LIKE '%$search%' OR
	 year_level LIKE '%$search%' OR 
	 section LIKE '%$search%' OR 
	 program LIKE '%$search%' OR 
	 firstname LIKE '%$search%' OR 
	 middlename LIKE '%$search%' OR 
	 lastname LIKE '%$search%' OR 
	 email LIKE '%$search%' OR 
	 contact LIKE '%$search%' OR 
	 officer LIKE '%$search%' OR 
	 gender LIKE '%$search%') AND (status = 1)";
	$result = $conn->query($sql);
	return $result;
}

function search_event($table_name, $search)
{
	
	$conn = getConnection();
	$sql = "SELECT * FROM $table_name where
	 (event_id LIKE '%$search%' OR
	 event_name LIKE '%$search%' OR 
	 e_date LIKE '%$search%' OR 
	 e_end LIKE '%$search%' OR 
	 venue LIKE '%$search%') AND (status = 0)";
	$result = $conn->query($sql);
	return $result;
}

function search_inactive_event($table_name, $search)
{
	
	$conn = getConnection();
	$sql = "SELECT * FROM $table_name where
	 (event_id LIKE '%$search%' OR
	 event_name LIKE '%$search%' OR 
	 e_date LIKE '%$search%' OR 
	 e_end LIKE '%$search%' OR 
	 venue LIKE '%$search%') AND (status = 1)";
	$result = $conn->query($sql);
	return $result;
}

function search_sanc($table_name, $search)
{
	
	$conn = getConnection();
	$sql = "SELECT * FROM $table_name where
	 sanction_id LIKE '%$search%' OR
	 sanction_name LIKE '%$search%' OR 
	 quantity LIKE '%$search%'";
	$result = $conn->query($sql);
	return $result;
}

function search_inactive_sanc($table_name, $search)
{
	
	$conn = getConnection();
	$sql = "SELECT * FROM $table_name where
	 (sanction_id LIKE '%$search%' OR
	 sanction_name LIKE '%$search%' OR 
	 quantity LIKE '%$search%') AND (status = 1)";
	$result = $conn->query($sql);
	return $result;
}

function search_account($table_name, $search)
{
	
	$conn = getConnection();
	$sql = "SELECT * FROM $table_name where
	 username LIKE '%$search%' OR
	 firstname LIKE '%$search%' OR
	 middlename LIKE '%$search%' OR 
	 lastname LIKE '%$search%' OR 
	 user_type LIKE '%$search%' OR 
	 contact LIKE '%$search%' OR 
	 email LIKE '%$search%'";
	$result = $conn->query($sql);
	return $result;
}

function get_last($table_name, $column)
{
	$conn = getConnection();
	$sql = "SELECT * FROM $table_name ORDER BY $column DESC LIMIT 1";
	$result = $conn->query($sql);
	return $result;
}

function get_desc($table_name, $column)
{
	$conn = getConnection();
	$sql = "SELECT * FROM `$table_name` ORDER BY `$column` DESC";
	$result = $conn->query($sql);
	return $result;
}

function get_startswith($table_name, $column, $value){
	$conn = getConnection();
	$sql = "SELECT * FROM $table_name where ".$column." LIKE '".$value."%'";
	$result = $conn->query($sql);
	return $result;
}

function all_users_search($search)
{
	$conn = getConnection();
	$sql = "SELECT * FROM tbl_users where
	 (user_qr LIKE '%$search%' OR
	 username LIKE '%$search%' OR 
	 firstname LIKE '%$search%' OR 
	 lastname LIKE '%$search%') OR
	 birthdate LIKE '%$search%' OR
	 gender LIKE '%$search%' OR
	 user_type LIKE '%$search%'";
	$result = $conn->query($sql);
	return $result;
}

function all_users_search_count($search)
{
	if (strtolower($search)=="male"){
		$search="m";
		
	} else if (strtolower($search)=="female"){
		$search="f";
	}
	
	// return $search;
	
	$conn = getConnection();
	$sql = "SELECT * FROM tbl_users where
	 (user_qr LIKE '%$search%' OR
	 username LIKE '%$search%' OR 
	 firstname LIKE '%$search%' OR 
	 lastname LIKE '%$search%') OR
	 birthdate LIKE '%$search%' OR
	 gender LIKE '%$search%' OR
	 user_type LIKE '%$search%'";
	$result = $conn->query($sql);
	$rowcount=mysqli_num_rows($result);
	// printf($rowcount,"ito o");
	return $rowcount;
}

function active_subs_count($value)
{	
	$conn = getConnection();
	$sql = "SELECT * FROM tbl_subscription where (subscription_status='Active' or subscription_status='Last day') and user_id='".$value."'";
	$result = $conn->query($sql);
	$rowcount=mysqli_num_rows($result);
	// printf($rowcount,"ito o");
	return $rowcount;
}

function get_where_custom_count($table_name, $column, $value)
{
	$conn = getConnection();
	$sql = "SELECT * FROM $table_name where ".$column." = '".$value."'";
	$result = $conn->query($sql);
	$rowcount=mysqli_num_rows($result);
	return $rowcount;
}

function sum_where($table_name, $col1, $col2, $val2)
{

	$conn = getConnection();
    $sql= "SELECT SUM(CAST(".$col1." AS DECIMAL)) AS total_sum
    FROM $table_name
    WHERE ".$col2." = '$val2'";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($row) {
        $total_sum = $row['total_sum'];
        // echo "Total sum of column1: $total_sum";
    } else {
        // echo "No rows found.";
    }
    return $total_sum;

}

?>