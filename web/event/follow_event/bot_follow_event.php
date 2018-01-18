<?php
			/*
			follow event
			*/
 
			$text = emoji('100003')." いらっしゃいませ！\r\nBlah Blah Blah 居酒屋 ".emoji('100058')."\r\n我是小BLAH機器人很高興為您服務。 ".emoji('100007');

			$MultiMessageBuilder = new LINE\LINEBot\MessageBuilder\MultiMessageBuilder();
	
			$MultiMessageBuilder->add(new LINE\LINEBot\MessageBuilder\TextMessageBuilder($text));
	 
			$bot->replyMessage($reply_token, $MultiMessageBuilder);
			 
?>			