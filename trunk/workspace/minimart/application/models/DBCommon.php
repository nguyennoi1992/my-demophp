<?php
/**
 * common class
 * @author Nguyen Hong Canh - ANS.ASIA
 * @version 1.0
 */
class Model_DBCommon extends Zend_Db_Table {
    protected $_db;
    public $sql;
    public function __construct() {
    	$this->_db = Zend_Registry::get('db');
    }
    /**
     * execute sql query
     * @param string $sql
     * @return Ambigous <multitype:, multitype:mixed Ambigous <string, boolean, mixed> >
     */
    public function execQuery($sql){
    	try {
    		$query = $this->_db->query($sql);
    		$val=$query->fetchAll();
    		return $val;
    	} catch (Exception $e) {
    		var_dump($e);
    	}
    }
    /**
     * select (col1, col2,...) from table where condition1 
     * @param string $tbl_nm : table name
     * @param array $cols
     * @param string $where
     * @param array  $order
     * @return array
     * @example selectDB('l0010', array('library_nm'), 'library_no = 1', array('library_no', 'library_cd'));
     */
	public function selectDB($tbl_nm, $cols, $where = NULL, $order = array(), $distinct = FALSE,$page=FALSE,$limit=FALSE) {
	    try {
	        $select = $this->_db->select();
	        if( $distinct )
	            $select = $select->distinct();
	        if( !isset($where) )
	            $select = $select->from($tbl_nm, $cols);
	        else
	            $select = $select->from($tbl_nm, $cols)->where($where);
	        $result = $select->order($order);
	        if($limit && $page)  $result = $select->limitPage($page,$limit);
	        return $this->_db->fetchAll($result);
	    } catch (Exception $e) {
	        var_dump($e);
	    }
	}
	public function getCount($tbl_nm, $col, $where = NULL) {
		try {
			$select = $this->_db->select()->from($tbl_nm, array(new Zend_Db_Expr("count(LPAD($col, 10, '0')) as countPrk")));
			if($where != null) {
				$select = $select->where($where);
			}
			$result = $this->_db->fetchRow($select);
			return $result['countPrk'];
		} catch (Exception $e) {
			var_dump($e);
		}
	}
	/**
	 * get max primakey
	 * @param string $tbl_nm
	 * @param string $col
	 * @param string $where
	 * @return max primakey
	 */
	public function getMaxPrk($tbl_nm, $col, $where = NULL) {
		try {
			$select = $this->_db->select()->from($tbl_nm, array(new Zend_Db_Expr("max(LPAD($col, 10, '0')) as maxPrk")));
			if($where != null) {
			    $select = $select->where($where);
			}
			$result = $this->_db->fetchRow($select);
			return $result['maxPrk'];
		} catch (Exception $e) {
		    var_dump($e);
		}
	}
	/**
	 * join table
	 * @param string $prk_tbl_nm : first table of join
	 * @param array $prk_cols : columns of first table
	 * @param array(array()) $join_tbl : array(table join, array(join condition), array(columns of join table))
	 * @param string $where: where condition string
	 * @param array  $order
	 * @return array
	 * @example $join_tbl = array(
                        array(  'join_typ' => 'left'
                            ,   'join_tbl' => 'd0010'
                            ,   'join_cond' => 'l0010.library_no = d0010.library_no'    
                            ,   'join_cols' => array('library_typ')
                        )
                    );
        joinDB('l0010', array('library_no', 'library_cd', 'library_nm'), $join_tbl, 'l0010.library_no = 1');
	 */
	public function joinDB($prk_tbl_nm, $prk_cols, $join_tbl, $where=NULL, $order = array(), $distinct = FALSE, $group = NULL,$page=FALSE,$limit=FALSE) {
		try {
		    $select = $this->_db->select();
		    if( $distinct )
		        $select = $select->distinct();
		    $select = $select->from($prk_tbl_nm, $prk_cols);
			foreach ( $join_tbl as $join ) {
			    $join_typ = $join['join_typ'];
			    switch ($join_typ) {
			    	case 'left':
    		    	    $select->joinLeft($join['join_tbl'], $join['join_cond'], $join['join_cols']);
    			    	break;
			    	case 'right':
    		    	    $select->joinRight($join['join_tbl'], $join['join_cond'], $join['join_cols']);
    		    	    break;
    	    	    case 'inner':
    	    	        $select->joinInner($join['join_tbl'], $join['join_cond'], $join['join_cols']);
    	    	        break;
	    	        case 'cross':
	    	            $select->joinCross($join['join_tbl'], $join['join_cols']);
	    	            break;
			    	default:
			    		;
			    	break;
			    }
			}
			if($where) $select->where( $where );
			if($order) $select->order( $order );
			if(is_array($group))
			{
			    foreach ($group as $val)
			    {
			        $select->group( $group );
			    }
			}
			else if($group) $select->group( $group );
			if($limit && $page)  $result = $select->limitPage($page,$limit);
			$this->sql=$select;
			return $this->_db->fetchAll($select);
		} catch (Exception $e) {
		    var_dump($e);
		}
	}
	/**
	 * insert data
	 * @param string $tbl_nm
	 * @param array $data
	 * @return string : result is error or ok
	 */
	public function insertDB($tbl_nm, $data) {
		try {
			$this->_db->beginTransaction();
			    $this->_db->insert($tbl_nm, $data);
			$this->_db->commit();
			return 'ok';
		} catch (Exception $e) {
		    $this->_db->rollBack();
		   return $e->getMessage();
		}
	}
	/**
	 * update data
	 * @param string $tbl_nm
	 * @param array $data
	 * @param string $where
	 * @return string : result is error or ok
	 */
	public function updateDB($tbl_nm, $data, $where) {
	    try {
	        $this->_db->beginTransaction();
	           $this->_db->update($tbl_nm, $data, $where);
	        $this->_db->commit();
	        return 'ok';
	    } catch (Exception $e) {
	        $this->_db->rollBack();
	        return $e->getMessage();
	    }
	}
	/**
	 * delete data
	 * @param string $tbl_nm
	 * @param string $where
	 * @return string : result is error or ok
	 */
	public function deleteDB($tbl_nm, $where) {
	    try {
	        $this->_db->beginTransaction();
	           $this->_db->delete($tbl_nm, $where);
	        $this->_db->commit();
	        return 'ok';
	    } catch (Exception $e) {
	        $this->_db->rollBack();
	        return $e->getMessage();
	    }
	}
	/**
	 * paging
	 * @param array  $data
	 * @param string $currentPage
	 * @param string $itemPerPage
	 * @param string $pageRange
	 * @return Ambigous <Zend_Paginator, Zend_Paginator>
	 */
	public function paginatorDB($data, $currentPage = '1', $itemPerPage = '20', $pageRange = '4') {
		try {
			$paginator = Zend_Paginator::factory($data);
			$paginator->setItemCountPerPage($itemPerPage);
			$paginator->setPageRange($pageRange);
			$paginator->setCurrentPageNumber($currentPage);
			return $paginator;
		} catch (Exception $e) {
		}
	}
}