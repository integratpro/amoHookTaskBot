<?php

//перебираем массив менеджеров для выдачи в чат
foreach ( $manager_arr as $key => $value){  
	
	$msg .= "%0A*".(string)$key."*%0AПросроченных задач : ".(string)$manager_arr[$key][0];		
	
	}
	
	
	$url="https://api.telegram.org/bot".TOKEN."/sendMessage?disable_web_page_preview=true&chat_id=".CHAT_ID."&parse_mode=Markdown&text=*".TITLE_MESSAGE."*".$msg;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "$url");
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_exec($ch);
		curl_close($ch);

	unset($url);
	


?>