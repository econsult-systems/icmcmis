<?php

class Application_Form_Encounter extends Zend_Form
{
    public function init()
    {
        $this->setName('encounter');

        $encounter_id = new Zend_Form_Element_Hidden('encounter_id');
        $encounter_id->addFilter('Int');
        
        $patient_id = new Zend_Form_Element_Hidden('patient_id');
        $patient_id->addFilter('Int');
                
        $date_of_encounter = new Zend_Form_Element_Text('date_of_encounter');
        $date_of_encounter->setLabel('Date')
                          ->addFilter('StripTags')
                          ->addValidator('NotEmpty');
        
        $received_by = new Zend_Form_Element_Text('received_by');
        $received_by->setLabel('Received By')
                    ->addFilter('Int')
                    ->addValidator('NotEmpty');
        
        $encounter_type = new Zend_Form_Element_Text('encounter_type');
        $encounter_type->setLabel('Encounter Type')
             ->addFilter('Int')
             ->setRequired(true)
             ->addValidator('NotEmpty');
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        
        $this->addElements(array($encounter_id, $patient_id, $date_of_encounter,
            $received_by,$encounter_type,$submit));
    }

}