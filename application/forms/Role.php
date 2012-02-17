<?php

class Application_Form_Role extends Zend_Form
{
    public function init()
    {
        $this->setName('role');

        $role_id = new Zend_Form_Element_Hidden('role_id');
        $role_id->addFilter('Int');
                
        $role = new Zend_Form_Element_Text('role');
        $role->setLabel('Role Name')
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
        
        $this->addElements(array($role_id, $role, $description, $submit));
    }

}