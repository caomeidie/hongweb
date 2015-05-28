<?php

final class Language{
	private static $language_content = array();
	
	
	public static function getGBK($key){
		
		if (strtoupper(CHARSET) == 'GBK' && !empty($key)){
			if (is_array($key)){
				$result = var_export($key, true);
				$result = iconv('UTF-8','GBK',$result);
				eval("\$result = $result;");
			}else {
				$result = iconv('UTF-8','GBK',$key);
			}
		}
		return $result;
	}
	
	public static function getUTF8($key){
		
		if (!empty($key)){
			if (is_array($key)){
				$result = var_export($key, true);
				$result = iconv('GBK','UTF-8',$result);
				eval("\$result = $result;");
			}else {
				$result = iconv('GBK','UTF-8',$key);
			}
		}
		return $result;
	}
	
	public static function get($key,$charset = ''){
		$result = self::$language_content[$key] ? self::$language_content[$key] : '';
		if (strtoupper(CHARSET) == 'UTF-8' || strtoupper($charset) == 'UTF-8') return $result;
		
		if (strtoupper(CHARSET) == 'GBK' && !empty($result)){
			$result = iconv('UTF-8','GBK',$result);
		}
		return $result;
	}
	
	public static function set($key,$value){
		self::$language_content[$key] = $value;
		return true;
	}
	
	public static function getLangContent($charset = ''){
		$result = self::$language_content;
		if (strtoupper(CHARSET) == 'UTF-8' || strtoupper($charset) == 'UTF-8') return $result;
		
		if (strtoupper(CHARSET) == 'GBK' && !empty($result)){
			if (is_array($result)){
				foreach ($result as $k => $v){
					$result[$k] = iconv('UTF-8','GBK',$v);
				}
			}
		}
		return $result;
	}

	public static function appendLanguage($lang){
		if (!empty($lang) && is_array($lang)){
			self::$language_content = array_merge(self::$language_content,$lang);
		}
	}
}