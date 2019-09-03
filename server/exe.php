<?php
session_start();
include"db.php";
if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
}
function safe_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function get_ip(){
    $ipAddress = $_SERVER['REMOTE_ADDR'];
    if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
        $ipAddress = array_pop(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']));
    }
    return $ipAddress;
}
function read_image($file_name){
    $filename = "img_upload/".$file_name.".png";
    $handle = fopen($filename, "rb");
    $contents = fread($handle, filesize($filename));
    return "data:image/png;base64,".base64_encode($contents);
    fclose($handle);
}
function parse_data($cols,$select_user_data,$private_col,$public_col){
    foreach ($cols as $column_name) {
        if(!in_array($column_name["Field"],$private_col)){array_push($public_col,$column_name["Field"]);}
    }
    $response=new \stdClass();
    for($i=0;$i<sizeof($public_col);$i++){
        $tmp=$public_col[$i];
        $data=$select_user_data[0][$public_col[$i]];
        if($tmp!='img'){$response->$tmp=strval($data);}else{$response->$tmp=read_image(strval($data));}//using $tmp var because of "Array to string conversion"
    }
    return $response;
}
if(isset($_SESSION["logged"])==1 && $_SESSION['email']!=""){
    if(isset($_GET['fetch_me'])){
        $select_column_name = $db->query('SHOW COLUMNS FROM students')->fetchAll();
        $select_user_data = $db->query('SELECT * FROM students WHERE email=?',$_SESSION['email'])->fetchAll();
        $private_col=array("id","password","registration_time","last_update","first_ip","last_ip");
        $public_col=array();
        $response[0]=new \stdClass();
        $response[1]=new \stdClass();
        //$response[1]=new \stdClass();
        $response[0]->user_data=parse_data($select_column_name,$select_user_data,$private_col,$public_col);
        $response[1]->site_data=json_decode('{"application_open":",Internship,Placement,Job Readiness Program","home_notification":"","dashboard_notification":""}');
        echo $response=json_encode($response);
    }else if(isset($_GET['fetch_site_data'])){
        $select_column_name = $db->query('SHOW COLUMNS FROM site_data')->fetchAll();
        $select_user_data = $db->query('SELECT * FROM site_data')->fetchArray();
        $private_col=array("id");
        $public_col=array();
        foreach ($select_column_name as $column_name) {
            if(!in_array($column_name["Field"],$private_col)){array_push($public_col,$column_name["Field"]);}
        }
        $response=new \stdClass();
        for($i=0;$i<sizeof($public_col);$i++){
            $tmp=$public_col[$i];
            $data=$select_user_data[$public_col[$i]];
            if($tmp!='img'){$response->$tmp=strval($data);}else{$response->$tmp=read_image(strval($data));}//using $tmp because of Array to string conversion here
        }
        echo json_encode($response);
        
    }else if(isset($_GET['apply_for']) || isset($_GET['application_cancel_for'])){
        $apply_for=safe_input($_POST['application']);
        $select_user_applications = $db->query('SELECT applied_for FROM students WHERE email=?',$_SESSION['email'])->fetchArray();
        $already_applied=explode(",",$select_user_applications['applied_for']);
        $application_open=array("Internship","Placement","Job Readiness Program");
        if(((!in_array($apply_for,$already_applied)&& isset($_GET['apply_for']))||(in_array($apply_for,$already_applied)&& isset($_GET['application_cancel_for'])))&& in_array($apply_for,$application_open)){// if student not applied $apply_for && application is open to apply
            if(isset($_GET['apply_for'])){
                array_push($already_applied,$apply_for);
            }else{
                array_splice($already_applied, array_search($apply_for,$already_applied),1);
                //var_dump($already_applied);
            }
            $already_applied=implode(",",$already_applied);            
            $insert = $db->query('UPDATE students set applied_for=? WHERE email=?',$already_applied, $_SESSION['email']) ;
            if($insert->affectedRows()==1){
                echo '{"data":"applied successfully"}';
            }else{ echo '{"data":"somthing went wrong"}';}
        }else if(!in_array($apply_for,$already_applied) && !in_array($apply_for,$application_open)){// if student not applied $apply_for && application is not open to apply
            echo '{"data":"no such application open"}';
        }else{//if student re apply application
            echo '{"data":"you have already applied"}';
        }
    }
}elseif(isset($_SESSION['admin_logged'])){
    if(isset($_GET['change_password'])){
        $current_password=safe_input($_POST['current_password']);
        $new_password=safe_input($_POST['new_password']);
        if(strlen($new_password)>6){
            $select_admin = $db->query('SELECT username, password FROM admin WHERE username=?',$_SESSION['username']);
            $rows=$select_admin->numRows();
            $select_admin=$select_admin->fetchArray();
            //if(($rows!=null)&&(password_verify($password, $fetch['password']))){//check email is in db and password is right
            if(($rows!=null)&&(password_verify($current_password, $select_admin['password']))){
                $hashed_password=password_hash($new_password, PASSWORD_DEFAULT);
                $insert = $db->query('UPDATE admin set password=? WHERE username=?',$hashed_password,$_SESSION['username']);
                $_SESSION['msg']=array("successful","{Password changed}");
                header("location: dashboard.php#setting");
            }else{$_SESSION['msg']=array("danger","{Enter Correct Current Password}");header("location: dashboard.php#setting");}
        }else{$_SESSION['msg']=array("danger","{Password Should not Less Then 6 digits}"); header("location: dashboard.php#setting");}
    }
}else{echo '{"data":"auth failed"}';}
?>