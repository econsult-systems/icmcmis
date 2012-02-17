<?php

class Application_Form_Privilege extends Zend_Form
{
    public function init()
    {
        $this->setName('privilege');

        $privilege_id = new Zend_Form_Element_Hidden('privilege_id');
        $privilege_id->addFilter('Int');
                
        $privilege = new Zend_Form_Element_Text('privilege');
        $privilege->setLabel('Privilege Name')
             ->addFilter('StripTags')
             ->addFilter('StringTrim')
             ->setRequired(true)
             ->addValidator('NotEmpty');
        
        $description = new Zend_Form_Element_Text('description');
        $description->setLabel('Description')
                    ->addFilter('StripTags')
                    ->addFilter('StringTrim')
                    ->setRequired(true)
                    ->addValidator('NotEmpty');
        
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        
        $this->addElements(array($privilege_id, $privilege, $description, $submit));
    }

}