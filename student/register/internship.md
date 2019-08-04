---
layout: default
title: Student Portal
description: We provide jobs.
---
<div id="main">
    <div style="width:100%;overflow:scroll">
    <iframe id="iframe" name="iframe" src='https://script.google.com/macros/s/AKfycbyqonD1cO73fujwpbH02FhuvCxj3zwukIvNGNWFdi2zhHQ3uQ/exec' style="width:100%;min-height:100vh;overflow:scroll"></iframe>
</div>
<div class="card help-card fixedx-action-btn" id="contact-card" style="width:75px;height:75px;border-radius:100px"></div>
</div>
<style>
.fixedx-action-btn{position:absolute;right:23px;bottom:23px;padding-top:15px;margin-bottom:0;z-index:997}
    /*
.contact-card{border-radius:100px;width:70px;height:70px;position:absolute;bottom:9px;right:45px}
@media screen and (max-width: 540px) {
    .scontact-card{bottom:-50px;right:10px}
}
*/
.help-card{background-image: url('/assets/images/icons/help.png');background-size: cover;height:100px;background-position: center;background-repeat: no-repeat;background-size: auto 100%;} 
</style>
<script>
element=document.getElementById("iframe");
document.getElementById("contact-card").style.right=23+3*(element.offsetWidth - element.clientWidth)+"px"
</script>