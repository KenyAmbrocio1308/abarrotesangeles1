<?php
include("../res/x5engine.php");
$nameList = array("k6m","uuy","wwe","tc6","s55","tlr","rur","z6h","5gv","zpj");
$charList = array("Y","4","M","N","A","M","P","C","8","N");
$cpt = new X5Captcha($nameList, $charList);
//Check Captcha
if ($_GET["action"] == "check")
	echo $cpt->check($_GET["code"], $_GET["ans"]);
//Show Captcha chars
else if ($_GET["action"] == "show")
	echo $cpt->show($_GET['code']);
// End of file x5captcha.php
