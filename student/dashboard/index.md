---
---
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>University Placement Cell </title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="/assets/js/standalone.js"></script>
</head>
<body>
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
   <div id="body" class="row card white" style="margin-top:0;min-height:100%;">
      <div class="col s12 m3 l3 center hide-on-small-only hide1 card1" style="height:100%;" id="side-nav">
         <div id="side_user_setting_1">
            <a class="waves-effect waves-grey black-text" href="#!home" style="width:100%;height:55px">
               <div id="user_dp" class="row">
                  <div class="col s4 "><img class="circle" id="dp_desktop" src="https://app-1494486514.000webhostapp.com/EmphasisO-SIF-Fronten/images/dp.jpg"></div>
                  <div class="col s7 left-align">
                     <p style="margin-top:6px"><span id="student_name"></span> <br><span style="font-size:11px"></span></p>
                  </div>
               </div>
            </a>
            <!-- -->
         </div>
         <br>
         <a class="waves-effect waves-grey black-text"  style="width:100%;height:40px">
            <div id="user_dp" class="row">
               <div class="col s12 left-align">
                  <p onclick="active_profile(1)"  style="margin:6px;text-decoration:under">Setting</p>
               </div>
            </div>
        </a>
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
         <a class="waves-effect waves-grey black-text" href="#" style="width:100%;height:40px">
            <div id="user_dp" class="row">
               <div class="col s12 left-align">
                  <p style="margin:6px;text-decoration:under">Company Available</p>
               </div>
            </div>
         </a>
      </div>
      <div class="col s12 m12 l8" id="main">
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
               <div class="col s4 "><img class="circle" id="dp_mobile" src="https://app-1494486514.000webhostapp.com/EmphasisO-SIF-Fronten/images/dp.jpg"></div>
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
      <a class="waves-effect waves-grey black-text sidenav-close" href="#" style="width:100%;height:40px">
         <div class="row">
            <div class="col s12 left-align">
               <p style="margin:6px;text-decoration:under">Log Out</p>
            </div>
         </div>
      </a>
   </ul>
   <div id="loading_scren" style="position: fixed;z-index:999999;width:100%;height:100%;text-align:center;background-color:red!important;display:none">
        <div style="position: fixed; top: 50%; left:50%; transform: translate(-50%, -50%);width:100%;height:100%" class="grey lighten-4"><div class="loader" style="position: fixed; top: 50%; left:50%; transform: translate(-50%, -50%);"></div></div>
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
</body>

<script>
var show_hidden_setting=0;
function side_nav_toggal(){
	var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems,{edge:"left",draggable:1});
}
function active_profile(a){
	if(show_hidden_setting==0){
		_("hidden_profile_settings_"+a).style.display="block";
		_("hidden_profile_settings_"+a).style.height="";
        // _("side_user_setting_"+a).className="grey lighten-3";
        // _("side_user_setting_"+a).className="";
		show_hidden_setting=1;
	}else{
		_("hidden_profile_settings_"+a).style.display="none";
		_("hidden_profile_settings_"+a).style.height="0px";
		// _("side_user_setting_"+a).className="";
		show_hidden_setting=0;
	}
}
yearRange=[1980,2018];
format='yyyy-mm-dd';
//dismissible= false
document.addEventListener('DOMContentLoaded', function () {
    var models = document.querySelectorAll('.modal');
    var modelsInstances = M.Modal.init(models,{ dismissible: false });
    var elems = document.querySelectorAll('.datepicker');
    var instances = M.Datepicker.init(elems,{yearRange,format});
    var elems = document.querySelectorAll('select');
	var instances = M.FormSelect.init(elems);
});

current_page="";
var pages=["home","profile_update","profile_options"];
var functions=["apply_for","application_cancel_for"];
function change_page() {
  if(pages.includes(location.hash.substr(2)) || location.hash=="" || location.hash=="#!"){
      //consoel.log
    // if(current_page!=""){_(current_page.substr(1)).style.display="none";}
    // if(location.hash==""){location.hash="#home"}
    if(current_page!=""){
        _(current_page.substr(2)).style.display="none";
    }if(location.hash=="" || location.hash=="#!"){
        
        location.hash="#!home";
    }else if(pages.includes(location.hash.substr(2))){
        _(location.hash.substr(2)).style.display="block";
    }
    // switch(location.hash){
    //   case "#home":
    //     _("home").style.display="block";
    //     break;
    //   case "#history":
    //     _("history").style.display="block";
    // }
    current_page=location.hash;
  }else if(functions.includes(string_bw__word(location.hash,"#!","[")) || location.hash==""){
      application_name=escape(string_bw__word(decodeURIComponent(string_bw__word(location.hash,"[","]")))).replace(/%20/g," ");
      function_type=escape(string_bw__word(decodeURIComponent(string_bw__word(location.hash,"#!","[")))).replace(/%20/g," ");
      _("modify_application_trigger").setAttribute("data", function_type)
         
      //console.log(1)
      _("text_when_cancel").style.display="none";
      _("text_when_apply").style.display="none";
       dismissible= false 
      M.Modal.init(_("modal1"), { dismissible: false }).open()
      _("modal_header").innerHTML=application_name
      if(function_type=="apply_for"){
          console.log(1)
          _("text_when_apply").style.display="block";
      }else if(function_type=="application_cancel_for"){
          _("modal_header").innerHTML=application_name
          console.log(2)
           _("text_when_cancel").style.display="block";
      }
  }
}

window.onhashchange = change_page;
    change_page();
// function site_init(callback){
//     check_user_status()
    

// }
// site_init();
loading_scren_toggle()

</script>
</html>
<style>
    .disabled_btn{pointer-events:none;cursor:default;background-color:#cccccc}
.cursor_pointer{cursor:pointer;}
.page{display:none;}
#main{padding:0 25 0 25px}
.upc_greeting{font-size:30px}
.card1{border:1.5px #e6e6e6 solid;height:200px; -webkit-box-shadow: 2px 2px 2px 0px rgba(204, 204, 204,.1);. -moz-box-shadow: 50px 51px}
@media screen and (max-width: 381px) {
    .upc_greeting{font-size:15px}
}
.heading1{ font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 17.6px; }
#user_dp img{height:55px}
#side-nav a:hover{background-color:#e6e6e6}
#available_company{padding-left:40px;padding-right:40px;}
.side_filter{position: -webkit-sticky;position: sticky;top: 10;}
@media screen and (max-width: 600px) {
	.img_col img{width:100px;height:auto;margin-right:auto;margin-left:auto}
	.img_col{margin-right:auto;margin-left:auto}
	.show1 a{height:55px!important}	
	.user-card1{width:100%}
	.text1{width:80%}
	#available_company{padding-left:10px;padding-right:10px;}
}
@media screen and (min-width: 600px) and (max-width: 992px) {
	.img_col img{width:100px;height:auto;float:left}
	body{width:80%;margin:5% auto auto auto;}
}
@media screen and (min-width: 993px){
	.img_col img{height:50px;width:auto;float:left}
	.brand-logo{margin-left:50px!important}
	body{width:80%;margin:5% auto auto auto;}
	.show1 a{height:60px!important}	
	.user-card1{width:100%}
}
@media screen and (max-width: 1100px){
	/*#side-nav{display:none}*/
	.hide1{display:none}
	.show1{display:block}
	.user-card1{width:100%}
}
hr{box-sizing:content-box;height:0;overflow:visible}
hr{border:0;border-top:1px solid #eee;margin:20px 0}
.light-grey{background-color:#f2f2f2;color:white!important;}
.img_col{margin:30px}
.validate_border{border-color:red!important}
body{background-color:#f2f2f2;}
#body{padding:2%;}
#companies_list{maring:0px}
nav ul a,nav .brand-logo{color:black;}
*{ box-sizing: border-box; font-family: 'Ubuntu', sans-serif; color: #777777; margin: 0; } /* COLOR Definition */ .green{ background-color: #417505 !important; } .green-text{ color: #417505 !important; } /* NAV-BAR HACKS */ nav{ box-shadow: none !important; } nav{ box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0) !important; /*box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2) !important;*/ } .logo-img{ height: 40px; width: auto; } nav ul#nav-mobile li>a{ height: 64px; } nav ul img{ height: 25px; } .nav-bar-fixed{ position: fixed; top: 0; left: 0; right: 0; } /* Change Color of `nav text` nad make it vertically center */ nav a{ color: #777777 !important; } /* GENERAL */ .center-hv{ display: flex; align-items: center; justify-content: center; } @media only screen and (min-width: 992px) { nav .brand-logo { margin-left: 10px; } } /* MEDIUM */ @media only screen and (max-width: 992px) { nav .brand-logo { width:75%; } } /* SMALL */ @media only screen and (max-width: 600px) { nav .brand-logo{ text-align: left; } .logo-img{ height: 30px; } .body-padding{ padding-top: 56px !important; } .full-image{ height: 200px; width: auto; } }
.loader {
    border: 6px solid #f3f3f3;
    border-radius: 50%;
    border-top: 6px solid #3498db;
    width: 60px;
    height: 60px;
    -webkit-animation: spin .5s linear infinite;
    animation: spin .5s linear infinite;
  }
  @-webkit-keyframes spin {
    0% { -webkit-transform: rotate(0deg); }
    100% { -webkit-transform: rotate(360deg); }
  }
  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }
  .button{padding:15px 20px;font-weight:400;margin:10px 30px;display:inline-block;text-align:center;transition:0.3s}.button-normal a{font-size:1rem !important;padding:10px 15px}.button a,button{font-weight:700;font-size:1.5rem;text-transform:uppercase}.button button{background-color:transparent;border:0}.button.black:hover{background-color:#eeeeee !important;transform:scale(1.15, 1.15)}.button.black:hover .white-text{color:black !important}.button.white:hover{background-color:#222222 !important;transform:scale(1.25, 1.25)}@media screen and (max-width: 601px){.button{width:100% !important;margin-left:0;margin-right:0}.with-sub-heading span{font-size:1.75rem}}
</style>