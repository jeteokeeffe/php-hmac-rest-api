<?php

/**
 * Event that Authenticates the client message with HMac
 *
 * @package Events
 * @subpackage Api
 * @author Jete O'Keeffe
 * @version 1.0
 */

namespace Events\Api;

use Interfaces\IEvent as IEvent;

class HmacAuthenticate extends \Phalcon\Events\Manager implements IEvent {

	/**
	 * Hmac Message
	 * @var object
	 */
	protected $_msg;

	/**
	 * Private key for HMAC
	 * @var string
	 */
	protected $_privateKey;

	/**
	 * Constructor
	 *
	 * @param object
	 * @param string
	 */
	public function __construct($message, $privateKey) {
		$this->_msg = $message;
		$this->_privateKey = $privateKey;

		// Add Event to validate message
		$this->handleEvent();
	}

	/**
	 * Setup an Event
	 *
	 * Phalcon event to make sure client sends a valid message
	 * @return FALSE|void
	 */
	public function handleEvent() {

		$this->attach('micro', function ($event, $app) {
			if ($event->getType() == 'beforeExecuteRoute') {

				// Need to refactor this
				$data = $this->msg->getTime() . $this->msg->getId() . implode($this->msg->getData());
				$serverHash = hash_hmac('sha256', $data, $this->privateKey);
				$clientHash = $this->msg->getHash();
				$allowed = $clientHash === $serverHash ?: false;

				$method = strtolower($app->router->getMatchedRoute()->getHttpMethods());
				$unAuthenticated = $app->getUnauthenticated();

				if (isset($unAuthenticated[$method])) {
					$unAuthenticated = array_flip($unAuthenticated[$method]);

					if (isset($unAuthenticated[$app->router->getMatchedRoute()->getPattern()])) {
						$allowed = true;
					}
				}

				if (!$allowed) {
					$app->response->setStatusCode(401, "Unauthorized");
					$app->response->setContent("Access denied");
					$app->response->send();

					return false;
				}
			}
		});
	}
}
