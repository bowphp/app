<?php



namespace System;

class Mail 
{

	private $headers = "";
	private $to = null;
	private $subject = null;
	private $body = null;
	private $html = "";
	private $sep = "";
	private static $mail = null;

    /**
     * addHeader, Ajout une entête
     * @param string $head
     * @param Mail
     */
    public function addHeader($head)
    {
    	$this->head .= $head . $this->sep;
    	return $this;
    }

    /**
     * to, definir le receveur
     * @param string $to
     * @param Mail
     */
    public function to($to)
    {
    	$this->to = $to;
    	return $this;
    }

    /**
     * subject, definit le suject du mail
     * @param string $subject
     * @param Mail
     */
    public function subject($subject)
    {
    	$this->subject = $subject;
    	return $this;
    }

    /**
     * from, definir l'expediteur du mail
     * @param string $from
     * @param Mail
     */
    public function from($form)
    {
    	$this->addHeader("Form: $form");
    	return $this;
    }

    /**
     * toHtml, definir le type de contenu en text/html
     * @param Mail
     */
    public function toHtml()
    {
    	$this->addHeader("MIME-Version: 1.0");
    	$this->addHeader("Content-Type: text/html; charset=utf-8");
    	return $this;
    }
    /**
     * body, definir le corps du message
     * @param body
     * @param Mail
     */
    public function body()
    {
    	$this->body = $body;
    	return $this;
    }

    /**
     * send, Envoie le mail
     * @param callable|null $cb
     * @param Mail
     */
    public function send($cb = null)
    {
    	if (empty($this->to) || empty($this->subject) || empty($this->body)) {
    		trigger_error("Erreur est survenue.", E_USER_ERROR);
    	}

    	$status = @mail($this->to, $this->subject, $this->body, $this->header);
    	if (is_callable($cb)) {
    		call_user_func($cb, $status);
    	} else {
    		return $status;
    	}

    	return $this;
    }
    /**
     * Mise en privé des fonctions magic __clone et __construct
     */
    private function __clone(){}
	
	private function __construct()
	{
		if (defined('PHP_EOL')) {
	        $this->sep = PHP_EOL;
	   	} else {
	        $this->sep = (strpos(PHP_OS, 'WIN') === false) ? "\n" : "\r\n";
        }
	}

    public static function load()
    {
    	if (self::mail !== nul) {
    		return self::mail;
    	}
    	return self::mail = new Mail();
    }

}