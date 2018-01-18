<?php

    $list =json_decode( file_get_contents('https://spreadsheets.google.com/feeds/list/1ZLpkq1oidCON-9cuBA1x-J-vS_G2R4VA2JZo4bMq2_I/1/public/values?alt=json'));
   // $codemap=array();

    foreach($results->feed->entry as $key =>$entry){
		//$codemap=;
	}

    // $MultiMessageBuilder = new LINE\LINEBot\MessageBuilder\MultiMessageBuilder();
	
	// $results =json_decode( file_get_contents('https://spreadsheets.google.com/feeds/list/1ZLpkq1oidCON-9cuBA1x-J-vS_G2R4VA2JZo4bMq2_I/'.$getText.'/public/values?alt=json'));
	

	// $reminder = count($results->feed->entry) % constant("_data_maxsize");
	// $quotient = (count($results->feed->entry) - $reminder) /  constant("_data_maxsize");
	// $quotient =	$reminder===0?$quotient:$quotient+1;

	// foreach($results->feed->entry as $key =>$entry){
	// 	if($key <constant("_data_maxsize") ){  //avoid data more than than 10; 
	// 		$actions =array( new MessageTemplateActionBuilder('按'.emoji('1F44D').'分享!'," "));
	// 		$baseUrl='https://'. $_SERVER['HTTP_HOST'].getenv('image_path').$entry->{'gsx$pictureurl'}->{'$t'}.'?_ignore=';
	// 		$hotsale=$entry->{'gsx$hotsale'}->{'$t'}==='B'?emoji('1F44D'):'';
	// 		$column = new CarouselColumnTemplateBuilder($hotsale.$entry->{'gsx$name'}->{'$t'},$entry->{'gsx$price'}->{'$t'},$baseUrl,$actions);
	// 		$columns[] = $column;
	// 	}
	// }
	// $carousel = new CarouselTemplateBuilder($columns);
	// $msg = new TemplateMessageBuilder(emoji('1F50D')."這訊息要在手機上才能看唷", $carousel);
	// $MultiMessageBuilder->add($msg);

	// if($quotient===1){
	// 	$actions = array(
	// 		new PostbackTemplateActionBuilder("回列表", "map_key=Y"),
	// 		new PostbackTemplateActionBuilder(" ", " ")
	// 	);
	// }else{
	// 	$actions = array(
	// 		new PostbackTemplateActionBuilder("回列表", "map_key=Y"),
	// 		new PostbackTemplateActionBuilder("顯示更多", "map_key=".$getText.'#'.$quotient)
	// 	);
	// }

	// $button = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ConfirmTemplateBuilder(emoji('1F4CC')." 是否顯示更多？", $actions);
	// $msg2 = new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder(emoji('1F50D')."這訊息要在手機上才能看唷", $button);
	// $MultiMessageBuilder->add($msg2);

	// $bot->replyMessage($reply_token, $MultiMessageBuilder);



