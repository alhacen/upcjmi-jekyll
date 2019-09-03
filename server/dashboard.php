
<?php
session_start();
if($_SESSION['admin_logged']==1){
     include'db.php';
}else{header('location: dashboard_login.php');exit();}
//echo $_SESSION['logged'];
echo $_SESSION['msg'];
?>
<html>
<head>
  <title>Alhaq Online</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script>
  function _(a){return document.getElementById(a)}
  function reset_password(){
    if(_('new_password').value==_('confirm_new_password').value && _('new_password').value!=""){
      _("reset_password").submit()
    }else if(_('new_password').value==""){
      alert("enter Password")
    }else{
      alert("Confirm Password and new Password did not match")
      _('new_password').value=_('confirm_new_password').value=""
    }
  }
  </script>
</head>
<body class="  darken-1">
 <ul id="slide-out" class="sidenav sidenav-fixed" >
    <li><a href="#home">Home</a></li>
    <li><a href="#history">History</a></li>
    <li><a href="#setting">Setting</a></li>
  </ul>
  <div id="main">
    <div id="home">
     home
    </div>
    <div id="setting" >
      <div id="content">
        <div class="card padding-15 row" style="min-height:100%">
        <div id="notification"></div>
          <form action="exe.php?change_password" id="reset_password" method="post" class="col s6 offset-s3">
            <div class="row">
            <div class="input-field col s12">
              <input placeholder="curernt password" id="curernt password" name="current_password" type="password" class="validate">

            </div>
            <div class="input-field col s12">
              <input placeholder="new password" id="new_password" type="password" name="new_password" class="validate">

            </div>
            <div class="input-field col s12">
              <input placeholder="confirm new password" id="confirm_new_password" name="new_password" type="password" class="validate">

            </div>

              <p class="center"><input type="button" onclick="reset_password()" value="change" class="btn"></p>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div id="history">
      <div id="content">
        <div class="card padding-15">
          <p>History</p>
          <div class="row">
        <div class="col l4 input-field">
          <input id="q" type="text" class="validate" name="name" autocomplete="off" onkeyup="search()">
          <label for="q">Search</label>
        </div>
        <div class="col l2 input-field">
          <input type="text" id="search_from" class="datepicker" placeholder="From" onchange="search()">
        </div>
        <div class="col l2 input-field">
          <input type="text" id="search_to" class="datepicker" placeholder="To" onchange="search()">
        </div>
        <div class="col l1 input-field">
          <select id="max_result" onchange="pagination_change(this.value)">
            <option value="" disabled >Maximum result</option>
            <option value="10" >10</option>
            <option value="50">50</option>
            <option value="100">100</option>
            <option value="1000000000">No limit</option>
          </select>
        </div>
        <div class="col l1 input-field">
          <input type="button" class="btn" value="clear">
        </div>
        

      </div>
      <div>
          <label>
            <input type="checkbox" id="filter_internship" onclick="update_filter('internship')"/>
            <span>Internship</span>
          </label>
          <label>
            <input type="checkbox" id="filter_placement" onclick="update_filter('placement')"/>
            <span>Placement</span>
          </label>
          <label>
            <input type="checkbox" id="filter_job_readiness_program" onclick="update_filter('filter_job_readines_program')"/>
            <span>Job Readines Program</span>
          </label>
          <!-- <label>
          <input type="checkbox"  onclick="update_filter('Placement')"/>
            <span>Placement</span>
          </label>
          <label>
          <input type="checkbox"  onclick="update_filter('Job Readiness Program')"/>
            <span>Job Readiness Program </span>
          </label> -->
        </div>
      <?php
      
      $date=date("Y-m-d");
      $name_count=0;
      $data_count=0;
      $data = $db->query("SELECT * FROM students WHERE registration_time LIKE '%{$date}%'")->fetchAll();
      foreach ($data as $data) {
        $data_count++;
      }
      
      ?>
      <br>
      <h6 style="">Total students: <span id="data_count"><?php echo  $data_count; ?></span> </h6>
      <ul class="pagination center" id="pagination">
          
      </ul>
      <table class="highlight">
        <thead>
          <tr>
              <th>Name</th>
              <th>Enrolment no</th>
              <th>Current year</th>
              <th>Mobile no</th>
              <th>student id</th>
          </tr>
        </thead>

        <tbody id="data_table">
        
        </tbody>
      </table>
      

        </div>
      </div>
    </div>
  </div>  
</body>
</html>

<script>
function if_contains(arr,check){
  var found = false;
  
  for (var i = 0; i < check.length; i++) {
      if (arr.indexOf(check[i]) > -1) {
          found = true;
          //break;
      }else{found=false; break;}      
  }
  return found;

}
var filter_by_applications=0;
function _(a){return document.getElementById(a);}
function pagination_change(max_result){
  _("pagination").innerHTML="";
  for(i=1;i<data.length/max_result+1;i++){
    active=(i==1)?"active":"";
    //_("pagination").innerHTML+='<li class="waves-effect '+active+'"><a href="#!" onclick="update_data_list('+max_result+","+(i-1)+')">'+i+'</a></li>'
    _("pagination").innerHTML+='<input type="radio" name="pagination_btn" id="pagination_'+i+'"><label for="pagination_'+i+'" class="btn white black-text"  onclick="update_data_list('+max_result+","+(i-1)+')">'+i+'</label> '
  }
  update_data_list(_("max_result").value,0)
}
function update_filter(a){
  if(filter_internship.checked==1 || filter_placement.checked==1 || filter_job_readiness_program.checked==1){
    tmp=[];
    tmp_arr=[]
    if(filter_internship.checked==1){
      tmp_arr.push("Internship");
    }
    if(filter_placement.checked==1){
      tmp_arr.push("Placement");
    }
    if(filter_job_readiness_program.checked==1){
      tmp_arr.push("Job Readiness Program");
    }
    filter_by_applications=1;
  }else{filter_by_applications=0;}
  update_data_list(_("max_result").value,0);
}
function update_data_list(max_result,b){
  var j=0;
  tmp=[];
  data=data_copy;
  if(filter_by_applications!=0){
    for(i=0;i<data.length;i++){
      if(if_contains(data[i]['applied_for'].substr(1).split(","),tmp_arr)){
        tmp[j]=data[i];
        j++;
      }
    }    
  }else{tmp=data_copy;console.log(data_copy)}
  data=tmp
  data_count=0;
  name_count=0;
  _("data_table").innerHTML=""
    for(i=1;i<=max_result;i++){
      try {
        if(tmp[(max_result*b+i-1)]['name']!=undefined){data_count++;}
        name_count+=parseInt(tmp[(max_result*b+i-1)]['name']);
        _("data_table").innerHTML+="<tr onclick='location.href=\"view.php?id="+tmp[(max_result*b+i-1)]['id']+"\";;update_edit_form("+(max_result*b+i-1)+")' data-target='modal1' class=' modal-trigger cursor-pointer'><td>"+tmp[(max_result*b+i-1)]['name']+"</td><td>"+tmp[(max_result*b+i-1)]['enrolment_no']+"</td><td>"+tmp[(max_result*b+i-1)]['current_year']+"</td><td>"+tmp[(max_result*b+i-1)]['contact_no']+"</td><td>"+tmp[(max_result*b+i-1)]['student_id']+"</td></tr>";

      }catch(err) {
        console.log(err.message);
      }

      _("data_count").innerHTML=data_count;
    }
}
function search(){
  _("q").value;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      _("data_table").innerHTML="";
      data = this.responseText;
      data=data_copy=JSON.parse("["+data.substr(0,data.length-1)+"]");
      ///
      pagination_change(_("max_result").value)
      update_data_list(_("max_result").value,0)
    }
  };
  xhttp.open("GET", "search.php?q="+_("q").value+"&from="+_("search_from").value+"&to="+_("search_to").value, true);
  xhttp.send();
}

// function update_edit_form(a){
//   tmp=data[a];
//   _("data_id").value=(tmp['id']==undefined)?"":tmp['id'];
//   _("edit_form_name").value=(tmp['name']==undefined)?"":tmp['name'];
//   _("edit_form_client_phone").value=(tmp['client_phone']==undefined)?"":tmp['client_phone'];
//   _("edit_form_data_method").value=(tmp['data_method']==undefined)?"":tmp['data_method'];
//   _("edit_form_client_name").value=(tmp['client_name']==undefined)?"":tmp['client_name'];
//   _("edit_form_remark").value=(tmp['remark']==undefined)?"":tmp['remark'];
//   var elems = document.querySelectorAll('select');
//     var instances = M.FormSelect.init(elems);
// }
data='<?php 

        $data = $db->query('SELECT * FROM students  ORDER BY id DESC LIMIT 10')->fetchAll();
        foreach ($data as $data) {
          //echo "<tr onclick='location.href=\"#id=".$data['id']."\"' data-target='modal1' class=' modal-trigger cursor-pointer'><td>".$data['name']."</td><td>".$data['client_name']."</td><td>".$data['data_method']."</td><td>".$data['client_phone']."</td><td>".$data['date_time']."</td></tr>";
          //echo '{"id":"'.$data['id'].'","name":"'.$data['name'].'","client_name":"'.$data['enrolment_no'].'","data_method":"'.$data['current_year'].'","client_phone":"'.$data['contact_no'].'","date_time":"'.$data['student_id'].'","remark":"'.$data['id'].'"},';
          echo '{"id":"'.$data['id'].'","name":"'.$data['name'].'","enrolment_no":"'.$data['enrolment_no'].'","current_year":"'.$data['current_year'].'","contact_no":"'.$data['contact_no'].'","student_id":"'.$data['student_id'].'","branch":"'.$data['branch'].'","applied_for":"'.$data['applied_for'].'"},';
        }
        
        ?>';
data=data_copy=JSON.parse("["+data.substr(0,data.length-1)+"]");
for(i=0;i<data.length;i++){
  _("data_table").innerHTML+="<tr onclick='location.href=\"view.php?id="+data[i]['id']+"\";update_edit_form("+i+")' data-target='modal1' class=' modal-trigger cursor-pointer'><td>"+data[i]['name']+"</td><td>"+data[i]['enrolment_no']+"</td><td>"+data[i]['current_year']+"</td><td>"+data[i]['contact_no']+"</td><td>"+data[i]['student_id']+"</td></tr>";
}

document.addEventListener('DOMContentLoaded', function() {
  format='yyyy-mm-dd';
  M.updateTextFields();
  var elems = document.querySelectorAll('select');
  var instances = M.FormSelect.init(elems);
  var elems = document.querySelectorAll('.modal');
  var instances = M.Modal.init(elems);
  var elems = document.querySelectorAll('.datepicker');
  var instances = M.Datepicker.init(elems,{format});
  });

<?php if(isset($_SESSION['msg'])){echo "var msg=".json_encode($_SESSION['msg']).";" ;} $_SESSION['msg']='';?>
setTimeout(function(){
  for(i=0;i<msg.length/2;i++){
    switch(msg[2*i]){
      case 'danger':
        color="#ffc107";
        break;
      case 'successful':
        color="#28a745";
        break;    
    }
    document.getElementById("notification").innerHTML+='<div style="border:solid 2px;padding:5px;color:'+color+';margin:1px">'+msg[2*i+1]+'</div>'
  }
}, 200);
current_page="";
var pages=["setting","history"];
function change_page() {
  if(pages.includes(location.hash.substr(1))){
    if(current_page!=""){_(current_page.substr(1)).style.display="none";}
    if(location.hash==""){location.hash="#home"}
    
    switch(location.hash){
      case "#home":
        _("home").style.display="block";
        break;
      case "#history":
        _("history").style.display="block";
        break;
      case "#setting":
        _("setting").style.display="block";
        break;
    }
    current_page=location.hash;
  }
}
window.onhashchange = change_page;
change_page();
</script>
<style>
.cursor-pointer{cursor:pointer}
#home,#setting{display:none;}
#history{display:none;}
.padding-15{padding:15px}
#content{padding:25px}
#main{padding-left: 300px;}
@media only screen and (max-width : 992px) {
  #main {
    padding-left: 0;
  }
}
.input-field:focus {
   border-bottom: 1px solid #ffa726 !important;
   box-shadow: 0 1px 0 0 #ffa726 !important
 }
 #modal1{top:5% !important}
 input[type="radio"]:checked+label { 
    background-color:#fb8c00  !important;
}
#edit_form div{margin:7px}
</style>
<!-- <div class="col s12 l6">
                    <table>
                        <thead>
                        <tr>
                            <th>Applicaitons Panel</th>
                        </tr>
                        </thead>
                        <tbody id="applied_application_col"><tr><td style="padding-right:50">Internship  <a href="exe.php?application-open_close_toggle&name=Internship" class="right btn" style="">close</a></td></tr><tr><td style="padding-right:50">Job Readiness Program  <a href="exe.php?application-open_close_toggle&name=Job Readiness Program]" class="right btn" style="">close</a></td></tr><tr><td style="padding-right:50">Placement  <a href="exe.php?application-open_close_toggle&name=Placement" class="right btn" style="">close</a></td></tr></tbody>
                    </table>
                </div> -->