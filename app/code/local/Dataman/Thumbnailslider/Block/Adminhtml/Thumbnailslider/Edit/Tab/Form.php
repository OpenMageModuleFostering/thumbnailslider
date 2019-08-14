<?php

class Dataman_Thumbnailslider_Block_Adminhtml_Thumbnailslider_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('thumbnailslider_form', array('legend'=>Mage::helper('thumbnailslider')->__('Item information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('thumbnailslider')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));
      $fieldset->addField('url', 'text', array(
          'label'     => Mage::helper('thumbnailslider')->__('URL'),
          'required'  => false,
          'name'      => 'url',
	  ));

      $fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('thumbnailslider')->__('Image'),
          'required'  => false,
          'name'      => 'filename',
	  ));
      $fieldset->addField('thumbimage', 'file', array(
          'label'     => Mage::helper('thumbnailslider')->__('Thumb Image'),
          'required'  => false,
          'name'      => 'thumbimage',
	  ));
      $fieldset->addField('position', 'text', array(
          'label'     => Mage::helper('thumbnailslider')->__('Position'),
          'required'  => true,
          'name'      => 'position',
	  ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('thumbnailslider')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('thumbnailslider')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('thumbnailslider')->__('Disabled'),
              ),
          ),
      ));
     
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('thumbnailslider')->__('Content'),
          'title'     => Mage::helper('thumbnailslider')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getThumbnailsliderData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getThumbnailsliderData());
          Mage::getSingleton('adminhtml/session')->setThumbnailsliderData(null);
      } elseif ( Mage::registry('thumbnailslider_data') ) {
          $form->setValues(Mage::registry('thumbnailslider_data')->getData());
      }
      return parent::_prepareForm();
  }
}