<?php

/**
 * Basic Authentication Message
 *
 * @package Micro
 * @subpackage Messages 
 * @author Jete O'Keeffe
 */

namespace Micro\Messages;

class Auth {

	/**
	 * Id of the Client
	 * @var int
	 */
	protected $_id;

	/**
	 * Unix timestamp
	 * @var string
	 */
	protected $_time;

	/**
	 * Data/Content of the Message
	 * @var string
	 */
	protected $_data;

	/**
	 * Hash of the Message
	 * @var string
	 */
	protected $_hash;


	public function __construct($id, $time, $hash, $data) {
		$this->_id = $id;	
		$this->_hash = $hash;
		$this->_time = $time;
		$this->_data = $data;
	}

	/**
	 * Get the hash of the Message
	 *
	 * @return string
	 */
	public function getHash() {
		return $this->_hash;
	}

	public function getId() {
		return $this->_id;
	}

	public function getData() {
		return $this->_data;
	}

	public function getTime() {
		return $this->_time;
	}
}
