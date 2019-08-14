<?php

class Dataman_Thumbnailslider_Model_Thumbnailslider extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('thumbnailslider/thumbnailslider');
    }
}