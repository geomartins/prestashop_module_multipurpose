<?php
use Language;

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
        include_once($this->local_path.'sql/install.php');
        return  parent::install() && $this->registerHook('displayHome') && $this->installTab(); //install and attach it to displayHome hook
    }

    public function uninstall(){
        include_once($this->local_path.'sql/uninstall.php');
        return parent::uninstall() && $this->uninstallTab();
    }

    public function hookDisplayHome(){

        $this->context->smarty->assign(array(
            'MULTIPURPOSE_STR' => Configuration::get('MULTIPURPOSE_STR')
        ));
        
        
        //return 'This is the fucking random text from the module';
        return $this->display(__FILE__, 'views/templates/hook/home.tpl');
    }

    public function hookHeader(){  //[Head Section]

        Media::addJsDef(array(
            'mp_ajax' => $this->_path.'/ajax.php',
        ));

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
            'MULTIPURPOSE_STR' => Configuration::get('MULTIPURPOSE_STR'),
            'token' => $this->generateAdminToken(),
        ));
        return $this->display(__FILE__, 'views/templates/admin/configure.tpl');
    }


    private function installTab(){
        $tabId = (int) Tab::getIdFromClassName('AdminOrigin');
        if (!$tabId) {
            $tabId = null;
        }

        $tab = new Tab($tabId);
        $tab->active = 1;
        $tab->class_name = 'AdminOrigin';
        $tab->name = array();
        foreach (Language::getLanguages() as $lang) {
            $tab->name[$lang['id_lang']] = $this->l('Origin');
        }
        $tab->id_parent = (int) Tab::getIdFromClassName('ShopParameters');
        $tab->module = $this->name;

        return $tab->save();
    }

    private function uninstallTab()
    {
        $tabId = (int) Tab::getIdFromClassName('AdminOrigin');
        if (!$tabId) {
            return true;
        }

        $tab = new Tab($tabId);

        return $tab->delete();
    }


    public function getProductByCategoryID($id_category){

        $obj_cat = new Category($id_category, $this->context->language->id);
        $products = $obj_cat->getProducts($this->context->language->id, 0, 1000);

        $html = '<ol>';

        foreach($products as $pr){
            $html .= '<li>'.$pr['name'].'</li>';
        }

        $html .='</ol>';


        return $html;

    }

    public function generateAdminToken(){
       return $this->context->link->getAdminLink('AdminOrders');
        
        
    }

}