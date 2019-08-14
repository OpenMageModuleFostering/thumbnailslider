<?php

class Dataman_Thumbnailslider_Model_Mysql4_Thumbnailslider extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the thumbnailslider_id refers to the key field in your database table.
        $this->_init('thumbnailslider/thumbnailslider', 'thumbnailslider_id');
    }
}