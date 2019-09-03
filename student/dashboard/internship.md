---
layout: default
title: Student Portal
description: We provide jobs.
---
<div class="container" style="padding-top:120px">
    <form id="upc_form" action="#" method="post">
        <div class="row">
            <div class="input-field col s12 l6">
                <input id="name" name="name" type="text" class="validate">
                <label for="name">Name of the Student</label>
            </div>
            <div class="input-field col s12 l5">
                <input id="fathers_name" name="fathers_name" type="text" class="validate">
                <label for="fathers_name">Father's Name</label>
            </div>
            <div class="input-field col s12 l2">
                <select name="gender">
                    <option value="" disabled selected>Gender</option>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                    <option value="3">Other</option>
                </select>
            </div>
            <div class="input-field col s12 l2">
                <input type="text" class="datepicker" name="date_of_birth" placeholder="Date of birth">
            </div>`
            <div class="input-field col s12 l2">
                <input id="student_id" name="student_id" type="text" class="validate">
                <label for="student_id">Student I.D.</label>
            </div>
            <div class="input-field col s12 l3">
                <input id="enrolment_no" type="text" name="enrolment_no" class="validate">
                <label for="enrolment_no">Enrolment No</label>
            </div>
            <div class="input-field col s12 l2">
                <select name="course">
                    <option value="" disabled selected>Course</option>
                    <option value="1">B.Tech</option>
                    <option value="2">B.E.</option>
                    <option value="-1">Other</option>
                </select>
            </div>
            <div class="input-field col s12 l2">
                <select name="branch">
                    <option value="" disabled selected>Branch</option>
                    <option value="1">Computer Engineering</option>
                    <option value="2">Electronics</option>
                    <option value="3">Electrical</option>
                    <option value="4">Civil</option>
                    <option value="5">Mechanical</option>
                    <option value="-1">Other</option>
                </select>
            </div>
            <div class="input-field col s12 l2">
                <select name="current_year" id="current_year" onchange="select_year(this.value)">
                    <option value="" disabled selected>Current Year</option>
                    <option value="1">1st Year</option>
                    <option value="2">2nd Year</option>
                    <option value="3">3rd Year</option>
                    <option value="4">4th Year</option>
                    <option value="5">5th Year</option>
                </select>
            </div>
            <div class="input-field col s12 l2">
                <input id="contact_no" type="text" name="contact_no" class="validate">
                <label for="contact_no">Contact No</label>
            </div>
            <div class="input-field col s12 l2">
                <input id="alternative_contact_no" type="text" name="alternative_contact_no" class="validate">
                <label for="alternative_contact_no">Alternate Contact No</label>
            </div>
            <div class="input-field col s12 l3">
                <input id="email" type="text" name="email" class="validate" disabled>
                <label for="email">Email</label>
            </div>
            <div class="input-field col s12 l12">
                <input id="address" type="text" name="address" class="validate">
                <label for="address">Address</label>
            </div>
            <div class="col s12"><p><b>Details of 10<sup>th</sup> class</b></p></div>
            <div class="input-field col s12 l1">
                <input id="percentage_10th" type="text" name="percentage_10th" class="validate">
                <label for="percentage_10th">Percentage</label>
            </div>
            <div class="input-field col s12 l2">
                <input type="text" name="year_10th" placeholder="Year of passing">
            </div>
            <div class="input-field col s12 l9">
                <input id="board_10th" type="text" name="board_10th" class="validate">
                <label for="board_10th">Board of Examination</label>
            </div>
            <div class="col s12"><p><b>Details of 12<sup>th</sup> class</b></p></div>
            <div class="input-field col s12 l1">
                <input id="percentage_12th" type="text" name="percentage_12th" class="validate">
                <label for="percentage_12th">Percentage</label>
            </div>
            <div class="input-field col s12 l2">
                <input type="text" name="year_12th" placeholder="Year of passing">
            </div>
            <div class="input-field col s12 l9">
                <input id="board_12th" type="text" name="board_12th" class="validate">
                <label for="board_12th">Board of Examination</label>
            </div>
            <div class="col l6 s12 student_cpi" id="1_sem_cpi">
                <div class="col s12"><p><b>Details of 1<sup>st</sup> year</b></p></div>
                <div class="input-field col s12 l6">
                    <input id="sem_1_1_cpi" type="text" name="sem_1_1_cpi" class="validate">
                    <label for="sem_1_1_cpi">1<sup>st</sup> semester cpi</label>
                </div>
                <div class="input-field col s12 l6">
                    <input id="sem_1_2_cpi" type="text" name="sem_1_2_cpi" class="validate">
                    <label for="sem_1_2_cpi">2<sup>nd</sup> semester cpi</label>
                </div>    
            </div>
            <div class="col l6 s12 student_cpi" id="2_sem_cpi">    
                <div class="col s12"><p><b>Details of 2<sup>nd</sup> year</b></p></div>
                <div class="input-field col s12 l6">
                    <input id="sem_2_1_cpi" type="text" name="sem_2_1_cpi" class="validate">
                    <label for="sem_2_1_cpi">1<sup>st</sup> semester cpi</label>
                </div>
                <div class="input-field col s12 l6">
                    <input id="sem_2_2_cpi" type="text" name="sem_2_2_cpi" class="validate">
                    <label for="sem_2_2_cpi">2<sup>nd</sup> semester cpi</label>
                </div>    
            </div>
            <div class="col l6 s12 student_cpi" id="3_sem_cpi">
                <div class="col s12"><p><b>Details of 3<sup>rd</sup> year</b></p></div>
                <div class="input-field col s12 l6">
                    <input id="sem_3_1_cpi" type="text" name="sem_3_1_cpi" class="validate">
                    <label for="sem_3_1_cpi">1<sup>st</sup> semester cpi</label>
                </div>
                <div class="input-field col s12 l6">
                    <input id="sem_3_2_cpi" type="text" name="sem_3_2_cpi" class="validate">
                    <label for="sem_3_2_cpi">2<sup>nd</sup> semester cpi</label>
                </div>  
            </div>
            <div class="col l6 s12 student_cpi" id="4_sem_cpi">
                <div class="col s12"><p><b>Details of 4<sup>th</sup> year</b></p></div>
                <div class="input-field col s12 l6">
                    <input id="sem_4_1_cpi" type="text" name="sem_4_1_cpi" class="validate">
                    <label for="sem_4_1_cpi">1<sup>st</sup> semester cpi</label>
                </div>
                <div class="input-field col s12 l6">
                    <input id="sem_4_2_cpi" type="text" name="sem_4_2_cpi" class="validate">
                    <label for="sem_4_2_cpi">2<sup>nd</sup> semester cpi</label>
                </div>
            </div>
            <div class="col l6 s12 student_cpi" id="5_sem_cpi">
                <div class="col s12"><p><b>Details of 5<sup>th</sup> year</b></p></div>
                <div class="input-field col s12 l6">
                    <input id="sem_5_1_cpi" type="text" name="sem_5_1_cpi" class="validate">
                    <label for="sem_5_1_cpi">1<sup>st</sup> semester cpi</label>
                </div>
                <div class="input-field col s12 l6">
                    <input id="sem_5_2_cpi" type="text" name="sem_5_2_cpi" class="validate">
                    <label for="sem_5_2_cpi">2<sup>nd</sup> semester cpi</label>
                </div>
            </div>
            <div id="imgup-modal1" class="modal">
                <div class="center modal-content">
                <h4 >Upload Photo</h4>
                <input type="file" id="img_file" style="display:none" onchange="upload_image()">
                <p class="center-all"><label for="img_file" class="waves-effect waves-light btn blue" >Image</label></p>
                <p class="center-all"><img src="" style="height:250px;max-width: 200px" name="preview_img" id="preview_img"></p>
                </div>
                <div class="modal-footer">
                <input type="submit" class="btn-flat blue white-text" value="Upload">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat blue white-text left">Back</a>
                </div>
            </div>
        </div>
        <p class="center-all"><a class="waves-effect waves-light btn modal-trigger blue" href="#imgup-modal1" >Upload Photo</a><!--<input type="submit" value="Apply" class="btn btn-primary btn-block" style="margin-left:auto;margin-right:auto"/>--></p>
    </form>
</div>
<script>
object.addEventListener("load", myScript);
</script>