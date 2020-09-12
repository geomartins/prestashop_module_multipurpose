<?php
class MultipurposeTaskModuleFrontController extends ModuleFrontController{

    public function __construct(){
        parent::__construct();
    }

    public function init(){
        parent::init();
    }

    public function initContent(){
        parent::initContent();
        $this->context->smarty->assign(array());
        $this->setTemplate('module:multipurpose/views/templates/front/task.tpl');
    }
}