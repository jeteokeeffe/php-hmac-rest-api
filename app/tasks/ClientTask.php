<?php


class ClientTask extends Phalcon\CLI\Task {


	public function sendAction() {
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, "http://api.example.com/ping");
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

		curl_exec($ch);

		curl_close($ch);
	}
}
