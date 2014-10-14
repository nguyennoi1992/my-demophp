
<?php
class Model_Users extends Zend_Db_Table
{
	protected $_name="user";
	protected $_dbConfig = array(
			'server' => 'localhost',
			'database' => 'minimart',
			'user' => 'root',
			'password' => ''
	);
	
    function checkUnique($email)
    {
        $select = $this->_db->select()
                            ->from($this->_name,array('email'))
                            ->where('email=?',$email);
        $result = $this->getAdapter()->fetchOne($select);
        if($result){
            return true;
        }
        return false;
    }
}
?>
