<?php
header("Content-Type: text/html; charset=utf-8");

// Точка входа
$root = __DIR__ . DIRECTORY_SEPARATOR;

// Подготовка данных
require $root.'config.php';
require $root.'functions.php';


// Авторизация
	unset( $curldata );
	$curldata['link'] = 'https://'.AMO_SUBDOMAIN.'.amocrm.ru/private/api/auth.php?type=json';
	$curldata['postfields'] = $amo_user;
	$Response = amoCRMCurl($curldata);
      
//пробегаем по массиву менеджеров			
	foreach ( $manager_id as $key => $value ) {		
		
			unset( $curldata );	//чищу curl при каждом проходе 
			
//пробегаем по всем задачам			
        	for ( $i = 0; $i = 1; $i++, $l_offset += $l_rows){		
								
						   
					unset( $curldata);		//чищу curl при каждом проходе 
					$curldata['link'] = 'https://'.AMO_SUBDOMAIN.'.amocrm.ru/api/v2/tasks?&responsible_user_id%5B%5D='.$key.'&limit_rows='.$l_rows.'&limit_offset='.$l_offset;
					$Response = amoCRMCurl($curldata);
											
							if (isset($Response['_embedded']['items'])){	//если массив сделок в ответе не пустой
				
							for ( $j = 0; $j < count($Response['_embedded']['items']); $j++ ){
									
									//если задача не выполнена И время выполнения позже сейчас
									if ($Response['_embedded']['items'][$j]['is_completed'] == false) and ( $Response['_embedded']['items'][$j]['complete_till_at'] < time() { 
																						
											$array++; 
										
									}


							} 
							
							} else { 
									//дописываем имя и количество 
									$manager_arr[$value][] = $array;
									$array = 0;
									break;	//следующий менеджер
																				
									}


			}


								
	}

require $root.'bot.php';


?>