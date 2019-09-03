<?php
session_start();
function read_image($file_name){
    $filename = "img_upload/".$file_name.".png";
    $handle = fopen($filename, "rb");
    $contents = fread($handle, filesize($filename));
    return "data:image/png;base64,".base64_encode($contents);
    fclose($handle);
}
if($_SESSION['admin_logged']==1){
    include'db.php';
}else{header('location: dashboard_login.php');exit();}
if(isset($_GET['id'])){
    $student = $db->query("SELECT * FROM students WHERE id = ?", $_GET['id'])->fetchArray();
    echo "
    <table class='table table-striped table-bordered table-hover' width='875' align='center' style='font-size:12px; font-family:Open Sans, Arial, Helvetica, sans-serif; border:1px solid #000;'>
                    <tbody>
                    <tr>
                        <td width='100%' valign='top' align='center' colspan='4' style='font-size:22px; font-weight:bold'>JAMIA MILLIA ISLAMIA</td>
                    </tr>
                    <tr class='highlighted'>
                        <td width='100%' valign='top' align='center' style='padding-bottom:5px; border-bottom:1px dashed #333; text-align:center;' colspan='4'><img width='110' height='117' alt='JAMIA MILLIA ISLAMIA' src='http://jmiregular.ucanapply.com/examinationsystemjmi/public/img/logoprint.png'></td>
                    </tr>
                    <tr class=''>
                        <td width='100%' valign='top' align='center' colspan='4' style='font-size:16px; font-weight:bold'>STUDENT DATA SHEET</td>
                    </tr>
                    <tr>
                        <td width='20%' valign='top' height='20' align='left'><strong>Candidate Name: </strong></td>
                        <td width='30%' valign='top' align='left'><strong>".$student['name']."</strong></td>
                        <td width='50%' valign='top' align='center' rowspan='9' colspan='2'>
                        
                        <img src='".read_image($student['img'])."' width='120' height='180' alt='photo'>
                        
                        </td>
                    </tr>
                    <tr class=''>
                        <td valign='top' height='20' align='left'><strong>Father's Name: </strong></td>
                        <td valign='top' align='left' colspan='3'>".$student['fathers_name']."</td>
                    </tr>
                    <tr>
                        <td valign='top' height='20' align='left'><strong>Enrolment No: </strong></td>
                        <td valign='top' align='left' colspan='3'>".$student['enrolment_no']."</td>
                    </tr>
                    <tr>                        
                        <td valign='top'  height='20' align='left'><strong>Student ID No.</strong></td>
                        <td valign='top' align='left'>".$student['student_id']."</td>
                    </tr>
                    <tr>
                        <td valign='top' height='20' align='left'><strong>Date of Birth: </strong></td>
                        <td valign='top' align='left' colspan='3'>".$student['date_of_birth']."</td>
                    </tr>
                    <tr>
                        <td valign='top' height='20' align='left'><strong>Course: </strong></td>
                        <td valign='top' align='left' colspan='3' id='course'>".$student['course']."</td>
                    </tr>
                    <tr>
                        <td valign='top' height='20' align='left'><strong>Branch: </strong></td>
                        <td valign='top' align='left' colspan='3' id='branch'>".$student['branch']."</td>
                    </tr>
                    <tr>
                        <td valign='top' height='20' align='left'><strong>Applied For: </strong></td>
                        <td valign='top' align='left' colspan='3' id='branch'>".substr($student['applied_for'],1)."</td>
                    </tr>
                    <tr style='display:none'>
                        <td valign='top' align='left'><strong>Current Year: </strong></td>
                        <td valign='top' align='left' colspan='3' id='current_year'>".$student['current_year']."</td>
                    </tr>
                    
                    


                    </tbody>
                </table>
                <table class='table table-striped table-bordered table-hover' width='875' align='center' style='font-size:12px; font-family:Open Sans, Arial, Helvetica, sans-serif; border:1px solid #000;'>
                <tbody>
                        <tr>
                            <td>
                                <table>
                                    <tbody>
                                        <th>
                                        cpi
                                        </th>
                                        <tr>
                                            <td id='sem-1'>sem1</td>
                                            <td id='sem-2'>sem2</td>
                                            <td id='sem-3'>sem3</td>
                                            <td id='sem-4'>sem4</td>
                                            <td id='sem-5'>sem5</td>
                                            <td id='sem-6'>sem6</td>
                                            <td id='sem-7'>sem7</td>
                                            <td id='sem-8'>sem8</td>
                                            <td id='sem-9'>sem9</td>
                                            <td id='sem-10'>sem10</td>
                                        </tr>
                                        <tr>
                                            <td id='sem-1-cpi'><p style='text-align:center'>".$student['sem_1_cpi']."</p></td>
                                            <td id='sem-2-cpi'><p style='text-align:center'>".$student['sem_2_cpi']."</p></td>
                                            <td id='sem-3-cpi'><p style='text-align:center'>".$student['sem_3_cpi']."</p></td>
                                            <td id='sem-4-cpi'><p style='text-align:center'>".$student['sem_4_cpi']."</p></td>
                                            <td id='sem-5-cpi'><p style='text-align:center'>".$student['sem_5_cpi']."</p></td>
                                            <td id='sem-6-cpi'><p style='text-align:center'>".$student['sem_6_cpi']."</p></td>
                                            <td id='sem-7-cpi'><p style='text-align:center'>".$student['sem_7_cpi']."</p></td>
                                            <td id='sem-8-cpi'><p style='text-align:center'>".$student['sem_8_cpi']."</p></td>
                                            <td id='sem-9-cpi'><p style='text-align:center'>".$student['sem_9_cpi']."</p></td>    
                                            <td id='sem-10-cpi'><p style='text-align:center'>".$student['sem_10_cpi']."</p></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>                                      
                    <tr>
                        <td valign='top' align='left' style='width:50%;' colspan='2'><table class='table table-striped table-bordered table-hover' style='font-size:12px; font-family: Open Sans, Arial, Helvetica, sans-serif; width:100%; border:1px solid #000;'>
                            <thead style='background:#e8e8e8'>
                            <tr>
                                <th valign='top' align='left' style='border-top: 3px solid #000; border-bottom: 1px solid #000;' colspan='2'><strong>ADDRESS </strong></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td width='30%' valign='top' align='left'><strong>Address Line </strong>:</td>
                                <td width='70%' valign='top' align='left'>".$student['address']."</td>
                            </tr>
                            
                            <tr>
                                <td valign='top' align='left'>&nbsp;</td>
                                <td valign='top' align='left'></td>
                            </tr>
                            
                            <tr>
                                <td valign='top' align='left'><strong>Email: </strong></td>
                                <td valign='top' align='left'>".$student['email']."</td>
                            </tr>
                            <tr>
                                <td valign='top' align='left'><strong>Mobile No: </strong></td>
                                <td valign='top' align='left'>".$student['contact_no']."</td>
                            </tr>
                            </tbody>
                        </table></td>

                                        <tr>
                        <td valign='top' height='20' align='left'>&nbsp;</td>
                        <td valign='top' align='left'>&nbsp;</td>
                        <td valign='top' align='left'>&nbsp;</td>
                        <td valign='top' align='left'>&nbsp;</td>
                    </tr>
                    
                                        <tr>
                        <td valign='top' align='left'>&nbsp;</td>
                        <td valign='top' align='left'>&nbsp;</td>
                        <td valign='top' height='20' align='right'>&nbsp;</td>
                        <td valign='top' align='left'>
                        
                    
                        </td>
                    </tr>

                
                </table>
                <script>
                    function _(a){return document.getElementById(a)}
                    for(i=2*(_('current_year').innerHTML)+1;i<=10;i++){
                        _('sem-'+i).style.display='none';
                        _('sem-'+i+'-cpi').style.display='none';
                    }
                    _('branch').innerHTML=1
                    switch(_('branch').innerHTML){
                        case '1':
                            _('branch').innerHTML='Computer Engineering';
                            break;
                        case '2':
                            _('branch').innerHTML='Electronics';
                            break;
                        case '3':
                            _('branch').innerHTML='Electrical';
                            beark;
                        case '4':
                            _('branch').innerHTML='Civil';
                            beark;
                        case '5':
                            _('branch').innerHTML='Mechanical';
                            break;
                        default:
                            _('branch').innerHTML='Other';
                            break;
                    }
                    switch(_('course').innerHTML){
                        case '1':
                            _('course').innerHTML='B.Tech';
                            break;
                        case '2':
                            _('course').innerHTML='B.E.';
                            break;
                        default:
                            _('course').innerHTML='Other';
                            break;
                    }
                </script>
                ";
}
?>