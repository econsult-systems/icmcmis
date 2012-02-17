<?php

class Application_Model_DbTable_Encounter extends Zend_Db_Table_Abstract
{

    protected $_name = 'encounter';

    public function getAll($id)
    {
     $select =$this->_db->select();
     
     $select->from(array('e'=>'encounter'),
                    array('encounter_id', 'patient_id', 'encounter_type', 
                        'date_of_encounter', 'received_by'))
            ->joinInner(array('p'=>'patient'),
			'e.patient_id=p.patient_id',
			array('patient_id', 'person_id'))
            ->where('e.patient_id = ?', (int)$id);
     
     $rows = $this->getAdapter()->fetchAll($select);
        
        if (!$rows) {
            throw new Exception("Could not find encounters");
            }
            else{
            return $rows;
            }
    }
    
    public function checkEncounters($id)
    {
     $select =$this->_db->select();
     
     $select->from(array('e'=>'encounter'),
                    array('encounter_id', 'patient_id', 'encounter_type', 
                        'date_of_encounter', 'received_by'))
            ->joinInner(array('p'=>'patient'),
			'e.patient_id=p.patient_id',
			array('patient_id', 'person_id'))
            ->where('e.patient_id = ?', (int)$id);
     
     $rows = $this->getAdapter()->fetchAll($select);
        
        if (!$rows) {
            return false;
            }
            else{
            return true;
            }
    }
    
    
    public function getEncounter($id)
    {
     $id = (int)$id;
             
     $select =$this->_db->select();
     
     $select->from(array('e'=>'encounter'),
                    array('encounter_id', 'patient_id', 'encounter_type', 
                        'date_of_encounter', 'received_by'))
            ->joinInner(array('p'=>'patient'),
			'e.patient_id=p.patient_id',
			array('patient_id', 'person_id'))
            ->where('e.encounter_id = ?', $id);
     
     $rows = $this->getAdapter()->fetchAll($select);
        
        if (!$rows) {
            throw new Exception("Could not find record");
            }
           foreach ($rows as $row){
               return $row;
           }
    }


public function addEncounter($patient_id, $received_by, $encounter_type)
{
    date_default_timezone_set('Africa/Nairobi');
    $date = date("Y-m-d H:i:s");
    
    $data = array(
        'patient_id' => $patient_id,
        'date_of_encounter'=>$date,
        'received_by'=>$received_by,
        'encounter_type' => $encounter_type);
    
    $this->insert($data);   
}

public function updateEncounter($encounter_id, $patient_id, $date_of_encounter,
                                $received_by, $encounter_type)
{    
    $data = array(
        'patient_id' => $patient_id,
        'date_of_encounter'=>$date_of_encounter,
        'received_by'=>$received_by,
        'encounter_type' => $encounter_type);
    
    $this->update($data, 'encounter_id = '. (int)$encounter_id);
}

public function deleteEncounter($encounter_id)
{
    $this->delete('encounter_id =' . (int)$encounter_id);
}
    
}