<?php

class Dataman_Thumbnailslider_Block_Adminhtml_Thumbnailslider_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('thumbnailsliderGrid');
      $this->setDefaultSort('thumbnailslider_id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('thumbnailslider/thumbnailslider')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
      $this->addColumn('thumbnailslider_id', array(
          'header'    => Mage::helper('thumbnailslider')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'thumbnailslider_id',
      ));

      $this->addColumn('title', array(
          'header'    => Mage::helper('thumbnailslider')->__('Title'),
          'align'     =>'left',
          'index'     => 'title',
      ));

	  /*
      $this->addColumn('content', array(
			'header'    => Mage::helper('thumbnailslider')->__('Item Content'),
			'width'     => '150px',
			'index'     => 'content',
      ));
	  */

       $this->addColumn('position', array(
          'header'    => Mage::helper('thumbnailslider')->__('Position'),
          'align'     =>'left',
          'index'     => 'position',
      )); 
       
      $this->addColumn('status', array(
          'header'    => Mage::helper('thumbnailslider')->__('Status'),
          'align'     => 'left',
          'width'     => '80px',
          'index'     => 'status',
          'type'      => 'options',
          'options'   => array(
              1 => 'Enabled',
              2 => 'Disabled',
          ),
      ));
	  
        $this->addColumn('action',
            array(
                'header'    =>  Mage::helper('thumbnailslider')->__('Action'),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('thumbnailslider')->__('Edit'),
                        'url'       => array('base'=> '*/*/edit'),
                        'field'     => 'id'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
        ));
		
		$this->addExportType('*/*/exportCsv', Mage::helper('thumbnailslider')->__('CSV'));
		$this->addExportType('*/*/exportXml', Mage::helper('thumbnailslider')->__('XML'));
	  
      return parent::_prepareColumns();
  }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('thumbnailslider_id');
        $this->getMassactionBlock()->setFormFieldName('thumbnailslider');

        $this->getMassactionBlock()->addItem('delete', array(
             'label'    => Mage::helper('thumbnailslider')->__('Delete'),
             'url'      => $this->getUrl('*/*/massDelete'),
             'confirm'  => Mage::helper('thumbnailslider')->__('Are you sure?')
        ));

        $statuses = Mage::getSingleton('thumbnailslider/status')->getOptionArray();

        array_unshift($statuses, array('label'=>'', 'value'=>''));
        $this->getMassactionBlock()->addItem('status', array(
             'label'=> Mage::helper('thumbnailslider')->__('Change status'),
             'url'  => $this->getUrl('*/*/massStatus', array('_current'=>true)),
             'additional' => array(
                    'visibility' => array(
                         'name' => 'status',
                         'type' => 'select',
                         'class' => 'required-entry',
                         'label' => Mage::helper('thumbnailslider')->__('Status'),
                         'values' => $statuses
                     )
             )
        ));
        return $this;
    }

  public function getRowUrl($row)
  {
      return $this->getUrl('*/*/edit', array('id' => $row->getId()));
  }

}