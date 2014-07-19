<?php

/**
 * Hash Message Authentication Code
 *
 * @package Security
 * @author Jete O'Keeffe <jete.okeeffe@gmail.com>
 * @version 1.0
 */

namespace security\hmac;

class HmacAuthenticate {

	/**
	 * Constructor
	 *
	 * @param string	algorithm
	 * @param key		private key
	 */
	public function __construct($type, $key) {
		$this->_type = $type;
		$this->_key = $key;	
	}

	/**
	 * Generate a Hash
	 *
	 * @param ?
	 * @return string
	 */
	public function generate($contents) {
		return hash_hmac($this->_type, $contents, $this->_privateKey);
	}

	/**
	 * Get the algorithm used to create a Hash
	 */
	public function getType() {
		return $this->_type;
	}

	/**
	 * Get the private key
	 */
	public function getPrivateKey() {
		return $this->_privateKey;
	}

	/**
	 * See if too hashs match up
	 *
	 * @param string
	 * @param string
	 * @return bool
	 */
	public static function isMatch($hash1, $hash2) {
		return $hash1 === $hash2;
	}
}
