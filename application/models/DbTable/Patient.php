<?php
class Application_Model_DbTable_Patient extends Zend_Db_Table_Abstract
{

    protected $_name = 'patient';
    
    public function getAll()
    {
                
     $select =$this->_db->select();
     
     $select->from(array('pt'=>'patient'),
                    array('patient_id', 'person_id'))
            ->joinInner(array('ps'=>'person'),
			'pt.person_id=ps.person_id',
			array('first_name', 'surname','given_name',
                              'birthdate_estimate', 'gender'));
     
     $rows = $this->getAdapter()->fetchAll($select);
        
        if (!$rows) {
            throw new Exception("Could not find record");
            }
               return $rows;          
    }
    
    public function getPatient($id)
    {
        $id = (int)$id;
        //$row = $this->fetchRow('patient_id = ' . $id);
        
     $select =$this->_db->select();
     
     $select->from(array('pt'=>'patient'),
                    array('patient_id', 'person_id'))
            ->joinInner(array('ps'=>'person'),
			'pt.person_id=ps.person_id',
			array('gender'=>'gender'))
            ->where('pt.patient_id = ?',(int)$id);
     
     $rows = $this->getAdapter()->fetchAll($select);
        
        if (!$rows) {
            throw new Exception("Could not find row $id");
            }
           foreach ($rows as $row){
               return $row;
           }
    }


public function addPatient($person_id)
{ 
    $data = array(
        'person_id' => $person_id);
   
    $this->insert($data);   
}

public function updatePatient($patient_id, $person_id)
{    
    $data = array(
        'patient_id' => $patient_id,
        'person_id' => $person_id);
    
    $this->update($data, 'patient_id = '. (int)$patient_id);
}

public function deletePatient($patient_id)
{
    $this->delete('patient_id =' . (int)$patient_id);
}


}

