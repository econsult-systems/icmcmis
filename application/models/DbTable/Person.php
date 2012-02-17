<?php

class Application_Model_DbTable_Person extends Zend_Db_Table_Abstract
{

    protected $_name = 'person';

public function getPerson($id)
    {
        $id = (int)$id;
        $row = $this->fetchRow('person_id = ' . $id);
        
        if (!$row) {
            throw new Exception("Could not find row $id");
            }
            return $row->toArray();
    }


public function addPerson($first_name, $surname, $given_name, 
            $gender, $address, $phone_number, $alt_phone_number, $birthdate, 
            $birthdate_estimate, $dead, $date_created, $created_by)
{
    
    date_default_timezone_set('Africa/Nairobi');
    $date = date("Y-m-d H:i:s");
    
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
        'date_created'=>$date,
        'created_by'=>$created_by
            );
    $this->insert($data);   
    
    $insert_id =  $this->_db->lastInsertId();
    
    return $insert_id;
}


public function updatePerson($person_id, $first_name, $surname, $given_name, 
            $gender, $address, $phone_number, $alt_phone_number, $birthdate, 
            $birthdate_estimate, $dead, $date_created, $created_by)
{
    
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
    
    $this->update($data, 'person_id = '. (int)$person_id);
    
}

public function deletePerson($person_id)
{
    $this->delete('person_id =' . (int)$person_id);
}
    
}