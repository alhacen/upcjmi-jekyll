<?php
session_start();
if($_SESSION['admin_logged']==1){
    include'db.php';
}else{header('location: index.php');exit();}
if(isset($_GET['q'])){
    $q=htmlspecialchars($_GET['q']);
    $limit=(isset($_GET['limit'])&&$_GET['limit']!="")?$_GET['limit']:10;
    $from=(isset($_GET['from'])&&$_GET['from']!="")?$_GET['from']:"";
    if(isset($_GET['to'])&&$_GET['to']!=""){
        $to=isset($_GET['to']);
        $to=strtotime($to);
        $to=strtotime("tomorrow");
        $to=date("Y-m-d", $to);
    }else{
        $to="";
    }
    if((isset($_GET['from'])&&$_GET['from']!="")&&(isset($_GET['to'])&&$_GET['to']=="")){
        $datas = $db->query("SELECT * FROM students WHERE (name LIKE '%{$q}%') AND (registration_time LIKE '%{$from}%') ORDER BY id DESC")->fetchAll();
            foreach ($datas as $data) {
            echo '{"id":"'.$data['id'].'","name":"'.$data['name'].'","enrolment_no":"'.$data['enrolment_no'].'","current_year":"'.$data['current_year'].'","contact_no":"'.$data['contact_no'].'","student_id":"'.$data['student_id'].'","branch":"'.$data['branch'].'","applied_for":"'.$data['applied_for'].'"},';
        }        
    }elseif((isset($_GET['from'])&&$_GET['from']!="")&&(isset($_GET['to'])&&$_GET['to']!="")){
        $datas = $db->query("SELECT * FROM students WHERE (name LIKE '%{$q}%') AND (registration_time >= '$from') AND (registration_time <= '$to') ORDER BY id DESC")->fetchAll();
            foreach ($datas as $data) {
                echo '{"id":"'.$data['id'].'","name":"'.$data['name'].'","enrolment_no":"'.$data['enrolment_no'].'","current_year":"'.$data['current_year'].'","contact_no":"'.$data['contact_no'].'","student_id":"'.$data['student_id'].'","branch":"'.$data['branch'].'","applied_for":"'.$data['applied_for'].'"},';
        }
    }else{
        $datas = $db->query("SELECT * FROM students WHERE name LIKE '%{$q}%' ORDER BY id DESC")->fetchAll();
            foreach ($datas as $data) {
                echo '{"id":"'.$data['id'].'","name":"'.$data['name'].'","enrolment_no":"'.$data['enrolment_no'].'","current_year":"'.$data['current_year'].'","contact_no":"'.$data['contact_no'].'","student_id":"'.$data['student_id'].'","branch":"'.$data['branch'].'","applied_for":"'.$data['applied_for'].'"},';
        }
    }
}
?>