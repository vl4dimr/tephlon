<?php
if(!isset($css_file)){
	$css_file = "index";
}

?>

<?php doctype('xhtml1-trans')?>
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head profile="http://gmpg.org/xfn/11"> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
<title><?php echo $title ?>  | Tephlon Demo</title> 
 
<?php echo link_tag('index.php/css/'.$css_file  )?>

<!--[if lte IE 8]>
    <?php echo link_tag('index.php/css/ie')?>
<![endif]--> 
<?php echo js_asset('jquery.min.js')?>
<?php if(isset($assets)) echo $assets?>

</head>
<body onload="prettyPrint()">
<div id="wrap">
<div id="header" class="separator">
<h1>Tephlon Demo</h1>
</div>
<?php echo $content?>
<div id="footer">
&nbsp;
</div>
</div>

</body>
</html>

