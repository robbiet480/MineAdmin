<?php
/**
 *
 * @package     OpenFlame Web Framework
 * @copyright   (c) 2010 OpenFlameCMS.com
 * @license     http://opensource.org/licenses/mit-license.php The MIT License
 * @link        http://github.com/OpenFlame/OpenFlame-Framework
 *
 * Minimum Requirement: PHP 5.0.0
 */

/**
 * OpenFlame Web Framework - User Input Handler
 * 	     Allows for safe user input and validation of such.
 *
 *
 * @license     http://opensource.org/licenses/mit-license.php The MIT License
 * @link        http://github.com/OpenFlame/OpenFlame-Framework
 */
class OfInput
{
	/**
	 * @var mixed - The raw input
	 */
	protected $raw_input = NULL;

	/**
	 * @var mixed - The cleaned input
	 */
	protected $cleaned_input = NULL;

	/**
	 * @var boolean - Was the even set when the page was submitted
	 */
	protected $was_set;

	/**
	 * Constructor
	 * @param string $var_name Var name in the global you're after
	 * @param mixed $default Default value and type to fall back on and check for good types
	 * @param string @global_name The name of the super global to use. REQUEST, GET, POST, COOKIE, and SERVER are all avavible.
	 * @return void
	 */
	public function __construct($var_name, $default, $global_name = '_REQUEST')
	{
		// Prepend the _ if not there
		if($global_name[0] != '_')
			$global_name = '_' . $global_name;

		// We should have a good global now.
		$global_name = in_array($global_name, array('_REQUEST', '_GET', '_POST', '_COOKIE', '_SERVER', '_FILES')) ? $global_name : '_REQUEST';

		// We need to make sure that cookie is not contaminating the value of request
		if($global_name == '_REQUEST' && isset($_COOKIE[$var_name]))
			$_REQUEST[$var_name] = isset($_POST[$var_name]) ? $_POST[$var_name] : $_GET[$var_name];

		// Check to see if the variable was set when the page was submitted
		$this->was_set = (!empty($GLOBALS[$global_name][$var_name])) ? true : false;

		// Assign the raw var
		// If the global is not set at all, or is empty, use the default. Otherwise, use what was inputted
		$this->raw_input = ($this->was_set) ? $GLOBALS[$global_name][$var_name] : $default;

		$this->cleaned_input = $this->cleanVar($this->raw_input, $default);
	}

	/**
	 * Recursively digs through the default to ensure everything is in it's place.
	 * @param mixed $var
	 * @param mixed $default
	 * @return mixed The cleaned data.
	 */
	private function cleanVar($var, $default)
	{
		if(is_array($var))
		{
			list($_key_default, $_value_default) = each($default);

			foreach($var as $key => $value)
				$var[$this->bindVar($key, $_key_default)] = $this->cleanVar($value, $_value_default);
		}
		else
		{
			$this->bindVar($var, $default);
		}

		return $var;
	}

	/**
	 * Binds the var to it's final type
	 * @param mixed $var - The var being bound
	 * @param mixed $default - Default value
	 * @return string - Cleaned output
	 */
	public function bindVar($var, $default)
	{
		$type = gettype($default);
		settype($var, $type);

		if($type == 'string')
		{
			if(!mb_check_encoding($var))
				$var = $default;

			$var = trim(htmlspecialchars(str_replace(array("\r\n", "\r", "\0"), array("\n", "\n", ''), $var), ENT_COMPAT, 'UTF-8'));
		}

		return $var;
	}

	/**
	 * Validates the piece of data
	 * @param string $type - The type to validate against, see the full type profile list
	 * @return boolean - True if valid, false if not.
	 */
	public function validate($type, $min = 0, $max = 0)
	{
		switch($type)
		{
			// Validates /any/ email
			case 'email':
				// By "James Watts and Francisco Jose Martin Moreno"
				// Assumed Public Domain
				return preg_match("#^([\w\!\#$\%\&\'\*\+\-\/\=\?\^\`{\|\}\~]+\.)*[\w\!\#$\%\&\'\*\+\-\/\=\?\^\`{\|\}\~]+@((((([a-z0-9]{1}[a-z0-9\-]{0,62}[a-z0-9]{1})|[a-z])\.)+[a-z]{2,6})|(\d{1,3}\.){3}\d{1,3}(\:\d{1,5})?)$#i", $this->cleaned_input) === 1 ? true : false;
			break;

			case 'url':
				// By "admin" (http://www.blog.highub.com/regular-expression/php-regex-regular-expression/php-regex-validating-a-url/)
				// Assumed Public Domain
				// @TODO Test cases to make sure it works.
				return preg_match("/^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,4}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&amp;?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/", $this->cleaned_input) === 1 ? true : false;
			break;

			case 'ip4':
				// By "G. Andrew Duthie" (http://regexlib.com/REDetails.aspx?regexp_id=32)
				// Assumed Public Domain
				return preg_match("#^(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9])\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[0-9])$#", $this->cleaned_input) === 1 ? true : false;
			break;

			case 'ip6':
				// By "Stephen Ryan" (http://forums.dartware.com/viewtopic.php?t=452)
				// Assumed Public Domain
				return preg_match("#\s*((([0-9A-Fa-f]{1,4}:){7}([0-9A-Fa-f]{1,4}|:))|(([0-9A-Fa-f]{1,4}:){6}(:[0-9A-Fa-f]{1,4}|((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3})|:))|(([0-9A-Fa-f]{1,4}:){5}(((:[0-9A-Fa-f]{1,4}){1,2})|:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3})|:))|(([0-9A-Fa-f]{1,4}:){4}(((:[0-9A-Fa-f]{1,4}){1,3})|((:[0-9A-Fa-f]{1,4})?:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(([0-9A-Fa-f]{1,4}:){3}(((:[0-9A-Fa-f]{1,4}){1,4})|((:[0-9A-Fa-f]{1,4}){0,2}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(([0-9A-Fa-f]{1,4}:){2}(((:[0-9A-Fa-f]{1,4}){1,5})|((:[0-9A-Fa-f]{1,4}){0,3}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(([0-9A-Fa-f]{1,4}:){1}(((:[0-9A-Fa-f]{1,4}){1,6})|((:[0-9A-Fa-f]{1,4}){0,4}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(:(((:[0-9A-Fa-f]{1,4}){1,7})|((:[0-9A-Fa-f]{1,4}){0,5}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:)))(%.+)?\s*$#i", $this->cleaned_input) === 1 ? true : false;
			break;

			// Alpha-numeric chars only
			case 'alphanumeric':
				// Check if they wanted a range
				$range = ($max || $min && $max > $min) ? '{' . $min . ',' . $max . '}' : '';

				return preg_match("#^[A-Za-z0-9]*{$range}$#i", $this->cleaned_input) === 1 ? true : false;
			break;

			// Validate a basic string, uses $min, $max
			case 'string':
				return (strlen($this->cleaned_input) >= $min && strlen($this->cleaned_input) <= $max) ? true : false;
			break;

			// Validates any int, uses $min and $max for the value of the int, not the size.
			case 'int':
				return ($this->cleaned_input >= $min && $this->cleaned_input <= $max) ? true : false;
			break;
		}

		// If we get a bad type or something
		return false;
	}

	/**
	 * Returns the raw var
	 * @return boolean - True if set, false if not.
	 */
	public function getRaw()
	{
		return $this->raw_input;
	}

	/**
	 * Returns the cleaned var
	 * @return boolean - True if set, false if not.
	 */
	public function getClean()
	{
		return $this->cleaned_input;
	}

	/**
	 * Checks to see if the var was even set when the page was submitted
	 * @return boolean - True if set, false if not.
	 */
	public function wasSet()
	{
		return (boolean) $this->was_set;
	}
}