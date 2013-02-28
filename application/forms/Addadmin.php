<?php

class Application_Form_Addadmin extends Zend_Form{
    public function init(){
               parent::init();
       $this->addElement(new Zend_Form_Element_Text('nombre',array('label'=>'nombre',
                                                'required'=>TRUE)));
       $this->addElement(new Zend_Form_Element_Password('password ',array('label'=>'clave',
                                                'required'=>TRUE)));
       $this->addElement(new Zend_Form_Element_Submit('submint'));
        
}
    
}
?>
