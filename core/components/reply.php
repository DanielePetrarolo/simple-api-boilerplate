<?php


// gestione risposta
function SEND_REPLY($p_code, $p_message = null){

	switch ($p_code) {
		case 200:
			is_string($p_message) ? $reply = array("message" => $p_message) : $reply = $p_message;
			break;
		case 201:
			is_string($p_message) ? $reply = array("message" => $p_message) : $reply = $p_message;
			break;
		case 400:
			$p_message ? $message = $p_message : $message = "Ops...somenthing gone wrong. :(";
			$reply = array("message" => $message);
			break;
		case 412:
			$p_message ? $message = $p_message : $message = "Missing data.";
			$reply = array("message" => $message);
			break;
	}

	http_response_code($p_code);
	return json_encode($reply);
}


?>
