<?php
//Version 1.3
//Last Updated 14-2-2014




class Db extends Main
{
	public $sql = '';
	public $pdo;
	public $tail = '';
	public $last_id;
	public $oper = '=';
	public $logc = 'AND';
   
	private $charset = 'UTF8';
	private $options;
	private static $instance;
	
	

	 /**
	 * 
	 * @Function : __construct;
	 * @Param  $ : $options Array DB config ;
	 * @Return Void ;
	 */
	 
	 
	 
	 
	 
	public function __construct()
	{

		$dsn = $this->createdsn();
		$attrs = empty($options['charset']) ? array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES " . $this->charset) : array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES " . $options['charset']);
		try
		{
			$this->pdo = new PDO($dsn, $this->config['db_user'], $this->config['db_pass'], $attrs);
		}
		catch (PDOException $e)
		{
			echo 'Connection failed: ' . $e->getMessage();
		}
	}
	
	
	
	
	
	/*Single Tone CLass*/
	
	public static function getInstance()
    {
        if (!isset(self::$instance))
        {
            $object = __CLASS__;
            self::$instance = new $object;
        }
        return self::$instance;
    }
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/**
	 * 
	 * @Function : createdsn;
	 * @Param  $ : $options Array;
	 * @Return String ;
	 */
	 
	private function createdsn()
	{
	return $this->config['db_type'] . ':host=' . $this->config['db_host'] . ';dbname=' . $this->config['db_name'] . ';port=' . $this->config['db_port'];
	}

	/**
	 * 
	 * @Function : get_fields;
	 * @Param  $ : $data Array;
	 * @Return String ;
	 */
	 
	private function get_fields($data)
	{
		$fields = array();
		if (is_int(key($data)))
		{
			$fields = implode(',', $data);
		}
		else if (!empty($data))
		{
			$fields = implode(',', array_keys($data));
		}
		else
		{
			$fields = '*';
		}
		return $fields;
	}

	/**
	 * 
	 * @Function : get_condition;
	 * @Param  $ : $condition Array, $oper String, $logc String;
	 * @Return String ;
	 */
//	private function get_condition($condition, $oper = '=', $logc = 'AND')
   	private function get_condition($condition)
	{
      //Getting  Values default if not set otherwise set by user
        //  And by default for Logic
         // = by default for OPerand
      $oper = $this->oper;  
      $logc = $this->logc;
		$cdts = '';
		if (empty($condition))
		{
			return $cdts = '';
		}
		else if (is_array($condition))
		{
			$_cdta = array();
			foreach($condition as $k => $v)
			{
				if (!is_array($v))
			{					
					
					if (strtolower($oper) == 'like')
					{
						$v = '\'%' . $v . '%\'';
					}
					else if (is_string($v))
					{
						$v = '\'' . $v . '\'';
					}
					
				
					$_cdta[] = ' ' . $k . ' ' . $oper . ' ' . $v . ' ' ;
				}
				else if (is_array($v))
				{
					$_cdta[] = $this->split_condition($k, $v);
				}
			}
			$cdts .= implode($logc, $_cdta);
		}
      //Setting Default Values
      $this->oper = '=';
      $this->logc = 'AND';
		return $cdts;
	}

	/**
	 * 
	 * @Function : split_condition;
	 * @Param  $ : $field String, $cdt Array;
	 * @Return String ;
	 */
	private function split_condition($field, $cdt)
	{
		$cdts = array();
		$oper = empty($cdt[1]) ? '=' : $cdt[1];
		$logc = empty($cdt[2]) ? 'AND' : $cdt[2];
		if (!is_array($cdt[0]))
		{
			$cdt[0] = is_string($cdt[0]) ? "'$cdt[0]'" : $cdt[0];
		}
		else if (is_array($cdt[0]) || strtoupper(trim($cdt[1])) == 'IN')
		{
			$cdt[0] = '(' . implode(',', $cdt[0]) . ')';
		}

		$cdta[] = " $field $oper {$cdt[0]} ";
		if (!empty($cdt[3]))
		{
			$cdta[] = $this->get_condition($cdt[3]);
		}
		$cdts = ' ( ' . implode($logc, $cdta) . ' ) ';
		return $cdts;
	}

	/**
	 * 
	 * @Function : get_fields_datas;
	 * @Param  $ : $data Array;
	 * @Return Array ;
	 */
	private function get_fields_datas($data)
	{
		$arrf = $arrd = array();
		foreach($data as $f => $d)
		{
			$arrf[] = '`' . $f . '`';
			$arrd[] = $this->pdo->quote($d);
		}
		$res = array(implode(',', $arrf), implode(',', $arrd));
		return $res;
	}

	
	
	
	
	/**
	 * 
	 * @Function : getCount;
	 * @Param  $ : $sql query
	 * @Return ;
	 */
	
	public function getCount($table ,$condition = array())
	{
		
		
		$cdts = $this->get_condition($condition);
		$where = empty($condition) ? '' : ' where ' . $cdts;
		$this->sql = 'select count(*) from '.$table . $where;
	
		$sth = $this->pdo->prepare($this->sql);
		$sth->execute();
		$rows = $sth->fetchALL(PDO::FETCH_NUM);
        return $rows[0][0];

		
	}
	
	
	
	
	
	/**
	 * 
	 * @Function : generate SQL only;
	 * @Param  $ : table (String ) , condition (Array) , $colum Array ;
	 * @Return String sql query;
	 */
	
	public function gen_sql($table,$condition= array(),$column=array())
	{
		$fields = $this->get_fields($column);
		$cdts = $this->get_condition($condition);
			$where = empty($condition) ? '' : ' where ' . $cdts;
			$sql = 'select ' . $fields . ' from ' . $table . $where;
			$sql .= $this->tail;
			return $sql;
	}	
	
	
	/**
	 * 
	 * @Function : get_rows;
	 * @Param  $ : $table String, $getRes Boolean, $condition Array, $column Array;
	 * @Return Array |Object;
	 */
	public function get_rows($table,$condition = array(), $getRes = false, $column = array())
	{
		$fields = $this->get_fields($column);
		$cdts = $this->get_condition($condition);
		$where = empty($condition) ? '' : ' where ' . $cdts;
		$this->sql = 'select ' . $fields . ' from ' . $table . $where;
	
		
		
		try
		{
			$this->sql .= $this->tail;
			
			
			$rs = $this->pdo->query($this->sql);
		}
		catch(PDOException $e)
		{
			trigger_error("get_rows: ", E_USER_ERROR);
			echo $e->getMessage() . "<br/>\n";
		}
		

		$rs = $getRes ? $rs : $rs->fetchAll(PDO::FETCH_ASSOC);
		return $rs;
	}

	/**
	 * 
	 * @Function : get_all;
	 * @Param  $ : $table String, $condition Array, $getRes Boolean;
	 * @Return Array |Object;
	 */
	public function get_all($table, $getRes = false, $condition = array())
	{
		return $this->get_rows($table, $condition, $getRes);
	}

	/**
	 * 
	 * @Function : get_row;
	 * @Param  $ : $table String, $condition Array, $getRes Boolean, $column Array;
	 * @Return Array ;
	 */
	public function get_row($table, $condition = array(), $column = array())
	{
		$rs = $this->get_rows($table, $condition, true, $column);
		$rs = $rs ? $rs->fetch(PDO::FETCH_ASSOC) : $rs;
		return $rs;
	}
   
   
   /**
	 * 
	 * @Function : get_one;
	 * @Param  $ : $table String, $condition Array,  $column to be retrieved;
	 * @Return Array ;
	 */
	public function get_one($table, $condition = array(), $column = '')
	{
      $rs =	$this->get_row($table,$condition,array($column));
      if($rs) return $rs[$column];
      else 
      return false;
         
	}

	/**
	 * 
	 * @Function : insert;
	 * @Param  $ : $table String, $data Array;
	 * @Return Int ;
	 */
	public function insert($table, $data)
	{
		list($strf, $strd) = $this->get_fields_datas($data);
		$this->sql = 'insert into `' . $table . '` (' . $strf . ') values (' . $strd . '); ';
  
		$res =  $this->exec($this->sql, __METHOD__);
				$this->last_id = $this->pdo->lastInsertId();
				
				return $res;
		
	}

	/**
	 * 
	 * @Function : update;
	 * @Param  $ : $table String, $data Array, $condition Array;
	 * @Return Int ;
	 */
	public function update($table, $data, $condition)
	{
		$cdt = $this->get_condition($condition);
		$arrd = array();
		foreach($data as $f => $d)
		{
		  $d = $this->pdo->quote($d);
			$arrd[] = "`$f` = $d";
		}
		$strd = implode(',', $arrd);
		$this->sql = $d ='update ' . $table . ' set ' . $strd . ' where ' . $cdt;
		
		//echo $this->sql;
		return $this->exec($this->sql, __METHOD__);
	}

	/**
	 * 
	 * @Function : save;
	 * @Param  $ : $table String, $data Array, $condition Array;
	 * @Return Int ;
	 */
	public function save($table, $data, $condition = array())
	{
		$cdt = $this->get_condition($condition);
		list($strf, $strd) = $this->get_fields_datas($data);
		$has1 = $this->get_one($table, $condition);
		if (!$has1)
		{
			$enum = $this->insert($table, $data);
		}
		else
		{
			$enum = $this->update($table, $data, $condition);
		}
		return $enum;
	}

	/**
	 * 
	 * @Function : delete;
	 * @Param  $ : $table String, $condition Array;
	 * @Return Int ;
	 */
	public function delete($table, $condition)
	{
		$cdt = $this->get_condition($condition);
		$this->sql = 'delete from ' . $table . ' where ' . $cdt;
		return $this->exec($this->sql, __METHOD__);
	}

	/**
	 * 
	 * @Function : exec;
	 * @Param  $ : $sql, $method;
	 * @Return Int ;
	 */
	public function exec($sql, $method = '')
	{
		try
		{
			$this->sql = $sql . $this->tail;
			$efnum = $this->pdo->exec($this->sql);
		}
		catch(PDOException $e)
		{
			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
		}
		return intval($efnum);
	}

	/**
	 * 
	 * @Function : setLimit;
	 * @Param  $ : $start, $length;
	 * @Return ;
	 */
	public function set_limit($start = 0, $length = 20)
	{
		$this->tail = ' limit ' . $start . ', ' . $length;
	}
	
	
	
	
	
	public function qu($query,$case='fetch')
	{
		
		$sth= $this->pdo->prepare($query);
		$sth->execute($bind);
		
		if($case =='fetch')
		{
			return $sth->fetchALL(PDO::FETCH_ASSOC);
		}
		
		else 
		{
		  return $sth;
		}
		
		
		
	}
	
	
	public function ex($query, $rows = true ,$case ='fetch')
	{
		$sth= $this->pdo->prepare($query);
		$sth->execute();
		
		if($case =='fetch')
		{
			
			if ($rows)	return $sth->fetchALL(PDO::FETCH_ASSOC);
			else return $sth->fetch(PDO::FETCH_ASSOC);
		}
		
		else 
		{
		  return $sth;
		}
		
	}
	
	
	
	
	
	
	
	
	
	
	
}
?>