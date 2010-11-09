<?php
// vpsinfo by Douglas Robbins 
// Email: drobbins [at] labradordata.ca
// Website: http://www.labradordata.ca/vpsinfo/
$version = '2.3.3 (18 October 2008)';

// This script is intended as a general information/monitoring page for a Linux
// Virtuozza or OpenVZ VPS (Virtual Private Server). It also runs fine on a
// dedicated Linux machine. 

// Acknowledgements:
//
// 'vpsstat' output is based on a perl script by the same name developed by
// ServInt technical staff.
//
// This script may utilize third party software if installed:
// * MyTop by Jeremy D. Zawodny, GNU General Public License.
//   http://jeremy.zawodny.com/mysql/mytop/
// * mysqlreport by ?
//   http://hackmysql.com/mysqlreport
// * vnstat by Teemu Toivola, GNU General Public License.
//   http://humdi.net/vnstat/

// Thanks to the ServInt VPS forum members & staff for testing and suggestions.

// Terms & Conditions:
//
// * This script is an original work and is copyright Douglas T. Robbins;
// * This script is provided to you for use free of charge;
// * You are permitted to modify the script for your own use;
// * You may redistribute the script in its original form;
// * You may not modify the script and publicly redistribute it, unless you
//   make fundamental changes to the script to the extent that it may be
//   considered a new work. In that case you should give your script a new name
//   (i.e., do not use "vpsinfo" in the script name). An acknowledgement of the
//   original vpsinfo in your release would be appreciated.

// Liability:
//
// The author assumes no liability for damage or loss that might be associated 
// with the use of this script.


// == START CONFIGURATION =====================================================

// Mysql monitoring: 0 = none; 1 = mytop; 2 = mysqlreport
$mysql_mon = 1;

// Enable or disable vnstat. 0 = disable 1 = enable:
$vnstat = 1;

// MyTop/mysqlreport needs MySQL access to read the processlist.
// You may use any MySQL database.
// If you don't use MyTop or mysqlreport just ignore this.
$my_db	 = "vpsinfo";
$my_user = "root";
$my_pass = "DC91652D1695606F425FBDAA017E357DC4026DD3CFF04D49CCCB94BCC583BFFA";

// The account home directory for this mysql user: 
$userhome = "/var/run/mysql";

// Processes to monitor. Include any process that should normally appear in the
// COMMAND column of the 'top' output. You can match a partial name, eg. 'ftpd'
// matches 'pure-ftpd' or 'proftpd'. Possible additions include: 'cppop', 
// 'cpsrvd', 'exim', 'named'. This is a space-delimited list:
$processes = "java mysqld sshd";

// Width of the left column in page display. You can adjust this if the
// leftside boxes are too wide or too narrow:
$leftcol = 590;

// Difference in hours between your local time and server time:
$timeoffset = 0;

// Auto-refresh of the main page. 
// Set to 0 to disable, or specify a number of minutes:
$refresh = 3;

// Auto-refresh of command windows.
// Set to 0 to disable, or specify a number of minutes:
$top_refresh     = 5;
$vpsstat_refresh = 5;
$netstat_refresh = 5;
$mysql_refresh   = 5;
$vnstat_refresh  = 15;

// Bandwidth alert. When the daily data transfer is greater than this, it is 
// highlighted in red. In MB:
$bw_alert = 1000;

// Enable gzip compression for page output. 0 = disabled  1 = enabled 
$gzip = 1;

// == END CONFIGURATION =======================================================


$mtime = explode (" ", microtime());
$tstart = $mtime[0] + $mtime[1];

$scriptname = $_SERVER['SCRIPT_NAME'];
$timestamp = time() + ($timeoffset * 3600);
$localtime = date("g:i a, M j", $timestamp);
$shorttime = date("g:i a", $timestamp);

// Shell commands for main windows display ------------------------------------

$netstat_com = "netstat -nt";
$vnstat_com  = "vnstat";
$top_com     = "top -n 1 -b";
$pstree_com  = "env LANG=C pstree -c";
$df_com      = "df -h --exclude-type=tmpfs";
$tmp_com     = "cat /opt/server.log";

if ($mysql_mon == 1)
	$mysql_com   = "env HOME=$userhome env TERM=xterm mytop -u $my_user -p $my_pass -d $my_db -b --nocolor";
elseif ($mysql_mon == 2) {
	$mysql_com  = "./mysqlreport --user $my_user --password $my_pass --no-mycnf 2>&1";
	$mysql_com2 = "./mysqlreport --all --tab --user $my_user --password $my_pass --no-mycnf";

}
$allps_com   = "ps -e | awk '{ print $4;}' | uniq";

// GET and POST requests to this page -----------------------------------------

// 'Sample current traffic' (vnstat):

if ($_GET["traffic"]) {
	$io = trim(`vnstat -tr | grep --after-context=3 Traffic`);
	echo "<html>\n<body bgcolor='#000000' text='#CCCCCC' style='margin:10px 0 0 4px;padding:0'>\n<pre style='font-family:vt7X13,\"Courier New\";font-size:11px;line-height:14px'>$io</pre>\n</body>\n</html>";
	exit;
}

// 'Ports List':

if ($_GET["showports"]) {
	$porttext = "Port   What Is It?
----   -----------------------
  21   FTP server
  25   Exim - SMTP
  53   Bind nameserver
  80   Apache webserver
 110   POP mail server
 143   IMAP mail server
 443   Secure Apache webserver
 465   Secure SMTP
 993   Secure IMAP
2082   cPanel 
2083   Secure cPanel (https)
2086   WHM
2087   Secure WHM (https)
2095   Webmail
2096   Secure webmail (https)
3306   MySQL
8888   Secure shell - SSHD";
	echo "<html>\n<body bgcolor='#000000' text='#CCCCCC' style='margin:10px 0 0 30px;padding:0'>\n<pre style='font-family:vt7X13,\"Courier New\";font-size:11px;line-height:14px'>$porttext</pre>\n</body>\n</html>";
	exit;
}

// Show logged-in shell users:

if ($_GET["users"]) {
	$users = trim(`w`);
	echo "<html>\n<body bgcolor='#000000' text='#CCCCCC' style='margin:10px 0 0 6px;padding:0'>\n<pre style='font-family:vt7X13,\"Courier New\";font-size:11px;line-height:14px'>Logged-in Users\n---------------\n$users</pre>\n</body>\n</html>";
	exit;
}

// Whois lookup:

if ($_POST['whois']) {
	$whois = trim($_POST['whois']);
}
elseif ($_GET['whois']) {
	$whois = trim($_GET['whois']);
}
if ($whois) {
	$whois = preg_replace("/[^a-z0-9-.]/", "", $whois);
	$lookup = `whois $whois`;
	echo "<html>\n<body bgcolor='#000000' text='#CCCCCC' style='margin:10px 0 0 30px;padding:0'>\n<pre style='font-family:vt7X13,\"Courier New\";font-size:11px;line-height:14px'>$lookup</pre>\n</body>\n</html>";
	exit;
}

// cat /opt/server.log:

if ($_GET['lsal']) {
	$lsout  = "Command: cat /opt/server.log\n\n";
	$lsout .= `cat /opt/server.log`;
	echo "<html>\n<body bgcolor='#000000' text='#CCCCCC' style='margin:10px 0 0 6px;padding:0'>\n<pre style='font-family:vt7X13,\"Courier New\";font-size:11px;line-height:14px'>$lsout</pre>\n</body>\n</html>";
	exit;
}

// ps -aux (and mem):

if ($_GET['psaux']) {
	$psout  = "Command: ps -aux\n\n";
	$psout .= `ps -aux`;
	$psout = str_replace("<","&lt;",$psout);
	echo "<html>\n<body bgcolor='#000000' text='#CCCCCC' style='margin:10px 0 0 6px;padding:0'>\n<pre style='font-family:vt7X13,\"Courier New\";font-size:11px;line-height:14px'>$psout</pre>\n</body>\n</html>";
	exit;
}

if ($_GET['psmem']) {
	$psout  = "Command: ps -auxh --sort=size | tac\n\n";
	$psout .= "USER       PID %CPU %MEM   VSZ  RSS TTY      STAT START   TIME COMMAND\n";
	$psout .= `ps -auxh --sort=size | tac`;
	$psout = str_replace("<","&lt;",$psout);
	echo "<html>\n<body bgcolor='#000000' text='#CCCCCC' style='margin:10px 0 0 6px;padding:0'>\n<pre style='font-family:vt7X13,\"Courier New\";font-size:11px;line-height:14px'>$psout</pre>\n</body>\n</html>";
	exit;
}

// Command windows:

if ($_GET['cmd']) {
	$cmd = $_GET['cmd'];
	if ($cmd == "top") {
		$out = trim(`top -n 1 -b`);
		$meta = "<meta http-equiv=\"refresh\" content=\"".($top_refresh*60)."\">";
	}
	elseif ($cmd == "vpsstat") {
		list($out,$opages,$ppages) = vpsstat();
		$meta = "<meta http-equiv=\"refresh\" content=\"".($vpsstat_refresh*60)."\">";
	}
	elseif ($cmd == "netstat") {
		$out = netstat($netstat_com);
		$meta = "<meta http-equiv=\"refresh\" content=\"".($netstat_refresh*60)."\">";
		$buttons = "<input type='button' value='Listening' onClick=\"window.location.replace('$scriptname?cmd=netstat2');\" class='button' title='show listening ports'>\n";
		$title = "netstat -nt (TCP connections)";
	}
	elseif ($cmd == "netstat2") {
		$out = trim(`netstat -ntl`);
		$meta = "<meta http-equiv=\"refresh\" content=\"".($netstat_refresh*60)."\">";
		$buttons = "<input type='button' value='Active' onClick=\"window.location.replace('$scriptname?cmd=netstat');\" class='button' title='show active connections'>\n";
		$title = "netstat -ntl (listening TCP ports)";
	}
	elseif ($cmd == "mytop") {
		$out = trim(`$mysql_com`);
		$meta = "<meta http-equiv=\"refresh\" content=\"".($mysql_refresh*60)."\">";
	}
	elseif ($cmd == "mysqlreport") {
		$out = trim(`$mysql_com2`);
		$out = str_replace('_','-',$out);
		$meta = "<meta http-equiv=\"refresh\" content=\"".($mysql_refresh*60)."\">";
	}
	elseif ($cmd == "vnstat") {
		$out = trim(`vnstat`);
		$meta = "<meta http-equiv=\"refresh\" content=\"".($vnstat_refresh*60)."\">";
	}
	elseif ($cmd == "vnstat2") {
		$out = trim(`vnstat -d`);
		$meta = "<meta http-equiv=\"refresh\" content=\"".($vnstat_refresh*60)."\">";
		$title = "vnstat -d";
	}
	elseif ($cmd == "vnstat3") {
		$out = trim(`vnstat -m`);
		$meta = "<meta http-equiv=\"refresh\" content=\"".($vnstat_refresh*60)."\">";
		$title = "vnstat -m";
	}
	elseif ($cmd == "vnstat4") {
		$out = trim(`vnstat -tr | grep --after-context=3 Traffic`);
		$meta = "";
		$title = "vnstat -tr";
	}
	
	$reload = "$scriptname?cmd=$cmd";
	if (stristr($cmd,"vnstat")) {
		$buttons = "<input type='button' value='Sample' onClick=\"window.location.replace('$scriptname?cmd=vnstat4');\" class='button' title='sample current traffic - 5 second delay'>
<input type='button' value='Today' onClick=\"window.location.replace('$scriptname?cmd=vnstat');\" class='button' title='today & yesterday'>
<input type='button' value='Days' onClick=\"window.location.replace('$scriptname?cmd=vnstat2');\" class='button' title='daily totals'>
<input type='button' value='Months' onClick=\"window.location.replace('$scriptname?cmd=vnstat3');\" class='button' title='monthly totals'>
<input type='button' value='Close' onClick='javascript:window.close();' class='button' title='close window'>";
	}
	else {
		$buttons .= "<input type='button' value='Reload' onClick='javascript:window.location.reload();' class='button' title='reload $cmd'> <input type='button' value='Close' onClick='javascript:window.close();' class='button' title='close window'>";
	}
	if (!$title) {
		$title = $cmd;
	}
	poppage($cmd,$out,$meta,$reload,$shorttime,$buttons,$title);
	exit;
}

// Run the commands now (except vnstat & mysql) -------------------------------

$top = trim(`$top_com`);
$hostname = trim(`hostname`);
$netstat = netstat($netstat_com);
$pstree = trim(`$pstree_com`);
$df_full = trim(`$df_com`);
$tmp_full = trim(`$tmp_com`);
//$tmp_full = $tmp_com;
$allps = trim(`$allps_com`);

// Clean up / prep output -----------------------------------------------------

$netstat = preg_replace("/ {1,99}\n/", "\n", $netstat);
//$tmp_full = preg_replace("/ {1,99}/", "\n", $tmp_full);

// df - Disk Usage:

$lines = explode("\n", $df_full);
for ($i=0; $i<count($lines); $i++) {
	$line = preg_replace("/ {1,99}/", "|", $lines[$i]);
	$parts = explode("|",$line);
	if ($parts[0] !== $prev) {
		$mnt = $parts[5];
		$actual = " ($parts[2])";
		if (!stristr($line,"Filesystem")) {
			$per = substr($parts[4],0,-1);
			if ($per > 90) {
				$allfs .= "<span class='warn'>$mnt $parts[4]$actual</span>,&nbsp;";
			}
			else {
				$allfs .= "$mnt $parts[4]$actual,&nbsp;";
			}
		}
	}
	$prev = $parts[0];;
}
if (substr($allfs, -7) == ",&nbsp;") {
	$allfs = substr($allfs, 0, -7);
}

// Other summary stats:

$num_mysql = substr_count($pstree,'mysqld');
$num_httpd = substr_count($pstree,'httpd');
$num_tcp = substr_count($netstat,'tcp');

//Main page buttons:

// Box buttons to command windows:
$topcmdlink = "<a href='$scriptname?cmd=top' onClick=\"window.open('$scriptname?cmd=top', 'top', 'width=600, height=480, resizable'); return false\" title='open a top window' class='open'>&nbsp;+&nbsp;</a>";
$vpscmdlink = "<a href='$scriptname?cmd=vpsstat' onClick=\"window.open('$scriptname?cmd=vpsstat', 'vpsstat', 'width=540, height=180, resizable'); return false\" title='open a vpsstat window' class='open'>&nbsp;+&nbsp;</a>";
$netcmdlink = "<a href='$scriptname?cmd=netstat' onClick=\"window.open('$scriptname?cmd=netstat', 'netstat', 'width=600, height=480, resizable'); return false\" title='open a netstat window' class='open'>&nbsp;+&nbsp;</a>";

if ($mysql_mon == 1)
	$mycmdlink  = "<a href='$scriptname?cmd=mytop' onClick=\"window.open('$scriptname?cmd=mytop', 'mytop', 'width=600, height=345, resizable'); return false\" title='open a mytop window' class='open'>&nbsp;+&nbsp;</a>";
elseif ($mysql_mon == 2)
	$mycmdlink  = "<a href='$scriptname?cmd=mysqlreport' onClick=\"window.open('$scriptname?cmd=mysqlreport', 'mysqlreport', 'width=600, height=480, resizable'); return false\" title='open a mysqlreport window' class='open'>&nbsp;+&nbsp;</a>";
	
$vncmdlink  = "<a href='$scriptname?cmd=vnstat' onClick=\"window.open('$scriptname?cmd=vnstat', 'vnstat', 'width=525, height=345, resizable'); return false\" title='open a vnstat window' class='open'>&nbsp;+&nbsp;</a>";

// Button for 'cat /opt/server.log':
$lsal = "<input type='button' value='cat /opt/server.log' onClick=\"window.open('$scriptname?lsal=1', 'lsal', 'width=730, height=400, scrollbars, resizable'); return false\" title='show detailed list' class='button' style='width:75px'>\n";

// Button for 'ps -aux':
$psaux = "<input type='button' value='ps -aux' onClick=\"window.open('$scriptname?psaux=1', 'psaux', 'width=730, height=480, scrollbars, resizable'); return false\" title='show process list' class='button' style='width:85px;'>\n";

// Button for 'ps -aux --sort=size | tac' :)
$psmem = "<input type='button' value='ps -aux (mem)' onClick=\"window.open('$scriptname?psmem=1', 'psmem', 'width=730, height=480, scrollbars, resizable'); return false\" title='show process list, sorted by memory usage' class='button' style='width:85px;'>\n";

// Buttons for vnstat:
$vn_sampl = "<input type='button' value='Sample' onClick=\"window.open('$scriptname?cmd=vnstat4', 'vnstat', 'width=525, height=380, resizable'); return false\" class='button' title='sample current traffic - 5 second delay'>";
$vn_days  = "<input type='button' value='Days'   onClick=\"window.open('$scriptname?cmd=vnstat2', 'vnstat', 'width=525, height=380, resizable'); return false\" class='button' title='show daily totals'>";
$vn_mons  = "<input type='button' value='Months' onClick=\"window.open('$scriptname?cmd=vnstat3', 'vnstat', 'width=525, height=380, resizable'); return false\" class='button' title='show monthly totals'>";

// Buttons for netstat:
$netstat_ntl = "<input type='button' value='Listening' onClick=\"window.open('$scriptname?cmd=netstat2', 'netstat', 'width=600, height=480, resizable'); return false\" class='button' title='show listening ports'>";
$portslink   = "<input type='button' value='Port List' onClick=\"window.open('$scriptname?showports=1', 'portlist', 'width=300, height=330'); return false\" class='button' title='show explanatory list of ports'>";

// Button for mysqlreport:
$mysqlrep_det = "<input type='button' value='Full Report' onClick=\"window.open('$scriptname?cmd=mysqlreport', 'mysqlreport', 'width=600, height=480, resizable'); return false\" class='button' title='show detailed mysqlreport'>";

// Auto-refresh meta tag:

if ($refresh) {
	if ($refresh < 1) {
		$refresh = 1;
	}
	$refresh = ($refresh * 60);
	$meta_refresh = "<meta http-equiv=\"refresh\" content=\"$refresh\">\n";
}

// Load bar indicators:

$pattern = "/^.*\b(average)\b.*$/mi";
preg_match($pattern, $top, $hits);
$loadline = $hits[0];

$load_bits = explode("average:",$loadline);
$load_parts = explode(",",$load_bits[1]);
$load1 = trim($load_parts[0]);
$loadlabel1 = $load1;
$load5 = trim($load_parts[1]);
$loadlabel5 = $load5;
$load15 = trim($load_parts[2]);
$loadlabel15 = $load15;

if ($load1 > 10) {
	$load1 = 10;
}
if ($load5 > 10) {
	$load5 = 10;
}
if ($load15 > 10) {
	$load15 = 10;
}

if ($load1 > 1) {
	$load1_width = round(($load1 - 1) * 22.22);
	$bgcolor1 = "#82826E";
	$fgcolor1 = "#CC0000";
}
else {
	$load1_width = round($load1 * 200);
	$bgcolor1 = "#222222";
	$fgcolor1 = "#82826E";
}
if ($load5 > 1) {
	$load5_width = round(($load5 - 1) * 22.22);
	$bgcolor5 = "#82826E";
	$fgcolor5 = "#CC0000";
}
else {
	$load5_width = round($load5 * 200);
	$bgcolor5 = "#222222";
	$fgcolor5 = "#82826E";
}
if ($load15 > 1) {
	$load15_width = round(($load15 - 1) * 22.22);
	$bgcolor15 = "#82826E";
	$fgcolor15 = "#CC0000";
}
else {
	$load15_width = round($load15 * 200);
	$bgcolor15 = "#222222";
	$fgcolor15 = "#82826E";
}

// If users, hyperlink 'User(s)' in top display:

if (!stristr($top,"0 users,")) {
	$top = preg_replace("/(user|users),/", "<a href='$scriptname?users=1' onClick=\"window.open('$scriptname?users=1', 'users', 'width=625, height=300, scrollbars'); return false\" title='show users'>$1</a>,", $top);
}

// Mytop/mysqlreport and vnstat ------------------------------------------------
// Run or produce a useful message if not installed.

if ($mysql_mon == 1) {
	exec("which mytop",$output,$return);
	if ($return == 1) {
	 $mysql = "\n\nMytop is not installed. See the <a href='http://jeremy.zawodny.com/mysql/mytop/'>mytop website</a> for information.\n\n";
	 $mycmdlink = "";
	 $mysql_head = "";
	}
	elseif ($return == 0) {
		$mysql = trim(`$mysql_com`);
		$pattern = "/^.*\bQueries\b.*$/mi";
		preg_match($pattern, $mysql, $hits);
		$queryline = trim($hits[0]);
		$my_parts = explode(" ",$queryline);
	}
	$mysql_div = "<div class='subleftcmd'>$mycmdlink</div><div class='subleft'>mytop</div><div class='left'><pre>$mysql</pre></div>\n";
}
elseif ($mysql_mon == 2) {
	if (file_exists('mysqlreport') && is_executable('mysqlreport')) {
		$mysql = trim(`$mysql_com`);
		if (stristr($mysql,'uptime')) {
			// Get total queries for topbar display
			$parts = explode("_\n",$mysql);
			$parts = explode("\n",$parts[2]);
			$qline = preg_replace("/ {1,99}/", "|", $parts[0]);
			$my_parts = explode('|',$qline);
			// The 'Full report' button
			$full_report = "\n<div class='toolbar'>$mysqlrep_det</div>";
			// Change underscores to dashes for readability
			$mysql = str_replace('_','-',$mysql);
		}
		elseif (stristr($mysql,'Access denied for user')) {
			$mysql = "\n\nThe mysqlreport script was denied access to mysql. Check that the mysql username
&amp; password (in the vpsinfo configuration) are valid.\n\n";
			$mycmdlink = '';
		}
		elseif (stristr($mysql,'bad interpreter')) {
			$mysql = "\n\nThe mysqlreport script encountered a problem -- the first line does not have the
correct path for perl on your system.\n\n";
			$mycmdlink = '';
		}
		else {
			$mysql = "\n\nAn unknown error occurred with the mysqlreport script.\n\n";
			$mycmdlink = '';
		}
	}
	elseif (file_exists('mysqlreport')) {
		$mysql = "\n\nThe mysqlreport script could not be executed. Check the file ownership &amp; permissions.\n\n";
		$mycmdlink = '';
	}
	else {
		$mysql = "\n\nThe mysqlreport script was not found.\n		
You need to get it from <a href='http://hackmysql.com/mysqlreport'>http://hackmysql.com/mysqlreport</a>, store it in the same
directory as vpsinfo, and set correct ownership &amp; permissions.\n\n";
		$mycmdlink = '';
	}
	$mysql_div = "<div class='subleftcmd'>$mycmdlink</div><div class='subleft'>mysqlreport</div>
	<div class='left'><pre>$mysql</pre></div>$full_report\n";
}
	
if ($my_parts) {
	if (is_numeric($my_parts[1])) {
		$mysql_queries = round($my_parts[1]);
		$mysql_units = "";
	}
	else {
		$mysql_units = strtoupper(substr($my_parts[1],-1));
		if ($mysql_units == "M") {
			$mysql_queries = round(substr($my_parts[1],0,-1),2);
		}
		if ($mysql_units == "K") {
			$mysql_queries = round(substr($my_parts[1],0,-1));
		}
	}
	$mysql_head = "<td valign='top' nowrap><div class='head_label' style='padding-right:5px' title='number of mysql queries'>mysql queries</div><div class='head_num2' style='padding-right:5px'>$mysql_queries<span class='head_units'> $mysql_units</span></div></td>";
}

if ($vnstat) {
	exec("which vnstat",$output,$return);
	if ($return == 1) {
	 $vnstat = "\n\nVnstat is not installed. See the <a href='http://humdi.net/vnstat/'>vnstat website</a> for information.\n\n";
		$vncmdlink=''; $vn_sampl=''; $vn_days=''; $vn_mons='';
		$vnstat_div = "<div class='subleft'>vnstat</div><div class='left'><pre>$vnstat</pre></div>";
	}
	elseif ($return == 0) {
		$vnstat = trim(`$vnstat_com`);
		$pattern = "/^.*\btoday\b.*$/mi";
		preg_match_all($pattern, $vnstat, $hits);
		$todayline = $hits[0][0];
		$today = explode("|",$todayline);
		$today_mb = str_replace(" MB","",$today[2]);
		$today_mb = trim($today_mb);
		if (stristr($today_mb,",")) {
			$today_mb = str_replace(",","",$today_mb);
		}
		$today_mb = round($today_mb);
		if ($today_mb > 999) {
			$bw_today = round(($today_mb / 1024),1);
			$bw_units = "GB";
		}
		else {
			$bw_today = $today_mb;
			$bw_units = "MB";
		}
		if ($today_mb > $bw_alert) {
			$bw_today = "<span class='warn'>$bw_today</span>";
		}
		$vnstat_head = "<td valign='top' nowrap><div class='head_label' title='amount of data transferred today'>transfer today</div><div class='head_num'>$bw_today<span class='head_units'> $bw_units</span></div></td>
	";
		$vnstat_div = "<div class='subleftcmd'>$vncmdlink</div><div class='subleft'>vnstat</div><div class='leftscroll'><pre>$vnstat</pre></div>
		<div class='toolbar'>$vn_sampl $vn_days $vn_mons</div>";
	}
}
// vpsstat-like processing of user_beancounters or RAM & swap -----------------

list($vpsstat,$mem1,$mem1_units,$mem1_label,$mem1_tip,$mem2,$mem2_units,$mem2_label,$mem2_tip) = vpsstat();
if ($vpsstat) {
	$vpsstat_div = "<div class='subleftcmd'>$vpscmdlink</div><div class='subleft'>vpsstat</div><div class='left'><pre>$vpsstat</pre></div>\n";
}

// Process/daemon monitor -----------------------------------------------------

$allprocs = explode(" ", $processes);
foreach ($allprocs as $proc) {
	$proc = trim($proc);
	if (stristr($allps,$proc)) {
		$tcpstatus .= "<span class='servup' title='$proc is up'>&nbsp;$proc&nbsp;</span>&nbsp;";
	}
	else {
		$tcpstatus .= "<span class='servdown' title='$proc is down!'>&nbsp;$proc&nbsp;</span>&nbsp;";	
	}
}

// FUNCTIONS ==================================================================

function netstat($netstat_com) {
	$out = trim(`$netstat_com`);
	$out = str_replace(" Address","_Address",$out);
	$lines = explode("\n",$out);
	for ($i=0; $i<count($lines); $i++) {
		if ($i > 0) {
			$line = preg_replace("/ {1,99}/", "|", $lines[$i]);
			$line = str_replace("::ffff:","",$line);
			$parts = explode("|",$line);
			$col_0 = str_pad($parts[0], 5, " ", STR_PAD_RIGHT);
			$col_1 = str_pad($parts[1], 6, " ", STR_PAD_LEFT);
			$col_2 = str_pad($parts[2], 6, " ", STR_PAD_LEFT);
			$col_3 = str_pad($parts[3], 23, " ", STR_PAD_RIGHT);
			if (stristr($parts[4],":")) {
				$col_4_parts = explode(":",$parts[4]);
				$ip_str = $col_4_parts[0];
			}
			$col_4 = str_pad($parts[4], 23, " ", STR_PAD_RIGHT);
			if ($ip_str) {
				$link = "<a href='$scriptname?whois=$ip_str' onClick=\"window.open('$scriptname?whois=$ip_str', 'netstat', 'width=650, height=350, resizable, scrollbars'); return false\" title='whois $ip_str'>$ip_str</a>";
				$col_4 = str_replace($ip_str,$link,$col_4);
			}
			$col_5 = $parts[5];
			$cols  = $col_0." ".$col_1." ".$col_2." ".$col_3." ".$col_4." ".$col_5;
		}
		else {
			$cols = $lines[$i];
		}
		$all .= "\n" . $cols;
	}
	$all = str_replace("_Address"," Address",$all);
	return $all;
}
function poppage($cmd,$out,$meta,$reload,$shorttime,$buttons,$title) {
	echo "
	<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">
	<html>
	<head>
	<title>$cmd</title>
	$meta
	<style type='text/css'>
		html, body {
			width: 100%;
			height: 100%;
			overflow: hidden;
		}
		body {
			background-color: #000000;
			color: #CCCCCC;
			margin: 0;
			padding: 0;
		}
		#scroll {
			clear: both;
			overflow: auto;
			border: none;
			margin: 0;
			padding: 0;
			overflow-Y: auto;
			overflow-X: visible;
			scrollbar-face-color: #666666;
			scrollbar-track-color: #999999;
			scrollbar-3dlight-color: #999999;
			scrollbar-highlight-color: #666666;
		}
		pre {
			font-family: vt7X13,\"Courier New\",Courier,monospace;
			font-size: 11px;
			line-height: 14px;
			padding: 5px 5px 10px 6px;
			margin: 0;
		}
		div.title {
			float: left;
			font-family: Verdana,Arial,Helvetica,sans-serif;
			background-color: #333333;
			color: #DDDDDD;
			font-size: 13px;
			font-weight: bold;
			padding: 4px 0 2px 6px;
		}
		div.commands {
			font-family: Verdana,Arial,Helvetica,sans-serif;
			background-color: #333333;
			text-align: right;
			font-size: 13px;
			padding: 4px 10px 5px 0;
			border-bottom: 1px solid #666666;
		}
		.button {
			width: 60px;
			font-size: 11px;
			border: 1px solid #999999;
			background-color: #666666;
			color: #FFFFFF;
		}
		a:link, a:visited, a:active {
			color: #BBBB00;
			text-decoration: none;
		}
	</style>
	<script language='javascript'>
	function fullHgt() {
		if (document.getElementById('scroll')) {
			var hgt = document.body.clientHeight - 27;
			document.getElementById('scroll').style.height=hgt+'px';
		}
	}
	</script>

	</head>
	<body onLoad='fullHgt()' onResize='fullHgt()'>
	<div class='title'>$title @ $shorttime</div>
	<div class='commands'>$buttons </div>
	<div id='scroll'><pre>$out</pre></div>
	
	</body>\n</html>";
}

function vpsstat() {
	$rawbeans = `/bin/beanc 2> /dev/null`;
	if (!$rawbeans) {
		if (file_exists('/proc/user_beancounters')) {
			$rawbeans = `cat /proc/user_beancounters 2> /dev/null`;
		}
		else {
			$ded=TRUE;
		}
	}
	if ($rawbeans) {
		$lines = explode("\n", $rawbeans);
		for ($i=0; $i<count($lines); $i++) {
			if (preg_match("/oomg|privv|numpr|numt|numo|numfi/",$lines[$i])) {
				$line = preg_replace("/ {1,99}/", "|", $lines[$i]);
				$line_parts = explode("|",$line);
				if (stristr($lines[$i],"oomg") || stristr($lines[$i],"privv")) {
					$cur = round($line_parts[2] / 256, 1) . " MB";
					$rec = round($line_parts[3] / 256, 1) . " MB";
					$bar = round($line_parts[4] / 256) . " MB";
					if (stristr($lines[$i],"oomg")) {
						$lim = "n/a";
						$mem1 = round($cur);
						if ($mem1 > $bar) {
							$mem1 = "<span class='warn'>$mem1</span>";
						}
						$mem1_label = "oomguarpages";
						$oomg_per = round($mem1 / $bar * 100);
						$mem1_tip = "title='oomguarpages is guaranteed memory; you are using $oomg_per% of your quota'";
						$mem1_units = "MB";
					}
					else {
						$lim = round($line_parts[5] / 256) . " MB";
						$mem2 = round($cur);
						$mem2_label = "privvmpages";
						$pmg_per = round($mem2 / $lim * 100);
						$mem2_tip = "title='privvmpages is burstable memory; you are using $pmg_per% of your limit'";
						$mem2_units = "MB";
					}
				}
				else {
					$cur = $line_parts[2];
					$rec = $line_parts[3];
					$bar = "n/a";
					$lim = $line_parts[5];
				}
				$beans .= str_pad($line_parts[1],12) . str_pad($cur, 12, " ", STR_PAD_LEFT) .str_pad($rec, 12, " ", STR_PAD_LEFT) . str_pad($bar, 12, " ", STR_PAD_LEFT) . str_pad($lim, 12, " ", STR_PAD_LEFT) . str_pad($line_parts[6], 12, " ", STR_PAD_LEFT) . "\n";
			}
		}
		$parts = explode("\n",$beans);
		$vpsstat  = "Resource         Current  Recent Max     Barrier       Limit    Failures\n";
		$vpsstat .= "------------  ----------  ----------  ----------  ----------  ----------\n";
		$vpsstat .= "$parts[2]\n$parts[0]\n$parts[1]\n$parts[3]\n$parts[4]\n$parts[5]";
	}
	if (!$vpsstat && $ded==FALSE) {
		$vpsstat = "\n			
It seems you're running Virtuozzo 3 or OpenVZ. In order to read the VPS stats
(beancounters) you need a small 'helper' app. To install it do the following at
a shell prompt as root:

[root@vps] wget http://www.labradordata.ca/downloads/install_beanc.sh
[root@vps] sh install_beanc.sh\n\n";
	}
	elseif ($ded==TRUE) {
		$free = `free`;
		if ($free) {
			$pattern = "/^.*\bMem\b.*$/mi";
			preg_match($pattern, $free, $hits);
			$memline = $hits[0];
			$memline = preg_replace("/ {1,99}/", "|", $memline);
			$parts = explode("|",$memline);
			$kbytes = $parts[3];
			$mbytes = round($kbytes / 1024);
			if ($mbytes > 999) {
				$mem1 = round(($mbytes / 1024),1);
				$mem1_units = "GB";
			}
			else {
				$mem1 = $mbytes;
				$mem1_units = "MB";
			}
			$mem1_label = "free RAM";
			$mem1_tip = "title='amount of free memory'";
			$pattern = "/^.*\bSwap\b.*$/mi";
			preg_match($pattern, $free, $hits);
			$memline = $hits[0];
			$memline = preg_replace("/ {1,99}/", "|", $memline);
			$parts = explode("|",$memline);
			$kbytes = $parts[2];
			$mbytes = round($kbytes / 1024);
			if ($mbytes > 999) {
				$mem2 = round(($mbytes / 1024),1);
				$mem2_units = "GB";
			}
			else {
				$mem2 = $mbytes;
				$mem2_units = "MB";
			}
			$mem2_label = "swap used";
			$mem2_tip = "title='amount of swap space currently used'";
		}
	}
	return array($vpsstat,$mem1,$mem1_units,$mem1_label,$mem1_tip,$mem2,$mem2_units,$mem2_label,$mem2_tip);
}

$mtime = explode (" ", microtime());
$tend = $mtime[0] + $mtime[1];
$totaltime = round(($tend - $tstart),4);
$pagegen = "page generated in $totaltime sec.";

// MAIN PAGE OUTPUT ===========================================================

if ($gzip) {
	ini_set('zlib.output_compression_level', 1);
	ob_start("ob_gzhandler");
}
header("Cache-Control: no-cache, must-revalidate");
header('Pragma: no-cache');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<?=$meta_refresh?>
<style type ='text/css'>
BODY {
	font-family: Verdana,Arial,Helvetica,sans-serif;
	background-color: #31311B;
	color: #CCCCCC;
	margin: 5px 5px 30px 5px;
	padding: 0;
}

/* General layout ---------------------------- */

div.space {
	font-size: 1px;
	height: 3px;
}
td.head {
	border: 1px solid #666666;
	background-color: #000000;
}
td.tdleft {
}
td.tdright {
	padding-left: 5px;
}

/* Header section ---------------------------- */

div.hostname {
	font-size: 16px;
	font-weight: bold;
	color: #DDDDDD;
	padding: 2px 0 2px 5px;
}
div.date {
	font-size: 13px;
	font-weight: bold;
	color: #DDDDDD;
	padding: 0 0 2px 5px;
}
div.head_label {
	font-family: Tahoma,"MS Sans Serif",Arial,Helvetica,sans-serif;
	font-size: 11px;
	padding-left: 13px;
	text-align: right;
	cursor: help;
}
div.head_num {
	font-size: 22px;
	padding-left: 13px;
	padding-right: 1px;
	text-align: right;
}
div.head_num2 {
	font-size: 18px;
	padding-left: 13px;
	padding-right: 1px;
	text-align: right;
}
.head_units {
	font-family: Tahoma,"MS Sans Serif",Arial,Helvetica,sans-serif;
	font-size: 10px;
	vertical-align : super;
}
div.head_sum {
	font-family: Tahoma,"MS Sans Serif",Arial,Helvetica,sans-serif;
	font-size: 11px;
	padding: 1px 5px 2px 0;
	text-align: right;
}
/* Service monitoring in the header */
div.servstatus {
	font-family: Tahoma,"MS Sans Serif",Arial,Helvetica,sans-serif;
  font-size: 11px;
	background-color: #333333;
	padding: 2px 0 2px 2px;
}
span.servup {
	background-color: #004000;
	color: #CCCCCC;
	cursor: help;
}
span.servdown {
	background-color: #CC0000;
	color: #FFFFFF;
	cursor: help;
}
div.disk {
	font-family: Tahoma,"MS Sans Serif",Arial,Helvetica,sans-serif;
	font-size: 11px;
	text-align: right;
	background-color: #333333;
	padding: 2px 5px 2px 0;
}
.warn {
	background-color: #CC0000;
}
/* Load bars */
div.load_label {
	height: 12px;
	font-family: Tahoma,"MS Sans Serif",Arial,Helvetica,sans-serif;
	font-size: 11px;
	color: #CCCCCC;
	line-height: 11px;
	text-align: right;
	cursor: help;
}
div.load_bg {
	font-size: 2px;
	height: 10px;
	width: 200px;
	cursor: help;
}
div.load_fg {
	height: 10px;
}

/* Box layouts ------------------------------- */

div.subleft,div.subright {
	font-size: 13px;
	font-weight: bold;
	background-color: #333333;
	color: #DDDDDD;
}
div.subleft {
	width: auto;
	border: 1px solid #666666;
	border-bottom: none;
	margin-top: 5px;
	padding: 0 0 3px 6px;
}
div.subright {
	width: auto;
	border: 1px solid #666666;
	border-bottom: none;
	margin-top: 5px;
	padding: 0 0 3px 6px;
}
div.left {
	clear: right;
	margin: 0;
	background-color: #000000;
	border: 1px solid #666666;
	border-top: none;
}
div.leftscroll {
	clear: right;
	height: 230px;
	overflow: auto;
	margin-right: -1px;
	background-color: #000000;
	border: 1px solid #666666;
	border-bottom: 1px solid #444444;
	border-top: none;
	/* IE-specific hacks */
	overflow-Y: auto;
	overflow-X: visible;
	scrollbar-face-color: #666666;
	scrollbar-track-color: #999999;
	scrollbar-3dlight-color: #999999;
	scrollbar-highlight-color: #666666;
}
div.right,div.toolbar,div.toolbar_left {
	width: auto;
	background-color: #000000;
	border: 1px solid #666666;
	border-top: none;
}
div.toolbar {
	border-top: none;
	padding: 3px 5px 4px 0;
	text-align: right;
}
div.toolbar_left {
	border-top: none;
	padding: 3px 0 4px 5px;
	text-align: left;
}
	
/* Box buttons to command windows */

div.subleftcmd {
	text-align: right;
	font-size: 10px;
	line-height: 14px;
	float: right;
	margin-top: 5px;
	margin-right: 0px;
	padding-bottom: 1px;
	border: 1px solid #777777;
	border-top: none;
	border-right: none;
	background-color: #666666;
}
/* Box button links: "+" */

a:link.open, a:visited.open,a:active.open {
	color: #EEEEEE;
}

/* Whois lookup */

.whois_title {
	font-size: 13px;
	font-weight: bold;
	color: #BBBBBB;
}
form.whois {
	margin: 0;
	padding: 0;
}
input.whois_input {
	width: 150px;
	font-family: vt7X13,"Courier New",Courier,monospace;
	font-size: 11px;
	line-height: 13px;
	border: 1px solid #999999;
	background-color: #CCCCCC;
}
input.button {
	width: 65px;
	font-family: Tahoma,"MS Sans Serif",Arial,Helvetica,sans-serif;
	font-size: 11px;
	border: 1px solid #999999;
	background-color: #666666;
	color: #FFFFFF;
	cursor: pointer;
}

/* Content formatting ------------------------ */

pre {
	font-family: vt7X13,"Courier New",Courier,monospace;
	font-size: 11px;
	line-height: 14px;
	padding: 5px 5px 10px 6px;
	margin: 0;
}
a:link, a:visited, a:active {
	color: #BBBB00;
	text-decoration: none;
}
div.note {
	font-size: 11px;
	font-style: italic;
	padding: 5px 0 0 5px;
}
div.sig {
	font-size: 11px;
	color: #999999;
	padding: 25px 0 0 0;
	text-align: center;
}
</style>
<title><?=$hostname?> : vpsinfo</title>
</head>

<body>

<table width='100%' cellspacing=0 cellpadding=0 border=0>

<tr>
<td class='head'>

<table width='100%' cellspacing=0 cellpadding=0 border=0>
<tr>
<td><div class='servstatus'><?=$tcpstatus?></div></td>
<td align='right'><div class='disk'>Disk Usage: <?=$allfs?></div></td>
</tr>
</table>

<table width='100%' cellspacing=0 cellpadding=0 border=0>
<tr>
<td valign='top' nowrap><div class='hostname'><?=$hostname?></div><div class='date'><?=$localtime?></div></td>
<td><div style='padding-left:20px'>
	<table cellspacing=0 cellpadding=0 border=0>
	<tr>
	<td nowrap><div class='load_label' title='load average during last 1 minute'><?=$loadlabel1?>&nbsp;</div></td>
	<td>
	<div class='load_bg' style='background-color: <?=$bgcolor1?>' title='load average during last 1 minute'>
	<div class='load_fg' style='width: <?=$load1_width?>px; background-color: <?=$fgcolor1?>'>&nbsp;</div>
	</div>
	</td>
	</tr>
	<tr>
	<td nowrap><div class='load_label' title='load average during last 5 minutes'><?=$loadlabel5?>&nbsp;</div></td>
	<td>
	<div class='load_bg' style='background-color: <?=$bgcolor5?>' title='load average during last 5 minutes'>
	<div class='load_fg' style='width: <?=$load5_width?>px; background-color: <?=$fgcolor5?>'>&nbsp;</div>
	</div>
	</td>
	</tr>
	<tr>
	<td nowrap><div class='load_label' title='load average during last 15 minutes'><?=$loadlabel15?>&nbsp;</div></td>
	<td>
	<div class='load_bg' style='background-color: <?=$bgcolor15?>' title='load average during last 15 minutes'>
	<div class='load_fg' style='width: <?=$load15_width?>px; background-color: <?=$fgcolor15?>'>&nbsp;</div>
	</div>
	</td>
	</tr>
	</table>
</div></td>
<td valign='top' nowrap><div class='head_label' <?=$mem1_tip?>><?=$mem1_label?></div><div class='head_num'><?=$mem1?><span class='head_units'> <?=$mem1_units?></span></div></td>
<td valign='top' nowrap><div class='head_label' <?=$mem2_tip?>><?=$mem2_label?></div><div class='head_num'><?=$mem2?><span class='head_units'> <?=$mem2_units?></span></div></td>
<?=$vnstat_head?>
<td valign='top' nowrap><div class='head_label' title='number of current TCP connections'>tcp conn</div><div class='head_num2'><?=$num_tcp?></div></td>
<td valign='top' nowrap><div class='head_label' title='number of apache processes and threads'>apache thds</div><div class='head_num2'><?=$num_httpd?></div></td>
<td valign='top' nowrap><div class='head_label' title='number of mysql processes and threads'>mysql thds</div><div class='head_num2'><?=$num_mysql?></div></td>
<?=$mysql_head?>
<td width='25%'><div class='space'>&nbsp;</div></td>
</tr>
</table>

</td>
</tr>
</table>

<table width='100%' cellspacing=0 cellpadding=0 border=0 style='margin-top: -3px'>
<tr>
<td><div class='space' style='width:<?=$leftcol?>px'>&nbsp;</div></td>
<td width='50%'><div class='space'></td>
</tr>
<tr>
<td valign='top' class='tdleft'><div class='subleftcmd'><?=$topcmdlink?></div><div class='subleft'> top</div><div class='leftscroll'><pre><?=$top?></pre></div>
<div class='toolbar'><?=$psaux?> <?=$psmem?></div>

<?=$vpsstat_div?>
<div class='subleftcmd'><?=$netcmdlink?></div><div class='subleft'><?=$netstat_com?></div><div class='leftscroll'><pre><?=$netstat?></pre></div>
<div class='toolbar_left'><table width='100%' cellspacing=0 cellpadding=0 border=0><tr><td><form method='post' action='<?=$scriptname?>' class='whois' name='whois_form'><span class='whois_title'>Whois: </span><input type='text' name='whois' class='whois_input' title='enter an IP address or domain'> <input type='submit' value='Lookup' class='button' title='do the lookup' onClick="javascript: if (whois_form.whois.value=='') { alert('Please enter an IP address or domain');return false; }"> <input type='reset' name='clear' value='Clear' class='button' title='clear the entry'></form></td><td align='right' style='padding-right:5px'><?=$netstat_ntl?> <?=$portslink?></td></tr></table></div>
<?=$vnstat_div?>
<?=$mysql_div?></td>
<td valign='top' class='tdright'><div class='subright'>pstree</div><div class='right'><pre><?=$pstree?></pre></div>
<div class='subright'>cat /opt/server.log</div><div class='right' style='border-bottom:1px solid #444444'><div class='note'>Ignoring PHP session files (sess_*)</div><pre><?=$tmp_full?></pre></div>
<div class='toolbar_left'><?=$lsal?></div></td>
</tr>

</table>

<div class='sig'><a href='http://www.labradordata.ca/vpsinfo/'>vpsinfo</a> <?=$version?> by Douglas Robbins<br><?=$pagegen?><br>comments &amp; suggestions always welcome: <a href='http://www.labradordata.ca/home/email=4'>email</a></div>

</body>
</html>
