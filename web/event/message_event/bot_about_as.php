 
<?php

 
	$actions = array(
		new \LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder("定位專線", "tel:0227407528"),
			new \LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder("店家位置", "http://bit.ly/FBabout_Android")
			);
					
 
		$carousel = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilder(" 關於我們","提供日式料理．韓式料理．串燒．熱炒．披薩及獨創菜色還有眾多酒類帶您體驗別於日式居酒屋的氛圍！", $thumbnailImageUrl,$actions);
		$msg = new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder("這訊息要在手機上才能看唷", $carousel);
		$bot->replyMessage($reply_token,$msg);			
?>
 