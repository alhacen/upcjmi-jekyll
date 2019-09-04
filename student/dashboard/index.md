---
layout: dashboard
---
   <nav>
      <div class="nav-wrapper white">
         <a onclick="window.location=window.location.origin+window.location.pathname" class="cursor_pointer brand-logo">
         <b class="center-hv">
         <img src="/assets/images/jamia-logo.png" alt="" class="logo-img">
         <span class="upc_greeting" style="color:#333333;">
         &nbsp;University Placement Cell
         </span>
         </b>
         </a> 	
         <ul id="nav-mobile" class="right">
            <li class="hide1"><a href="#" onclick="sudoKill()">Log out</a></li>
            <li class="show1"><a href="#" onclick="side_nav_toggal()" style="font-size:25px;" data-target="slide-out" class="sidenav-trigger">☰</a></li>
            <li style="width:50px" class="hide1"></li>
         </ul>
      </div>
   </nav>
   <div id="body" class="row card white" style="margin-top:0;min-height:100vh;">
      <div class="col s12 m3 l3 center hide-on-small-only hide1 card1" style="height:100vh;" id="side-nav">
         <div id="side_user_setting_1">
            <a class="waves-effect waves-grey black-text" href="#!home" style="width:100%;height:55px">
               <div id="user_dp" class="row">
                  <div class="col s4 "><img class="circle" id="dp_desktop" src="#"></div>
                  <div class="col s7 left-align">
                     <p style="margin-top:6px"><span id="student_name"></span> <br><span style="font-size:11px"></span></p>
                  </div>
               </div>
            </a>
            <!-- -->
         </div>
         <br>
         <!-- <a class="waves-effect waves-grey black-text"  style="width:100%;height:40px">
            <div id="user_dp" class="row">
               <div class="col s12 left-align">
                  <p onclick="active_profile(1)"  style="margin:6px;text-decoration:under">Setting</p>
               </div>
            </div>
        </a> -->
            <div id="hidden_profile_settings_1" style="padding-left:30px;display:none;height:0px">
               <a class="waves-effect waves-grey black-text" href="#!profile_update" style="width:100%;height:40px">
                  <div id="user_dp" class="row">
                     <div class="col s12 left-align">
                        <p style="margin:6px;text-decoration:under">Profile</p>
                     </div>
                  </div>
               </a>
               <!-- <a class="waves-effect waves-grey black-text" href="#" style="width:100%;height:40px">
                  <div id="user_dp" class="row">
                     <div class="col s12 left-align">
                        <p style="margin:6px;text-decoration:under">Update E-mail</p>
                     </div>
                  </div>
               </a>
               <a class="waves-effect waves-grey black-text" href="#" style="width:100%;height:40px">
                  <div id="user_dp" class="row">
                     <div class="col s12 left-align">
                        <p style="margin:6px;text-decoration:under">Change Password</p>
                     </div>
                  </div>
               </a> -->
            </div>
                <a class="waves-effect waves-grey black-text" href="#!profile_update" style="width:100%;height:40px">
                    <div id="user_dp" class="row">
                        <div class="col s12 left-align">
                            <p style="margin:6px;text-decoration:under">Profile</p>
                        </div>
                    </div>
                </a>
                <a class="waves-effect waves-grey black-text sidenav-close" href="#!change_password" style="width:100%;height:40px">
                    <div class="row">
                        <div class="col s12 left-align">
                        <p style="margin:6px;text-decoration:under">Change Password</p>
                        </div>
                    </div>
                </a>
      </div>
      <div class="col s12 m12 l8" id="main">
        <div id="change_password" class="page">
            <div class="row">
                <div class="col s12 l6 m6 offset-l3 offset-m3">
                    <form>
                        <div class="row">
                            <div class="input-field col s12 ">
                            <input placeholder="curernt password" id="curernt_password" name="current_password" type="password" class="validate">
                            </div>
                            <div class="input-field col s12">
                            <input placeholder="new password" id="new_password" type="password" name="new_password" class="validate">
                            </div>
                            <div class="input-field col s12">
                            <input placeholder="confirm new password" id="confirm_new_password" name="new_password" type="password" class="validate">
                            </div>
                            <p class="center"><input type="button" onclick="change_password()" value="change" class="btn"></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="home" class="page">
            <div class="row">
                <div class="col s12 l6">
                    <table>
                        <thead>
                        <tr>
                            <th>Applications open for</th>
                        </tr>
                        </thead>
                        <tbody id="open_application_col">
                        </tbody>
                    </table>
                </div>
                <div class="col s12 l6">
                    <table>
                        <thead>
                        <tr>
                            <th>You have applied for</th>
                        </tr>
                        </thead>
                        <tbody id="applied_application_col">
                        </tbody>
                    </table>
                </div>
        </div>
      </div>
      <div id="as" class="page">asdf</div>
      <div id="as" class="page">
      </div>
        <div class="page" id="profile_update">
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
                    </div>
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
                    <div class="input-field col s12 l2">
                        <input id="percentage_10th" type="text" name="percentage_10th" class="validate">
                        <label for="percentage_10th">Percentage</label>
                    </div>
                    <div class="input-field col s12 l2">
                        <input type="text" name="year_10th" placeholder="Year of passing">
                    </div>
                    <div class="input-field col s12 l8">
                        <input id="board_10th" type="text" name="board_10th" class="validate">
                        <label for="board_10th">Board of Examination</label>
                    </div>
                    <div class="col s12"><p><b>Details of 12<sup>th</sup> class</b></p></div>
                    <div class="input-field col s12 l2">
                        <input id="percentage_12th" type="text" name="percentage_12th" class="validate">
                        <label for="percentage_12th">Percentage</label>
                    </div>
                    <div class="input-field col s12 l2">
                        <input type="text" name="year_12th" placeholder="Year of passing">
                    </div>
                    <div class="input-field col s12 l8">
                        <input id="board_12th" type="text" name="board_12th" class="validate">
                        <label for="board_12th">Board of Examination</label>
                    </div>
                    <div class="col l6 s12 student_cpi" id="1_sem_cpi">
                        <div class="col s12"><p><b>Details of 1<sup>st</sup> year</b></p></div>
                        <div class="input-field col s12 l6">
                            <input id="sem_1_cpi" type="text" name="sem_1_cpi" class="validate">
                            <label for="sem_1_cpi">1<sup>st</sup> semester cpi</label>
                        </div>
                        <div class="input-field col s12 l6">
                            <input id="sem_2_cpi" type="text" name="sem_2_cpi" class="validate">
                            <label for="sem_2cpi">2<sup>nd</sup> semester cpi</label>
                        </div>    
                    </div>
                    <div class="col l6 s12 student_cpi" id="2_sem_cpi">    
                        <div class="col s12"><p><b>Details of 2<sup>nd</sup> year</b></p></div>
                        <div class="input-field col s12 l6">
                            <input id="sem_3_cpi" type="text" name="sem_3_cpi" class="validate">
                            <label for="sem_3_cpi">3<sup>st</sup> semester cpi</label>
                        </div>
                        <div class="input-field col s12 l6">
                            <input id="sem_4_cpi" type="text" name="sem_4_cpi" class="validate">
                            <label for="sem_4_cpi">4<sup>nd</sup> semester cpi</label>
                        </div>    
                    </div>
                    <div class="col l6 s12 student_cpi" id="3_sem_cpi">
                        <div class="col s12"><p><b>Details of 3<sup>rd</sup> year</b></p></div>
                        <div class="input-field col s12 l6">
                            <input id="sem_5_cpi" type="text" name="sem_5_cpi" class="validate">
                            <label for="sem_5_cpi">5<sup>st</sup> semester cpi</label>
                        </div>
                        <div class="input-field col s12 l6">
                            <input id="sem_6_cpi" type="text" name="sem_6_cpi" class="validate">
                            <label for="sem_6_cpi">6<sup>nd</sup> semester cpi</label>
                        </div>  
                    </div>
                    <div class="col l6 s12 student_cpi" id="4_sem_cpi">
                        <div class="col s12"><p><b>Details of 4<sup>th</sup> year</b></p></div>
                        <div class="input-field col s12 l6">
                            <input id="sem_7_cpi" type="text" name="sem_7_cpi" class="validate">
                            <label for="sem_7_cpi">7<sup>st</sup> semester cpi</label>
                        </div>
                        <div class="input-field col s12 l6">
                            <input id="sem_8_cpi" type="text" name="sem_8_cpi" class="validate">
                            <label for="sem_8_cpi">8<sup>nd</sup> semester cpi</label>
                        </div>
                    </div>
                    <div class="col l6 s12 student_cpi" id="5_sem_cpi">
                        <div class="col s12"><p><b>Details of 5<sup>th</sup> year</b></p></div>
                        <div class="input-field col s12 l6">
                            <input id="sem_9_cpi" type="text" name="sem_9_cpi" class="validate">
                            <label for="sem_9_cpi">9<sup>st</sup> semester cpi</label>
                        </div>
                        <div class="input-field col s12 l6">
                            <input id="sem_10_cpi" type="text" name="sem_10_cpi" class="validate">
                            <label for="sem_10_cpi">10<sup>nd</sup> semester cpi</label>
                        </div>
                    </div>
                    <!-- <div id="imgup-modal1" class="modal">
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
                    </div> -->
                </div>
                <div style="max-width: 200px">
                    <p class="center-all" ><img src="" style="height:250px;max-width: 200px" name="preview_img" id="preview_img" /></p>
                    <p class="center-all left" style="margin:5px"><label for="img_file" class="waves-effect waves-light btn blue" style="width:200px">Choose Image</label></p>
                </div>
                <input type="file" id="img_file" style="display:none" onchange="upload_image()" />
                <input type="submit" class="btn-flat blue white-text right" value="save" />
            </form>
        </div>
      </div>
   </div>
   <ul id="slide-out" class="sidenav">
      <div id="side_user_setting_2" class="grey lighten-3">
         <a href="#!home" class="sidenav-close waves-effect waves-grey black-text" style="width:100%;height:55px">
            <div id="user_dp" class="row">
               <div class="col s4 "><img class="circle" id="dp_mobile" src="#"></div>
               <div class="col s7 left-align">
                  <p style="margin-top:6px"><span id="student_name_mobile"></span> <br /><span style="font-size:11px"></span></p>
               </div>
            </div>
         </a>
      </div>
      <br>
      <a class="waves-effect waves-grey black-text sidenav-close" href="#!profile_update" style="width:100%;height:40px">
         <div class="row">
            <div class="col s12 left-align">
               <p style="margin:6px;text-decoration:under">Profile</p>
            </div>
         </div>
      </a>
      <a class="waves-effect waves-grey black-text sidenav-close" href="#!change_password" style="width:100%;height:40px">
         <div class="row">
            <div class="col s12 left-align">
               <p style="margin:6px;text-decoration:under">Change Password</p>
            </div>
         </div>
      </a>
      <a class="waves-effect waves-grey black-text sidenav-close" onclick="sudoKill()" style="width:100%;height:40px">
         <div class="row">
            <div class="col s12 left-align">
               <p style="margin:6px;text-decoration:under">Log Out</p>
            </div>
         </div>
      </a>
   </ul>
   <div id="loading_scren" style="position: fixed;z-index:999999;width:100%;height:100%;text-align:center;background-color:red!important;display:none">
        <div style="position: fixed; top: 50%; left:50%; transform: translate(-50%, -50%);width:100%;height:100%" class="grey lighten-4"><div class="loader" style="position: fixed; top: 50%; left:50%; transform: translate(-50%, -50%);margin-left:-25px"></div></div>
    </div>
<div id="modal1" class="modal" style="overflow:hidden">
    <div class="modal-content">
        <h4 id="modal_header">Internship </h4>
        <p id="text_when_apply" class="hide1">Are you sure , you want to apply for this application</p>
        <p id="text_when_cancel" class="hide1">Are you sure, you want to cancel your application</p>
    </div>
    <div class="modal-footer">
    <div class="row">
    <div class="col s6"><a href="#!" onclick="modify_application(this)" class="btn blue" data="" id="modify_application_trigger">Yes</a></div>
    <div class="col s1"><a href="#!" class="btn blue modal-close" >No</a></div>
    </div>
    </div>
    </div>