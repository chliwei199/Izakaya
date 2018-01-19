 
<?php

			$textMessage = emoji(100010).' 抱歉，小BLAH不了解您說什麼，沒辦法回答您。';
 			$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($textMessage);  
  

			$response =  $bot->replyMessage($reply_token, $textMessageBuilder);
?>
 