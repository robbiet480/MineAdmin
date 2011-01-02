<?php
class MySQL {

	var $server;

	var $username;

	var $password;

	var $database;

	var $queries_stats;

	var $overall_stats;
	function __construct($server, $username, $password, $database) {
		$this->queries_stats = array();
		$this->overall_stats = 0;
		$this->conn = mysql_connect($server, $username, $password);
		if (!mysql_select_db($database, $this->conn)) {
			echo "shit out my Asssssssssssssssssssssssss";
		}
	}
	function isconnected() {
		if ($this->conn) {
			return true;
		}
		return false;
	}
	function escape_string($string) {
		$data = mysql_real_escape_string($string, $this->conn);
		return $data;
	}
	function checkall($exists) {
		foreach ( $exists as $one ) {
			if ($one) {
			} else {
				return false;
			}
		}
		return true;
	}
	function fetch_sql($sql_string, $multi = true) {
		$starttime = time() + microtime();
		$sql = mysql_query($sql_string, $this->conn);
		$stoptime = time() + microtime();
		$total = round($stoptime - $starttime, 4);
		$this->queries_stats[] = array("time" => $total, "string" => $sql_string);
		$this->overall_stats = $this->overall_stats + $total;
		$return = array();
		if ($sql) {
			while ($data = mysql_fetch_assoc($sql)) {
				$return_tmp = array($data);
				$return = array_merge($return_tmp, $return);
			}
		}
		if ($multi) {
			return $return;
		} else {
			return $return[0];
		}
	}
	function current_id() {
		global $apps_folder;
		//$handle = fopen($apps_folder."track.txt", "r");
		//$data = fread($handle, filesize($apps_folder."track.txt"));
		//fclose($handle);
		//$handle = fopen($apps_folder."track.txt","w");
		//fwrite($handle,($data+1));
		//fclose($handle);
		return $data;
	}
	/*function exec($sql_string){
		global $reference_folder;
		//$starttime = time() + microtime();
		$handle = fopen($reference_folder.$this->current_id().".txt","w");
		fwrite($handle,json_encode(array("action"=>"execute_sql","sql"=>$sql_string)));
		fclose($handle);
		//$stoptime = time() + microtime();
		//$total = round($stoptime - $starttime,4);
		//$this->queries_stats[]=array(
		//	"time"=>$total,
		//	"string"=>$sql_string
		//);
		return true;
	}*/
	function exec($sql_string) {
		$starttime = time() + microtime();
		$return = mysql_query($sql_string, $this->conn);
		if (!$return) {
			$this->error = mysql_error($this->conn);
		}
		$stoptime = time() + microtime();
		$total = round($stoptime - $starttime, 4);
		$this->queries_stats[] = array("time" => $total, "string" => $sql_string);
		$this->overall_stats = $this->overall_stats + $total;
		return $return;
	}
	function exec_shell($sql_string) {
		$starttime = time() + microtime();
		$return = mysql_query($sql_string, $this->conn);
		$stoptime = time() + microtime();
		$total = round($stoptime - $starttime, 4);
		$this->queries_stats[] = array("time" => $total, "string" => $sql_string);
		$this->overall_stats = $this->overall_stats + $total;
		return $return;
	}
	function fetch($table, $data_array, $return = "", $multi = false) {
		$return_info = "";
		if ($return != "") {
			$return = explode(",", $return);
			$x = 1;
			foreach ( $return as $item ) {
				if ($x == 1) {
					$return_info = "`" . $item . "`";
				} else {
					$return_info .= ", `" . $item . "`";
				}
				$x = 2;
			}
		} else {
			$return_info = "*";
		}
		if (is_array($data_array)) {
			$x = 1;
			foreach ( $data_array as $key => $value ) {
				if ($x == 1) {
					$where = "`" . $key . "`='" . $value . "'";
				} else {
					$where .= " AND `" . $key . "`='" . $value . "'";
				}
				$x = 2;
			}
			$where_out = "WHERE " . $where;
		}
		$return = array();
		$starttime = time() + microtime();
		$sql = mysql_query("SELECT " . $return_info . " FROM `" . $table . "` " . $where_out, $this->conn);
		$stoptime = time() + microtime();
		$total = round($stoptime - $starttime, 4);
		$this->queries_stats[] = array("time" => $total, "string" => $sql_string);
		while ($data = mysql_fetch_assoc($sql)) {
			$return_tmp = array($data);
			$return = array_merge($return_tmp, $return);
		}
		$this->overall_stats = $this->overall_stats + $total;
		if ($multi) {
			return $return;
		} else {
			return $return[0];
		}
	}
	function fetch_by($table, $data_array, $return, $multi = false) {
		$return_info = "*";
		if (is_array($data_array)) {
			$x = 1;
			foreach ( $data_array as $key => $value ) {
				if ($x == 1) {
					$where = "`" . $key . "`='" . $value . "'";
				} else {
					$where .= " AND `" . $key . "`='" . $value . "'";
				}
				$x = 2;
			}
			$where_out = "WHERE " . $where;
		}
		$starttime = time() + microtime();
		$sql = mysql_query("SELECT " . $return_info . " FROM `" . $table . "` " . $where_out . " " . $return, $this->conn);
		$stoptime = time() + microtime();
		$total = round($stoptime - $starttime, 4);
		$this->queries_stats[] = array("time" => $total, "string" => $sql_string);
		$return = array();
		while ($data = mysql_fetch_assoc($sql)) {
			$return_tmp = array($data);
			$return = array_merge($return_tmp, $return);
		}
		$this->overall_stats = $this->overall_stats + $total;
		if ($multi) {
			return $return;
		} else {
			return $return[0];
		}
	}
	function fetch_search($table, $data_array, $search, $return, $multi = false) {
		$return_info = "*";
		$x = 1;
		if (is_array($data_array)) {
			foreach ( $data_array as $key => $value ) {
				if ($x == 1) {
					$where = "`" . $key . "`='" . $value . "'";
					$x = 2;
				} else {
					$where .= " AND `" . $key . "`='" . $value . "'";
				}
			}
		}
		if ($x == 1) {
			$where = "`" . $search[0] . "` LIKE '%" . $search[1] . "%'";
		} else {
			$where .= " AND `" . $search[0] . "` LIKE '%" . $search[1] . "%'";
		}
		$where_out = "WHERE " . $where;
		$sql = mysql_query("SELECT " . $return_info . " FROM `" . $table . "` " . $where_out . " " . $return, $this->conn);
		$return = array();
		while ($data = mysql_fetch_assoc($sql)) {
			$return_tmp = array($data);
			$return = array_merge($return_tmp, $return);
		}
		if ($multi) {
			return $return;
		} else {
			return $return[0];
		}
	}
	function insert($table, $data_array, $where_array, $create = false) {
		$x = 1;
		foreach ( $data_array as $key => $value ) {
			$value = addslashes($value);
			if ($x == 1) {
				if ($table_info[$key]['Type'] == "int(11)" || $table_info[$key]['Type'] == "tinyint(1)") {
					$set = "`{$key}`={$value}";
				} else {
					$set = "`{$key}`='{$value}'";
				}
			} else {
				if ($table_info[$key]['Type'] == "int(11)" || $table_info[$key]['Type'] == "tinyint(1)") {
					$set .= ", `{$key}`={$value}";
				} else {
					$set .= ", `{$key}`='{$value}'";
				}
			}
			$x = 2;
		}
		if (is_array($where_array)) {
			foreach ( $where_array as $key => $value ) {
				if ($x == 1) {
					if ($table_info[$key]['Type'] == "int(11)" || $table_info[$key]['Type'] == "tinyint(1)") {
						$where = "`{$key}`={$value}";
					} else {
						$where = "`{$key}`='{$value}'";
					}
				} else {
					if ($table_info[$key]['Type'] == "int(11)" || $table_info[$key]['Type'] == "tinyint(1)") {
						$where .= " AND `{$key}`={$value}";
					} else {
						$where .= " AND `{$key}`='{$value}'";
					}
				}
				$x = 2;
			}
		}
		if (!$create) {
			$where = "WHERE {$where}";
		}
		$data = mysql_query("INSERT INTO `{$table}` SET {$set} {$where}", $this->conn);
		return $data;
	}
	function set($table, $data_array, $where_array) {
		$x = 1;
		foreach ( $data_array as $key => $value ) {
			if ($x == 1) {
				$set = "`" . $key . "`='" . $value . "'";
			} else {
				$set .= ", `" . $key . "`='" . $value . "'";
			}
			$x = 2;
		}
		$x = 1;
		if (is_array($where_array)) {
			foreach ( $where_array as $key => $value ) {
				if ($x == 1) {
					$where = "`" . $key . "`='" . $value . "'";
				} else {
					$where .= " AND `" . $key . "`='" . $value . "'";
				}
				$x = 2;
			}
		}
		$data = mysql_query("UPDATE `" . $table . "` SET " . $set . " WHERE " . $where, $this->conn);
		return $data;
	}
	function delete($table, $where_array) {
		if (is_array($where_array)) {
			$x = 1;
			foreach ( $where_array as $key => $value ) {
				if ($x == 1) {
					$where = "`" . $key . "`='" . $value . "'";
				} else {
					$where .= " AND `" . $key . "`='" . $value . "'";
				}
				$x = 2;
			}
			$where = "WHERE " . $where;
		}
		$data = mysql_query("DELETE FROM `" . $table . "` " . $where, $this->conn);
		return $data;
	}
	function check_exists($table, $where_array, $multi = false) {
		$exists = array();
		$exists_single = false;
		if (is_array($where_array)) {
			foreach ( $where_array as $key => $value ) {
				$query = mysql_query("SELECT * FROM `" . $table . "` WHERE `" . $key . "`='" . $value . "'", $this->conn);
				if (mysql_num_rows($query) == 1) {
					$exists[$key] = true;
					if ($exists_single == false) {
						$exists_single = true;
					}
				} else {
					$exists[$key] = false;
				}
			}
		}
		if ($multi) {
			return $exists;
		} else {
			return $exists_single;
		}
	}
	function check_exists_i($table, $where_array) {
		$exists = array();
		$exists_single = false;
		if (is_array($where_array)) {
			$x = 1;
			foreach ( $where_array as $key => $value ) {
				if ($x == 1) {
					$where = "`" . $key . "`='" . $value . "'";
				} else {
					$where .= " AND `" . $key . "`='" . $value . "'";
				}
				$x = 2;
			}
			$where = "WHERE " . $where;
		}
		$query = mysql_query("SELECT * FROM `" . $table . "` " . $where, $this->conn);
		if (mysql_num_rows($query) == 1) {
			$exists = true;
		} else {
			$exists = false;
		}
		return $exists;
	}
}
?>