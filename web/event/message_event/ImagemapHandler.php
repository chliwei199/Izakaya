<?php
namespace App\event\message_event;
use LINE\LINEBot\MessageBuilder\Imagemap\BaseSizeBuilder;
use LINE\LINEBot\ImagemapActionBuilder\AreaBuilder;
use LINE\LINEBot\ImagemapActionBuilder\ImagemapUriActionBuilder;
use LINE\LINEBot\ImagemapActionBuilder\ImagemapMessageActionBuilder;
use LINE\LINEBot\MessageBuilder\ImagemapMessageBuilder;
class ImagemapHandler {

	public function createImagemap() {
        $columns = array();
        $baseUrl='https://'. $_SERVER['HTTP_HOST'].getenv('image_path').'line_menu_food.png?_ignore=';
        $altText="卡好用LINE服務";
        
        $baseSizeBuilder = new BaseSizeBuilder(1324,1040);
        $areaBuilder1_1 = new AreaBuilder(39,198,203,119); 	
        $areaBuilder1_2 = new AreaBuilder(293,198,203,119); 	
        $areaBuilder1_3 = new AreaBuilder(549,198,203,119); 
        $areaBuilder1_4 = new AreaBuilder(799,198,203,119); 
        $areaBuilder2_1 = new AreaBuilder(39,354,203,119); 	
        $areaBuilder2_2 = new AreaBuilder(293,354,203,119); 	
        $areaBuilder2_3 = new AreaBuilder(549,354,203,119); 
        $areaBuilder2_4 = new AreaBuilder(799,354,203,119); 	       	 
        $areaBuilder3_1 = new AreaBuilder(39,508,203,119); 	
        $areaBuilder3_2 = new AreaBuilder(293,508,203,119); 	
        $areaBuilder3_3 = new AreaBuilder(549,508,203,119); 

        $areaBuilder4_1 = new AreaBuilder(39,854,203,119); 	
        $areaBuilder4_2 = new AreaBuilder(293,854,203,119); 	
        $areaBuilder4_3 = new AreaBuilder(549,854,203,119); 
        $areaBuilder4_4 = new AreaBuilder(799,854,203,119); 
        $areaBuilder5_1 = new AreaBuilder(39,1008,203,119); 	
        $areaBuilder5_2 = new AreaBuilder(293,1008,203,119); 	
        $areaBuilder5_3 = new AreaBuilder(549,1008,203,119); 
        $areaBuilder5_4 = new AreaBuilder(799,1008,203,119); 	       	 
        $areaBuilder6_1 = new AreaBuilder(39,1164,203,119); 	
        $areaBuilder6_2 = new AreaBuilder(293,1164,203,119); 	
        

        $food_1_1="找菜：豬";
        $food_1_2="找菜：牛";
        $food_1_3="找菜：鷄";
        $food_1_4="找菜：羊";
        $food_2_1="找菜：炸";
        $food_2_2="找菜：海鮮";
        $food_2_3="找菜：湯";
        $food_2_4="找菜：pizza";
        $food_3_1="找菜：開胃菜";
        $food_3_2="找菜：主菜";
        $food_3_3="找菜：蔬菜";

        $wine_1_1="找酒：罐裝BEER";
        $wine_1_2="找酒：汽水";
        $wine_1_3="找酒：清酒";
        $wine_1_4="找酒：鷄尾酒";
        $wine_2_1="找酒：威士忌";
        $wine_2_2="找酒：沙瓦";
        $wine_2_3="找酒：葡萄酒";
        $wine_2_4="找酒：水果清酒";
        $wine_3_1="找酒：燒酒";
        $wine_3_2="找酒：生BEER";

        $columns[] = new ImagemapMessageActionBuilder($food_1_1,$areaBuilder1_1);
        $columns[] = new ImagemapMessageActionBuilder($food_1_2,$areaBuilder1_2);
        $columns[] = new ImagemapMessageActionBuilder($food_1_3,$areaBuilder1_3);
        $columns[] = new ImagemapMessageActionBuilder($food_1_4,$areaBuilder1_4);
        $columns[] = new ImagemapMessageActionBuilder($food_2_1,$areaBuilder2_1);
        $columns[] = new ImagemapMessageActionBuilder($food_2_2,$areaBuilder2_2);
        $columns[] = new ImagemapMessageActionBuilder($food_2_3,$areaBuilder2_3);
        $columns[] = new ImagemapMessageActionBuilder($food_2_4,$areaBuilder2_4);
        $columns[] = new ImagemapMessageActionBuilder($food_3_1,$areaBuilder3_1);
        $columns[] = new ImagemapMessageActionBuilder($food_3_2,$areaBuilder3_2);
        $columns[] = new ImagemapMessageActionBuilder($food_3_3,$areaBuilder3_3);
        $columns[] = new ImagemapMessageActionBuilder($wine_1_1,$areaBuilder4_1);
        $columns[] = new ImagemapMessageActionBuilder($wine_1_2,$areaBuilder4_2);
        $columns[] = new ImagemapMessageActionBuilder($wine_1_3,$areaBuilder4_3);
        $columns[] = new ImagemapMessageActionBuilder($wine_1_4,$areaBuilder4_4);
        $columns[] = new ImagemapMessageActionBuilder($wine_2_1,$areaBuilder5_1);
        $columns[] = new ImagemapMessageActionBuilder($wine_2_2,$areaBuilder5_2);
        $columns[] = new ImagemapMessageActionBuilder($wine_2_3,$areaBuilder5_3);
        $columns[] = new ImagemapMessageActionBuilder($wine_2_4,$areaBuilder5_4);
        $columns[] = new ImagemapMessageActionBuilder($wine_3_1,$areaBuilder6_1);
        $columns[] = new ImagemapMessageActionBuilder($wine_3_2,$areaBuilder6_2);       

        $ImageMessageBuilder = new ImagemapMessageBuilder($baseUrl,$altText,$baseSizeBuilder,$columns);  
	 	return $ImageMessageBuilder;
	 }
   
}
