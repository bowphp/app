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

	public function connection($url, $username, $password, $secure)
	{

	}

	private function read()
	{

	}

	private function write($command, $code)
	{

	}

}