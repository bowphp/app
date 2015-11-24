<?php



namespace System;

class Mail 
{

	private $headers = [];
	private $to = null;
	private $subject = null;
	private $message = null;
	private $html = 0;
	private $part = 0;
	private $sep;
	private $attach = [];
	private $boundary;

	private static $mail = null;

    /**
     * addHeader, Ajout une entête
     * @param string $head
     * @param Mail
     */
    public function addHeader($key, $value)
    {
    	if (in_array($key, ["Date", "X-Mailer", "MIME-Version", "From", "Bcc", "Cc", "Subject"])) {
	    	if (array_key_exists($key, $this->headers["top"])) {
	    		if (!is_array($this->headers["top"][$key])) {
	    			$old = $this->headers["top"][$key];
	    			$this->headers["top"][$key] = [$old, $value];
	    		} else {
		    		array_push($this->headers["top"][$key], $value); 
	    		}
	    	} else {
	    		$this->headers["top"][$key] = $value;
	    	}
    	}
    	return $this;
    }

    private function addFeatureHeader($key, $value)
    {
    	if (strtolower($key) == "content-type") {
    		$this->headers["bottom"][$this->part] = [];
    		$this->part++;
    	}
    	if ($key == "data") {
    		$value = preg_replace("@\n$@", "", $value);
    		$data = $this->sep . $this->sep. $value;
    	} else {
    		$data = "$key: $value";
    	}
    	array_push($this->headers["bottom"][$this->part - 1], $data);
    	return $this;
    }

    public function formatHeader()
    {
    	$content_length = count($this->headers["bottom"]);
    	$sep = $this->sep;

    	$form = "";

    	foreach ($this->headers["top"] as $key => $value) {
    		$form .= "$key: $value" . $sep;
    	}

    	if ($content_length == 1) {
    		foreach ($this->headers["bottom"] as $value) {
    			$form .= $value . $sep;
    		}
    	} else {
    		$form .= "Content-Type: multipart/mixed; boundary=\"{$this->boundary}\"{$sep}";
    		foreach ($this->headers["bottom"] as $value) {
    			foreach ($value as $key => $v) {
    				$form .= $v . $sep;
    			}
    			$form .= $this->boundary . $sep;
    		}
    	}
    	return $form;
    }

    /**
     * getHeader, retourne les entetes definies.
	 * @return string
     */
    public function getHeader()
    {
    	return (object) $this->headers;
    }

    /**
     * to, definir le receveur
     * @param string $to
     * @param string $to=null
     * @param Mail
     */
    public function to($to, $name = null)
    {
    	if ($this->to !== null) {
    		$this->to .= ", ";
    	}
    	if (is_string($name)) {
    		$this->to .= ucwords($name) . " <$to>";
    	} else {
    		$this->to .= "$to"; 
    	}
    	return $this;
    }

    /**
     * addFile, permet d'ajout un fichier d'attachement
     * @param string $file
     * @param Mail
     */
    public function addFile($file)
    {
    	if (!is_file($file)) {
    		trigger_error("Ce n'est pas une fichier.", E_USER_ERROR);
    	}
    	$content = file_get_contents($file);
    	$base_name = basename($file);
    	$this->addFeatureHeader("Content-Type", "application/octect-stream; name=\"{$base_name}\"");
    	$this->addFeatureHeader("Content-Transfer-Encoding", "base64");
    	$this->addFeatureHeader("Content-Disposition", "attachement");
    	$this->addFeatureHeader("data", chunk_split(base64_encode($content)));
    	return $this;
    }

    /**
     * subject, definit le suject du mail
     * @param string $subject
     * @param string $smtp=false
     * @param Mail
     */
    public function subject($subject, $smtp = false)
    {
    	if ($smtp === true) {
    		$this->addHeader("Subject", $subject);
    	} else {
	    	$this->subject = $subject;
    	}
    	return $this;
    }

    /**
     * from, definir l'expediteur du mail
     * @param string $from
     * @param string $name=null
     * @return self
     */
    public function from($from, $name = null, $smtp = false)
    {	
    	$from = ($name !== null) ? (ucwords($name) . " &lt;{$from}&gt;") : $from;
    	if ($smtp === true) {
    		$this->addHeader("From", $from);
    	} else {
    		$this->from = $from;
    	}
    	return $this;
    }

    /**
     * toHtml, definir le type de contenu en text/html
     * @param string $html=null
     * @return self
     */
    public function toHtml($html = null)
    {
    	$this->addFeatureHeader("Content-Type", "text/html; charset=utf-8");
    	$this->addFeatureHeader("Content-Transfer-Encoding", "8bit");
    	if (is_string($html)) $this->addFeatureHeader("data", $html);
    	return $this;
    }
    /**
     * toText, definir le corps du message
     * @param string text
     * @return self
     */
    public function toText($text = null)
    {
    	$this->addFeatureHeader("Content-Type", "text/plain; charset=utf-8");
    	$this->addFeatureHeader("Content-Transfer-Encoding", "8bit");
    	if (is_string($text)) $this->addFeatureHeader("data", $text);
    	return $this;
    }

    /**
     * message, definir le corps du message
     * @param string text
     * @return self
     */
    public function message($message)
    {
    	if (!is_string($message)) {
    		throw new \InavlidArgumentException("parameter most be string " . gettype($message) . "given", 1);
    	}
    	$this->message = $message;
    	return $this;
    }

    /**
     * send, Envoie le mail
     * @param callable|null $cb
     * @param Mail
     */
    public function send($cb = null)
    {
    	if (empty($this->to) || empty($this->subject) || empty($this->message)) {
    		trigger_error("An error comming because your don't given the following parameter: SENDER, SUBJECT or MESSAGE.", E_USER_ERROR);
    	}

    	$status = @mail($this->to, $this->subject, $this->message, $this->formatHeader());

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
        $this->boundary = "__snoop-Diagnostic.ci-" . md5(date("r", time()));
        $this->headers = ["top" => [], "bottom" => []];
    	$this->addHeader("MIME-Version", "1.0");
    	$this->addHeader("X-Mailer",  "Snoop Framework");
    	$this->addHeader("Date", date("r"));
	}

	/**
	 * load, charger la classe MAil en mode singleton
	 * @return new Mail
	 */
    public static function load()
    {
    	if (self::$mail !== null) {
    		return self::$mail;
    	}
    	self::$mail = new self;
    	return self::$mail;
    }

}