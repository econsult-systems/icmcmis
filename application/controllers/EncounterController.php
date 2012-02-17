<?php
class EncounterController extends Zend_Controller_Action
{
  public function init()
    {
        /* Initialize action controller here */
    }

 public function indexAction()
    {  
       $id = (int)$this->_getParam('patient_id', 0);
     
       if($id > 0){
       $encounters = new Application_Model_DbTable_Encounter();
      
       $this->view->encounters = $encounters->getAll($id);
       }
       
  }
    
    public function addAction()
    {
        $form = new Application_Form_Encounter();
        
        $form->submit->setLabel('Add');
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $patient_id = $this->_getParam('patient_id', 0);
                $received_by = $form->getValue('received_by');
                $encounter_type = $form->getValue('encounter_type');
                
                $encounters = new Application_Model_DbTable_Encounter();
                $encounters->addEncounter($patient_id, $received_by, $encounter_type);
                
                $this->_helper->redirector('index');

                }
                else {
                    $form->populate($formData);
                    }
        }
}

    public function editAction()
    {
        $form = new Application_Form_Encounter();
        $form->submit->setLabel('Save');
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $encounter_id = (int)$form->getValue('encounter_id');
                $patient_id = $this->_getParam('patient_id', 0);
                $date_of_encounter = $form->getValue('date_of_encounter');
                $received_by = $form->getValue('received_by');
                $encounter_type = $form->getValue('encounter_type');
                
                $encounters = new Application_Model_DbTable_Encounter();
                $encounters->updateEncounter($encounter_id, $patient_id, 
                        $date_of_encounter,$received_by, $encounter_type);
                
                $this->_helper->redirector('index');
                }
                else {
                    $form->populate($formData);
                    }
        }
                    else {
                        $id = $this->_getParam('encounter_id', 0);
                        if ($id > 0) {
                            $encounters = new Application_Model_DbTable_Encounter();
                            $form->populate($encounters->getEncounter($id));
                        }
                    }
    }
    
    public function deleteAction()
    {
        if ($this->getRequest()->isPost()) {
            $del = $this->getRequest()->getPost('del');
            if ($del == 'Yes') {
                $id = $this->getRequest()->getPost('encounter_id');
                $encounters = new Application_Model_DbTable_Encounter();
                $encounters->deleteEncounter($id);
            }
            
            $this->_helper->redirector('index');
        }
        else {
            $id = $this->_getParam('encounter_id', 0);
            $encounters = new Application_Model_DbTable_Encounter();
            $this->view->encounter = $encounters->getEncounter($id);
        }
    }
    
}