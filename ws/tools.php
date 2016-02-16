<?php
	function array_key_exists_r($needle, $haystack)		//finds a needle on a multidimensional haystack. Returns either the key if found or null if don't.
	{
		$result = array_key_exists($needle, $haystack);
		if ($result) return $result;
		foreach ($haystack as $v) {
			if (is_array($v)) {
				$result = array_key_exists_r($needle, $v);
			}
			if ($result) return $result;
		}
		return $result;
	}

	function generateRandomString($length = 10) { //generates a random string, if $lenght is not passed, string's lenght will be 10 chars.
		return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
	}
?>