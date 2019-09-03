<?php
session_start();
require_once('image_upload.php');
if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
}
include "db.php";
function safe_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function is_text_string($string){
    if (!preg_match('/^[a-zA-Z\s]+$/', $string)) {
        return true;
    }else{false;}
}
function is_date($date){
    $test_arr  = explode('-', $date);
    if (checkdate($test_arr[1], $test_arr[2], $test_arr[0])) {
        return true;
    }else{false;}
}
if(isset($_SESSION["logged"])==1 && $_SESSION['email']!="" && isset($_GET['update_profile'])){
    //$data=json_decode($_POST['data']);
    $data = json_decode(file_get_contents('php://input'));
    $student_name=safe_input($data->name);
    $fathers_name=safe_input($data->fathers_name);
    $gender=safe_input($data->gender);
    $student_id=safe_input($data->student_id);
    $date_of_birth=safe_input($data->date_of_birth);
    $enrolment_no=safe_input($data->enrolment_no);
    $current_year=safe_input($data->current_year);
    $course=safe_input($data->course);
    $branch=safe_input($data->branch);
    $contact_no=safe_input($data->contact_no);
    $alternative_contact_no=safe_input($data->alternative_contact_no);
    //$email=safe_input($data->email);
    $address=safe_input($data->address);
    $percentage_10th=safe_input(floatval($data->percentage_10th));
    $year_10th=safe_input($data->year_10th);
    $board_10th=safe_input($data->board_10th);
    $year_12th=safe_input($data->year_12th);
    $percentage_12th=safe_input(floatval($data->percentage_12th));
    $board_12th=safe_input($data->board_12th);

    $sem_1_cpi=(float)safe_input($data->sem_1_cpi);
    $sem_2_cpi=(float)safe_input($data->sem_2_cpi);
    $sem_3_cpi=(float)safe_input($data->sem_3_cpi);
    $sem_4_cpi=(float)safe_input($data->sem_4_cpi);
    $sem_5_cpi=(float)safe_input($data->sem_5_cpi);

    $sem_6_cpi=(float)safe_input($data->sem_6_cpi);
    $sem_7_cpi=(float)safe_input($data->sem_7_cpi);
    $sem_8_cpi=(float)safe_input($data->sem_8_cpi);
    $sem_9_cpi=(float)safe_input($data->sem_9_cpi);
    $sem_10_cpi=(float)safe_input($data->sem_10_cpi);
    $img=safe_input($data->img);
    list($type, $img) = explode(';', $img);
    list(, $img)      = explode(',', $img);
    if(is_text_string($student_name) || is_text_string($fathers_name)){
        echo '{"data":"name and fathers name can only contain letters"}';
        exit();
    }
    if(!in_array($gender,[1,2,3])|| !is_date($date_of_birth) || (((int)$year_12th-(int)$year_10th)<2) || ($current_year>5 || $current_year<1 || $current_year=="") || !ctype_digit($contact_no) || (!ctype_digit($alternative_contact_no)&&$alternative_contact_no!="") || !ctype_digit($student_id) || strlen($student_id) <8 || strlen($student_id) >10 || $address=="" || $percentage_10th=="" || $percentage_12th=="" || $board_10th=="" || $board_12th==""){
        $error=true;
        echo '{"data":"somthing went wrong"}';
        exit();
    }
    $image_size = (int) (strlen(rtrim($img, '=')) * 3 / 4)/(1024);//image size in KB
    if($image_size>400){
        echo '{"data":"image should be less than 400 KB"}';
        exit();
    }
    $time=date("Y-m-d H:i:s");

    // $insert = $db->query('INSERT INTO students (name,fathers_name, date_of_birth, student_id, enrolment_no, current_year, contact_no, alternative_contact_no,email, address, percentage_10th, year_10th, percentage_12th, year_12th, sem_1_1_cpi, sem_1_2_cpi, sem_2_1_cpi, sem_2_2_cpi, sem_3_1_cpi, sem_3_2_cpi, sem_4_1_cpi, sem_4_2_cpi, sem_5_1_cpi, sem_5_2_cpi, registration_time,img) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',$student_name, $fathers_name, $date_of_birth, $student_id, $enrolment_no, $current_year, $contact_no, $alternative_contact_no,$email, $address, $percentage_10th, $year_10th, $percentage_12th, $year_12th, $sem_1_1_cpi, $sem_1_2_cpi, $sem_2_1_cpi, $sem_2_2_cpi, $sem_3_1_cpi, $sem_3_2_cpi, $sem_4_1_cpi, $sem_4_2_cpi, $sem_5_1_cpi, $sem_5_2_cpi, $registration_time,$img);
    image_upload($img,$file_name);
    $insert = $db->query('UPDATE students set name=?,fathers_name=?, gender=?, date_of_birth=?, student_id=?, enrolment_no=?, current_year=?, contact_no=?, alternative_contact_no=?, address=?, percentage_10th=?, year_10th=?,board_10th=?, percentage_12th=?, year_12th=? ,board_12th=? , sem_1_cpi=?, sem_2_cpi=?, sem_3_cpi=?, sem_4_cpi=?, sem_5_cpi=?, sem_6_cpi=?, sem_7_cpi=?, sem_8_cpi=?, sem_9_cpi=?, sem_10_cpi=?, last_update=?, course=?, branch=? ,img=? WHERE email=?',$student_name, $fathers_name,$gender, $date_of_birth, $student_id, $enrolment_no, $current_year, $contact_no, $alternative_contact_no, $address, $percentage_10th, $year_10th,$board_10th, $percentage_12th, $year_12th,$board_12th, $sem_1_cpi, $sem_2_cpi, $sem_3_cpi, $sem_4_cpi, $sem_5_cpi, $sem_6_cpi, $sem_7_cpi, $sem_8_cpi, $sem_9_cpi, $sem_10_cpi, $time,$course,$branch,$file_name, $_SESSION['email']) ;
    
    if($insert->affectedRows()==1){
        echo '{"data":"profile updated successfully"}';
    }
}else if(!isset($_GET['profile_update'])){
    echo '{"data":"wrong request"}';
}else{echo '{"data":"auth failed"}';}
?>
