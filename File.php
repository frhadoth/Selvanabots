<?php


header('Content-Type: application/json; charset=utf-8');

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$id = $message->from->id;
$chat_id = $message->chat->id;
$text = $message->text;
$user = $message->from->username;
$userr = '@'.$message->from->username;
$userrr = '@'.$update->callback_query->from->username;
$name = $message->from->first_name;
$message_id2 = $update->callback_query->message->message_id;
$chat_id2 = $update->callback_query->message->chat->id;
$from_id = $message->from->id;
$nammee = $update->callback_query->from->first_name;
$bott = bot('getme',['bot'])->result->username;
$photo = $message->photo;
$video = $message->video;
$sticker = $message->sticker;
$file = $message->document;
$audio = $message->audio;
$voice = $message->voice;
$caption = $message->caption;
$photo_id = $message->photo[0]->file_id;
$video_id= $message->video->file_id;
$sticker_id = $message->sticker->file_id;
$file_id = $message->document->file_id;
$music_id = $message->audio->file_id;
$voice_id = $message->voice->file_id;
if(isset($update->message)){
$message = $update->message;
$message_id = $update->message->message_id;
$chat_id = $message->chat->id;
$text = $message->text;
$user = $message->from->username;
$name = $message->from->first_name;
$from_id = $message->from->id;
$tc = $message->chat->type;
}
if(isset($update->callback_query)){
$data = $update->callback_query->data;
$chat_id = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$name = $update->callback_query->message->chat->first_name;
$user = $update->callback_query->message->chat->username;
$from_id = $chat_id;
$tc = $update->callback_query->message->chat->type;
}
function getChatstats($chat_id,$token) {
  $url = 'https://api.telegram.org/bot'.$token.'/getChatAdministrators?chat_id='.$chat_id;
  $result = file_get_contents($url);
  $result = json_decode ($result);
  $result = $result->ok;
  return $result;
}

$filejson = json_decode(mys('file',"Get"),true);
$records = json_decode(mys('records',"Get"),true);
$sales = json_decode(mys('sales',"Get"),true);
$move = json_decode(mys('move',"Get"),true);

$admin = $sudo;

$setengss = $move["move"]["setengss"]; #دخول
$cccoin = $move["move"]['ccoin'];  #عموله 
$uu = $move["move"]['hadehday']; #هديه
$Less = $move["move"]['Less']; #اقل حد للرشق
$myy = $move["move"]['myy'] ; #تواصل
$myyy = $move["move"]['chaanl']; #معلومات مساعدة
$mmyyy = $move["move"]['mmyyy']; #قناة اثباتات
$number = $move["bob"]["$chat_id"]["Trans"]; #عدد التحويلات
$setengss1 = $move["bob"]["$chat_id"]["setengss1"]; #عدد مشاركات
$uuu = $move["bob"]["$chat_id"]["hadehday1"]; #عدد الهدايا
$uuuu = $move["bob"]["$chat_id"]["hadehday2"]; #عدد هدايا
$requests = $move["bob"]["$chat_id"]["requests"]; #عدد طلباتك
$my = $sales['tmtlab'] ;
$requests1 = $my +1 ;
if($uuuu == null){
$uuuu = "0";
}
if($setengss1 == null){
$setengss1 = "0";
}
if($requests == null){
$requests = "0";
}
if($uuu == null){
$uuu = "0";
}
if($setengss == null){
$setengss = "10";
}
if($uu == null){
$uu = "15" ;
}
if($cccoin == null){
$cccoin = "30";
}
if($number == null){
$number = "0";
}
if($Less == null){
$Less = "50";
}
if($myy == null){
$myy = "@Silva5bot" ;
}
if($my == null){
$my = "0" ;
}
class Api
{
    public $api_url ='https://kd1s.com/api/v2'; 

    public $api_key = '3bc2adec00fc3bf45c45071e53166095'; 

    public function order($data) { // add order
        $post = array_merge(array('key' => $this->api_key, 'action' => 'add'), $data);
        return json_decode($this->connect($post));
    }

    public function status($order_id) { // get order status
        return json_decode($this->connect(array(
            'key' => $this->api_key,
            'action' => 'status',
            'order' => $order_id
        )));
    }

    public function multiStatus($order_ids) { // get order status
        return json_decode($this->connect(array(
            'key' => $this->api_key,
            'action' => 'status',
            'orders' => implode(",", (array)$order_ids)
        )));
    }

    public function services() { // get services
        return json_decode($this->connect(array(
            'key' => $this->api_key,
            'action' => 'services',
        )));
    }

    public function balance() { // get balance
        return json_decode($this->connect(array(
            'key' => $this->api_key,
            'action' => 'balance',
        )));
    }
    private function connect($post) {
        $_post = Array();
        if (is_array($post)) {
            foreach ($post as $name => $value) {
                $_post[] = $name.'='.urlencode($value);
            }
        }
        $ch = curl_init($this->api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        if (is_array($post)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, join('&', $_post));
        }
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        $result = curl_exec($ch);
        if (curl_errno($ch) != 0 && empty($result)) {
            $result = false;
        }
        curl_close($ch);
        return $result;
    }
}
$SerView = 9022;
$SerTele = 8694;
$SerTele1 = 7848;
$SerTele2= 8414; #ايجابية
$SerTele3=  8415; #سلبية
$Sertek = 6277; # مشاهدات تيكتوك
$Sertek1 = 9189;  #متابعين تيكتوك
$Serins = 9192 ; # لايكات تيكتوك
$Serins1=9149; #متابعين
$Serins2=7883; #ستوري
$Serins3=5228; #لايكات
$Serins4=8875; #مشاهدات ريلز
$ee = explode('#',$data);
$api = new Api();
$ser = $api->services();
$bal = $api->balance();
$acc = $bal->balance ."$";
function Search ($s){
global $ser;
for($i=0;$i<=2979;$i++){
$server = $ser[$i];
if($server->service == $s){
return $server->min .' - '. $server->max;
break;
}else{
continue;
}}}
function NumIndex($s){
global $ser;
for($i=0;$i<=2979;$i++){
$server = $ser[$i];
if($server->service == $s){
return $i;
break;
}else{
continue;
}}}
function Price($s){
global $ser;
return $ser[NumIndex($s)]->rate;
}
class JAMAL{
public $View;
public $Tele;
public 
function NewPrice($Pro,$Num,$Commission){
$NewPro = $this->$Pro+$Commission;
return $Num/1000*$NewPro;
}
}
if($update && $sales[$from_id]['collect'] == null){
$sales[$from_id]['collect'] = 0;
$Waw = json_encode($sales, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("sales", "Set", $Waw);
}
####### الوقت
$date = date('h:i:s'); $d = date('A');
$aa =preg_replace('/AM/', 'ص', $d);$aa =preg_replace('/PM/', 'م', $d);
date_default_timezone_set('Asia/Baghdad');
$times = date('h:i:s');
$year = date('Y');
$month = date('n');
$day = date('j');
$time = time() + (979 * 11 + 1 + 30);
$blod1 = "http://api.telegram.org/bot".$Token."/getChatMembersCount?chat_id=$chat_id";
$blod2 = file_get_contents($blod1);
$blod3 = json_decode($blod2);
$blod4 = $blod3->result;
$title = $message->chat->title;

######

if($data == "stengbott"){
 if($chat_id == $admin){
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"*
- مرحباً عزيزي المطور* **[$name](tg://user?id=$chat_id)** 🔥. 

- حساب التواصل : *$myy*
- عدد النقاط الدخول : *$setengss* 
- عموله التحويل : *$cccoin*
- ادنى حد للرشق : *$Less*
- عدد نقاط الهديه اليوميه :  *$uu*
- رصيدك المتبقي : *$acc*

- `ارسال للكل` +عدد || `خصم للكل` +عدد
- `تصفير النقاط للكل`
*- يمكن للعضو ارسال /id لارسال الايدي الخاص به*
",
'parse_mode'=>"MARKDOWN",
'disable_web_page_preview'=>true,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[['text'=>"معلومات الطلبات 🗃",'callback_data'=>'alltlp']],
[['text'=>'اضف نقاط ➕' ,'callback_data'=>"addmony"],['text'=>'خصم نقاط ➖' ,'callback_data'=>"delmony"]],
[['text'=>'انشاء هدية 🎉','callback_data'=>"offerfree"],['text'=>'تعيين حساب التواصل','callback_data'=>"my"]],
[['text'=>"تعيين كليشة /help",'callback_data'=>'chaanl'],['text'=>"تعيين قناة النشر",'callback_data'=>'mmyyy']],
[['text'=>"تعيين الاختصارات",'callback_data'=>'fud8sw9']],
[['text'=>"« تحديد النقاط »",'callback_data'=>"null"]],
[['text'=>'الهدية اليومية 🎁','callback_data'=>"hadehday"],['text'=>"نقاط الاحالة ♻️",'callback_data'=>"setengss"]],
[['text'=>"عمولة التحويل 🔂 ",'callback_data'=>"ccoin"],['text'=>"الحد الادنى ⬇",'callback_data'=>"Less"]],
[['text'=>'رجوع 🔙','callback_data'=>'cancel']],
]])
]);
}
}



$dayurl = explode("\n",file_get_contents($d."url.txt"));
if($update->callback_query){
$data = $update->callback_query->data;
$chat_id = $update->callback_query->message->chat->id;
$title = $update->callback_query->message->chat->title;
$message_id = $update->callback_query->message->message_id;
$name = $update->callback_query->message->chat->first_name;
$user = $update->callback_query->message->chat->username;
$from_id = $update->callback_query->from->id;
}




$cut = explode("\n",file_get_contents("members.txt"));
$ff = str_replace("ارسال للكل ","",$text);
if($text == "ارسال للكل $ff"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"✅ تم ارسال $ff نقطة إلى جميع المستخدمين ✨",
]);
for ($i=0; $i < count($cut); $i++) { 
$sales[$cut[$i]]['collect'] += $ff;
$Waw = json_encode($sales, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("sales", "Set", $Waw);
}
}
$cut = explode("\n",file_get_contents("members.txt"));
$pp = str_replace("خصم للكل ","",$text);
if($text == "خصم للكل $pp"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🪄 تم خصم $pp نقطة من جميع المستخدمين",
]);
for ($i=0; $i < count($cut); $i++) { 
$sales[$cut[$i]]['collect'] -= $pp;
$Waw = json_encode($sales, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("sales", "Set", $Waw);
}
}

if($text == "تصفير النقاط للكل"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"تم تصفير نقاط جميع المستخدمين ✅",
]);
for ($i=0; $i < count($cut); $i++) { 
$sales[$cut[$i]]['collect'] = 0;
$Waw = json_encode($sales, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("sales", "Set", $Waw);
}
}



##########
if($data == 'Less'){
 if(in_array($chat_id,$stingggi['stingggi']['admins']) or $chat_id == $admin){
  bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"اهلا بك عزيزي
✏
- قم بإرسال عدد النقاط التي ستكون هي الحد الادنى لعدد الرشق
 ",
      'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'إلغاء الأمر ❌','callback_data'=>'stengbott']]
      ]
    ])
  ]);
$move["move"]['data'] = ff;
$Waw = json_encode($move, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("move", "Set", $Waw);
 }
}
if($text and $move["move"]['data'] =="ff"){
 if(in_array($chat_id,$stingggi['stingggi']['admins']) or $chat_id == $admin){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"✅ تمت ضبط : $Less نقطة كـ حد ادنى لعمليات الرشق",
      'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'رجوع 🔙','callback_data'=>'stengbott']]
      ]
    ])
  ]);
$move["move"]['data'] = null;
$move["move"]['Less'] = "$text";
$Waw = json_encode($move, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("move", "Set", $Waw);
 }}

##########


if($data == 'mmyyy'){
 if(in_array($chat_id,$stingggi['stingggi']['admins']) or $chat_id == $admin){
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"*قم بارسال معرف القناة فقط*",
"message_id"=>$message_id,
'parse_mode'=>"MARKDOWN",
      'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'إلغاء الأمر ❌','callback_data'=>'stengbott']]
      ]
    ])
]);
$move["move"]['data'] = rr;
$Waw = json_encode($move, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("move", "Set", $Waw);
}}
if($text  and $text !="/start" and $move["move"]['data'] == "rr"  and !$message->forward_from_chat ){
if(in_array($chat_id,$stingggi['stingggi']['admins']) or $chat_id == $admin){
$ch_id = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$text"))->result->id;
$idchan=$ch_id;
 $checkadmin = getChatstats($text,$token);
$namechannel = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$text"))->result->title;

bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"
✅ تم إضافة القناة بنجاح عزيزي الادمن 
info channel 
user : $text 
name : $namechannel
id : $ch_id
 ",
]);
$move["move"]['data'] = null;
$move["move"]['mmyyy'] = "$text";
$Waw = json_encode($move, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("move", "Set", $Waw);
}
}





############
if($data == 'chaanl'){
 if(in_array($chat_id,$stingggi['stingggi']['admins']) or $chat_id == $admin){
  bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"*• ارسل المعلومات المطلوبة*",
'parse_mode'=>"MARKDOWN",
      'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'إلغاء الأمر ❌','callback_data'=>'stengbott']]
      ]
    ])
  ]);
$move["move"]['data'] = ee;
$Waw = json_encode($move, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("move", "Set", $Waw);
 }
}


if($text  and $text !="/start" and $move["move"]['data'] == "ee" ){
if(in_array($chat_id,$stingggi['stingggi']['admins']) or $chat_id == $admin){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"
✅ تم إضافة المعومات بنجاح
 ",'parse_mode'=>"MARKDOWN",
]);
$move["move"]['data'] = null;
$move["move"]['chaanl'] = "$text";
$Waw = json_encode($move, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("move", "Set", $Waw);
}
}


########
if($data == 'myy'){
 if(in_array($chat_id,$stingggi['stingggi']['admins']) or $chat_id == $admin){
  bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"*• ارسال معرف حسابك او بوت تواصل الخاص بك 📬 *",
'parse_mode'=>"MARKDOWN",
      'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'إلغاء الأمر ❌','callback_data'=>'stengbott']]
      ]
    ])
  ]);
$move["move"]['data'] = hh;
$Waw = json_encode($move, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("move", "Set", $Waw);
 }
}
if($text and $move["move"]['data'] == "hh"){
 if(in_array($chat_id,$stingggi['stingggi']['admins']) or $chat_id == $admin){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"*• تم الحفظ ✅.*",
'parse_mode'=>"MARKDOWN",
      'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'رجوع 🔙','callback_data'=>'stengbott']]
      ]
    ])
  ]);
$move["move"]['data'] = null;
$move["move"]['myy'] = "$text";
$Waw = json_encode($move, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("move", "Set", $Waw);
 }
}




###########
if($data == 'ccoin'){
 if(in_array($chat_id,$stingggi['stingggi']['admins']) or $chat_id == $admin){
  bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"اهلا عزيزي الان ارسل عدد نقاط تحويل ",
      'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'إلغاء الأمر ❌','callback_data'=>'stengbott']]
      ]
    ])
  ]);
$move["move"]['data'] = dd;
$Waw = json_encode($move, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("move", "Set", $Waw);
 }
}
if($text and $move["move"]['data'] == "dd"){
 if(in_array($chat_id,$stingggi['stingggi']['admins']) or $chat_id == $admin){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"تم تعين عدد نقاط تحويل ✅",
      'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'رجوع 🔙','callback_data'=>'stengbott']]
      ]
    ])
  ]);
$move["move"]['data'] = null;
$move["move"]['ccoin'] = "$text";
$Waw = json_encode($move, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("move", "Set", $Waw);
 }
}


##########
if($data == 'setengss'){
if(in_array($chat_id,$stingggi['stingggi']['admins']) or $chat_id == $admin){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ارسل الان عدد نقاط الدخول (ارقام فقط)",
      'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'إلغاء الأمر ❌','callback_data'=>'stengbott']]
      ]])
  ]);
$move["move"]['data'] = aa;
$Waw = json_encode($move, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("move", "Set", $Waw);
 }}
if($text and $move["move"]['data'] == "aa"){
 if(in_array($chat_id,$stingggi['stingggi']['admins']) or $chat_id == $admin){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"تم تعين عدد نقاط الدخول ",
      'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'رجوع 🔙','callback_data'=>'stengbott']]
      ]])
  ]);
$move["move"]['data'] = null;
$move["move"]['setengss'] = "$text";
$Waw = json_encode($move, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("move", "Set", $Waw);
 }}


if($data == "offerfree"){
           bot('EditMessageText',[
        'chat_id'=>$chat_id,
        'message_id'=>$message_id,
    'text'=>"
ارسل عدد النقاط لأصنع رابط هدية صالح لشخص واحد 😌🎁
      ",'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>'إلغاء ❌','callback_data'=>"stengbott"]],
    ]])
     ]);
     $move["move"]['data'] = bb;
$Waw = json_encode($move, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("move", "Set", $Waw);
           }
           if(is_numeric($text) and $move["move"]['data'] == "bb"){
            $cod = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz12345689807'),1,10);
            bot('sendmessage',[
      'chat_id'=>$chat_id,
      "text"=>"
*تم صنع رابط هدية 🤩 بقيمة $text *

الرابط : 
https://t.me/$bott?start=gift=$cod
     
 ",
     'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id, 
      'reply_markup'=>json_encode([
    'inline_keyboard'=>[
     [['text'=>'رجوع 🔙','callback_data'=>"stengbott"]],
     ]])
     ]);
     file_put_contents($cod.".txt",$cod."\n".$text);
     file_put_contents($d.'.txt',$cod."\n",FILE_APPEND);
 $move["move"]['data'] = null;
$Waw = json_encode($move, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("move", "Set", $Waw);
    }


if($data == 'hadehday'){
if($chat_id == $admin){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ارسل الان عدد نقاط الهديه اليوميه (ارقام فقط)",
      'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'إلغاء الأمر ❌','callback_data'=>'stengbott']]
      ]])
  ]);
$move["move"]['data'] = cc;
$Waw = json_encode($move, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("move", "Set", $Waw);
}}

if($text and $move["move"]['data'] == 'cc'){
 if($chat_id == $admin){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"تم تعين عدد نقاط الهديه اليوميه 🔗👑 ",
'reply_to_message_id'=>$message->message_id, 
      'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'رجوع 🔙','callback_data'=>'stengbott']]
      ]])
  ]);
$move["move"]['data'] = null;
$move["move"]['hadehday'] = "$text";
$Waw = json_encode($move, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("move", "Set", $Waw);
exit();
}}

if($data == "addmony"){
bot('Editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ارسل الان ايدي المستخدم الان
",
]);
$sales['oknk'] = 'ok';
$Waw = json_encode($sales, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("sales", "Set", $Waw);
}
if($text and $sales['oknk'] == 'ok' and $chat_id == $admin){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"تم حفظ ايدي المستخدم ارسل النقاط
",
]);
$sales['idd'] = $text;
$sales['oknkk'] = 'ok';
unset($sales['oknk']);
$Waw = json_encode($sales, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("sales", "Set", $Waw);
exit();
}
if($text and $sales['oknkk'] == 'ok' and $chat_id == $admin){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>" تم ارسال النقاط الى الشخص",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'رجوع الى القائمه الرئيسه 🔙','callback_data'=>'stengbott']],
]])
]);
bot('sendmessage',[
'chat_id'=>$sales['idd'],
'text'=>"تم اضافة نقاط الى حسابك بواسطة المطور ".$text." نقطة",
]);
$sales[$sales['idd']]['collect'] += $text;
$sales[$sales['idd']]['almratt'] += 1;
unset($sales['idd']);
unset($sales['oknkk']);
$Waw = json_encode($sales, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("sales", "Set", $Waw);
}
if($data == "delmony"){
bot('Editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ارسل الان ايدي المستخدم الان
",
]);
$sales['nonk'] = 'ok';
$Waw = json_encode($sales, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("sales", "Set", $Waw);
}
if($text and $sales['nonk'] == 'ok' and $chat_id == $admin){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"تم حفظ ايدي المستخدم ارسل النقاط ليتم خصمها
",
]);
$sales['idd'] = $text;
$sales['nonkk'] = 'ok';
unset($sales['nonk']);
$Waw = json_encode($sales, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("sales", "Set", $Waw);
exit();
}
if($text and $sales['nonkk'] == 'ok' and $chat_id == $admin){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>" تم خصم النقاط من المستخدم
",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'رجوع الى القائمه الرئيسه 🔙','callback_data'=>'stengbott']],
]])
]);
bot('sendmessage',[
'chat_id'=>$sales['idd'],
'text'=>"تم خصم من نقاطك بواسطة المطور ".$text." نقطة",
]);
$sales[$sales['idd']]['collect'] -= $text;
unset($sales['idd']);
unset($sales['nonkk']);
$Waw = json_encode($sales, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("sales", "Set", $Waw);
}

if($data == "alltlp"){
 $reply_markup = [];
   $reply_markup['inline_keyboard'][] = [['text'=>'حالة الطلب','callback_data'=>'adddcd'],['text'=>'العدد المتبقي','callback_data'=>'adddcd'],['text'=>'رابط الطلب','callback_data'=>'adddcd']];
foreach($records['tlp'] as $rkm => $mll){
  $orstatus = $api->status ($mll['ord']);
$st = str_ireplace(['Canceled','Processing','Completed','Pending','Partial','In Processing','In progress'],['ملغي','المعالجة','مكتمل','قيد الانتظار','مكتمل جزيئاً','جاري المعالجة','التنفيذ'],$orstatus->status);
$k = $orstatus->remains;
   $reply_markup['inline_keyboard'][] = [['text'=>"$st",'callback_data'=>'adddcd'],['text'=>"$k",'callback_data'=>'adddcd'],['text'=>'الرابط 🖇','url'=>$mll['link']]];
   }
$reply_markup['inline_keyboard'][] = [['text'=>'رجوع','callback_data'=>'stengbott']];
$json = json_encode($reply_markup);
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'• اليك قائمة الطلبات مع المعلومات',
    'disable_web_page_preview'=>true,
    'reply_markup'=>($json)
  ]);
  exit;
 }

 
if($data=="kk"){
$timeuoto=time()+(3600 * 1);
$day = date('Y-m-d',$timeuoto);
$datatime = json_decode(file_get_contents("time.json"),true);
$arrayday=$datatime["info"][$day]["member"];
if(!in_array($from_id,$arrayday)){
$datatime["info"][$day]["member"][]=$from_id;
file_put_contents("time.json", json_encode($datatime));
$sales[$chat_id]['collect'] += $uu ;
$Waw = json_encode($sales, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("sales", "Set", $Waw);
$hh = $sales[$chat_id]['collect']; 
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
"text"=>" مرحبا [$name](tg://user?id=$chat_id)

🎁 حصلت على هديه يومية ( $uu ) نقاط.
💰 نقاطك : $hh
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'العودة  ' ,'callback_data'=>"back1"]],
]])
]);
$move["bob"]["$chat_id"]["hadehday1"] +=1;
$Waw = json_encode($move, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("move", "Set", $Waw);
}else{
bot('answerCallbackQuery',[
            'callback_query_id'=>$update->callback_query->id,
            'text'=>"🚫 لايمكنك الحصول على الهدية اليومية مرتين في اليوم حاول الحصول عليها بعد منتصف الليل  ",
            'show_alert'=>true
            ]);
}}

if($data == "fud8sw9"){
$getMyCommands = bot('getMyCommands');
foreach($getMyCommands->result as $Commands){
$MyCommands .= "*".$Commands->command." - ".$Commands->description."*\n";
}
foreach( $getMyCommands->result as $Cands){
$reply_markup[] = [['text'=>$Cands->command,'callback_data'=>"6u"]];
}
$reply_markup[] = [['text'=>"مسح جميع الاختصارات",'callback_data'=>"giefe88"],['text'=>"اضافة اختصار ",'callback_data'=>"dhssuquq"]];
$reply_markup[] = [['text'=>"رجوع",'callback_data'=>"stengbott"]];
$reply_markup = json_encode(['inline_keyboard'=>$reply_markup,]);
    bot('editMessageText',[
        'chat_id'=>$chat_id,
        'message_id'=>$message_id,
        'text'=>"*
• مرحبا بك في قسم الاختصارات ✨
*
- يمكنك وضع اوامر مختصره في البوت من خلال هاذا القسم

",'reply_to_message_id'=>$message->message_id,
        'parse_mode'=>"MarkDown",
         'reply_markup'=>$reply_markup,
         ]);
}
if($data == "dhssuquq"and $from_id == $admin ){
    bot('editMessageText',[
        'chat_id'=>$chat_id,
        'message_id'=>$message_id,
        'text'=>"*• ارسل الاختصار الان بالشكل التالي : *
start - رساله البدء
",'reply_to_message_id'=>$message->message_id,
        'parse_mode'=>"MarkDown",
                'reply_markup'=>json_encode([
            'inline_keyboard'=>[
            [['text'=>"رجوع",'callback_data'=>"stengbott"]],
            ]
            ])
        ]);
$move["move"]['data'] = ww;
$Waw = json_encode($move, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("move", "Set", $Waw);
}
if($text and $move["move"]['data'] == "ww" and $from_id == $admin ){
$ex = explode("\n",$text);
foreach($ex as $ex1){
$ex2 = explode(" - ",$ex1);
$Commands[] = ['command'=>$ex2[0],'description'=>$ex2[1]];
bot('setMyCommands',[
'commands'=>json_encode($Commands)
]);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"• تم الحفظ !",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
]);
$move["move"]['data'] = null;
$Waw = json_encode($move, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("move", "Set", $Waw);
}}
if($data == "giefe88" and $from_id == $admin ){
bot('editMessageText',[
        'chat_id'=>$chat_id,
        'message_id'=>$message_id,
        'text'=>"*
تم مسح جميع الاختصارات
",
'reply_to_message_id'=>$message->message_id,
        'parse_mode'=>"MarkDown",
                'reply_markup'=>json_encode([
            'inline_keyboard'=>[
            [['text'=>"رجوع",'callback_data'=>"stengbott"]],
            ]
            ])
        ]);bot('setmyCommands');
}

if(preg_match("/^\/(start)(.*)/s",$text)){
$ex1 = explode(' ',$text);
 $ex = explode('=',$ex1[1]);
if($ex[0] == "gift"){
$cood = explode("\n",file_get_contents($ex[1].".txt"));
$coin = $cood[1];
 if(in_array($ex[1],$day)){
 if(is_file($ex[1].'.txt')){
  bot('sendmessage',[
   'chat_id'=>$admin,
   'text'=>"
تم اضافة $coin نقاط الى حساب
• الاسم : [$name](tg://user?id=$chat_id)
• الايدي : [$from_id](tg://user?id=$chat_id)
•المعرف : [@$user](tg://user?id=$chat_id)
      
   ",'parse_mode'=>"MarkDown"]);
    bot('sendmessage',[
   'chat_id'=>$chat_id,
   'text'=>"
   • تم اضافة *$coin* نقاط الى حسابك ✅
• بواسطه رابط الهدية من قبل مدير البوت 
   

",'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
]);
$move["bob"]["$chat_id"]["hadehday2"] +=1;
$Waw = json_encode($move, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("move", "Set", $Waw);
unlink($ex[1].'.txt');
$sales[$from_id]['collect'] += $coin;
$Waw = json_encode($sales, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("sales", "Set", $Waw);
sleep(1);
  }else{
   bot('sendmessage',[
   'chat_id'=>$chat_id,
   'text'=>"
عذرا 😢 تم أخذ الهدية من شخص قبلك 
   ",'reply_to_message_id'=>$message_id,
   ]);
   }
  }else{
   bot('sendmessage',[
   'chat_id'=>$chat_id,
   'text'=>"
عذرا الرابط خاطء 😓
   ",'reply_to_message_id'=>$message_id,
   ]);
   }}}
 if($text && !in_array($from_id,$v)  && !in_array($from_id,$fake) && $stingggg['thkk'] == 'on'){
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"حسناً عزيزي قم بإرسال رقمك للتحقق من انك لست روبوت 💯",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"ارسل جهه اتصالي 📞",'request_contact' => true]],
],
'resize_keyboard' =>true,
]),
'reply_to_message_id'=>$message_id,
]);
return false;}
 if(preg_match("/\/(start)/",$text )){
 	if($sales[$chat_id]['baageel']){
    $sales[$sales[$chat_id]['baageel']]['collect'] += "$setengss";
    $Waw = json_encode($sales, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("sales", "Set", $Waw);
    $ssd = $sales[$chat_id]['baageel'];
    bot('sendmessage',[
    'chat_id'=>$sales[$chat_id]['baageel'],
    'text'=>"
- لقد دخل شخص لرابط الدعوة الخاص بك 👤 
ولقد ربحت $setengss نقطة
معلومات عنه 🧐:
ايديه 🆔 : [$from_id](tg://user?id=$from_id)
معرفه ان وجد ‌Ⓜ️⁩ : [@$user](tg://user?id=$from_id)
اسمه ✨ : [$name](tg://user?id=$from_id)
💰 ¦ عدد نقاطك الان : ".$sales[$sales[$chat_id]['baageel']]['collect'],
 'parse_mode'=>"MarkDown",
    ]);
$move["bob"]["$ssd"]["setengss1"] +=1;
$Waw = json_encode($move, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("move", "Set", $Waw);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"*
لقد دخلت على رابط صديقك وحصل على $setengss نقطة 🌚*
",'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message->message_id, 
 ]);

$sales[$chat_id]['baageel']=0;
$Waw = json_encode($sales, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("sales", "Set", $Waw);
    }

bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"اهلا بك [$name](tg://user?id=$chat_id) 🥀

 - في بوت الرشق الأول في التليجرام 🥇

- يتيح لك البوت القيام بخدمات الرشق ل : انستكرام، تليكرام، تيكتوك، فيسبوك، يوتيوب، تويتر،  🔊🔊

*- للمساعدة اضغط /help*
*- تنفيذ تلقائي، بأرخص الأسعار ✅*

⌯ نقاطك : *".$sales[$chat_id]['collect']."* 💎
⌯ ايديك : *$chat_id* 🆔                      
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message->message_id, 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"♪ لبدء عملية رشق جديدة 🎖️",'callback_data'=>"made7"]],
[['text'=>"تجميع النقاط 💎",'callback_data'=>"murtada"],['text'=>"شراء نقاط 💵",'callback_data'=>"buycoins"]],
[['text'=>"تحويل نقاط 🔁",'callback_data'=>"refccoin"],['text'=>"معلوماتك 🌐",'callback_data'=>"inform"]],
[['text'=>"معلومات طلب 🎰",'callback_data'=>"order"],['text'=>"الطلبات المكتمله « ".$my." » ✅",'callback_data'=>'tmtlab']],
[['text'=>"معلومات البوت",'callback_data'=>"mahdi"]],
]])
]);

mys("file", "Set", $Waw);
unset ($filejson[$from_id]);
unset($filejson[$from_id]['amr']);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}


if($data == "back1"){
bot('Editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"اهلا بك [$name](tg://user?id=$chat_id) 🥀

 - في بوت الرشق الأول في التليجرام 🥇

- يتيح لك البوت القيام بخدمات الرشق ل : انستكرام، تليكرام، تيكتوك، فيسبوك، يوتيوب، تويتر،  🔊🔊

*- للمساعدة اضغط /help*
*- تنفيذ تلقائي، بأرخص الأسعار ✅*

⌯ نقاطك : *".$sales[$chat_id]['collect']."* 💎
⌯ ايديك : *$chat_id* 🆔                   
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message->message_id, 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"♪ لبدء عملية رشق جديدة 🎖️",'callback_data'=>"made7"]],
[['text'=>"تجميع النقاط 💎",'callback_data'=>"murtada"],['text'=>"شراء نقاط 💵",'callback_data'=>"buycoins"]],
[['text'=>"تحويل نقاط 🔁",'callback_data'=>"refccoin"],['text'=>"معلوماتك 🌐",'callback_data'=>"inform"]],
[['text'=>"معلومات طلب 🎰",'callback_data'=>"order"],['text'=>"الطلبات المكتمله « ".$my." » ✅",'callback_data'=>'tmtlab']],
[['text'=>"معلومات البوت",'callback_data'=>"mahdi"]],
]])
]);
unset ($filejson[$from_id]);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}
if($data == "made7"){
bot('Editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"*🙋‍♂️︙يمكنك زيادة متابعينك وإعجباتك من هنا 👍🔰.

♻️🎬︙إختر البرنامج الذي تريد الرشق إليه. 👇*
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message->message_id, 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"♪ قسم رشق تليجرام Telegram 🎞️",'callback_data'=>"made"]],
[['text'=>"♪ قسم رشق انستكرام Instageam 📸",'callback_data'=>"made1"]],
[['text'=>"♪ قسم رشق تيكتوك TikTok 🔮",'callback_data'=>"made2"]],
[['text'=>"رجوع 🔙","callback_data"=>"back1"]],
]])
]);
unset ($filejson[$from_id]);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}






if($data == "made"){
bot('Editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"*✅︙خدمات  لـ تيليجرام Telegram.
🛒︙يرجى إختيار إحدى الخدمات من الأسفل..*
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message->message_id, 
'reply_markup'=>json_encode([
'inline_keyboard'=>[

[['text'=>"🔳 نوع الخدمة ----------> سعر ال 1k 💵",'callback_data'=>"null"]],
[['text'=>"رشق مشاهدات تليكرام 👁️ ⋙ 200 نقطة",'callback_data'=>"viewnaw"]],
[['text'=>" ردود فعل سلبية + مشاهدات 👎😱 ⋙ 250 نقطة",'callback_data'=>"Tele3"]],
[['text'=>" ردود فعل ايجابية + مشاهدات 👍🎉  ⋙ 250 نقطة",'callback_data'=>"Tele2"]],
[['text'=>"رشق اعضاء تليكرام ثابت 👥 ⋙ 2000 نقطة",'callback_data'=>"Tele"]],
[['text'=>"رشق اعضاء تلكرام سريع 👥⋙ 1000 نقطة",'callback_data'=>"Tele1"]],
[['text'=>"رجوع 🔙","callback_data"=>"made7"]],
]])
]);
unset ($filejson[$from_id]);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}
if($data == "made1"){
bot('Editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"*✅︙خدمات  لـ انستا intsagram.
🛒︙يرجى إختيار إحدى الخدمات من الأسفل.*
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message->message_id, 
'reply_markup'=>json_encode([
'inline_keyboard'=>[

[['text'=>"🔳 نوع الخدمة ----------> سعر ال 1k 💵",'callback_data'=>"null"]],
[['text'=>"رشق متابعين انستكرام ثابت👥 ⋙ 800 نقطة",'callback_data'=>"ins1"]],
[['text'=>"رشق لايكات انستكرام صاروخ💝 ⋙ 200 نقطة",'callback_data'=>"ins3"]],
[['text'=>"رشق مشاهدات ريلز انستكرام 👀 ⋙ 100 نقطة",'callback_data'=>"ins4"]],
[['text'=>"رشق مشاهدات ستوري انستكرام 👁️‍🗨️ ⋙ 200 نقطة",'callback_data'=>"ins2"]],
[['text'=>"رجوع 🔙","callback_data"=>"made7"]],
]])
]);
unset ($filejson[$from_id]);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}

if($data == "made2"){
bot('Editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"*✅︙خدمات لـ تيكتوك TikTok.
🛒︙يرجى إختيار إحدى الخدمات من الأسفل.*
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message->message_id, 
'reply_markup'=>json_encode([
'inline_keyboard'=>[

[['text'=>"🔳 نوع الخدمة ----------> سعر ال 1k 💵",'callback_data'=>"null"]],
[['text'=>" مشاهدات تيكتوك صاروخ 👁️‍🗨️ ⋙ 200 نقطة",'callback_data'=>"tek"]],
[['text'=>"لايكات تيكتوك ثابت 👍🏻 ⋙ 1000 نقطة",'callback_data'=>"ins"]],
[['text'=>" رشق متابعين | رخيص | جديد ♻️ ⋙ 1000 نقطة",'callback_data'=>"tek1"]],
[['text'=>"رجوع 🔙","callback_data"=>"made7"]],
]])
]);
unset($filejson[$from_id]);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}





 if($data == "refccoin"){
  bot('EditMessageText',[
        'chat_id'=>$chat_id,
        'message_id'=>$message_id,
        'text'=>"*• يمكنك تحويل عدد من النقاط الى شخص اخر من هنا* 🚀

- فقط ارسل الان ايدي الشخص الذي تريد ارسال نقاط له وعدد النقاط بسطر ثاني ✅ 
- مثال 👈🏻                   
635472688
50

- عموله التحويل : *$cccoin*
",'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"عدد نقاطك : ".$sales[$chat_id]['collect']." 💸",'callback_data'=>'nis']],
    [['text'=>"رجوع 🔙","callback_data"=>"back1"]],
    ]])
    ]);
  }
 $addcoin = explode("\n",$text);
  $getchat = bot('getchat',['chat_id'=>$addcoin[0]])->ok;
  if($addcoin[0] and $addcoin[1]){
   $b = str_replace('-','',$addcoin[1]);
if(!preg_match("/(-)/", $addcoin[1]) and is_numeric($addcoin[1])){
   if($getchat == "true"){
    $ccoin = $addcoin[1] + $cccoin;
    if($sales[$chat_id]['collect'] >= $ccoin){
     $sales[$chat_id]['collect'] -= $ccoin;
     $sales[$addcoin[0]]['collect'] += $addcoin[1];
     $Waw = json_encode($sales, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("sales", "Set", $Waw);
$bf = $addcoin[0];
     bot('sendmessage',[
 'chat_id'=>$chat_id, 
 'text' =>"• تم تحويل ".$addcoin[1]." نقطة ل [$bf](tg://openmessage?user_id=$bf) ✅
 
عدد نقاطك : *".$sales[$chat_id]['collect']."* 💸
 ",'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"رجوع 🔙","callback_data"=>"back1"]],
    ]])
]);
 bot('sendmessage',[
 'chat_id'=>$addcoin[0], 
 'text' =>"• تم تحويل اليك ".$addcoin[1]." نقطة 
• المرسل [$from_id](tg://openmessage?user_id=$from_id)

*• اصبحت نقاطك : ".$sales[$addcoin[0]]['collect']."*
",'parse_mode'=>"MarkDown"
]);
$move["bob"]["$chat_id"]["Trans"] +=1;
$Waw = json_encode($move, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("move", "Set", $Waw);
$number = $move["bob"]["$chat_id"]["Trans"] ;
bot('sendmessage',[
 'chat_id'=>$admin, 
 'text' =>"• تم تحويل ✅ : *".$addcoin[1]."* نقاط 

- من المستخدم : [$from_id](tg://openmessage?user_id=$from_id) | عدد نقاطه : *".$sales[$chat_id]['collect']."* 
- الى المستخدم : [$bf](tg://openmessage?user_id=$bf) | عدد نقاطه : *".$sales[$addcoin[0]]['collect']."*

• عدد عمليات التحويل التي قام بها : *$number*
 ",'parse_mode'=>"MarkDown",
]);
$move["$chat_id"]["data"] = null;
$Waw = json_encode($move, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("move", "Set", $Waw);
     }else{
      bot('sendmessage',[
 'chat_id'=>$chat_id, 
 'text' =>"*نقاطك غير كافية لعملية التحويل ⚠️*
 ",'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"رجوع 🔙","callback_data"=>"back1"]],
    ]]),'reply_to_message_id'=>$message_id,
]);
      }
    }else{
     bot('sendmessage',[
 'chat_id'=>$chat_id, 
 'text' =>"🚫 *هذا الشخص قد قام بحظر البوت او انه ليس مشترك في البوت ونحن لا نستطيع ارسال له النقاط*
 ",'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"رجوع 🔙","callback_data"=>"back1"]],
    ]]),'reply_to_message_id'=>$message_id,
]);
   }}}
 
##########
$timeuoto=time()+(3600 * 1);
$day = date('Y-m-d',$timeuoto);       
$datatimee = json_decode(file_get_contents("timee.json"),true);
$arrayday1=$datatimee["info1"][$day]["member"];
if($data=="kkk"){
if(!in_array($from_id,$arrayday1)){
	bot('Editmessagetext', [
   'chat_id' => $chat_id,
   'message_id'=>$message_id,
    'text'=>" 
يمكنك محاولة مرة واحدة كل يوم فقط 
وضع بعض النقاط وتحقيق ربح أو خسارة انت و حضک 🎡 

1️⃣* اذا تنطيني 10 نقاط *👈🏻 سأعطيك ( 5 - 15) نقطة.
2️⃣* اذا تنطيني 50 نقطة* 👈🏻 سأعطيك ( 40 - 65 ) نقطة. 
3️⃣ *اذا تنطيني 100 نقاط* 👈🏻 سأعطيك ( 75 - 120) نقطة. 

الان 🎰 ، جرب حضک بل وفوز ⁉️
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'10 نقطة' ,'callback_data'=>"10"],['text'=>'50 نقطة' ,'callback_data'=>"50"]],
[['text'=>'100 نقطة' ,'callback_data'=>"100"]],
[['text'=>'العودة  ' ,'callback_data'=>"back1"]],
]])
]);
}else{
bot('answerCallbackQuery',[
            'callback_query_id'=>$update->callback_query->id,
            'text'=>"لايمكنك استخدام عجلة الحظ مرتين في اليوم حاول الحصول عليها غدا 😍",
            'show_alert'=>true
            ]);
}
}

if($data == 10 || $data == 50 || $data == 100){
	$timeuoto=time()+(3600 * 1);
$day = date('Y-m-d',$timeuoto);       
$datatimee["info1"][$day]["member"][]=$from_id;
file_put_contents("timee.json",json_encode($datatimee,64|128|256));
          if($sales[$chat_id]['collect'] >= $data){
          if($data == 10){
  $r = rand(5,15);
          }
if($data == 100){
  $r = rand(75,120);
          }
if($data == 50){
  $r = rand(40,65);
          }
 
$xu = $r-$data;
$sales[$chat_id]['collect'] += $xu;
$Waw = json_encode($sales, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("sales", "Set", $Waw);
	bot('Editmessagetext',[
	'chat_id'=>$chat_id,
      'message_id'=>$message_id,
	'text'=>"*تهانینا لقد فزت بـ $r نقطة*",'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'العودة  ' ,'callback_data'=>"back1"]],
]])
    ]);
    }else {
    bot('Editmessagetext',[
	'chat_id'=>$chat_id,
	'text'=>"*عذرا لیس لدیک نقاط*",'parse_mode'=>'MarkDown',
    ]);
   }
   } 
   
   
########$###

if($data == 'tmtlab'){
bot('answercallbackquery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>"
عدد الطلبات التي تم انجازة(اكتمالها) : $my
",
'show_alert'=>true
]);
}

if($text == '/id'){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
*ايديك عزيزي هو* :`$chat_id`
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == '/help'){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
$myyy
",
'parse_mode'=>"MarkDown",'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id, 
]);
}


if($data == 'murtada'){
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"*
    مرحبا بك في قسم تجميع النقاط 📥 .
    
• يمكنك الحصول على نقاط بطريقتين :*

1- تجميع نقاط عن طريق مشاركة رابط الدعوه مع اصدقائك للحصول على $setengss نقطة لكل مشاركة

2- تجميع نقاط عن طريق اضافة ارقام للحصول على 250 نقطة لكل رقم


*~ اذ كانت طريقه التجميع صعبه راسل المطور لشراء النقاط 💰 .

~ المطـور :* $myy 

",'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message->message_id, 
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
 [['text'=>"دعوة اصدقاء 👥",'callback_data'=>"coins"],['text'=>"الهدية اليومية 🎁",'callback_data'=>"kk"]],
 [['text'=>"تسليم حساب 📞",'callback_data'=>"murtada1"],['text'=>"شراء نقاط 💵",'callback_data'=>"buycoins"]],
 [['text'=>"عجلة الحظ 🎡",'callback_data'=>"kkk"]],
[['text'=>"رجوع 🔙",'callback_data'=>"back1"]],
    ] 
   ])
  ]);
 }
 
 
 
if($data == 'inform'){
$array = [];
foreach($move["bob"] as $key => $value){
$array[$key] = $value['setengss1'];
}
$txt = null;
for($i=1;$i<=5;$i++){
if(!empty($array)){
$arrayValues = array_values($array);
$maxKey = array_search(max($arrayValues),$arrayValues);
$member = array_keys($array)[$maxKey];
$count = $arrayValues[$maxKey];
if($count == null){
$count = "0" ;
}
$txt .="{$i}» [{$member}](tg://openmessage?user_id={$member}) -> (*{$count}*) \n";
unset($array[$member]);
}
}




  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"
*• مرحبا بك في معلومات حسابك في بوت الرشق 🌀*


- عدد نقاط حسابك :*".$sales[$chat_id]['collect']."* 💎

- عدد عمليات التحويل التي قمت بها : *$number*
- عدد الهدايا اليومية التي جمعتها : *$uuu*
- عدد الهدايا التي حصلت عليها :*$uuuu*
- عدد الطلبات التي قمت بطلبها : *$requests*
- عدد طلبات البوت المكتمله : *".$my."*
- عدد مشاركاتك لرابط الدعوة : *$setengss1*

*- المستخدمين الاكثر مشاركة لرابط الدعوى : *
$txt

",'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message->message_id, 
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"رجوع 🔙",'callback_data'=>"back1"]],
    ] 
   ])
  ]);
 }



if($data == 'murtada1'){
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"
*مرحـبا بـك 
 يمكنك تسلــيم رقــم يدوي مــن خــلال التواصل مع بــوت الدعــم  وسيـتم تحـديد السعر بيــن 200 الى 400 نقطة حسب نوع الـدوله و الـمنصه*
",'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message->message_id, 
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"المطور",'url'=>"https://t.me/Silva5bot"]],
[['text'=>"رجوع 🔙",'callback_data'=>"murtada"]],
    ] 
   ])
  ]);
 }

if($data == 'mahdi'){
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"
*⌯ اصدار البوت V1.5⌯*

- تاريخ انشاء البوت : *2022/6/29*
- تاريخ اخر تحديث : *2022/6/31*
- - - - - - - - - - - - -
⌯ لشراء او تنصيب نسخة مماثله باسعار مناسبة ارجو التواصل مع المطور

*⌯ مطور البوت* « $myy
",'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message->message_id, 
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
 [['text'=>"قناة البوت ✔️",'url'=>"https://t.me/silvana552"],['text'=>"قناة الاثباتات ✔️",'url'=>"https://t.me/silvana552"]],
 [['text'=>"المطور",'url'=>"https://t.me/Silva5bot"]],
[['text'=>"رجوع 🔙",'callback_data'=>"back1"]],
    ] 
   ])
  ]);
 }



if($data == 'hjkl'){
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"*🌐︙إدارة بوت الرشق

📧︙ للتواصل الان مع المطور، اي رسالة ترسلها سيتم ايصالها الى الإدارة فورا.
📨︙أي مشكلة واجهتك في البوت فقط قم بإرسالها للمطور الدعم، ولا تنسى ارفاقها مع حسابك الخاص .
⏰︙متواجدون على مدار الساعة.

🤫︙تجنب إرسال الإساءات إن أمكن.*
",'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message->message_id, 
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"المطور ✅",'url'=>"https://t.me/Silva5bot"]],
[['text'=>"رجوع 🔙",'callback_data'=>"back1"]],
    ] 
   ])
  ]);
 }



 if($data == 'coins'){

	$array = [];
foreach($move["bob"] as $key => $value){
$array[$key] = $value['setengss1'];
}
$txt = null;
for($i=1;$i<=5;$i++){
if(!empty($array)){
$arrayValues = array_values($array);
$maxKey = array_search(max($arrayValues),$arrayValues);
$member = array_keys($array)[$maxKey];
$count = $arrayValues[$maxKey];
if($count == null){
$count = "0" ;
}
$txt .="{$i}» [{$member}](tg://openmessage?user_id={$member}) -> (*{$count}*) \n";
unset($array[$member]);
}
}

  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"




انسخ الرابط ثم قم بمشاركته مع اصدقائك 📥 .

• كل شخص يقوم بالدخول ستحصل على *$setengss* نقطه

- بإمكانك عمل اعلان خاص برابط الدعوة الخاص بك 

~ رابط الدعوة : https://t.me/$bott?start=$chat_id

*• مشاركتك للرابط : $setengss1 🌀*

*• المستخدمين الاكثر مشاركة لرابط الدعوى : *
$txt


",'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message->message_id, 
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
 [['text'=>"مشاركة مع اصدقائك 💥", 'switch_inline_query'=>"murtada"]],
[['text'=>"تجهيز اعلان للنشر ♻️",'callback_data'=>"SK"]],
[['text'=>"رجوع 🔙",'callback_data'=>"murtada"]],
    ] 
   ])
  ]);
 }

 if($data == "SK"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
🏆💯 بوت الرشق الأول في التليجرام 😳🔥
- رشق قنوات/مشاهدات/لايكات تليجرام مجاناً
- رشق متابعين/مشاهدات/لايكات انستقرام مجاناً 
- رشق يوتيوب + تيكتوك مجاناً.
- رشق تويتر + فيسبوك مجاناً.
- رابط البوت للإنضمام مجاناً 👇💯
- https://t.me/$bott?start=$chat_id
",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
 [['text'=>"مشاركة مع اصدقائك 💥", 'switch_inline_query'=>"murtada"]],
[['text'=>"رجوع 🔙",'callback_data'=>"back1"]],
]
])
]);
} 





  if($data == 'buycoins'){
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"*
~ السلام عليكم معاكم  طبعا اسعار نقاط رخيصه جداا ✅❤️

- كل: 1000 نقطة  بـ 1$ 💸
- كل: 5000 نقطة  بـ 5$ 💸
- كل: 11000 نقطة ب 10$ 💸
━━━━━━━━━━━━━━━━
~ #الثقه_هنا 👈🏻
《 https://t.me/silvana552 》

طرق الدفع 👈🏻《 رصيد STRIATEL- MTN- شركة الهرم - محفظة payeer  》
- - - - - - - - - - - - -
~ #_للتواصل 

《 @Silva5bot 》
*
",'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message->message_id, 
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"رجوع 🔙",'callback_data'=>"back1"]],
    ] 
   ])
  ]);
 }
 
 if(isset($update->message)){
$message = $update->message;
$message_id = $update->message->message_id;
$chat_id = $message->chat->id;
$text = $message->text;
$user = $message->from->username;
$name = $message->from->first_name;
$from_id = $message->from->id;
$tc = $message->chat->type;
}
if(isset($update->callback_query)){
$data = $update->callback_query->data;
$chat_id = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$name = $update->callback_query->message->chat->first_name;
$user = $update->callback_query->message->chat->username;
$from_id = $chat_id;
$tc = $update->callback_query->message->chat->type;
}
if($data == "viewnaw" ){if($Less <= $sales[$from_id]['collect']){$JJAMAL = $SerView;$s = explode(' - ', Search ($JJAMAL));$in = str_replace('viewnaw#',null,$data);
bot('editMessagetext',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>"
*
👾︙يرجى إرسال رابط المنشور الذي تريد رشق مشاهدات له، يجب ان تكون القناة عامة.

⚠️︙اذا كان يوجد اخر الرابط* `?single` *قوم بحذفه من الرابط

*",
'parse_mode'=>"MarkDown",'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"رشق مشاهدات 👁️",'callback_data'=>"null"],['text'=>"▫️النوع 🎚️",'callback_data'=>"null"]],
[['text'=>"200 نقطة 💵",'callback_data'=>"null"],['text'=>"▫️سعر 1k 💲",'callback_data'=>'null']],
[['text'=>"0% ✨",'callback_data'=>"null"],['text'=>"▫️النزول 📉 ",'callback_data'=>"null"]],
[['text'=>"خارقة 🥇",'callback_data'=>"null"],['text'=>"▫️الجودة 🎖️",'callback_data'=>'null']],
[['text'=>"الغاء  🚫",'callback_data'=>"made7"]],],]),]);

$filejson[$from_id]['ac'] = "View";
$filejson[$from_id]['accc'] = $in;
$filejson[$from_id]['p'] = "view";
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
return ;
}else{bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,
'text'=>"*
نقاطك لاتكفي لرشق المشاهدات ⚠️

• عليك تجميع نقاط اكثر من $Less نقطة  لبدء الرشق 🚫
*",
'parse_mode'=>"MarkDown",'reply_to_message_id'=>$message_id,'reply_markup'=>json_encode([
'inline_keyboard'=>[[['text'=>"شراء نقاط 💵",'callback_data'=>"buycoins"],['text'=>" تجميع نقاط 💱",'callback_data'=>"murtada"]],[['text'=>"رجوع  🔙",'callback_data'=>"back1"]], ]])]);
unset ($filejson[$from_id]);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}}
if (preg_match("/https:\/\/t.me\/(.*)/",$text)){
if($filejson[$from_id]['p'] == "view" && !is_numeric($text)){
$tJJAMAL = $filejson[$from_id]['ac'];
$JJAMAL = ${"Ser".$tJJAMAL};
$s = explode(' - ', Search ($JJAMAL));
$max = $sales[$from_id]['collect'] / 0.2;
$maxmember = floor($max);
bot('sendmessage',['chat_id'=>$chat_id,
'text'=>"*
- تم حفظ الرابط بنجاح ✔
- 200 نقطة = 1000 مشاهدة 
٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭
- ارسل الان عدد الرشق يجب أن يتراوح العدد بين ".$s[0]." و ".$s[1]."
٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭
• يمكنك رشق $maxmember مشاهدات تليكرام👁️
*",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
]);
$filejson[$from_id]['num'] = $tJJAMAL;
$filejson[$from_id]['amr'] = "sendnumrrVV";
$filejson[$from_id]['linktin'] = $text;
unset($filejson[$from_id]['ac']);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
return ;
}}
if(is_numeric($text) && $filejson[$from_id]['amr'] == "sendnumrrVV"){
$tJJAMAL = $filejson[$from_id]['num'];
$JJAMAL = ${"Ser".$tJJAMAL};
$s = explode(' - ', Search ($JJAMAL));
if($text <= $s[1] && $s[0] <= $text && $JAMAL->NewPrice ($tJJAMAL,$text,199.98) <= $sales[$from_id]['collect']){
$linktin = $filejson[$from_id]['linktin'];
$orinsta1 = $api->order(array('service' =>$JJAMAL, 'link' =>$linktin, 'quantity' =>$text)); 
$orderidinsta1 = $orinsta1->order;
$records['records'][$from_id][$orderidinsta1]['link'] = $linktin;
$records['tlp'][$orderidinsta1]['link'] = $linktin;
$records['tlp'][$orderidinsta1]['ord'] = $orderidinsta1;
$Waw = json_encode($records, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("records", "Set", $Waw);
$sales[$from_id]['collect'] -= $JAMAL->NewPrice ($tJJAMAL,$text,199.98);
$Waw = json_encode($sales, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("sales", "Set", $Waw);
$linke = file_get_contents($linktin."?embed=true");
$a=explode('<span class="tgme_widget_message_views">',$linke);
$viewe = explode('</span>',$a[1]);
$count = $viewe[0];
$view = strpos($count,'K') !== false ? str_replace('K','',$count)*1000 : $count;
$nawview = $view + $text;
$sar = $text * 0.2;
$move["bob"]["$chat_id"]["requests"] +=1;
$Waw = json_encode($move, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("move", "Set", $Waw);

bot('sendmessage',['chat_id'=>$chat_id,'text'=>"
*★ بدء عملية رشق جديدة ✅
• رشق مشاهدات تليكرام 👁️
ٴ≪━━━━━━ 𝚂𝚁 ━━━━━━≫ٴ
🏷️ - نوع الرشق ◂ رشق. مشاهدات 👁️‍🗨️
❄️ - رقم الطلب ◂ $requests1
🔎 - ايدي الطلب ◂ $orderidinsta1
📥 - المشاهدات قبل الرشق ◂ $view
📤 - المشاهدات بعد الرشق ◂ $nawview
♨️ - العدد ◂ $text
💲 - السعر ◂ $sar نقطة 
⏰ - الوقت ◂ $times $aa
📆 - التاريخ ◂ ".date("Y")."/".date("n")."/".date("d")."
🔗 - الرابط ◂* [$linktin]
*ٴ≪━━━━━━ 𝚂𝚁 ━━━━━━≫ٴ
⚠️┇الرجاء الانتظار من 15 دقيقة الى 12 ساعة ليتم استكمال الطلب.*
",'parse_mode'=>"MarkDown",'disable_web_page_preview'=>true,]);

bot('sendmessage',['chat_id'=>$mmyyy,
'text'=>"
*~ عملية رشق جديدة ✅
    رشق مشاهدات تليكرام 👁️

🏷️┇نوع الرشق : مشاهدات 👁️
❄️┇رقم الطلب :* $requests1
*🔎┇ايدي الطلب :* $orderidinsta1
*♨️┇العدد :* $text
*💲┇السعر :* $sar نقطة 
*🔗┇الرابط :* [$linktin]
━━━━━━━━━━━━━━━━
",
'parse_mode'=>'MarkDown',
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"الدخول الى البوت 💥",'url'=>"https://telegram.me/$bott?start=635472688"]]],]),]);
bot('sendmessage',['chat_id'=>$admin,
'text'=>"
يوجد الان عضو قد رشق مشاهدات تلجرام
معلومات عنه 🧐:
ايديه 🆔 : $from_id
اسمه ✨ : $name

عدد الرشق : $text 👥
الرابط : [$linktin]
رقم طلب : `$orderidinsta1`",
'parse_mode'=>"MarkDown",'disable_web_page_preview'=>true,'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"حظر الشخص 🚫",'callback_data'=>"ban×".$chat_id],['text'=>"معلومات الشخص 🗂",'callback_data'=>"allmalw×".$chat_id]],],]),]);
$sales['tmtlab'] += 1;
$sales[$chat_id]['tmtlab'] += 1;
$Waw = json_encode($sales, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("sales", "Set", $Waw);
unset ($filejson[$from_id]);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}else{
bot('sendmessage',['chat_id'=>$chat_id,
'text'=>"- حدث خطأ 🙄

- ارسل /start",
'reply_to_message_id'=>$message_id,
]);
unset ($filejson[$from_id]);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}}
$GG1ZZ = file_get_contents("iBadlz.txt");
$fjcvgtc = "6";
if($data == "Tele" ){
$JJAMAL = $SerTele;$s = explode(' - ', Search ($JJAMAL));$in = str_replace('Tele#',null,$data);
    file_put_contents("iBadlz.txt","s");
bot('editMessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"*
‍🏆️︙يرجى إرسال رابط القناة او الكروب الذي تريد رشقه.
* 
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"رشق اعضاء 👁️",'callback_data'=>"null"],['text'=>"▫️النوع 🎚️",'callback_data'=>"null"]],
[['text'=>"2000 نقطة 💵",'callback_data'=>"null"],['text'=>"▫️سعر 1k 💲",'callback_data'=>'null']],
[['text'=>"0% (ثابت)✨",'callback_data'=>"null"],['text'=>"▫️النزول 📉 ",'callback_data'=>"null"]],
[['text'=>"ممتازة 🥇",'callback_data'=>"null"],['text'=>"▫️الجودة 🎖️",'callback_data'=>'null']],
[['text'=>"الغاء  🚫",'callback_data'=>"made7"]],
],
]),
]);
$filejson[$from_id]['ac'] = "Tele";
$filejson[$from_id]['accc'] = $in;
$filejson[$from_id]['p'] = "tele";
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
return ;
}
if($message and $GG1ZZ == "s"){

if($filejson[$from_id]['p'] == "tele" && !is_numeric($text)){
$tJJAMAL = $filejson[$from_id]['ac'];
$JJAMAL = ${"Ser".$tJJAMAL};
$s = explode(' - ', Search ($JJAMAL));
$max = $sales[$from_id]['0'] /2;
$maxmember = floor($max);
bot('sendmessage',[
'chat_id'=>5303500785,
'parse_mode'=>"MarkDown",
'text'=>"
◽︙ارسل الان عدد الرشق يجب أن يتراوح العدد بين ".$s[0]." و ".$s[1]."
٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭
• 1000 نقطة = 500 عضو
٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭
• يمكنك رشق $maxmember عضو تليكرام👥
",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
]);
$filejson[$from_id]['num'] = $tJJAMAL;
$filejson[$from_id]['amr'] = "sendnumrr";
$filejson[$from_id]['linktin'] = $text;
unset($filejson[$from_id]['ac']);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
return ;
}}
if(is_numeric($text) && $filejson[$from_id]['amr'] == "sendnumrr"){
$tJJAMAL = $filejson[$from_id]['num'];
$JJAMAL = ${"Ser".$tJJAMAL};
$s = explode(' - ', Search ($JJAMAL));
if($text <= $s[1] && $s[0] <= $text && $JAMAL->NewPrice ($tJJAMAL,$text,1998.68) <= $sales[$from_id]['collect']){
$linktin = $filejson[$from_id]['linktin'];
$orinsta1 = $api->order(array('service' =>$JJAMAL, 'link' =>$linktin, 'quantity' =>$text)); 
$orderidinsta1 = $orinsta1->order;
$records['records'][$from_id][$orderidinsta1]['link'] = $linktin;
$records['tlp'][$orderidinsta1]['link'] = $linktin;
$records['tlp'][$orderidinsta1]['ord'] = $orderidinsta1;
$Waw = json_encode($records, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("records", "Set", $Waw);
$sales[$from_id]['collect'] -= $JAMAL->NewPrice ($tJJAMAL,$text,1998.68);
$Waw = json_encode($sales, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("sales", "Set", $Waw);

$move["bob"]["$chat_id"]["requests"] +=1;
$Waw = json_encode($move, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("move", "Set", $Waw);
$sar = $text * 2;

bot('sendmessage',['chat_id'=>$chat_id,'text'=>"
*★ بدء عملية رشق جديدة ✅
• رشق اعضاء تليكرام ثابت 👥
ٴ≪━━━━━━ 𝚂𝚁 ━━━━━━≫ٴ
🏷️ - نوع الرشق ◂ رشق مشتركين 💗
❄️ - رقم الطلب ◂ $requests1
🔎 - ايدي الطلب ◂ $orderidinsta1
♨️ - العدد ◂ $text
💲 - السعر ◂ $sar نقطة 
⏰ - الوقت ◂ $times $aa
📆 - التاريخ ◂ ".date("Y")."/".date("n")."/".date("d")."
🔗 - الرابط ◂* [$linktin]
*ٴ≪━━━━━━ 𝚂𝚁 ━━━━━━≫ٴ
⚠️┇الرجاء الانتظار من 15 دقيقة الى 12 ساعة ليتم استكمال الطلب.*
",'parse_mode'=>"MarkDown",'disable_web_page_preview'=>true,]);

bot('sendmessage',['chat_id'=>$mmyyy,'text'=>"
*~ عملية رشق جديدة ✅
   رشق اعضاء تليكرام ثابت 👥*

*🏷️┇نوع الرشق : اعضاء *
*❄️┇رقم الطلب :* $requests1
*🔎┇ايدي الطلب :* $orderidinsta1
*♨️┇العدد :* $text
*💲┇السعر :* $sar نقطة 
*🔗┇الرابط :* [$linktin]
*━━━━━━━━━━━━━━━━*
",'parse_mode'=>"MarkDown",'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[[['text'=>"الدخول الى البوت 💥",'url'=>"https://telegram.me/$bott?start=635472688"]]],]),]);

bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"
يوجد الان عضو قد رشق اعضاء تلجرام
معلومات عنه 🧐:
ايديه 🆔 : $from_id
اسمه ✨ : $name

عدد الرشق : $text 👥
الرابط : [$linktin]
رقم طلب : `$orderidinsta1`",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"حظر الشخص 🚫",'callback_data'=>"ban×".$chat_id],['text'=>"معلومات الشخص 🗂",'callback_data'=>"allmalw×".$chat_id]],
],
]),
]);
$sales['tmtlab'] += 1;
$sales[$chat_id]['tmtlab'] += 1;
$Waw = json_encode($sales, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("sales", "Set", $Waw);
unset ($filejson[$from_id]);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- حدث خطأ 🙄

- ارسل /start",
'reply_to_message_id'=>$message_id,
]);
unset ($filejson[$from_id]);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}}

if($data == "Tele1" ){if($Less <= $sales[$from_id]['collect']){$JJAMAL = $SerTele1;$s = explode(' - ', Search ($JJAMAL));$in = str_replace('Tele1#',null,$data);
bot('editMessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"*
‍🏆️︙يرجى إرسال رابط القناة او الكروب الذي تريد رشقه.
*
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"رشق اعضاء 👁️",'callback_data'=>"null"],['text'=>"▫️النوع 🎚️",'callback_data'=>"null"]],
[['text'=>"1000 نقطة 💵",'callback_data'=>"null"],['text'=>"▫️سعر 1k 💲",'callback_data'=>'null']],
[['text'=>"3% (ثابت)✨",'callback_data'=>"null"],['text'=>"▫️النزول 📉 ",'callback_data'=>"null"]],
[['text'=>"ممتازة 🥇",'callback_data'=>"null"],['text'=>"▫️الجودة 🎖️",'callback_data'=>'null']],
[['text'=>"الغاء  🚫",'callback_data'=>"made7"]],
],
]),
]);
$filejson[$from_id]['ac'] = "Tele1";
$filejson[$from_id]['accc'] = $in;
$filejson[$from_id]['p'] = "Tele1";
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
return ;
}else{
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"*
نقاطك لاتكفي للرشق ⚠️

• عليك تجميع نقاط اكثر من $Less نقطة  لبدء الرشق 🚫
*",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
 'inline_keyboard'=>[
[['text'=>"شراء نقاط 💵",'callback_data'=>"buycoins"],['text'=>" تجميع نقاط 💱",'callback_data'=>"murtada"]],
[['text'=>"رجوع  🔙",'callback_data'=>"back1"]],
    ] 
   ])
]);
unset ($filejson[$from_id]);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}}
if (preg_match("/https:\/\/t.me\/(.*)/",$text)){
if($filejson[$from_id]['p'] == "Tele1" && !is_numeric($text)){
$tJJAMAL = $filejson[$from_id]['ac'];
$JJAMAL = ${"Ser".$tJJAMAL};
$s = explode(' - ', Search ($JJAMAL));
$max = $sales[$from_id]['collect'] /1;
$maxmember = floor($max);
bot('sendmessage',[
'chat_id'=>$chat_id,
'parse_mode'=>"MarkDown",
'text'=>"*
◽︙ارسل الان عدد الرشق يجب أن يتراوح العدد بين ".$s[0]." و ".$s[1]."
٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭
• 1000 نقطة = 1000 عضو
٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭
• يمكنك رشق $maxmember عضو تليكرام👥
*",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
]);
$filejson[$from_id]['num'] = $tJJAMAL;
$filejson[$from_id]['amr'] = "sendnumr6r";
$filejson[$from_id]['linktin'] = $text;
unset($filejson[$from_id]['ac']);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
return ;
}}
if(is_numeric($text) && $filejson[$from_id]['amr'] == "sendnumr6r"){
$tJJAMAL = $filejson[$from_id]['num'];
$JJAMAL = ${"Ser".$tJJAMAL};
$s = explode(' - ', Search ($JJAMAL));
if($text <= $s[1] && $s[0] <= $text && $JAMAL->NewPrice ($tJJAMAL,$text,999.3) <= $sales[$from_id]['collect']){
$linktin = $filejson[$from_id]['linktin'];
$orinsta1 = $api->order(array('service' =>$JJAMAL, 'link' =>$linktin, 'quantity' =>$text)); 
$orderidinsta1 = $orinsta1->order;
$records['records'][$from_id][$orderidinsta1]['link'] = $linktin;
$records['tlp'][$orderidinsta1]['link'] = $linktin;
$records['tlp'][$orderidinsta1]['ord'] = $orderidinsta1;
$Waw = json_encode($records, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("records", "Set", $Waw);
$sales[$from_id]['collect'] -= $JAMAL->NewPrice ($tJJAMAL,$text,999.3);
$Waw = json_encode($sales, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("sales", "Set", $Waw);

$move["bob"]["$chat_id"]["requests"] +=1;
$Waw = json_encode($move, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("move", "Set", $Waw);
$sar = $text * 1;

bot('sendmessage',['chat_id'=>$chat_id,'text'=>"
*★ بدء عملية رشق جديدة ✅
• رشق اعضاء تلكرام سريع 👥
ٴ≪━━━━━━ 𝚂𝚁 ━━━━━━≫ٴ
🏷️ - نوع الرشق ◂ رشق مشتركين 🧡
❄️ - رقم الطلب ◂ $requests1
🔎 - ايدي الطلب ◂ $orderidinsta1
♨️ - العدد ◂ $text
💲 - السعر ◂ $sar نقطة 
⏰ - الوقت ◂ $times $aa
📆 - التاريخ ◂ ".date("Y")."/".date("n")."/".date("d")."
🔗 - الرابط ◂* [$linktin]
*ٴ≪━━━━━━ 𝚂𝚁 ━━━━━━≫ٴ
⚠️┇الرجاء الانتظار من 15 دقيقة الى 12 ساعة ليتم استكمال الطلب.*
",'parse_mode'=>"MarkDown",'disable_web_page_preview'=>true,]);

bot('sendmessage',['chat_id'=>$mmyyy,'text'=>"
*~ عملية رشق جديدة ✅
   رشق اعضاء تلكرام سريع 👥

*🏷️┇نوع الرشق : اعضاء *
*❄️┇رقم الطلب :* $requests1
*🔎┇ايدي الطلب :* $orderidinsta1
*♨️┇العدد :* $text
*💲┇السعر :* $sar نقطة 
*🔗┇الرابط :* [$linktin]
*━━━━━━━━━━━━━━━━*
",'parse_mode'=>"MarkDown",'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[[['text'=>"الدخول الى البوت 💥",'url'=>"https://telegram.me/$bott?start=635472688"]]],]),]);


bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"
يوجد الان عضو قد رشق اعضاء تلجرام
معلومات عنه 🧐:
ايديه 🆔 : $from_id
اسمه ✨ : $name

عدد الرشق : $text 👥
الرابط : [$linktin]
رقم طلب : `$orderidinsta1`",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"حظر الشخص 🚫",'callback_data'=>"ban×".$chat_id],['text'=>"معلومات الشخص 🗂",'callback_data'=>"allmalw×".$chat_id]],
],
]),
]);
$sales['tmtlab'] += 1;
$sales[$chat_id]['tmtlab'] += 1;
$Waw = json_encode($sales, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("sales", "Set", $Waw);
unset ($filejson[$from_id]);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- حدث خطأ 🙄

- ارسل /start",
'reply_to_message_id'=>$message_id,
]);
unset ($filejson[$from_id]);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}}
if($data == "Tele2" ){if($Less <= $sales[$from_id]['collect']){$JJAMAL = $SerTele2;$s = explode(' - ', Search ($JJAMAL));$in = str_replace('Tele2#',null,$data);
bot('editMessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"*
‍🎞️︙يرجى إرسال رابط المنشور الذي تريد زيادة ردود فعل ايجابية + مشاهدات[ 👍 ❤️ 🔥 🎉 😁]
*
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ردود فعل ايجابية 😍️",'callback_data'=>"null"],['text'=>"▫️النوع 🎚️",'callback_data'=>"null"]],
[['text'=>"250 نقطة 💵",'callback_data'=>"null"],['text'=>"▫️سعر 1k 💲",'callback_data'=>'null']],
[['text'=>"0% (ثابت)✨",'callback_data'=>"null"],['text'=>"▫️النزول 📉 ",'callback_data'=>"null"]],
[['text'=>"ممتازة 🥇",'callback_data'=>"null"],['text'=>"▫️الجودة 🎖️",'callback_data'=>'null']],
[['text'=>"الغاء  🚫",'callback_data'=>"made7"]],
],
]),
]);
$filejson[$from_id]['ac'] = "Tele2";
$filejson[$from_id]['accc'] = $in;
$filejson[$from_id]['p'] = "Tele2";
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
return ;
}else{
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"*
نقاطك لاتكفي للرشق ⚠️

• عليك تجميع نقاط اكثر من $Less نقطة  لبدء الرشق 🚫
*",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
 'inline_keyboard'=>[
[['text'=>"شراء نقاط 💵",'callback_data'=>"buycoins"],['text'=>" تجميع نقاط 💱",'callback_data'=>"murtada"]],
[['text'=>"رجوع  🔙",'callback_data'=>"back1"]],
    ] 
   ])
]);
unset ($filejson[$from_id]);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}}
if (preg_match("/https:\/\/t.me\/(.*)/",$text)){
if($filejson[$from_id]['p'] == "Tele2" && !is_numeric($text)){
$tJJAMAL = $filejson[$from_id]['ac'];
$JJAMAL = ${"Ser".$tJJAMAL};
$s = explode(' - ', Search ($JJAMAL));
$max = $sales[$from_id]['collect'] /0.25;
$maxmember = floor($max);
bot('sendmessage',[
'chat_id'=>$chat_id,
'parse_mode'=>"MarkDown",
'text'=>"*
◽︙ارسل الان عدد الرشق يجب أن يتراوح العدد بين ".$s[0]." و ".$s[1]."
٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭
• 250 نقطة = 1000 رد فعل
٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭
• يمكنك رشق $maxmember ردود فعل 🔥
*",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
]);
$filejson[$from_id]['num'] = $tJJAMAL;
$filejson[$from_id]['amr'] = "sendnumtrr";
$filejson[$from_id]['linktin'] = $text;
unset($filejson[$from_id]['ac']);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
return ;
}}
if(is_numeric($text) && $filejson[$from_id]['amr'] == "sendnumtrr"){
$tJJAMAL = $filejson[$from_id]['num'];
$JJAMAL = ${"Ser".$tJJAMAL};
$s = explode(' - ', Search ($JJAMAL));
if($text <= $s[1] && $s[0] <= $text && $JAMAL->NewPrice ($tJJAMAL,$text,249.86) <= $sales[$from_id]['collect']){
$linktin = $filejson[$from_id]['linktin'];
$orinsta1 = $api->order(array('service' =>$JJAMAL, 'link' =>$linktin, 'quantity' =>$text)); 
$orderidinsta1 = $orinsta1->order;
$records['records'][$from_id][$orderidinsta1]['link'] = $linktin;
$records['tlp'][$orderidinsta1]['link'] = $linktin;
$records['tlp'][$orderidinsta1]['ord'] = $orderidinsta1;
$Waw = json_encode($records, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("records", "Set", $Waw);
$sales[$from_id]['collect'] -= $JAMAL->NewPrice ($tJJAMAL,$text,249.86);
$Waw = json_encode($sales, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("sales", "Set", $Waw);

$sar = $text * 0.25;
$move["bob"]["$chat_id"]["requests"] +=1;
$Waw = json_encode($move, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("move", "Set", $Waw);

bot('sendmessage',['chat_id'=>$chat_id,'text'=>"
*★ بدء عملية رشق جديدة ✅
• ردود فعل ايجابية + مشاهدات[ 👍 ❤️ 🔥 🎉 😁]
ٴ≪━━━━━━ 𝚂𝚁 ━━━━━━≫ٴ
🏷️ - نوع الرشق ◂ رشق تفاعلات ايجابية 💝
❄️ - رقم الطلب ◂ $requests1
🔎 - ايدي الطلب ◂ $orderidinsta1
♨️ - العدد ◂ $text
💲 - السعر ◂ $sar نقطة 
⏰ - الوقت ◂ $times $aa
📆 - التاريخ ◂ ".date("Y")."/".date("n")."/".date("d")."
🔗 - الرابط ◂* [$linktin]
*ٴ≪━━━━━━ 𝚂𝚁 ━━━━━━≫ٴ
⚠️┇الرجاء الانتظار من 15 دقيقة الى 12 ساعة ليتم استكمال الطلب.*
",'parse_mode'=>"MarkDown",'disable_web_page_preview'=>true,]);

bot('sendmessage',['chat_id'=>$mmyyy,'text'=>"
*~ عملية رشق جديدة ✅
ردود فعل ايجابية + مشاهدات[ 👍 ❤️ 🔥 🎉 😁]*

*🏷️┇نوع الرشق : ردود افعال *
*❄️┇رقم الطلب :* $requests1
*🔎┇ايدي الطلب :* $orderidinsta1
*♨️┇العدد :* $text
*💲┇السعر :* $sar نقطة 
*🔗┇الرابط :* [$linktin]
*━━━━━━━━━━━━━━━━*
",'parse_mode'=>"MarkDown",'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[[['text'=>"الدخول الى البوت 💥",'url'=>"https://Telegram.me/$bott?start=635472688"]]],]),]);

bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"
يوجد الان عضو قد ردود افعال تليكرام
معلومات عنه 🧐:
ايديه 🆔 : $from_id
اسمه ✨ : $name

عدد الرشق : $text 👥
الرابط : [$linktin]
رقم طلب : `$orderidinsta1`",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"حظر الشخص 🚫",'callback_data'=>"ban×".$chat_id],['text'=>"معلومات الشخص 🗂",'callback_data'=>"allmalw×".$chat_id]],
],
]),
]);
$sales['tmtlab'] += 1;
$sales[$chat_id]['tmtlab'] += 1;
$Waw = json_encode($sales, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("sales", "Set", $Waw);
unset ($filejson[$from_id]);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- حدث خطأ 🙄

- ارسل /start",
'reply_to_message_id'=>$message_id,
]);
unset ($filejson[$from_id]);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}}

if($data == "Tele3" ){if($Less <= $sales[$from_id]['collect']){$JJAMAL = $SerTele3;$s = explode(' - ', Search ($JJAMAL));$in = str_replace('Tele3#',null,$data);
bot('editMessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"*
‍🎞️︙يرجى إرسال رابط المنشور الذي تريد زيادة  ردود فعل سلبية + مشاهدات [👎 😱 💩 😢 🤮]
*
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"ردود فعل سلبية 🤮️",'callback_data'=>"null"],['text'=>"▫️النوع 🎚️",'callback_data'=>"null"]],
[['text'=>"250 نقطة 💵",'callback_data'=>"null"],['text'=>"▫️سعر 1k 💲",'callback_data'=>'null']],
[['text'=>"0% (ثابت)✨",'callback_data'=>"null"],['text'=>"▫️النزول 📉 ",'callback_data'=>"null"]],
[['text'=>"ممتازة 🥇",'callback_data'=>"null"],['text'=>"▫️الجودة 🎖️",'callback_data'=>'null']],
[['text'=>"الغاء  🚫",'callback_data'=>"made7"]],
],
]),
]);
$filejson[$from_id]['ac'] = "Tele3";
$filejson[$from_id]['accc'] = $in;
$filejson[$from_id]['p'] = "Tele3";
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
return ;
}else{
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"*
نقاطك لاتكفي للرشق ⚠️

• عليك تجميع نقاط اكثر من $Less نقطة  لبدء الرشق 🚫
*",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
 'inline_keyboard'=>[
[['text'=>"شراء نقاط 💵",'callback_data'=>"buycoins"],['text'=>" تجميع نقاط 💱",'callback_data'=>"murtada"]],
[['text'=>"رجوع  🔙",'callback_data'=>"back1"]],
    ] 
   ])
]);
unset ($filejson[$from_id]);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}}
if (preg_match("/https:\/\/t.me\/(.*)/",$text)){
if($filejson[$from_id]['p'] == "Tele3" && !is_numeric($text)){
$tJJAMAL = $filejson[$from_id]['ac'];
$JJAMAL = ${"Ser".$tJJAMAL};
$s = explode(' - ', Search ($JJAMAL));
$max = $sales[$from_id]['collect'] /0.25;
$maxmember = floor($max);
bot('sendmessage',[
'chat_id'=>$chat_id,
'parse_mode'=>"MarkDown",
'text'=>"*
◽︙ارسل الان عدد الرشق يجب أن يتراوح العدد بين ".$s[0]." و ".$s[1]."
٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭
• 250 نقطة = 1000 رد فعل
٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭
• يمكنك رشق $maxmember ردود فعل 🔥
*",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
]);
$filejson[$from_id]['num'] = $tJJAMAL;
$filejson[$from_id]['amr'] = "sendnumtgrr";
$filejson[$from_id]['linktin'] = $text;
unset($filejson[$from_id]['ac']);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
return ;
}}
if(is_numeric($text) && $filejson[$from_id]['amr'] == "sendnumtgrr"){
$tJJAMAL = $filejson[$from_id]['num'];
$JJAMAL = ${"Ser".$tJJAMAL};
$s = explode(' - ', Search ($JJAMAL));
if($text <= $s[1] && $s[0] <= $text && $JAMAL->NewPrice ($tJJAMAL,$text,249.86) <= $sales[$from_id]['collect']){
$linktin = $filejson[$from_id]['linktin'];
$orinsta1 = $api->order(array('service' =>$JJAMAL, 'link' =>$linktin, 'quantity' =>$text)); 
$orderidinsta1 = $orinsta1->order;
$records['records'][$from_id][$orderidinsta1]['link'] = $linktin;
$records['tlp'][$orderidinsta1]['link'] = $linktin;
$records['tlp'][$orderidinsta1]['ord'] = $orderidinsta1;
$Waw = json_encode($records, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("records", "Set", $Waw);
$sales[$from_id]['collect'] -= $JAMAL->NewPrice ($tJJAMAL,$text,249.86);
$Waw = json_encode($sales, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("sales", "Set", $Waw);
$sar = $text * 0.25;
$move["bob"]["$chat_id"]["requests"] +=1;
$Waw = json_encode($move, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("move", "Set", $Waw);

bot('sendmessage',['chat_id'=>$chat_id,'text'=>"
*★ بدء عملية رشق جديدة ✅
• ردود فعل سلبية + مشاهدات [👎 😱 💩 😢 🤮]
ٴ≪━━━━━━ 𝚂𝚁 ━━━━━━≫ٴ
🏷️ - نوع الرشق ◂ رشق تفاعلات سلبية
❄️ - رقم الطلب ◂ $requests1
🔎 - ايدي الطلب ◂ $orderidinsta1
♨️ - العدد ◂ $text
💲 - السعر ◂ $sar نقطة 
⏰ - الوقت ◂ $times $aa
📆 - التاريخ ◂ ".date("Y")."/".date("n")."/".date("d")."
🔗 - الرابط ◂* [$linktin]
*ٴ≪━━━━━━ 𝚂𝚁 ━━━━━━≫ٴ
⚠️┇الرجاء الانتظار من 15 دقيقة الى 12 ساعة ليتم استكمال الطلب.*
",'parse_mode'=>"MarkDown",'disable_web_page_preview'=>true,]);

bot('sendmessage',['chat_id'=>$mmyyy,'text'=>"
*~ عملية رشق جديدة ✅
 ردود فعل سلبية + مشاهدات [👎 😱 💩 😢 🤮]*

*🏷️┇نوع الرشق : ردود افعال *
*❄️┇رقم الطلب :* $requests1
*🔎┇ايدي الطلب :* $orderidinsta1
*♨️┇العدد :* $text
*💲┇السعر :* $sar نقطة 
*🔗┇الرابط :* [$linktin]
*━━━━━━━━━━━━━━━━*
",'parse_mode'=>"MarkDown",'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[[['text'=>"الدخول الى البوت 💥",'url'=>"https://Telegram.me/$bott?start=635472688"]]],]),]);

bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"
يوجد الان عضو قد ردود افعال تليكرام
معلومات عنه 🧐:
ايديه 🆔 : $from_id
اسمه ✨ : $name

عدد الرشق : $text 👥
الرابط : [$linktin]
رقم طلب : `$orderidinsta1`",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"حظر الشخص 🚫",'callback_data'=>"ban×".$chat_id],['text'=>"معلومات الشخص 🗂",'callback_data'=>"allmalw×".$chat_id]],
],
]),
]);
$sales['tmtlab'] += 1;
$sales[$chat_id]['tmtlab'] += 1;
$Waw = json_encode($sales, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("sales", "Set", $Waw);
unset ($filejson[$from_id]);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- حدث خطأ 🙄

- ارسل /start",
'reply_to_message_id'=>$message_id,
]);
unset ($filejson[$from_id]);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}}



if($data == "tek" ){
if($Less <= $sales[$from_id]['collect']){
$JJAMAL = $Sertek;
$s = explode(' - ', Search ($JJAMAL));
$in = str_replace('tek#',null,$data);
bot('editMessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"*
‍🎞️︙يرجى إرسال رابط المنشور الذي تريد رشقه. 
*",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"مشاهدات تيكتوك ثابت 👀",'callback_data'=>"null"],['text'=>"▫️النوع 🎚️",'callback_data'=>"null"]],
[['text'=>"200 نقطة 💵",'callback_data'=>"null"],['text'=>"▫️سعر 1k 💲",'callback_data'=>'null']],
[['text'=>"0% ✨",'callback_data'=>"null"],['text'=>"▫️النزول 📉 ",'callback_data'=>"null"]],
[['text'=>"خارقة 🥇",'callback_data'=>"null"],['text'=>"▫️الجودة 🎖️",'callback_data'=>'null']],
[['text'=>"الغاء  🚫",'callback_data'=>"made7"]],
],
]),
]);
$filejson[$from_id]['ac'] = "tek";
$filejson[$from_id]['accc'] = $in;
$filejson[$from_id]['p'] = "tek";
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
return ;
}else{
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"*
نقاط ك لاتكفي لرشق المشاهدات⚠️

• عليك تجميع نقاط  اكثر من $Less نقطة  لبدء الرشق 🚫
*",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
 [['text'=>"شراء نقاط  💵",'callback_data'=>"buycoins"]],
[['text'=>" تجميع نقاط   💱",'callback_data'=>"murtada"]],
[['text'=>"رجوع  🔙",'callback_data'=>"back1"]],
    ] 
   ])
]);
unset ($filejson[$from_id]);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}}
if (preg_match("/https:\/\/vt.tiktok.com\/(.*)/",$text)){
if($filejson[$from_id]['p'] == "tek" && !is_numeric($text)){
$tJJAMAL = $filejson[$from_id]['ac'];
$JJAMAL = ${"Ser".$tJJAMAL};
$s = explode(' - ', Search ($JJAMAL));
$max = $sales[$from_id]['collect'] / 0.2;
$maxmember = floor($max);
bot('sendmessage',[
'chat_id'=>$chat_id,
'parse_mode'=>"MarkDown",
'text'=>"*
- تم حفظ الرابط بنجاح ✔
- 200 نقطة = 1000 مشاهدة 
٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭
- ارسل الان عدد الرشق يجب أن يتراوح العدد بين ".$s[0]." و ".$s[1]."
٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭
• يمكنك رشق $maxmember مشاهدة تيكتوك👁️
*",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
]);
$filejson[$from_id]['num'] = $tJJAMAL;
$filejson[$from_id]['amr'] = "sendnumrrg";
$filejson[$from_id]['linktin'] = $text;
unset($filejson[$from_id]['ac']);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
return ;
}}
if(is_numeric($text) && $filejson[$from_id]['amr'] == "sendnumrrg"){
$tJJAMAL = $filejson[$from_id]['num'];
$JJAMAL = ${"Ser".$tJJAMAL};
$s = explode(' - ', Search ($JJAMAL));
if($text <= $s[1] && $s[0] <= $text && $JAMAL->NewPrice ($tJJAMAL,$text,199.98) <= $sales[$from_id]['collect']){
$linktin = $filejson[$from_id]['linktin'];
$orinsta1 = $api->order(array('service' =>$JJAMAL, 'link' =>$linktin, 'quantity' =>$text)); 
$orderidinsta1 = $orinsta1->order;
$records['records'][$from_id][$orderidinsta1]['link'] = $linktin;
$records['tlp'][$orderidinsta1]['link'] = $linktin;
$records['tlp'][$orderidinsta1]['ord'] = $orderidinsta1;
$Waw = json_encode($records, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("records", "Set", $Waw);
$sales[$from_id]['collect'] -= $JAMAL->NewPrice ($tJJAMAL,$text,199.98);
$Waw = json_encode($sales, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("sales", "Set", $Waw);
$sar = $text * 0.2;
$move["bob"]["$chat_id"]["requests"] +=1;
$Waw = json_encode($move, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("move", "Set", $Waw);

bot('sendmessage',['chat_id'=>$chat_id,'text'=>"
*★ بدء عملية رشق جديدة ✅
• مشاهدات تيكتوك صاروخ 👁️‍🗨️
ٴ≪━━━━━━ 𝚂𝚁 ━━━━━━≫ٴ
🏷️ - نوع الرشق ◂ رشق مشاهدات 👀
❄️ - رقم الطلب ◂ $requests1
🔎 - ايدي الطلب ◂ $orderidinsta1
♨️ - العدد ◂ $text
💲 - السعر ◂ $sar نقطة 
⏰ - الوقت ◂ $times $aa
📆 - التاريخ ◂ ".date("Y")."/".date("n")."/".date("d")."
🔗 - الرابط ◂* [$linktin]
*ٴ≪━━━━━━ 𝚂𝚁 ━━━━━━≫ٴ
⚠️┇الرجاء الانتظار من 15 دقيقة الى 12 ساعة ليتم استكمال الطلب.*
",'parse_mode'=>"MarkDown",'disable_web_page_preview'=>true,]);

bot('sendmessage',['chat_id'=>$mmyyy,'text'=>"
*~ عملية رشق جديدة ✅
مشاهدات تيكتوك صاروخ 👁️‍🗨️*

*🏷️┇نوع الرشق : مشاهدات *
*❄️┇رقم الطلب :* $requests1
*🔎┇ايدي الطلب :* $orderidinsta1
*♨️┇العدد :* $text
*💲┇السعر :* $sar نقطة 
*🔗┇الرابط :* [$linktin]
*━━━━━━━━━━━━━━━━*
",'parse_mode'=>"MarkDown",'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[[['text'=>"الدخول الى البوت 💥",'url'=>"https://telegram.me/$bott?start=635472688"]]],]),]);

bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"
يوجد الان عضو قد رشق $text مشاهدات تيكتوك
معلومات عنه 🧐:
ايديه 🆔 : $from_id
اسمه ✨ : $name

عدد الرشق : $text 👥
الرابط : [$linktin]
رقم طلب : `$orderidinsta1`",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"حظر الشخص 🚫",'callback_data'=>"ban×".$chat_id],['text'=>"معلومات الشخص 🗂",'callback_data'=>"allmalw×".$chat_id]],
],
]),
]);
$sales['tmtlab'] += 1;
$sales[$chat_id]['tmtlab'] += 1;
$Waw = json_encode($sales, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("sales", "Set", $Waw);
unset ($filejson[$from_id]);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- حدث خطأ 🙄

- ارسل /start",
'reply_to_message_id'=>$message_id,
]);
unset ($filejson[$from_id]);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}}


if($data == "tek1" ){
if($Less <= $sales[$from_id]['collect']){
$JJAMAL = $Sertek1;
$s = explode(' - ', Search ($JJAMAL));
$in = str_replace('tek1#',null,$data);
bot('editMessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"*
‍🎞️︙يرجى إرسال رابط الحساب الذي تريد زيادة المتابعين له ✅
*",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"متابعين تيكتوك 👀",'callback_data'=>"null"],['text'=>"▫️النوع 🎚️",'callback_data'=>"null"]],
[['text'=>"1000 نقطة 💵",'callback_data'=>"null"],['text'=>"▫️سعر 1k 💲",'callback_data'=>'null']],
[['text'=>"5% ✨",'callback_data'=>"null"],['text'=>"▫️النزول 📉 ",'callback_data'=>"null"]],
[['text'=>"خارقة 🥇",'callback_data'=>"null"],['text'=>"▫️الجودة 🎖️",'callback_data'=>'null']],
[['text'=>"الغاء  🚫",'callback_data'=>"made7"]],
],
]),
]);
$filejson[$from_id]['ac'] = "tek1";
$filejson[$from_id]['accc'] = $in;
$filejson[$from_id]['p'] = "tek1";
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
return ;
}else{
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"*
نقاط ك لاتكفي لرشق المشاهدات⚠️

• عليك تجميع نقاط  اكثر من $Less نقطة  لبدء الرشق 🚫
*",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
 [['text'=>"شراء نقاط  💵",'callback_data'=>"buycoins"]],
[['text'=>" تجميع نقاط   💱",'callback_data'=>"murtada"]],
[['text'=>"رجوع  🔙",'callback_data'=>"back1"]],
    ] 
   ])
]);
unset ($filejson[$from_id]);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}}
if ($text){
if($filejson[$from_id]['p'] == "tek1" && !is_numeric($text)){
$tJJAMAL = $filejson[$from_id]['ac'];
$JJAMAL = ${"Ser".$tJJAMAL};
$s = explode(' - ', Search ($JJAMAL));
$max = $sales[$from_id]['collect'] / 1;
$maxmember = floor($max);
bot('sendmessage',[
'chat_id'=>$chat_id,
'parse_mode'=>"MarkDown",
'text'=>"*
- تم حفظ الرابط بنجاح ✔
- 1000 نقطة = 1000 متابع
٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭
- ارسل الان عدد الرشق يجب أن يتراوح العدد بين ".$s[0]." و ".$s[1]."
٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭
• يمكنك رشق $maxmember متابعين تيكتوك👁️
*",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
]);
$filejson[$from_id]['num'] = $tJJAMAL;
$filejson[$from_id]['amr'] = "sendnumrrig";
$filejson[$from_id]['linktin'] = $text;
unset($filejson[$from_id]['ac']);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
return ;
}}
if(is_numeric($text) && $filejson[$from_id]['amr'] == "sendnumrrig"){
$tJJAMAL = $filejson[$from_id]['num'];
$JJAMAL = ${"Ser".$tJJAMAL};
$s = explode(' - ', Search ($JJAMAL));
if($text <= $s[1] && $s[0] <= $text && $JAMAL->NewPrice ($tJJAMAL,$text,999.16) <= $sales[$from_id]['collect']){
$linktin = $filejson[$from_id]['linktin'];
$orinsta1 = $api->order(array('service' =>$JJAMAL, 'link' =>$linktin, 'quantity' =>$text)); 
$orderidinsta1 = $orinsta1->order;
$records['records'][$from_id][$orderidinsta1]['link'] = $linktin;
$records['tlp'][$orderidinsta1]['link'] = $linktin;
$records['tlp'][$orderidinsta1]['ord'] = $orderidinsta1;
$Waw = json_encode($records, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("records", "Set", $Waw);
$sales[$from_id]['collect'] -= $JAMAL->NewPrice ($tJJAMAL,$text,999.16);
$Waw = json_encode($sales, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("sales", "Set", $Waw);
$sar = $text * 1;
$move["bob"]["$chat_id"]["requests"] +=1;
$Waw = json_encode($move, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("move", "Set", $Waw);

bot('sendmessage',['chat_id'=>$chat_id,'text'=>"
*★ بدء عملية رشق جديدة ✅
• رشق متابعين | رخيص | جديد ♻️
ٴ≪━━━━━━ 𝚂𝚁 ━━━━━━≫ٴ
🏷️ - نوع الرشق ◂ رشق متابعين 👩‍👩‍👧‍👧
❄️ - رقم الطلب ◂ $requests1
🔎 - ايدي الطلب ◂ $orderidinsta1
♨️ - العدد ◂ $text
💲 - السعر ◂ $sar نقطة 
⏰ - الوقت ◂ $times $aa
📆 - التاريخ ◂ ".date("Y")."/".date("n")."/".date("d")."
🔗 - الرابط ◂* [$linktin]
*ٴ≪━━━━━━ 𝚂𝚁 ━━━━━━≫ٴ
⚠️┇الرجاء الانتظار من 15 دقيقة الى 12 ساعة ليتم استكمال الطلب.*
",'parse_mode'=>"MarkDown",'disable_web_page_preview'=>true,]);

bot('sendmessage',['chat_id'=>$mmyyy,'text'=>"
*~ عملية رشق جديدة ✅
 رشق متابعين | رخيص | جديد ♻️*

*🏷️┇نوع الرشق : متابعين*
*❄️┇رقم الطلب :* $requests1
*🔎┇ايدي الطلب :* $orderidinsta1
*♨️┇العدد :* $text
*💲┇السعر :* $sar نقطة 
*🔗┇الرابط :* [$linktin]
*━━━━━━━━━━━━━━━━*
",'parse_mode'=>"MarkDown",'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[[['text'=>"الدخول الى البوت 💥",'url'=>"https://telegram.me/$bott?start=635472688"]]],]),]);

bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"
يوجد الان عضو قد رشق $text متابعين تيكتوك
معلومات عنه 🧐:
ايديه 🆔 : $from_id
اسمه ✨ : $name

عدد الرشق : $text 👥
الرابط : [$linktin]
رقم طلب : `$orderidinsta1`",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"حظر الشخص 🚫",'callback_data'=>"ban×".$chat_id],['text'=>"معلومات الشخص 🗂",'callback_data'=>"allmalw×".$chat_id]],
],
]),
]);
$sales['tmtlab'] += 1;
$sales[$chat_id]['tmtlab'] += 1;
$Waw = json_encode($sales, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("sales", "Set", $Waw);
unset ($filejson[$from_id]);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- حدث خطأ 🙄

- ارسل /start",
'reply_to_message_id'=>$message_id,
]);
unset ($filejson[$from_id]);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}}

if($data == "ins" ){
if($Less <= $sales[$from_id]['collect']){
$JJAMAL = $Serins;
$s = explode(' - ', Search ($JJAMAL));
$in = str_replace('ins#',null,$data);
bot('editMessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"*
‍🎞️︙يرجى إرسال رابط المنشور الذي تريد رشقه. 
*",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"لايكات تيكتوك ثابت 👍🏻",'callback_data'=>"null"],['text'=>"▫️النوع 🎚️",'callback_data'=>"null"]],
[['text'=>"1000 نقطة 💵",'callback_data'=>"null"],['text'=>"▫️سعر 1k 💲",'callback_data'=>'null']],
[['text'=>"0% ✨",'callback_data'=>"null"],['text'=>"▫️النزول 📉 ",'callback_data'=>"null"]],
[['text'=>"عالية ومستقره 🥇",'callback_data'=>"null"],['text'=>"▫️الجودة 🎖️",'callback_data'=>'null']],
[['text'=>"الغاء  🚫",'callback_data'=>"made7"]],
],
]),
]);
$filejson[$from_id]['ac'] = "ins";
$filejson[$from_id]['accc'] = $in;
$filejson[$from_id]['p'] = "ins";
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
return ;
}else{
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"*
نقاط ك لاتكفي لرشق المشاهدات⚠️

• عليك تجميع نقاط  اكثر من $Less نقطة  لبدء الرشق 🚫
*",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
 [['text'=>"شراء نقاط  💵",'callback_data'=>"buycoins"]],
[['text'=>" تجميع نقاط   💱",'callback_data'=>"murtada"]],
[['text'=>"رجوع  🔙",'callback_data'=>"back1"]],
    ] 
   ])
]);
unset ($filejson[$from_id]);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}}
if ($text){
if($filejson[$from_id]['p'] == "ins" && !is_numeric($text)){
$tJJAMAL = $filejson[$from_id]['ac'];
$JJAMAL = ${"Ser".$tJJAMAL};
$s = explode(' - ', Search ($JJAMAL));
$max = $sales[$from_id]['collect'] / 1;
$maxmember = floor($max);
bot('sendmessage',[
'chat_id'=>$chat_id,
'parse_mode'=>"MarkDown",
'text'=>"*
- تم حفظ الرابط بنجاح ✔
- 1000 نقطة  = 1000 لايك 👍🏻
٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭
- ارسل الان عدد الرشق يجب أن يتراوح العدد بين ".$s[0]." و ".$s[1]."
٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭
• يمكنك رشق $maxmember لايك 👍🏻
*",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
]);
$filejson[$from_id]['num'] = $tJJAMAL;
$filejson[$from_id]['amr'] = "sendnumrrgh";
$filejson[$from_id]['linktin'] = $text;
unset($filejson[$from_id]['ac']);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
return ;
}}
if(is_numeric($text) && $filejson[$from_id]['amr'] == "sendnumrrgh"){
$tJJAMAL = $filejson[$from_id]['num'];
$JJAMAL = ${"Ser".$tJJAMAL};
$s = explode(' - ', Search ($JJAMAL));
if($text <= $s[1] && $s[0] <= $text && $JAMAL->NewPrice ($tJJAMAL,$text,999.2) <= $sales[$from_id]['collect']){
$linktin = $filejson[$from_id]['linktin'];
$orinsta1 = $api->order(array('service' =>$JJAMAL, 'link' =>$linktin, 'quantity' =>$text)); 
$orderidinsta1 = $orinsta1->order;
$records['records'][$from_id][$orderidinsta1]['link'] = $linktin;
$records['tlp'][$orderidinsta1]['link'] = $linktin;
$records['tlp'][$orderidinsta1]['ord'] = $orderidinsta1;
$Waw = json_encode($records, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("records", "Set", $Waw);
$sales[$from_id]['collect'] -= $JAMAL->NewPrice ($tJJAMAL,$text,999.2);
$Waw = json_encode($sales, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("sales", "Set", $Waw);
$sar = $text * 1;
$move["bob"]["$chat_id"]["requests"] +=1;
$Waw = json_encode($move, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("move", "Set", $Waw);

bot('sendmessage',['chat_id'=>$chat_id,'text'=>"
*★ بدء عملية رشق جديدة ✅
• لايكات تيكتوك ثابت 👍🏻
ٴ≪━━━━━━ 𝚂𝚁 ━━━━━━≫ٴ
🏷️ - نوع الرشق ◂ رشق لايكات 💓
❄️ - رقم الطلب ◂ $requests1
🔎 - ايدي الطلب ◂ $orderidinsta1
♨️ - العدد ◂ $text
💲 - السعر ◂ $sar نقطة 
⏰ - الوقت ◂ $times $aa
📆 - التاريخ ◂ ".date("Y")."/".date("n")."/".date("d")."
🔗 - الرابط ◂* [$linktin]
*ٴ≪━━━━━━ 𝚂𝚁 ━━━━━━≫ٴ
⚠️┇الرجاء الانتظار من 15 دقيقة الى 12 ساعة ليتم استكمال الطلب.*
",'parse_mode'=>"MarkDown",'disable_web_page_preview'=>true,]);

bot('sendmessage',['chat_id'=>$mmyyy,'text'=>"
*~ عملية رشق جديدة ✅
   لايكات تيكتوك ثابت 👍🏻*

*🏷️┇نوع الرشق : لايكات*
*❄️┇رقم الطلب :* $requests1
*🔎┇ايدي الطلب :* $orderidinsta1
*♨️┇العدد :* $text
*💲┇السعر :* $sar نقطة 
*🔗┇الرابط :* [$linktin]
*━━━━━━━━━━━━━━━━*
",'parse_mode'=>"MarkDown",'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[[['text'=>"الدخول الى البوت 💥",'url'=>"https://telegram.me/$bott?start=635472688"]]],]),]);

bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"
يوجد الان عضو قد طلب $text لايك تيكتوك
معلومات عنه 🧐:
ايديه 🆔 : $from_id
اسمه ✨ : $name

عدد الرشق : $text 👥
الرابط : [$linktin]
رقم طلب : `$orderidinsta1`",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"حظر الشخص 🚫",'callback_data'=>"ban×".$chat_id],['text'=>"معلومات الشخص 🗂",'callback_data'=>"allmalw×".$chat_id]],
],
]),
]);
$sales['tmtlab'] += 1;
$sales[$chat_id]['tmtlab'] += 1;
$Waw = json_encode($sales, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("sales", "Set", $Waw);
unset ($filejson[$from_id]);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- حدث خطأ 🙄

- ارسل /start",
'reply_to_message_id'=>$message_id,
]);
unset ($filejson[$from_id]);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}}
if($data == "ins1" ){
if($Less <= $sales[$from_id]['collect']){
$JJAMAL = $Serins1;
$s = explode(' - ', Search ($JJAMAL));
$in = str_replace('ins1#',null,$data);
bot('editMessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"*
‍🔖️︙يرجى إرسال رابط الحساب الذي تريد زيادة متابعينه
*",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"متابعين انستكرام ثابت 👨‍👩‍👦‍👦",'callback_data'=>"null"],['text'=>"▫️النوع 🎚️",'callback_data'=>"null"]],
[['text'=>"800 نقطة 💵",'callback_data'=>"null"],['text'=>"▫️سعر 1k 💲",'callback_data'=>'null']],
[['text'=>"2% ✨",'callback_data'=>"null"],['text'=>"▫️النزول 📉 ",'callback_data'=>"null"]],
[['text'=>"عالية ومستقره 🥇",'callback_data'=>"null"],['text'=>"▫️الجودة 🎖️",'callback_data'=>'null']],
[['text'=>"الغاء  🚫",'callback_data'=>"made7"]],
],
]),
]);
$filejson[$from_id]['ac'] = "ins1";
$filejson[$from_id]['accc'] = $in;
$filejson[$from_id]['p'] = "ins1";
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
return ;
}else{
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"*
نقاط ك لاتكفي لرشق المشاهدات⚠️

• عليك تجميع نقاط  اكثر من $Less نقطة  لبدء الرشق 🚫
*",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
 [['text'=>"شراء نقاط  💵",'callback_data'=>"buycoins"]],
[['text'=>" تجميع نقاط   💱",'callback_data'=>"murtada"]],
[['text'=>"رجوع  🔙",'callback_data'=>"back1"]],
    ] 
   ])
]);
unset ($filejson[$from_id]);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}}
if (preg_match("/https:\/\/instagram.com\/(.*)/",$text)){
if($filejson[$from_id]['p'] == "ins1" && !is_numeric($text)){
$tJJAMAL = $filejson[$from_id]['ac'];
$JJAMAL = ${"Ser".$tJJAMAL};
$s = explode(' - ', Search ($JJAMAL));
$max = $sales[$from_id]['collect'] / 0.8;
$maxmember = floor($max);
bot('sendmessage',[
'chat_id'=>$chat_id,
'parse_mode'=>"MarkDown",
'text'=>"*
- تم حفظ الرابط بنجاح ✔
• 800 نقطة = 1000 متابع 👨‍👩‍👦‍👦
٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭
- ارسل الان عدد الرشق يجب أن يتراوح العدد بين ".$s[0]." و ".$s[1]."
٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭
• يمكنك رشق $maxmember متابع 👍🏻
*",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
]);
$filejson[$from_id]['num'] = $tJJAMAL;
$filejson[$from_id]['amr'] = "sendnumrrgu";
$filejson[$from_id]['linktin'] = $text;
unset($filejson[$from_id]['ac']);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
return ;
}}
if(is_numeric($text) && $filejson[$from_id]['amr'] == "sendnumrrgu"){
$tJJAMAL = $filejson[$from_id]['num'];
$JJAMAL = ${"Ser".$tJJAMAL};
$s = explode(' - ', Search ($JJAMAL));
if($text <= $s[1] && $s[0] <= $text && $JAMAL->NewPrice ($tJJAMAL,$text,799.5) <= $sales[$from_id]['collect']){
$linktin = $filejson[$from_id]['linktin'];
$orinsta1 = $api->order(array('service' =>$JJAMAL, 'link' =>$linktin, 'quantity' =>$text)); 
$orderidinsta1 = $orinsta1->order;
$records['records'][$from_id][$orderidinsta1]['link'] = $linktin;
$records['tlp'][$orderidinsta1]['link'] = $linktin;
$records['tlp'][$orderidinsta1]['ord'] = $orderidinsta1;
$Waw = json_encode($records, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("records", "Set", $Waw);
$sales[$from_id]['collect'] -= $JAMAL->NewPrice ($tJJAMAL,$text,799.5);
$Waw = json_encode($sales, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("sales", "Set", $Waw);
$sar = $text * 0.8;
$move["bob"]["$chat_id"]["requests"] +=1;
$Waw = json_encode($move, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("move", "Set", $Waw);

bot('sendmessage',['chat_id'=>$chat_id,'text'=>"
*★ بدء عملية رشق جديدة ✅
• رشق متابعين انستكرام ثابت👥
ٴ≪━━━━━━ 𝚂𝚁 ━━━━━━≫ٴ
🏷️ - نوع الرشق ◂ رشق متابعين 🤩
❄️ - رقم الطلب ◂ $requests1
🔎 - ايدي الطلب ◂ $orderidinsta1
♨️ - العدد ◂ $text
💲 - السعر ◂ $sar نقطة 
⏰ - الوقت ◂ $times $aa
📆 - التاريخ ◂ ".date("Y")."/".date("n")."/".date("d")."
🔗 - الرابط ◂* [$linktin]
*ٴ≪━━━━━━ 𝚂𝚁 ━━━━━━≫ٴ
⚠️┇الرجاء الانتظار من 15 دقيقة الى 12 ساعة ليتم استكمال الطلب.*
",'parse_mode'=>"MarkDown",'disable_web_page_preview'=>true,]);

bot('sendmessage',['chat_id'=>$mmyyy,'text'=>"
*~ عملية رشق جديدة ✅
   رشق متابعين انستكرام ثابت👥*

*🏷️┇نوع الرشق : متابعين *
*❄️┇رقم الطلب :* $requests1
*🔎┇ايدي الطلب :* $orderidinsta1
*♨️┇العدد :* $text
*💲┇السعر :* $sar نقطة 
*🔗┇الرابط :* [$linktin]
*━━━━━━━━━━━━━━━━*
",'parse_mode'=>"MarkDown",'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[[['text'=>"الدخول الى البوت 💥",'url'=>"https://telegram.me/$bott?start=635472688"]]],]),]);


bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"
يوجد الان عضو قد طلب $text متابع انستكرام
معلومات عنه 🧐:
ايديه 🆔 : $from_id
اسمه ✨ : $name

عدد الرشق : $text 👥
الرابط : [$linktin]
رقم طلب : `$orderidinsta1`",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"حظر الشخص 🚫",'callback_data'=>"ban×".$chat_id],['text'=>"معلومات الشخص 🗂",'callback_data'=>"allmalw×".$chat_id]],
],
]),
]);
$sales['tmtlab'] += 1;
$sales[$chat_id]['tmtlab'] += 1;
$Waw = json_encode($sales, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("sales", "Set", $Waw);
unset ($filejson[$from_id]);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- حدث خطأ 🙄

- ارسل /start",
'reply_to_message_id'=>$message_id,
]);
unset ($filejson[$from_id]);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}}


if($data == "ins1" ){
if($Less <= $sales[$from_id]['collect']){
$JJAMAL = $Serins1;
$s = explode(' - ', Search ($JJAMAL));
$in = str_replace('ins1#',null,$data);
bot('editMessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"*
‍🔖️︙يرجى إرسال رابط الحساب الذي تريد زيادة متابعينه
*",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"متابعين انستكرام ثابت 👨‍👩‍👦‍👦",'callback_data'=>"null"],['text'=>"▫️النوع 🎚️",'callback_data'=>"null"]],
[['text'=>"800 نقطة 💵",'callback_data'=>"null"],['text'=>"▫️سعر 1k 💲",'callback_data'=>'null']],
[['text'=>"2% ✨",'callback_data'=>"null"],['text'=>"▫️النزول 📉 ",'callback_data'=>"null"]],
[['text'=>"عالية ومستقره 🥇",'callback_data'=>"null"],['text'=>"▫️الجودة 🎖️",'callback_data'=>'null']],
[['text'=>"الغاء  🚫",'callback_data'=>"made7"]],
],
]),
]);
$filejson[$from_id]['ac'] = "ins1";
$filejson[$from_id]['accc'] = $in;
$filejson[$from_id]['p'] = "ins1";
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
return ;
}else{
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"*
نقاط ك لاتكفي لرشق المشاهدات⚠️

• عليك تجميع نقاط  اكثر من $Less نقطة  لبدء الرشق 🚫
*",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
 [['text'=>"شراء نقاط  💵",'callback_data'=>"buycoins"]],
[['text'=>" تجميع نقاط   💱",'callback_data'=>"murtada"]],
[['text'=>"رجوع  🔙",'callback_data'=>"back1"]],
    ] 
   ])
]);
unset ($filejson[$from_id]);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}}
if (preg_match("/https:\/\/instagram.com\/(.*)/",$text)){
if($filejson[$from_id]['p'] == "ins1" && !is_numeric($text)){
$tJJAMAL = $filejson[$from_id]['ac'];
$JJAMAL = ${"Ser".$tJJAMAL};
$s = explode(' - ', Search ($JJAMAL));
$max = $sales[$from_id]['collect'] / 0.8;
$maxmember = floor($max);
bot('sendmessage',[
'chat_id'=>$chat_id,
'parse_mode'=>"MarkDown",
'text'=>"*
- تم حفظ الرابط بنجاح ✔
• 800 نقطة = 1000 متابع 👨‍👩‍👦‍👦
٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭
- ارسل الان عدد الرشق يجب أن يتراوح العدد بين ".$s[0]." و ".$s[1]."
٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭
• يمكنك رشق $maxmember متابع 👍🏻
*",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
]);
$filejson[$from_id]['num'] = $tJJAMAL;
$filejson[$from_id]['amr'] = "sendnumrrgu";
$filejson[$from_id]['linktin'] = $text;
unset($filejson[$from_id]['ac']);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
return ;
}}
if(is_numeric($text) && $filejson[$from_id]['amr'] == "sendnumrrgu"){
$tJJAMAL = $filejson[$from_id]['num'];
$JJAMAL = ${"Ser".$tJJAMAL};
$s = explode(' - ', Search ($JJAMAL));
if($text <= $s[1] && $s[0] <= $text && $JAMAL->NewPrice ($tJJAMAL,$text,799.5) <= $sales[$from_id]['collect']){
$linktin = $filejson[$from_id]['linktin'];
$orinsta1 = $api->order(array('service' =>$JJAMAL, 'link' =>$linktin, 'quantity' =>$text)); 
$orderidinsta1 = $orinsta1->order;
$records['records'][$from_id][$orderidinsta1]['link'] = $linktin;
$records['tlp'][$orderidinsta1]['link'] = $linktin;
$records['tlp'][$orderidinsta1]['ord'] = $orderidinsta1;
$Waw = json_encode($records, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("records", "Set", $Waw);
$sales[$from_id]['collect'] -= $JAMAL->NewPrice ($tJJAMAL,$text,799.5);
$Waw = json_encode($sales, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("sales", "Set", $Waw);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
*- بدء رشق $text متابع انستكرام

- الرابط :* [$linktin]
*- ايدي الطلب :* $orderidinsta1 🌹
*٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭
- الرجاء الانتظار من 15 دقيقه إلى 8 ساعات ليتم استكمال الطلب 💙*
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
]);
$move["bob"]["$chat_id"]["requests"] +=1;
$Waw = json_encode($move, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("move", "Set", $Waw);

$sar = $text * 0.8;
bot('sendmessage',['chat_id'=>$mmyyy,'text'=>"
*~ عملية رشق جديدة ✅
   رشق متابعين انستكرام ثابت👥*

*🏷️┇نوع الرشق : متابعين *
*❄️┇رقم الطلب :* $requests1
*🔎┇ايدي الطلب :* $orderidinsta1
*♨️┇العدد :* $text
*💲┇السعر :* $sar نقطة 
*🔗┇الرابط :* [$linktin]
*━━━━━━━━━━━━━━━━*
",'parse_mode'=>"MarkDown",'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[[['text'=>"الدخول الى البوت 💥",'url'=>"https://telegram.me/$bott?start=635472688"]]],]),]);


bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"
يوجد الان عضو قد طلب $text متابع انستكرام
معلومات عنه 🧐:
ايديه 🆔 : $from_id
اسمه ✨ : $name

عدد الرشق : $text 👥
الرابط : [$linktin]
رقم طلب : `$orderidinsta1`",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"حظر الشخص 🚫",'callback_data'=>"ban×".$chat_id],['text'=>"معلومات الشخص 🗂",'callback_data'=>"allmalw×".$chat_id]],
],
]),
]);
$sales['tmtlab'] += 1;
$sales[$chat_id]['tmtlab'] += 1;
$Waw = json_encode($sales, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("sales", "Set", $Waw);
unset ($filejson[$from_id]);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- حدث خطأ 🙄

- ارسل /start",
'reply_to_message_id'=>$message_id,
]);
unset ($filejson[$from_id]);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}}

if($data == 'ins2'){
$my = $sales['tmtlab'];
bot('answercallbackquery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>"
تحت الصيانة || ستفتح قريبا
",
'show_alert'=>true
]);
}

if($data == "mmmmmmm" ){
if($Less <= $sales[$from_id]['collect']){
$JJAMAL = $Serins2;
$s = explode(' - ', Search ($JJAMAL));
$in = str_replace('ins2#',null,$data);
bot('editMessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"*
‍⚜️️︙يرجى إرسال رابط الستوري الذي تريد زيادة المشاهدات له 😴
*",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"‍مشاهدات ستوري انستكرام 👁️‍🗨️",'callback_data'=>"null"],['text'=>"▫️النوع 🎚️",'callback_data'=>"null"]],
[['text'=>"200 نقطة 💵",'callback_data'=>"null"],['text'=>"▫️سعر 1k 💲",'callback_data'=>'null']],
[['text'=>"0% ✨",'callback_data'=>"null"],['text'=>"▫️النزول 📉 ",'callback_data'=>"null"]],
[['text'=>"عالية ومستقره 🥇",'callback_data'=>"null"],['text'=>"▫️الجودة 🎖️",'callback_data'=>'null']],
[['text'=>"الغاء  🚫",'callback_data'=>"made7"]],
],
]),
]);
$filejson[$from_id]['ac'] = "ins2";
$filejson[$from_id]['accc'] = $in;
$filejson[$from_id]['p'] = "ins2";
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
return ;
}else{
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"*
نقاط ك لاتكفي لرشق المشاهدات⚠️

• عليك تجميع نقاط  اكثر من $Less نقطة  لبدء الرشق 🚫
*",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
 [['text'=>"شراء نقاط  💵",'callback_data'=>"buycoins"]],
[['text'=>" تجميع نقاط   💱",'callback_data'=>"murtada"]],
[['text'=>"رجوع  🔙",'callback_data'=>"back1"]],
    ] 
   ])
]);
unset ($filejson[$from_id]);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}}
if (preg_match("/https:\/\/instagram.com\/(.*)/",$text)){
if($filejson[$from_id]['p'] == "ins2" && !is_numeric($text)){
$tJJAMAL = $filejson[$from_id]['ac'];
$JJAMAL = ${"Ser".$tJJAMAL};
$s = explode(' - ', Search ($JJAMAL));
$max = $sales[$from_id]['collect'] / 0.2;
$maxmember = floor($max);
bot('sendmessage',[
'chat_id'=>$chat_id,
'parse_mode'=>"MarkDown",
'text'=>"*
- تم حفظ الرابط بنجاح ✔
• 200 نقطة = 1000 مشاهدة ستوري
٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭
- ارسل الان عدد الرشق يجب أن يتراوح العدد بين ".$s[0]." و ".$s[1]."
٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭
• يمكنك رشق $maxmember لايك 👍🏻
*",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
]);
$filejson[$from_id]['num'] = $tJJAMAL;
$filejson[$from_id]['amr'] = "sendnumrrgw";
$filejson[$from_id]['linktin'] = $text;
unset($filejson[$from_id]['ac']);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
return ;
}}
if(is_numeric($text) && $filejson[$from_id]['amr'] == "sendnumrrgw"){
$tJJAMAL = $filejson[$from_id]['num'];
$JJAMAL = ${"Ser".$tJJAMAL};
$s = explode(' - ', Search ($JJAMAL));
if($text <= $s[1] && $s[0] <= $text && $JAMAL->NewPrice ($tJJAMAL,$text,199.92) <= $sales[$from_id]['collect']){
$linktin = $filejson[$from_id]['linktin'];
$orinsta1 = $api->order(array('service' =>$JJAMAL, 'link' =>$linktin, 'quantity' =>$text)); 
$orderidinsta1 = $orinsta1->order;
$records['records'][$from_id][$orderidinsta1]['link'] = $linktin;
$records['tlp'][$orderidinsta1]['link'] = $linktin;
$records['tlp'][$orderidinsta1]['ord'] = $orderidinsta1;
$Waw = json_encode($records, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("records", "Set", $Waw);
$sales[$from_id]['collect'] -= $JAMAL->NewPrice ($tJJAMAL,$text,199.92);
$Waw = json_encode($sales, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("sales", "Set", $Waw);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
*- بدء رشق $text مشاهدة ستوري

- الرابط :* [$linktin]
*- ايدي الطلب :* $orderidinsta1 🌹
*٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭
- الرجاء الانتظار من 15 دقيقه إلى 8 ساعات ليتم استكمال الطلب 💙*
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
]);
$move["bob"]["$chat_id"]["requests"] +=1;
$Waw = json_encode($move, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("move", "Set", $Waw);

$sar = $text * 0.2;
bot('sendmessage',['chat_id'=>$mmyyy,'text'=>"
*~ عملية رشق جديدة ✅
   رشق مشاهدات ستوري انستكرام 👁️‍🗨️*

*🏷️┇نوع الرشق : مشاهدات *
*❄️┇رقم الطلب :* $requests1
*🔎┇ايدي الطلب :* $orderidinsta1
*♨️┇العدد :* $text
*💲┇السعر :* $sar نقطة 
*🔗┇الرابط :* [$linktin]
*━━━━━━━━━━━━━━━━*
",'parse_mode'=>"MarkDown",'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[[['text'=>"الدخول الى البوت 💥",'url'=>"https://telegram.me/$bott?start=635472688"]]],]),]);

bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"
يوجد الان عضو قد طلب $text مشاهدات ستوري
معلومات عنه 🧐:
ايديه 🆔 : $from_id
اسمه ✨ : $name

عدد الرشق : $text 👥
الرابط : [$linktin]
رقم طلب : `$orderidinsta1`",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"حظر الشخص 🚫",'callback_data'=>"ban×".$chat_id],['text'=>"معلومات الشخص 🗂",'callback_data'=>"allmalw×".$chat_id]],
],
]),
]);
$sales['tmtlab'] += 1;
$sales[$chat_id]['tmtlab'] += 1;
$Waw = json_encode($sales, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("sales", "Set", $Waw);
unset ($filejson[$from_id]);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- حدث خطأ 🙄

- ارسل /start",
'reply_to_message_id'=>$message_id,
]);
unset ($filejson[$from_id]);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}}
if($data == "ins3" ){
if($Less <= $sales[$from_id]['collect']){
$JJAMAL = $Serins3;
$s = explode(' - ', Search ($JJAMAL));
$in = str_replace('ins3#',null,$data);
bot('editMessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"*
‍📈️︙يرجى إرسال رابط المنشور الذي تريد زيادة الايكات له.
*",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"‍لايكات انستكرام حقيقي 💝",'callback_data'=>"null"],['text'=>"▫️النوع 🎚️",'callback_data'=>"null"]],
[['text'=>"200 نقطة 💵",'callback_data'=>"null"],['text'=>"▫️سعر 1k 💲",'callback_data'=>'null']],
[['text'=>"0% ✨",'callback_data'=>"null"],['text'=>"▫️النزول 📉 ",'callback_data'=>"null"]],
[['text'=>"حقيقي وسريع🥇",'callback_data'=>"null"],['text'=>"▫️الجودة 🎖️",'callback_data'=>'null']],
[['text'=>"الغاء  🚫",'callback_data'=>"made7"]],
],
]),
]);
$filejson[$from_id]['ac'] = "ins3";
$filejson[$from_id]['accc'] = $in;
$filejson[$from_id]['p'] = "ins3";
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
return ;
}else{
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"*
نقاط ك لاتكفي لرشق المشاهدات⚠️

• عليك تجميع نقاط  اكثر من $Less نقطة  لبدء الرشق 🚫
*",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
 [['text'=>"شراء نقاط  💵",'callback_data'=>"buycoins"]],
[['text'=>" تجميع نقاط   💱",'callback_data'=>"murtada"]],
[['text'=>"رجوع  🔙",'callback_data'=>"back1"]],
    ] 
   ])
]);
unset ($filejson[$from_id]);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}}
if (preg_match("/https:\/\/www.instagram.com\/(.*)/",$text)){
if($filejson[$from_id]['p'] == "ins3" && !is_numeric($text)){
$tJJAMAL = $filejson[$from_id]['ac'];
$JJAMAL = ${"Ser".$tJJAMAL};
$s = explode(' - ', Search ($JJAMAL));
$max = $sales[$from_id]['collect'] / 0.2;
$maxmember = floor($max);
bot('sendmessage',[
'chat_id'=>$chat_id,
'parse_mode'=>"MarkDown",
'text'=>"*
- تم حفظ الرابط بنجاح ✔
• 200 نقطة = 1000 لايك انستكرام
٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭
- ارسل الان عدد الرشق يجب أن يتراوح العدد بين ".$s[0]." و ".$s[1]."
٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭
• يمكنك رشق $maxmember لايك 👍🏻
*",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
]);
$filejson[$from_id]['num'] = $tJJAMAL;
$filejson[$from_id]['amr'] = "sendnumrrgk";
$filejson[$from_id]['linktin'] = $text;
unset($filejson[$from_id]['ac']);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
return ;
}}
if(is_numeric($text) && $filejson[$from_id]['amr'] == "sendnumrrgk"){
$tJJAMAL = $filejson[$from_id]['num'];
$JJAMAL = ${"Ser".$tJJAMAL};
$s = explode(' - ', Search ($JJAMAL));
if($text <= $s[1] && $s[0] <= $text && $JAMAL->NewPrice ($tJJAMAL,$text,199.93) <= $sales[$from_id]['collect']){
$linktin = $filejson[$from_id]['linktin'];
$orinsta1 = $api->order(array('service' =>$JJAMAL, 'link' =>$linktin, 'quantity' =>$text)); 
$orderidinsta1 = $orinsta1->order;
$records['records'][$from_id][$orderidinsta1]['link'] = $linktin;
$records['tlp'][$orderidinsta1]['link'] = $linktin;
$records['tlp'][$orderidinsta1]['ord'] = $orderidinsta1;
$Waw = json_encode($records, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("records", "Set", $Waw);
$sales[$from_id]['collect'] -= $JAMAL->NewPrice ($tJJAMAL,$text,199.93);
$Waw = json_encode($sales, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("sales", "Set", $Waw);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
*- بدء رشق $text لايك انستكرام

- الرابط :* [$linktin]
*- ايدي الطلب :* $orderidinsta1 🌹
*٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭
- الرجاء الانتظار من 15 دقيقه إلى 8 ساعات ليتم استكمال الطلب 💙*
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
]);
$move["bob"]["$chat_id"]["requests"] +=1;
$Waw = json_encode($move, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("move", "Set", $Waw);

$sar = $text * 0.2;
bot('sendmessage',['chat_id'=>$mmyyy,'text'=>"
*~ عملية رشق جديدة ✅
   رشق لايكات انستكرام صاروخ💝

*🏷️┇نوع الرشق : لايكات*
*❄️┇رقم الطلب :* $requests1
*🔎┇ايدي الطلب :* $orderidinsta1
*♨️┇العدد :* $text
*💲┇السعر :* $sar نقطة 
*🔗┇الرابط :* [$linktin]
*━━━━━━━━━━━━━━━━*
",'parse_mode'=>"MarkDown",'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[[['text'=>"الدخول الى البوت 💥",'url'=>"https://telegram.me/$bott?start=635472688"]]],]),]);

bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"
يوجد الان عضو قد طلب $text لايك انستكرام
معلومات عنه 🧐:
ايديه 🆔 : $from_id
اسمه ✨ : $name

عدد الرشق : $text 👥
الرابط : [$linktin]
رقم طلب : `$orderidinsta1`",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"حظر الشخص 🚫",'callback_data'=>"ban×".$chat_id],['text'=>"معلومات الشخص 🗂",'callback_data'=>"allmalw×".$chat_id]],
],
]),
]);
$sales['tmtlab'] += 1;
$sales[$chat_id]['tmtlab'] += 1;
$Waw = json_encode($sales, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("sales", "Set", $Waw);
unset ($filejson[$from_id]);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- حدث خطأ 🙄

- ارسل /start",
'reply_to_message_id'=>$message_id,
]);
unset ($filejson[$from_id]);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}}
if($data == "ins4" ){
if($Less <= $sales[$from_id]['collect']){
$JJAMAL = $Serins4;
$s = explode(' - ', Search ($JJAMAL));
$in = str_replace('ins4#',null,$data);
bot('editMessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"*
‍⛓️️︙يرجى إرسال رابط مقطع الريلز لزيادة المشاهدات له 
*",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"‍مشاهدات ريلز سريع 💥",'callback_data'=>"null"],['text'=>"▫️النوع 🎚️",'callback_data'=>"null"]],
[['text'=>"100 نقطة 💵",'callback_data'=>"null"],['text'=>"▫️سعر 1k 💲",'callback_data'=>'null']],
[['text'=>"0% ✨",'callback_data'=>"null"],['text'=>"▫️النزول 📉 ",'callback_data'=>"null"]],
[['text'=>"ممتازة🥇",'callback_data'=>"null"],['text'=>"▫️الجودة 🎖️",'callback_data'=>'null']],
[['text'=>"الغاء  🚫",'callback_data'=>"made7"]],
],
]),
]);
$filejson[$from_id]['ac'] = "ins4";
$filejson[$from_id]['accc'] = $in;
$filejson[$from_id]['p'] = "ins4";
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
return ;
}else{
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"*
نقاط ك لاتكفي لرشق المشاهدات⚠️

• عليك تجميع نقاط  اكثر من $Less نقطة  لبدء الرشق 🚫
*",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
 [['text'=>"شراء نقاط  💵",'callback_data'=>"buycoins"]],
[['text'=>" تجميع نقاط   💱",'callback_data'=>"murtada"]],
[['text'=>"رجوع  🔙",'callback_data'=>"back1"]],
    ] 
   ])
]);
unset ($filejson[$from_id]);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}}
if (preg_match("/https:\/\/www.instagram.com\/(.*)/",$text)){
if($filejson[$from_id]['p'] == "ins4" && !is_numeric($text)){
$tJJAMAL = $filejson[$from_id]['ac'];
$JJAMAL = ${"Ser".$tJJAMAL};
$s = explode(' - ', Search ($JJAMAL));
$max = $sales[$from_id]['collect'] / 0.1;
$maxmember = floor($max);
bot('sendmessage',[
'chat_id'=>$chat_id,
'parse_mode'=>"MarkDown",
'text'=>"*
- تم حفظ الرابط بنجاح ✔
• 100 نقطة = 1000 مشاهدة ريلز انستكرام
٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭
- ارسل الان عدد الرشق يجب أن يتراوح العدد بين ".$s[0]." و ".$s[1]."
٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭
• يمكنك رشق $maxmember لايك 👍🏻
*",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
]);
$filejson[$from_id]['num'] = $tJJAMAL;
$filejson[$from_id]['amr'] = "sendnumrrjj";
$filejson[$from_id]['linktin'] = $text;
unset($filejson[$from_id]['ac']);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
return ;
}}
if(is_numeric($text) && $filejson[$from_id]['amr'] == "sendnumrrjj"){
$tJJAMAL = $filejson[$from_id]['num'];
$JJAMAL = ${"Ser".$tJJAMAL};
$s = explode(' - ', Search ($JJAMAL));
if($text <= $s[1] && $s[0] <= $text && $JAMAL->NewPrice ($tJJAMAL,$text,99.98) <= $sales[$from_id]['collect']){
$linktin = $filejson[$from_id]['linktin'];
$orinsta1 = $api->order(array('service' =>$JJAMAL, 'link' =>$linktin, 'quantity' =>$text)); 
$orderidinsta1 = $orinsta1->order;
$records['records'][$from_id][$orderidinsta1]['link'] = $linktin;
$records['tlp'][$orderidinsta1]['link'] = $linktin;
$records['tlp'][$orderidinsta1]['ord'] = $orderidinsta1;
$Waw = json_encode($records, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("records", "Set", $Waw);
$sales[$from_id]['collect'] -= $JAMAL->NewPrice ($tJJAMAL,$text,99.98);
$Waw = json_encode($sales, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("sales", "Set", $Waw);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
*- بدء رشق $text مشاهدات ريلز انستكرام

- الرابط :* [$linktin]
*- ايدي الطلب :* $orderidinsta1 🌹
*٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭٭
- الرجاء الانتظار من 15 دقيقه إلى 8 ساعات ليتم استكمال الطلب 💙*
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
]);
$move["bob"]["$chat_id"]["requests"] +=1;
$Waw = json_encode($move, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("move", "Set", $Waw);

$sar = $text * 0.1;
bot('sendmessage',['chat_id'=>$mmyyy,'text'=>"
*~ عملية رشق جديدة ✅
   رشق مشاهدات ريلز انستكرام 👀*

*🏷️┇نوع الرشق : مشاهدات*
*❄️┇رقم الطلب :* $requests1
*🔎┇ايدي الطلب :* $orderidinsta1
*♨️┇العدد :* $text
*💲┇السعر :* $sar نقطة 
*🔗┇الرابط :* [$linktin]
*━━━━━━━━━━━━━━━━*
",'parse_mode'=>"MarkDown",'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[[['text'=>"الدخول الى البوت 💥",'url'=>"https://telegram.me/$bott?start=635472688"]]],]),]);

bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"
يوجد الان عضو قد طلب $text مشاهدات ريلز انستكرام
معلومات عنه 🧐:
ايديه 🆔 : $from_id
اسمه ✨ : $name

عدد الرشق : $text 👥
الرابط : [$linktin]
رقم طلب : `$orderidinsta1`",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"حظر الشخص 🚫",'callback_data'=>"ban×".$chat_id],['text'=>"معلومات الشخص 🗂",'callback_data'=>"allmalw×".$chat_id]],
],
]),
]);
$sales['tmtlab'] += 1;
$sales[$chat_id]['tmtlab'] += 1;
$Waw = json_encode($sales, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("sales", "Set", $Waw);
unset ($filejson[$from_id]);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- حدث خطأ 🙄

- ارسل /start",
'reply_to_message_id'=>$message_id,
]);
unset ($filejson[$from_id]);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}}



if($data == "order"){
bot('editMessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"*- حسناً قم بإرسال ايدي اي طلب*",
'parse_mode'=>"MarkDown",
]);
$filejson[$from_id]['amr'] ="sendrecord";
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
}
if(is_numeric($text) && $filejson[$from_id]['amr'] == "sendrecord"){
if(isset($records['records'][$from_id][$text]['link'])){
$orstatus = $api->status ($text);
$li = $records['records'][$from_id][$text]['link'];
$st = str_ireplace(['Canceled','Processing','Completed','Pending','Partial','In Processing','In progress'],['ملغي','المعالجة','مكتمل','قيد الانتظار','مكتمل جزيئاً','جاري المعالجة','التنفيذ'],$orstatus->status);
$k = $orstatus->remains;
$uu = $orstatus-> start_count;
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"معلومات ايدي الطلب : `$text`

الرابط : $li 🔱

حالة الطلب : *$st* 🔰

عند البدء : *$uu* 👀

العدد المتبقي : *$k* 🚶‍♂️
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
]);
unset($filejson[$from_id]['amr']);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
return ;
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'parse_mode'=>"MarkDown",
'text'=>"*ايدي طلب خاطئ ❌*",
]);
unset($filejson[$from_id]['amr']);
$Waw = json_encode($filejson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$Waw = mysqli_real_escape_string($db, $Waw);
mys("file", "Set", $Waw);
return ;
}}

$ex1 = explode('×',$data);
if($ex1[0] == "ban"){
bot('EditmessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"*تم حظر الشخص بنجاح ✔*",
'parse_mode'=>"MarkDown",
]);
$stinggja['stinggja']['band'][] = $ex1[1];
file_put_contents("stinggja.json",json_encode($stinggja));
}
if($ex1[0] == "allmalw"){
bot('EditmessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"*اليك الان معلومات الشخص 📨
عدد طلباته المكمله :* ".$sales[$ex1[1]]['tmtlab']."
*---------------------------------------------------------*
[الدخول الى حسابه 🍃](tg://user?id=$ex1[1])",
'parse_mode'=>"MarkDown",
]);
}

$chat_id6 = $update->inline_query->from->id;
bot('answerInlineQuery',[
        'inline_query_id'=>$update->inline_query->id,    
        'results' => json_encode([[
            'type'=>'article',
            'id'=>base64_encode(rand(5,555)),
            'title'=>'مشارك رابط الدعوة مع اصدقائك',
            'input_message_content'=>['parse_mode'=>'MarkDown','message_text'=>"*✅ البوت الاول لزيادة متابعين + مشاهدات + لايكات + مشاركات تيليجرام - انستقرام - يوتيوب - فيسبوك - تيك توك - تويتر تلقائياً مجاناً. ♻️👇.
*"],
'parse_mode'=>"MARKDOWN",
'disable_web_page_preview' =>true,
'reply_to_message_id'=>$message->message_id, 
            'reply_markup'=>['inline_keyboard'=>[
                [['text'=>" 💥 اضغط هنا للدخول للبوت 🔥 👥 ",'url'=>"https://telegram.me/$bott?start=$chat_id6"]], 
             ]]
        ]])
    ]);