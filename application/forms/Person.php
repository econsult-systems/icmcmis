<?php

class Application_Form_Person extends Zend_Form
{

    public function init()
    {
        $this->setName('person');

        $person_id = new Zend_Form_Element_Hidden('person_id');
        $person_id->addFilter('Int');
        
        $first_name = new Zend_Form_Element_Text('first_name');
        $first_name->setLabel('First Name')
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->setRequired(true)
                ->addValidator('NotEmpty');
        
        $surname = new Zend_Form_Element_Text('surname');
        $surname->setLabel('Surname')
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->setRequired(true)
                ->addValidator('NotEmpty');
        
        $given_name = new Zend_Form_Element_Text('given_name');
        $given_name->setLabel('Other Name')
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->setRequired(false);
        
        $gender = new Zend_Form_Element_Select('gender');
        $gender->setLabel('Gender')
                ->setMultiOptions(array(
                    'male'=>'Male',
                    'female'=>'Female'))
                ->addValidator('NotEmpty');
        
        $address = new Zend_Form_Element_Text('address');
        $address->setLabel('Address')
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->setRequired(true)
                ->addValidator('NotEmpty');
        
        
        $phone_number = new Zend_Form_Element_Text('phone_number');
        $phone_number->setLabel('Phone Number')
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->setRequired(true)
                ->addValidator('NotEmpty');
                        
        $alt_phone_number = new Zend_Form_Element_Text('alt_phone_number');
        $alt_phone_number->setLabel('Other Phone No')
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->setRequired(false);
        
        $birthdate = new Zend_Form_Element_Text('birthdate');
        $birthdate->setLabel('Birthdate')
                ->addFilter('StripTags')
                ->addFilter('StringTrim');
        
        
        $birthdate_estimate = new Zend_Form_Element_Text('birthdate_estimate');
        $birthdate_estimate->setLabel('Age Estimate')
                ->addFilter('Int')
                ->setRequired(false);
        
        $dead = new Zend_Form_Element_Select('dead');
        $dead->setLabel('Alive')
                ->setMultiOptions(array(
                    '1'=>'Yes',
                    '0'=>'No'))
                ->addValidator('NotEmpty');
        
        $date_created = new Zend_Form_Element_Text('date_created');
        $date_created->setLabel('Date Created')
                ->setRequired(false)
                ->addFilter('StripTags')
                ->addFilter('StringTrim');
               
        $created_by = new Zend_Form_Element_Text('created_by');
        $created_by->setLabel('Creator')
                ->setRequired(true)
                ->addValidator('NotEmpty')
                ->addFilter('Int');
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        
        $this->addElements(array($person_id, $first_name, $surname, $given_name, 
            $gender, $address, $phone_number, $alt_phone_number, $birthdate, 
            $birthdate_estimate, $dead, $date_created, $created_by, $submit));
    }


}

