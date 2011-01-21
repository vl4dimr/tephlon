@CHARSET "ISO-8859-1";
*{
    font-family: Palatino, Georgia, 'Times New Roman', serif;
}
h1, h2, h3 {
  padding: 0;
  margin:0.5em 0;
  line-height: 1.3em;
 font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
}
#header{
   margin-bottom:20px;
    color: #0a0;
    padding: 0.2em 0.5em 0.5 0em; 
    border-bottom: 1px solid #aba;
}
a {
	text-decoration:none;
	cursor: pointer;
}
#wrap {
    width: 960px;
    margin: 0 auto;
}
 
#description{
line-height: 1.5em;
    display: inline;
    float: left;
    width:380px;
}
#window {
    display:inline;
    float: right;
    padding:5px;
    width: 500px;
   
   
    border-top: 0px;
    bottom: 20px;
   
}
#typein, #chat{
    width: 90%;
    margin: 10px auto;
    padding: 0.3em;
    
}
.line{
  padding: 0.2em 0em  0.3em 0.2em;
  margin-top:0.2em;
  border-bottom: 1px solid #dedede;
  color: #555;
  font-size:80%;
}
.lineNum {
float: right;
    padding-left: 1em;
    width: 30px;
    color: #999;
    margin-right:-2.8em;
}
.nick {
    margin-left: 0.4em;
    color: #090;
}
.delete {
    background: url(.gif) no-repeat 0% 0%;
	display: block;
	float: right;
	height: 14px;
	margin-right: 3px;
	width: 13px;
}
#typein{
    border: 0;
    margin-bottom:0;
    padding-bottom:0;
}
#description h2{
color: #666;
border-left: 3 px solid #0a0 ;
padding-left: 0.5em;
}
#description {
    color: #777;
    font-size: 110%;
}
li{
list-style: square;
}
ul,ol {
margin:0; padding:0;
}
.typeform {
width: 300px;
}
form .nick{
margin:0;
padding: 0;
}
#footer {
    clear:both;
    height:100px;
    border-top: 1px solid #0a0;
}
input{
    float: right;
}