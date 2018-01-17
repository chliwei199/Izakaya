<?php
			/*
			follow event
			*/
 

			$MultiMessageBuilder = new LINE\LINEBot\MessageBuilder\MultiMessageBuilder();
	
			$MultiMessageBuilder->add(new LINE\LINEBot\MessageBuilder\TextMessageBuilder("ssssssss"));
	 
			$bot->replyMessage($reply_token, $MultiMessageBuilder);
			 
?>			