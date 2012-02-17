<?php

class Application_Form_User extends Zend_Form
{

    public function init()
    {
        $this->setName('user');

        $user_id = new Zend_Form_Element_Hidden('user_id');
        $user_id->addFilter('Int');
        
        $person_id = new Zend_Form_Element_Hidden('person_id');
        $person_id->addFilter('Int');
        
        $username = new Zend_Form_Element_Text('username');
        $username->setLabel('Username')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
               
        $creator_id = new Zend_Form_Element_Text('creator_id');
        $creator_id->setLabel('Creator ID')
                ->setRequired(true)
                ->addValidator('NotEmpty')
                ->addFilter('Int');
        
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
        
$this->addElements(array($user_id, $person_id, $username, $creator_id, $first_name, $surname, 
            $given_name, $gender, $address, $phone_number, $alt_phone_number, 
            $birthdate,$birthdate_estimate, $dead, $date_created, $created_by, 
            $submit));
    }

}