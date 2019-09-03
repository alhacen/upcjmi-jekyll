<?php
echo "asd".substr(1);
?>


<?php


/*
header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
header('Access-Control-Allow-Credentials: true');
        
session_start();
$_SESSION["name"]='{"name":"hassan"}';
echo $_SESSION["name"];
//echo session_id()."<br>";
//echo $_COOKIE['PHPSESSID'];
*/
// function rand_() {
//     $salt = "abchefghjkmnpqrstuvwxyz0123456789";
//     srand((double)microtime()*1000000); 
//     $i = 0;
//     while ($i <= 7) {
//             $num = rand() % 33;
//             $tmp = substr($salt, $num, 1);
//             $a = $a . $tmp;
//             $i++;
//     }
//     return $a;
// }
// $img_rand=rand_();
// $file_name  =  "$td-".rand_() ;
// if(isset($_FILES["pic"]) && $_FILES["pic"]["error"] == 0){
//     $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
//     $filename = $_FILES["pic"]["name"];
//     $filetype = $_FILES["pic"]["type"];
//     $filesize = $_FILES["pic"]["size"]; 
//     $fileext=pathinfo($filename, PATHINFO_EXTENSION);
//     // Verify file extension
//     if (\strpos('| jpg | png | jpeg | gif', strtolower(pathinfo($filename, PATHINFO_EXTENSION))) == false) {echo "wrong ext";exit();}
//     //  if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");    
//     // Verify file size - 5MB maximum
//     $maxsize = 15 * 1024 * 1024;
//     if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");    
//     // Verify MYME type of the file
//     if(in_array($filetype, $allowed)){
//             move_uploaded_file($_FILES["pic"]["tmp_name"], "img_upload/$file_name" . substr($filename,strpos($filename,".")));
//             //echo  "img_upload/".$file_name. substr($filename,strpos($filename,"."));
//             do{
//                 $sql = "SELECT  img_rand FROM image WHERE img_rand='$img_rand'";
//                 $result = mysqli_query($conn, $sql);
//                 if (mysqli_num_rows($result) > 0) {$img_rand=rand_();}else{$name_flag=1;}
//             }while($name_flag==0);
//             $sql = "INSERT INTO image (name,img_rand ,owner, type, upload_time,level,kill_time)
//             VALUES ('$file_name.$fileext','$img_rand','$username','$type','$current_time','0','$kill_time')";
//             if ($conn->query($sql) === TRUE) {
//                 make_thumb("img_upload/$file_name" . substr($filename,strpos($filename,".")), "img_upload/thumb/$file_name" . substr($filename,strpos($filename,".")), 600);
//                 echo "include/image.php?img=$img_rand&thumb";
//             }else {
//                 echo "somthing went wrong1";
//             }
//     }else{
//         echo "somthing went wrong2"; 
//     }
// } else{
//     echo "somthing went wrong3";
// }
?>
