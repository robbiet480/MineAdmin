<?php
header('Content-type: text/html');
  echo "<!--";
  for($i=0;$i<1000;$i++) {
  echo "          ";
  }
  echo "-->";
  flush();
?>
<html>
  <head>
  <title>Chat</title>
  </head>
  <body>
  <table>
  <th>Player</th>
  <th>Message</th>
  <th>Source</th>
  <th>Date</th>
<?php
  $f = fopen("http://".$API['ADDRESS'].":".$API['PORT']."/api/subscribe?source=chat&username=".$API['USER']."&password=".$API['PASS']."","r");
  ob_end_flush();
  while(!feof($f)) {
  $output = fread($f,8192);
  $arr = json_decode($output,true);
print_r($arr);
echo "<tr>";
  echo "<td>".$arr['data']['player']."</td><td>".$arr['data']['message']."</td><td>".$arr['source']."</td><td>".date('r')."</td><br>\n";
  echo "</tr>";
  flush();
  }
  fclose($f);
  ?>
</table>
  </body>
  </html>