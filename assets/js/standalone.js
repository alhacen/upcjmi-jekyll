/*
before debugging read this, ploxx


*/
//(window.location.origin)=="http://127.0.0.1:4000"?window.location="http://localhost:4000":""//delete before deploy
//http://127.0.0.1/upcjmi/server/exe.php
var grecaptchatoken;
var max_image_size=400;
function string_bw__word(string, w1, w2){
    return string.split(w1).pop().split(w2)[0];
}
function getCookieValue(a) {
    var b = document.cookie.match('(^|[^;]+)\\s*' + a + '\\s*=\\s*([^;]+)');
    return b ? b.pop() : '';
}
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }
function _(a){return document.getElementById(a);}
function upload_image(){
    previewFile();
}
function previewFile() {
    var preview=document.getElementById("preview_img");
    var file    = document.getElementById('img_file').files[0];
    var reader  = new FileReader();
    reader.addEventListener("load", function () {
        stringLength=reader.result.length
        //console.log(stringLength)
        var sizeInKb = 4 * Math.ceil((stringLength / 3))*0.5624896334383812/1000;
        if(sizeInKb<max_image_size){
            preview.src = reader.result;
        }else{alert("Image Should Be less then "+max_image_size+"KB")}
    }, false);
    if (file) {
        reader.readAsDataURL(file);
    }
}
function select_year(year){
    for(i=1;i<=5;i++){
        _(i+"_sem_cpi").style.display="none";
    }
    for(i=1;i<=year;i++){
        _(i+"_sem_cpi").style.display="block";
    }
}
(function() {
    function toJSONString( form ) {
        var not_mandatory_field=["branch","alternative_contact_no","sem_1_1_cpi","sem_1_2_cpi","sem_2_1_cpi","sem_2_2_cpi","sem_3_1_cpi","sem_3_2_cpi","sem_4_1_cpi","sem_4_2_cpi","sem_5_1_cpi","sem_5_2_cpi"];
        var obj = {};
        var elements = form.querySelectorAll( "input, select, textarea" );
        for( var i = 0; i < elements.length; ++i ) {
            var element = elements[i];
            var name = element.name;
            var value = element.value;
            if( name ) {
                obj[ name ] = value;
            }
            if(name!=""&&value==""&&!not_mandatory_field.includes(name)){alert( name +" is required");throw new Error( name +" is required");}

        }
        obj['img']=_("preview_img").src.replace(location.href,"")
        return JSON.stringify( obj );
    }
    document.addEventListener( "DOMContentLoaded", function() {
        var form = document.getElementById("upc_form");
        if(form!=undefined){
        //var output = document.getElementById( "output" );
        form.addEventListener( "submit", function( e ) {
            e.preventDefault();
            var json = toJSONString( this );
            //alert(json);
            console.log(json);
            var stringLength=_("preview_img").src.length
            var sizeInKb = 4 * Math.ceil((stringLength / 3))*0.5624896334383812/1000;
            if(sizeInKb<max_image_size){
                loading_scren_toggle()
                postData("http://api.alhacen.cf/projects/upcjmi/server/index.php?update_profile",json)
                //.then(data => console.log(data)) // JSON-string from `response.json()` call
                .then(function(data) {loading_scren_toggle();if(data.data=="profile updated successfully"){
                    location.href="#!home";alert(data.data);
                    _("dp_desktop").src=_("dp_mobile").src=document.getElementsByName("preview_img")[0].src;
                    }else{
                        alert(data.data)
                    }
                })
                .catch(error => console.error(error));
            }else{alert("Image Should Be less then "+max_image_size+"KB")}
        }, false);}
    });
})();
function fun(){//it's simple submit_btn enable-disable toggle
    var a=_("auth_form_submit") //submit_btn class name
    a.className=(a.className.includes("disabled_btn"))?a.className.replace(" disabled_btn",""):a.className+" disabled_btn";
}
function sudoKill(){
    loading_scren_toggle()
    postData("http://api.alhacen.cf/projects/upcjmi/server/auth.php?killSession")
        .then(function(data) {
            if(data.data=="logged_out successfully"){
                window.location="../";
            }
        })
        .catch(error => console.error(error));
}
function submit_auth_form(a){
    data="email="+_("auth_form_email_input").value+"&password="+_("auth_form_password_input").value+"&name="+_("auth_form_student_name_input").value+"&token="+grecaptchatoken;
    //console.log(data);
    //make_post_request("http://api.alhacen.cf/projects/upcjmi/server/auth.php?"+a.innerHTML,data,check_auth)
    _("auth_loading_scren").style.display="block";
    _("auth_form_col").style.display="none";
    postData("http://api.alhacen.cf/projects/upcjmi/server/auth.php?"+a.innerHTML, data)
        .then(function(data) {
            console.log(data);
            if(data.logged==1){
                setCookie("logged",1,1);
                // _("auth_user_greeting").innerHTML=data.name;
                // _("auth_loading_scren").style.display="none";
                // _("user_dash_col").style.display="block";
                window.location="dashboard";
            }else{
                if(data.data=="try again"){fun();get_recaptcha_token(fun);}//if bot detected=>disable submit btn =>request new token=>enable submit btn
                _("auth_form_col").style.display="block";
                _("auth_loading_scren").style.display="none";
            }
            _("auth_msg").innerHTML=data.data}) // JSON-string from `response.json()` call
        .catch(error => console.error(error));
}
function check_user_status(){
    if(window.location.pathname=="/student/"){
        _("auth_form_col").style.display="none";
        loading_scren_toggle()
        postData("http://api.alhacen.cf/projects/upcjmi/server/auth.php?status")
            .then(
                function(data) {
                    
                    console.log(data);
                    //_("loading_scren").style.display="none";
                    if(data.logged==1){
                        window.location="dashboard";
                    }else if( data.logged!=1){
                        _("auth_form_col").style.display="block";
                        _("auth_loading_scren").style.display="none";
                        loading_scren_toggle()
                    }
                }
            )        
    }else if(window.location.pathname=="/student/dashboard/"){
        postData("http://api.alhacen.cf/projects/upcjmi/server/exe.php?fetch_me")
                    .then(function(data) {
                        if(data.data!="auth failed"){
                            loading_scren_toggle()
                            var private_data=["applied_for","img"];
                            user_data=data[0]['user_data']
                            site_data=data[1]['site_data']
                            for( var i = 0; i < Object.keys(user_data).length; ++i ) {
                                if(Object.keys(user_data)[i]!="" && !private_data.includes(Object.keys(user_data)[i])){
                                        document.getElementsByName(Object.keys(user_data)[i])[0].value=user_data[Object.keys(user_data)[i]];
                                    //console.log(document.getElementsByName(Object.keys(data)[i])[0])
                                }
                            }
                            _("student_name").innerHTML=_("student_name_mobile").innerHTML=user_data['name']
                            document.getElementsByName("preview_img")[0].src=user_data['img']
                            _("dp_desktop").src=_("dp_mobile").src=user_data['img'];
                            var elems = document.querySelectorAll('select');
                            var instances = M.FormSelect.init(elems);
                            M.updateTextFields();
                            select_year(_("current_year").value);
                            //update_applications_list(data)
                            applied_applications=user_data.applied_for.substr(1).split(",")
                            // if(user_data.applied_for!=""){
                            //     for(i=0;i<applied_applications.length;i++){
                            //         _("applied_application_col").innerHTML+='<tr><td style="padding-right:50">'+applied_applications[i]+'  <a href="#!application_cancel_for['+applied_applications[i]+']" class="right btn" style="">cancel</a></td></tr>'
                            //     }
                            //     update_applications_list(applied_applications,"cancel")
                            // }
                            open_applications=site_data.application_open.substr(1).split(",")//remove the 1st ","
                            // open_applications=open_applications.filter(function(x) { return applied_applications.indexOf(x) < 0 })//compliment of (open_application)-(applied_application)
                            // _("open_application_col").innerHTML="";
                            // for(i=0;i<open_applications.length;i++){
                            //     _("open_application_col").innerHTML+='<tr><td style="padding-right:50">'+open_applications[i]+'  <a href="#!apply_for['+open_applications[i]+']" class="right btn" style="">apply</a></td></tr>'
                            // }
                            open_applications=open_applications.filter(function(x) { return applied_applications.indexOf(x) < 0 })//compliment of (open_application)-(applied_application)
                            update_applications_list(applied_applications,open_applications)
                        }else{
                            window.location="../"
                        }
                    })
                    .catch(error => console.error(error));
    }
}
function update_applications_list(applied_applications,open_applications){
    _("applied_application_col").innerHTML=""
    if(applied_applications[0]!=""){
        for(i=0;i<applied_applications.length;i++){
            _("applied_application_col").innerHTML+='<tr><td style="padding-right:50">'+applied_applications[i]+'  <a href="#!application_cancel_for['+applied_applications[i]+']" class="right btn" style="">cancel</a></td></tr>'
        }
        //update_applications_list(applied_applications,"cancel")
    }
    console.log(open_applications)
    //open_applications=open_applications.filter(function(x) { return applied_applications.indexOf(x) < 0 })//compliment of (open_application)-(applied_application)
    console.log(open_applications)
    _("open_application_col").innerHTML="";
    for(i=0;i<open_applications.length;i++){
        _("open_application_col").innerHTML+='<tr><td style="padding-right:50">'+open_applications[i]+'  <a href="#!apply_for['+open_applications[i]+']" class="right btn" style="">apply</a></td></tr>'
    }
}
function modify_application(a){
    this.innerHTML="wait";
    loading_scren_toggle()
    var request_for=_("modify_application_trigger").getAttribute("data");
    postData("http://api.alhacen.cf/projects/upcjmi/server/exe.php?"+request_for,"application="+_("modal_header").innerHTML)
        .then(function(data) {
            if(data.data=="applied successfully"){
                M.Modal.init(_("modal1")).close()   
                document.getElementsByTagName("BODY")[0].style.overflow="scroll"   
                //window.location=""
                loading_scren_toggle()
                if(open_applications.indexOf(application_name)!=-1 && function_type=="apply_for"){
                    var tmp_index=(applied_applications[0]!="")?applied_applications.length:0;
                    open_applications.splice(open_applications.indexOf(application_name), 1);
                    applied_applications.splice(tmp_index,1,application_name);
                }else if(applied_applications.indexOf(application_name)!=-1 && function_type=="application_cancel_for"){
                    var tmp_index=(open_applications[0]!="")?open_applications.length:0;
                    console.log(tmp_index)
                    applied_applications.splice(applied_applications.indexOf(application_name), 1);
                    open_applications.splice(tmp_index,1,application_name);   
                }                
            } 
            update_applications_list(applied_applications,open_applications)
        })
        .catch(error => console.error(error));
        
}

function toggle_form(a){
    _("cnf_input_row").style.display=(a.innerHTML=="register")?"block":"none"
    a.innerHTML=(a.innerHTML=="register")?"login":"register";
    _("auth_form_submit").innerHTML=(a.innerHTML=="register")?"login":"register";
}
function change_password(){
    if(_('new_password').value==_('confirm_new_password').value && _('new_password').value!=""){
        data="current_password="+_("curernt_password").value+"&new_password="+_("new_password").value
        postData("http://api.alhacen.cf/projects/upcjmi/server/exe.php?change_password",data)
        .then(function(data) {
        })
        .then(error => console.error(error))
      }else if(_('new_password').value==""){
        alert("enter Password")
      }else{
        alert("Confirm Password and new Password did not match")
        _('new_password').value=_('confirm_new_password').value=""
      }

}
/*	
function make_post_request(url,data,callback) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            callback(this.responseText);
        }
    };
    xhttp.open("POST", url, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded","Cookie: PHPSESSID=or8vg2nq5ssnqanges5iqhmlhm");
    xhttp.send(data);
}
*/
function postData(url = '', data) {
// Default options are marked with *
    return fetch(url, {
        method: 'POST', // *GET, POST, PUT, DELETE, etc.
        mode: 'cors', // no-cors, cors, *same-origin
        cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
        credentials: 'include', // include, *same-origin, omit
        headers: {
            //'Content-Type': 'application/json',
            'Content-Type': 'application/x-www-form-urlencoded'	
        },
        redirect: 'follow', // manual, *follow, error
        referrer: 'no-referrer', // no-referrer, *client
        body: data, // body data type must match "Content-Type" header
    })
    .then(response => response.json()); // parses JSON response into native JavaScript objects 
}
function loading_scren_toggle(){
    _("loading_scren").style.display=(_("loading_scren").style.display=="block")?"none":"block"
}

function site_init(){
    check_user_status()
}

//window.onload = function () {
    site_init()
 //}