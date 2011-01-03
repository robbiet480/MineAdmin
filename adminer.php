<?php
/** Adminer - Compact database management
* @link http://www.adminer.org/
* @author Jakub Vrana, http://php.vrana.cz/
* @copyright 2007 Jakub Vrana
* @license http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
*/error_reporting(6135);$me=(!ereg('^(unsafe_raw)?$',ini_get("filter.default"))||ini_get("filter.default_flags"));if($me){foreach(array('_GET','_POST','_COOKIE','_SERVER')as$b){$Ke=filter_input_array(constant("INPUT$b"),FILTER_UNSAFE_RAW);if($Ke){$$b=$Ke;}}}if(isset($_GET["file"])){header("Expires: ".gmdate("D, d M Y H:i:s",time()+365*24*60*60)." GMT");if($_GET["file"]=="favicon.ico"){header("Content-Type: image/x-icon");echo
base64_decode("AAABAAEAEBAQAAEABAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA////AAAA/wBhTgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAERERAAAAAAETMzEQAAAAATERExAAAAABMRETEAAAAAExERMQAAAAATERExAAAAABMRETEAAAAAETMzEREREQATERExEhEhABEzMxEhEREAAREREhERIRAAAAARIRESEAAAAAESEiEQAAAAABEREQAAAAAAAAAAD///8BwP//AYB//wGAf/8BgH//AYB//wGAf/8BgH//AYAB/wGAAf8BgAH/AcAA/wH+AP8B/wD/Af+B/wH///8B");}elseif($_GET["file"]=="default.css"){header("Content-Type: text/css; charset=utf-8");echo'body{color:#000;background:#fff;font:90%/1.25 Verdana,Arial,Helvetica,sans-serif;margin:0;}a{color:blue;}a:visited{color:navy;}a:hover{color:red;}h1{font-size:150%;margin:0;padding:.8em 1em;border-bottom:1px solid #999;font-weight:normal;color:#777;background:#eee;}h2{font-size:150%;margin:0 0 20px -18px;padding:.8em 1em;border-bottom:1px solid #000;color:#000;font-weight:normal;background:#ddf;}h3{font-weight:normal;font-size:130%;margin:1em 0 0;}form{margin:0;}table{margin:1em 20px 0 0;border:0;border-top:1px solid #999;border-left:1px solid #999;font-size:90%;}td,th{border:0;border-right:1px solid #999;border-bottom:1px solid #999;padding:.2em .3em;}th{background:#eee;text-align:left;}thead th{text-align:center;}thead td,thead th{background:#ddf;}fieldset{display:inline;vertical-align:top;padding:.5em .8em;margin:.8em .5em 0 0;border:1px solid #999;}p{margin:.8em 20px 0 0;}img{vertical-align:middle;border:0;}td img{max-width:200px;max-height:200px;}code{background:#eee;}tr:hover td,tr:hover th{background:#ddf;}pre{margin:1em 0 0;}.version{color:#777;font-size:67%;}.js .hidden{display:none;}.nowrap td,.nowrap th,td.nowrap{white-space:pre;}.wrap td{white-space:normal;}.error{color:red;background:#fee;}.error b{background:#fff;font-weight:normal;}.message{color:green;background:#efe;}.error,.message{padding:.5em .8em;margin:1em 20px 0 0;}.char{color:#007F00;}.date{color:#7F007F;}.enum{color:#007F7F;}.binary{color:red;}.odd td{background:#F5F5F5;}.time{color:silver;font-size:70%;}.function{text-align:right;}.number{text-align:right;}.datetime{text-align:right;}.type{width:15ex;width:auto\\9;}#menu{position:absolute;margin:10px 0 0;padding:0 0 30px 0;top:2em;left:0;width:19em;overflow:auto;overflow-y:hidden;white-space:nowrap;}#menu p{padding:.8em 1em;margin:0;border-bottom:1px solid #ccc;}#content{margin:2em 0 0 21em;padding:10px 20px 20px 0;}#lang{position:absolute;top:0;left:0;line-height:1.8em;padding:.3em 1em;}#breadcrumb{white-space:nowrap;position:absolute;top:0;left:21em;background:#eee;height:2em;line-height:1.8em;padding:0 1em;margin:0 0 0 -18px;}#h1{color:#777;text-decoration:none;font-style:italic;}#version{font-size:67%;color:red;}#schema{margin-left:60px;position:relative;}#schema .table{border:1px solid silver;padding:0 2px;cursor:move;position:absolute;}#schema .references{position:absolute;}@media print{#lang,#menu{display:none;}#content{margin-left:1em;}#breadcrumb{left:1em;}}';}elseif($_GET["file"]=="functions.js"){header("Content-Type: text/javascript; charset=utf-8");?>
document.body.className='js';function toggle(id){var el=document.getElementById(id);el.className=(el.className=='hidden'?'':'hidden');return true;}
function cookie(assign,days,params){var date=new Date();date.setDate(date.getDate()+days);document.cookie=assign+'; expires='+date+(params||'');}
function verifyVersion(protocol){cookie('adminer_version=0',1);var script=document.createElement('script');script.src=protocol+'://www.adminer.org/version.php';document.body.appendChild(script);}
function formCheck(el,name){var elems=el.form.elements;for(var i=0;i<elems.length;i++){if(name.test(elems[i].name)){elems[i].checked=el.checked;}}}
function formUncheck(id){document.getElementById(id).checked=false;}
function formChecked(el,name){var checked=0;var elems=el.form.elements;for(var i=0;i<elems.length;i++){if(name.test(elems[i].name)&&elems[i].checked){checked++;}}
return checked;}
function tableClick(event){var el=event.target||event.srcElement;while(!/^tr$/i.test(el.tagName)){if(/^(table|a|input|textarea)$/i.test(el.tagName)){return;}
el=el.parentNode;}
el=el.firstChild.firstChild;el.click&&el.click();el.onclick&&el.onclick();}
function setHtml(id,html){var el=document.getElementById(id);if(el){if(html==undefined){el.parentNode.innerHTML='&nbsp;';}else{el.innerHTML=html;}}}
function selectAddRow(field){var row=field.parentNode.cloneNode(true);var selects=row.getElementsByTagName('select');for(var i=0;i<selects.length;i++){selects[i].name=selects[i].name.replace(/[a-z]\[[0-9]+/,'$&1');selects[i].selectedIndex=0;}
var inputs=row.getElementsByTagName('input');if(inputs.length){inputs[0].name=inputs[0].name.replace(/[a-z]\[[0-9]+/,'$&1');inputs[0].value='';inputs[0].className='';}
field.parentNode.parentNode.appendChild(row);field.onchange=function(){};}
function textareaKeydown(target,event,tab,button){if(tab&&event.keyCode==9&&!event.shiftKey&&!event.altKey&&!event.ctrlKey&&!event.metaKey){if(target.setSelectionRange){var start=target.selectionStart;target.value=target.value.substr(0,start)+'\t'+target.value.substr(target.selectionEnd);target.setSelectionRange(start+1,start+1);return false;}else if(target.createTextRange){document.selection.createRange().text='\t';return false;}}
if(event.ctrlKey&&(event.keyCode==13||event.keyCode==10)&&!event.altKey&&!event.metaKey){if(button){button.click();}else{target.form.submit();}}
return true;}
function selectDblClick(td,event,text){var pos=event.rangeOffset;var value=(td.firstChild.firstChild?td.firstChild.firstChild.data:(td.firstChild.alt?td.firstChild.alt:td.firstChild.data));var input=document.createElement(text?'textarea':'input');input.name=td.id;input.value=(value=='\u00A0'||td.getElementsByTagName('i').length?'':value);input.style.width=Math.max(td.clientWidth-14,20)+'px';if(text){var rows=1;value.replace(/\n/g,function(){rows++;});input.rows=rows;input.onkeydown=function(event){return textareaKeydown(input,event||window.event);};}
if(document.selection){var range=document.selection.createRange();range.moveToPoint(event.x,event.y);var range2=range.duplicate();range2.moveToElementText(td);range2.setEndPoint('EndToEnd',range);pos=range2.text.length;}
td.innerHTML='';td.appendChild(input);input.focus();input.selectionStart=pos;input.selectionEnd=pos;if(document.selection){var range=document.selection.createRange();range.moveStart('character',pos);range.select();}
td.ondblclick=function(){};}
function bodyLoad(version,protocol){var jushRoot=protocol + '://www.adminer.org/static/';var script=document.createElement('script');script.src=jushRoot+'jush.js';script.onload=function(){if(window.jush){jush.create_links=' target="_blank"';jush.urls.sql[0]='http://dev.mysql.com/doc/refman/'+version+'/en/$key';jush.urls.sql_sqlset=jush.urls.sql[0];jush.urls.sqlset[0]=jush.urls.sql[0];jush.urls.sqlstatus[0]=jush.urls.sql[0];jush.urls.pgsql[0]='http://www.postgresql.org/docs/'+version+'/static/$key';jush.urls.pgsql_pgsqlset=jush.urls.pgsql[0];jush.urls.pgsqlset[0]='http://www.postgresql.org/docs/'+version+'/static/runtime-config-$key.html#GUC-$1';jush.style(jushRoot+'jush.css');if(window.jushLinks){jush.custom_links=jushLinks;}
jush.highlight_tag('pre',0);jush.highlight_tag('code');}};script.onreadystatechange=function(){if(/^(loaded|complete)$/.test(script.readyState)){script.onload();}};document.body.appendChild(script);}
function selectValue(select){return select.value||select.options[select.selectedIndex].text;}
function formField(form,name){for(var i=0;i<form.length;i++){if(form[i].name==name){return form[i];}}}
function typePassword(el,disable){try{el.type=(disable?'text':'password');}catch(e){}}
var added='.',rowCount;function reEscape(s){return s.replace(/[\[\]\\^$*+?.(){|}]/,'\\$&');}
function idfEscape(s){return s.replace(/`/,'``');}
function editingNameChange(field){var name=field.name.substr(0,field.name.length-7);var type=formField(field.form,name+'[type]');var opts=type.options;var table=reEscape(field.value);var column='';var match;if((match=/(.+)_(.+)/.exec(table))||(match=/(.*[a-z])([A-Z].*)/.exec(table))){table=match[1];column=match[2];}
var plural='(?:e?s)?';var tabCol=table+plural+'_?'+column;var re=new RegExp('(^'+idfEscape(table+plural)+'`'+idfEscape(column)+'$'
+'|^'+idfEscape(tabCol)+'`'
+'|^'+idfEscape(column+plural)+'`'+idfEscape(table)+'$'
+')|`'+idfEscape(tabCol)+'$','i');var candidate;for(var i=opts.length;i--;){if(!/`/.test(opts[i].value)){if(i==opts.length-2&&candidate&&!match[1]&&name=='fields[1]'){return false;}
break;}
if(match=re.exec(opts[i].value)){if(candidate){return false;}
candidate=i;}}
if(candidate){type.selectedIndex=candidate;type.onchange();}}
function editingAddRow(button,allowed,focus){if(allowed&&rowCount>=allowed){return false;}
var match=/([0-9]+)(\.[0-9]+)?/.exec(button.name);var x=match[0]+(match[2]?added.substr(match[2].length):added)+'1';var row=button.parentNode.parentNode;var row2=row.cloneNode(true);var tags=row.getElementsByTagName('select');var tags2=row2.getElementsByTagName('select');for(var i=0;i<tags.length;i++){tags2[i].name=tags[i].name.replace(/([0-9.]+)/,x);tags2[i].selectedIndex=tags[i].selectedIndex;}
tags=row.getElementsByTagName('input');tags2=row2.getElementsByTagName('input');var input=tags2[0];for(var i=0;i<tags.length;i++){if(tags[i].name=='auto_increment_col'){tags2[i].value=x;tags2[i].checked=false;}
tags2[i].name=tags[i].name.replace(/([0-9.]+)/,x);if(/\[(orig|field|comment|default)/.test(tags[i].name)){tags2[i].value='';}
if(/\[(has_default)/.test(tags[i].name)){tags2[i].checked=false;}}
tags[0].onchange=function(){editingNameChange(tags[0]);};row.parentNode.insertBefore(row2,row.nextSibling);if(focus){input.onchange=function(){editingNameChange(input);};input.focus();}
added+='0';rowCount++;return true;}
function editingRemoveRow(button){var field=formField(button.form,button.name.replace(/drop_col(.+)/,'fields$1[field]'));field.parentNode.removeChild(field);button.parentNode.parentNode.style.display='none';return true;}
var lastType='';function editingTypeChange(type){var name=type.name.substr(0,type.name.length-6);var text=selectValue(type);for(var i=0;i<type.form.elements.length;i++){var el=type.form.elements[i];if(el.name==name+'[length]'&&!((/(char|binary)$/.test(lastType)&&/(char|binary)$/.test(text))||(/(enum|set)$/.test(lastType)&&/(enum|set)$/.test(text)))){el.value='';}
if(lastType=='timestamp'&&el.name==name+'[has_default]'&&/timestamp/i.test(formField(type.form,name+'[default]').value)){el.checked=false;}
if(el.name==name+'[collation]'){el.className=(/(char|text|enum|set)$/.test(text)?'':'hidden');}
if(el.name==name+'[unsigned]'){el.className=(/(int|float|double|decimal)$/.test(text)?'':'hidden');}
if(el.name==name+'[on_delete]'){el.className=(/`/.test(text)?'':'hidden');}}}
function editingLengthFocus(field){var td=field.parentNode;if(/(enum|set)$/.test(selectValue(td.previousSibling.firstChild))){var edit=document.getElementById('enum-edit');var val=field.value;edit.value=(/^'.+','.+'$/.test(val)?val.substr(1,val.length-2).replace(/','/g,"\n").replace(/''/g,"'"):val);td.appendChild(edit);field.style.display='none';edit.style.display='inline';edit.focus();}}
function editingLengthBlur(edit){var field=edit.parentNode.firstChild;var val=edit.value;field.value=(/\n/.test(val)?"'"+val.replace(/\n+$/,'').replace(/'/g,"''").replace(/\n/g,"','")+"'":val);field.style.display='inline';edit.style.display='none';}
function columnShow(checked,column){var trs=document.getElementById('edit-fields').getElementsByTagName('tr');for(var i=0;i<trs.length;i++){trs[i].getElementsByTagName('td')[column].className=(checked?'':'hidden');}}
function partitionByChange(el){var partitionTable=/RANGE|LIST/.test(selectValue(el));el.form['partitions'].className=(partitionTable||!el.selectedIndex?'hidden':'');document.getElementById('partition-table').className=(partitionTable?'':'hidden');}
function partitionNameChange(el){var row=el.parentNode.parentNode.cloneNode(true);row.firstChild.firstChild.value='';el.parentNode.parentNode.parentNode.appendChild(row);el.onchange=function(){};}
function foreignAddRow(field){var row=field.parentNode.parentNode.cloneNode(true);var selects=row.getElementsByTagName('select');for(var i=0;i<selects.length;i++){selects[i].name=selects[i].name.replace(/\]/,'1$&');selects[i].selectedIndex=0;}
field.parentNode.parentNode.parentNode.appendChild(row);field.onchange=function(){};}
function indexesAddRow(field){var row=field.parentNode.parentNode.cloneNode(true);var spans=row.getElementsByTagName('span');for(var i=0;i<spans.length-1;i++){row.removeChild(spans[i]);}
var selects=row.getElementsByTagName('select');for(var i=0;i<selects.length;i++){selects[i].name=selects[i].name.replace(/indexes\[[0-9]+/,'$&1');selects[i].selectedIndex=0;}
var input=row.getElementsByTagName('input')[0];input.name=input.name.replace(/indexes\[[0-9]+/,'$&1');input.value='';field.parentNode.parentNode.parentNode.appendChild(row);field.onchange=function(){};}
function indexesAddColumn(field){var column=field.parentNode.cloneNode(true);var select=column.getElementsByTagName('select')[0];select.name=select.name.replace(/\]\[[0-9]+/,'$&1');select.selectedIndex=0;var input=column.getElementsByTagName('input')[0];input.name=input.name.replace(/\]\[[0-9]+/,'$&1');input.value='';field.parentNode.parentNode.appendChild(column);field.onchange=function(){};}
var that,x,y,em,tablePos;function schemaMousedown(el,event){that=el;x=event.clientX-el.offsetLeft;y=event.clientY-el.offsetTop;}
function schemaMousemove(ev){if(that!==undefined){ev=ev||event;var left=(ev.clientX-x)/em;var top=(ev.clientY-y)/em;var divs=that.getElementsByTagName('div');var lineSet={};for(var i=0;i<divs.length;i++){if(divs[i].className=='references'){var div2=document.getElementById((divs[i].id.substr(0,4)=='refs'?'refd':'refs')+divs[i].id.substr(4));var ref=(tablePos[divs[i].title]?tablePos[divs[i].title]:[div2.parentNode.offsetTop/em,0]);var left1=-1;var isTop=true;var id=divs[i].id.replace(/^ref.(.+)-.+/,'$1');if(divs[i].parentNode!=div2.parentNode){left1=Math.min(0,ref[1]-left)-1;divs[i].style.left=left1+'em';divs[i].getElementsByTagName('div')[0].style.width=-left1+'em';var left2=Math.min(0,left-ref[1])-1;div2.style.left=left2+'em';div2.getElementsByTagName('div')[0].style.width=-left2+'em';isTop=(div2.offsetTop+ref[0]*em>divs[i].offsetTop+top*em);}
if(!lineSet[id]){var line=document.getElementById(divs[i].id.replace(/^....(.+)-[0-9]+$/,'refl$1'));var shift=ev.clientY-y-that.offsetTop;line.style.left=(left+left1)+'em';if(isTop){line.style.top=(line.offsetTop+shift)/em+'em';}
if(divs[i].parentNode!=div2.parentNode){line=line.getElementsByTagName('div')[0];line.style.height=(line.offsetHeight+(isTop?-1:1)*shift)/em+'em';}
lineSet[id]=true;}}}
that.style.left=left+'em';that.style.top=top+'em';}}
function schemaMouseup(ev){if(that!==undefined){ev=ev||event;tablePos[that.firstChild.firstChild.firstChild.data]=[(ev.clientY-y)/em,(ev.clientX-x)/em];that=undefined;var s='';for(var key in tablePos){s+='_'+key+':'+Math.round(tablePos[key][0]*10000)/10000+'x'+Math.round(tablePos[key][1]*10000)/10000;}
cookie('adminer_schema='+encodeURIComponent(s.substr(1)),30,'; path="'+location.pathname+location.search+'"');}}<?php
}else{header("Content-Type: image/gif");switch($_GET["file"]){case"plus.gif":echo
base64_decode("R0lGODdhEgASAKEAAO7u7gAAAJmZmQAAACwAAAAAEgASAAACIYSPqcvtD00I8cwqKb5v+q8pIAhxlRmhZYi17iPE8kzLBQA7");break;case"cross.gif":echo
base64_decode("R0lGODdhEgASAKEAAO7u7gAAAJmZmQAAACwAAAAAEgASAAACI4SPqcvtDyMKYdZGb355wy6BX3dhlOEx57FK7gtHwkzXNl0AADs=");break;case"up.gif":echo
base64_decode("R0lGODdhEgASAKEAAO7u7gAAAJmZmQAAACwAAAAAEgASAAACIISPqcvtD00IUU4K730T9J5hFTiKEXmaYcW2rgDH8hwXADs=");break;case"down.gif":echo
base64_decode("R0lGODdhEgASAKEAAO7u7gAAAJmZmQAAACwAAAAAEgASAAACIISPqcvtD00I8cwqKb5bV/5cosdMJtmcHca2lQDH8hwXADs=");break;case"arrow.gif":echo
base64_decode("R0lGODlhCAAKAIAAAICAgP///yH5BAEAAAEALAAAAAAIAAoAAAIPBIJplrGLnpQRqtOy3rsAADs=");break;}}exit;}function
connection(){global$g;return$g;}function
idf_unescape($Q){$rb=substr($Q,-1);return
str_replace($rb.$rb,$rb,substr($Q,1,-1));}function
escape_string($b){return
substr(q($b),1,-1);}function
remove_slashes($mb){if(get_magic_quotes_gpc()){while(list($e,$b)=each($mb)){foreach($b
as$Ma=>$w){unset($mb[$e][$Ma]);if(is_array($w)){$mb[$e][stripslashes($Ma)]=$w;$mb[]=&$mb[$e][stripslashes($Ma)];}else{$mb[$e][stripslashes($Ma)]=($me?$w:stripslashes($w));}}}}}function
bracket_escape($Q,$zf=false){static$se=array(':'=>':1',']'=>':2','['=>':3');return
strtr($Q,($zf?array_flip($se):$se));}function
h($G){return
htmlspecialchars($G,ENT_QUOTES);}function
nbsp($G){return(trim($G)!=""?h($G):"&nbsp;");}function
nl_br($G){return
str_replace("\n","<br>",$G);}function
checkbox($f,$p,$Ga,$Ae="",$ye=""){static$U=0;$U++;$d="<input type='checkbox'".($f?" name='$f' value='".h($p)."'":"").($Ga?" checked":"").($ye?" onclick=\"$ye\"":"")." id='checkbox-$U'>";return($Ae!=""?"<label for='checkbox-$U'>$d".h($Ae)."</label>":$d);}function
optionlist($Vc,$cf=null,$ve=false){$d="";foreach($Vc
as$Ma=>$w){if(is_array($w)){$d.='<optgroup label="'.h($Ma).'">';}foreach((is_array($w)?$w:array($Ma=>$w))as$e=>$b){$d.='<option'.($ve||is_string($e)?' value="'.h($e).'"':'').(($ve||is_string($e)?(string)$e:$b)===$cf?' selected':'').'>'.h($b);}if(is_array($w)){$d.='</optgroup>';}}return$d;}function
html_select($f,$Vc,$p="",$Hb=true){if($Hb){return"<select name='".h($f)."'".(is_string($Hb)?" onchange=\"$Hb\"":"").">".optionlist($Vc,$p)."</select>";}$d="";foreach($Vc
as$e=>$b){$d.="<label><input type='radio' name='".h($f)."' value='".h($e)."'".($e==$p?" checked":"").">".h($b)."</label>";}return$d;}function
ini_bool($af){$b=ini_get($af);return(eregi('^(on|true|yes)$',$b)||(int)$b);}function
q($G){global$g;return$g->quote($G);}function
get_vals($j,$J=0){global$g;$d=array();$i=$g->query($j);if(is_object($i)){while($a=$i->fetch_row()){$d[]=$a[$J];}}return$d;}function
get_key_vals($j,$H=null){global$g;if(!is_object($H)){$H=$g;}$d=array();$i=$H->query($j);while($a=$i->fetch_row()){$d[$a[0]]=$a[1];}return$d;}function
get_rows($j,$H=null,$n="<p class='error'>"){global$g;if(!is_object($H)){$H=$g;}$d=array();$i=$H->query($j);if(is_object($i)){while($a=$i->fetch_assoc()){$d[]=$a;}}elseif(!$i&&$n&&(headers_sent()||ob_get_level())){echo$n.error()."\n";}return$d;}function
unique_array($a,$K){foreach($K
as$v){if(ereg("PRIMARY|UNIQUE",$v["type"])){$d=array();foreach($v["columns"]as$e){if(!isset($a[$e])){continue
2;}$d[$e]=$a[$e];}return$d;}}$d=array();foreach($a
as$e=>$b){if(!preg_match('~^(COUNT\\((\\*|(DISTINCT )?`(?:[^`]|``)+`)\\)|(AVG|GROUP_CONCAT|MAX|MIN|SUM)\\(`(?:[^`]|``)+`\\))$~',$e)){$d[$e]=$b;}}return$d;}function
where($t){global$_;$d=array();foreach((array)$t["where"]as$e=>$b){$d[]=idf_escape(bracket_escape($e,1)).(ereg('\\.',$b)||$_=="mssql"?" LIKE ".exact_value(addcslashes($b,"%_")):" = ".exact_value($b));}foreach((array)$t["null"]as$e){$d[]=idf_escape($e)." IS NULL";}return
implode(" AND ",$d);}function
where_check($b){parse_str($b,$we);remove_slashes(array(&$we));return
where($we);}function
where_link($k,$J,$p,$ff="="){return"&where%5B$k%5D%5Bcol%5D=".urlencode($J)."&where%5B$k%5D%5Bop%5D=".urlencode($ff)."&where%5B$k%5D%5Bval%5D=".urlencode($p);}function
cookie($f,$p){global$Zb;$ec=array($f,(ereg("\n",$p)?"":$p),time()+2592000,preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]),"",$Zb);if(version_compare(PHP_VERSION,'5.2.0')>=0){$ec[]=true;}return
call_user_func_array('setcookie',$ec);}function
restart_session(){if(!ini_bool("session.use_cookies")){session_start();}}function&get_session($e){return$_SESSION[$e][DRIVER][SERVER][$_GET["username"]];}function
set_session($e,$b){$_SESSION[$e][DRIVER][SERVER][$_GET["username"]]=$b;}function
auth_url($Gb,$E,$P){global$ja;preg_match('~([^?]*)\\??(.*)~',remove_from_uri(implode("|",array_keys($ja))."|username|".session_name()),$l);return"$l[1]?".(SID&&!$_COOKIE?SID."&":"").($Gb!="server"||$E!=""?urlencode($Gb)."=".urlencode($E)."&":"")."username=".urlencode($P).($l[2]?"&$l[2]":"");}function
redirect($ka,$za=null){if(isset($za)){restart_session();$_SESSION["messages"][]=$za;}if(isset($ka)){header("Location: ".($ka!=""?$ka:"."));exit;}}function
query_redirect($j,$ka,$za,$Lc=true,$bf=true,$ue=false){global$g,$n,$r;if($bf){$ue=!$g->query($j);}$Zc="";if($j){$Zc=$r->messageQuery($j);}if($ue){$n=error().$Zc;return
false;}if($Lc){redirect($ka,$za.$Zc);}return
true;}function
queries($j=null){global$g;static$hb=array();if(!isset($j)){return
implode(";\n",$hb);}$hb[]=$j;return$g->query($j);}function
apply_queries($j,$D,$if='table'){foreach($D
as$h){if(!queries("$j ".$if($h))){return
false;}}return
true;}function
queries_redirect($ka,$za,$Lc){return
query_redirect(queries(),$ka,$za,$Lc,false,!$Lc);}function
remove_from_uri($Va=""){return
substr(preg_replace("~(?<=[?&])($Va".(SID?"":"|".session_name()).")=[^&]*&~",'',"$_SERVER[REQUEST_URI]&"),0,-1);}function
pagination($Y,$Ye){return" ".($Y==$Ye?$Y+1:'<a href="'.h(remove_from_uri("page").($Y?"&page=$Y":"")).'">'.($Y+1)."</a>");}function
get_file($e,$te=false){$ra=$_FILES[$e];if(!$ra||$ra["error"]){return$ra["error"];}return
file_get_contents($te&&ereg('\\.gz$',$ra["name"])?"compress.zlib://$ra[tmp_name]":($te&&ereg('\\.bz2$',$ra["name"])?"compress.bzip2://$ra[tmp_name]":$ra["tmp_name"]));}function
upload_error($n){$xe=($n==UPLOAD_ERR_INI_SIZE?ini_get("upload_max_filesize"):null);return($n?'Unable to upload a file.'.($xe?" ".sprintf('Maximum allowed file size is %sB.',$xe):""):'File does not exist.');}function
odd($d=' class="odd"'){static$k=0;if(!$d){$k=-1;}return($k++%
2?$d:'');}function
is_utf8($b){return(preg_match('~~u',$b)&&!preg_match('~[\\0-\\x8\\xB\\xC\\xE-\\x1F]~',$b));}function
shorten_utf8($G,$da=80,$jf=""){if(!preg_match("(^([\t\r\n -\x{FFFF}]{0,$da})($)?)u",$G,$l)){preg_match("(^([\t\r\n -~]{0,$da})($)?)",$G,$l);}return
h($l[1]).$jf.(isset($l[2])?"":"<i>...</i>");}function
friendly_url($b){return
preg_replace('~[^a-z0-9_]~i','-',$b);}function
hidden_fields($mb,$df=array()){while(list($e,$b)=each($mb)){if(is_array($b)){foreach($b
as$Ma=>$w){$mb[$e."[$Ma]"]=$w;}}elseif(!in_array($e,$df)){echo'<input type="hidden" name="'.h($e).'" value="'.h($b).'">';}}}function
hidden_fields_get(){echo(SID&&!$_COOKIE?'<input type="hidden" name="'.session_name().'" value="'.h(session_id()).'">':''),(SERVER!==null?'<input type="hidden" name="'.DRIVER.'" value="'.h(SERVER).'">':""),'<input type="hidden" name="username" value="'.h($_GET["username"]).'">';}function
column_foreign_keys($h){$d=array();foreach(foreign_keys($h)as$B){foreach($B["source"]as$b){$d[$b][]=$B;}}return$d;}function
enum_input($y,$Qa,$c,$p){preg_match_all("~'((?:[^']|'')*)'~",$c["length"],$qa);foreach($qa[1]as$k=>$b){$b=stripcslashes(str_replace("''","'",$b));$Ga=(is_int($p)?$p==$k+1:(is_array($p)?in_array($k+1,$p):$p===$b));echo" <label><input type='$y'$Qa value='".($k+1)."'".($Ga?' checked':'').'>'.h($b).'</label>';}}function
input($c,$p,$O){global$T,$r,$_;$f=h(bracket_escape($c["field"]));echo"<td class='function'>";$V=(isset($_GET["select"])?array("orig"=>'original'):array())+$r->editFunctions($c);$Qa=" name='fields[$f]'";if($c["type"]=="enum"){echo
nbsp($V[""])."<td>".($V["orig"]?"<label><input type='radio'$Qa value='-1' checked><i>$V[orig]</i></label> ":""),$r->editInput($_GET["edit"],$c,$Qa,$p);enum_input("radio",$Qa,$c,$p);}else{$ib=0;foreach($V
as$e=>$b){if($e===""||!$b){break;}$ib++;}$Hb=($ib?" onchange=\"var f = this.form['function[".addcslashes($f,"\r\n'\\")."]']; if ($ib > f.selectedIndex) f.selectedIndex = $ib;\"":"");$Qa.=$Hb;echo(count($V)>1?html_select("function[$f]",$V,!isset($O)||in_array($O,$V)||isset($V[$O])?$O:""):nbsp(reset($V))).'<td>';$_e=$r->editInput($_GET["edit"],$c,$Qa,$p);if($_e!=""){echo$_e;}elseif($c["type"]=="set"){preg_match_all("~'((?:[^']|'')*)'~",$c["length"],$qa);foreach($qa[1]as$k=>$b){$b=stripcslashes(str_replace("''","'",$b));$Ga=(is_int($p)?($p>>$k)&1:in_array($b,explode(",",$p),true));echo" <label><input type='checkbox' name='fields[$f][$k]' value='".(1<<$k)."'".($Ga?' checked':'')."$Hb>".h($b).'</label>';}}elseif(ereg('blob|bytea|raw|file',$c["type"])&&ini_bool("file_uploads")){echo"<input type='file' name='fields-$f'$Hb>";}elseif(ereg('text|lob',$c["type"])){echo"<textarea ".($_!="sqlite"||ereg("\n",$p)?"cols='50' rows='12'":"cols='30' rows='1' style='height: 1.2em;'")."$Qa onkeydown='return textareaKeydown(this, event);'>".h($p).'</textarea>';}else{$Ad=(!ereg('int',$c["type"])&&preg_match('~^([0-9]+)(,([0-9]+))?$~',$c["length"],$l)?((ereg("binary",$c["type"])?2:1)*$l[1]+($l[3]?1:0)+($l[2]&&!$c["unsigned"]?1:0)):($T[$c["type"]]?$T[$c["type"]]+($c["unsigned"]?0:1):0));echo"<input value='".h($p)."'".($Ad?" maxlength='$Ad'":"").(ereg('char|binary',$c["type"])&&$Ad>20?" size='40'":"")."$Qa>";}}}function
process_input($c){global$r;$Q=bracket_escape($c["field"]);$O=$_POST["function"][$Q];$p=$_POST["fields"][$Q];if($c["type"]=="enum"){if($p==-1){return
false;}if($p==""){return"NULL";}return
intval($p);}if($c["auto_increment"]&&$p==""){return
null;}if($O=="orig"){return
false;}if($O=="NULL"){return"NULL";}if($c["type"]=="set"){return
array_sum((array)$p);}if(ereg('blob|bytea|raw|file',$c["type"])&&ini_bool("file_uploads")){$ra=get_file("fields-$Q");if(!is_string($ra)){return
false;}return
q($ra);}return$r->processInput($c,$p,$O);}function
search_tables(){global$r,$g;$_GET["where"][0]["op"]="LIKE %%";$_GET["where"][0]["val"]=$_POST["query"];$oa=false;foreach(table_status()as$h=>$I){$f=$r->tableName($I);if(isset($I["Engine"])&&$f!=""&&(!$_POST["tables"]||in_array($h,$_POST["tables"]))){$i=$g->query("SELECT".limit("1 FROM ".table($h)," WHERE ".implode(" AND ",$r->selectSearchProcess(fields($h),array())),1));if($i->fetch_row()){if(!$oa){echo"<ul>\n";$oa=true;}echo"<li><a href='".h(ME."select=".urlencode($h)."&where[0][op]=".urlencode($_GET["where"][0]["op"])."&where[0][val]=".urlencode($_GET["where"][0]["val"]))."'>".h($f)."</a>\n";}}}echo($oa?"</ul>":"<p class='message'>".'No tables.')."\n";}function
dump_csv($a){foreach($a
as$e=>$b){if(preg_match("~[\"\n,;]~",$b)||$b===""){$a[$e]='"'.str_replace('"','""',$b).'"';}}echo
implode(($_POST["format"]=="csv"?",":";"),$a)."\n";}function
apply_sql_function($O,$J){return($O?($O=="unixepoch"?"DATETIME($J, '$O')":($O=="count distinct"?"COUNT(DISTINCT ":strtoupper("$O("))."$J)"):$J);}function
password_file(){$Rc=ini_get("upload_tmp_dir");if(!$Rc){if(function_exists('sys_get_temp_dir')){$Rc=sys_get_temp_dir();}else{$Z=@tempnam("","");if(!$Z){return
false;}$Rc=dirname($Z);unlink($Z);}}$Z="$Rc/adminer.key";$d=@file_get_contents($Z);if($d){return$d;}$La=@fopen($Z,"w");if($La){$d=md5(uniqid(mt_rand(),true));fwrite($La,$d);fclose($La);}return$d;}function
is_mail($hf){$ze='[-a-z0-9!#$%&\'*+/=?^_`{|}~]';$fc='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';$ia="$ze+(\\.$ze+)*@($fc?\\.)+$fc";return
preg_match("(^$ia(,\\s*$ia)*\$)i",$hf);}function
is_url($G){$fc='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';return(preg_match("~^(https?)://($fc?\\.)+$fc(:[0-9]+)?(/.*)?(\\?.*)?(#.*)?\$~i",$G,$l)?strtolower($l[1]):"");}function
print_fieldset($U,$We,$Ue=false){echo"<fieldset><legend><a href='#fieldset-$U' onclick=\"return !toggle('fieldset-$U');\">$We</a></legend><div id='fieldset-$U'".($Ue?"":" class='hidden'").">\n";}function
bold($G,$Te){return($Te?"<b>$G</b>":$G);}if(!isset($_SERVER["REQUEST_URI"])){$_SERVER["REQUEST_URI"]=$_SERVER["ORIG_PATH_INFO"].($_SERVER["QUERY_STRING"]!=""?"?$_SERVER[QUERY_STRING]":"");}$Zb=$_SERVER["HTTPS"]&&strcasecmp($_SERVER["HTTPS"],"off");@ini_set("session.use_trans_sid",false);if(!defined("SID")){session_name("adminer_sid");$ec=array(0,preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]),"",$Zb);if(version_compare(PHP_VERSION,'5.2.0')>=0){$ec[]=true;}call_user_func_array('session_set_cookie_params',$ec);session_start();}remove_slashes(array(&$_GET,&$_POST,&$_COOKIE));if(function_exists("set_magic_quotes_runtime")){set_magic_quotes_runtime(false);}@set_time_limit(0);function
lang($Ve,$nc){$jc=($nc==1||(!$nc&&'en'=='fr')?0:((!$nc||$nc>=5)&&ereg('cs|sk|ru','en')?2:1));return
sprintf($Ve[$jc],$nc);}if(extension_loaded('pdo')){class
Min_PDO
extends
PDO{var$_result,$server_info,$affected_rows,$error;function
__construct(){}function
dsn($Xe,$P,$R,$Ze='auth_error'){set_exception_handler($Ze);parent::__construct($Xe,$P,$R);restore_exception_handler();$this->setAttribute(13,array('Min_PDOStatement'));$this->server_info=$this->getAttribute(4);}function
query($j,$Wa=false){$i=parent::query($j);if(!$i){$ef=$this->errorInfo();$this->error=$ef[2];return
false;}$this->store_result($i);return$i;}function
multi_query($j){return$this->_result=$this->query($j);}function
store_result($i=null){if(!$i){$i=$this->_result;}if($i->columnCount()){$i->num_rows=$i->rowCount();return$i;}$this->affected_rows=$i->rowCount();return
true;}function
next_result(){return$this->_result->nextRowset();}function
result($j,$c=0){$i=$this->query($j);if(!$i){return
false;}$a=$i->fetch();return$a[$c];}}class
Min_PDOStatement
extends
PDOStatement{var$_offset=0,$num_rows;function
fetch_assoc(){return$this->fetch(2);}function
fetch_row(){return$this->fetch(3);}function
fetch_field(){$a=(object)$this->getColumnMeta($this->_offset++);$a->orgtable=$a->table;$a->orgname=$a->name;$a->charsetnr=(in_array("blob",$a->flags)?63:0);return$a;}}}$Ha=array();$ja=array();$Ha[]="SQLite";$Ha[]="SQLite3";$Ha[]="PDO_SQLite";if(extension_loaded("sqlite3")||extension_loaded("pdo_sqlite")){$ja["sqlite"]="SQLite 3";}if(extension_loaded("sqlite")||extension_loaded("pdo_sqlite")){$ja["sqlite2"]="SQLite 2";}if(isset($_GET["sqlite"])||isset($_GET["sqlite2"])){define("DRIVER",(isset($_GET["sqlite"])?"sqlite":"sqlite2"));if(extension_loaded(isset($_GET["sqlite2"])?"sqlite":"sqlite3")){if(isset($_GET["sqlite2"])){class
Min_SQLite{var$extension="SQLite",$server_info,$affected_rows,$error,$_link;function
Min_SQLite($Z){$this->server_info=sqlite_libversion();$this->_link=new
SQLiteDatabase($Z);}function
query($j,$Wa=false){$nf=($Wa?"unbufferedQuery":"query");$i=@$this->_link->$nf($j,SQLITE_BOTH,$n);if(!$i){$this->error=$n;return
false;}elseif($i===true){$this->affected_rows=$this->changes();return
true;}return
new
Min_Result($i);}function
quote($G){return"'".sqlite_escape_string($G)."'";}function
store_result(){return$this->_result;}function
result($j,$c=0){$i=$this->query($j);if(!is_object($i)){return
false;}$a=$i->_result->fetch();return$a[$c];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
Min_Result($i){$this->_result=$i;if(method_exists($i,'numRows')){$this->num_rows=$i->numRows();}}function
fetch_assoc(){$a=$this->_result->fetch(SQLITE_ASSOC);if(!$a){return
false;}$d=array();foreach($a
as$e=>$b){$d[($e[0]=='"'?idf_unescape($e):$e)]=$b;}return$d;}function
fetch_row(){return$this->_result->fetch(SQLITE_NUM);}function
fetch_field(){$f=$this->_result->fieldName($this->_offset++);$ia='(\\[.*]|"(?:[^"]|"")*"|(.+))';if(preg_match("~^($ia\\.)?$ia\$~",$f,$l)){$h=($l[3]!=""?$l[3]:idf_unescape($l[2]));$f=($l[5]!=""?$l[5]:idf_unescape($l[4]));}return(object)array("name"=>$f,"orgname"=>$f,"orgtable"=>$h,);}}}else{class
Min_SQLite{var$extension="SQLite3",$server_info,$affected_rows,$error,$_link;function
Min_SQLite($Z){$this->_link=new
SQLite3($Z);$nd=$this->_link->version();$this->server_info=$nd["versionString"];}function
query($j){$i=@$this->_link->query($j);if(!$i){$this->error=$this->_link->lastErrorMsg();return
false;}elseif($i->numColumns()){return
new
Min_Result($i);}$this->affected_rows=$this->_link->changes();return
true;}function
quote($G){return"'".$this->_link->escapeString($G)."'";}function
store_result(){return$this->_result;}function
result($j,$c=0){$i=$this->query($j);if(!is_object($i)){return
false;}$a=$i->_result->fetchArray();return$a[$c];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
Min_Result($i){$this->_result=$i;}function
fetch_assoc(){return$this->_result->fetchArray(SQLITE3_ASSOC);}function
fetch_row(){return$this->_result->fetchArray(SQLITE3_NUM);}function
fetch_field(){$J=$this->_offset++;$y=$this->_result->columnType($J);return(object)array("name"=>$this->_result->columnName($J),"type"=>$y,"charsetnr"=>($y==SQLITE3_BLOB?63:0),);}function
__desctruct(){return$this->_result->finalize();}}}}elseif(extension_loaded("pdo_sqlite")){class
Min_SQLite
extends
Min_PDO{var$extension="PDO_SQLite";function
Min_SQLite($Z){$this->dsn(DRIVER.":$Z","","");}}}class
Min_DB
extends
Min_SQLite{function
Min_DB(){$this->Min_SQLite(":memory:");}function
select_db($Z){if(is_readable($Z)&&$this->query("ATTACH ".$this->quote(ereg("(^[/\\]|:)",$Z)?$Z:dirname($_SERVER["SCRIPT_FILENAME"])."/$Z")." AS a")){$this->Min_SQLite($Z);return
true;}return
false;}function
multi_query($j){return$this->_result=$this->query($j);}function
next_result(){return
false;}}function
idf_escape($Q){return'"'.str_replace('"','""',$Q).'"';}function
table($Q){return
idf_escape($Q);}function
connect(){return
new
Min_DB;}function
get_databases(){return
array();}function
limit($j,$t,$M,$N=0,$Pa=" "){return" $j$t".(isset($M)?$Pa."LIMIT $M".($N?" OFFSET $N":""):"");}function
limit1($j,$t){global$g;return($g->result("SELECT sqlite_compileoption_used('ENABLE_UPDATE_DELETE_LIMIT')")?limit($j,$t,1):" $j$t");}function
db_collation($s,$W){global$g;return$g->result("PRAGMA encoding");}function
engines(){return
array();}function
logged_user(){return
get_current_user();}function
tables_list(){return
get_key_vals("SELECT name, type FROM sqlite_master WHERE type IN ('table', 'view') ORDER BY (name = 'sqlite_sequence'), name",1);}function
count_tables($z){return
array();}function
table_status($f=""){$d=array();foreach(get_rows("SELECT name AS Name, type AS Engine FROM sqlite_master WHERE type IN ('table', 'view')".($f!=""?" AND name = ".q($f):""))as$a){$a["Auto_increment"]="";$d[$a["Name"]]=$a;}foreach(get_rows("SELECT * FROM sqlite_sequence",null,"")as$a){$d[$a["name"]]["Auto_increment"]=$a["seq"];}return($f!=""?$d[$f]:$d);}function
is_view($I){return$I["Engine"]=="view";}function
fk_support($I){global$g;return!$g->result("SELECT sqlite_compileoption_used('OMIT_FOREIGN_KEY')");}function
fields($h,$tc=false){$d=array();foreach(get_rows("PRAGMA table_info(".table($h).")")as$a){$y=strtolower($a["type"]);$va=$a["dflt_value"];$d[$a["name"]]=array("field"=>$a["name"],"type"=>(eregi("int",$y)?"integer":(eregi("char|clob|text",$y)?"text":(eregi("blob",$y)?"blob":(eregi("real|floa|doub",$y)?"real":"numeric")))),"full_type"=>$y,"default"=>(ereg("'(.*)'",$va,$l)?str_replace("''","'",$l[1]):($va=="NULL"?null:$va)),"null"=>!$a["notnull"],"auto_increment"=>eregi('^integer$',$y)&&$a["pk"],"privileges"=>array("select"=>1,"insert"=>1,"update"=>1),"primary"=>$a["pk"],);}return$d;}function
indexes($h,$H=null){$d=array();$Ia=array();foreach(fields($h)as$c){if($c["primary"]){$Ia[]=$c["field"];}}if($Ia){$d[""]=array("type"=>"PRIMARY","columns"=>$Ia,"lengths"=>array());}foreach(get_rows("PRAGMA index_list(".table($h).")")as$a){$d[$a["name"]]["type"]=($a["unique"]?"UNIQUE":"INDEX");$d[$a["name"]]["lengths"]=array();foreach(get_rows("PRAGMA index_info(".idf_escape($a["name"]).")")as$Pc){$d[$a["name"]]["columns"][]=$Pc["name"];}}return$d;}function
foreign_keys($h){$d=array();foreach(get_rows("PRAGMA foreign_key_list(".table($h).")")as$a){$B=&$d[$a["id"]];if(!$B){$B=$a;}$B["source"][]=$a["from"];$B["target"][]=$a["to"];}return$d;}function
view($f){global$g;return
array("select"=>preg_replace('~^(?:[^`"[]+|`[^`]*`|"[^"]*")* AS\\s+~iU','',$g->result("SELECT sql FROM sqlite_master WHERE name = ".q($f))));}function
collations(){return(isset($_GET["create"])?get_vals("PRAGMA collation_list",1):array());}function
information_schema($s){return
false;}function
error(){global$g;return
h($g->error);}function
exact_value($b){return
q($b);}function
check_sqlite_name($f){global$g;$re="db|sdb|sqlite";if(!preg_match("~^[^\\0]*\\.($re)\$~",$f)){$g->error=sprintf('Please use one of the extensions %s.',str_replace("|",", ",$re));return
false;}return
true;}function
create_database($s,$S){global$g;if(file_exists($s)){$g->error='File exists.';return
false;}if(!check_sqlite_name($s)){return
false;}$x=new
Min_SQLite($s);$x->query('PRAGMA encoding = "UTF-8"');$x->query('CREATE TABLE adminer (i)');$x->query('DROP TABLE adminer');return
true;}function
drop_databases($z){global$g;$g->Min_SQLite(":memory:");foreach($z
as$s){if(!@unlink($s)){$g->error='File exists.';return
false;}}return
true;}function
rename_database($f,$S){global$g;if(!check_sqlite_name($f)){return
false;}$g->Min_SQLite(":memory:");$g->error='File exists.';return@rename(DB,$f);}function
auto_increment(){return" PRIMARY KEY".(DRIVER=="sqlite"?" AUTOINCREMENT":"");}function
alter_table($h,$f,$o,$db,$ua,$tb,$S,$Na,$pb){$u=array();foreach($o
as$c){if($c[1]){$u[]=($h!=""&&$c[0]==""?"ADD ":"  ").implode($c[1]);}}$u=array_merge($u,$db);if($h!=""){foreach($u
as$b){if(!queries("ALTER TABLE ".table($h)." $b")){return
false;}}if($h!=$f&&!queries("ALTER TABLE ".table($h)." RENAME TO ".table($f))){return
false;}}elseif(!queries("CREATE TABLE ".table($f)." (\n".implode(",\n",$u)."\n)")){return
false;}if($Na){queries("UPDATE sqlite_sequence SET seq = $Na WHERE name = ".q($f));}return
true;}function
alter_indexes($h,$u){foreach($u
as$b){if(!queries(($b[2]?"DROP INDEX":"CREATE".($b[0]!="INDEX"?" UNIQUE":"")." INDEX ".idf_escape(uniqid($h."_"))." ON ".table($h))." $b[1]")){return
false;}}return
true;}function
truncate_tables($D){return
apply_queries("DELETE FROM",$D);}function
drop_views($aa){return
apply_queries("DROP VIEW",$aa);}function
drop_tables($D){return
apply_queries("DROP TABLE",$D);}function
move_tables($D,$aa,$pa){return
false;}function
trigger($f){global$g;preg_match('~^CREATE\\s+TRIGGER\\s*(?:[^`"\\s]+|`[^`]*`|"[^"]*")+\\s*([a-z]+)\\s+([a-z]+)\\s+ON\\s*(?:[^`"\\s]+|`[^`]*`|"[^"]*")+\\s*(?:FOR\\s*EACH\\s*ROW\\s)?(.*)~is',$g->result("SELECT sql FROM sqlite_master WHERE name = ".q($f)),$l);return
array("Timing"=>strtoupper($l[1]),"Event"=>strtoupper($l[2]),"Trigger"=>$f,"Statement"=>$l[3]);}function
triggers($h){$d=array();foreach(get_rows("SELECT * FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($h))as$a){preg_match('~^CREATE\\s+TRIGGER\\s*(?:[^`"\\s]+|`[^`]*`|"[^"]*")+\\s*([a-z]+)\\s*([a-z]+)~i',$a["sql"],$l);$d[$a["name"]]=array($l[1],$l[2]);}return$d;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER","INSTEAD OF"),"Type"=>array("FOR EACH ROW"),);}function
routine($f,$y){}function
routines(){}function
begin(){return
queries("BEGIN");}function
insert_into($h,$q){return
queries("INSERT INTO ".table($h).($q?" (".implode(", ",array_keys($q)).")\nVALUES (".implode(", ",$q).")":"DEFAULT VALUES"));}function
insert_update($h,$q,$Ia){return
queries("REPLACE INTO ".table($h)." (".implode(", ",array_keys($q)).") VALUES (".implode(", ",$q).")");}function
last_id(){global$g;return$g->result("SELECT LAST_INSERT_ROWID()");}function
explain($g,$j){return$g->query("EXPLAIN $j");}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($fd){return
true;}function
create_sql($h,$Na){global$g;return$g->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($h));}function
truncate_sql($h){return"DELETE FROM ".table($h);}function
use_sql($ea){}function
trigger_sql($h,$X){return
implode(get_vals("SELECT sql || ';;\n' FROM sqlite_master WHERE type = 'trigger' AND name = ".q($h)));}function
show_variables(){global$g;$d=array();foreach(array("auto_vacuum","cache_size","count_changes","default_cache_size","empty_result_callbacks","encoding","foreign_keys","full_column_names","fullfsync","journal_mode","journal_size_limit","legacy_file_format","locking_mode","page_size","max_page_count","read_uncommitted","recursive_triggers","reverse_unordered_selects","secure_delete","short_column_names","synchronous","temp_store","temp_store_directory","schema_version","integrity_check","quick_check")as$e){$d[$e]=$g->result("PRAGMA $e");}return$d;}function
show_status(){$d=array();foreach(get_vals("PRAGMA compile_options")as$kf){list($e,$b)=explode("=",$kf,2);$d[$e]=$b;}return$d;}function
support($ob){return
ereg('^(view|trigger|variables|status|dump)$',$ob);}$_="sqlite";$T=array("integer"=>0,"real"=>0,"numeric"=>0,"text"=>0,"blob"=>0);$Oa=array_keys($T);$nb=array();$Nb=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$V=array("hex","length","lower","round","unixepoch","upper");$qb=array("avg","count","count distinct","group_concat","max","min","sum");$Vb=array(array(),array("integer|real|numeric"=>"+/-","text"=>"||",));}$Ha[]="PgSQL";$Ha[]="PDO_PgSQL";if(extension_loaded("pgsql")||extension_loaded("pdo_pgsql")){$ja["pgsql"]="PostgreSQL";}if(isset($_GET["pgsql"])){define("DRIVER","pgsql");if(extension_loaded("pgsql")){class
Min_DB{var$extension="PgSQL",$_link,$_result,$_string,$_database=true,$server_info,$affected_rows,$error;function
_error($xf,$n){if(ini_bool("html_errors")){$n=html_entity_decode(strip_tags($n));}$n=ereg_replace('^[^:]*: ','',$n);$this->error=$n;}function
connect($E,$P,$R){set_error_handler(array($this,'_error'));$this->_string="host='".str_replace(":","' port='",addcslashes($E,"'\\"))."' user='".addcslashes($P,"'\\")."' password='".addcslashes($R,"'\\")."'";$this->_link=@pg_connect($this->_string.(DB!=""?" dbname='".addcslashes(DB,"'\\")."'":" dbname='template1'"),PGSQL_CONNECT_FORCE_NEW);if(!$this->_link&&DB!=""){$this->_database=false;$this->_link=@pg_connect("$this->_string dbname='template1'",PGSQL_CONNECT_FORCE_NEW);}restore_error_handler();if($this->_link){$nd=pg_version($this->_link);$this->server_info=$nd["server"];pg_set_client_encoding($this->_link,"UTF8");}return(bool)$this->_link;}function
quote($G){return"'".pg_escape_string($this->_link,$G)."'";}function
select_db($ea){if($ea==DB){return$this->_database;}$d=@pg_connect("$this->_string dbname='".addcslashes($ea,"'\\")."'",PGSQL_CONNECT_FORCE_NEW);if($d){$this->_link=$d;}return$d;}function
close(){$this->_link=@pg_connect("$this->_string dbname='template1'");}function
query($j,$Wa=false){$i=@pg_query($this->_link,$j);if(!$i){$this->error=pg_last_error($this->_link);return
false;}elseif(!pg_num_fields($i)){$this->affected_rows=pg_affected_rows($i);return
true;}return
new
Min_Result($i);}function
multi_query($j){return$this->_result=$this->query($j);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($j,$c=0){$i=$this->query($j);if(!$i){return
false;}return
pg_fetch_result($i->_result,0,$c);}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
Min_Result($i){$this->_result=$i;$this->num_rows=pg_num_rows($i);}function
fetch_assoc(){return
pg_fetch_assoc($this->_result);}function
fetch_row(){return
pg_fetch_row($this->_result);}function
fetch_field(){$J=$this->_offset++;$d=new
stdClass;if(function_exists('pg_field_table')){$d->orgtable=pg_field_table($this->_result,$J);}$d->name=pg_field_name($this->_result,$J);$d->orgname=$d->name;$d->type=pg_field_type($this->_result,$J);$d->charsetnr=($d->type=="bytea"?63:0);return$d;}function
__destruct(){pg_free_result($this->_result);}}}elseif(extension_loaded("pdo_pgsql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_PgSQL";function
connect($E,$P,$R){$G="pgsql:host='".str_replace(":","' port='",addcslashes($E,"'\\"))."' options='-c client_encoding=utf8'";$this->dsn($G.(DB!=""?" dbname='".addcslashes(DB,"'\\")."'":""),$P,$R);return
true;}function
select_db($ea){return(DB==$ea);}function
close(){}}}function
idf_escape($Q){return'"'.str_replace('"','""',$Q).'"';}function
table($Q){return
idf_escape($Q);}function
connect(){global$r;$g=new
Min_DB;$xa=$r->credentials();if($g->connect($xa[0],$xa[1],$xa[2])){return$g;}return$g->error;}function
get_databases(){return
get_vals("SELECT datname FROM pg_database");}function
limit($j,$t,$M,$N=0,$Pa=" "){return" $j$t".(isset($M)?$Pa."LIMIT $M".($N?" OFFSET $N":""):"");}function
limit1($j,$t){return" $j$t";}function
db_collation($s,$W){global$g;return$g->result("SHOW LC_COLLATE");}function
engines(){return
array();}function
logged_user(){global$g;return$g->result("SELECT user");}function
tables_list(){return
get_key_vals("SELECT table_name, table_type FROM information_schema.tables WHERE table_schema = current_schema() ORDER BY table_name");}function
count_tables($z){return
array();}function
table_status($f=""){$d=array();foreach(get_rows("SELECT relname AS \"Name\", CASE relkind WHEN 'r' THEN '' ELSE 'view' END AS \"Engine\", pg_relation_size(oid) AS \"Data_length\", pg_total_relation_size(oid) - pg_relation_size(oid) AS \"Index_length\", obj_description(oid, 'pg_class') AS \"Comment\"
FROM pg_class
WHERE relkind IN ('r','v')
AND relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema())".($f!=""?" AND relname = ".q($f):""))as$a){$d[$a["Name"]]=$a;}return($f!=""?$d[$f]:$d);}function
is_view($I){return$I["Engine"]=="view";}function
fk_support($I){return
true;}function
fields($h,$tc=false){$d=array();foreach(get_rows("SELECT a.attname AS field, format_type(a.atttypid, a.atttypmod) AS full_type, d.adsrc AS default, a.attnotnull, col_description(c.oid, a.attnum) AS comment
FROM pg_class c
JOIN pg_namespace n ON c.relnamespace = n.oid
JOIN pg_attribute a ON c.oid = a.attrelid
LEFT JOIN pg_attrdef d ON c.oid = d.adrelid AND a.attnum = d.adnum
WHERE c.relname = ".q($h)."
AND n.nspname = current_schema()
AND NOT a.attisdropped
".($tc?"":"AND a.attnum > 0")."
ORDER BY a.attnum < 0, a.attnum")as$a){ereg('(.*)(\\((.*)\\))?',$a["full_type"],$l);list(,$a["type"],,$a["length"])=$l;$a["full_type"]=$a["type"].($a["length"]?"($a[length])":"");$a["null"]=($a["attnotnull"]=="f");$a["auto_increment"]=eregi("^nextval\\(",$a["default"]);$a["privileges"]=array("insert"=>1,"select"=>1,"update"=>1);$d[$a["field"]]=$a;}return$d;}function
indexes($h,$H=null){global$g;if(!is_object($H)){$H=$g;}$d=array();$le=$H->result("SELECT oid FROM pg_class WHERE relname = ".q($h));$A=get_key_vals("SELECT attnum, attname FROM pg_attribute WHERE attrelid = $le AND attnum > 0",$H);foreach(get_rows("SELECT relname, indisunique, indisprimary, indkey FROM pg_index i, pg_class ci WHERE i.indrelid = $le AND ci.oid = i.indexrelid",$H)as$a){$d[$a["relname"]]["type"]=($a["indisprimary"]=="t"?"PRIMARY":($a["indisunique"]=="t"?"UNIQUE":"INDEX"));$d[$a["relname"]]["columns"]=array();foreach(explode(" ",$a["indkey"])as$_f){$d[$a["relname"]]["columns"][]=$A[$_f];}$d[$a["relname"]]["lengths"]=array();}return$d;}function
foreign_keys($h){$d=array();foreach(get_rows("SELECT tc.constraint_name, kcu.column_name, rc.update_rule AS on_update, rc.delete_rule AS on_delete, ccu.table_name AS table, ccu.column_name AS ref
FROM information_schema.table_constraints tc
LEFT JOIN information_schema.key_column_usage kcu USING (constraint_catalog, constraint_schema, constraint_name)
LEFT JOIN information_schema.referential_constraints rc USING (constraint_catalog, constraint_schema, constraint_name)
LEFT JOIN information_schema.constraint_column_usage ccu ON rc.unique_constraint_catalog = ccu.constraint_catalog AND rc.unique_constraint_schema = ccu.constraint_schema AND rc.unique_constraint_name = ccu.constraint_name
WHERE tc.constraint_type = 'FOREIGN KEY' AND tc.table_name = ".q($h))as$a){$B=&$d[$a["constraint_name"]];if(!$B){$B=$a;}$B["source"][]=$a["column_name"];$B["target"][]=$a["ref"];}return$d;}function
view($f){global$g;return
array("select"=>$g->result("SELECT pg_get_viewdef(".q($f).")"));}function
collations(){return
array();}function
information_schema($s){return($s=="information_schema");}function
error(){global$g;$d=h($g->error);if(preg_match('~^(.*\\n)?([^\\n]*)\\n( *)\\^(\\n.*)?$~s',$d,$l)){$d=$l[1].preg_replace('~((?:[^&]|&[^;]*;){'.strlen($l[3]).'})(.*)~','\\1<b>\\2</b>',$l[2]).$l[4];}return
nl_br($d);}function
exact_value($b){return
q($b);}function
create_database($s,$S){return
queries("CREATE DATABASE ".idf_escape($s).($S?" ENCODING ".idf_escape($S):""));}function
drop_databases($z){global$g;$g->close();return
apply_queries("DROP DATABASE",$z,'idf_escape');}function
rename_database($f,$S){return
queries("ALTER DATABASE ".idf_escape(DB)." RENAME TO ".idf_escape($f));}function
auto_increment(){return"";}function
alter_table($h,$f,$o,$db,$ua,$tb,$S,$Na,$pb){$u=array();$hb=array();foreach($o
as$c){$J=idf_escape($c[0]);$b=$c[1];if(!$b){$u[]="DROP $J";}else{$td=$b[5];unset($b[5]);if(isset($b[6])&&$c[0]==""){$b[1]=($b[1]=="bigint"?" big":" ")."serial";}if($c[0]==""){$u[]=($h!=""?"ADD ":"  ").implode($b);}else{if($J!=$b[0]){$hb[]="ALTER TABLE ".table($h)." RENAME $J TO $b[0]";}$u[]="ALTER $J TYPE$b[1]";if(!$b[6]){$u[]="ALTER $J ".($b[3]?"SET$b[3]":"DROP DEFAULT");$u[]="ALTER $J ".($b[2]==" NULL"?"DROP NOT":"SET").$b[2];}}if($c[0]!=""||$td!=""){$hb[]="COMMENT ON COLUMN ".table($h).".$b[0] IS ".($td!=""?substr($td,9):"''");}}}$u=array_merge($u,$db);if($h==""){array_unshift($hb,"CREATE TABLE ".table($f)." (\n".implode(",\n",$u)."\n)");}elseif($u){array_unshift($hb,"ALTER TABLE ".table($h)."\n".implode(",\n",$u));}if($h!=""&&$h!=$f){$hb[]="ALTER TABLE ".table($h)." RENAME TO ".table($f);}if($h!=""||$ua!=""){$hb[]="COMMENT ON TABLE ".table($f)." IS ".q($ua);}if($Na!=""){}foreach($hb
as$j){if(!queries($j)){return
false;}}return
true;}function
alter_indexes($h,$u){$fa=array();$Fa=array();foreach($u
as$b){if($b[0]!="INDEX"){$fa[]=($b[2]?"\nDROP CONSTRAINT ":"\nADD $b[0] ".($b[0]=="PRIMARY"?"KEY ":"")).$b[1];}elseif($b[2]){$Fa[]=$b[1];}elseif(!queries("CREATE INDEX ".idf_escape(uniqid($h."_"))." ON ".table($h)." $b[1]")){return
false;}}return((!$fa||queries("ALTER TABLE ".table($h).implode(",",$fa)))&&(!$Fa||queries("DROP INDEX ".implode(", ",$Fa))));}function
truncate_tables($D){return
queries("TRUNCATE ".implode(", ",array_map('table',$D)));return
true;}function
drop_views($aa){return
queries("DROP VIEW ".implode(", ",array_map('table',$aa)));}function
drop_tables($D){return
queries("DROP TABLE ".implode(", ",array_map('table',$D)));}function
move_tables($D,$aa,$pa){foreach($D
as$h){if(!queries("ALTER TABLE ".table($h)." SET SCHEMA ".idf_escape($pa))){return
false;}}foreach($aa
as$h){if(!queries("ALTER VIEW ".table($h)." SET SCHEMA ".idf_escape($pa))){return
false;}}return
true;}function
trigger($f){$F=get_rows('SELECT trigger_name AS "Trigger", condition_timing AS "Timing", event_manipulation AS "Event", \'FOR EACH \' || action_orientation AS "Type", action_statement AS "Statement" FROM information_schema.triggers WHERE event_object_table = '.q($_GET["trigger"]).' AND trigger_name = '.q($f));return
reset($F);}function
triggers($h){$d=array();foreach(get_rows("SELECT * FROM information_schema.triggers WHERE event_object_table = ".q($h))as$a){$d[$a["trigger_name"]]=array($a["condition_timing"],$a["event_manipulation"]);}return$d;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Type"=>array("FOR EACH ROW","FOR EACH STATEMENT"),);}function
begin(){return
queries("BEGIN");}function
insert_into($h,$q){return
queries("INSERT INTO ".table($h).($q?" (".implode(", ",array_keys($q)).")\nVALUES (".implode(", ",$q).")":"DEFAULT VALUES"));}function
insert_update($h,$q,$Ia){global$g;$na=array();$t=array();foreach($q
as$e=>$b){$na[]="$e = $b";if(isset($Ia[idf_unescape($e)])){$t[]="$e = $b";}}return($t&&queries("UPDATE ".table($h)." SET ".implode(", ",$na)." WHERE ".implode(" AND ",$t))&&$g->affected_rows)||queries("INSERT INTO ".table($h)." (".implode(", ",array_keys($q)).") VALUES (".implode(", ",$q).")");}function
last_id(){return
0;}function
explain($g,$j){return$g->query("EXPLAIN $j");}function
types(){return
get_vals("SELECT typname
FROM pg_type
WHERE typnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema())
AND typtype IN ('b','d','e')
AND typelem = 0");}function
schemas(){return
get_vals("SELECT nspname FROM pg_namespace");}function
get_schema(){global$g;return$g->result("SELECT current_schema()");}function
set_schema($Ja){global$g,$T,$Oa;$d=$g->query("SET search_path TO ".idf_escape($Ja));foreach(types()as$y){if(!isset($T[$y])){$T[$y]=0;$Oa['User types'][]=$y;}}return$d;}function
use_sql($ea){return"\connect ".idf_escape($ea);}function
show_variables(){return
get_key_vals("SHOW ALL");}function
show_status(){}function
support($ob){return
ereg('^(comment|view|scheme|sequence|trigger|type|variables|drop_col)$',$ob);}$_="pgsql";$T=array();$Oa=array();foreach(array('Numbers'=>array("smallint"=>5,"integer"=>10,"bigint"=>19,"boolean"=>1,"numeric"=>0,"real"=>7,"double precision"=>16,"money"=>20),'Date and time'=>array("date"=>13,"time"=>17,"timestamp"=>20,"interval"=>0),'Strings'=>array("character"=>0,"character varying"=>0,"text"=>0,"tsquery"=>0,"tsvector"=>0,"uuid"=>0,"xml"=>0),'Binary'=>array("bit"=>0,"bit varying"=>0,"bytea"=>0),'Network'=>array("cidr"=>43,"inet"=>43,"macaddr"=>17,"txid_snapshot"=>0),'Geometry'=>array("box"=>0,"circle"=>0,"line"=>0,"lseg"=>0,"path"=>0,"point"=>0,"polygon"=>0),)as$e=>$b){$T+=$b;$Oa[$e]=array_keys($b);}$nb=array();$Nb=array("=","<",">","<=",">=","!=","~","!~","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$V=array("char_length","lower","round","to_hex","to_timestamp","upper");$qb=array("avg","count","count distinct","max","min","sum");$Vb=array(array("char"=>"md5","date|time"=>"now",),array("int|numeric|real|money"=>"+/-","date|time"=>"+ interval/- interval","char|text"=>"||",));}$Ha[]="OCI8";$Ha[]="PDO_OCI";if(extension_loaded("oci8")||extension_loaded("pdo_oci")){$ja["oracle"]="Oracle";}if(isset($_GET["oracle"])){define("DRIVER","oracle");if(extension_loaded("oci8")){class
Min_DB{var$extension="oci8",$_link,$_result,$server_info,$affected_rows,$error;function
_error($xf,$n){if(ini_bool("html_errors")){$n=html_entity_decode(strip_tags($n));}$n=ereg_replace('^[^:]*: ','',$n);$this->error=$n;}function
connect($E,$P,$R){$this->_link=@oci_new_connect($P,$R,$E);if($this->_link){$this->server_info=oci_server_version($this->_link);return
true;}$n=oci_error();$this->error=$n["message"];return
false;}function
quote($G){return"'".str_replace("'","''",$G)."'";}function
select_db($ea){return
true;}function
query($j,$Wa=false){$i=oci_parse($this->_link,$j);if(!$i){$n=oci_error($this->_link);$this->error=$n["message"];return
false;}set_error_handler(array($this,'_error'));$d=@oci_execute($i);restore_error_handler();if($d){if(oci_num_fields($i)){return
new
Min_Result($i);}$this->affected_rows=oci_num_rows($i);}return$d;}function
multi_query($j){return$this->_result=$this->query($j);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($j,$c=1){$i=$this->query($j);if(!is_object($i)||!oci_fetch($i->_result)){return
false;}return
oci_result($i->_result,$c);}}class
Min_Result{var$_result,$_offset=1,$num_rows;function
Min_Result($i){$this->_result=$i;}function
_convert($a){foreach((array)$a
as$e=>$b){if(is_a($b,'OCI-Lob')){$a[$e]=$b->load();}}return$a;}function
fetch_assoc(){return$this->_convert(oci_fetch_assoc($this->_result));}function
fetch_row(){return$this->_convert(oci_fetch_row($this->_result));}function
fetch_field(){$J=$this->_offset++;$d=new
stdClass;$d->name=oci_field_name($this->_result,$J);$d->orgname=$d->name;$d->type=oci_field_type($this->_result,$J);$d->charsetnr=(ereg("raw|blob|bfile",$d->type)?63:0);return$d;}function
__destruct(){oci_free_statement($this->_result);}}}elseif(extension_loaded("pdo_oci")){class
Min_DB
extends
Min_PDO{var$extension="PDO_OCI";function
connect($E,$P,$R){}function
select_db($ea){}}}function
idf_escape($Q){return'"'.str_replace('"','""',$Q).'"';}function
table($Q){return
idf_escape($Q);}function
connect(){global$r;$g=new
Min_DB;$xa=$r->credentials();if($g->connect($xa[0],$xa[1],$xa[2])){return$g;}return$g->error;}function
get_databases(){return
get_vals("SELECT tablespace_name FROM user_tablespaces");}function
limit($j,$t,$M,$N=0,$Pa=" "){return" $j$t".(isset($M)?($t?" AND":$Pa."WHERE").($N?" rownum > $N AND":"")." rownum <= ".($M+$N):"");}function
limit1($j,$t){return" $j$t";}function
db_collation($s,$W){global$g;return$g->result("SELECT value FROM nls_database_parameters WHERE parameter = 'NLS_CHARACTERSET'");}function
engines(){return
array();}function
logged_user(){global$g;return$g->result("SELECT USER FROM DUAL");}function
tables_list(){return
get_key_vals("SELECT table_name, 'table' FROM all_tables WHERE tablespace_name = ".q(DB)."
UNION SELECT view_name, 'view' FROM user_views");}function
count_tables($z){return
array();}function
table_status($f=""){$d=array();$ke=q($f);foreach(get_rows('SELECT table_name "Name", \'table\' "Engine" FROM all_tables WHERE tablespace_name = '.q(DB).($f!=""?" AND table_name = $ke":"")."
UNION SELECT view_name, 'view' FROM user_views".($f!=""?" WHERE view_name = $ke":""))as$a){if($f!=""){return$a;}$d[$a["Name"]]=$a;}return$d;}function
is_view($I){return$I["Engine"]=="view";}function
fk_support($I){return
true;}function
fields($h,$tc=false){$d=array();foreach(get_rows("SELECT * FROM all_tab_columns WHERE table_name = ".q($h)." ORDER BY column_id")as$a){$y=$a["DATA_TYPE"];$da="$a[DATA_PRECISION],$a[DATA_SCALE]";if($da==","){$da=$a["DATA_LENGTH"];}$d[$a["COLUMN_NAME"]]=array("field"=>$a["COLUMN_NAME"],"full_type"=>$y.($da?"($da)":""),"type"=>strtolower($y),"length"=>$da,"default"=>$a["DATA_DEFAULT"],"null"=>($a["NULLABLE"]=="Y"),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);}return$d;}function
indexes($h,$H=null){return
array();}function
view($f){$F=get_rows('SELECT text "select" FROM user_views WHERE view_name = '.q($f));return
reset($F);}function
collations(){return
array();}function
information_schema($s){return
false;}function
error(){global$g;return
h($g->error);}function
exact_value($b){return
q($b);}function
explain($g,$j){$g->query("EXPLAIN PLAN FOR $j");return$g->query("SELECT * FROM plan_table");}function
alter_table($h,$f,$o,$db,$ua,$tb,$S,$Na,$pb){$u=$Fa=array();foreach($o
as$c){$b=$c[1];if($b&&$c[0]!=""&&idf_escape($c[0])!=$b[0]){queries("ALTER TABLE ".table($h)." RENAME COLUMN ".idf_escape($c[0])." TO $b[0]");}if($b){$u[]=($h!=""?($c[0]!=""?"MODIFY (":"ADD ("):"  ").implode($b).($h!=""?")":"");}else{$Fa[]=idf_escape($c[0]);}}if($h==""){return
queries("CREATE TABLE ".table($f)." (\n".implode(",\n",$u)."\n)");}return(!$u||queries("ALTER TABLE ".table($h)."\n".implode("\n",$u)))&&(!$Fa||queries("ALTER TABLE ".table($h)." DROP (".implode(", ",$Fa).")"))&&($h==$f||queries("ALTER TABLE ".table($h)." RENAME TO ".table($f)));}function
foreign_keys($h){return
array();}function
truncate_tables($D){return
apply_queries("TRUNCATE TABLE",$D);}function
drop_views($aa){return
apply_queries("DROP VIEW",$aa);}function
drop_tables($D){return
apply_queries("DROP TABLE",$D);}function
begin(){return
true;}function
insert_into($h,$q){return
queries("INSERT INTO ".table($h)." (".implode(", ",array_keys($q)).")\nVALUES (".implode(", ",$q).")");}function
last_id(){return
0;}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($fd){return
true;}function
show_variables(){return
get_key_vals('SELECT name, display_value FROM v$parameter');}function
show_status(){$F=get_rows('SELECT * FROM v$instance');return
reset($F);}function
support($ob){return
ereg("view|drop_col|variables|status",$ob);}$_="oracle";$T=array();$Oa=array();foreach(array('Numbers'=>array("number"=>38,"binary_float"=>12,"binary_double"=>21),'Date and time'=>array("date"=>10,"timestamp"=>29,"interval year"=>12,"interval day"=>28),'Strings'=>array("char"=>2000,"varchar2"=>4000,"nchar"=>2000,"nvarchar2"=>4000,"clob"=>4294967295,"nclob"=>4294967295),'Binary'=>array("raw"=>2000,"long raw"=>2147483648,"blob"=>4294967295,"bfile"=>4294967296),)as$e=>$b){$T+=$b;$Oa[$e]=array_keys($b);}$nb=array();$Nb=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL");$V=array("length","lower","round","upper");$qb=array("avg","count","count distinct","max","min","sum");$Vb=array(array("date"=>"current_date","timestamp"=>"current_timestamp",),array("number|float|double"=>"+/-","date|timestamp"=>"+ interval/- interval","char|clob"=>"||",));}$Ha[]="SQLSRV";$Ha[]="MSSQL";if(extension_loaded("sqlsrv")||extension_loaded("mssql")){$ja["mssql"]="MS SQL";}if(isset($_GET["mssql"])){define("DRIVER","mssql");if(extension_loaded("sqlsrv")){class
Min_DB{var$extension="sqlsrv",$_link,$_result,$server_info,$affected_rows,$error;function
_get_error(){$this->error="";foreach(sqlsrv_errors()as$n){$this->error.="$n[message]\n";}$this->error=rtrim($this->error);}function
connect($E,$P,$R){$this->_link=@sqlsrv_connect($E,array("UID"=>$P,"PWD"=>$R));if($this->_link){$Bf=sqlsrv_server_info($this->_link);$this->server_info=$Bf['SQLServerVersion'];}else{$this->_get_error();}return(bool)$this->_link;}function
quote($G){return"'".str_replace("'","''",$G)."'";}function
select_db($ea){return$this->query("USE $ea");}function
query($j,$Wa=false){$i=sqlsrv_query($this->_link,$j);if(!$i){$this->_get_error();return
false;}return$this->store_result($i);}function
multi_query($j){$this->_result=sqlsrv_query($this->_link,$j);if(!$this->_result){$this->_get_error();return
false;}return
true;}function
store_result($i=null){if(!$i){$i=$this->_result;}if(sqlsrv_field_metadata($i)){return
new
Min_Result($i);}$this->affected_rows=sqlsrv_rows_affected($i);return
true;}function
next_result(){return
sqlsrv_next_result($this->_result);}function
result($j,$c=0){$i=$this->query($j);if(!is_object($i)){return
false;}$a=$i->fetch_row();return$a[$c];}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
Min_Result($i){$this->_result=$i;}function
_convert($a){foreach((array)$a
as$e=>$b){if(is_a($b,'DateTime')){$a[$e]=$b->format("Y-m-d H:i:s");}}return$a;}function
fetch_assoc(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_ASSOC,SQLSRV_SCROLL_NEXT));}function
fetch_row(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_NUMERIC,SQLSRV_SCROLL_NEXT));}function
fetch_field(){if(!$this->_fields){$this->_fields=sqlsrv_field_metadata($this->_result);}$c=$this->_fields[$this->_offset++];$d=new
stdClass;$d->name=$c["Name"];$d->orgname=$c["Name"];$d->type=($c["Type"]==1?254:0);return$d;}function
seek($N){for($k=0;$k<$N;$k++){sqlsrv_fetch($this->_result);}}function
__destruct(){sqlsrv_free_stmt($this->_result);}}}elseif(extension_loaded("mssql")){class
Min_DB{var$extension="MSSQL",$_link,$_result,$server_info,$affected_rows,$error;function
connect($E,$P,$R){$this->_link=@mssql_connect($E,$P,$R);if($this->_link){$i=$this->query("SELECT SERVERPROPERTY('ProductLevel'), SERVERPROPERTY('Edition')");$a=$i->fetch_row();$this->server_info=$this->result("sp_server_info 2",2)." [$a[0]] $a[1]";}else{$this->error=mssql_get_last_message();}return(bool)$this->_link;}function
quote($G){return"'".str_replace("'","''",$G)."'";}function
select_db($ea){return
mssql_select_db($ea);}function
query($j,$Wa=false){$i=mssql_query($j,$this->_link);if(!$i){$this->error=mssql_get_last_message();return
false;}if($i===true){$this->affected_rows=mssql_rows_affected($this->_link);return
true;}return
new
Min_Result($i);}function
multi_query($j){return$this->_result=$this->query($j);}function
store_result(){return$this->_result;}function
next_result(){return
mssql_next_result($this->_result);}function
result($j,$c=0){$i=$this->query($j);if(!is_object($i)){return
false;}return
mssql_result($i->_result,0,$c);}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
Min_Result($i){$this->_result=$i;$this->num_rows=mssql_num_rows($i);}function
fetch_assoc(){return
mssql_fetch_assoc($this->_result);}function
fetch_row(){return
mssql_fetch_row($this->_result);}function
num_rows(){return
mssql_num_rows($this->_result);}function
fetch_field(){$d=mssql_fetch_field($this->_result);$d->orgtable=$d->table;$d->orgname=$d->name;return$d;}function
seek($N){mssql_data_seek($this->_result,$N);}function
__destruct(){mssql_free_result($this->_result);}}}function
idf_escape($Q){return"[".str_replace("]","]]",$Q)."]";}function
table($Q){return($_GET["ns"]!=""?idf_escape($_GET["ns"]).".":"").idf_escape($Q);}function
connect(){global$r;$g=new
Min_DB;$xa=$r->credentials();if($g->connect($xa[0],$xa[1],$xa[2])){return$g;}return$g->error;}function
get_databases(){return
get_vals("EXEC sp_databases");}function
limit($j,$t,$M,$N=0,$Pa=" "){return(isset($M)?" TOP (".($M+$N).")":"")." $j$t";}function
limit1($j,$t){return
limit($j,$t,1);}function
db_collation($s,$W){global$g;return$g->result("SELECT collation_name FROM sys.databases WHERE name =  ".q($s));}function
engines(){return
array();}function
logged_user(){global$g;return$g->result("SELECT SUSER_NAME()");}function
tables_list(){return
get_key_vals("SELECT name, type_desc FROM sys.all_objects WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ORDER BY name");}function
count_tables($z){global$g;$d=array();foreach($z
as$s){$g->select_db($s);$d[$s]=$g->result("SELECT COUNT(*) FROM INFORMATION_SCHEMA.TABLES");}return$d;}function
table_status($f=""){$d=array();foreach(get_rows("SELECT name AS Name, type_desc AS Engine FROM sys.all_objects WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V')".($f!=""?" AND name = ".q($f):""))as$a){if($f!=""){return$a;}$d[$a["Name"]]=$a;}return$d;}function
is_view($I){return$I["Engine"]=="VIEW";}function
fk_support($I){return
true;}function
fields($h,$tc=false){$d=array();foreach(get_rows("SELECT c.*, t.name type, d.definition [default]
FROM sys.all_columns c
JOIN sys.all_objects o ON c.object_id = o.object_id
JOIN sys.types t ON c.user_type_id = t.user_type_id
LEFT JOIN sys.default_constraints d ON c.default_object_id = d.parent_column_id
WHERE o.schema_id = SCHEMA_ID(".q(get_schema()).") AND o.type IN ('S', 'U', 'V') AND o.name = ".q($h))as$a){$y=$a["type"];$da=(ereg("char|binary",$y)?$a["max_length"]:($y=="decimal"?"$a[precision],$a[scale]":""));$d[$a["name"]]=array("field"=>$a["name"],"full_type"=>$y.($da?"($da)":""),"type"=>$y,"length"=>$da,"default"=>$a["default"],"null"=>$a["is_nullable"],"auto_increment"=>$a["is_identity"],"collation"=>$a["collation_name"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"primary"=>$a["is_identity"],);}return$d;}function
indexes($h,$H=null){global$g;if(!is_object($H)){$H=$g;}$d=array();foreach(get_rows("SELECT i.name, key_ordinal, is_unique, is_primary_key, c.name AS column_name
FROM sys.indexes i
INNER JOIN sys.index_columns ic ON i.object_id = ic.object_id AND i.index_id = ic.index_id
INNER JOIN sys.columns c ON ic.object_id = c.object_id AND ic.column_id = c.column_id
WHERE OBJECT_NAME(i.object_id) = ".q($h),$H)as$a){$d[$a["name"]]["type"]=($a["is_primary_key"]?"PRIMARY":($a["is_unique"]?"UNIQUE":"INDEX"));$d[$a["name"]]["lengths"]=array();$d[$a["name"]]["columns"][$a["key_ordinal"]]=$a["column_name"];}return$d;}function
view($f){global$g;return
array("select"=>preg_replace('~^(?:[^[]|\\[[^]]*])*\\s+AS\\s+~isU','',$g->result("SELECT VIEW_DEFINITION FROM INFORMATION_SCHEMA.VIEWS WHERE TABLE_SCHEMA = SCHEMA_NAME() AND TABLE_NAME = ".q($f))));}function
collations(){$d=array();foreach(get_vals("SELECT name FROM fn_helpcollations()")as$S){$d[ereg_replace("_.*","",$S)][]=$S;}return$d;}function
information_schema($s){return
false;}function
error(){global$g;return
nl_br(h(preg_replace('~^(\\[[^]]*])+~m','',$g->error)));}function
exact_value($b){return
q($b);}function
create_database($s,$S){return
queries("CREATE DATABASE ".idf_escape($s).(eregi('^[a-z0-9_]+$',$S)?" COLLATE $S":""));}function
drop_databases($z){return
queries("DROP DATABASE ".implode(", ",array_map('idf_escape',$z)));}function
rename_database($f,$S){if(eregi('^[a-z0-9_]+$',$S)){queries("ALTER DATABASE ".idf_escape(DB)." COLLATE $S");}queries("ALTER DATABASE ".idf_escape(DB)." MODIFY NAME = ".idf_escape($f));return
true;}function
auto_increment(){return" IDENTITY".($_POST["Auto_increment"]!=""?"(".preg_replace('~\\D+~','',$_POST["Auto_increment"]).",1)":"");}function
alter_table($h,$f,$o,$db,$ua,$tb,$S,$Na,$pb){$u=array();foreach($o
as$c){$J=idf_escape($c[0]);$b=$c[1];if(!$b){$u["DROP"][]=" COLUMN $c[0]";}else{$b[1]=preg_replace("~( COLLATE )'(\\w+)'~","\\1\\2",$b[1]);if($c[0]==""){$u["ADD"][]="\n  ".implode("",$b);}else{unset($b[6]);if($J!=$b[0]){queries("EXEC sp_rename ".q(table($h).".$J").", ".q(idf_unescape($b[0])).", 'COLUMN'");}$u["ALTER COLUMN ".implode("",$b)][]="";}}}if($h==""){return
queries("CREATE TABLE ".table($f)." (".implode(",",(array)$u["ADD"])."\n)");}if($h!=$f){queries("EXEC sp_rename ".q(table($h)).", ".q($f));}foreach($u
as$e=>$b){if(!queries("ALTER TABLE ".idf_escape($f)." $e".implode(",",$b))){return
false;}}return
true;}function
alter_indexes($h,$u){$v=array();$Fa=array();foreach($u
as$b){if($b[2]){if($b[0]=="PRIMARY"){$Fa[]=$b[1];}else{$v[]="$b[1] ON ".table($h);}}elseif(!queries(($b[0]!="PRIMARY"?"CREATE".($b[0]!="INDEX"?" UNIQUE":"")." INDEX ".idf_escape(uniqid($h."_"))." ON ".table($h):"ALTER TABLE ".table($h)." ADD PRIMARY KEY")." $b[1]")){return
false;}}return(!$v||queries("DROP INDEX ".implode(", ",$v)))&&(!$Fa||queries("ALTER TABLE ".table($h)." DROP ".implode(", ",$Fa)));}function
begin(){return
queries("BEGIN TRANSACTION");}function
insert_into($h,$q){return
queries("INSERT INTO ".table($h).($q?" (".implode(", ",array_keys($q)).")\nVALUES (".implode(", ",$q).")":"DEFAULT VALUES"));}function
insert_update($h,$q,$Ia){$na=array();$t=array();foreach($q
as$e=>$b){$na[]="$e = $b";if(isset($Ia[idf_unescape($e)])){$t[]="$e = $b";}}return
queries("MERGE ".table($h)." USING (VALUES(".implode(", ",$q).")) AS source (c".implode(", c",range(1,count($q))).") ON ".implode(" AND ",$t)." WHEN MATCHED THEN UPDATE SET ".implode(", ",$na)." WHEN NOT MATCHED THEN INSERT (".implode(", ",array_keys($q)).") VALUES (".implode(", ",$q).");");}function
last_id(){global$g;return$g->result("SELECT SCOPE_IDENTITY()");}function
explain($g,$j){$g->query("SET SHOWPLAN_ALL ON");$d=$g->query($j);$g->query("SET SHOWPLAN_ALL OFF");return$d;}function
foreign_keys($h){$d=array();foreach(get_rows("EXEC sp_fkeys @fktable_name = ".q($h))as$a){$B=&$d[$a["FK_NAME"]];$B["table"]=$a["PKTABLE_NAME"];$B["source"][]=$a["FKCOLUMN_NAME"];$B["target"][]=$a["PKCOLUMN_NAME"];}return$d;}function
truncate_tables($D){return
apply_queries("TRUNCATE TABLE",$D);}function
drop_views($aa){return
queries("DROP VIEW ".implode(", ",array_map('table',$aa)));}function
drop_tables($D){return
queries("DROP TABLE ".implode(", ",array_map('table',$D)));}function
move_tables($D,$aa,$pa){return
apply_queries("ALTER SCHEMA ".idf_escape($pa)." TRANSFER",array_merge($D,$aa));}function
trigger($f){$F=get_rows("SELECT s.name [Trigger],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(s.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(s.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing],
c.text
FROM sysobjects s
JOIN syscomments c ON s.id = c.id
WHERE s.xtype = 'TR' AND s.name = ".q($f));$d=reset($F);if($d){$d["Statement"]=preg_replace('~^.+\\s+AS\\s+~isU','',$d["text"]);}return$d;}function
triggers($h){$d=array();foreach(get_rows("SELECT sys1.name,
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing]
FROM sysobjects sys1
JOIN sysobjects sys2 ON sys1.parent_obj = sys2.id
WHERE sys1.xtype = 'TR' AND sys2.name = ".q($h))as$a){$d[$a["name"]]=array($a["Timing"],$a["Event"]);}return$d;}function
trigger_options(){return
array("Timing"=>array("AFTER","INSTEAD OF"),"Type"=>array("AS"),);}function
schemas(){return
get_vals("SELECT name FROM sys.schemas");}function
get_schema(){global$g;if($_GET["ns"]!=""){return$_GET["ns"];}return$g->result("SELECT SCHEMA_NAME()");}function
set_schema($Ja){return
true;}function
use_sql($ea){return"USE ".idf_escape($ea);}function
show_variables(){return
array();}function
show_status(){return
array();}function
support($ob){return
ereg('^(scheme|trigger|view|drop_col)$',$ob);}$_="mssql";$T=array();$Oa=array();foreach(array('Numbers'=>array("tinyint"=>3,"smallint"=>5,"int"=>10,"bigint"=>20,"bit"=>1,"decimal"=>0,"real"=>12,"float"=>53,"smallmoney"=>10,"money"=>20),'Date and time'=>array("date"=>10,"smalldatetime"=>19,"datetime"=>19,"datetime2"=>19,"time"=>8,"datetimeoffset"=>10),'Strings'=>array("char"=>8000,"varchar"=>8000,"text"=>2147483647,"nchar"=>4000,"nvarchar"=>4000,"ntext"=>1073741823),'Binary'=>array("binary"=>8000,"varbinary"=>8000,"image"=>2147483647),)as$e=>$b){$T+=$b;$Oa[$e]=array_keys($b);}$nb=array();$Nb=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$V=array("len","lower","round","upper");$qb=array("avg","count","count distinct","max","min","sum");$Vb=array(array("date|time"=>"getdate",),array("int|decimal|real|float|money|datetime"=>"+/-","char|text"=>"+",));}$Ha[]="MySQLi";$Ha[]="MySQL";$Ha[]="PDO_MySQL";if(extension_loaded("mysqli")||extension_loaded("mysql")||extension_loaded("pdo_mysql")){$ja=array("server"=>"MySQL")+$ja;}if(!defined("DRIVER")){define("DRIVER","server");if(extension_loaded("mysqli")){class
Min_DB
extends
MySQLi{var$extension="MySQLi";function
Min_DB(){parent::init();}function
connect($E,$P,$R){mysqli_report(MYSQLI_REPORT_OFF);list($uf,$Oc)=explode(":",$E,2);$d=@$this->real_connect(($E!=""?$uf:ini_get("mysqli.default_host")),("$E$P"!=""?$P:ini_get("mysqli.default_user")),("$E$P$R"!=""?$R:ini_get("mysqli.default_pw")),null,(is_numeric($Oc)?$Oc:ini_get("mysqli.default_port")),(!is_numeric($Oc)?$Oc:null));if($d){if(method_exists($this,'set_charset')){$this->set_charset("utf8");}else{$this->query("SET NAMES utf8");}}return$d;}function
result($j,$c=0){$i=$this->query($j);if(!$i){return
false;}$a=$i->fetch_array();return$a[$c];}function
quote($G){return"'".$this->escape_string($G)."'";}}}elseif(extension_loaded("mysql")){class
Min_DB{var$extension="MySQL",$server_info,$affected_rows,$error,$_link,$_result;function
connect($E,$P,$R){$this->_link=@mysql_connect(($E!=""?$E:ini_get("mysql.default_host")),("$E$P"!=""?$P:ini_get("mysql.default_user")),("$E$P$R"!=""?$R:ini_get("mysql.default_password")),true,131072);if($this->_link){$this->server_info=mysql_get_server_info($this->_link);if(function_exists('mysql_set_charset')){mysql_set_charset("utf8",$this->_link);}else{$this->query("SET NAMES utf8");}}else{$this->error=mysql_error();}return(bool)$this->_link;}function
quote($G){return"'".mysql_real_escape_string($G,$this->_link)."'";}function
select_db($ea){return
mysql_select_db($ea,$this->_link);}function
query($j,$Wa=false){$i=@($Wa?mysql_unbuffered_query($j,$this->_link):mysql_query($j,$this->_link));if(!$i){$this->error=mysql_error($this->_link);return
false;}if($i===true){$this->affected_rows=mysql_affected_rows($this->_link);$this->info=mysql_info($this->_link);return
true;}return
new
Min_Result($i);}function
multi_query($j){return$this->_result=$this->query($j);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($j,$c=0){$i=$this->query($j);if(!$i){return
false;}return
mysql_result($i->_result,0,$c);}}class
Min_Result{var$num_rows,$_result;function
Min_Result($i){$this->_result=$i;$this->num_rows=mysql_num_rows($i);}function
fetch_assoc(){return
mysql_fetch_assoc($this->_result);}function
fetch_row(){return
mysql_fetch_row($this->_result);}function
fetch_field(){$d=mysql_fetch_field($this->_result);$d->orgtable=$d->table;$d->orgname=$d->name;$d->charsetnr=($d->blob?63:0);return$d;}function
__destruct(){mysql_free_result($this->_result);}}}elseif(extension_loaded("pdo_mysql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_MySQL";function
connect($E,$P,$R){$this->dsn("mysql:host=".str_replace(":",";unix_socket=",preg_replace('~:([0-9])~',';port=\\1',$E)),$P,$R);$this->query("SET NAMES utf8");return
true;}function
select_db($ea){return$this->query("USE ".idf_escape($ea));}function
query($j,$Wa=false){$this->setAttribute(1000,!$Wa);return
parent::query($j,$Wa);}}}function
idf_escape($Q){return"`".str_replace("`","``",$Q)."`";}function
table($Q){return
idf_escape($Q);}function
connect(){global$r;$g=new
Min_DB;$xa=$r->credentials();if($g->connect($xa[0],$xa[1],$xa[2])){$g->query("SET SQL_QUOTE_SHOW_CREATE=1");return$g;}return$g->error;}function
get_databases($of=true){$d=&get_session("dbs");if(!isset($d)){if($of){restart_session();ob_flush();flush();}$d=get_vals("SHOW DATABASES");}return$d;}function
limit($j,$t,$M,$N=0,$Pa=" "){return" $j$t".(isset($M)?$Pa."LIMIT $M".($N?" OFFSET $N":""):"");}function
limit1($j,$t){return
limit($j,$t,1);}function
db_collation($s,$W){global$g;$d=null;$fa=$g->result("SHOW CREATE DATABASE ".idf_escape($s),1);if(preg_match('~ COLLATE ([^ ]+)~',$fa,$l)){$d=$l[1];}elseif(preg_match('~ CHARACTER SET ([^ ]+)~',$fa,$l)){$d=$W[$l[1]][0];}return$d;}function
engines(){$d=array();foreach(get_rows("SHOW ENGINES")as$a){if(ereg("YES|DEFAULT",$a["Support"])){$d[]=$a["Engine"];}}return$d;}function
logged_user(){global$g;return$g->result("SELECT USER()");}function
tables_list(){global$g;return
get_key_vals("SHOW".($g->server_info>=5?" FULL":"")." TABLES");}function
count_tables($z){$d=array();foreach($z
as$s){$d[$s]=count(get_vals("SHOW TABLES IN ".idf_escape($s)));}return$d;}function
table_status($f=""){$d=array();foreach(get_rows("SHOW TABLE STATUS".($f!=""?" LIKE ".q(addcslashes($f,"%_")):""))as$a){if($a["Engine"]=="InnoDB"){$a["Comment"]=preg_replace('~(?:(.+); )?InnoDB free: .*~','\\1',$a["Comment"]);}if(!isset($a["Rows"])){$a["Comment"]="";}if($f!=""){return$a;}$d[$a["Name"]]=$a;}return$d;}function
is_view($I){return!isset($I["Rows"]);}function
fk_support($I){return($I["Engine"]=="InnoDB");}function
fields($h,$tc=false){$d=array();foreach(get_rows("SHOW FULL COLUMNS FROM ".table($h))as$a){preg_match('~^([^( ]+)(?:\\((.+)\\))?( unsigned)?( zerofill)?$~',$a["Type"],$l);$d[$a["Field"]]=array("field"=>$a["Field"],"full_type"=>$a["Type"],"type"=>$l[1],"length"=>$l[2],"unsigned"=>ltrim($l[3].$l[4]),"default"=>($a["Default"]!=""||ereg("char",$l[1])?$a["Default"]:null),"null"=>($a["Null"]=="YES"),"auto_increment"=>($a["Extra"]=="auto_increment"),"on_update"=>(eregi('^on update (.+)',$a["Extra"],$l)?$l[1]:""),"collation"=>$a["Collation"],"privileges"=>array_flip(explode(",",$a["Privileges"])),"comment"=>$a["Comment"],"primary"=>($a["Key"]=="PRI"),);}return$d;}function
indexes($h,$H=null){global$g;if(!is_object($H)){$H=$g;}$d=array();foreach(get_rows("SHOW INDEX FROM ".table($h),$H)as$a){$d[$a["Key_name"]]["type"]=($a["Key_name"]=="PRIMARY"?"PRIMARY":($a["Index_type"]=="FULLTEXT"?"FULLTEXT":($a["Non_unique"]?"INDEX":"UNIQUE")));$d[$a["Key_name"]]["columns"][]=$a["Column_name"];$d[$a["Key_name"]]["lengths"][]=$a["Sub_part"];}return$d;}function
foreign_keys($h){global$g,$fb;static$ia='`(?:[^`]|``)+`';$d=array();$Ce=$g->result("SHOW CREATE TABLE ".table($h),1);if($Ce){preg_match_all("~CONSTRAINT ($ia) FOREIGN KEY \\(((?:$ia,? ?)+)\\) REFERENCES ($ia)(?:\\.($ia))? \\(((?:$ia,? ?)+)\\)(?: ON DELETE (".implode("|",$fb)."))?(?: ON UPDATE (".implode("|",$fb)."))?~",$Ce,$qa,PREG_SET_ORDER);foreach($qa
as$l){preg_match_all("~$ia~",$l[2],$Ca);preg_match_all("~$ia~",$l[5],$pa);$d[idf_unescape($l[1])]=array("db"=>idf_unescape($l[4]!=""?$l[3]:$l[4]),"table"=>idf_unescape($l[4]!=""?$l[4]:$l[3]),"source"=>array_map('idf_unescape',$Ca[0]),"target"=>array_map('idf_unescape',$pa[0]),"on_delete"=>$l[6],"on_update"=>$l[7],);}}return$d;}function
view($f){global$g;return
array("select"=>preg_replace('~^(?:[^`]|`[^`]*`)*\\s+AS\\s+~isU','',$g->result("SHOW CREATE VIEW ".table($f),1)));}function
collations(){$d=array();foreach(get_rows("SHOW COLLATION")as$a){$d[$a["Charset"]][]=$a["Collation"];}ksort($d);foreach($d
as$e=>$b){sort($d[$e]);}return$d;}function
information_schema($s){global$g;return($g->server_info>=5&&$s=="information_schema");}function
error(){global$g;return
h(preg_replace('~^You have an error.*syntax to use~U',"Syntax error",$g->error));}function
exact_value($b){return
q($b)." COLLATE utf8_bin";}function
create_database($s,$S){set_session("dbs",null);return
queries("CREATE DATABASE ".idf_escape($s).($S?" COLLATE ".q($S):""));}function
drop_databases($z){set_session("dbs",null);return
apply_queries("DROP DATABASE",$z,'idf_escape');}function
rename_database($f,$S){if(create_database($f,$S)){$Pb=array();foreach(tables_list()as$h=>$y){$Pb[]=table($h)." TO ".idf_escape($f).".".table($h);}if(!$Pb||queries("RENAME TABLE ".implode(", ",$Pb))){queries("DROP DATABASE ".idf_escape(DB));return
true;}}return
false;}function
auto_increment(){$sd=" PRIMARY KEY";if($_GET["create"]!=""&&$_POST["auto_increment_col"]){foreach(indexes($_GET["create"])as$v){if(in_array($_POST["fields"][$_POST["auto_increment_col"]]["orig"],$v["columns"],true)){$sd="";break;}if($v["type"]=="PRIMARY"){$sd=" UNIQUE";}}}return" AUTO_INCREMENT$sd";}function
alter_table($h,$f,$o,$db,$ua,$tb,$S,$Na,$pb){$u=array();foreach($o
as$c){$u[]=($c[1]?($h!=""?($c[0]!=""?"CHANGE ".idf_escape($c[0]):"ADD"):" ")." ".implode($c[1]).($h!=""?" $c[2]":""):"DROP ".idf_escape($c[0]));}$u=array_merge($u,$db);$Ob="COMMENT=".q($ua).($tb?" ENGINE=".q($tb):"").($S?" COLLATE ".q($S):"").($Na!=""?" AUTO_INCREMENT=$Na":"").$pb;if($h==""){return
queries("CREATE TABLE ".table($f)." (\n".implode(",\n",$u)."\n) $Ob");}if($h!=$f){$u[]="RENAME TO ".table($f);}$u[]=$Ob;return
queries("ALTER TABLE ".table($h)."\n".implode(",\n",$u));}function
alter_indexes($h,$u){foreach($u
as$e=>$b){$u[$e]=($b[2]?"\nDROP INDEX ":"\nADD $b[0] ".($b[0]=="PRIMARY"?"KEY ":"")).$b[1];}return
queries("ALTER TABLE ".table($h).implode(",",$u));}function
truncate_tables($D){return
apply_queries("TRUNCATE TABLE",$D);}function
drop_views($aa){return
queries("DROP VIEW ".implode(", ",array_map('table',$aa)));}function
drop_tables($D){return
queries("DROP TABLE ".implode(", ",array_map('table',$D)));}function
move_tables($D,$aa,$pa){$Pb=array();foreach(array_merge($D,$aa)as$h){$Pb[]=table($h)." TO ".idf_escape($pa).".".table($h);}return
queries("RENAME TABLE ".implode(", ",$Pb));}function
trigger($f){$F=get_rows("SHOW TRIGGERS WHERE `Trigger` = ".q($f));return
reset($F);}function
triggers($h){$d=array();foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($h,"%_")))as$a){$d[$a["Trigger"]]=array($a["Timing"],$a["Event"]);}return$d;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Type"=>array("FOR EACH ROW"),);}function
routine($f,$y){global$g,$Fb,$wc,$T;$vf=array("bool","boolean","integer","double precision","real","dec","numeric","fixed","national char","national varchar");$ie="((".implode("|",array_merge(array_keys($T),$vf)).")(?:\\s*\\(((?:[^'\")]*|$Fb)+)\\))?\\s*(zerofill\\s*)?(unsigned(?:\\s+zerofill)?)?)(?:\\s*(?:CHARSET|CHARACTER\\s+SET)\\s*['\"]?([^'\"\\s]+)['\"]?)?";$ia="\\s*(".($y=="FUNCTION"?"":implode("|",$wc)).")?\\s*(?:`((?:[^`]|``)*)`\\s*|\\b(\\S+)\\s+)$ie";$fa=$g->result("SHOW CREATE $y ".idf_escape($f),2);preg_match("~\\(((?:$ia\\s*,?)*)\\)".($y=="FUNCTION"?"\\s*RETURNS\\s+$ie":"")."\\s*(.*)~is",$fa,$l);$o=array();preg_match_all("~$ia\\s*,?~is",$l[1],$qa,PREG_SET_ORDER);foreach($qa
as$Va){$f=str_replace("``","`",$Va[2]).$Va[3];$o[]=array("field"=>$f,"type"=>strtolower($Va[5]),"length"=>preg_replace_callback("~$Fb~s",'normalize_enum',$Va[6]),"unsigned"=>strtolower(preg_replace('~\\s+~',' ',trim("$Va[8] $Va[7]"))),"full_type"=>$Va[4],"inout"=>strtoupper($Va[1]),"collation"=>strtolower($Va[9]),);}if($y!="FUNCTION"){return
array("fields"=>$o,"definition"=>$l[11]);}return
array("fields"=>$o,"returns"=>array("type"=>$l[12],"length"=>$l[13],"unsigned"=>$l[15],"collation"=>$l[16]),"definition"=>$l[17],);}function
routines(){return
get_rows("SELECT * FROM information_schema.ROUTINES WHERE ROUTINE_SCHEMA = ".q(DB));}function
begin(){return
queries("BEGIN");}function
insert_into($h,$q){return
queries("INSERT INTO ".table($h)." (".implode(", ",array_keys($q)).")\nVALUES (".implode(", ",$q).")");}function
insert_update($h,$q,$Ia){foreach($q
as$e=>$b){$q[$e]="$e = $b";}$na=implode(", ",$q);return
queries("INSERT INTO ".table($h)." SET $na ON DUPLICATE KEY UPDATE $na");}function
last_id(){global$g;return$g->result("SELECT LAST_INSERT_ID()");}function
explain($g,$j){return$g->query("EXPLAIN $j");}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($Ja){return
true;}function
create_sql($h,$Na){global$g;$d=$g->result("SHOW CREATE TABLE ".table($h),1);if(!$Na){$d=preg_replace('~ AUTO_INCREMENT=[0-9]+~','',$d);}return$d;}function
truncate_sql($h){return"TRUNCATE ".table($h);}function
use_sql($ea){return"USE ".idf_escape($ea);}function
trigger_sql($h,$X){$d="";foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($h,"%_")),null,"-- ")as$a){$d.="\n".($X=='CREATE+ALTER'?"DROP TRIGGER IF EXISTS ".idf_escape($a["Trigger"]).";;\n":"")."CREATE TRIGGER ".idf_escape($a["Trigger"])." $a[Timing] $a[Event] ON ".table($a["Table"])." FOR EACH ROW\n$a[Statement];;\n";}return$d;}function
show_variables(){return
get_key_vals("SHOW VARIABLES");}function
show_status(){return
get_key_vals("SHOW STATUS");}function
support($ob){global$g;return!ereg("scheme|sequence|type".($g->server_info<5.1?"|event|partitioning".($g->server_info<5?"|view|routine|trigger":""):""),$ob);}$_="sql";$T=array();$Oa=array();foreach(array('Numbers'=>array("tinyint"=>3,"smallint"=>5,"mediumint"=>8,"int"=>10,"bigint"=>20,"decimal"=>66,"float"=>12,"double"=>21),'Date and time'=>array("date"=>10,"datetime"=>19,"timestamp"=>19,"time"=>10,"year"=>4),'Strings'=>array("char"=>255,"varchar"=>65535,"tinytext"=>255,"text"=>65535,"mediumtext"=>16777215,"longtext"=>4294967295),'Binary'=>array("bit"=>20,"binary"=>255,"varbinary"=>65535,"tinyblob"=>255,"blob"=>65535,"mediumblob"=>16777215,"longblob"=>4294967295),'Lists'=>array("enum"=>65535,"set"=>64),)as$e=>$b){$T+=$b;$Oa[$e]=array_keys($b);}$nb=array("unsigned","zerofill","unsigned zerofill");$Nb=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","REGEXP","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL");$V=array("char_length","date","from_unixtime","hex","lower","round","sec_to_time","time_to_sec","upper");$qb=array("avg","count","count distinct","group_concat","max","min","sum");$Vb=array(array("char"=>"md5/sha1/password/encrypt/uuid","binary"=>"md5/sha1/hex","date|time"=>"now",),array("int|float|double|decimal"=>"+/-","date"=>"+ interval/- interval","time"=>"addtime/subtime","char|text"=>"concat",));}define("SERVER",$_GET[DRIVER]);define("DB",$_GET["db"]);define("ME",preg_replace('~^[^?]*/([^?]*).*~','\\1',$_SERVER["REQUEST_URI"]).'?'.(SID&&!$_COOKIE?SID.'&':'').(SERVER!==null?DRIVER."=".urlencode(SERVER).'&':'').(isset($_GET["username"])?"username=".urlencode($_GET["username"]).'&':'').(DB!=""?'db='.urlencode(DB).'&'.(isset($_GET["ns"])?"ns=".urlencode($_GET["ns"])."&":""):''));$Wc="3.0.1";class
Adminer{var$operators;function
name(){return"Adminer";}function
credentials(){return
array(SERVER,$_GET["username"],get_session("pwds"));}function
permanentLogin(){return
password_file();}function
database(){return
DB;}function
headers(){header("X-Frame-Options: deny");}function
loginForm(){global$ja;echo'<table cellspacing="0">
<tr><th>System<td>',html_select("driver",$ja,DRIVER),'<tr><th>Server<td><input name="server" value="',h(SERVER),'">
<tr><th>Username<td><input id="username" name="username" value="',h($_GET["username"]),'">
<tr><th>Password<td><input type="password" name="password">
</table>
<script type="text/javascript">
document.getElementById(\'username\').focus();
</script>
',"<p><input type='submit' value='".'Login'."'>\n",checkbox("permanent",1,$_COOKIE["adminer_permanent"],'Permanent login')."\n";}function
login($Cf,$R){return
true;}function
tableName($Xc){return
h($Xc["Name"]);}function
fieldName($c,$ub=0){return'<span title="'.h($c["full_type"]).'">'.h($c["field"]).'</span>';}function
selectLinks($Xc,$q=""){echo'<p class="tabs">';$Ka=array("select"=>'Select data',"table"=>'Show structure');if(is_view($Xc)){$Ka["view"]='Alter view';}else{$Ka["create"]='Alter table';}if(isset($q)){$Ka["edit"]='New item';}foreach($Ka
as$e=>$b){echo" <a href='".h(ME)."$e=".urlencode($Xc["Name"]).($e=="edit"?$q:"")."'>".bold($b,isset($_GET[$e]))."</a>";}echo"\n";}function
backwardKeys($h,$Gf){return
array();}function
backwardKeysPrint($If,$a){}function
selectQuery($j){global$_;return"<p><a href='".h(remove_from_uri("page"))."&amp;page=last' title='".'Page'.": ".'last'."'>&gt;&gt;</a> <code class='jush-$_'>".h(str_replace("\n"," ",$j))."</code> <a href='".h(ME)."sql=".urlencode($j)."'>".'Edit'."</a>\n";}function
rowDescription($h){return"";}function
rowDescriptions($F,$mf){return$F;}function
selectVal($b,$x,$c){$d=($b!="<i>NULL</i>"&&ereg("^char|binary",$c["type"])?"<code>$b</code>":$b);if(ereg('blob|bytea|raw|file',$c["type"])&&!is_utf8($b)){$d=lang(array('%d byte','%d bytes'),strlen(html_entity_decode($b,ENT_QUOTES)));}return($x?"<a href='$x'>$d</a>":$d);}function
editVal($b,$c){return(ereg("binary",$c["type"])?reset(unpack("H*",$b)):$b);}function
selectColumnsPrint($C,$A){global$V,$qb;print_fieldset("select",'Select',$C);$k=0;$ne=array('Functions'=>$V,'Aggregation'=>$qb);foreach($C
as$e=>$b){$b=$_GET["columns"][$e];echo"<div>".html_select("columns[$k][fun]",array(-1=>"")+$ne,$b["fun"]),"(<select name='columns[$k][col]'><option>".optionlist($A,$b["col"],true)."</select>)</div>\n";$k++;}echo"<div>".html_select("columns[$k][fun]",array(-1=>"")+$ne,"","this.nextSibling.nextSibling.onchange();"),"(<select name='columns[$k][col]' onchange='selectAddRow(this);'><option>".optionlist($A,null,true)."</select>)</div>\n","</div></fieldset>\n";}function
selectSearchPrint($t,$A,$K){print_fieldset("search",'Search',$t);foreach($K
as$k=>$v){if($v["type"]=="FULLTEXT"){echo"(<i>".implode("</i>, <i>",array_map('h',$v["columns"]))."</i>) AGAINST"," <input name='fulltext[$k]' value='".h($_GET["fulltext"][$k])."'>",checkbox("boolean[$k]",1,isset($_GET["boolean"][$k]),"BOOL"),"<br>\n";}}$k=0;foreach((array)$_GET["where"]as$b){if("$b[col]$b[val]"!=""&&in_array($b["op"],$this->operators)){echo"<div><select name='where[$k][col]'><option value=''>(".'anywhere'.")".optionlist($A,$b["col"],true)."</select>",html_select("where[$k][op]",$this->operators,$b["op"]),"<input name='where[$k][val]' value='".h($b["val"])."'></div>\n";$k++;}}echo"<div><select name='where[$k][col]' onchange='selectAddRow(this);'><option value=''>(".'anywhere'.")".optionlist($A,null,true)."</select>",html_select("where[$k][op]",$this->operators),"<input name='where[$k][val]'></div>\n","</div></fieldset>\n";}function
selectOrderPrint($ub,$A,$K){print_fieldset("sort",'Sort',$ub);$k=0;foreach((array)$_GET["order"]as$e=>$b){if(isset($A[$b])){echo"<div><select name='order[$k]'><option>".optionlist($A,$b,true)."</select>",checkbox("desc[$k]",1,isset($_GET["desc"][$e]),'descending')."</div>\n";$k++;}}echo"<div><select name='order[$k]' onchange='selectAddRow(this);'><option>".optionlist($A,null,true)."</select>",checkbox("desc[$k]",1,0,'descending')."</div>\n","</div></fieldset>\n";}function
selectLimitPrint($M){echo"<fieldset><legend>".'Limit'."</legend><div>";echo"<input name='limit' size='3' value='".h($M)."'>","</div></fieldset>\n";}function
selectLengthPrint($_b){if(isset($_b)){echo"<fieldset><legend>".'Text length'."</legend><div>",'<input name="text_length" size="3" value="'.h($_b).'">',"</div></fieldset>\n";}}function
selectActionPrint(){echo"<fieldset><legend>".'Action'."</legend><div>","<input type='submit' value='".'Select'."'>","</div></fieldset>\n";}function
selectEmailPrint($Hf,$A){}function
selectColumnsProcess($A,$K){global$V,$qb;$C=array();$ta=array();foreach((array)$_GET["columns"]as$e=>$b){if($b["fun"]=="count"||(isset($A[$b["col"]])&&(!$b["fun"]||in_array($b["fun"],$V)||in_array($b["fun"],$qb)))){$C[$e]=apply_sql_function($b["fun"],(isset($A[$b["col"]])?idf_escape($b["col"]):"*"));if(!in_array($b["fun"],$qb)){$ta[]=$C[$e];}}}return
array($C,$ta);}function
selectSearchProcess($o,$K){global$_;$d=array();foreach($K
as$k=>$v){if($v["type"]=="FULLTEXT"&&$_GET["fulltext"][$k]!=""){$d[]="MATCH (".implode(", ",array_map('idf_escape',$v["columns"])).") AGAINST (".q($_GET["fulltext"][$k]).(isset($_GET["boolean"][$k])?" IN BOOLEAN MODE":"").")";}}foreach((array)$_GET["where"]as$b){if("$b[col]$b[val]"!=""&&in_array($b["op"],$this->operators)){$Qb=" $b[op]";if(ereg('IN$',$b["op"])){$Db=process_length($b["val"]);$Qb.=" (".($Db!=""?$Db:"NULL").")";}elseif($b["op"]=="LIKE %%"){$Qb=" LIKE ".$this->processInput($o[$b["col"]],"%$b[val]%");}elseif(!ereg('NULL$',$b["op"])){$Qb.=" ".$this->processInput($o[$b["col"]],$b["val"]);}if($b["col"]!=""){$d[]=idf_escape($b["col"]).$Qb;}else{$gb=array();foreach($o
as$f=>$c){if(is_numeric($b["val"])||!ereg('int|float|double|decimal',$c["type"])){$f=idf_escape($f);$gb[]=($_=="sql"&&ereg('char|text|enum|set',$c["type"])&&!ereg('^utf8',$c["collation"])?"CONVERT($f USING utf8)":$f);}}$d[]=($gb?"(".implode("$Qb OR ",$gb)."$Qb)":"0");}}}return$d;}function
selectOrderProcess($o,$K){$d=array();foreach((array)$_GET["order"]as$e=>$b){if(isset($o[$b])||preg_match('~^((COUNT\\(DISTINCT |[A-Z0-9_]+\\()(`(?:[^`]|``)+`|"(?:[^"]|"")+")\\)|COUNT\\(\\*\\))$~',$b)){$d[]=(isset($o[$b])?idf_escape($b):$b).(isset($_GET["desc"][$e])?" DESC":"");}}return$d;}function
selectLimitProcess(){return(isset($_GET["limit"])?$_GET["limit"]:"30");}function
selectLengthProcess(){return(isset($_GET["text_length"])?$_GET["text_length"]:"100");}function
selectEmailProcess($t,$mf){return
false;}function
messageQuery($j){global$_;restart_session();$U="sql-".count($_SESSION["messages"]);$eb=&get_session("queries");$eb[$_GET["db"]][]=(strlen($j)>1e6?ereg_replace('[\x80-\xFF]+$','',substr($j,0,1e6))."\n...":$j);return" <a href='#$U' onclick=\"return !toggle('$U');\">".'SQL command'."</a><div id='$U' class='hidden'><pre class='jush-$_'>".shorten_utf8($j,1000).'</pre><p><a href="'.h(str_replace("db=".urlencode(DB),"db=".urlencode($_GET["db"]),ME).'sql=&history='.(count($eb[$_GET["db"]])-1)).'">'.'Edit'.'</a></div>';}function
editFunctions($c){global$Vb;$d=($c["null"]?"NULL/":"");foreach($Vb
as$e=>$V){if(!$e||(!isset($_GET["call"])&&(isset($_GET["select"])||where($_GET)))){foreach($V
as$ia=>$b){if(!$ia||ereg($ia,$c["type"])){$d.="/$b";}}}}return
explode("/",$d);}function
editInput($h,$c,$Qa,$p){if($c["type"]=="enum"){return($c["null"]?"<label><input type='radio'$Qa value=''".(isset($p)||isset($_GET["select"])?"":" checked")."><i>NULL</i></label> ":"")."<label><input type='radio'$Qa value='0'".($p===0?" checked":"")."><i>".'empty'."</i></label>";}return"";}function
processInput($c,$p,$O=""){$f=$c["field"];$d=q($p);if(ereg('^(now|getdate|uuid)$',$O)){$d="$O()";}elseif(ereg('^current_(date|timestamp)$',$O)){$d=$O;}elseif(ereg('^([+-]|\\|\\|)$',$O)){$d=idf_escape($f)." $O $d";}elseif(ereg('^[+-] interval$',$O)){$d=idf_escape($f)." $O ".(preg_match("~^([0-9]+|'[0-9.: -]') [A-Z_]+$~i",$p)?$p:$d);}elseif(ereg('^(addtime|subtime|concat)$',$O)){$d="$O(".idf_escape($f).", $d)";}elseif(ereg('^(md5|sha1|password|encrypt|hex)$',$O)){$d="$O($d)";}if(ereg("binary",$c["type"])){$d="unhex($d)";}return$d;}function
dumpOutput($C,$p=""){$d=array('text'=>'open','file'=>'save');if(function_exists('gzencode')){$d['gz']='gzip';}if(function_exists('bzcompress')){$d['bz2']='bzip2';}return
html_select("output",$d,$p,$C);}function
dumpFormat($C,$p=""){return
html_select("format",array('sql'=>'SQL','csv'=>'CSV,','csv;'=>'CSV;'),$p,$C);}function
navigation($ac){global$Wc,$g,$L,$_,$ja;echo'<h1>
<a href="http://www.adminer.org/" id="h1">',$this->name(),'</a>
<span class="version">',$Wc,'</span>
<a href="http://www.adminer.org/#download" id="version">',(version_compare($Wc,$_COOKIE["adminer_version"])<0?h($_COOKIE["adminer_version"]):""),'</a>
</h1>
';if($ac=="auth"){$ib=true;foreach((array)$_SESSION["pwds"]as$Gb=>$qf){foreach($qf
as$E=>$tf){foreach($tf
as$P=>$R){if(isset($R)){if($ib){echo"<p>\n";$ib=false;}echo"<a href='".h(auth_url($Gb,$E,$P))."'>($ja[$Gb]) ".h($P.($E!=""?"@$E":""))."</a><br>\n";}}}}}else{$z=get_databases();echo'<form action="" method="post">
<p class="logout">
';if(DB==""||!$ac){echo"<a href='".h(ME)."sql='>".bold('SQL command',isset($_GET["sql"]))."</a>\n";if(support("dump")){echo"<a href='".h(ME)."dump=".urlencode(isset($_GET["table"])?$_GET["table"]:$_GET["select"])."'>".bold('Dump',isset($_GET["dump"]))."</a>\n";}}echo'<input type="hidden" name="token" value="',$L,'">
<input type="submit" name="logout" value="Logout">
</p>
</form>
<form action="">
<p>
';hidden_fields_get();echo($z?html_select("db",array(""=>"(".'database'.")")+$z,DB,"this.form.submit();"):'<input name="db" value="'.h(DB).'">'),'<input type="submit" value="Use"',($z?" class='hidden'":""),'>
';if($ac!="db"&&DB!=""&&$g->select_db(DB)){if(support("scheme")){echo"<br>".html_select("ns",array(""=>"(".'schema'.")")+schemas(),$_GET["ns"],"this.form.submit();");if($_GET["ns"]!=""){set_schema($_GET["ns"]);}}if($_GET["ns"]!==""&&!$ac){$D=tables_list();if(!$D){echo"<p class='message'>".'No tables.'."\n";}else{$this->tablesPrint($D);$Ka=array();foreach($D
as$h=>$y){$Ka[]=preg_quote($h,'/');}echo"<script type='text/javascript'>\n","var jushLinks = { $_: [ '".addcslashes(h(ME),"\\'/")."table=\$&', /\\b(".implode("|",$Ka).")\\b/g ] };\n";foreach(array("bac","bra","sqlite_quo","mssql_bra")as$b){echo"jushLinks.$b = jushLinks.$_;\n";}echo"</script>\n";}echo'<p><a href="'.h(ME).'create=">'.bold('Create new table',$_GET["create"]==="")."</a>\n";}}echo(isset($_GET["sql"])?'<input type="hidden" name="sql" value="">':(isset($_GET["schema"])?'<input type="hidden" name="schema" value="">':(isset($_GET["dump"])?'<input type="hidden" name="dump" value="">':""))),"</p></form>\n";}}function
tablesPrint($D){echo"<p id='tables'>\n";foreach($D
as$h=>$y){echo'<a href="'.h(ME).'select='.urlencode($h).'">'.bold('select',$_GET["select"]==$h).'</a> ','<a href="'.h(ME).'table='.urlencode($h).'">'.bold($this->tableName(array("Name"=>$h)),$_GET["table"]==$h)."</a><br>\n";}}}$r=(function_exists('adminer_object')?adminer_object():new
Adminer);if(!isset($r->operators)){$r->operators=$Nb;}function
page_header($qe,$n="",$cc=array(),$he=""){global$Df,$Zb,$r,$g,$ja;header("Content-Type: text/html; charset=utf-8");$r->headers();$pe=$qe.($he!=""?": ".h($he):"");$ic=($Zb?"https":"http");echo'<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta name="robots" content="noindex">
<title>',$pe.(SERVER!=""&&SERVER!="localhost"?h(" - ".SERVER):"")." - ".$r->name(),'</title>
<link rel="shortcut icon" type="image/x-icon" href="',h(preg_replace("~\\?.*~","",$_SERVER["REQUEST_URI"]))."?file=favicon.ico&amp;version=3.0.1",'">
<link rel="stylesheet" type="text/css" href="',h(preg_replace("~\\?.*~","",$_SERVER["REQUEST_URI"]))."?file=default.css&amp;version=3.0.1";echo'">
';if(file_exists("adminer.css")){echo'<link rel="stylesheet" type="text/css" href="adminer.css">
';}echo'
<body onload="bodyLoad(\'',(is_object($g)?substr($g->server_info,0,3):""),'\', \'',$ic,'\');',(isset($_COOKIE["adminer_version"])?"":" verifyVersion('$ic');"),'">
<script type="text/javascript" src="',h(preg_replace("~\\?.*~","",$_SERVER["REQUEST_URI"]))."?file=functions.js&amp;version=3.0.1",'"></script>

<div id="content">
';if(isset($cc)){$x=substr(preg_replace('~(username|db|ns)=[^&]*&~','',ME),0,-1);echo'<p id="breadcrumb"><a href="'.($x?h($x):".").'">'.$ja[DRIVER].'</a> &raquo; ';$x=substr(preg_replace('~(db|ns)=[^&]*&~','',ME),0,-1);$E=(SERVER!=""?h(SERVER):'Server');if($cc===false){echo"$E\n";}else{echo"<a href='".($x?h($x):".")."'>$E</a> &raquo; ";if($_GET["ns"]!=""||(DB!=""&&is_array($cc))){echo'<a href="'.h($x."&db=".urlencode(DB).(support("scheme")?"&ns=":"")).'">'.h(DB).'</a> &raquo; ';}if(is_array($cc)){if($_GET["ns"]!=""){echo'<a href="'.h(substr(ME,0,-1)).'">'.h($_GET["ns"]).'</a> &raquo; ';}foreach($cc
as$e=>$b){$hc=(is_array($b)?$b[1]:$b);if($hc!=""){echo'<a href="'.h(ME."$e=").urlencode(is_array($b)?$b[0]:$b).'">'.h($hc).'</a> &raquo; ';}}}echo"$qe\n";}}echo"<h2>$pe</h2>\n";restart_session();if($_SESSION["messages"]){echo"<div class='message'>".implode("</div>\n<div class='message'>",$_SESSION["messages"])."</div>\n";$_SESSION["messages"]=array();}$z=&get_session("dbs");if(DB!=""&&$z&&!in_array(DB,$z,true)){$z=null;}if($n){echo"<div class='error'>$n</div>\n";}}function
page_footer($ac=""){global$r;echo'</div>

<div id="menu">
';$r->navigation($ac);echo'</div>
';}function
int32($ba){while($ba>=2147483648){$ba-=4294967296;}while($ba<=-2147483649){$ba+=4294967296;}return(int)$ba;}function
long2str($w,$gd){$ha='';foreach($w
as$b){$ha.=pack('V',$b);}if($gd){return
substr($ha,0,end($w));}return$ha;}function
str2long($ha,$gd){$w=array_values(unpack('V*',str_pad($ha,4*ceil(strlen($ha)/4),"\0")));if($gd){$w[]=strlen($ha);}return$w;}function
xxtea_mx($_a,$sa,$Ea,$Ma){return
int32((($_a>>5&0x7FFFFFF)^$sa<<2)+(($sa>>3&0x1FFFFFFF)^$_a<<4))^int32(($Ea^$sa)+($Ma^$_a));}function
encrypt_string($mc,$e){if($mc==""){return"";}$e=array_values(unpack("V*",pack("H*",md5($e))));$w=str2long($mc,true);$ba=count($w)-1;$_a=$w[$ba];$sa=$w[0];$ya=floor(6+52/($ba+1));$Ea=0;while($ya-->0){$Ea=int32($Ea+0x9E3779B9);$dc=$Ea>>2&3;for($Aa=0;$Aa<$ba;$Aa++){$sa=$w[$Aa+1];$Eb=xxtea_mx($_a,$sa,$Ea,$e[$Aa&3^$dc]);$_a=int32($w[$Aa]+$Eb);$w[$Aa]=$_a;}$sa=$w[0];$Eb=xxtea_mx($_a,$sa,$Ea,$e[$Aa&3^$dc]);$_a=int32($w[$ba]+$Eb);$w[$ba]=$_a;}return
long2str($w,false);}function
decrypt_string($mc,$e){if($mc==""){return"";}$e=array_values(unpack("V*",pack("H*",md5($e))));$w=str2long($mc,false);$ba=count($w)-1;$_a=$w[$ba];$sa=$w[0];$ya=floor(6+52/($ba+1));$Ea=int32($ya*0x9E3779B9);while($Ea){$dc=$Ea>>2&3;for($Aa=$ba;$Aa>0;$Aa--){$_a=$w[$Aa-1];$Eb=xxtea_mx($_a,$sa,$Ea,$e[$Aa&3^$dc]);$sa=int32($w[$Aa]-$Eb);$w[$Aa]=$sa;}$_a=$w[$ba];$Eb=xxtea_mx($_a,$sa,$Ea,$e[$Aa&3^$dc]);$sa=int32($w[0]-$Eb);$w[0]=$sa;$Ea=int32($Ea-0x9E3779B9);}return
long2str($w,true);}$g='';if(!$ja){page_header('No extension',sprintf('None of the supported PHP extensions (%s) are available.',implode(", ",$Ha)),null);page_footer("auth");exit;}$L=$_SESSION["token"];if(!$_SESSION["token"]){$_SESSION["token"]=rand(1,1e6);}$Bb=array();if($_COOKIE["adminer_permanent"]){foreach(explode(" ",$_COOKIE["adminer_permanent"])as$b){list($e)=explode(":",$b);$Bb[$e]=$b;}}if(isset($_POST["server"])){session_regenerate_id();$_SESSION["pwds"][$_POST["driver"]][$_POST["server"]][$_POST["username"]]=$_POST["password"];if($_POST["permanent"]){$e=base64_encode($_POST["driver"])."-".base64_encode($_POST["server"])."-".base64_encode($_POST["username"]);$Ec=$r->permanentLogin();$Bb[$e]="$e:".base64_encode($Ec?encrypt_string($_POST["password"],$Ec):"");cookie("adminer_permanent",implode(" ",$Bb));}if(count($_POST)==($_POST["permanent"]?5:4)||DRIVER!=$_POST["driver"]||SERVER!=$_POST["server"]||$_GET["username"]!==$_POST["username"]){redirect(auth_url($_POST["driver"],$_POST["server"],$_POST["username"]));}}elseif($_POST["logout"]){if($L&&$_POST["token"]!=$L){page_header('Logout','Invalid CSRF token. Send the form again.');page_footer("db");exit;}else{foreach(array("pwds","dbs","queries")as$e){set_session($e,null);}$e=base64_encode(DRIVER)."-".base64_encode(SERVER)."-".base64_encode($_GET["username"]);if($Bb[$e]){unset($Bb[$e]);cookie("adminer_permanent",implode(" ",$Bb));}redirect(substr(preg_replace('~(username|db|ns)=[^&]*&~','',ME),0,-1),'Logout successful.');}}elseif($Bb&&!$_SESSION["pwds"]){session_regenerate_id();$Ec=$r->permanentLogin();foreach($Bb
as$e=>$b){list(,$rf)=explode(":",$b);list($Gb,$E,$P)=array_map('base64_decode',explode("-",$e));$_SESSION["pwds"][$Gb][$E][$P]=decrypt_string(base64_decode($rf),$Ec);}}function
auth_error($oe=null){global$g,$r,$L;$Fc=session_name();$n="";if(!$_COOKIE[$Fc]&&$_GET[$Fc]&&ini_bool("session.use_only_cookies")){$n='Session support must be enabled.';}elseif(isset($_GET["username"])){if(($_COOKIE[$Fc]||$_GET[$Fc])&&!$L){$n='Session expired, please login again.';}else{$R=&get_session("pwds");if(isset($R)){$n=h($oe?$oe->getMessage():(is_string($g)?$g:'Invalid credentials.'));$R=null;}}}page_header('Login',$n,null);echo"<form action='' method='post'>\n";$r->loginForm();echo"<div>";hidden_fields($_POST,array("driver","server","username","password","permanent"));echo"</div>\n","</form>\n";page_footer("auth");}if(isset($_GET["username"])&&class_exists("Min_DB")){$g=connect();}if(is_string($g)||!$r->login($_GET["username"],get_session("pwds"))){auth_error();exit;}$L=$_SESSION["token"];if(isset($_POST["server"])&&$_POST["token"]){$_POST["token"]=$L;}$n=($_POST?($_POST["token"]==$L?"":'Invalid CSRF token. Send the form again.'):($_SERVER["REQUEST_METHOD"]!="POST"?"":sprintf('Too big POST data. Reduce the data or increase the %s configuration directive.','"post_max_size"')));function
connect_error(){global$g,$L,$n,$ja;$z=array();if(DB!=""){page_header('Database'.": ".h(DB),'Invalid database.',true);}else{if($_POST["db"]&&!$n){queries_redirect(substr(ME,0,-1),'Databases have been dropped.',drop_databases($_POST["db"]));}page_header('Select database',$n,false);echo"<p><a href='".h(ME)."database='>".'Create new database'."</a>\n";foreach(array('privileges'=>'Privileges','processlist'=>'Process list','variables'=>'Variables','status'=>'Status',)as$e=>$b){if(support($e)){echo"<a href='".h(ME)."$e='>$b</a>\n";}}echo"<p>".sprintf('%s version: %s through PHP extension %s',$ja[DRIVER],"<b>$g->server_info</b>","<b>$g->extension</b>")."\n","<p>".sprintf('Logged as: %s',"<b>".h(logged_user())."</b>")."\n";$z=get_databases();if($z){$fd=support("scheme");$W=collations();echo"<form action='' method='post'>\n","<table cellspacing='0' onclick='tableClick(event);'>\n","<thead><tr><td><input type='hidden' name='token' value='$L'>&nbsp;<th>".'Database'."<td>".'Collation'."<td>".'Tables'."</thead>\n";foreach($z
as$s){$vd=h(ME)."db=".urlencode($s);echo"<tr".odd()."><td>".checkbox("db[]",$s,in_array($s,(array)$_POST["db"])),"<th><a href='$vd'>".h($s)."</a>","<td><a href='$vd".($fd?"&amp;ns=":"")."&amp;database='>".nbsp(db_collation($s,$W))."</a>","<td align='right'><a href='$vd&amp;schema=' id='tables-".h($s)."'>?</a>","\n";}echo"</table>\n","<p><input type='submit' name='drop' value='".'Drop'."' onclick=\"return confirm('".'Are you sure?'." (' + formChecked(this, /db/) + ')');\">\n","</form>\n";}}page_footer("db");if($z){echo"<script type='text/javascript' src='".h(ME."script=connect&token=$L")."'></script>\n";}}if(isset($_GET["status"])){$_GET["variables"]=$_GET["status"];}if(!(DB!=""?$g->select_db(DB):isset($_GET["sql"])||isset($_GET["dump"])||isset($_GET["database"])||isset($_GET["processlist"])||isset($_GET["privileges"])||isset($_GET["user"])||isset($_GET["variables"])||$_GET["script"]=="connect")){if(DB!=""){set_session("dbs",null);}connect_error();exit;}if(support("scheme")&&DB!=""&&$_GET["ns"]!==""){if(!isset($_GET["ns"])){redirect(preg_replace('~ns=[^&]*&~','',ME)."ns=".get_schema());}if(!set_schema($_GET["ns"])){page_header('Schema'.": ".h($_GET["ns"]),'Invalid schema.',true);page_footer("ns");exit;}}function
select($i,$H=null){$Ka=array();$K=array();$A=array();$Be=array();$T=array();odd('');for($k=0;$a=$i->fetch_row();$k++){if(!$k){echo"<table cellspacing='0' class='nowrap'>\n","<thead><tr>";for($la=0;$la<count($a);$la++){$c=$i->fetch_field();$Ba=$c->orgtable;$sc=$c->orgname;if($Ba!=""){if(!isset($K[$Ba])){$K[$Ba]=array();foreach(indexes($Ba,$H)as$v){if($v["type"]=="PRIMARY"){$K[$Ba]=array_flip($v["columns"]);break;}}$A[$Ba]=$K[$Ba];}if(isset($A[$Ba][$sc])){unset($A[$Ba][$sc]);$K[$Ba][$sc]=$la;$Ka[$la]=$Ba;}}if($c->charsetnr==63){$Be[$la]=true;}$T[$la]=$c->type;echo"<th".($Ba!=""||$c->name!=$sc?" title='".h(($Ba!=""?"$Ba.":"").$sc)."'":"").">".h($c->name);}echo"</thead>\n";}echo"<tr".odd().">";foreach($a
as$e=>$b){if(!isset($b)){$b="<i>NULL</i>";}else{if($Be[$e]&&!is_utf8($b)){$b="<i>".lang(array('%d byte','%d bytes'),strlen($b))."</i>";}elseif(!strlen($b)){$b="&nbsp;";}else{$b=h($b);if($T[$e]==254){$b="<code>$b</code>";}}if(isset($Ka[$e])&&!$A[$Ka[$e]]){$x="edit=".urlencode($Ka[$e]);foreach($K[$Ka[$e]]as$yc=>$la){$x.="&where".urlencode("[".bracket_escape($yc)."]")."=".urlencode($a[$la]);}$b="<a href='".h(ME.$x)."'>$b</a>";}}echo"<td>$b";}}echo($k?"</table>":"<p class='message'>".'No rows.')."\n";}function
referencable_primary($yf){$d=array();foreach(table_status()as$Da=>$h){if($Da!=$yf&&fk_support($h)){foreach(fields($Da)as$c){if($c["primary"]){if($d[$Da]){unset($d[$Da]);break;}$d[$Da]=$c;}}}}return$d;}function
textarea($f,$p,$F=10,$gb=80){echo"<textarea name='$f' rows='$F' cols='$gb' style='width: 98%;' spellcheck='false' onkeydown='return textareaKeydown(this, event, true);'>".h($p)."</textarea>";}function
edit_type($e,$c,$W,$ca=array()){global$Oa,$T,$nb,$fb;echo'<td><select name="',$e,'[type]" class="type" onfocus="lastType = selectValue(this);" onchange="editingTypeChange(this);">',optionlist((!$c["type"]||isset($T[$c["type"]])?array():array($c["type"]))+$Oa+($ca?array('Foreign keys'=>$ca):array()),$c["type"]),'</select>
<td><input name="',$e,'[length]" value="',h($c["length"]),'" size="3" onfocus="editingLengthFocus(this);"><td>',"<select name='$e"."[collation]'".(ereg('(char|text|enum|set)$',$c["type"])?"":" class='hidden'").'><option value="">('.'collation'.')'.optionlist($W,$c["collation"]).'</select>',($nb?"<select name='$e"."[unsigned]'".(!$c["type"]||ereg('(int|float|double|decimal)$',$c["type"])?"":" class='hidden'").'><option>'.optionlist($nb,$c["unsigned"]).'</select>':''),($ca?"<select name='$e"."[on_delete]'".(ereg("`",$c["type"])?"":" class='hidden'")."><option value=''>(".'ON DELETE'.")".optionlist($fb,$c["on_delete"])."</select> ":" ");}function
process_length($da){global$Fb;return(preg_match("~^\\s*(?:$Fb)(?:\\s*,\\s*(?:$Fb))*\\s*\$~",$da)&&preg_match_all("~$Fb~",$da,$qa)?implode(",",$qa[0]):preg_replace('~[^0-9,+-]~','',$da));}function
process_type($c,$xc="COLLATE"){global$nb;return" $c[type]".($c["length"]!=""?"(".process_length($c["length"]).")":"").(ereg('int|float|double|decimal',$c["type"])&&in_array($c["unsigned"],$nb)?" $c[unsigned]":"").(ereg('char|text|enum|set',$c["type"])&&$c["collation"]?" $xc ".q($c["collation"]):"");}function
process_field($c,$_c){return
array(idf_escape($c["field"]),process_type($_c),($c["null"]?" NULL":" NOT NULL"),(isset($c["default"])?" DEFAULT ".($c["type"]=="timestamp"&&eregi("^CURRENT_TIMESTAMP$",$c["default"])?$c["default"]:q($c["default"])):""),($c["on_update"]?" ON UPDATE $c[on_update]":""),(support("comment")&&$c["comment"]!=""?" COMMENT ".q($c["comment"]):""),($c["auto_increment"]?auto_increment():null),);}function
type_class($y){foreach(array('char'=>'text','date'=>'time|year','binary'=>'blob','enum'=>'set',)as$e=>$b){if(ereg("$e|$b",$y)){return" class='$e'";}}}function
edit_fields($o,$W,$y="TABLE",$Pe=0,$ca=array(),$Cb=false){global$wc;foreach($o
as$c){if($c["comment"]!=""){$Cb=true;break;}}echo'<thead><tr class="wrap">
';if($y=="PROCEDURE"){echo'<td>&nbsp;';}echo'<th>',($y=="TABLE"?'Column name':'Parameter name'),'<td>Type<textarea id="enum-edit" rows="4" cols="12" wrap="off" style="display: none;" onblur="editingLengthBlur(this);"></textarea>
<td>Length
<td>Options
';if($y=="TABLE"){echo'<td>NULL
<td><input type="radio" name="auto_increment_col" value=""><acronym title="Auto Increment">AI</acronym>
<td class="hidden">Default values
',(support("comment")?"<td".($Cb?"":" class='hidden'").">".'Comment':"");}echo'<td>',"<input type='image' name='add[".(support("move_col")?0:count($o))."]' src='".h(preg_replace("~\\?.*~","",$_SERVER["REQUEST_URI"]))."?file=plus.gif&amp;version=3.0.1' alt='+' title='".'Add next'."'>",'<script type="text/javascript">row_count = ',count($o),';</script>
</thead>
';foreach($o
as$k=>$c){$k++;$Cd=$c[($_POST?"orig":"field")];$Oe=(isset($_POST["add"][$k-1])||(isset($c["field"])&&!$_POST["drop_col"][$k]))&&(support("drop_col")||$Cd=="");echo'<tr',($Oe?"":" style='display: none;'"),'>
',($y=="PROCEDURE"?"<td>".html_select("fields[$k][inout]",$wc,$c["inout"]):""),'<th>';if($Oe){echo'<input name="fields[',$k,'][field]" value="',h($c["field"]),'" onchange="',($c["field"]!=""||count($o)>1?"":"editingAddRow(this, $Pe); "),'editingNameChange(this);" maxlength="64">';}echo'<input type="hidden" name="fields[',$k,'][orig]" value="',h($Cd),'">
';edit_type("fields[$k]",$c,$W,$ca);if($y=="TABLE"){echo'<td>',checkbox("fields[$k][null]",1,$c["null"]),'<td><input type="radio" name="auto_increment_col" value="',$k,'"';if($c["auto_increment"]){echo' checked';}?> onclick="var field = this.form['fields[' + this.value + '][field]']; if (!field.value) { field.value = 'id'; field.onchange(); }">
<td class="hidden"><?php echo
checkbox("fields[$k][has_default]",1,$c["has_default"]),'<input name="fields[',$k,'][default]" value="',h($c["default"]),'" onchange="this.previousSibling.checked = true;">
',(support("comment")?"<td".($Cb?"":" class='hidden'")."><input name='fields[$k][comment]' value='".h($c["comment"])."' maxlength='255'>":"");}echo"<td>",(support("move_col")?"<input type='image' name='add[$k]' src='".h(preg_replace("~\\?.*~","",$_SERVER["REQUEST_URI"]))."?file=plus.gif&amp;version=3.0.1' alt='+' title='".'Add next'."' onclick='return !editingAddRow(this, $Pe, 1);'>&nbsp;"."<input type='image' name='up[$k]' src='".h(preg_replace("~\\?.*~","",$_SERVER["REQUEST_URI"]))."?file=up.gif&amp;version=3.0.1' alt='^' title='".'Move up'."'>&nbsp;"."<input type='image' name='down[$k]' src='".h(preg_replace("~\\?.*~","",$_SERVER["REQUEST_URI"]))."?file=down.gif&amp;version=3.0.1' alt='v' title='".'Move down'."'>&nbsp;":""),($Cd==""||support("drop_col")?"<input type='image' name='drop_col[$k]' src='".h(preg_replace("~\\?.*~","",$_SERVER["REQUEST_URI"]))."?file=cross.gif&amp;version=3.0.1' alt='x' title='".'Remove'."' onclick='return !editingRemoveRow(this);'>":""),"\n";}return$Cb;}function
process_fields(&$o){ksort($o);$N=0;if($_POST["up"]){$rb=0;foreach($o
as$e=>$c){if(key($_POST["up"])==$e){unset($o[$e]);array_splice($o,$rb,0,array($c));break;}if(isset($c["field"])){$rb=$N;}$N++;}}if($_POST["down"]){$oa=false;foreach($o
as$e=>$c){if(isset($c["field"])&&$oa){unset($o[key($_POST["down"])]);array_splice($o,$N,0,array($oa));break;}if(key($_POST["down"])==$e){$oa=$c;}$N++;}}$o=array_values($o);if($_POST["add"]){array_splice($o,key($_POST["add"]),0,array(array()));}}function
normalize_enum($l){return"'".str_replace("'","''",addcslashes(stripcslashes(str_replace($l[0][0].$l[0][0],$l[0][0],substr($l[0],1,-1))),'\\'))."'";}function
grant($ga,$ma,$A,$zb){if(!$ma){return
true;}if($ma==array("ALL PRIVILEGES","GRANT OPTION")){return($ga=="GRANT"?queries("$ga ALL PRIVILEGES$zb WITH GRANT OPTION"):queries("$ga ALL PRIVILEGES$zb")&&queries("$ga GRANT OPTION$zb"));}return
queries("$ga ".preg_replace('~(GRANT OPTION)\\([^)]*\\)~','\\1',implode("$A, ",$ma).$A).$zb);}function
drop_create($Fa,$fa,$ka,$Qe,$sf,$pf,$f){if($_POST["drop"]){return
query_redirect($Fa,$ka,$Qe,true,!$_POST["dropped"]);}$Ya=$f!=""&&($_POST["dropped"]||queries($Fa));$lf=queries($fa);if(!queries_redirect($ka,($f!=""?$sf:$pf),$lf)&&$Ya){restart_session();$_SESSION["messages"][]=$Qe;}return$Ya;}function
tar_file($Z,$cd){$d=pack("a100a8a8a8a12a12",$Z,644,0,0,decoct(strlen($cd)),decoct(time()));$Ne=8*32;for($k=0;$k<strlen($d);$k++){$Ne+=ord($d{$k});}$d.=sprintf("%06o",$Ne)."\0 ";return$d.str_repeat("\0",512-strlen($d)).$cd.str_repeat("\0",511-(strlen($cd)+511)%
512);}function
dump_table($h,$X,$Ic=false){if($_POST["format"]!="sql"){echo"\xef\xbb\xbf";if($X){dump_csv(array_keys(fields($h)));}}elseif($X){$fa=create_sql($h,$_POST["auto_increment"]);if($fa){if($X=="DROP+CREATE"){echo"DROP ".($Ic?"VIEW":"TABLE")." IF EXISTS ".table($h).";\n";}if($Ic){$fa=preg_replace('~^([A-Z =]+) DEFINER=`'.str_replace("@","`@`",logged_user()).'`~','\\1',$fa);}echo($X!="CREATE+ALTER"?$fa:($Ic?substr_replace($fa," OR REPLACE",6,0):substr_replace($fa," IF NOT EXISTS",12,0))).";\n\n";}if($X=="CREATE+ALTER"&&!$Ic){$j="SELECT COLUMN_NAME, COLUMN_DEFAULT, IS_NULLABLE, COLLATION_NAME, COLUMN_TYPE, EXTRA, COLUMN_COMMENT FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = ".q($h)." ORDER BY ORDINAL_POSITION";echo"DELIMITER ;;
CREATE PROCEDURE adminer_alter (INOUT alter_command text) BEGIN
	DECLARE _column_name, _collation_name, after varchar(64) DEFAULT '';
	DECLARE _column_type, _column_default text;
	DECLARE _is_nullable char(3);
	DECLARE _extra varchar(30);
	DECLARE _column_comment varchar(255);
	DECLARE done, set_after bool DEFAULT 0;
	DECLARE add_columns text DEFAULT '";$o=array();$Mb="";foreach(get_rows($j)as$a){$va=$a["COLUMN_DEFAULT"];$a["default"]=(isset($va)?q($va):"NULL");$a["after"]=q($Mb);$a["alter"]=escape_string(idf_escape($a["COLUMN_NAME"])." $a[COLUMN_TYPE]".($a["COLLATION_NAME"]?" COLLATE $a[COLLATION_NAME]":"").(isset($va)?" DEFAULT ".($va=="CURRENT_TIMESTAMP"?$va:$a["default"]):"").($a["IS_NULLABLE"]=="YES"?"":" NOT NULL").($a["EXTRA"]?" $a[EXTRA]":"").($a["COLUMN_COMMENT"]?" COMMENT ".q($a["COLUMN_COMMENT"]):"").($Mb?" AFTER ".idf_escape($Mb):" FIRST"));echo", ADD $a[alter]";$o[]=$a;$Mb=$a["COLUMN_NAME"];}echo"';
	DECLARE columns CURSOR FOR $j;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;
	SET @alter_table = '';
	OPEN columns;
	REPEAT
		FETCH columns INTO _column_name, _column_default, _is_nullable, _collation_name, _column_type, _extra, _column_comment;
		IF NOT done THEN
			SET set_after = 1;
			CASE _column_name";foreach($o
as$a){echo"
				WHEN ".q($a["COLUMN_NAME"])." THEN
					SET add_columns = REPLACE(add_columns, ', ADD $a[alter]', '');
					IF NOT (_column_default <=> $a[default]) OR _is_nullable != '$a[IS_NULLABLE]' OR _collation_name != '$a[COLLATION_NAME]' OR _column_type != ".q($a["COLUMN_TYPE"])." OR _extra != '$a[EXTRA]' OR _column_comment != ".q($a["COLUMN_COMMENT"])." OR after != $a[after] THEN
						SET @alter_table = CONCAT(@alter_table, ', MODIFY $a[alter]');
					END IF;";}echo"
				ELSE
					SET @alter_table = CONCAT(@alter_table, ', DROP ', _column_name);
					SET set_after = 0;
			END CASE;
			IF set_after THEN
				SET after = _column_name;
			END IF;
		END IF;
	UNTIL done END REPEAT;
	CLOSE columns;
	IF @alter_table != '' OR add_columns != '' THEN
		SET alter_command = CONCAT(alter_command, 'ALTER TABLE ".table($h)."', SUBSTR(CONCAT(add_columns, @alter_table), 2), ';\\n');
	END IF;
END;;
DELIMITER ;
CALL adminer_alter(@adminer_alter);
DROP PROCEDURE adminer_alter;

";}}}function
dump_data($h,$X,$C=""){global$g,$_;$Fe=($_=="sqlite"?0:1048576);if($X){if($_POST["format"]=="sql"&&$X=="TRUNCATE+INSERT"){echo
truncate_sql($h).";\n";}$o=fields($h);$i=$g->query(($C?$C:"SELECT * FROM ".table($h)),1);if($i){$pc="";$kb="";while($a=$i->fetch_assoc()){if($_POST["format"]!="sql"){dump_csv($a);}else{if(!$pc){$pc="INSERT INTO ".table($h)." (".implode(", ",array_map('idf_escape',array_keys($a))).") VALUES";}foreach($a
as$e=>$b){$a[$e]=(isset($b)?(ereg('int|float|double|decimal',$o[$e]["type"])?$b:q($b)):"NULL");}$ha=implode(",\t",$a);if($X=="INSERT+UPDATE"){$q=array();foreach($a
as$e=>$b){$q[]=idf_escape($e)." = $b";}echo"$pc ($ha) ON DUPLICATE KEY UPDATE ".implode(", ",$q).";\n";}else{$ha=($Fe?"\n":" ")."($ha)";if(!$kb){$kb=$pc.$ha;}elseif(strlen($kb)+2+strlen($ha)<$Fe){$kb.=",$ha";}else{$kb.=";\n";echo$kb;$kb=$pc.$ha;}}}}if($_POST["format"]=="sql"&&$X!="INSERT+UPDATE"&&$kb){$kb.=";\n";echo$kb;}}}}function
dump_headers($Ie,$Af=false){$Z=($Ie!=""?friendly_url($Ie):"adminer");$Lb=$_POST["output"];$Ab=($_POST["format"]=="sql"?"sql":($Af?"tar":"csv"));header("Content-Type: ".($Lb=="bz2"?"application/x-bzip":($Lb=="gz"?"application/x-gzip":($Ab=="tar"?"application/x-tar":($Ab=="sql"||$Lb!="file"?"text/plain":"text/csv")."; charset=utf-8"))));if($Lb!="text"){header("Content-Disposition: attachment; filename=$Z.$Ab".($Lb!="file"&&!ereg('[^0-9a-z]',$Lb)?".$Lb":""));}session_write_close();if($_POST["output"]=="bz2"){ob_start('bzcompress',1e6);}if($_POST["output"]=="gz"){ob_start('gzencode',1e6);}return$Ab;}session_cache_limiter("");if(!ini_bool("session.use_cookies")||@ini_set("session.use_cookies",false)!==false){session_write_close();}$fb=array("RESTRICT","CASCADE","SET NULL","NO ACTION");$Xa=" onclick=\"return confirm('".'Are you sure?'."');\"";$Fb='\'(?:\'\'|[^\'\\\\]|\\\\.)*\'|"(?:""|[^"\\\\]|\\\\.)*"';$wc=array("IN","OUT","INOUT");if(isset($_GET["select"])&&($_POST["edit"]||$_POST["clone"])&&!$_POST["save"]){$_GET["edit"]=$_GET["select"];}if(isset($_GET["callf"])){$_GET["call"]=$_GET["callf"];}if(isset($_GET["function"])){$_GET["procedure"]=$_GET["function"];}if(isset($_GET["download"])){$m=$_GET["download"];header("Content-Type: application/octet-stream");header("Content-Disposition: attachment; filename=".friendly_url("$m-".implode("_",$_GET["where"])).".".friendly_url($_GET["field"]));echo$g->result("SELECT".limit(idf_escape($_GET["field"])." FROM ".table($m)," WHERE ".where($_GET),1));exit;}elseif(isset($_GET["table"])){$m=$_GET["table"];$o=fields($m);if(!$o){$n=error();}$I=($o?table_status($m):array());page_header(($o&&is_view($I)?'View':'Table').": ".h($m),$n);$r->selectLinks($I);$ua=$I["Comment"];if($ua!=""){echo"<p>".'Comment'.": ".h($ua)."\n";}if($o){echo"<table cellspacing='0'>\n","<thead><tr><th>".'Column'."<td>".'Type'.(support("comment")?"<td>".'Comment':"")."</thead>\n";foreach($o
as$c){echo"<tr".odd()."><th>".h($c["field"]),"<td>".h($c["full_type"]).($c["null"]?" <i>NULL</i>":"").($c["auto_increment"]?" <i>".'Auto Increment'."</i>":""),(support("comment")?"<td>".nbsp($c["comment"]):""),"\n";}echo"</table>\n";if(!is_view($I)){echo"<h3>".'Indexes'."</h3>\n";$K=indexes($m);if($K){echo"<table cellspacing='0'>\n";foreach($K
as$f=>$v){ksort($v["columns"]);$oc=array();foreach($v["columns"]as$e=>$b){$oc[]="<i>".h($b)."</i>".($v["lengths"][$e]?"(".$v["lengths"][$e].")":"");}echo"<tr title='".h($f)."'><th>$v[type]<td>".implode(", ",$oc)."\n";}echo"</table>\n";}echo'<p><a href="'.h(ME).'indexes='.urlencode($m).'">'.'Alter indexes'."</a>\n";if(fk_support($I)){echo"<h3>".'Foreign keys'."</h3>\n";$ca=foreign_keys($m);if($ca){echo"<table cellspacing='0'>\n","<thead><tr><th>".'Source'."<td>".'Target'."<td>".'ON DELETE'."<td>".'ON UPDATE'.($_!="sqlite"?"<td>&nbsp;":"")."</thead>\n";foreach($ca
as$f=>$B){$x=($B["db"]!=""?"<b>".h($B["db"])."</b>.":"").h($B["table"]);echo"<tr>","<th><i>".implode("</i>, <i>",array_map('h',$B["source"]))."</i>","<td><a href='".h($B["db"]!=""?preg_replace('~db=[^&]*~',"db=".urlencode($B["db"]),ME):ME)."table=".urlencode($B["table"])."'>$x</a>","(<i>".implode("</i>, <i>",array_map('h',$B["target"]))."</i>)","<td>$B[on_delete]\n","<td>$B[on_update]\n";if($_!="sqlite"){echo'<td><a href="'.h(ME.'foreign='.urlencode($m).'&name='.urlencode($f)).'">'.'Alter'.'</a>';}}echo"</table>\n";}if($_!="sqlite"){echo'<p><a href="'.h(ME).'foreign='.urlencode($m).'">'.'Add foreign key'."</a>\n";}}if(support("trigger")){echo"<h3>".'Triggers'."</h3>\n";$rc=triggers($m);if($rc){echo"<table cellspacing='0'>\n";foreach($rc
as$e=>$b){echo"<tr valign='top'><td>$b[0]<td>$b[1]<th>".h($e)."<td><a href='".h(ME.'trigger='.urlencode($m).'&name='.urlencode($e))."'>".'Alter'."</a>\n";}echo"</table>\n";}echo'<p><a href="'.h(ME).'trigger='.urlencode($m).'">'.'Add trigger'."</a>\n";}}}}elseif(isset($_GET["schema"])){page_header('Database schema',"",array(),DB);$vb=array();$Je=array();preg_match_all('~([^:]+):([-0-9.]+)x([-0-9.]+)(_|$)~',$_COOKIE["adminer_schema"],$qa,PREG_SET_ORDER);foreach($qa
as$k=>$l){$vb[$l[1]]=array($l[2],$l[3]);$Je[]="\n\t'".addcslashes($l[1],"\r\n'\\/")."': [ $l[2], $l[3] ]";}$Wb=0;$Le=-1;$Ja=array();$He=array();$De=array();foreach(table_status()as$a){if(!isset($a["Engine"])){continue;}$jc=0;$Ja[$a["Name"]]["fields"]=array();foreach(fields($a["Name"])as$f=>$c){$jc+=1.25;$c["pos"]=$jc;$Ja[$a["Name"]]["fields"][$f]=$c;}$Ja[$a["Name"]]["pos"]=($vb[$a["Name"]]?$vb[$a["Name"]]:array($Wb,0));if(fk_support($a)){foreach(foreign_keys($a["Name"])as$b){if(!$b["db"]){$wa=$Le;if($vb[$a["Name"]][1]||$vb[$b["table"]][1]){$wa=min(floatval($vb[$a["Name"]][1]),floatval($vb[$b["table"]][1]))-1;}else{$Le-=.1;}while($De[(string)$wa]){$wa-=.0001;}$Ja[$a["Name"]]["references"][$b["table"]][(string)$wa]=array($b["source"],$b["target"]);$He[$b["table"]][$a["Name"]][(string)$wa]=$b["target"];$De[(string)$wa]=true;}}}$Wb=max($Wb,$Ja[$a["Name"]]["pos"][0]+2.5+$jc);}echo'<div id="schema" style="height: ',$Wb,'em;">
<script type="text/javascript">
tablePos = {',implode(",",$Je)."\n",'};
em = document.getElementById(\'schema\').offsetHeight / ',$Wb,';
document.onmousemove = schemaMousemove;
document.onmouseup = schemaMouseup;
</script>
';foreach($Ja
as$f=>$h){echo"<div class='table' style='top: ".$h["pos"][0]."em; left: ".$h["pos"][1]."em;' onmousedown='schemaMousedown(this, event);'>",'<a href="'.h(ME).'table='.urlencode($f).'"><b>'.h($f)."</b></a><br>\n";foreach($h["fields"]as$c){$b='<span'.type_class($c["type"]).' title="'.h($c["full_type"].($c["null"]?" NULL":'')).'">'.h($c["field"]).'</span>';echo($c["primary"]?"<i>$b</i>":$b)."<br>\n";}foreach((array)$h["references"]as$Xb=>$lc){foreach($lc
as$wa=>$Cc){$kc=$wa-$vb[$f][1];$k=0;foreach($Cc[0]as$Ca){echo"<div class='references' title='".h($Xb)."' id='refs$wa-".($k++)."' style='left: $kc"."em; top: ".$h["fields"][$Ca]["pos"]."em; padding-top: .5em;'><div style='border-top: 1px solid Gray; width: ".(-$kc)."em;'></div></div>\n";}}}foreach((array)$He[$f]as$Xb=>$lc){foreach($lc
as$wa=>$A){$kc=$wa-$vb[$f][1];$k=0;foreach($A
as$pa){echo"<div class='references' title='".h($Xb)."' id='refd$wa-".($k++)."' style='left: $kc"."em; top: ".$h["fields"][$pa]["pos"]."em; height: 1.25em; background: url(".h(preg_replace("~\\?.*~","",$_SERVER["REQUEST_URI"]))."?file=arrow.gif) no-repeat right center;&amp;version=3.0.1'><div style='height: .5em; border-bottom: 1px solid Gray; width: ".(-$kc)."em;'></div></div>\n";}}}echo"</div>\n";}foreach($Ja
as$f=>$h){foreach((array)$h["references"]as$Xb=>$lc){foreach($lc
as$wa=>$Cc){$Hc=$Wb;$ad=-10;foreach($Cc[0]as$e=>$Ca){$Ee=$h["pos"][0]+$h["fields"][$Ca]["pos"];$Ge=$Ja[$Xb]["pos"][0]+$Ja[$Xb]["fields"][$Cc[1][$e]]["pos"];$Hc=min($Hc,$Ee,$Ge);$ad=max($ad,$Ee,$Ge);}echo"<div class='references' id='refl$wa' style='left: $wa"."em; top: $Hc"."em; padding: .5em 0;'><div style='border-right: 1px solid Gray; margin-top: 1px; height: ".($ad-$Hc)."em;'></div></div>\n";}}}echo'</div>
';}elseif(isset($_GET["dump"])){$m=$_GET["dump"];if($_POST){$Me="";foreach(array("output","format","db_style","table_style","data_style")as$e){$Me.="&$e=".urlencode($_POST[$e]);}cookie("adminer_export",substr($Me,1));$Ab=dump_headers(($m!=""?$m:DB),(DB==""||count((array)$_POST["tables"]+(array)$_POST["data"])>1));if($_POST["format"]=="sql"){echo"-- Adminer $Wc ".$ja[DRIVER]." dump

".($_!="sql"?"":"SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = ".q($g->result("SELECT @@time_zone")).";
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

");}$X=$_POST["db_style"];$z=array(DB);if(DB==""){$z=$_POST["databases"];if(is_string($z)){$z=explode("\n",rtrim(str_replace("\r","",$z),"\n"));}}foreach((array)$z
as$s){if($g->select_db($s)){if($_POST["format"]=="sql"&&ereg('CREATE',$X)&&($fa=$g->result("SHOW CREATE DATABASE ".idf_escape($s),1))){if($X=="DROP+CREATE"){echo"DROP DATABASE IF EXISTS ".idf_escape($s).";\n";}echo($X=="CREATE+ALTER"?preg_replace('~^CREATE DATABASE ~','\\0IF NOT EXISTS ',$fa):$fa).";\n";}if($_POST["format"]=="sql"){if($X){echo
use_sql($s).";\n\n";}if(in_array("CREATE+ALTER",array($X,$_POST["table_style"]))){echo"SET @adminer_alter = '';\n\n";}$jb="";if($_POST["routines"]){foreach(array("FUNCTION","PROCEDURE")as$Ta){foreach(get_rows("SHOW $Ta STATUS WHERE Db = ".q($s),null,"-- ")as$a){$jb.=($X!='DROP+CREATE'?"DROP $Ta IF EXISTS ".idf_escape($a["Name"]).";;\n":"").$g->result("SHOW CREATE $Ta ".idf_escape($a["Name"]),2).";;\n\n";}}}if($_POST["events"]){foreach(get_rows("SHOW EVENTS",null,"-- ")as$a){$jb.=($X!='DROP+CREATE'?"DROP EVENT IF EXISTS ".idf_escape($a["Name"]).";;\n":"").$g->result("SHOW CREATE EVENT ".idf_escape($a["Name"]),3).";;\n\n";}}if($jb){echo"DELIMITER ;;\n\n$jb"."DELIMITER ;\n\n";}}if($_POST["table_style"]||$_POST["data_style"]){$aa=array();foreach(table_status()as$a){$h=(DB==""||in_array($a["Name"],(array)$_POST["tables"]));$Se=(DB==""||in_array($a["Name"],(array)$_POST["data"]));if($h||$Se){if(!is_view($a)){if($Ab=="tar"){ob_start();}dump_table($a["Name"],($h?$_POST["table_style"]:""));if($Se){dump_data($a["Name"],$_POST["data_style"]);}if($_POST["format"]=="sql"&&$_POST["triggers"]){$rc=trigger_sql($a["Name"],$_POST["table_style"]);if($rc){echo"\nDELIMITER ;;\n$rc\nDELIMITER ;\n";}}if($Ab=="tar"){echo
tar_file((DB!=""?"":"$s/")."$a[Name].csv",ob_get_clean());}elseif($_POST["format"]=="sql"){echo"\n";}}elseif($_POST["format"]=="sql"){$aa[]=$a["Name"];}}}foreach($aa
as$Bc){dump_table($Bc,$_POST["table_style"],true);}if($Ab=="tar"){echo
pack("x512");}}if($X=="CREATE+ALTER"&&$_POST["format"]=="sql"){$j="SELECT TABLE_NAME, ENGINE, TABLE_COLLATION, TABLE_COMMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE()";echo"DELIMITER ;;
CREATE PROCEDURE adminer_alter (INOUT alter_command text) BEGIN
	DECLARE _table_name, _engine, _table_collation varchar(64);
	DECLARE _table_comment varchar(64);
	DECLARE done bool DEFAULT 0;
	DECLARE tables CURSOR FOR $j;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;
	OPEN tables;
	REPEAT
		FETCH tables INTO _table_name, _engine, _table_collation, _table_comment;
		IF NOT done THEN
			CASE _table_name";foreach(get_rows($j)as$a){$ua=q($a["ENGINE"]=="InnoDB"?preg_replace('~(?:(.+); )?InnoDB free: .*~','\\1',$a["TABLE_COMMENT"]):$a["TABLE_COMMENT"]);echo"
				WHEN ".q($a["TABLE_NAME"])." THEN
					".(isset($a["ENGINE"])?"IF _engine != '$a[ENGINE]' OR _table_collation != '$a[TABLE_COLLATION]' OR _table_comment != $ua THEN
						ALTER TABLE ".idf_escape($a["TABLE_NAME"])." ENGINE=$a[ENGINE] COLLATE=$a[TABLE_COLLATION] COMMENT=$ua;
					END IF":"BEGIN END").";";}echo"
				ELSE
					SET alter_command = CONCAT(alter_command, 'DROP TABLE `', REPLACE(_table_name, '`', '``'), '`;\\n');
			END CASE;
		END IF;
	UNTIL done END REPEAT;
	CLOSE tables;
END;;
DELIMITER ;
CALL adminer_alter(@adminer_alter);
DROP PROCEDURE adminer_alter;
";}if(in_array("CREATE+ALTER",array($X,$_POST["table_style"]))&&$_POST["format"]=="sql"){echo"SELECT @adminer_alter;\n";}}}exit;}page_header('Export',"",($_GET["export"]!=""?array("table"=>$_GET["export"]):array()),DB);echo'
<form action="" method="post">
<table cellspacing="0">
';$Re=array('','USE','DROP+CREATE','CREATE');$je=array('','DROP+CREATE','CREATE');$Wd=array('','TRUNCATE+INSERT','INSERT');if($_=="sql"){$Re[]='CREATE+ALTER';$je[]='CREATE+ALTER';$Wd[]='INSERT+UPDATE';}parse_str($_COOKIE["adminer_export"],$a);if(!$a){$a=array("output"=>"text","format"=>"sql","db_style"=>(DB!=""?"":"CREATE"),"table_style"=>"DROP+CREATE","data_style"=>"INSERT");}$Ga=($_GET["dump"]=="");echo"<tr><th>".'Output'."<td>".$r->dumpOutput(0,$a["output"])."\n","<tr><th>".'Format'."<td>".$r->dumpFormat(0,$a["format"])."\n",($_=="sqlite"?"":"<tr><th>".'Database'."<td>".html_select('db_style',$Re,$a["db_style"]).(support("routine")?checkbox("routines",1,$Ga,'Routines'):"").(support("event")?checkbox("events",1,$Ga,'Events'):"")),"<tr><th>".'Tables'."<td>".html_select('table_style',$je,$a["table_style"]).checkbox("auto_increment",1,$a["table_style"],'Auto Increment').(support("trigger")?checkbox("triggers",1,$a["table_style"],'Triggers'):""),"<tr><th>".'Data'."<td>".html_select('data_style',$Wd,$a["data_style"]),'</table>
<p><input type="submit" value="Export">

<table cellspacing="0">
';$_d=array();if(DB!=""){$Ga=($m!=""?"":" checked");echo"<thead><tr>","<th style='text-align: left;'><label><input type='checkbox' id='check-tables'$Ga onclick='formCheck(this, /^tables\\[/);'>".'Tables'."</label>","<th style='text-align: right;'><label>".'Data'."<input type='checkbox' id='check-data'$Ga onclick='formCheck(this, /^data\\[/);'></label>","</thead>\n";$aa="";foreach(table_status()as$a){$f=$a["Name"];$gc=ereg_replace("_.*","",$f);$Ga=($m==""||$m==(substr($m,-1)=="%"?"$gc%":$f));$oc="<tr><td>".checkbox("tables[]",$f,$Ga,$f,"formUncheck('check-tables');");if(is_view($a)){$aa.="$oc\n";}else{echo"$oc<td align='right'><label>".($a["Engine"]=="InnoDB"&&$a["Rows"]?"~ ":"").$a["Rows"].checkbox("data[]",$f,$Ga,"","formUncheck('check-data');")."</label>\n";}$_d[$gc]++;}echo$aa;}else{echo"<thead><tr><th style='text-align: left;'><label><input type='checkbox' id='check-databases'".($m==""?" checked":"")." onclick='formCheck(this, /^databases\\[/);'>".'Database'."</label></thead>\n";$z=get_databases();if($z){foreach($z
as$s){if(!information_schema($s)){$gc=ereg_replace("_.*","",$s);echo"<tr><td>".checkbox("databases[]",$s,$m==""||$m=="$gc%",$s,"formUncheck('check-databases');")."</label>\n";$_d[$gc]++;}}}else{echo"<tr><td><textarea name='databases' rows='10' cols='20' onkeydown='return textareaKeydown(this, event);'></textarea>";}}echo'</table>
</form>
';$ib=true;foreach($_d
as$e=>$b){if($e!=""&&$b>1){echo($ib?"<p>":" ")."<a href='".h(ME)."dump=".urlencode("$e%")."'>".h($e)."</a>";$ib=false;}}}elseif(isset($_GET["privileges"])){page_header('Privileges');$i=$g->query("SELECT User, Host FROM mysql.user ORDER BY Host, User");if(!$i){echo'<form action=""><p>
';hidden_fields_get();echo'Username: <input name="user">
Server: <input name="host" value="localhost">
<input type="hidden" name="grant" value="">
<input type="submit" value="Edit">
</form>
';$i=$g->query("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', 1) AS User, SUBSTRING_INDEX(CURRENT_USER, '@', -1) AS Host");}echo"<table cellspacing='0'>\n","<thead><tr><th>&nbsp;<th>".'Username'."<th>".'Server'."</thead>\n";while($a=$i->fetch_assoc()){echo'<tr'.odd().'><td><a href="'.h(ME.'user='.urlencode($a["User"]).'&host='.urlencode($a["Host"])).'">'.'edit'.'</a><td>'.h($a["User"])."<td>".h($a["Host"])."\n";}echo"</table>\n",'<p><a href="'.h(ME).'user=">'.'Create user'."</a>";}elseif(isset($_GET["sql"])){restart_session();$gf=&get_session("queries");$eb=&$gf[DB];if(!$n&&$_POST["clear"]){$eb=array();redirect(remove_from_uri("history"));}page_header('SQL command',$n);if(!$n&&$_POST){$La=false;$j=$_POST["query"];if($_POST["webfile"]){$La=@fopen((file_exists("adminer.sql")?"adminer.sql":(file_exists("adminer.sql.gz")?"compress.zlib://adminer.sql.gz":"compress.bzip2://adminer.sql.bz2")),"rb");$j=($La?fread($La,1e6):false);}elseif($_FILES["sql_file"]["error"]!=4){$j=get_file("sql_file",true);}if(is_string($j)){if(function_exists('memory_get_usage')){@ini_set("memory_limit",2*strlen($j)+memory_get_usage()+8e6);}if($j!=""&&strlen($j)<1e6&&(!$eb||end($eb)!=$j)){$eb[]=$j;}$Ac="(\\s|/\\*.*\\*/|(#|-- )[^\n]*\n|--\n)";if(!ini_bool("session.use_cookies")){session_write_close();}$Ed=";";$N=0;$Ld=true;$H=connect();if(is_object($H)&&DB!=""){$H->select_db(DB);}$Yb=0;$kd="";while($j!=""){if(!$N&&preg_match('~^\\s*DELIMITER\\s+(.+)~i',$j,$l)){$Ed=$l[1];$j=substr($j,strlen($l[0]));}else{preg_match('('.preg_quote($Ed).'|[\'`"]|/\\*|-- |#|$)',$j,$l,PREG_OFFSET_CAPTURE,$N);$oa=$l[0][0];$N=$l[0][1]+strlen($oa);if(!$oa&&$La&&!feof($La)){$j.=fread($La,1e5);}else{if(!$oa&&rtrim($j)==""){break;}if(!$oa||$oa==$Ed){$Ld=false;$ya=substr($j,0,$l[0][1]);$Yb++;echo"<pre class='jush-$_' id='sql-$Yb'>".shorten_utf8(trim($ya),1000)."</pre>\n";ob_flush();flush();$ld=explode(" ",microtime());if(!$g->multi_query($ya)){echo"<p class='error'>".'Error in query'.": ".error()."\n";$kd.=" <a href='#sql-$Yb'>$Yb</a>";if($_POST["error_stops"]){break;}}else{if(is_object($H)&&preg_match("~^$Ac*(USE)\\b~isU",$ya)){$H->query($ya);}do{$i=$g->store_result();$dd=explode(" ",microtime());$be=" <span class='time'>(".sprintf('%.3f s',max(0,$dd[0]-$ld[0]+$dd[1]-$ld[1])).")</span>";if(is_object($i)){select($i,$H);echo"<p>".($i->num_rows?lang(array('%d row','%d rows'),$i->num_rows):"").$be;if($H&&preg_match("~^($Ac|\\()*SELECT\\b~isU",$ya)){$U="explain-$Yb";echo", <a href='#$U' onclick=\"return !toggle('$U');\">EXPLAIN</a>\n","<div id='$U' class='hidden'>\n";select(explain($H,$ya));echo"</div>\n";}}else{if(preg_match("~^$Ac*(CREATE|DROP|ALTER)$Ac+(DATABASE|SCHEMA)\\b~isU",$ya)){restart_session();set_session("dbs",null);session_write_close();}echo"<p class='message' title='".h($g->info)."'>".lang(array('Query executed OK, %d row affected.','Query executed OK, %d rows affected.'),$g->affected_rows)."$be\n";}$ld=$dd;}while($g->next_result());}$j=substr($j,$N);$N=0;}else{while(preg_match('~'.($oa=='/*'?'\\*/':(ereg('-- |#',$oa)?"\n":"$oa|\\\\.")).'|$~s',$j,$l,PREG_OFFSET_CAPTURE,$N)){$ha=$l[0][0];$N=$l[0][1]+strlen($ha);if(!$ha&&$La&&!feof($La)){$j.=fread($La,1e6);}elseif($ha[0]!="\\"){break;}}}}}}if($kd&&$Yb>1){echo"<p class='error'>".'Error in query'.": $kd\n";}if($Ld){echo"<p class='message'>".'No commands to execute.'."\n";}}else{echo"<p class='error'>".upload_error($j)."\n";}}echo'
<form action="" method="post" enctype="multipart/form-data">
<p>';$ya=$_GET["sql"];if($_POST){$ya=$_POST["query"];}elseif($_GET["history"]!=""){$ya=$eb[$_GET["history"]];}textarea("query",$ya,20);echo($_POST?"":"<script type='text/javascript'>document.getElementsByTagName('textarea')[0].focus();</script>\n"),"<p>".(ini_bool("file_uploads")?'File upload'.': <input type="file" name="sql_file">':'File uploads are disabled.'),'<p>
<input type="hidden" name="token" value="',$L,'">
<input type="submit" value="Execute" title="Ctrl+Enter">
',checkbox("error_stops",1,$_POST["error_stops"],'Stop on error');print_fieldset("webfile",'From server',$_POST["webfile"]);$md=array();foreach(array("gz"=>"zlib","bz2"=>"bz2")as$e=>$b){if(extension_loaded($b)){$md[]=".$e";}}echo
sprintf('Webserver file %s',"<code>adminer.sql".($md?"[".implode("|",$md)."]":"")."</code>"),' <input type="submit" name="webfile" value="'.'Run file'.'">',"</div></fieldset>\n";if($eb){print_fieldset("history",'History',$_GET["history"]!="");foreach($eb
as$e=>$b){echo'<a href="'.h(ME."sql=&history=$e").'">'.'Edit'."</a> <code class='jush-$_'>".shorten_utf8(ltrim(str_replace("\n"," ",str_replace("\r","",preg_replace('~^(#|-- ).*~m','',$b)))),80,"</code>")."<br>\n";}echo"<input type='submit' name='clear' value='".'Clear'."'>\n","</div></fieldset>\n";}echo'
</form>
';}elseif(isset($_GET["edit"])){$m=$_GET["edit"];$t=(isset($_GET["select"])?(count($_POST["check"])==1?where_check($_POST["check"][0]):""):where($_GET));$na=(isset($_GET["select"])?$_POST["edit"]:$t);$o=fields($m);foreach($o
as$f=>$c){if(!isset($c["privileges"][$na?"update":"insert"])||$r->fieldName($c)==""){unset($o[$f]);}}if($_POST&&!$n&&!isset($_GET["select"])){$ka=$_POST["referer"];if($_POST["insert"]){$ka=($na?null:$_SERVER["REQUEST_URI"]);}elseif(!ereg('^.+&select=.+$',$ka)){$ka=ME."select=".urlencode($m);}if(isset($_POST["delete"])){query_redirect("DELETE".limit1("FROM ".table($m)," WHERE $t"),$ka,'Item has been deleted.');}else{$q=array();foreach($o
as$f=>$c){$b=process_input($c);if($b!==false&&$b!==null){$q[idf_escape($f)]=($na?"\n".idf_escape($f)." = $b":$b);}}if($na){if(!$q){redirect($ka);}query_redirect("UPDATE".limit1(table($m)." SET".implode(",",$q),"\nWHERE $t"),$ka,'Item has been updated.');}else{$i=insert_into($m,$q);$ce=($i?last_id():0);queries_redirect($ka,sprintf('Item%s has been inserted.',($ce?" $ce":"")),$i);}}}$Da=$r->tableName(table_status($m));page_header(($na?'Edit':'Insert'),$n,array("select"=>array($m,$Da)),$Da);$a=null;if($_POST["save"]){$a=(array)$_POST["fields"];}elseif($t){$C=array();foreach($o
as$f=>$c){if(isset($c["privileges"]["select"])){$C[]=($_POST["clone"]&&$c["auto_increment"]?"'' AS ":(ereg("enum|set",$c["type"])?"1*".idf_escape($f)." AS ":"")).idf_escape($f);}}$a=array();if($C){$F=get_rows("SELECT".limit(implode(", ",$C)." FROM ".table($m)," WHERE $t",(isset($_GET["select"])?2:1)));$a=(isset($_GET["select"])&&count($F)!=1?null:reset($F));}}echo'
<form action="" method="post" enctype="multipart/form-data">
';if($o){echo"<table cellspacing='0'>\n";foreach($o
as$f=>$c){echo"<tr><th>".$r->fieldName($c);$va=$_GET["set"][bracket_escape($f)];$p=(isset($a)?($a[$f]!=""&&ereg("enum|set",$c["type"])?intval($a[$f]):$a[$f]):(!$na&&$c["auto_increment"]?"":(isset($_GET["select"])?false:(isset($va)?$va:$c["default"]))));if(!$_POST["save"]&&is_string($p)){$p=$r->editVal($p,$c);}$O=($_POST["save"]?(string)$_POST["function"][$f]:($t&&$c["on_update"]=="CURRENT_TIMESTAMP"?"now":($p===false?null:(isset($p)?'':'NULL'))));if($c["type"]=="timestamp"&&$p=="CURRENT_TIMESTAMP"){$p="";$O="now";}input($c,$p,$O);echo"\n";}echo"</table>\n";}echo'<p>
<input type="hidden" name="token" value="',$L,'">
<input type="hidden" name="referer" value="',h(isset($_POST["referer"])?$_POST["referer"]:$_SERVER["HTTP_REFERER"]),'">
<input type="hidden" name="save" value="1">
';if(isset($_GET["select"])){hidden_fields(array("check"=>(array)$_POST["check"],"clone"=>$_POST["clone"],"all"=>$_POST["all"]));}if($o){echo"<input type='submit' value='".'Save'."'>\n";if(!isset($_GET["select"])){echo'<input type="submit" name="insert" value="'.($na?'Save and continue edit':'Save and insert next')."\">\n";}}if($na){echo"<input type='submit' name='delete' value='".'Delete'."'$Xa>\n";}echo'</form>
';}elseif(isset($_GET["create"])){$m=$_GET["create"];$de=array('HASH','LINEAR HASH','KEY','LINEAR KEY','RANGE','LIST');$Od=referencable_primary($m);$ca=array();foreach($Od
as$Da=>$c){$ca[str_replace("`","``",$Da)."`".str_replace("`","``",$c["field"])]=$Da;}$Jc=array();$zc=array();if($m!=""){$Jc=fields($m);$zc=table_status($m);}if($_POST&&!$n&&!$_POST["add"]&&!$_POST["drop_col"]&&!$_POST["up"]&&!$_POST["down"]){if($_POST["drop"]){query_redirect("DROP TABLE ".table($m),substr(ME,0,-1),'Table has been dropped.');}else{$o=array();$db=array();ksort($_POST["fields"]);$ed=reset($Jc);$Mb="FIRST";foreach($_POST["fields"]as$e=>$c){$B=$ca[$c["type"]];$_c=(isset($B)?$Od[$B]:$c);if($c["field"]!=""){if(!$c["has_default"]){$c["default"]=null;}$va=eregi_replace(" *on update CURRENT_TIMESTAMP","",$c["default"]);if($va!=$c["default"]){$c["on_update"]="CURRENT_TIMESTAMP";$c["default"]=$va;}if($e==$_POST["auto_increment_col"]){$c["auto_increment"]=true;}$Xd=process_field($c,$_c);if($Xd!=process_field($ed,$ed)){$o[]=array($c["orig"],$Xd,$Mb);}if(isset($B)){$db[]=($m!=""?"ADD":" ")." FOREIGN KEY (".idf_escape($c["field"]).") REFERENCES ".idf_escape($ca[$c["type"]])." (".idf_escape($_c["field"]).")".(in_array($c["on_delete"],$fb)?" ON DELETE $c[on_delete]":"");}$Mb="AFTER ".idf_escape($c["field"]);}elseif($c["orig"]!=""){$o[]=array($c["orig"]);}if($c["orig"]!=""){$ed=next($Jc);}}$pb="";if(in_array($_POST["partition_by"],$de)){$rd=array();if($_POST["partition_by"]=='RANGE'||$_POST["partition_by"]=='LIST'){foreach(array_filter($_POST["partition_names"])as$e=>$b){$p=$_POST["partition_values"][$e];$rd[]="\nPARTITION ".idf_escape($b)." VALUES ".($_POST["partition_by"]=='RANGE'?"LESS THAN":"IN").($p!=""?" ($p)":" MAXVALUE");}}$pb.="\nPARTITION BY $_POST[partition_by]($_POST[partition])".($rd?" (".implode(",",$rd)."\n)":($_POST["partitions"]?" PARTITIONS ".intval($_POST["partitions"]):""));}elseif($m!=""&&support("partitioning")){$pb.="\nREMOVE PARTITIONING";}$za='Table has been altered.';if($m==""){cookie("adminer_engine",$_POST["Engine"]);$za='Table has been created.';}queries_redirect(ME."table=".urlencode($_POST["name"]),$za,alter_table($m,$_POST["name"],$o,$db,$_POST["Comment"],($_POST["Engine"]&&$_POST["Engine"]!=$zc["Engine"]?$_POST["Engine"]:""),($_POST["Collation"]&&$_POST["Collation"]!=$zc["Collation"]?$_POST["Collation"]:""),($_POST["Auto_increment"]!=""?preg_replace('~\\D+~','',$_POST["Auto_increment"]):""),$pb));}}page_header(($m!=""?'Alter table':'Create table'),$n,array("table"=>$m),$m);$a=array("Engine"=>$_COOKIE["adminer_engine"],"fields"=>array(array("field"=>"")),"partition_names"=>array(""),);if($_POST){$a=$_POST;if($a["auto_increment_col"]){$a["fields"][$a["auto_increment_col"]]["auto_increment"]=true;}process_fields($a["fields"]);}elseif($m!=""){$a=$zc;$a["name"]=$m;$a["fields"]=array();if(!$_GET["auto_increment"]){$a["Auto_increment"]="";}foreach($Jc
as$c){$c["has_default"]=isset($c["default"]);if($c["on_update"]){$c["default"].=" ON UPDATE $c[on_update]";}$a["fields"][]=$c;}if(support("partitioning")){$Tb="FROM information_schema.PARTITIONS WHERE TABLE_SCHEMA = ".q(DB)." AND TABLE_NAME = ".q($m);$i=$g->query("SELECT PARTITION_METHOD, PARTITION_ORDINAL_POSITION, PARTITION_EXPRESSION $Tb ORDER BY PARTITION_ORDINAL_POSITION LIMIT 1");list($a["partition_by"],$a["partitions"],$a["partition"])=$i->fetch_row();$a["partition_names"]=array();$a["partition_values"]=array();foreach(get_rows("SELECT PARTITION_NAME, PARTITION_DESCRIPTION $Tb AND PARTITION_NAME != '' ORDER BY PARTITION_ORDINAL_POSITION")as$Pc){$a["partition_names"][]=$Pc["PARTITION_NAME"];$a["partition_values"][]=$Pc["PARTITION_DESCRIPTION"];}$a["partition_names"][]="";}}$W=collations();$Bd=floor(extension_loaded("suhosin")?(min(ini_get("suhosin.request.max_vars"),ini_get("suhosin.post.max_vars"))-13)/10:0);if($Bd&&count($a["fields"])>$Bd){echo"<p class='error'>".h(sprintf('Maximum number of allowed fields exceeded. Please increase %s and %s.','suhosin.post.max_vars','suhosin.request.max_vars'))."\n";}$xd=engines();foreach($xd
as$tb){if(!strcasecmp($tb,$a["Engine"])){$a["Engine"]=$tb;break;}}echo'
<form action="" method="post" id="form">
<p>
Table name: <input name="name" maxlength="64" value="',h($a["name"]),'">
',($xd?html_select("Engine",array(""=>"(".'engine'.")")+$xd,$a["Engine"]):""),' ',($W&&!ereg("sqlite|mssql",$_)?html_select("Collation",array(""=>"(".'collation'.")")+$W,$a["Collation"]):""),' <input type="submit" value="Save">
<table cellspacing="0" id="edit-fields" class="nowrap">
';$Cb=edit_fields($a["fields"],$W,"TABLE",$Bd,$ca,$a["Comment"]!="");echo'</table>
<p>
Auto Increment: <input name="Auto_increment" size="6" value="',h($a["Auto_increment"]);?>">
<script type="text/javascript">
document.write('<label><input type="checkbox" onclick="columnShow(this.checked, 5);">Default values<\/label>');
</script>
<?php echo(support("comment")?checkbox("","",$Cb,'Comment',"columnShow(this.checked, 6); toggle('Comment'); if (this.checked) this.form['Comment'].focus();").' <input id="Comment" name="Comment" value="'.h($a["Comment"]).'" maxlength="60"'.($Cb?'':' class="hidden"').'>':''),'<p>
<input type="hidden" name="token" value="',$L,'">
<input type="submit" value="Save">
';if(strlen($_GET["create"])){echo'<input type="submit" name="drop" value="Drop"',$Xa,'>';}if(support("partitioning")){$Vd=ereg('RANGE|LIST',$a["partition_by"]);print_fieldset("partition",'Partition by',$a["partition_by"]);echo'<p>
',html_select("partition_by",array(-1=>"")+$de,$a["partition_by"],"partitionByChange(this);"),'(<input name="partition" value="',h($a["partition"]),'">)
Partitions: <input name="partitions" size="2" value="',h($a["partitions"]),'"',($Vd||!$a["partition_by"]?" class='hidden'":""),'>
<table cellspacing="0" id="partition-table"',($Vd?"":" class='hidden'"),'>
<thead><tr><th>Partition name<th>Values</thead>
';foreach($a["partition_names"]as$e=>$b){echo'<tr>','<td><input name="partition_names[]" value="'.h($b).'"'.($e==count($a["partition_names"])-1?' onchange="partitionNameChange(this);"':'').'>','<td><input name="partition_values[]" value="'.h($a["partition_values"][$e]).'">';}echo'</table>
</div></fieldset>
';}echo'</form>
';}elseif(isset($_GET["indexes"])){$m=$_GET["indexes"];$Dc=array("PRIMARY","UNIQUE","INDEX");$I=table_status($m);if(ereg("MyISAM|Maria",$I["Engine"])){$Dc[]="FULLTEXT";}$K=indexes($m);if($_=="sqlite"){unset($Dc[0]);unset($K[""]);}if($_POST&&!$n&&!$_POST["add"]){$u=array();foreach($_POST["indexes"]as$v){if(in_array($v["type"],$Dc)){$A=array();$Rb=array();$q=array();ksort($v["columns"]);foreach($v["columns"]as$e=>$J){if($J!=""){$da=$v["lengths"][$e];$q[]=idf_escape($J).($da?"(".intval($da).")":"");$A[]=$J;$Rb[]=($da?$da:null);}}if($A){foreach($K
as$f=>$xb){ksort($xb["columns"]);ksort($xb["lengths"]);if($v["type"]==$xb["type"]&&array_values($xb["columns"])===$A&&(!$xb["lengths"]||array_values($xb["lengths"])===$Rb)){unset($K[$f]);continue
2;}}$u[]=array($v["type"],"(".implode(", ",$q).")");}}}foreach($K
as$f=>$xb){$u[]=array($xb["type"],idf_escape($f),"DROP");}if(!$u){redirect(ME."table=".urlencode($m));}queries_redirect(ME."table=".urlencode($m),'Indexes have been altered.',alter_indexes($m,$u));}page_header('Indexes',$n,array("table"=>$m),$m);$o=array_keys(fields($m));$a=array("indexes"=>$K);if($_POST){$a=$_POST;if($_POST["add"]){foreach($a["indexes"]as$e=>$v){if($v["columns"][count($v["columns"])]!=""){$a["indexes"][$e]["columns"][]="";}}$v=end($a["indexes"]);if($v["type"]||array_filter($v["columns"],'strlen')||array_filter($v["lengths"],'strlen')){$a["indexes"][]=array("columns"=>array(1=>""));}}}else{foreach($a["indexes"]as$e=>$v){$a["indexes"][$e]["columns"][]="";}$a["indexes"][]=array("columns"=>array(1=>""));}echo'
<form action="" method="post">
<table cellspacing="0" class="nowrap">
<thead><tr><th>Index Type<th>Column (length)</thead>
';$la=1;foreach($a["indexes"]as$v){echo"<tr><td>".html_select("indexes[$la][type]",array(-1=>"")+$Dc,$v["type"],($la==count($a["indexes"])?"indexesAddRow(this);":1))."<td>";ksort($v["columns"]);$k=1;foreach($v["columns"]as$J){echo"<span>".html_select("indexes[$la][columns][$k]",array(-1=>"")+$o,$J,($k==count($v["columns"])?"indexesAddColumn(this);":1)),"<input name='indexes[$la][lengths][$k]' size='2' value='".h($v["lengths"][$k])."'> </span>";$k++;}$la++;}echo'</table>
<p>
<input type="hidden" name="token" value="',$L,'">
<input type="submit" value="Save">
<noscript><p><input type="submit" name="add" value="Add next"></noscript>
</form>
';}elseif(isset($_GET["database"])){if($_POST&&!$n&&!isset($_POST["add_x"])){restart_session();if($_POST["drop"]){$_GET["db"]="";queries_redirect(remove_from_uri("db|database"),'Database has been dropped.',drop_databases(array(DB)));}elseif(DB!==$_POST["name"]){if(DB!=""){$_GET["db"]=$_POST["name"];queries_redirect(preg_replace('~db=[^&]*&~','',ME)."db=".urlencode($_POST["name"]),'Database has been renamed.',rename_database($_POST["name"],$_POST["collation"]));}else{$z=explode("\n",str_replace("\r","",$_POST["name"]));$Md=true;$rb="";foreach($z
as$s){if(count($z)==1||$s!=""){if(!create_database($s,$_POST["collation"])){$Md=false;}$rb=$s;}}queries_redirect(ME."db=".urlencode($rb),'Database has been created.',$Md);}}else{if(!$_POST["collation"]){redirect(substr(ME,0,-1));}query_redirect("ALTER DATABASE ".idf_escape($_POST["name"]).(eregi('^[a-z0-9_]+$',$_POST["collation"])?" COLLATE $_POST[collation]":""),substr(ME,0,-1),'Database has been altered.');}}page_header(DB!=""?'Alter database':'Create database',$n,array(),DB);$W=collations();$f=DB;$xc=null;if($_POST){$f=$_POST["name"];$xc=$_POST["collation"];}elseif(DB!=""){$xc=db_collation(DB,$W);}elseif($_=="sql"){foreach(get_vals("SHOW GRANTS")as$ga){if(preg_match('~ ON (`(([^\\\\`]|``|\\\\.)*)%`\\.\\*)?~',$ga,$l)&&$l[1]){$f=stripcslashes(idf_unescape("`$l[2]`"));break;}}}echo'
<form action="" method="post">
<p>
',($_POST["add_x"]||strpos($f,"\n")?'<textarea name="name" rows="10" cols="40" onkeydown="return textareaKeydown(this, event);">'.h($f).'</textarea><br>':'<input name="name" value="'.h($f).'" maxlength="64">')."\n".($W?html_select("collation",array(""=>"(".'collation'.")")+$W,$xc):""),'<input type="hidden" name="token" value="',$L,'">
<input type="submit" value="Save">
';if(DB!=""){echo"<input type='submit' name='drop' value='".'Drop'."'$Xa>\n";}elseif(!$_POST["add_x"]&&$_GET["db"]==""){echo"<input type='image' name='add' src='".h(preg_replace("~\\?.*~","",$_SERVER["REQUEST_URI"]))."?file=plus.gif&amp;version=3.0.1' alt='+' title='".'Add next'."'>\n";}echo'</form>
';}elseif(isset($_GET["scheme"])){if($_POST&&!$n){$x=preg_replace('~ns=[^&]*&~','',ME)."ns=";if($_POST["drop"]){query_redirect("DROP SCHEMA ".idf_escape($_GET["ns"]),$x,'Schema has been dropped.');}else{$x.=urlencode($_POST["name"]);if($_GET["ns"]==""){query_redirect("CREATE SCHEMA ".idf_escape($_POST["name"]),$x,'Schema has been created.');}elseif($_GET["ns"]!=$_POST["name"]){query_redirect("ALTER SCHEMA ".idf_escape($_GET["ns"])." RENAME TO ".idf_escape($_POST["name"]),$x,'Schema has been altered.');}else{redirect($x);}}}page_header($_GET["ns"]!=""?'Alter schema':'Create schema',$n);$a=array("name"=>$_GET["ns"]);if($_POST){$a=$_POST;}echo'
<form action="" method="post">
<p><input name="name" value="',h($a["name"]),'">
<input type="hidden" name="token" value="',$L,'">
<input type="submit" value="Save">
';if($_GET["ns"]!=""){echo"<input type='submit' name='drop' value='".'Drop'."'$Xa>\n";}echo'</form>
';}elseif(isset($_GET["call"])){$Ua=$_GET["call"];page_header('Call'.": ".h($Ua),$n);$Ta=routine($Ua,(isset($_GET["callf"])?"FUNCTION":"PROCEDURE"));$Db=array();$jb=array();foreach($Ta["fields"]as$k=>$c){if(substr($c["inout"],-3)=="OUT"){$jb[$k]="@".idf_escape($c["field"])." AS ".idf_escape($c["field"]);}if(!$c["inout"]||substr($c["inout"],0,2)=="IN"){$Db[]=$k;}}if(!$n&&$_POST){$Gd=array();foreach($Ta["fields"]as$e=>$c){if(in_array($e,$Db)){$b=process_input($c);if($b===false){$b="''";}if(isset($jb[$e])){$g->query("SET @".idf_escape($c["field"])." = $b");}}$Gd[]=(isset($jb[$e])?"@".idf_escape($c["field"]):$b);}$j=(isset($_GET["callf"])?"SELECT":"CALL")." ".idf_escape($Ua)."(".implode(", ",$Gd).")";echo"<p><code class='jush-$_'>".h($j)."</code> <a href='".h(ME)."sql=".urlencode($j)."'>".'Edit'."</a>\n";if(!$g->multi_query($j)){echo"<p class='error'>".error()."\n";}else{do{$i=$g->store_result();if(is_object($i)){select($i);}else{echo"<p class='message'>".lang(array('Routine has been called, %d row affected.','Routine has been called, %d rows affected.'),$g->affected_rows)."\n";}}while($g->next_result());if($jb){select($g->query("SELECT ".implode(", ",$jb)));}}}echo'
<form action="" method="post">
';if($Db){echo"<table cellspacing='0'>\n";foreach($Db
as$e){$c=$Ta["fields"][$e];$f=$c["field"];echo"<tr><th>".$r->fieldName($c);$p=$_POST["fields"][$f];if($p!=""&&ereg("enum|set",$c["type"])){$p=intval($p);}input($c,$p,(string)$_POST["function"][$f]);echo"\n";}echo"</table>\n";}echo'<p>
<input type="hidden" name="token" value="',$L,'">
<input type="submit" value="Call">
</form>
';}elseif(isset($_GET["foreign"])){$m=$_GET["foreign"];if($_POST&&!$n&&!$_POST["add"]&&!$_POST["change"]&&!$_POST["change-js"]){if($_POST["drop"]){query_redirect("ALTER TABLE ".table($m)."\nDROP ".($_=="sql"?"FOREIGN KEY ":"CONSTRAINT ").idf_escape($_GET["name"]),ME."table=".urlencode($m),'Foreign key has been dropped.');}else{$Ca=array_filter($_POST["source"],'strlen');ksort($Ca);$pa=array();foreach($Ca
as$e=>$b){$pa[$e]=$_POST["target"][$e];}query_redirect("ALTER TABLE ".table($m).($_GET["name"]!=""?"\nDROP FOREIGN KEY ".idf_escape($_GET["name"]).",":"")."\nADD FOREIGN KEY (".implode(", ",array_map('idf_escape',$Ca)).") REFERENCES ".table($_POST["table"])." (".implode(", ",array_map('idf_escape',$pa)).")".(in_array($_POST["on_delete"],$fb)?" ON DELETE $_POST[on_delete]":"").(in_array($_POST["on_update"],$fb)?" ON UPDATE $_POST[on_update]":""),ME."table=".urlencode($m),($_GET["name"]!=""?'Foreign key has been altered.':'Foreign key has been created.'));$n='Source and target columns must have the same data type, there must be an index on the target columns and referenced data must exist.'."<br>$n";}}page_header('Foreign key',$n,array("table"=>$m),$m);$a=array("table"=>$m,"source"=>array(""));if($_POST){$a=$_POST;ksort($a["source"]);if($_POST["add"]){$a["source"][]="";}elseif($_POST["change"]||$_POST["change-js"]){$a["target"]=array();}}elseif($_GET["name"]!=""){$ca=foreign_keys($m);$a=$ca[$_GET["name"]];$a["source"][]="";}$Ca=array_keys(fields($m));$pa=($m===$a["table"]?$Ca:array_keys(fields($a["table"])));$ae=array();foreach(table_status()as$f=>$I){if(fk_support($I)){$ae[]=$f;}}echo'
<form action="" method="post">
<p>
';if($a["db"]==""){echo'Target table:
',html_select("table",$ae,$a["table"],"this.form['change-js'].value = '1'; this.form.submit();"),'<input type="hidden" name="change-js" value="">
<noscript><p><input type="submit" name="change" value="Change"></noscript>
<table cellspacing="0">
<thead><tr><th>Source<th>Target</thead>
';$la=0;foreach($a["source"]as$e=>$b){echo"<tr>","<td>".html_select("source[".intval($e)."]",array(-1=>"")+$Ca,$b,($la==count($a["source"])-1?"foreignAddRow(this);":1)),"<td>".html_select("target[".intval($e)."]",$pa,$a["target"][$e]);$la++;}echo'</table>
<p>
ON DELETE: ',html_select("on_delete",array(-1=>"")+$fb,$a["on_delete"]),' ON UPDATE: ',html_select("on_update",array(-1=>"")+$fb,$a["on_update"]),'<p>
<input type="submit" value="Save">
<noscript><p><input type="submit" name="add" value="Add column"></noscript>
';}if($_GET["name"]!=""){echo'<input type="submit" name="drop" value="Drop"',$Xa,'>';}echo'<input type="hidden" name="token" value="',$L,'">
</form>
';}elseif(isset($_GET["view"])){$m=$_GET["view"];$Ya=false;if($_POST&&!$n){$Ya=drop_create("DROP VIEW ".table($m),"CREATE VIEW ".table($_POST["name"])." AS\n$_POST[select]",($_POST["drop"]?substr(ME,0,-1):ME."table=".urlencode($_POST["name"])),'View has been dropped.','View has been altered.','View has been created.',$m);}page_header(($m!=""?'Alter view':'Create view'),$n,array("table"=>$m),$m);$a=array();if($_POST){$a=$_POST;}elseif($m!=""){$a=view($m);$a["name"]=$m;}echo'
<form action="" method="post">
<p>Name: <input name="name" value="',h($a["name"]),'" maxlength="64">
<p>';textarea("select",$a["select"]);echo'<p>
<input type="hidden" name="token" value="',$L,'">
';if($Ya){echo'<input type="hidden" name="dropped" value="1">';}echo'<input type="submit" value="Save">
</form>
';}elseif(isset($_GET["event"])){$lb=$_GET["event"];$fe=array("YEAR","QUARTER","MONTH","DAY","HOUR","MINUTE","WEEK","SECOND","YEAR_MONTH","DAY_HOUR","DAY_MINUTE","DAY_SECOND","HOUR_MINUTE","HOUR_SECOND","MINUTE_SECOND");$zd=array("ENABLED"=>"ENABLE","DISABLED"=>"DISABLE","SLAVESIDE_DISABLED"=>"DISABLE ON SLAVE");if($_POST&&!$n){if($_POST["drop"]){query_redirect("DROP EVENT ".idf_escape($lb),substr(ME,0,-1),'Event has been dropped.');}elseif(in_array($_POST["INTERVAL_FIELD"],$fe)&&isset($zd[$_POST["STATUS"]])){$Td="\nON SCHEDULE ".($_POST["INTERVAL_VALUE"]?"EVERY ".q($_POST["INTERVAL_VALUE"])." $_POST[INTERVAL_FIELD]".($_POST["STARTS"]?" STARTS ".q($_POST["STARTS"]):"").($_POST["ENDS"]?" ENDS ".q($_POST["ENDS"]):""):"AT ".q($_POST["STARTS"]))." ON COMPLETION".($_POST["ON_COMPLETION"]?"":" NOT")." PRESERVE";query_redirect(($lb!=""?"ALTER EVENT ".idf_escape($lb).$Td.($lb!=$_POST["EVENT_NAME"]?"\nRENAME TO ".idf_escape($_POST["EVENT_NAME"]):""):"CREATE EVENT ".idf_escape($_POST["EVENT_NAME"]).$Td)."\n".$zd[$_POST["STATUS"]]." COMMENT ".q($_POST["EVENT_COMMENT"])." DO\n$_POST[EVENT_DEFINITION]",substr(ME,0,-1),($lb!=""?'Event has been altered.':'Event has been created.'));}}page_header(($lb!=""?'Alter event'.": ".h($lb):'Create event'),$n);$a=array();if($_POST){$a=$_POST;}elseif($lb!=""){$F=get_rows("SELECT * FROM information_schema.EVENTS WHERE EVENT_SCHEMA = ".q(DB)." AND EVENT_NAME = ".q($lb));$a=reset($F);}echo'
<form action="" method="post">
<table cellspacing="0">
<tr><th>Name<td><input name="EVENT_NAME" value="',h($a["EVENT_NAME"]),'" maxlength="64">
<tr><th>Start<td><input name="STARTS" value="',h("$a[EXECUTE_AT]$a[STARTS]"),'">
<tr><th>End<td><input name="ENDS" value="',h($a["ENDS"]),'">
<tr><th>Every<td><input name="INTERVAL_VALUE" value="',h($a["INTERVAL_VALUE"]),'" size="6"> ',html_select("INTERVAL_FIELD",$fe,$a["INTERVAL_FIELD"]),'<tr><th>Status<td>',html_select("STATUS",$zd,$a["STATUS"]),'<tr><th>Comment<td><input name="EVENT_COMMENT" value="',h($a["EVENT_COMMENT"]),'" maxlength="64">
<tr><th>&nbsp;<td>',checkbox("ON_COMPLETION","PRESERVE",$a["ON_COMPLETION"]=="PRESERVE",'On completion preserve'),'</table>
<p>';textarea("EVENT_DEFINITION",$a["EVENT_DEFINITION"]);echo'<p>
<input type="hidden" name="token" value="',$L,'">
<input type="submit" value="Save">
';if($lb!=""){echo'<input type="submit" name="drop" value="Drop"',$Xa,'>';}echo'</form>
';}elseif(isset($_GET["procedure"])){$Ua=$_GET["procedure"];$Ta=(isset($_GET["function"])?"FUNCTION":"PROCEDURE");$Ya=false;if($_POST&&!$n&&!$_POST["add"]&&!$_POST["drop_col"]&&!$_POST["up"]&&!$_POST["down"]){$q=array();$o=(array)$_POST["fields"];ksort($o);foreach($o
as$c){if($c["field"]!=""){$q[]=(in_array($c["inout"],$wc)?"$c[inout] ":"").idf_escape($c["field"]).process_type($c,"CHARACTER SET");}}$Ya=drop_create("DROP $Ta ".idf_escape($Ua),"CREATE $Ta ".idf_escape($_POST["name"])." (".implode(", ",$q).")".(isset($_GET["function"])?" RETURNS".process_type($_POST["returns"],"CHARACTER SET"):"")."\n$_POST[definition]",substr(ME,0,-1),'Routine has been dropped.','Routine has been altered.','Routine has been created.',$Ua);}page_header(($Ua!=""?(isset($_GET["function"])?'Alter function':'Alter procedure').": ".h($Ua):(isset($_GET["function"])?'Create function':'Create procedure')),$n);$W=get_vals("SHOW CHARACTER SET");sort($W);$a=array("fields"=>array());if($_POST){$a=$_POST;$a["fields"]=(array)$a["fields"];process_fields($a["fields"]);}elseif($Ua!=""){$a=routine($Ua,$Ta);$a["name"]=$Ua;}echo'
<form action="" method="post" id="form">
<p>Name: <input name="name" value="',h($a["name"]),'" maxlength="64">
<table cellspacing="0" class="nowrap">
';edit_fields($a["fields"],$W,$Ta);if(isset($_GET["function"])){echo"<tr><td>".'Return type';edit_type("returns",$a["returns"],$W);}echo'</table>
<p>';textarea("definition",$a["definition"]);echo'<p>
<input type="hidden" name="token" value="',$L,'">
';if($Ya){echo'<input type="hidden" name="dropped" value="1">';}echo'<input type="submit" value="Save">
';if($Ua!=""){echo'<input type="submit" name="drop" value="Drop"',$Xa,'>';}echo'</form>
';}elseif(isset($_GET["sequence"])){$yb=$_GET["sequence"];if($_POST&&!$n){$x=substr(ME,0,-1);if($_POST["drop"]){query_redirect("DROP SEQUENCE ".idf_escape($yb),$x,'Sequence has been dropped.');}elseif($yb==""){query_redirect("CREATE SEQUENCE ".idf_escape($_POST["name"]),$x,'Sequence has been created.');}elseif($yb!=$_POST["name"]){query_redirect("ALTER SEQUENCE ".idf_escape($yb)." RENAME TO ".idf_escape($_POST["name"]),$x,'Sequence has been altered.');}else{redirect($x);}}page_header($yb!=""?'Alter sequence'.": ".h($yb):'Create sequence',$n);$a=array("name"=>$yb);if($_POST){$a=$_POST;}echo'
<form action="" method="post">
<p><input name="name" value="',h($a["name"]),'">
<input type="hidden" name="token" value="',$L,'">
<input type="submit" value="Save">
';if($yb!=""){echo"<input type='submit' name='drop' value='".'Drop'."'$Xa>\n";}echo'</form>
';}elseif(isset($_GET["type"])){$Yc=$_GET["type"];if($_POST&&!$n){$x=substr(ME,0,-1);if($_POST["drop"]){query_redirect("DROP TYPE ".idf_escape($Yc),$x,'Type has been dropped.');}else{query_redirect("CREATE TYPE ".idf_escape($_POST["name"])." $_POST[as]",$x,'Type has been created.');}}page_header($Yc!=""?'Alter type'.": ".h($Yc):'Create type',$n);$a["as"]="AS ";if($_POST){$a=$_POST;}echo'
<form action="" method="post">
<p>
<input type="hidden" name="token" value="',$L,'">
';if($Yc!=""){echo"<input type='submit' name='drop' value='".'Drop'."'$Xa>\n";}else{echo"<input name='name' value='".h($a['name'])."'>\n";textarea("as",$a["as"]);echo"<p><input type='submit' value='".'Save'."'>\n";}echo'</form>
';}elseif(isset($_GET["trigger"])){$m=$_GET["trigger"];$Kc=trigger_options();$ee=array("INSERT","UPDATE","DELETE");$Ya=false;if($_POST&&!$n&&in_array($_POST["Timing"],$Kc["Timing"])&&in_array($_POST["Event"],$ee)&&in_array($_POST["Type"],$Kc["Type"])){$Ud=" $_POST[Timing] $_POST[Event]";$zb=" ON ".table($m);$Ya=drop_create("DROP TRIGGER ".idf_escape($_GET["name"]).($_=="pgsql"?$zb:""),"CREATE TRIGGER ".idf_escape($_POST["Trigger"]).($_=="mssql"?$zb.$Ud:$Ud.$zb)." $_POST[Type]\n$_POST[Statement]",ME."table=".urlencode($m),'Trigger has been dropped.','Trigger has been altered.','Trigger has been created.',$_GET["name"]);}page_header(($_GET["name"]!=""?'Alter trigger'.": ".h($_GET["name"]):'Create trigger'),$n,array("table"=>$m));$a=array("Trigger"=>$m."_bi");if($_POST){$a=$_POST;}elseif($_GET["name"]!=""){$a=trigger($_GET["name"]);}echo'
<form action="" method="post" id="form">
<table cellspacing="0">
<tr><th>Time<td>',html_select("Timing",$Kc["Timing"],$a["Timing"],"if (/^".h(preg_quote($m,"/"))."_[ba][iud]$/.test(this.form['Trigger'].value)) this.form['Trigger'].value = '".h(addcslashes($m,"\r\n'\\"))."_' + selectValue(this).charAt(0).toLowerCase() + selectValue(this.form['Event']).charAt(0).toLowerCase();"),'<tr><th>Event<td>',html_select("Event",$ee,$a["Event"],"this.form['Timing'].onchange();"),'<tr><th>Type<td>',html_select("Type",$Kc["Type"],$a["Type"]),'</table>
<p>Name: <input name="Trigger" value="',h($a["Trigger"]),'" maxlength="64">
<p>';textarea("Statement",$a["Statement"]);echo'<p>
<input type="hidden" name="token" value="',$L,'">
';if($Ya){echo'<input type="hidden" name="dropped" value="1">';}echo'<input type="submit" value="Save">
';if($_GET["name"]!=""){echo'<input type="submit" name="drop" value="Drop"',$Xa,'>';}echo'</form>
';}elseif(isset($_GET["user"])){$ud=$_GET["user"];$ma=array(""=>array("All privileges"=>""));foreach(get_rows("SHOW PRIVILEGES")as$a){foreach(explode(",",($a["Privilege"]=="Grant option"?"":$a["Context"]))as$Uc){$ma[$Uc][$a["Privilege"]]=$a["Comment"];}}$ma["Server Admin"]+=$ma["File access on server"];$ma["Databases"]["Create routine"]=$ma["Procedures"]["Create routine"];unset($ma["Procedures"]["Create routine"]);$ma["Columns"]=array();foreach(array("Select","Insert","Update","References")as$b){$ma["Columns"][$b]=$ma["Tables"][$b];}unset($ma["Server Admin"]["Usage"]);foreach($ma["Tables"]as$e=>$b){unset($ma["Databases"][$e]);}$qc=array();if($_POST){foreach($_POST["objects"]as$e=>$b){$qc[$b]=(array)$qc[$b]+(array)$_POST["grants"][$e];}}$bb=array();$Nc="";if(isset($_GET["host"])&&($i=$g->query("SHOW GRANTS FOR ".q($ud)."@".q($_GET["host"])))){while($a=$i->fetch_row()){if(preg_match('~GRANT (.*) ON (.*) TO ~',$a[0],$l)&&preg_match_all('~ *([^(,]*[^ ,(])( *\\([^)]+\\))?~',$l[1],$qa,PREG_SET_ORDER)){foreach($qa
as$b){if($b[1]!="USAGE"){$bb["$l[2]$b[2]"][$b[1]]=true;}if(ereg(' WITH GRANT OPTION',$a[0])){$bb["$l[2]$b[2]"]["GRANT OPTION"]=true;}}}if(preg_match("~ IDENTIFIED BY PASSWORD '([^']+)~",$a[0],$l)){$Nc=$l[1];}}}if($_POST&&!$n){$bc=(isset($_GET["host"])?q($ud)."@".q($_GET["host"]):"''");$cb=q($_POST["user"])."@".q($_POST["host"]);$Dd=q($_POST["pass"]);if($_POST["drop"]){query_redirect("DROP USER $bc",ME."privileges=",'User has been dropped.');}else{if($bc!=$cb){$n=!queries(($g->server_info<5?"GRANT USAGE ON *.* TO":"CREATE USER")." $cb IDENTIFIED BY".($_POST["hashed"]?" PASSWORD":"")." $Dd");}elseif($_POST["pass"]!=$Nc||!$_POST["hashed"]){queries("SET PASSWORD FOR $cb = ".($_POST["hashed"]?$Dd:"PASSWORD($Dd)"));}if(!$n){$vc=array();foreach($qc
as$Za=>$ga){if(isset($_GET["grant"])){$ga=array_filter($ga);}$ga=array_keys($ga);if(isset($_GET["grant"])){$vc=array_diff(array_keys(array_filter($qc[$Za],'strlen')),$ga);}elseif($bc==$cb){$Pd=array_keys((array)$bb[$Za]);$vc=array_diff($Pd,$ga);$ga=array_diff($ga,$Pd);unset($bb[$Za]);}if(preg_match('~^(.+)\\s*(\\(.*\\))?$~U',$Za,$l)&&(!grant("REVOKE",$vc,$l[2]," ON $l[1] FROM $cb")||!grant("GRANT",$ga,$l[2]," ON $l[1] TO $cb"))){$n=true;break;}}}if(!$n&&isset($_GET["host"])){if($bc!=$cb){queries("DROP USER $bc");}elseif(!isset($_GET["grant"])){foreach($bb
as$Za=>$vc){if(preg_match('~^(.+)(\\(.*\\))?$~U',$Za,$l)){grant("REVOKE",array_keys($vc),$l[2]," ON $l[1] FROM $cb");}}}}queries_redirect(ME."privileges=",(isset($_GET["host"])?'User has been altered.':'User has been created.'),!$n);if($bc!=$cb){$g->query("DROP USER $cb");}}}page_header((isset($_GET["host"])?'Username'.": ".h("$ud@$_GET[host]"):'Create user'),$n,array("privileges"=>array('','Privileges')));if($_POST){$a=$_POST;$bb=$qc;}else{$a=$_GET+array("host"=>$g->result("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', -1)"));$a["pass"]=$Nc;if($Nc!=""){$a["hashed"]=true;}$bb[""]=true;}echo'<form action="" method="post">
<table cellspacing="0">
<tr><th>Username<td><input name="user" maxlength="16" value="',h($a["user"]),'">
<tr><th>Server<td><input name="host" maxlength="60" value="',h($a["host"]),'">
<tr><th>Password<td><input id="pass" name="pass" value="',h($a["pass"]),'">
';if(!$a["hashed"]){echo'<script type="text/javascript">typePassword(document.getElementById(\'pass\'));</script>';}echo
checkbox("hashed",1,$a["hashed"],'Hashed',"typePassword(this.form['pass'], this.checked);"),'</table>

';echo"<table cellspacing='0'>\n","<thead><tr><th colspan='2'><a href='http://dev.mysql.com/doc/refman/".substr($g->server_info,0,3)."/en/grant.html'>".'Privileges'."</a>";$k=0;foreach($bb
as$Za=>$ga){echo'<th>'.($Za!="*.*"?"<input name='objects[$k]' value='".h($Za)."' size='10'>":"<input type='hidden' name='objects[$k]' value='*.*' size='10'>*.*");$k++;}echo"</thead>\n";foreach(array(""=>"","Server Admin"=>'Server',"Databases"=>'Database',"Tables"=>'Table',"Columns"=>'Column',"Procedures"=>'Routine',)as$Uc=>$hc){foreach((array)$ma[$Uc]as$uc=>$ua){echo"<tr".odd()."><td".($hc?">$hc<td":" colspan='2'").' lang="en" title="'.h($ua).'">'.h($uc);$k=0;foreach($bb
as$Za=>$ga){$f="'grants[$k][".h(strtoupper($uc))."]'";$p=$ga[strtoupper($uc)];if($Uc=="Server Admin"&&$Za!=(isset($bb["*.*"])?"*.*":"")){echo"<td>&nbsp;";}elseif(isset($_GET["grant"])){echo"<td><select name=$f><option><option value='1'".($p?" selected":"").">".'Grant'."<option value='0'".($p=="0"?" selected":"").">".'Revoke'."</select>";}else{echo"<td align='center'><input type='checkbox' name=$f value='1'".($p?" checked":"").($uc=="All privileges"?" id='grants-$k-all'":($uc=="Grant option"?"":" onclick=\"if (this.checked) formUncheck('grants-$k-all');\"")).">";}$k++;}}}echo"</table>\n",'<p>
<input type="hidden" name="token" value="',$L,'">
<input type="submit" value="Save">
';if(isset($_GET["host"])){echo'<input type="submit" name="drop" value="Drop"',$Xa,'>';}echo'</form>
';}elseif(isset($_GET["processlist"])){if($_POST&&!$n){$bd=0;foreach((array)$_POST["kill"]as$b){if(queries("KILL ".ereg_replace("[^0-9]+","",$b))){$bd++;}}queries_redirect(ME."processlist=",lang(array('%d process has been killed.','%d processes have been killed.'),$bd),$bd||!$_POST["kill"]);}page_header('Process list',$n);echo'
<form action="" method="post">
<table cellspacing="0" onclick="tableClick(event);" class="nowrap">
';foreach(get_rows("SHOW FULL PROCESSLIST")as$k=>$a){if(!$k){echo"<thead><tr lang='en'><th>&nbsp;<th>".implode("<th>",array_keys($a))."</thead>\n";}echo"<tr".odd()."><td>".checkbox("kill[]",$a["Id"],0)."<td>".implode("<td>",array_map('nbsp',$a))."\n";}echo'</table>
<p>
<input type="hidden" name="token" value="',$L,'">
<input type="submit" value="Kill">
</form>
';}elseif(isset($_GET["select"])){$m=$_GET["select"];$I=table_status($m);$K=indexes($m);$o=fields($m,1);$ca=column_foreign_keys($m);$Yd=array();$A=array();$_b=null;foreach($o
as$e=>$c){$f=$r->fieldName($c);if(isset($c["privileges"]["select"])&&$f!=""){$A[$e]=html_entity_decode(strip_tags($f));if(ereg('text|lob',$c["type"])){$_b=$r->selectLengthProcess();}}$Yd+=$c["privileges"];}list($C,$ta)=$r->selectColumnsProcess($A,$K);$t=$r->selectSearchProcess($o,$K);$ub=$r->selectOrderProcess($o,$K);$M=$r->selectLimitProcess();$Tb=($C?implode(", ",$C):"*")."\nFROM ".table($m);$hd=($ta&&count($ta)<count($C)?"\nGROUP BY ".implode(", ",$ta):"").($ub?"\nORDER BY ".implode(", ",$ub):"");if($_POST&&!$n){$Zd="(".implode(") OR (",array_map('where_check',(array)$_POST["check"])).")";$Ia=$Qc=null;foreach($K
as$v){if($v["type"]=="PRIMARY"){$Ia=array_flip($v["columns"]);$Qc=($C?$Ia:array());break;}}foreach($C
as$e=>$b){$b=$_GET["columns"][$e];if(!$b["fun"]){unset($Qc[$b["col"]]);}}if($_POST["export"]){dump_headers($m);dump_table($m,"");if($_POST["format"]!="sql"){$a=array_keys($o);if($C){$a=array();foreach($C
as$b){$a[]=(ereg('^`.*`$',$b)?idf_unescape($b):$b);}}dump_csv($a);}if(!is_array($_POST["check"])||$Qc===array()){$jd=$t;if(is_array($_POST["check"])){$jd[]="($Zd)";}dump_data($m,"INSERT","SELECT $Tb".($jd?"\nWHERE ".implode(" AND ",$jd):"").$hd);}else{$Fd=array();foreach($_POST["check"]as$b){$Fd[]="(SELECT".limit($Tb,"\nWHERE ".($t?implode(" AND ",$t)." AND ":"").where_check($b).$hd,1).")";}dump_data($m,"INSERT",implode(" UNION ALL ",$Fd));}exit;}if(!$r->selectEmailProcess($t,$ca)){if($_POST["save"]||$_POST["delete"]){$i=true;$wb=0;$j=table($m);$q=array();if(!$_POST["delete"]){foreach($A
as$f=>$b){$b=process_input($o[$f]);if($b!==null){if($_POST["clone"]){$q[idf_escape($f)]=($b!==false?$b:idf_escape($f));}elseif($b!==false){$q[]=idf_escape($f)." = $b";}}}$j.=($_POST["clone"]?" (".implode(", ",array_keys($q)).")\nSELECT ".implode(", ",$q)."\nFROM ".table($m):" SET\n".implode(",\n",$q));}if($_POST["delete"]||$q){$Tc="UPDATE";if($_POST["delete"]){$Tc="DELETE";$j="FROM $j";}if($_POST["clone"]){$Tc="INSERT";$j="INTO $j";}if($_POST["all"]||($Qc===array()&&$_POST["check"])||count($ta)<count($C)){$i=queries($Tc." $j".($_POST["all"]?($t?"\nWHERE ".implode(" AND ",$t):""):"\nWHERE $Zd"));$wb=$g->affected_rows;}else{foreach((array)$_POST["check"]as$b){$i=queries($Tc.limit1($j,"\nWHERE ".where_check($b)));if(!$i){break;}$wb+=$g->affected_rows;}}}queries_redirect(remove_from_uri("page"),lang(array('%d item has been affected.','%d items have been affected.'),$wb),$i);}elseif(!$_POST["import"]){if(!$_POST["val"]){$n='Double click on a value to modify it.';}else{$i=true;$wb=0;foreach($_POST["val"]as$sb=>$a){$q=array();foreach($a
as$e=>$b){$e=bracket_escape($e,1);$q[]=idf_escape($e)." = ".(ereg('char|text',$o[$e]["type"])||$b!=""?$r->processInput($o[$e],$b):"NULL");}$i=queries("UPDATE".limit1(table($m)." SET ".implode(", ",$q)," WHERE ".where_check($sb).($t?" AND ".implode(" AND ",$t):"")));if(!$i){break;}$wb+=$g->affected_rows;}queries_redirect(remove_from_uri(),lang(array('%d item has been affected.','%d items have been affected.'),$wb),$i);}}elseif(is_string($ra=get_file("csv_file",true))){$ra=preg_replace("~^\xEF\xBB\xBF~",'',$ra);$i=true;$gb=array_keys($o);preg_match_all('~(?>"[^"]*"|[^"\\r\\n]+)+~',$ra,$qa);$wb=count($qa[0]);begin();$Pa=($_POST["separator"]=="csv"?",":";");foreach($qa[0]as$e=>$b){preg_match_all("~((\"[^\"]*\")+|[^$Pa]*)$Pa~",$b.$Pa,$qd);if(!$e&&!array_diff($qd[1],$gb)){$gb=$qd[1];$wb--;}else{$q=array();foreach($qd[1]as$k=>$yc){$q[idf_escape($gb[$k])]=($yc==""&&$o[$gb[$k]]["null"]?"NULL":q(str_replace('""','"',preg_replace('~^"|"$~','',$yc))));}$i=insert_update($m,$q,$Ia);if(!$i){break;}}}if($i){queries("COMMIT");}queries_redirect(remove_from_uri("page"),lang(array('%d row has been imported.','%d rows have been imported.'),$wb),$i);queries("ROLLBACK");}else{$n=upload_error($ra);}}}$Da=$r->tableName($I);page_header('Select'.": $Da",$n);session_write_close();$q=null;if(isset($Yd["insert"])){$q="";foreach((array)$_GET["where"]as$b){if(count($ca[$b["col"]])==1&&($b["op"]=="="||(!$b["op"]&&!ereg('[_%]',$b["val"])))){$q.="&set".urlencode("[".bracket_escape($b["col"])."]")."=".urlencode($b["val"]);}}}$r->selectLinks($I,$q);if(!$A){echo"<p class='error'>".'Unable to select the table'.($o?".":": ".error())."\n";}else{echo"<form action='' id='form'>\n","<div style='display: none;'>";hidden_fields_get();echo(DB!=""?'<input type="hidden" name="db" value="'.h(DB).'">'.(isset($_GET["ns"])?'<input type="hidden" name="ns" value="'.h($_GET["ns"]).'">':""):"");echo'<input type="hidden" name="select" value="'.h($m).'">',"</div>\n";$r->selectColumnsPrint($C,$A);$r->selectSearchPrint($t,$A,$K);$r->selectOrderPrint($ub,$A,$K);$r->selectLimitPrint($M);$r->selectLengthPrint($_b);$r->selectActionPrint($_b);echo"</form>\n";$Y=$_GET["page"];if($Y=="last"){$Sa=$g->result("SELECT COUNT(*) FROM ".table($m).($t?" WHERE ".implode(" AND ",$t):""));$Y=floor(($Sa-1)/$M);}$j="SELECT".limit((intval($M)&&$ta&&count($ta)<count($C)&&$_=="sql"?"SQL_CALC_FOUND_ROWS ":"").$Tb,($t?"\nWHERE ".implode(" AND ",$t):"").$hd,($M!=""?intval($M):null),($Y?$M*$Y:0),"\n");echo$r->selectQuery($j);$i=$g->query($j);if(!$i){echo"<p class='error'>".error()."\n";}else{if($_=="mssql"){$i->seek($M*$Y);}$Sc=array();echo"<form action='' method='post' enctype='multipart/form-data'>\n";$F=array();while($a=$i->fetch_assoc()){$F[]=$a;}if($_GET["page"]!="last"){$Sa=(intval($M)&&$ta&&count($ta)<count($C)?($_=="sql"?$g->result(" SELECT FOUND_ROWS()"):$g->result("SELECT COUNT(*) FROM ($j) x")):count($F));}if(!$F){echo"<p class='message'>".'No rows.'."\n";}else{$Hd=$r->backwardKeys($m,$Da);echo"<table cellspacing='0' class='nowrap' onclick='tableClick(event);'>\n","<thead><tr>".(!$ta&&$C?"":"<td><input type='checkbox' id='all-page' onclick='formCheck(this, /check/);'> <a href='".h($_GET["modify"]?remove_from_uri("modify"):$_SERVER["REQUEST_URI"]."&modify=1")."'>".'edit'."</a>");$yd=array();$V=array();reset($C);$ub=1;foreach($F[0]as$e=>$b){$b=$_GET["columns"][key($C)];$c=$o[$C?$b["col"]:$e];$f=($c?$r->fieldName($c,$ub):"*");if($f!=""){$ub++;$yd[$e]=$f;echo'<th><a href="'.h(remove_from_uri('(order|desc)[^=]*|page').'&order%5B0%5D='.urlencode($e).($_GET["order"][0]==$e&&!$_GET["desc"][0]?'&desc%5B0%5D=1':'')).'">'.apply_sql_function($b["fun"],$f)."</a>";}$V[$e]=$b["fun"];next($C);}$Rb=array();if($_GET["modify"]){foreach($F
as$a){foreach($a
as$e=>$b){$Rb[$e]=max($Rb[$e],min(40,strlen(utf8_decode($b))));}}}echo($Hd?"<th>".'Relations':"")."</thead>\n";foreach($r->rowDescriptions($F,$ca)as$ba=>$a){$wd=unique_array($F[$ba],$K);$sb="";foreach($wd
as$e=>$b){$sb.="&".(isset($b)?urlencode("where[".bracket_escape($e)."]")."=".urlencode($b):"null%5B%5D=".urlencode($e));}echo"<tr".odd().">".(!$ta&&$C?"":"<td>".checkbox("check[]",substr($sb,1),in_array(substr($sb,1),(array)$_POST["check"]),"","this.form['all'].checked = false; formUncheck('all-page');").(count($ta)<count($C)||information_schema(DB)?"":" <a href='".h(ME."edit=".urlencode($m).$sb)."'>".'edit'."</a>"));foreach($a
as$e=>$b){if(isset($yd[$e])){$c=$o[$e];if($b!=""&&(!isset($Sc[$e])||$Sc[$e]!="")){$Sc[$e]=(is_mail($b)?$yd[$e]:"");}$x="";$b=$r->editVal($b,$c);if(!isset($b)){$b="<i>NULL</i>";}else{if(ereg('blob|bytea|raw|file',$c["type"])&&$b!=""){$x=h(ME.'download='.urlencode($m).'&field='.urlencode($e).$sb);}if($b==""){$b="&nbsp;";}elseif($_b!=""&&ereg('text|blob',$c["type"])&&is_utf8($b)){$b=shorten_utf8($b,max(0,intval($_b)));}else{$b=h($b);}if(!$x){foreach((array)$ca[$e]as$B){if(count($ca[$e])==1||count($B["source"])==1){foreach($B["source"]as$k=>$Ca){$x.=where_link($k,$B["target"][$k],$F[$ba][$Ca]);}$x=h(($B["db"]!=""?preg_replace('~([?&]db=)[^&]+~','\\1'.urlencode($B["db"]),ME):ME).'select='.urlencode($B["table"]).$x);break;}}}if($e=="COUNT(*)"){$x=h(ME."select=".urlencode($m));$k=0;foreach((array)$_GET["where"]as$w){if(!array_key_exists($w["col"],$wd)){$x.=h(where_link($k++,$w["col"],$w["val"],$w["op"]));}}foreach($wd
as$Ma=>$w){$x.=h(where_link($k++,$Ma,$w,(isset($w)?"=":"IS NULL")));}}}if(!$x){if(is_mail($b)){$x="mailto:$b";}if($ic=is_url($a[$e])){$x=($ic=="http"&&$Zb?$a[$e]:"$ic://www.adminer.org/redirect/?url=".urlencode($a[$e]));}}$U=h("val[$sb][".bracket_escape($e)."]");$p=$_POST["val"][$sb][bracket_escape($e)];$Nd=h(isset($p)?$p:$a[$e]);$Jd=strpos($b,"<i>...</i>");$Kd=is_utf8($b)&&!$Jd&&$F[$ba][$e]==$a[$e]&&!$V[$e];$ge=ereg('text|lob',$c["type"]);echo(($_GET["modify"]&&$Kd)||isset($p)?"<td>".($ge?"<textarea name='$U' cols='30' rows='".(substr_count($a[$e],"\n")+1)."' onkeydown='return textareaKeydown(this, event);'>$Nd</textarea>":"<input name='$U' value='$Nd' size='$Rb[$e]'>"):"<td id='$U' ondblclick=\"".($Kd?"selectDblClick(this, event".($ge?", 1":"").")":"alert('".h($Jd?'Increase Text length to modify this value.':'Use edit link to modify this value.')."')").";\">".$r->selectVal($b,$x,$c));}}$r->backwardKeysPrint($Hd,$F[$ba]);echo"</tr>\n";}echo"</table>\n";}parse_str($_COOKIE["adminer_export"],$pd);if($F||$Y){$id=true;if($_GET["page"]!="last"&&intval($M)&&count($ta)>=count($C)&&($Sa>=$M||$Y)){$Sa=$I["Rows"];if(!isset($Sa)||$t||2*$Y*$M>$Sa||($I["Engine"]=="InnoDB"&&$Sa<1e4)){ob_flush();flush();$Sa=$g->result("SELECT COUNT(*) FROM ".table($m).($t?" WHERE ".implode(" AND ",$t):""));}else{$id=false;}}echo"<p class='pages'>";if(intval($M)&&$Sa>$M){$od=floor(($Sa-1)/$M);echo'<a href="'.h(remove_from_uri("page"))."\" onclick=\"var page = +prompt('".'Page'."', '".($Y+1)."'); if (!isNaN(page) &amp;&amp; page) location.href = this.href + (page != 1 ? '&amp;page=' + (page - 1) : ''); return false;\">".'Page'."</a>:".pagination(0,$Y).($Y>5?" ...":"");for($k=max(1,$Y-4);$k<min($od,$Y+5);$k++){echo
pagination($k,$Y);}echo($Y+5<$od?" ...":"").($id?pagination($od,$Y):' <a href="'.h(remove_from_uri()."&page=last").'">'.'last'."</a>");}echo" (".($id?"":"~ ").lang(array('%d row','%d rows'),$Sa).") ".checkbox("all",1,0,'whole result')."\n";if(!information_schema(DB)){?>
<fieldset><legend>Edit</legend><div>
<input type="submit" value="Save" title="Double click on a value to modify it.">
<input type="submit" name="edit" value="Edit">
<input type="submit" name="clone" value="Clone">
<input type="submit" name="delete" value="Delete" onclick="return confirm('Are you sure? (' + (this.form['all'].checked ? <?php echo$Sa,' : formChecked(this, /check/)) + \')\');">
</div></fieldset>
';}print_fieldset("export",'Export');echo$r->dumpOutput(1,$pd["output"])." ".$r->dumpFormat(1,$pd["format"]);echo" <input type='submit' name='export' value='".'Export'."'>\n","</div></fieldset>\n";}print_fieldset("import",'CSV Import',!$F);echo"<input type='hidden' name='token' value='$L'><input type='file' name='csv_file'> ",html_select("separator",array("csv"=>"CSV,","csv;"=>"CSV;"),$pd["format"],1);echo" <input type='submit' name='import' value='".'Import'."'>\n","</div></fieldset>\n";$r->selectEmailPrint(array_filter($Sc,'strlen'),$A);echo"</form>\n";}}}elseif(isset($_GET["variables"])){$Ob=isset($_GET["status"]);page_header($Ob?'Status':'Variables');$Qd=($Ob?show_status():show_variables());if(!$Qd){echo"<p class='message'>".'No rows.'."\n";}else{echo"<table cellspacing='0'>\n";foreach($Qd
as$e=>$b){echo"<tr>","<th><code class='jush-".$_.($Ob?"status":"set")."'>".h($e)."</code>","<td>".nbsp($b);}echo"</table>\n";}}elseif(isset($_GET["script"])){header("Content-Type: text/javascript; charset=utf-8");if($_GET["token"]!=$L){exit;}if($_GET["script"]=="db"){$Mc=array("Data_length"=>0,"Index_length"=>0,"Data_free"=>0);foreach(table_status()as$a){$U=addcslashes($a["Name"],"\\'/");echo"setHtml('Comment-$U', '".addcslashes(nbsp($a["Comment"]),"'\\")."');\n";if(!is_view($a)){foreach(array("Engine","Collation")as$e){echo"setHtml('$e-$U', '".addcslashes(nbsp($a[$e]),"'\\")."');\n";}foreach($Mc+array("Auto_increment"=>0,"Rows"=>0)as$e=>$b){if($a[$e]!=""){$b=number_format($a[$e],0,'.',',');echo"setHtml('$e-$U', '".($e=="Rows"&&$a["Engine"]=="InnoDB"&&$b?"~ $b":$b)."');\n";if(isset($Mc[$e])){$Mc[$e]+=($a["Engine"]!="InnoDB"||$e!="Data_free"?$a[$e]:0);}}elseif(array_key_exists($e,$a)){echo"setHtml('$e-$U');\n";}}}}foreach($Mc
as$e=>$b){echo"setHtml('sum-$e', '".number_format($b,0,'.',',')."');\n";}}else{foreach(count_tables(get_databases())as$s=>$b){echo"setHtml('tables-".addcslashes($s,"\\'/")."', '$b');\n";}}exit;}else{$Id=array_merge((array)$_POST["tables"],(array)$_POST["views"]);if($Id&&!$n&&!$_POST["search"]){$i=true;$za="";if($_=="sql"&&count($_POST["tables"])>1&&($_POST["drop"]||$_POST["truncate"])){queries("SET foreign_key_checks = 0");}if($_POST["truncate"]){if($_POST["tables"]){$i=truncate_tables($_POST["tables"]);}$za='Tables have been truncated.';}elseif($_POST["move"]){$i=move_tables((array)$_POST["tables"],(array)$_POST["views"],$_POST["target"]);$za='Tables have been moved.';}elseif($_POST["drop"]){if($_POST["views"]){$i=drop_views($_POST["views"]);}if($i&&$_POST["tables"]){$i=drop_tables($_POST["tables"]);}$za='Tables have been dropped.';}elseif($_POST["tables"]&&($i=queries(($_POST["optimize"]?"OPTIMIZE":($_POST["check"]?"CHECK":($_POST["repair"]?"REPAIR":"ANALYZE")))." TABLE ".implode(", ",array_map('idf_escape',$_POST["tables"]))))){while($a=$i->fetch_assoc()){$za.="<b>".h($a["Table"])."</b>: ".h($a["Msg_text"])."<br>";}}queries_redirect(substr(ME,0,-1),$za,$i);}page_header(($_GET["ns"]==""?'Database'.": ".h(DB):'Schema'.": ".h($_GET["ns"])),$n,true);echo'<p>'.($_GET["ns"]==""?'<a href="'.h(ME).'database=">'.'Alter database'."</a>\n":"");if(support("scheme")){echo"<a href='".h(ME)."scheme='>".($_GET["ns"]!=""?'Alter schema':'Create schema')."</a>\n";}if($_GET["ns"]!==""){echo'<a href="'.h(ME).'schema=">'.'Database schema'."</a>\n","<h3>".'Tables and views'."</h3>\n";$Gc=tables_list();if(!$Gc){echo"<p class='message'>".'No tables.'."\n";}else{echo"<form action='' method='post'>\n","<p>".'Search data in tables'.": <input name='query' value='".h($_POST["query"])."'> <input type='submit' name='search' value='".'Search'."'>\n";if($_POST["search"]&&$_POST["query"]!=""){search_tables();}echo"<table cellspacing='0' class='nowrap' onclick='tableClick(event);'>\n",'<thead><tr class="wrap"><td><input id="check-all" type="checkbox" onclick="formCheck(this, /^(tables|views)\[/);"><th>'.'Table'.'<td>'.'Engine'.'<td>'.'Collation'.'<td>'.'Data Length'.'<td>'.'Index Length'.'<td>'.'Data Free'.'<td>'.'Auto Increment'.'<td>'.'Rows'.(support("comment")?'<td>'.'Comment':'')."</thead>\n";foreach($Gc
as$f=>$y){$Bc=(isset($y)&&!eregi("table",$y));echo'<tr'.odd().'><td>'.checkbox(($Bc?"views[]":"tables[]"),$f,in_array($f,$Id,true),"","formUncheck('check-all');"),'<th><a href="'.h(ME).'table='.urlencode($f).'">'.h($f).'</a>';if($Bc){echo'<td colspan="6"><a href="'.h(ME)."view=".urlencode($f).'">'.'View'.'</a>','<td align="right"><a href="'.h(ME)."select=".urlencode($f).'">?</a>';}else{echo"<td id='Engine-".h($f)."'>&nbsp;<td id='Collation-".h($f)."'>&nbsp;";foreach(array("Data_length"=>"create","Index_length"=>"indexes","Data_free"=>"edit","Auto_increment"=>"auto_increment=1&create","Rows"=>"select")as$e=>$x){echo"<td align='right'><a href='".h(ME."$x=").urlencode($f)."' id='$e-".h($f)."'>?</a>";}}echo(support("comment")?"<td id='Comment-".h($f)."'>&nbsp;":"");}echo"<tr><td>&nbsp;<th>".sprintf('%d in total',count($Gc)),"<td>".nbsp($g->result("SELECT @@storage_engine")),"<td>".nbsp(db_collation(DB,collations()));foreach(array("Data_length","Index_length","Data_free")as$e){echo"<td align='right' id='sum-$e'>&nbsp;";}echo"</table>\n";if(!information_schema(DB)){echo"<p><input type='hidden' name='token' value='$L'>".($_=="sql"?"<input type='submit' value='".'Analyze'."'> <input type='submit' name='optimize' value='".'Optimize'."'> <input type='submit' name='check' value='".'Check'."'> <input type='submit' name='repair' value='".'Repair'."'> ":"")."<input type='submit' name='truncate' value='".'Truncate'."' onclick=\"return confirm('".'Are you sure?'." (' + formChecked(this, /tables/) + ')');\"> <input type='submit' name='drop' value='".'Drop'."' onclick=\"return confirm('".'Are you sure?'." (' + formChecked(this, /tables|views/) + ')');\">\n";$z=(support("scheme")?schemas():get_databases());if(count($z)!=1&&$_!="sqlite"){$s=(isset($_POST["target"])?$_POST["target"]:(support("scheme")?$_GET["ns"]:DB));echo"<p>".'Move to other database'.($z?": ".html_select("target",$z,$s):': <input name="target" value="'.h($s).'">')." <input type='submit' name='move' value='".'Move'."'>\n";}}echo"</form>\n";}echo'<p><a href="'.h(ME).'create=">'.'Create table'."</a>\n";if(support("view")){echo'<a href="'.h(ME).'view=">'.'Create view'."</a>\n";}if(support("routine")){echo"<h3>".'Routines'."</h3>\n";$Sd=routines();if($Sd){echo"<table cellspacing='0'>\n",'<thead><tr><th>'.'Name'.'<td>'.'Type'.'<td>'.'Return type'."<td>&nbsp;</thead>\n";odd('');foreach($Sd
as$a){echo'<tr'.odd().'>','<th><a href="'.h(ME).($a["ROUTINE_TYPE"]=="FUNCTION"?'callf=':'call=').urlencode($a["ROUTINE_NAME"]).'">'.h($a["ROUTINE_NAME"]).'</a>','<td>'.h($a["ROUTINE_TYPE"]),'<td>'.h($a["DTD_IDENTIFIER"]),'<td><a href="'.h(ME).($a["ROUTINE_TYPE"]=="FUNCTION"?'function=':'procedure=').urlencode($a["ROUTINE_NAME"]).'">'.'Alter'."</a>";}echo"</table>\n";}echo'<p><a href="'.h(ME).'procedure=">'.'Create procedure'.'</a> <a href="'.h(ME).'function=">'.'Create function'."</a>\n";}if(support("sequence")){echo"<h3>".'Sequences'."</h3>\n";$Rd=get_vals("SELECT sequence_name FROM information_schema.sequences WHERE sequence_schema = current_schema()");if($Rd){echo"<table cellspacing='0'>\n","<thead><tr><th>".'Name'."</thead>\n";odd('');foreach($Rd
as$b){echo"<tr".odd()."><th><a href='".h(ME)."sequence=".urlencode($b)."'>".h($b)."</a>\n";}echo"</table>\n";}echo"<p><a href='".h(ME)."sequence='>".'Create sequence'."</a>\n";}if(support("type")){echo"<h3>".'User types'."</h3>\n";$T=types();if($T){echo"<table cellspacing='0'>\n","<thead><tr><th>".'Name'."</thead>\n";odd('');foreach($T
as$b){echo"<tr".odd()."><th><a href='".h(ME)."type=".urlencode($b)."'>".h($b)."</a>\n";}echo"</table>\n";}echo"<p><a href='".h(ME)."type='>".'Create type'."</a>\n";}if(support("event")){echo"<h3>".'Events'."</h3>\n";$F=get_rows("SHOW EVENTS");if($F){echo"<table cellspacing='0'>\n","<thead><tr><th>".'Name'."<td>".'Schedule'."<td>".'Start'."<td>".'End'."</thead>\n";foreach($F
as$a){echo"<tr>",'<th><a href="'.h(ME).'event='.urlencode($a["Name"]).'">'.h($a["Name"])."</a>","<td>".($a["Execute at"]?'At given time'."<td>".$a["Execute at"]:'Every'." ".$a["Interval value"]." ".$a["Interval field"]."<td>$a[Starts]"),"<td>$a[Ends]";}echo"</table>\n";}echo'<p><a href="'.h(ME).'event=">'.'Create event'."</a>\n";}if($Gc){page_footer();echo"<script type='text/javascript' src='".h(ME."script=db&token=$L")."'></script>\n";exit;}}}page_footer();