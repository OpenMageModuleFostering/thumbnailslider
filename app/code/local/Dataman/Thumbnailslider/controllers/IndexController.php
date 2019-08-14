<?php
class Dataman_Thumbnailslider_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/thumbnailslider?id=15 
    	 *  or
    	 * http://site.com/thumbnailslider/id/15 	
    	 */
    	/* 
		$thumbnailslider_id = $this->getRequest()->getParam('id');

  		if($thumbnailslider_id != null && $thumbnailslider_id != '')	{
			$thumbnailslider = Mage::getModel('thumbnailslider/thumbnailslider')->load($thumbnailslider_id)->getData();
		} else {
			$thumbnailslider = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($thumbnailslider == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$thumbnailsliderTable = $resource->getTableName('thumbnailslider');
			
			$select = $read->select()
			   ->from($thumbnailsliderTable,array('thumbnailslider_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$thumbnailslider = $read->fetchRow($select);
		}
		Mage::register('thumbnailslider', $thumbnailslider);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}