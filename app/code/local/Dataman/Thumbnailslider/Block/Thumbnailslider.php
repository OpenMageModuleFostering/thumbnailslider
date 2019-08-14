<?php
class Dataman_Thumbnailslider_Block_Thumbnailslider extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getThumbnailslider()     
     { 
        if (!$this->hasData('thumbnailslider')) {
            $this->setData('thumbnailslider', Mage::registry('thumbnailslider'));
        }
        return $this->getData('thumbnailslider');
        
    }
     public function getSilderCollection()     
     { 
       $collection = Mage::getModel('thumbnailslider/thumbnailslider')->getCollection()
        ->addFieldToFilter('status', 1)
        ->setOrder('position', 'asc');
       return $collection; 
    }
}