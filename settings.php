<?php
require_once('header_inc.php');
if($_GET['save']=="1"){
    $minecraft->configuration($_POST);
}
$config=$minecraft->configuration_files();
//echo "Coming soon....";
//exit;
head("Administration Settings");
?>
	<div id="page_wrap">
		<div id="online_wrap">
                    <form method="post" action="settings.php?save=1">
			<h1>Configuration Settings</h1>
                        <?php
                        foreach($config as $configuration){
                            ?><h1 style="width:850px;float:left;border-bottom:1px solid #e0e0e0;margin-top:40px;" class="over_html_h1">Configuration File: <?php echo $configuration['file'];?></h1><?php
                            foreach($configuration['properties'] as $conf){
                                ?>
                                <div class="over_html_row_wrap" style="width:840px;">
                                    <label>
                                        <span class="over_html_row" style="width:300px;font-size:18px;"><?php echo $conf[0];?></span>
                                        <input class="input_text" style="width:400px;margin-left:10px; type="text" name="<?php echo $configuration['file'].".".$conf[0];?>" value="<?php echo $conf[1];?>">
                                    </label>
                                </div>
                                <?php
                            }
                            ?>
                            <span class="input_area"><input class="button" type="submit" value="Save" /></span>
                            <?PHP
                        }
                        ?>
                        <div class="over_html_row_wrap" style="width:840px;">
                            <label>
                                <span class="over_html_row" style="width:300px;font-size:18px;"></span>
                                <span class="input_area"><input class="button" type="submit" value="Save" /></span>
                            </label>
                        </div>
                    </form>
		</div>
	</div>
        <script type="text/javascript">
		$("body").ready(function(){
			$(".fancy").fancybox();
		});
	</script> 
</body>
</html>