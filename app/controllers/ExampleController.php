<?php

namespace Controllers;

class ExampleController extends \Phalcon\Mvc\Controller {


	public function pingAction() {

		echo "pong";
	}


    public function testAction($id) {
        echo "test (id: $id)";
    }

    public function skipAction($name) {
        echo "auth skipped ($name)";
    }
}
