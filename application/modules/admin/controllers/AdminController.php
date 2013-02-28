<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Admin_AdminController extends Zend_Controller_Action
{               
    function init() {
        
    }
    function addAction(){
        $form=new Application_Form_Addadmin();
        $this->view->form=$form;
        if($this->getRequest()->isPost()){
            $datos= $this->getAllParams();
            if($form->isValid($datos)){
                $adm=new Application_Model_admin();
                $resultado= $adm->insert(array('nombre'=>$datos['nombre'],'password'=>$datos['password']));
                if ($resultado) {
                    $this->view->form->reset();
                    $this->view->mensaje = 'Se registro correctamente.';
                }
                else $this->view->mensaje = 'Error en registro.';
            }
        }
    }
    function loginAction(){
       
        $form= new Application_Form_Login();
        if($this->getRequest()->isPost()){
           
            if ($form->isValid($this->getAllParams())){
               $authapter=new Zend_Auth_Adapter_DbTable();
               $authapter->setTableName('admin')
                       ->setIdentityColumn('nombre')
                       ->setCredentialColumn('password');
               $authapter->setIdentity($form->getValue('usuario'));
               $authapter->setCredential($form->getValue('password')); 
               $auth=  Zend_Auth::getInstance();
               $result=$auth->authenticate($authapter);
                       
                if($result->isValid()){
                    return $this->redirect('/admin/admin/listar');     
                }
              else echo 'no valido';
            }
        }
        $this->view->form=$form;
    }
    
        function logoutAction(){
        Zend_Auth::getInstance()->clearIdentity();
        return $this->redirect('/admin/admin/login');
        
    }
    function testAction()
    {
                 $auth = Zend_Auth::getInstance();
        if (! $auth->hasIdentity()) {
            return $this->redirect('/admin/admin/login');
        }
        $this->view->mensaje = 'Buenas noches';

    }
    function listarAction(){
        $aux= new Application_Model_admin();
        $this->view->lista=$aux->fetchAll()->toArray();
    }
    
}
?>
