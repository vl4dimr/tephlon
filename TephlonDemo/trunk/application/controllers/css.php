<?php
class Css extends Controller{
	function Css(){
		parent::Controller();
		$this->width = 960;
		$this->green = "#0a0";
		$this->grey0 = "#aaa";
		$this->grey1 = "#777";
		$this->grey2 = "#666";
		$this->grey3 = "#555";
		$this->serif = "Palatino, Georgia, 'Times New Roman', serif";
		$this->sans = "'Helvetica Neue', Helvetica, Arial, sans-serif";
		$this->width1 =  480;
		header('Content-type: text/css');
	}
	function tbuffer_fifo(){
		$this->index();
		
		print("
#code span{
    font-family: monospace;
    font-size: 95%;
}
.description {
    font-size: 105%;
    line-height: 1.5em;
    color: $this->grey1;
    }
#window {
    border-top: 0px;
}
#typein, #chat{
    width: 100%;
    margin: 10px auto;
    padding: 0.3em 0;  
    margin-bottom: 1em;
}

.line{
  padding: 0.2em 0em  0.3em 0.2em;
  margin-top:0.2em;
  border-bottom: 1px solid $this->grey0;
  color: #555;
  font-size:80%;
}
.lineNum {
    float: right;
    padding-left: 1em;
    width: 30px;
    color: $this->grey0;
    margin-right:-2.8em;
}
.nick {
    margin-left: 0.4em;
    color: $this->green;
    display:inline;
}

.nick a {
    text-decoration: underline;
}

#typein{
    border: 0;
    margin-bottom:0;
    padding-bottom:0;
    display:inline;
}
.typeform {
    width: 300px;
}

a .nick :hover {
    border-bottom: 1px solid $this->green;
}
form .nick{
    margin:0;
    padding: 0;
}
form {
display: inline;
}	
		");
	}
	
	function index(){
		print( "@CHARSET \"ISO-8859-1\";
*{
    font-family: $this->serif;
    font-size: 16px;
    color: $this->grey1;
    line-height: 1.5em;
}
form, div, span {
    margin:0;
    padding:0;
}

ul, ol, li {
    margin: 0.4em 0;
	}
h1, h2, h3 {
	padding: 0;
	font-size: 1.4em;
	margin: 2em 0 0.3em 0;
	line-height: 1.3em;
	font-family: $this->sans;
	color: $this->grey1;
}
h3, h4{
    font-style: italic;
    border-left: 2px solid $this->green ;
    padding-left: 0.5em;
    color: $this->grey2
}
h2{
	font-size: 1.7em;
	color: $this->grey3;
	border-left: 3px solid $this->green ;
    padding-left: 0.5em;
}
h1{
    font-size: 2em;
    margin-top:1em;
    color: $this->green;
}
blockquote, h1.headline {
    margin: 2em;
    float: right;
    font-weight: bold;
    color: $this->grey1;
    background: #f8fff8;
    font-style: italic;
    font-size: 120%;
    border: 1px solid  #d8ddd8;
    padding: 1em;
}
blockquote {
   margin-right:0;
   width: 50%;
	}
#header{
    margin-bottom: 20px;
    color: $this->green;
    padding: 0.2em 0.5em 0.5em 0em; 
}
.separator {
    border-bottom: 1px solid $this->grey1;
}
a {
    color: $this->green;
    text-decoration: none;
    cursor: pointer;
}
#wrap {
    width: ".$this->width."px;
    margin: 0 auto;
}
 
li{
    list-style: square;
}
ul,ol {
    margin:0; padding:0;
}

#footer {
    clear:both;
    height:100px;
    border-top: 1px solid $this->green;
    margin-top:2em;
}
.column{
    display:inline;
    margin-right: 4em;
    float: left;
	}
.column li {
    margin-left: 1em;
	}


input{
    float: right;
}
.error {
   background: #FBE6F2;
	border: 1px solid #D893A1;
	color: #333;
	margin: 10px 0px 5px;
	padding: 10px;	
}
.description_image {
	background-color: #F4F4F4;
	border: 1px solid #DDD;
	font-size: 11px;
	font-style: italic;
	margin-bottom: 30px;
	overflow: hidden;
	padding-bottom: 15px;
	padding-bottom: 15px;
	padding: 20px 20px 15px;
	text-align: center;
}
.mediaContainer{
        background: #efefef;
        border: 1px solid #dedede;
        border-top: 1px solid #d8d8d8;
        margin: 1em 0;
}
.media h3{
    margin:0;
    color: $this->grey2;
    font-size:120%;
	}
.media {
    margin-top:0;
    background: white;
    border: 1px solid #d0d0d0;
    border-top: 1px solid #ddd;
    margin-bottom: 1em;
    padding: 0.7em; 
}
    
/* Splittings */
.splitting {margin-bottom: 2em;}
.s1ab { /* Top */
    display:block;
}
.s1b { /* Code */
    display: inline;
    float: left;
    width: ".$this->width1."px;
}
.s2b { /* Window */
    display:inline;
    float: right;
    padding:5px;
    width: ".($this->width - ($this->width1 + 10))."px;
}
");
		/* END CSS*/
	}
	function ie(){
		echo "
#wrap {
    margin:0 auto;
    /* margin-left: 30px; */
}
.lineNum {
	float: left;
	margin:0;
	padding:0;
}
#typein form label, #typein form input{
    display: inline;
	}
	";
	}
    function commits(){
    	$this->width1 = 570;
    	$this->index();
    	echo "
    	ul.commits {
    	padding: 1em 1em;
    	width: 350px; 	
    	}
    	#s1b{}
    	ul.commits li {
    	  list-style:none;
        }
        .clear {
            clear:both;
        }
        .svninfo, .svninfo a{
            width: 30px; 
            color: white;
           padding: 0em;
           font-size: 30px;
           width: 60px;
    	   font-family:  $this->sans;
    	    line-height:28px;
           display:block;
           text-align:center;
        }
        div.svninfo{
            display:inline;
            float:left;
            margin: 0 1em 1em 0;
        }
    	ul.commits li span.message{
            display:inline;
            color:$this->grey1;
            font-size:100%;
        }
        ul.commits li span.date {
            color: $this->grey1;
            display:block;
            margin-top:2em;
            font-size: 13px;
        }
        ul.commits li span.date strong {
            font-weight: normal;
            color: $this->grey2;
        }
    	ul.commits li span.revision {
    	   background: $this->grey1;
    	   border: 1px solid $this->grey0;
    	   border-bottom:0;
    	   height: 60px;
    	  
    	}
    	ul.commits li span.author a {
            background: $this->green;
            border: 1px solid $this->grey0;
            border-top:0;
            display:block;
            width: 60px;
            font-size:13px;
            margin:0;
        }
    	"; 
    }
    function home(){
    $this->commits();
       echo "
    	h1.headline{
    	  display:block;
    	  float:none;
    	  margin:0px;
    	  padding:0.5em;
            
        }
        ";
    }
    function wiki(){
    	$this->index();
        echo '
    #wiki pre span{
        font-size:90%;
        line-heigth:0.8em;      
    }
        ';
    }
}