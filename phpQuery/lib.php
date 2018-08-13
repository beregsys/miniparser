<?php 
	/**
	* 
	*/
	$pars = new Parser;
	class Parser
	{
		
		
		public function curl($url, $post=''){
			$ch = curl_init($url);
			
			curl_setopt($ch, CURLOPT_POST, 1); 
			
			curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (бла бла бла..) "); 
			
			$headers = array
			(
			    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*;q=0.8',
			    'Accept-Language: ru,en-us;q=0.7,en;q=0.3',
			    'Accept-Encoding: deflate',
			    'Accept-Charset: windows-1251,utf-8;q=0.7,*;q=0.7'
			); 
			 
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 
			# добавляем заголовков к нашему запросу. Чтоб смахивало на настоящих
			
			curl_setopt($ch, CURLOPT_REFERER, "http://php.su/forum/loginout.php");
			# Подделываем значение - откуда пришли данные.
			
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			# post данные.
			# умная libcurl сама добавит заголовки
			# Content-Type: application/x-www-form-urlencoded и Content-Length: 71
			
			curl_setopt($ch, CURLOPT_COOKIEJAR, "my_cookies.txt");  
			curl_setopt($ch, CURLOPT_COOKIEFILE, "my_cookies.txt");  
			# Функции для обработки установливаемых форумом кук.
			# подробнее рассмотрим далее.
			
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			# Убираем вывод данных в браузер. Пусть функция их возвращает а не выводит
			
			$result = curl_exec($ch); 			 
			 
			curl_close($ch);			
		
			return $result;;
		}
	}
 ?>