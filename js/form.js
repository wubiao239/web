document.writeln("<form class=\"form-horizontal\" method=\"post\" name=\"form\" action=\"http://inquiry.zenithcrusher.com/updata.php\" onsubmit=\"return(CheckfootInput())\">");
document.writeln("<table border=\"1\" cellspacing=\"1\">");
document.writeln("<tr>");
document.writeln("<td><label class=\"control-label\">Products:</label></td>");
document.writeln("<td><select name=\"products\" class=\"input-xlarge\">");
document.writeln("<option selected=\"selected\" value=\"\" style=\"color:#ff0000; font-weight:bold;\">Please Select!</option>");
document.writeln("<option value=\"Mobile crushing plant\">Mobile Crusher</option>");
document.writeln("<option value=\"LM Vertical Grinding Mill\">Vertical Mill</option>");
document.writeln("<option value=\"Jaw Crusher\">Jaw Crusher</option>");
document.writeln("<option value=\"Cone Crusher\">Cone Crusher</option>");
document.writeln("<option value=\"MTW European Grinding Machine\">MTW European Grinding Machine</option>");
document.writeln("<option value=\"Ultrafine Mill\">Ultrafine Mill</option>");
document.writeln("<option value=\"Impact Crusher\">Impact Crusher</option>");
document.writeln("<option value=\"VSI Crusher\">VSI Crusher</option>");
document.writeln("<option value=\"Hydraulic Cylinder Cone Crusher\">Hydraulic Cylinder Cone Crusher</option>");
document.writeln("<option value=\"Sand Washing Machine\">Sand Washing Machine</option>");
document.writeln("<option value=\"Vibrating Screen\">Vibrating Screen</option>");
document.writeln("<option value=\"Vibrating Feeder\">Vibrating Feeder</option>");
document.writeln("<option value=\"Belt Conveyor\">Belt Conveyor</option>");
document.writeln("<option value=\"Stone processing production line\">Stone processing production line</option>");
document.writeln("<option value=\"Industrial milling production line\">Industrial milling production line</option>");
document.writeln("<option value=\"Beneficiation Production Line\">Beneficiation Production Line</option>");
document.writeln("<option value=\"Not Sure\" style=\"color:#ff0000; font-weight:bold;\">Not Sure !</option>");
document.writeln("</select></td>");
document.writeln("</tr>");
document.writeln("<tr>");
document.writeln("<td valign=\"top\"><label class=\"control-label\">Materials:</label></td>");
document.writeln("<td><!-- Multiple Checkboxes -->");
document.writeln("<label class=\"checkbox inline\">");
document.writeln("<input name=\"materials[]\" type=\"checkbox\" value=\"Dolomite\">");
document.writeln("Dolomite</label>");
document.writeln("<label class=\"checkbox inline\">");
document.writeln("<input name=\"materials[]\" type=\"checkbox\" value=\"Calcite\">");
document.writeln("Calcite</label>");
document.writeln("<label class=\"checkbox inline\">");
document.writeln("<input name=\"materials[]\" type=\"checkbox\" value=\"Quartz\">");
document.writeln("Quartz</label>");
document.writeln("<label class=\"checkbox inline\">");
document.writeln("<input name=\"materials[]\" type=\"checkbox\" value=\"Basalt\">");
document.writeln("Basalt</label>");
document.writeln("<label class=\"checkbox inline\">");
document.writeln("<input name=\"materials[]\" type=\"checkbox\" value=\"Barite\">");
document.writeln("Barite</label>");
document.writeln("<label class=\"checkbox inline\">");
document.writeln("<input name=\"materials[]\" type=\"checkbox\" value=\"Feldspar\">");
document.writeln("Feldspar</label>");
document.writeln("<label class=\"checkbox inline\">");
document.writeln("<input name=\"materials[]\" type=\"checkbox\" value=\"Gravel\">");
document.writeln("Gravel</label>");
document.writeln("<label class=\"checkbox inline\">");
document.writeln("<input name=\"materials[]\" type=\"checkbox\" value=\"Bentonite\">");
document.writeln("Bentonite</label>");
document.writeln("<label class=\"checkbox inline\">");
document.writeln("<input name=\"materials[]\" type=\"checkbox\" value=\"Gypsum\">");
document.writeln("Gypsum</label>");
document.writeln("<label class=\"checkbox inline\">");
document.writeln("<input name=\"materials[]2\" type=\"checkbox\" value=\"Granite\" />");
document.writeln("Granite</label>");
document.writeln("<label class=\"checkbox inline\">");
document.writeln("<input name=\"materials[]\" type=\"checkbox\" value=\"Coal\">");
document.writeln("Coal</label>");
document.writeln("<label class=\"checkbox inline\">");
document.writeln("<input name=\"materials[]\" type=\"checkbox\" value=\"Slag\">");
document.writeln("Slag</label>");
document.writeln("<label class=\"checkbox inline\">");
document.writeln("<input name=\"materials[]\" type=\"checkbox\" value=\"Pebble\">");
document.writeln("Pebble</label>");
document.writeln("<br />");
document.writeln("<label class=\"checkbox inline\"> Other:");
document.writeln("<input name=\"title\" type=\"text\" value=\"As: Marble\" style=\"color: rgb(153, 153, 153);border:1px solid #cccccc;padding:0 5px;\" onblur=\"if(value==\'\'){value=\'As: Marble\';this.style.color=\'#999\';};\" onfocus=\"if(value==\'As: Marble\'){value=\'\';this.style.color=\'#000\';};\" size=\"15\" />");
document.writeln("</label></td>");
document.writeln("</tr>");
document.writeln("<tr>");
document.writeln("<td valign=\"top\"><label class=\"control-label\">Capacity:</label></td>");
document.writeln("<td><!-- Multiple Radios -->");
document.writeln("<label class=\"radio inline\">");
document.writeln("<input type=\"radio\" value=\" > 100 TPH \" name=\"capacity[]\">");
document.writeln("> 100 TPH </label>");
document.writeln("<label class=\"radio inline\">");
document.writeln("<input type=\"radio\" value=\" > 50 TPH \" name=\"capacity[]\">");
document.writeln("> 50 TPH </label>");
document.writeln("<label class=\"radio inline\">");
document.writeln("<input type=\"radio\" value=\" > 30 TPH \" name=\"capacity[]\">");
document.writeln("> 30 TPH </label>");
/*document.writeln("<br />");*/
document.writeln("<label class=\"radio inline\">");
document.writeln("<input type=\"radio\" value=\" > 10 TPH \" name=\"capacity[]\">");
document.writeln("> 10 TPH </label>");
document.writeln("<label class=\"radio inline\">");
document.writeln("<input type=\"radio\" value=\" > 1 TPH \" name=\"capacity[]\">");
document.writeln("> 1 TPH </label>");
document.writeln("<label class=\"radio inline\">");
document.writeln("<input type=\"radio\" value=\" < 1 TPH \" name=\"capacity[]\">");
document.writeln("< 1 TPH </label></td>");
document.writeln("</tr>");
document.writeln("<tr>");
document.writeln("<td><!-- Text input-->");
document.writeln("<label class=\"control-label\" for=\"address\">Use Place:</label></td>");
document.writeln("<td><input name=\"address\" type=\"text\" class=\"input-xlarge\" style=\"color: rgb(153, 153, 153);\" onfocus=\"if(value==\'As: South Africa\'){value=\'\';this.style.color=\'#000\';};\" onblur=\"if(value==\'\'){value=\'As: South Africa\';this.style.color=\'#999\';};\" value=\"As: South Africa\" size=\"25\" /></td>");
document.writeln("</tr>");
document.writeln("<tr>");
document.writeln("<td><!-- Text input-->");
document.writeln("<label class=\"control-label\" for=\"name\">Name:<span class=\"red\">*</span></label></td>");
document.writeln("<td><input name=\"name\" type=\"text\" class=\"input-xlarge\" style=\"color: rgb(153, 153, 153);\" onfocus=\"if(value==\'As: Mario\'){value=\'\';this.style.color=\'#000\';};\" onblur=\"if(value==\'\'){value=\'As: Mario\';this.style.color=\'#999\';};\" value=\"As: Mario\" size=\"25\" /></td>");
document.writeln("</tr>");
document.writeln("<tr>");
document.writeln("<td><!-- Text input-->");
document.writeln("<label class=\"control-label\" for=\"input01\">Email:<span class=\"red\">*</span></label></td>");
document.writeln("<td><input name=\"email\" type=\"text\" class=\"input-xlarge\" style=\"color: rgb(153, 153, 153);\" onfocus=\"if(value==\'As: sample@isp.com\'){value=\'\';this.style.color=\'#000\';};\" onblur=\"if(value==\'\'){value=\'As: sample@isp.com\';this.style.color=\'#999\';};\" value=\"As: sample@isp.com\" size=\"25\" maxlength=\"50\" /></td>");
document.writeln("</tr>");
document.writeln("<tr>");
document.writeln("<td><!-- Text input-->");
document.writeln("<label class=\"control-label\" for=\"phone\">Phone:</label></td>");
document.writeln("<td><input name=\"phone\" type=\"text\" class=\"input-xlarge\" style=\"color: rgb(153, 153, 153);\" onfocus=\"if(value==\'As: 0086-21-51860251\'){value=\'\';this.style.color=\'#000\';};\" onblur=\"if(value==\'\'){value=\'As: 0086-21-51860251\';this.style.color=\'#999\';};\" value=\"As: 0086-21-51860251\" size=\"25\" /></td>");
document.writeln("</tr>");
document.writeln("<tr>");
document.writeln("<td valign=\"top\"><!-- Textarea -->");
document.writeln("<label class=\"control-label\">Message:<span class=\"red\">*</span></label></td>");
document.writeln("<td><textarea name=\"content\" cols=\"45\" rows=\"6\" class=\"input-xlarge\" style=\"color: rgb(153, 153, 153);\" onfocus=\"if(value==\'As: output size like 0-10,10-15, 15-20 mm for crushing or 75 microns ( 200 meshes) for mill machine and other requirements.\'){value=\'\';this.style.color=\'#000\';};\" onblur=\"if(value==\'\'){value=\'As: output size like 0-10,10-15, 15-20 mm for crushing or 75 microns ( 200 meshes) for mill machine and other requirements.\';this.style.color=\'#999\';};\">As: output size like 0-10,10-15, 15-20 mm for crushing or 75 microns ( 200 meshes) for mill machine and other requirements.</textarea></td>");
document.writeln("</tr>");
document.writeln("<tr>");
document.writeln("<td><!-- Button --></td>");
document.writeln("<td><input type=\"submit\" value=\"Submit Now\" class=\"btn btn-primary\" /></td>");
document.writeln("</tr>");
document.writeln("</table>");
document.writeln("</form>");
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