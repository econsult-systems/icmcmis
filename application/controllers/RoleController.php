<?php
class RoleController extends Zend_Controller_Action
{
  public function init()
    {
        /* Initialize action controller here */
    }

 public function indexAction()
    {
       $roles = new Application_Model_DbTable_Role();
       $this->view->roles = $roles->fetchAll();
    }
    
    public function addAction()
    {
        $form = new Application_Form_Role();
        
        $form->submit->setLabel('Add');
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $role = $form->getValue('role');
                $description = $form->getValue('description');
                                
                $roles = new Application_Model_DbTable_Role();
                $roles->addRole($role, $description);
                
                $this->_helper->redirector('index');
                }
                else {
                    $form->populate($formData);
                    }
        }
}

    public function editAction()
    {
        $form = new Application_Form_Role();
        $form->submit->setLabel('Save');
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                
                $role_id = (int)$form->getValue('role_id');
                
                $role = $form->getValue('role');
                
                $description = $form->getValue('description');
                
                $roles = new Application_Model_DbTable_Role();
                $roles->updateRole($role_id, $role, $description);
                
                $this->_helper->redirector('index');
                }
                else {
                    $form->populate($formData);
                    }
        }
                    else {
                        $id = $this->_getParam('role_id', 0);
                        if ($id > 0) {
                            $roles = new Application_Model_DbTable_Role();
                            $form->populate($roles->getRole($id));
                        }
                    }
    }
    
    public function deleteAction()
    {
        if ($this->getRequest()->isPost()) {
            $del = $this->getRequest()->getPost('del');
            
            if ($del == 'Yes') {
                $id = $this->getRequest()->getPost('role_id');
                $roles = new Application_Model_DbTable_Role();
                $roles->deleteRole($id);
            }
            
            $this->_helper->redirector('index');
        }
        else {
            $id = $this->_getParam('role_id', 0);
            $roles = new Application_Model_DbTable_Role();
            $this->view->role = $roles->getRole($id);
        }
    }
 
    /**
     * Privileges section
     */
    
    public function allprivilegesAction()
    {
       $privileges = new Application_Model_DbTable_Privilege();
       $this->view->privileges = $privileges->fetchAll();
    }
    
    public function addprivilegeAction()
    {
        $form = new Application_Form_Privilege();
        
        $form->submit->setLabel('Add');
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $privilege = $form->getValue('privilege');
                $description = $form->getValue('description');
                                
                $roles = new Application_Model_DbTable_Privilege();
                $roles->addPrivilege($privilege, $description);
                
                $this->_helper->redirector('allprivileges');
                }
                else {
                    $form->populate($formData);
                    }
        }
}

 public function editprivilegeAction()
    {
        $form = new Application_Form_Privilege();
        $form->submit->setLabel('Save');
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                
                $privilege_id = (int)$form->getValue('privilege_id');
                
                $privilege = $form->getValue('privilege');
                
                $description = $form->getValue('description');
                
                $privileges = new Application_Model_DbTable_Privilege();
                
                $privileges->updatePrivilege($privilege_id, $privilege, $description);
                
                $this->_helper->redirector('allprivileges');
                }
                else {
                    $form->populate($formData);
                    }
        }
                    else {
                        $id = $this->_getParam('privilege_id', 0);
                        if ($id > 0) {
                            $privileges = new Application_Model_DbTable_Privilege();
                            $form->populate($privileges->getPrivilege($id));
                        }
                    }
    }
    
    public function deleteprivilegeAction()
    {
        if ($this->getRequest()->isPost()) {
            $del = $this->getRequest()->getPost('del');
            if ($del == 'Yes') {
                
                $id = $this->getRequest()->getPost('privilege_id');
                
                $privileges = new Application_Model_DbTable_Privilege();
                $privileges->deletePrivilege($id);
            }
            
            $this->_helper->redirector('allprivileges');
        }
        else {
            $id = $this->_getParam('privilege_id', 0);
            $privileges = new Application_Model_DbTable_Privilege();
            $this->view->privilege = $privileges->getPrivilege($id);
        }
    }
    

}