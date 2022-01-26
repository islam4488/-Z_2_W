<?php
ob_start();
$token = "5281567210:AAFD5nvxq0QO_FIeJA7yl99khtrWOdWvUaM";
define("API_KEY",$token);
echo file_get_contents("https://api.telegram.org/bot" . API_KEY . "https://azef-bott.herokuapp.com/" . $_SERVER['SERVER_NAME'] . "" . $_SERVER['SCRIPT_NAME']);
function bot($method,$datas=[]){
$Z_2_W = http_build_query($datas);
$url = "https://api.telegram.org/bot".API_KEY."/".$method."?$Z_2_W";
$Z_2_W = file_get_contents($url);
return json_decode($Z_2_W);
}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$text = $message->text;
$chat_id2 = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$data = $update->callback_query->data;
$name = $up->from->first_name;
$update = json_decode(file_get_contents("php://input"));
$message = $update->message;
$txt = $message->caption;
$text = $message->text;
$sus ="1";
$chat_id = $message->chat->id;
$tiktatuss= file_get_contents("$chat_id.txt");
$tiktaats= file_get_contents("UserisUser$chat_id.txt");
$from_id = $message->from->id;
$new = $message->new_chat_members;
$message_id = $message->message_id;
$type = $message->chat->type;
$name = $message->from->first_name;
if(isset($update->callback_query)){

$up = $update->callback_query;
$chat_id = $up->message->chat->id;
$from_id = $up->from->id;
$user = $up->from->username;
$name = $up->from->first_name;
$message_id = $up->message->message_id;
$data = $up->data;
}

$api = 'https://www.tikwm.com/api/';
$tikUrl = $text;
$postData = [
    'url' => $tikUrl,
    'hd' => $sus
];

$response = curl_request($api . '?' . http_build_query($postData));
$obj = json_decode($response);
$tik = $obj->data->play;
$tik2 = $obj->data->music;
$tik3 = $obj->data->id;
$tik4 = $obj->data->title;
$tik5 = $obj->data->origin_cover;
$tik6 = $obj->data->play_count;
$tik7 = $obj->data->comment_count;
$tik8 = $obj->data->share_count;
$tik9 = $obj->data->download_count;
$tik10 = $obj->data->digg_count;

function curl_request($url, $postData = [])
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, false);
    //curl_setopt($curl, CURLOPT_POST, true);
    //curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($curl, CURLOPT_TIMEOUT, 10);
    curl_setopt($curl, CURLOPT_ACCEPTTIMEOUT_MS, 10000);
    curl_setopt($curl, CURLOPT_ENCODING, 'gzip');

    $response = curl_exec($curl);
    return $response;
}
if($text == '/start'){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
• اهلا بك [$name](tg://user?id=$chat_id)
• بوت تحميل من التيك توك . 
• لتحميل فديو وصور ارسل رابط المنشور .
• التحميل بدون علامة مائية او اي حقوق اخرى.
",
'disable_web_page_preview'=>true,
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text' => 'Team Bero', 'url' => 'https://t.me/HackerV7X ']],
]
])
]);
}
$yuser = bot('getme',['bot'])->result->username;
if($text){
    bot('sendvideo',[
        'chat_id'=>$chat_id,
         'video'=>$tik,
         'caption'=>" *Done Download Vidio By* ( [@$yuser] )

✮ *وصف الفيديو : * `$tik4`
",
         'disable_web_page_preview'=>true,
         'parse_mode'=>"markdown",
         'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>": الاعجابات",'callback_data'=>"null"],['text'=>" ( $tik10 )",'callback_data'=>"null"]],
[['text'=>": المشاهدات ",'callback_data'=>"null"],['text'=>"( $tik6 )",'callback_data'=>"null"]],
[['text'=>": المشاركات",'callback_data'=>"null"],['text'=>"( $tik8 )",'callback_data'=>"null"]],
[['text'=>": التحميلات",'callback_data'=>"null"],['text'=>"( $tik9 )",'callback_data'=>"null"]],
[['text'=>": عدد التعليقات",'callback_data'=>"null"],['text'=>"( $tik7 )",'callback_data'=>"null"]],
[['text' => 'Channel', 'url' => 'https://t.me/HackerV7X ']],
],
])
]);
}