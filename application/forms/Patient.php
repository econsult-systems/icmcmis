<?php

class Application_Form_Patient extends Zend_Form
{

    public function init()
    {
        $this->setName('patient');

        $patient_id = new Zend_Form_Element_Hidden('patient_id');
        $patient_id->addFilter('Int');
        
        $person_id = new Zend_Form_Element_Text('person_id');
        $person_id->setLabel('Person ID')
                  ->addFilter('Int');
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        
        $this->addElements(array($patient_id, $person_id, $submit));
    }

}