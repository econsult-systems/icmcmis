<?php
class UserController extends Zend_Controller_Action
{
  public function init()
    {
        /* Initialize action controller here */
    }

 public function indexAction()
    {
       $users = new Application_Model_DbTable_User();
       $this->view->users = $users->getAll();
    }
    
    public function addAction()
    {
        $form = new Application_Form_User();
        
        $form->submit->setLabel('Add');
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $person_id = $form->getValue('person_id');
                $username = $form->getValue('username');
                $creator_id = $form->getValue('creator_id');
               
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
                
                $users = new Application_Model_DbTable_User();
                $users->addUser($insert_id, $username, $creator_id);
                
                $this->_helper->redirector('index');
                }
                else {
                    $form->populate($formData);
                    }
        }
}

    public function editAction()
    {
        $form = new Application_Form_User();
        $form->submit->setLabel('Save');
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $user_id = (int)$form->getValue('user_id');
                $person_id = (int)$form->getValue('person_id');
                $username = $form->getValue('username');
                $creator_id = $form->getValue('creator_id');
                
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
                
                $users = new Application_Model_DbTable_User();
                $users->updateUser($user_id, $person_id, $username, $creator_id);
                
                $users->updateUserPerson($person_id, $first_name, $surname, 
                        $given_name, $gender, $address, $phone_number, 
                        $alt_phone_number, $birthdate, $birthdate_estimate, 
                        $dead, $date_created, $created_by);
                
                $this->_helper->redirector('index');
                }
                else {
                    $form->populate($formData);
                    }
        }
                    else {
                        $id = $this->_getParam('user_id', 0);
                        if ($id > 0) {
                            $users = new Application_Model_DbTable_User();
                            $form->populate($users->getUser($id));
                        }
                    }
    }
    
    public function deleteAction()
    {
        if ($this->getRequest()->isPost()) {
            $del = $this->getRequest()->getPost('del');
            if ($del == 'Yes') {
                $id = $this->getRequest()->getPost('user_id');
                $users = new Application_Model_DbTable_User();
                $users->deleteUser($id);
            }
            
            $this->_helper->redirector('index');
        }
        else {
            $id = $this->_getParam('user_id', 0);
            $users = new Application_Model_DbTable_User();
            $this->view->user = $users->getUser($id);
        }
    }
 
}