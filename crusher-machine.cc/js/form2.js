document.writeln("<form class=\"form-horizontal\" method=\"post\" name=\"form\" action=\"http://inquiry.sbmchina.com/updata.php\" onsubmit=\"return(CheckfootInput())\">");
document.writeln("<table border=\"1\" cellspacing=\"1\">");
document.writeln("<tr>");
document.writeln("<td><!-- Text input-->");
document.writeln("<label class=\"control-label\" for=\"address\">Use Place:</label>");
document.writeln("<input name=\"address\" type=\"text\" class=\"input-xlarge\" style=\"color: rgb(153, 153, 153);\" onfocus=\"if(value==\'As: South Africa\'){value=\'\';this.style.color=\'#000\';};\" onblur=\"if(value==\'\'){value=\'As: South Africa\';this.style.color=\'#999\';};\" value=\"As: South Africa\" size=\"25\" /></td>");
/*document.writeln("</tr>");
document.writeln("<tr>");
*/document.writeln("<td><!-- Text input-->");
document.writeln("<label class=\"control-label\" for=\"name\">Name:<span class=\"red\">*</span></label>");
document.writeln("<input name=\"name\" type=\"text\" class=\"input-xlarge\" style=\"color: rgb(153, 153, 153);\" onfocus=\"if(value==\'As: Mario\'){value=\'\';this.style.color=\'#000\';};\" onblur=\"if(value==\'\'){value=\'As: Mario\';this.style.color=\'#999\';};\" value=\"As: Mario\" size=\"25\" /></td>");
/*document.writeln("</tr>");
document.writeln("<tr>");*/
document.writeln("<td><!-- Text input-->");
document.writeln("<label class=\"control-label\" for=\"input01\">Email:<span class=\"red\">*</span></label>");
document.writeln("<input name=\"email\" type=\"text\" class=\"input-xlarge\" style=\"color: rgb(153, 153, 153);\" onfocus=\"if(value==\'As: sample@isp.com\'){value=\'\';this.style.color=\'#000\';};\" onblur=\"if(value==\'\'){value=\'As: sample@isp.com\';this.style.color=\'#999\';};\" value=\"As: sample@isp.com\" size=\"25\" maxlength=\"50\" /></td>");
/*document.writeln("</tr>");
document.writeln("<tr>");*/
document.writeln("<td><!-- Text input-->");
document.writeln("<label class=\"control-label\" for=\"phone\">Phone:</label>");
document.writeln("<input name=\"phone\" type=\"text\" class=\"input-xlarge\" style=\"color: rgb(153, 153, 153);\" onfocus=\"if(value==\'As: 0086-21-51860251\'){value=\'\';this.style.color=\'#000\';};\" onblur=\"if(value==\'\'){value=\'As: 0086-21-51860251\';this.style.color=\'#999\';};\" value=\"As: 0086-21-51860251\" size=\"25\" /></td>");
document.writeln("</tr>");
document.writeln("<tr>");
document.writeln("<td valign=\"top\"  colspan=\"4\"><!-- Textarea -->");
document.writeln("<label class=\"control-label\">Message:<span class=\"red\">*</span></label>");
document.writeln("<textarea name=\"content\" cols=\"45\" rows=\"6\" class=\"input-xlarge\" style=\"color: rgb(153, 153, 153);\" onfocus=\"if(value==\'As: output size like 0-10,10-15, 15-20 mm for crushing or 75 microns ( 200 meshes) for mill machine and other requirements.\'){value=\'\';this.style.color=\'#000\';};\" onblur=\"if(value==\'\'){value=\'As: output size like 0-10,10-15, 15-20 mm for crushing or 75 microns ( 200 meshes) for mill machine and other requirements.\';this.style.color=\'#999\';};\">As: output size like 0-10,10-15, 15-20 mm for crushing or 75 microns ( 200 meshes) for mill machine and other requirements.</textarea></td>");
document.writeln("</tr>");
document.writeln("<tr>");
document.writeln("<td  colspan=\"4\" class=\"submit\" ><!-- Button -->");
document.writeln("<input  type=\"submit\" value=\"Send\" class=\"btn btn-primary\" /></td>");
document.writeln("</tr>");
document.writeln("</table>");
document.writeln("<form>");
function is_number(str) {
exp = /[^0-9 .+()-]/g;
if (str.search(exp) != -1) {
return false;
}
return true;
}
function is_email(str) {
if ((str.indexOf("@") == -1) || (str.indexOf(".") == -1)) {
return false;
}
return true;
}
function CheckfootInput(){

if(document.form.name.value==''||document.form.name.value=='As: Mario'){
alert("Please Write Your Name ^_^");
document.form.name.focus();
return false; 
}

if(document.form.email.value==''||document.form.email.value=='As: sample@isp.com'||!is_email(document.form.email.value)){
alert("Please Write Your Email ^_^");
document.form.email.focus();
return false; 
}

if(document.form.content.value==''||document.form.content.value=='As: output size like 0-10,10-15, 15-20 mm for crushing or 75 microns ( 200 meshes) for mill machine and other requirements.'){
alert("Please Write Your Message ^_^");
document.form.content.focus();
return false; 
}

if(document.form.capacity.value=='As: 20 TPH'){
document.form.capacity.value='';
}

if(document.form.title.value=='As: Marble'){ 
document.form.title.value=''; 
}

if(document.form.phone.value=='As: 0086-21-51860251'){
document.form.phone.value = ''; 
}

return true;
}