<?php
class IndexController extends Zend_Controller_Action
{
  public function init()
    {
        /* Initialize action controller here */
    }

 public function indexAction()
    {
       $persons = new Application_Model_DbTable_Person();
       $this->view->persons = $persons->fetchAll();
    }
    
    public function addAction()
    {
        $form = new Application_Form_Person();
        
        $form->submit->setLabel('Add');
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                
                $request = $this->_getParam('request');
                
                $first_name = $form->getValue('first_name');
                $surname = $form->getValue('surname');
                $given_name = $form->getValue('given_name');
                $gender = $form->getValue('gender');
                $address = $form->getValue('address');
                $phone_number = $form->getValue('phone_number');
                $alt_phone_number = $form->getValue('alt_phone_number');
                $birthdate = $form->getValue('birthdate');
                $birthdate_estimate = $form->getValue('birthdate_estimate');
                $dead = $form->getValue('dead');
                $created_by = $form->getValue('created_by');
               
                $persons = new Application_Model_DbTable_Person();
                
                //addPerson returns last insert ID
                $insert_id = $persons->addPerson($first_name, $surname, 
                             $given_name, $gender, $address, $phone_number, 
                             $alt_phone_number, $birthdate,$birthdate_estimate, 
                             $dead, $date_created, $created_by);
                
                if($request=='patient'){
                $patient = new Application_Model_DbTable_Patient();
                $patient->addPatient($insert_id);
                
                $this->_helper->redirector('index');
                }
                
                else{
                    $this->_helper->redirector('index');
                }
            }
            
            else {
                $form->populate($formData);
            }
                    
        }
}

    public function editAction()
    {
        $form = new Application_Form_Person();
        $form->submit->setLabel('Save');
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $person_id = (int)$form->getValue('person_id');
                
                $first_name = $form->getValue('first_name');
                $surname = $form->getValue('surname');
                $given_name = $form->getValue('given_name');
                $gender = $form->getValue('gender');
                $address = $form->getValue('address');
                $phone_number = $form->getValue('phone_number');
                $alt_phone_number = $form->getValue('alt_phone_number');
                $birthdate = $form->getValue('birthdate');
                $birthdate_estimate = $form->getValue('birthdate_estimate');
                $dead = $form->getValue('dead');
                $date_created = $form->getValue('date_created');
                $created_by = $form->getValue('created_by');
                
                $persons = new Application_Model_DbTable_Person();
                
                $persons->updatePerson($person_id, $first_name, $surname, 
                             $given_name, $gender, $address, $phone_number, 
                             $alt_phone_number, $birthdate,$birthdate_estimate, 
                             $dead, $date_created, $created_by);
                
                $this->_helper->redirector('index');
                }
                else {
                    $form->populate($formData);
                    }
        }
                    else {
                        $id = $this->_getParam('person_id', 0);
                        if ($id > 0) {
                            $persons = new Application_Model_DbTable_Person();
                            $form->populate($persons->getPerson($id));
                        }
                    }
    }
    
    public function deleteAction()
    {
        if ($this->getRequest()->isPost()) {
            $del = $this->getRequest()->getPost('del');
            if ($del == 'Yes') {
                $id = $this->getRequest()->getPost('person_id');
                $persons = new Application_Model_DbTable_Person();
                $persons->deletePerson($id);
            }
            
            $this->_helper->redirector('index');
        }
        else {
            $id = $this->_getParam('person_id', 0);
            $persons = new Application_Model_DbTable_Person();
            $this->view->person = $persons->getPerson($id);
        }
    }
    
}