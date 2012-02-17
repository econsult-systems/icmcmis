<?php

class Application_Model_DbTable_Privilege extends Zend_Db_Table_Abstract
{

    protected $_name = 'privilege';

    public function getPrivilege($privilege_id)
    {
     $id = (int)$privilege_id;
        
     $select =$this->_db->select();
     
     $select->from(array('privilege'),
                    array('privilege_id','privilege','description'))
            ->where('privilege_id = ?', $id);
     
     $row = $this->getAdapter()->fetchRow($select);
        
        if (!$row) {
            throw new Exception("Could not find row $id");
            }
               return $row;
    }
    
public function addPrivilege($privilege, $description)
{
    $data = array(
        'privilege' => $privilege,
        'description' => $description);
    
    $this->insert($data);   
}

public function updatePrivilege($privilege_id, $privilege, $description)
{    
    $data = array(
        'privilege' => $privilege,
        'description' => $description);
    
    $this->update($data, 'privilege_id = '.(int)$privilege_id);
}

public function deletePrivilege($privilege_id)
{
    $this->delete('privilege_id =' . (int)$privilege_id);
}

}