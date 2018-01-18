 
<?php

 
	$actions = array(
		new \LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder(emoji('1F4DE')." 定位專線", "tel:0227407528"),
			new \LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder(emoji('1F4CD')." 店家位置", "https://www.google.com.tw/maps/dir/25.0329801,121.5439503/106%E5%8F%B0%E5%8C%97%E5%B8%82%E5%A4%A7%E5%AE%89%E5%8D%80%E5%B8%82%E6%B0%91%E5%A4%A7%E9%81%93%E5%9B%9B%E6%AE%B560%E8%99%9FBLAH+BLAH+BLAH+%E5%B1%85%E9%85%92%E5%B1%8B/@25.0388943,121.5408282,16z/data=!3m1!4b1!4m17!1m6!3m5!1s0x0:0xcf8cb28dc3bd67f3!2zQkxBSCBCTEFIIEJMQUgg5bGF6YWS5bGL!8m2!3d25.0448858!4d121.5467315!4m9!1m1!4e1!1m5!1m1!1s0x3442abdb14425807:0xcf8cb28dc3bd67f3!2m2!1d121.5467315!2d25.0448858!3e2")
			);
					
 
		$carousel = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilder(emoji('1F37A')." BLAH BLAH BLAH 居酒屋","提供日式料理．韓式料理．串燒．熱炒．披薩及獨創菜色還有眾多酒類帶您體驗別於日式居酒屋的氛圍！", $thumbnailImageUrl,$actions);
		$msg = new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder("這訊息要在手機上才能看唷", $carousel);
		$bot->replyMessage($reply_token,$msg);			
?>
 