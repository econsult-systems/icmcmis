<?php
class PatientController extends Zend_Controller_Action
{
  public function init()
    {
        /* Initialize action controller here */
    }

 public function indexAction()
    {
       $patients = new Application_Model_DbTable_Patient();
       
       $this->view->patients = $patients->getAll();
    }
    
    public function addAction()
    {
        $form = new Application_Form_Patient();
        
        $form->submit->setLabel('Add');
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $person_id = $form->getValue('person_id');
               
                $patients = new Application_Model_DbTable_Patient();
                $patients->addPatient($person_id);
                
                $this->_helper->redirector('index');
                }
                else {
                    $form->populate($formData);
                    }
        }
}

    public function editAction()
    {
        $form = new Application_Form_Patient();
        $form->submit->setLabel('Save');
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $patient_id = (int)$form->getValue('patient_id');
                $person_id = (int)$form->getValue('person_id');
                
                $patients = new Application_Model_DbTable_Patient();
                $patients->updatePatient($patient_id, $person_id);
                
                $this->_helper->redirector('index');
                }
                else {
                    $form->populate($formData);
                    }
            }
                    else {
                        $id = $this->_getParam('patient_id', 0);
                        if ($id > 0) {
                            $patients = new Application_Model_DbTable_Patient();
                            $form->populate($patients->getPatient($id));
                        }
                    }
}
    
    
    public function deleteAction()
    {
        if ($this->getRequest()->isPost()) {
            $del = $this->getRequest()->getPost('del');
            if ($del == 'Yes') {
                $id = $this->getRequest()->getPost('patient_id');
                $patients = new Application_Model_DbTable_Patient();
                $patients->deletePatient($id);
            }
            
            $this->_helper->redirector('index');
        }
        else {
            $id = $this->_getParam('patient_id', 0);
            $patients = new Application_Model_DbTable_Patient();
            $this->view->patient = $patients->getPatient($id);
        }
    }
 
}