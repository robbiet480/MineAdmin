<?php
require_once('header_inc.php');
$group_info=$minecraft->group_get_id($db->escape_string($_GET['gid']));
if($_GET['save']=="1"){
    $commands=$_POST['commands'];
    $clist="";
    preg_match_all('%/([0-9a-zA-Z]+)%simx', $commands, $result, PREG_PATTERN_ORDER);
    for ($i = 0; $i < count($result[0]); $i++) {
        if($clist==""){
            $clist="/".$result[1][$i];
        }else{
            $clist.=",/".$result[1][$i];
        }
    }
    $db->exec("UPDATE `groups` SET `commands`='".$clist."' WHERE `id`='".$group_info['id']."'");
    header("Location: groups.php");
}
?>
<form action="group_commands.php?save=1&gid=<?PHP echo $group_info['id']; ?>" method="post">
    <div style="width:500px;">
        <h1 class="over_html_h1"><?PHP echo $group_info['name'];?>'s Commands</h1>
        <div class="over_html_row_wrap">
            <label>
                <span class="over_html_row">Command List <br /><span>commands allowed by this group.</span></span>
                <span class="input_area"><textarea name="commands" style="width:200px;height:500px;"><?PHP echo str_replace(",","\n",$group_info['commands']);?></textarea></span>
            </label>
        </div>
        <div class="over_html_row_wrap">
            <label>
                <span class="over_html_row"></span>
                <span class="input_area"><input style="margin-left:20px;" class="button" type="button" onclick="$.fancybox.close();" value="Close"> <input class="button" type="submit" value="Save" /></span>
            </label>
        </div>
        
    </div>
</form>