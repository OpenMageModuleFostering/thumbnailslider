<?php

class Dataman_Thumbnailslider_Block_Adminhtml_Thumbnailslider_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'thumbnailslider';
        $this->_controller = 'adminhtml_thumbnailslider';
        
        $this->_updateButton('save', 'label', Mage::helper('thumbnailslider')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('thumbnailslider')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('thumbnailslider_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'thumbnailslider_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'thumbnailslider_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('thumbnailslider_data') && Mage::registry('thumbnailslider_data')->getId() ) {
            return Mage::helper('thumbnailslider')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('thumbnailslider_data')->getTitle()));
        } else {
            return Mage::helper('thumbnailslider')->__('Add Item');
        }
    }
}