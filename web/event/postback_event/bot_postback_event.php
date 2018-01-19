<?php
			/*
			post event
			*/
			
			$getText = $event->getPostbackData();
			
			if ($getText) {
				parse_str($getText, $data);
				if (isset($data["map_key"])) {
					$page = $data["map_key"];
					$Text=str_replace(array('找菜：', '找酒：'), '', $page);
					$pieces = explode("#", $Text); //[0]=sheet gid;[1]=page number 
					switch ($page) {
						// case 'Y':
						// include('event/message_event/bot_map_search.php');
						// break;
						case 'Y':
						include('event/message_event/bot_imagemap.php');
						break;
						default:
							//include('event/message_event/bot_map_search.php');
							$UtilityHandler= new App\event\UtilityHandler;				//create UtilityHandler object
							$MultiMessageBuilder=$UtilityHandler->displayMoreItems($pieces[0],$pieces[1]);				//get json string from description
							$bot->replyMessage($reply_token, $MultiMessageBuilder);
						break;				
					}

				}
				if (isset($data["map_cat"])) {
					
					$page = $data["map_cat"];

					switch ($page) {
						case 'Y':
						include('event/message_event/bot_map_search.php');
						break;
						case 'N':
						include('event/message_event/bot_imagemap.php');
						break;				
					}

				}

				if (isset($data["map_cat_name"])) {
 
					$Text= $data["map_cat_name"];
					include('event/message_event/bot_category.php');

				}				
			}
			
?>			