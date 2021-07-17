<?php


// SIMPLE AUTH
function REQUEST_AUTH_SIMPLE(){
	$auth = _checkAuth($GLOBALS['API_USER_USERNAME'], $GLOBALS['API_USER_PASSWORD']);
	if(!$auth) $auth = _checkAuth($GLOBALS['API_ADMIN_USERNAME'], $GLOBALS['API_ADMIN_PASSWORD']);
	if(!$auth) exit;
}

// STRONG AUTH
function REQUEST_AUTH_STRONG(){
	$auth = _checkAuth($GLOBALS['API_ADMIN_USERNAME'], $GLOBALS['API_ADMIN_PASSWORD']);
	if(!$auth) exit;
}

// check authentication
function _checkAuth($p_user, $p_pass){
	$AUTH_USER = $p_user;
	$AUTH_PASS = $p_pass;
	header('Cache-Control: no-cache, must-revalidate, max-age=0');
	$has_supplied_credentials = !(empty($_SERVER['PHP_AUTH_USER']) && empty($_SERVER['PHP_AUTH_PW']));
	$is_not_authenticated = (!$has_supplied_credentials || $_SERVER['PHP_AUTH_USER'] != $AUTH_USER || $_SERVER['PHP_AUTH_PW'] != $AUTH_PASS);
	if ($is_not_authenticated) {
		header('HTTP/1.1 401 Authorization Required');
		header('WWW-Authenticate: Basic realm="Access denied"');
		return false;
	}
	return true;
}



?>
