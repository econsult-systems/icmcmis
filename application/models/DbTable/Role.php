<?php

class Application_Model_DbTable_Role extends Zend_Db_Table_Abstract
{

    protected $_name = 'role';

    public function getRole($role_id)
    {
     $id = (int)$role_id;
        
     $select =$this->_db->select();
     
     $select->from(array('role'),
                    array('role_id','role','description'))
            ->where('role_id = ?', $id);
     
     $row = $this->getAdapter()->fetchRow($select);
        
        if (!$row) {
            throw new Exception("Could not find row $id");
            }
               return $row;
    }
    
public function addRole($role, $description)
{
    $data = array(
        'role' => $role,
        'description' => $description);
    
    $this->insert($data);   
}

public function updateRole($role_id, $role, $description)
{    
    $data = array(
        'role' => $role,
        'description' => $description);
    
    $this->update($data, 'role_id = '.(int)$role_id);
}

public function deleteRole($role_id)
{
    $this->delete('role_id =' . (int)$role_id);
}

}