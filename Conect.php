<?php

date_default_timezone_set('Asia/Baghdad');
$d = date('D'); 
$amrakl6 = "";
$BBI4BB = "";//username db
$amrakl = "";//password db
$amraklllbot = "";//name db
$db = mysqli_connect($amrakl6, $BBI4BB, $amrakl, $amraklllbot);
if($db){echo "true";}else{echo "false";}
function mys($key, $type, $value = null){
global $db;
if($type == "Get"){
$value = mysqli_fetch_assoc(mysqli_query($db, "SELECT info FROM murt WHERE murtfile='$key'"));
$value = $value['info'];
}else{
mysqli_query($db, "UPDATE murt SET info='$value' WHERE murtfile='$key'");
$value = true;
}
return $value;
}
######################################################
#you'r the best this is connecting file           ####
# @amrakl  @amrakl6 Don't touch anything   ####               
######################################################
$filejson = json_decode(mys('file',"Get"),true);
$records = json_decode(mys('records',"Get"),true);
$sales = json_decode(mys('sales',"Get"),true);
$move = json_decode(mys('move',"Get"),true);
$sttingst = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM murt WHERE murtfile ='file'"));
$sttingst2 = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM murt WHERE murtfile ='records'"));
$sttingst3 = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM murt WHERE murtfile ='sales'"));
$sttingst4 = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM murt WHERE murtfile ='move'"));
if(!$sttingst){
mysqli_query($db,"INSERT INTO murt(murtfile,info) VALUES ('file','')");
return false;
}
if(!$sttingst2){
mysqli_query($db,"INSERT INTO murt(murtfile,info) VALUES ('records','')");
return false;
}
if(!$sttingst3){
mysqli_query($db,"INSERT INTO murt(murtfile,info) VALUES ('sales','')");
return false;
}
if(!$sttingst4){
mysqli_query($db,"INSERT INTO murt(murtfile,info) VALUES ('move','')");
return false;
}
