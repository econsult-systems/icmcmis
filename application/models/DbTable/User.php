<?php

class Application_Model_DbTable_User extends Zend_Db_Table_Abstract
{

    protected $_name = 'user';

    public function getAll()
    {
     $select =$this->_db->select();
     
     $select->from(array('u'=>'user'),
                    array('user_id', 'person_id', 'username', 'creator_id'))
            ->joinInner(array('ps'=>'person'),
			'u.person_id=ps.person_id',
			array('first_name', 'surname','given_name',
                              'birthdate_estimate', 'gender'));
     
     $rows = $this->getAdapter()->fetchAll($select);
        
        if (!$rows) {
            throw new Exception("Could not find record");
            }
               return $rows;   
    }
    
    public function getUser($id)
    {
     $id = (int)$id;
             
     $select =$this->_db->select();
     
     $select->from(array('us'=>'user'),
                    array('user_id', 'person_id', 'username', 'creator_id'))
            ->joinInner(array('ps'=>'person'),
			'us.person_id=ps.person_id', 
                    array('first_name', 'surname','given_name','gender', 
                        'address', 'phone_number', 'alt_phone_number', 
                        'birthdate', 'birthdate_estimate', 'alive', 
                        'date_created', 'created_by'))
            ->where('us.user_id = ?', $id);
     
     $rows = $this->getAdapter()->fetchAll($select);
        
        if (!$rows) {
            throw new Exception("Could not find row $id");
            }
           foreach ($rows as $row){
               return $row;
           }
    }


public function addUser($person_id, $username, $creator_id)
{
    $data = array(
        'person_id' => $person_id,
        'username' => $username,
        'creator_id'=>$creator_id);
    
    $this->insert($data);   
}

public function updateUser($user_id, $person_id, $username,$creator_id)
{    
    $data = array(
        'person_id' => $person_id,
        'username' => $username,
        'creator_id'=>$creator_id);
    
    $this->update($data, 'user_id = '. (int)$user_id);
}

public function updateUserPerson($person_id, $first_name, $surname, $given_name, 
            $gender, $address, $phone_number, $alt_phone_number, $birthdate, 
            $birthdate_estimate, $dead, $date_created, $created_by)
{
    $persons = new Application_Model_DbTable_Person();
    
    $data = array(
        'first_name'=>$first_name,
        'surname'=>$surname,
        'given_name'=>$given_name,
        'gender' => $gender,
        'address' => $address,
        'phone_number' => $phone_number,
        'alt_phone_number' => $alt_phone_number,
        'birthdate' => $birthdate,
        'birthdate_estimate'=>$birthdate_estimate,
        'alive'=>$dead,
        'date_created'=>$date_created,
        'created_by'=>$created_by
        );
    
    $persons->update($data, 'person_id = '. (int)$person_id);
        
}


public function deleteUser($user_id)
{
    $this->delete('user_id =' . (int)$user_id);
}

}