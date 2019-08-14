<?php
class Dataman_Thumbnailslider_Block_Adminhtml_Thumbnailslider extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_thumbnailslider';
    $this->_blockGroup = 'thumbnailslider';
    $this->_headerText = Mage::helper('thumbnailslider')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('thumbnailslider')->__('Add Item');
    parent::__construct();
  }
}