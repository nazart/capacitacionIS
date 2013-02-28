<?php

/*
 * To change this template, choose Tools | Template
 * and open the template in the editor.
 */
class Application_Form_Login extends Zend_Form{
    
   public function init() {
       parent::init();
       $this->addElement(new Zend_Form_Element_Text('usuario',array('label'=>'usuario',
                                                'required'=>TRUE)));
       $this->addElement(new Zend_Form_Element_Password('password ',array('label'=>'clave',
                                                'required'=>TRUE)));
       $this->addElement(new Zend_Form_Element_Submit('submint'));
       
       
   }
    
    
   
   
    
    
    
}

?>
