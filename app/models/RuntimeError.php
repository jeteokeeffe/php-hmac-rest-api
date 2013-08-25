<?php

namespace Models;

class RuntimeError extends \Phalcon\Mvc\Model {

	public function initialize() {
		$this->setSource("runtimeError");
	}
}
