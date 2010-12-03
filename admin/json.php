<?PHP

class JSONFault 
{ 
    const ConnectionError = 8002; 
    
    public $code = 0; 
    public $string = " "; 
    
    public function __construct($code, $string) 
    { 
        $this->code = $code; 
        $this->string = $string; 
    } 
    
    public function __toString() 
    { 
        return "JSON Fault<".$this->code.": ".$this->string.">"; 
    } 
} 

class JSONCrumb 
{
    public $parent = null; 
    protected $name = ""; 
    
    public function __construct($parent, $name) 
    { 
        $this->parent = $parent; 
        $this->name = $name; 
    } 
    
    public function __get($name) 
    { 
        return new JSONCrumb($this, $name); 
    } 
    
    public function __call($name, $arguments) 
    { 
        return $this->parent->__call($this->name.".".$name, $arguments); 
    } 
} 

class JSON
{ 
	//(12-2-2010)Emirin: Added port checking for json protocalls to speed up the check if the server is down.
    public function retrieve($url, $address, $port) 
    {
		error_reporting(E_ERROR | E_PARSE);

		if(fsockopen($address, $port, $errno, $errstr, 1)) {
			$file = @file_get_contents($url); 
			if ($file == false) { 
				$le = error_get_last(); 
				return new JSONFault(JSONFault::ConnectionError, $le["message"]); 
			} else { 
				$response = json_decode(utf8_encode($file));
				if (json_last_error()) { 
					 switch(json_last_error())
						{
							case JSON_ERROR_DEPTH:
								echo ' - Maximum stack depth exceeded';
							break;
							case JSON_ERROR_CTRL_CHAR:
								echo ' - Unexpected control character found';
							break;
							case JSON_ERROR_SYNTAX:
								echo ' - Syntax error, malformed JSON';
							break;
							case JSON_ERROR_NONE:
								echo ' - No errors';
							break;
							case JSON_ERROR_STATE_MISMATCH:
								echo 'Invalid or malformed JSON';
							break;
							case JSON_ERROR_SYNTAX:
								echo 'Syntax error';
							break;
							case JSON_ERROR_UTF8:
								echo 'Malformed UTF-8 characters, possibly incorrectly encoded';
							break;
						}
				} else { 
					return $response; 
			   } 
			} 
		} else {
					return "Server is likely down."; 
		}
		error_reporting(E_ERROR | E_WARNING | E_PARSE);
	}
} 
?>