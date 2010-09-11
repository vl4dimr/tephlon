<?php
if(!isset($css_file)){
	$css_file = "index";
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head profile="http://gmpg.org/xfn/11"> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
<title><?php echo $title ?>  | Tephlon Demo</title> 
 
<?php echo link_tag('index.php/css/'.$css_file)?>

<!--[if lte IE 8]>
    <?php echo link_tag('index.php/css/ie')?>
<![endif]--> 


</head>
<body>
<div id="wrap">
<div id="header" class="separator">
<h1><a href="<?php echo site_url()?>">Tephlon Demo</a></h1>
</div>
<?php echo $content?>
<div id="footer">
<?php $this->load->view('elements/footer', array("site_url" => site_url()))?>
</div>
</div>
<?php echo js_asset('jquery.min.js')?>
<?php if(isset($assets)) echo $assets?>
</body>
</html>

