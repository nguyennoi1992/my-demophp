<?php
class Model_DAO extends Zend_Db_Table {
	public $__connection;
    /**
     * 郢晢ｿｽ�ｽ郢ｧ�ｿ郢晏生�ｽ郢ｧ�ｹ邵ｺ�ｮ隴�ｿｽ�ｭ蜉ｱ縺慕ｹ晢ｽｼ郢晢ｿｽ
     * @var    string $_charCode
     * @access private
     */
    protected $_dbConfig = array(
    	'server' => 'localhost',
    	'database' => 'minimart',
    	'user' => 'root',
    	'password' => '',
    	'driver_options' => array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8;')
    	);
    /**
     * create connection
    */
    public function __construct() {
    	if (!$this->__connect()) {
    		die;
    	}
        ///$this->initText();
    }
    /**
     * Create Connect to dataBase Server
     * @params null
     * @return boolean
     */
    public function __connect() {
    	try {
            $this->__connection = new PDO(
                    'mysql:server='.$this->_dbConfig['server'].';database='.$this->_dbConfig['database'].';',
                    $this->_dbConfig['user'],
                    $this->_dbConfig['password']
            );
            $this->__connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    		return true;
    	} catch (PDOException $e) {
    		echo 'Connection failed: ' . $e->getMessage();
    		return false;
    	}
    }
    


	/** executeSql  function
	 * @param string $sql
	 * @param array $dataSet
	 * @param array $columnName
	 */
	public function executeSql($nameSPC,$param = null){
		try{
			$dataSet = array();
			$columnName = null;
			$this->_error = '';
			$sql = '';
			$sql .='EXECUTE ';
			$sql .=$nameSPC;
			$paramString = ' ';
			if(isset($param) && is_array($param)){
				foreach ( $param as $key => $value ) {
					$param[$key] = str_replace('\'', '\'\'', $value);
				}
				$paramString = implode("' , N'", $param);
				$paramString = " N'" . $paramString . "'";
			}
			$sql .= $paramString;
            // echo $sql;
			// get Adapter
			$this->sql=$sql;
			$executeFlag = $this->_executeSqlMultiSet($this->__connection, $sql, $dataSet, $columnName);
			return $dataSet;
		}catch(Exception $ex){
			$dataSet = array();
			return 2345;
			$this->_error = '鬮｣雋ｻ�ｿ�ｽ雎撰ｽｺ髫ｰ雋ｻ�ｿ�ｽ�ｽ�ｸ�ｽ�ｺ髯ｷ莨夲ｽｽ�ｱ驕ｶ莨�ｿｽ�ｽ�ｸ�ｽ�ｺ�ｽ�ｽ�ｽ�ｽ驍ｵ�ｺ鬯倩ｲｻ�ｽ�ｹ隴趣ｽ｢�ｽ�ｽ�ｽ�ｩ鬩幢ｽ｢隴趣ｽ｢�ｽ�ｽ�ｽ�ｼ鬩搾ｽｵ�ｽ�ｺ髫ｶ蜷ｩ�ｸ�ｻ鬯ｨ鬥ｴ�ｨ�ｾ陟�屮�ｽ�ｺ陋幢ｿｽ�ｽ�ｼ�ｽ�ｽ�ｽ�ｸ�ｽ�ｺ�ｽ�ｽ�ｽ�ｾ鬩搾ｽｵ�ｽ�ｺ髯ｷ莨夲ｽｽ�ｱ髫ｨ�ｳ�ｽ�ｽ . "\n"' . $e->getMessage();
			return($e);
		}
	}
	/** executeSql  function
	 * @param string $sql
	 * @param array $dataSet
	 * @param array $columnName
	 */
	public function getSql($nameSPC,$param = null){
		try{
			$dataSet = array();
			$columnName = null;
			$this->_error = '';
			$sql = '';
			$sql .='EXECUTE ';
			$sql .=$nameSPC;
			$paramString = ' ';
			if(isset($param) && is_array($param)){
				foreach ( $param as $key => $value ) {
					$param[$key] = str_replace('\'', '\'\'', $value);
				}
				$paramString = implode("' , N'", $param);
				$paramString = " N'" . $paramString . "'";
			}
			$sql .= $paramString;
			return $sql;
		}catch(Exception $ex){
			$dataSet = array();
			return 2345;
			$this->_error = '鬮｣雋ｻ�ｿ�ｽ雎撰ｽｺ髫ｰ雋ｻ�ｿ�ｽ�ｽ�ｸ�ｽ�ｺ髯ｷ莨夲ｽｽ�ｱ驕ｶ莨�ｿｽ�ｽ�ｸ�ｽ�ｺ�ｽ�ｽ�ｽ�ｽ驍ｵ�ｺ鬯倩ｲｻ�ｽ�ｹ隴趣ｽ｢�ｽ�ｽ�ｽ�ｩ鬩幢ｽ｢隴趣ｽ｢�ｽ�ｽ�ｽ�ｼ鬩搾ｽｵ�ｽ�ｺ髫ｶ蜷ｩ�ｸ�ｻ鬯ｨ鬥ｴ�ｨ�ｾ陟�屮�ｽ�ｺ陋幢ｿｽ�ｽ�ｼ�ｽ�ｽ�ｽ�ｸ�ｽ�ｺ�ｽ�ｽ�ｽ�ｾ鬩搾ｽｵ�ｽ�ｺ髯ｷ莨夲ｽｽ�ｱ髫ｨ�ｳ�ｽ�ｽ . "\n"' . $e->getMessage();
			return($e);
		}
	}
	/**
	 * SQL隴�ｿｽ�ｮ貅ｯ�｡譴ｧ蜃ｾ邵ｺ�ｮ驍ｨ蜈域｣｡郢ｧ�ｻ郢晢ｿｽ繝ｨ陷ｿ髢�ｽｾ�ｽ(1邵ｺ�､邵ｺ�ｮ驍ｨ蜈域｣｡郢ｧ�ｻ郢晢ｿｽ繝ｨ邵ｺ迹夲ｽｿ譁撰ｽ�SQL)
	 * @param  object $connection 隰暦ｽ･驍ｯ螢ｹ縺檎ｹ晄じ縺夂ｹｧ�ｧ郢ｧ�ｯ郢晢ｿｽ
	 * @param  string $sql        SQL隴�ｿｽ
	 * @param  array  $dataSet    驍ｨ蜈域｣｡郢ｧ�ｻ郢晢ｿｽ繝ｨ (陷ｿ繧会ｿｽ雋ゑｽ｡)
	 * @param  array  $columnName 陋ｻ諤憺倹郢ｧ�ｻ郢晢ｿｽ繝ｨ (陷ｿ繧会ｿｽ雋ゑｽ｡)
	 * @return bool   true:SQL陞ｳ貅ｯ�｡譴ｧ�ｽ陷会ｿｽ/ false:SQL陞ｳ貅ｯ�｡謔滂ｽ､�ｱ隰ｨ�ｽ
	 * @access public
	 */
	private function _executeSqlMultiSet($connection, $sql, &$dataSet, &$columnName) {
		try {
	        //SQL陞ｳ貅ｯ�｡�ｽ(郢晢ｿｽ�ｽ郢ｧ�ｿ陷ｿ髢�ｽｾ�ｽ
			$dataReturn = $connection->query($sql);
	        //$dataSet = array();return true;
			$sqlError   = $connection->errorInfo();
			if ($sqlError[0] != '00000') {
				return(false);
			}
	        //
			if ($dataReturn) {
	            //陷ｿ髢�ｽｾ蜉ｱ繝ｧ郢晢ｽｼ郢ｧ�ｿ隰ｨ�ｴ陟厄ｽ｢ -> 髫搾ｿｽ辟夐お蜈域｣｡郢ｧ�ｻ郢晢ｿｽ繝ｨ郢ｧ螳夲ｿｽ隲ｷ�ｮ
	            $columnName = array(); //郢ｧ�ｫ郢晢ｽｩ郢晢ｿｽ骭占愾髢�ｽｾ遉ｼ逡�
	            $dataSet    = array(); //驍ｨ蜈域｣｡郢ｧ�ｻ郢晢ｿｽ繝ｨ鬩滓ｦ奇ｿｽ陋ｹ荵溽舞
	            $index      = 0;       //驍ｨ蜈域｣｡郢ｧ�ｻ郢晢ｿｽ繝ｨ郢ｧ�､郢晢ｽｳ郢晢ｿｽ繝｣郢ｧ�ｯ郢ｧ�ｹ
	            do{
	                //驍ｨ蜈域｣｡郢ｧ�ｻ郢晢ｿｽ繝ｨ鬯�ｿｽ�ｬ�｡陷ｿ謔ｶ�願怎�ｺ邵ｺ�ｽ
	            	$table = $dataReturn->fetchAll(PDO::FETCH_ASSOC);
	                //
	            	if ($table) {
	                    //陋ｻ諤憺倹陷ｿ髢�ｽｾ�ｽ
	            		if (!$this->_executeSqlGetColumnName($table, $columnName, $index, $message)) {
	            			return(false);
	            		}
	                    //郢晢ｿｽ�ｽ郢晄じﾎ晁愾髢�ｽｾ�ｽ
	            		if (!$this->_executeSqlGetTable($table, $columnName, $index, $dataSet, $message)) {
	            			return(false);
	            		}
	            	} else {
	            		$columnName[$index] = null;
	            		$dataSet[$index]    = null;
	            	}
	                //
	                //驍ｨ蜈域｣｡郢ｧ�ｻ郢晢ｿｽ繝ｨ郢ｧ�ｫ郢ｧ�ｦ郢晢ｽｳ郢ｧ�ｿ郢晢ｽｼ郢ｧ�､郢晢ｽｳ郢ｧ�ｯ郢晢ｽｪ郢晢ｽ｡郢晢ｽｳ郢晢ｿｽ
	            	$index++;
	            } while ($dataReturn->nextRowset());
	        } else {
	        	return(false);
	        }
	        //
	        return(true);
	    } catch (Exception $e) {
	    	$this->_error = '闔�沺謔�ｸｺ蜉ｱ竊醍ｸｺ�ｽ縺顔ｹ晢ｽｩ郢晢ｽｼ邵ｺ讙主験騾墓ｺ假ｼ�ｸｺ�ｾ邵ｺ蜉ｱ笳�' . "\n" . $e->getMessage();
	    	return(false);
	    }
	}
	/**
	 * SQL隴�ｿｽ�ｮ貅ｯ�｡讙趣ｽｵ蜈域｣｡郢ｧ�ｻ郢晢ｿｽ繝ｨ邵ｺ�ｮ郢ｧ�ｫ郢晢ｽｩ郢晢ｿｽ骭占愾髢�ｽｾ�ｽ
	 * @param  array  $table      郢晢ｿｽ�ｽ郢ｧ�ｿ郢ｧ�ｻ郢晢ｿｽ繝ｨ邵ｺ�ｮ鬩滓ｦ奇ｿｽ
	 * @param  array  $columnName 陋ｻ諤憺倹隴ｬ�ｼ驍丞調逡鷹ｩ滓ｦ奇ｿｽ (陷ｿ繧会ｿｽ雋ゑｽ｡)
	 * @param  int    $index      驍ｨ蜈域｣｡郢ｧ�ｻ郢晢ｿｽ繝ｨ郢ｧ�､郢晢ｽｳ郢晢ｿｽ繝｣郢ｧ�ｯ郢ｧ�ｹ
	 * @param  string $message    郢ｧ�ｨ郢晢ｽｩ郢晢ｽｼ隴弱ｅﾎ鍋ｹ晢ｿｽ縺晉ｹ晢ｽｼ郢ｧ�ｸ (陷ｿ繧会ｿｽ雋ゑｽ｡) [郢晢ｿｽ繝ｵ郢ｧ�ｩ郢晢ｽｫ郢晢ｿｽ'']
	 * @return bool   true:陷ｿ髢�ｽｾ邇ｲ�ｽ陷会ｿｽ/ false:陷ｿ髢�ｽｾ諤懶ｽ､�ｱ隰ｨ�ｽ
	 * @access private
	 */
	private function _executeSqlGetColumnName($table, &$columnName, $index, &$message = '') {
		try {
			$columnName[$index] = array();
	        //
	        //髯ｦ譴ｧ辟夊ｭ帛ｳｨ��-> 郢ｧ�ｫ郢晢ｽｩ郢晢ｿｽ骭占愾髢�ｽｾ�ｽ
			if (count($table) > 0) {
	            //鬩滓ｦ奇ｿｽ邵ｺ�ｮ陷茨ｽｨ郢ｧ�ｭ郢晢ｽｼ陷ｿ髢�ｽｾ�ｽ
				$allKey = array_keys($table[0]);
	            //郢ｧ�ｭ郢晢ｽｼ陷ｿ髢�ｽｾ�ｽ
				$count = 0;
				foreach ($allKey as $key) {
	                //郢ｧ�ｫ郢晢ｽｩ郢晢ｿｽ骭占ｭｬ�ｼ驍擾ｿｽ
					$columnName[$index][$count] = $key;
					$count++;
				}
	            //郢晢ｽ｡郢晢ｽ｢郢晢ｽｪ髫暦ｽ｣隰ｾ�ｾ
				unset($key);
			}
			return(true);
		} catch (Exception $e) {
			$message = '闔�沺謔�ｸｺ蜉ｱ竊醍ｸｺ�ｽ縺顔ｹ晢ｽｩ郢晢ｽｼ邵ｺ讙主験騾墓ｺ假ｼ�ｸｺ�ｾ邵ｺ蜉ｱ笳� '. "\n" . $e->getMessage();
			return(false);
		}
	}
	
	/**
	 * 郢晢ｿｽ�ｽ郢晄じﾎ晉ｹ晢ｿｽ�ｽ郢ｧ�ｿ邵ｺ�ｮ陷ｿ髢�ｽｾ�ｽ
	 * @param  array  $table      郢晢ｿｽ�ｽ郢ｧ�ｿ郢ｧ�ｻ郢晢ｿｽ繝ｨ邵ｺ�ｮ鬩滓ｦ奇ｿｽ
	 * @param  string $columnName 陋ｻ諤憺倹
	 * @param  int    $index      驍ｨ蜈域｣｡郢ｧ�ｻ郢晢ｿｽ繝ｨ郢ｧ�､郢晢ｽｳ郢晢ｿｽ繝｣郢ｧ�ｯ郢ｧ�ｹ
	 * @param  array  $dataSet    驍ｨ蜈域｣｡郢ｧ�ｻ郢晢ｿｽ繝ｨ隴ｬ�ｼ驍丞調逡鷹ｩ滓ｦ奇ｿｽ (陷ｿ繧会ｿｽ雋ゑｽ｡)
	 * @param  string $message    郢ｧ�ｨ郢晢ｽｩ郢晢ｽｼ隴弱ｅﾎ鍋ｹ晢ｿｽ縺晉ｹ晢ｽｼ郢ｧ�ｸ (陷ｿ繧会ｿｽ雋ゑｽ｡) [郢晢ｿｽ繝ｵ郢ｧ�ｩ郢晢ｽｫ郢晢ｿｽ'']
	 * @return bool   true:陷ｿ髢�ｽｾ邇ｲ�ｽ陷会ｿｽ/ false:陷ｿ髢�ｽｾ諤懶ｽ､�ｱ隰ｨ�ｽ
	 * @access private
	 */
	private function _executeSqlGetTable($table, $columnName, $index, &$dataSet, &$message = '') {
		try {
	        //髯ｦ譴ｧ辟夊ｭ帛ｳｨ��-> 郢晢ｿｽ�ｽ郢晄じﾎ晉ｹ晢ｿｽ�ｽ郢ｧ�ｿ陷ｿ髢�ｽｾ�ｽ
			if (count($table) > 0) {
				$count  = 0;
				$i      = 0;
				$len = 0;
	            //
				foreach ($table as $row) {
					$dataSet[$index][$count] = array();
	                //
					$len = count($columnName[$index]);
					for ($i = 0; $i < $len; $i++) {
	                    //陋ｻ諤憺倹郢ｧ雋樊ｸ慕ｸｺ�ｫ郢晢ｿｽ�ｽ郢ｧ�ｿ陷ｿ髢�ｽｾ�ｽ
						$dataSet[$index][$count][$columnName[$index][$i]] = $row[$columnName[$index][$i]];
					}
					$count++;
				}
	            //郢晢ｽ｡郢晢ｽ｢郢晢ｽｪ髫暦ｽ｣隰ｾ�ｾ
				unset($row);
			} else {
				$dataSet[$index] = null;
			}
			return(true);
		} catch (Exception $e) {
			$message = '闔�沺謔�ｸｺ蜉ｱ竊醍ｸｺ�ｽ縺顔ｹ晢ｽｩ郢晢ｽｼ邵ｺ讙主験騾墓ｺ假ｼ�ｸｺ�ｾ邵ｺ蜉ｱ笳�' . "\n" . $e->getMessage();
			return(false);
		}
	}
	/**dataSetCheck funtion
	 * 
	 * 
	 * 
	 */
	public function dataSetCheck($dataSet, $index, $countFlag = true) {
		try {
			//
			if (!is_null($dataSet)) {
				if (is_array($dataSet)) {
					if (key_exists($index, $dataSet)) {
						if ($countFlag !== false) {
							if (!is_null($dataSet[$index])) {
								if ($countFlag !== false) {
									if (count($dataSet[$index]) > 0) {
										return(true);
									} else {
										return(false);
									}
								} else {
									return(true);
								}
							} else {
								return(false);
							}
						} else {
							//$dataSet[$index]鬩搾ｽｵ�ｽ�ｺ�ｽ�ｽ�ｽ�ｮ鬩幢ｽ｢隴趣ｽ｢�ｽ�ｿ�ｽ�ｽ�ｽ�ｽ�ｽ�ｽ鬩幢ｽ｢�ｽ�ｧ�ｽ�ｽ�ｽ�ｿ鬮ｫ�ｰ�ｽ�ｨ�ｽ�ｽ�ｽ�ｰ鬩搾ｽｵ�ｽ�ｺ�ｽ�ｽ�ｽ�ｯ鬮ｴ蜿厄ｽｻ繧托ｽｽ�ｽ�ｽ�｡鬯ｮ�ｫ陋ｹ�ｽ�ｽ�ｿ�ｽ�ｽ
							return(true);
						}
					} else {
						return(false);
					}
				} else {
					return(false);
				}
			} else {
				return(false);
			}
		} catch (Exception $e) {
			return(false);
		}
	}
}