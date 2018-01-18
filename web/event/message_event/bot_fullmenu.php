 <?php
 
			use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
			use LINE\LINEBot\MessageBuilder\MultiMessageBuilder;
			use LINE\LINEBot\MessageBuilder\ImageMessageBuilder;
			use LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder;
			use LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilder;
			use LINE\LINEBot\MessageBuilder\TemplateMessageBuilder;
			
			$thumbnailImageUrl=null;
			$MultiMessageBuilder = new MultiMessageBuilder();
			$baseUrl='https://'. $_SERVER['HTTP_HOST'].getenv('image_path').'full_menu.png?_ignore=';	

			
			$actions = array( new MessageTemplateActionBuilder(emoji('1F362')." 找菜 ".emoji('1F364'),"找菜"));
			$carousel = new ButtonTemplateBuilder(emoji('1F37B')." BLAH BLAH BLAH 菜單","完整菜單如下圖，也可以透過⌜找菜⌟快速找出您想吃的食物或酒唷。", $thumbnailImageUrl,$actions);
			$TemplateMessageBuilder = new TemplateMessageBuilder("這訊息要在手機上才能看唷", $carousel);
			
			$MultiMessageBuilder->add($TemplateMessageBuilder);
			$MultiMessageBuilder->add(new ImageMessageBuilder($baseUrl,$baseUrl));
			
			$bot->replyMessage($reply_token, $MultiMessageBuilder);

 

?>
 