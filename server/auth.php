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
if(isset($_GET['status'])){
    if(isset($_SESSION["logged"])==1){//if user in session
        echo '{"logged":"1","name":"'.$_SESSION["name"].'","email":"'.$_SESSION["email"].'"}';
    }else{echo '{"logged":"0"}';}
}elseif(isset($_GET['login']) && isset($_POST['email']) && isset($_POST['password'])){
    $email=safe_input($_POST['email']);
    $password=safe_input($_POST['password']);
    $fetch = $db->query('SELECT email,password,name FROM students WHERE email = ?', $email);
    //&&password_verify($password, $fetch->fetchArray()['password'])
    $rows=$fetch->numRows();
    $fetch=$fetch->fetchArray();
    //if(($rows!=null)&&(password_verify($password, $fetch['password']))){//check email is in db and password is right
    if(($rows!=null)&&(password_verify($password, $fetch['password']))){//check email is in db and password is right
        $_SESSION["name"]=$fetch['name'];
        $_SESSION["email"]=$fetch['email'];
        $_SESSION['logged']=1;
        echo '{"logged":"1","name":"'.$_SESSION["name"].'","email":"'.$_SESSION["email"].'"}';
    }else{echo '{"data":"wrong credentials"}';}
}elseif(isset($_GET['register']) && isset($_POST['email'])  && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && isset($_POST['password']) && (strlen($_POST['password'])>=5) && isset($_POST['name'])&&$_POST['name']!=""){
    $email=safe_input($_POST['email']);
    $password=safe_input($_POST['password']);
    $name=safe_input($_POST['name']);
    $captcha = safe_input($_POST['token']);

    if(!$captcha){
        echo '{"data":"try again"}';
        exit();
    }
    $secretKey = "6LdoVbYUAAAAAObWwGWFPj_qxrAwp0IkNI1GA9iq";
    $ip = $_SERVER['REMOTE_ADDR'];

    // post request to server
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array('secret' => $secretKey, 'response' => $captcha);

    $options = array(
        'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $response = file_get_contents($url, false, $context);
    $responseKeys = json_decode($response,true);
    header('Content-type: application/json');
    //if($responseKeys["success"]) {
    if(1) {
        $fetch = $db->query('SELECT email FROM students WHERE email=?', $email);
        if($fetch->numRows()==null){
            $hashed_password=password_hash($password, PASSWORD_DEFAULT);
            $date_time=$time =date("Y-m-d H:i");
            $ip=get_ip();
            
        //$insert = $db->query('INSERT INTO students (name,password,email,registration_time,first_ip,last_seen_ip) VALUES (?,?,?,?,?,?)', $name, $hashed_password, $email,$date_time, $ip, $ip);
        //$insert = $db->query('INSERT INTO students (name,fathers_name, date_of_birth, student_id, enrolment_no, current_year, contact_no, alternative_contact_no,email, address, percentage_10th, year_10th, percentage_12th, year_12th, sem_1_1_cpi, sem_1_2_cpi, sem_2_1_cpi, sem_2_2_cpi, sem_3_1_cpi, sem_3_2_cpi, sem_4_1_cpi, sem_4_2_cpi, sem_5_1_cpi, sem_5_2_cpi, registration_time, password, first_ip, last_ip) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',$name, null, null, null, null, null, null, null,null, null, null, null, null, null, null, null,null, null, null, null, null, null, null, null, $date_time, $password, $ip, $ip);
            //$insert = $db->query('INSERT INTO students (name,fathers_name,email, date_of_birth, student_id, enrolment_no, current_year, contact_no, alternative_contact_no, address, percentage_10th, year_10th, percentage_12th, year_12th, sem_1_1_cpi, sem_1_2_cpi, sem_2_1_cpi, sem_2_2_cpi, sem_3_1_cpi, sem_3_2_cpi, sem_4_1_cpi, sem_4_2_cpi, sem_5_1_cpi,sem_5_2_cpi, registration_time, password, first_ip, last_ip) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',$name, null, $email,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,$date_time,$password, $ip, $ip);
            $insert = $db->query('INSERT INTO students (name,email, registration_time, password, first_ip, last_ip) VALUES (?,?,?,?,?,?)',$name, $email,$date_time,$hashed_password, $ip, $ip);
            if($insert->affectedRows()==1){
                echo'{"logged":"1","data":"added seccessfully"}';
                $_SESSION["name"]=$name;
                $_SESSION["email"]=$email;
                $_SESSION['logged']=1;
            }
        //$insert = $db->query('INSERT INTO students (name,email) VALUES (?,?)',$name, $email);
        }else{echo '{"data":"email already exist"}';}
    }else{echo '{"data":"bot detected"}';}
}else if(isset($_GET['killSession'])){
    unset($_SESSION['email']);
    unset($_SESSION['name']);
    unset($_SESSION['logged']);
    session_destroy();
    echo '{"data":"logged_out successfully"}';

}else{echo'{"data":"enter details"}';}

?>