<?php
			/*
			follow event
			*/
 
 
			use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
			use LINE\LINEBot\MessageBuilder\MultiMessageBuilder;
			use LINE\LINEBot\MessageBuilder\ImageMessageBuilder;
			use LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder;
			use LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilder;
			use LINE\LINEBot\MessageBuilder\TemplateMessageBuilder;

			$text = emoji('100003')." いらっしゃいませ！\r\nBlah Blah Blah 居酒屋 ".emoji('100058')."\r\n我是小BLAH機器人很高興為您服務。 \r\n\r\n".emoji('10002D')."更多資訊請點選下方⌜呼喚選單⌟。".emoji('100007');

			$MultiMessageBuilder = new LINE\LINEBot\MessageBuilder\MultiMessageBuilder();
 
			$baseUrl='https://'. $_SERVER['HTTP_HOST'].getenv('image_path').'full_menu2.png?_ignore=';	

			$columns = array();



			$thumbnailImageUrl='https://'. $_SERVER['HTTP_HOST'].getenv('image_path').'red_e.png?_ignore=';	
			$actions =  new MessageTemplateActionBuilder("試試手氣吧!","找菜") ;
			$column = new  \LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselColumnTemplateBuilder($thumbnailImageUrl,$actions);
			$columns[] = $column;	
			$carousel = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselTemplateBuilder($columns);
			$msg =  new TemplateMessageBuilder("這訊息要在手機上才能看唷", $carousel);


			$MultiMessageBuilder->add(new LINE\LINEBot\MessageBuilder\TextMessageBuilder($text));
			//$MultiMessageBuilder->add($msg);
			$bot->replyMessage($reply_token, $MultiMessageBuilder);
			 
?>			