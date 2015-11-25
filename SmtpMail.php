<?php


namespace System;

class SmtpMail implements IHeader
{

	private $sock = null;

	/**
	 * @return self
	 */
	public function addCc($mail, $name = null) {
		return $this;
	}

	/**
	 * @return self
	 */
	public function addBcc($mail, $name = null) {
		return $this;
	}

	/**
	 * @return self
	 */
	public function addReplayTo($mail, $name = null) {
		return $this;
	}

	/**
	 * @return self
	 */
	public function addReturnPath($mail, $name = null) {
		return $this;
	}

	/**
	 * @return self
	 */
	public function to($mail, $name = null, $smtp = false) {
		return $this;
	}

	/**
	 * @return self
	 */
	public function from($mail, $name) {
		return $this;
	}

	/**
	 * @return self
	 */
	public function send($cb = null) {
		return $this;
	}

	public function connection($url, $username, $password, $secure, $tls = false)
	{
		@list($url, $port) = explode(":", $url, 2);
		
		if (!isset($port)) {
			$port = 25;
		} else {
			$port = (int) $port;
		}

		if ($secure === true) {
			$url = "ssl://{$url}";
			$port = 586;
		}

		$this->sock = fsockopen($url, $port, $errno, $errstr, 50);}
		
		if ($this->sock === null) {
			throw new ErrorException(__METHOD__."(): can not connect to {$url}:{$port}", E_USER_ERROR);
		}

		stream_set_timeout($this->sock, 20, 0);
		$this->read();
		$host = isset($_SERVER['HTTP_HOST']) && preg_match('#^[\w.-]+\z#', $_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'localhost';
		$this->write("EHLO $host", $code=250);

		if ((int) $this->read() != 250) {
			$this->write("EHLO $host", 250);
		}

		if ($tls === true) {
			$this->write("STARTTLS", $code=250);
			$secured = stream_socket_enable_crypto($this->connection, true, STREAM_CRYPTO_METHOD_TLS_CLIENT);
			if (!$secured) {
				throw new ErrorException(__METHOD__."(): Can not secure you connection with tls.", 1);
			}
			$this->write("EHLO $host", $code=250);
		}

		if ($this->username !== null && $this->password !== null) {
			$this->write("AUTH LOGIN", 334);
			$this->write(base64_encode($this->username), 334, "username");
			$this->write(base64_encode($this->password), 235, "password");
		}

	}

	private function read()
	{
		$s = "";
		while (!feof($this->connection)) {
			if (($line = fgets($this->connection, 1e3) != null)) {
				$s .= $line;
				if (substr($line, 3, 1) == " ") {
					break;
				}
			}
		}
		return $s;
	}

	private function write($command, $code)
	{

	}

}