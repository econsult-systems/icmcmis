<?php

class Application_Form_RolePrivilege extends Zend_Form
{
    public function init()
    {
        $this->setName('role');

        $role_id = new Zend_Form_Element_Hidden('role_id');
        $role_id->addFilter('Int');      
                
        $privilege_id = new Zend_Form_Element_Hidden('privilege_id');
        $privilege_id->addFilter('Int');
        
        $role = new Zend_Form_Element_Text('role');
        $role->setLabel('Role Name')
             ->addFilter('StripTags')
             ->addFilter('StringTrim')
             ->setRequired(true)
             ->addValidator('NotEmpty');
        
        $privilege = new Zend_Form_Element_Text('privilege');
        $privilege->setLabel('Privilege')
                    ->addFilter('StripTags')
                    ->addFilter('StringTrim')
                    ->setRequired(true)
                    ->addValidator('NotEmpty');
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        
        $this->addElements(array($role_id, $privilege_id, $role, $privilege, $submit));
    }

}