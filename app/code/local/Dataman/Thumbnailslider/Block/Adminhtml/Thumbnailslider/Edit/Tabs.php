<?php

class Dataman_Thumbnailslider_Block_Adminhtml_Thumbnailslider_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('thumbnailslider_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('thumbnailslider')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('thumbnailslider')->__('Item Information'),
          'title'     => Mage::helper('thumbnailslider')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('thumbnailslider/adminhtml_thumbnailslider_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}