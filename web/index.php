<?php 
require_once '../vendor/autoload.php';
use Google\Cloud\Language\LanguageClient;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateMessageBuilder;
use LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder;
define("_data_maxsize", 10);
//$test=constant("_Carouse_MAXSIZE");


	if (file_exists(__DIR__.'/.env')){
		$dotenv = new Dotenv\Dotenv(__DIR__);	
		$dotenv->load();
	}
  
 	$bot = new LINE\LINEBot(
  		new LINE\LINEBot\HTTPClient\CurlHTTPClient(getenv('curlHTTPClient')),
  		['channelSecret' => getenv('channelSecret')]
	);
 
	$signature = $_SERVER["HTTP_".\LINE\LINEBot\Constant\HTTPHeader::LINE_SIGNATURE];
	$body = file_get_contents("php://input");
//	$redis= new App\event\RedisHandler;				//create RedisHandler object

	//error_log("Signature: ".$signature);

    $events = $bot->parseEventRequest($body, $signature);
	
    foreach ($events as $event){
	
		$reply_token = $event->getReplyToken();

		//follow event 
        if ($event instanceof \LINE\LINEBot\Event\FollowEvent) { 

			include('event/follow_event/bot_follow_event.php');

		}
		
		//follow event 
        if ($event instanceof \LINE\LINEBot\Event\UnfollowEvent) { 
			include('event/follow_event/bot_unfollow_event.php');
		}

		
		//join group event
        if ($event instanceof \LINE\LINEBot\Event\JoinEvent) { 
			include('event/join_event/bot_join_event.php');			
         }
 
		//text event 
        if ($event instanceof \LINE\LINEBot\Event\MessageEvent\TextMessage) {
			$getText = $event->getText();
			$array = [
 
				"關於我們" => "bot_about_as",
				"菜單" => "bot_fullmenu",
				"找菜" => "bot_imagemap" ,
				preg_match ("/\找菜：/i", $getText) == 1 ? $getText : "" => "bot_category",
				preg_match ("/\找酒：/i", $getText) == 1 ? $getText : "" => "bot_category"				
			];			

			if(isset($array[$getText])){
			include('event/message_event/'.$array[$getText].'.php');
			}
			// else{ 
			//    $result= find_synonym(urlencode($getText));
			//    if($result!=='bot_imagemap')
			// 	include('event/message_event/no_event.php');
			//    else{
			// 	include('event/message_event/bot_imagemap.php');  
			//    }
			// } 

			$MultiMessageBuilder = new LINE\LINEBot\MessageBuilder\MultiMessageBuilder();
			//$results =json_decode( file_get_contents('https://spreadsheets.google.com/feeds/list/1ZLpkq1oidCON-9cuBA1x-J-vS_G2R4VA2JZo4bMq2_I/1/public/values?alt=json'));
			$results =json_decode( file_get_contents('https://spreadsheets.google.com/feeds/list/1ZLpkq1oidCON-9cuBA1x-J-vS_G2R4VA2JZo4bMq2_I/'.$getText.'/public/values?alt=json'));
	

			$reminder = count($results->feed->entry) % constant("_data_maxsize");
			$quotient = (count($results->feed->entry) - $reminder) /  constant("_data_maxsize");
			$quotient =	$reminder===0?$quotient:$quotient+1;



			foreach($results->feed->entry as $key =>$entry){
				if($key <constant("_data_maxsize") ){  //avoid data more than than 10; 
					$actions =array( new MessageTemplateActionBuilder('按'.emoji('1F44D').'分享!'," "));
					$baseUrl='https://'. $_SERVER['HTTP_HOST'].getenv('image_path').$entry->{'gsx$pictureurl'}->{'$t'}.'?_ignore=';
					$hotsale=$entry->{'gsx$hotsale'}->{'$t'}==='B'?emoji('1F44D'):'';
					$column = new CarouselColumnTemplateBuilder($hotsale.$entry->{'gsx$name'}->{'$t'},$entry->{'gsx$price'}->{'$t'},$baseUrl,$actions);
					$columns[] = $column;
				}
			}
			$carousel = new CarouselTemplateBuilder($columns);
			$msg = new TemplateMessageBuilder(emoji('1F50D')."這訊息要在手機上才能看唷", $carousel);
			$MultiMessageBuilder->add($msg);

			if($quotient===1){
				$actions = array(
					new PostbackTemplateActionBuilder("回列表", "map_key=Y"),
					new PostbackTemplateActionBuilder(" ", " ")
				);
			}else{
				$actions = array(
					new PostbackTemplateActionBuilder("回列表", "map_key=Y"),
					new PostbackTemplateActionBuilder("顯示更多", "map_key=".$getText.'#'.$quotient)
				);
			}

			$button = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ConfirmTemplateBuilder(emoji('1F4CC')." 是否顯示更多？", $actions);
			$msg2 = new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder(emoji('1F50D')."這訊息要在手機上才能看唷", $button);
			$MultiMessageBuilder->add($msg2);

			//$textMessage = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($getText);
			$bot->replyMessage($reply_token, $MultiMessageBuilder);
        }

		//location event 		
		if ($event instanceof \LINE\LINEBot\Event\MessageEvent\LocationMessage) {
			include('event/location_event/bot_location_event.php');
		}
		
		if ($event instanceof \LINE\LINEBot\Event\PostbackEvent) {
			include('event/postback_event/bot_postback_event.php');			
		}
		
		if ($event instanceof \LINE\LINEBot\Event\MessageEvent\ImageMessage) {
			$contentId = $event->getMessageId();
			$audio = $bot->getMessageContent($contentId)->getRawBody();
		}

	 if ($event instanceof \LINE\LINEBot\Event\MessageEvent\AudioMessage) {
			
			 
		} 	
    }

	//emoji unicode
	function emoji($ID){
 		$bin = hex2bin(str_repeat('0', 8 - strlen($ID)) . $ID);
		$emoticon =  mb_convert_encoding($bin, 'UTF-8', 'UTF-32BE');
		return $emoticon;
	}
	//Dialogflow find synonym
	function find_synonym($getText){
		$ch = curl_init();
		// set url
		curl_setopt($ch, CURLOPT_URL, "https://api.dialogflow.com/v1/query?v=20170712&query='.$getText.'&lang=en&sessionId=" .trim(getenv('sessionID')));
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Bearer '.trim(getenv('CLIENT_ACCESS_TOKEN'))));
		//return the transfer as a string
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// $output contains the output string
		$output = curl_exec($ch);
		// close curl resource to free up system resources
		curl_close($ch);
	  return  json_decode($output)->result->fulfillment->speech;
   }
 ?>