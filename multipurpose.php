<?php

class Multipurpose extends Module{

    public function __construct(){
        $this->name = 'multipurpose';
        $this->author = 'Martins Abiodun';
        $this->version = '1.0.0';
        $this->bootstrap = true;
        parent::__construct(); //calling the parent construct
        $this->displayName = $this->l("Multipurpose");
        $this->description = $this->l("This is the best multipurpose module you can find");
        $this->ps_versions_compliancy = array('min' => '1.7.0.0', 'max' => '1.7.99.99');

    }


    public function install(){
        return  parent::install() && $this->registerHook('displayHome'); //install and attach it to displayHome hook
    }

    public function uninstall(){
        return parent::uninstall();
    }

    public function hookDisplayHome(){

        $this->context->smarty->assign(array(
            'MULTIPURPOSE_STR' => Configuration::get('MULTIPURPOSE_STR')
        ));
        
        //return 'This is the fucking random text from the module';
        return $this->display(__FILE__, 'views/templates/hook/home.tpl');
    }

    public function hookHeader(){  //[Head Section]
        $this->context->controller->addCSS(array(
            $this->_path.'views/css/multipurpose.css'
        ));   
        $this->context->controller->addJS(array(
            $this->_path.'views/js/multipurpose.js'
        ));   
    }



    public function getContent(){

        if(Tools::isSubmit('savemultipurposesting')){
            $name = Tools::getValue('print');
            Configuration::updateValue('MULTIPURPOSE_STR',$name); //if html, set third parameter as true
        }

        $this->context->smarty->assign(array(
            'MULTIPURPOSE_STR' => Configuration::get('MULTIPURPOSE_STR')
        ));
        return $this->display(__FILE__, 'views/templates/admin/configure.tpl');
    }

}