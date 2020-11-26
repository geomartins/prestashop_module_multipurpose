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
        $this->context->smarty->assign(array(
            'nb_product' => Db::getInstance()->getValue('SELECT COUNT(*) FROM `'._DB_PREFIX_.'product`'),
            'categories' => Db::getInstance()->executeS('SELECT `id_category`, `name` FROM `'._DB_PREFIX_.'category_lang` WHERE `id_lang` = '.(int)$this->context->language->id),
            'shop_name' => Configuration::get('PS_SHOP_NAME'),
            'manufacturer' => Db::getInstance()->getRow('SELECT * FROM `'._DB_PREFIX_.'manufacturer`'),
        ));
        $this->setTemplate('module:multipurpose/views/templates/front/task.tpl');
    }

    public function setMedia(){
        parent::setMedia();
        $this->addJquery();
        $this->addJs(_PS_MODULE_DIR_.'/multipurpose/views/js/jquery.dataTables.js');
        $this->addJs(_PS_MODULE_DIR_.'/multipurpose/views/js/dataTables.bootstrap.js');
        $this->addJs(_PS_MODULE_DIR_.'/multipurpose/views/js/task.js');

        $this->addCSS(_PS_MODULE_DIR_.'/multipurpose/views/css/jquery.dataTables.css');
        $this->addCSS(_PS_MODULE_DIR_.'/multipurpose/views/css/dataTables.bootstrap.css');
        
    }

    public function loadProducts($start = 0, $length = 5, $sortby = 'id_product', $sortway = 'ASC'){

        $nb = Db::getInstance()->value('SELECT COUNT(*) FROM `'._DB_PREFIX_.'products`');
        $data = Db::getInstance()->executeS('SELECT p.`id_product`, p1.`name`, p.`price` FROM `'._DB_PREFIX_.'product` 
            LEFT JOIN  `'._DB_PREFIX_.'product_lang` p1 ON(p.`id_product` = p1.`id_product`) 
            WHERE p1.`id_lang` = '.(int)$this->context->language->id.'
            ORDER BY `'.$sortby.'` '.$sortway.'
            LIMIT '.(int)$start.', '.(int)$length);

        return array(
            'recordsTotal' => $nb,
            'recordsFiltered' => $nb,
            'data' => $data
        );
    }
}