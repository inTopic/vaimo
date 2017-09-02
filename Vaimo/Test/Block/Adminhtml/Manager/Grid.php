<?php

/**
 * Class Vaimo_Test_Block_Adminhtml_Manager_Grid
 * @author Voronov RA
 */
class Vaimo_Test_Block_Adminhtml_Manager_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('vaimo_manager_grid');
        $this->setDefaultSort('username');
        $this->setDefaultDir('asc');
        $this->setUseAjax(true);
    }

    /**
     * @return $this
     * @author Voronov RA
     */
    protected function _prepareCollection()
    {
        $collection = Mage::getResourceModel('admin/user_collection');
        $collection->getSelect()
            ->join(array('ar' => 'admin_role'), 'ar.user_id = main_table.user_id', array('role_id', 'role_name'))
            ->join(
            array('relations' => 'vaimo_managers_postcode_relations'), 'relations.user_id = main_table.user_id',
            array('postcode_id', 'user_id'))
            ->join(
                array('postcode' => 'vaimo_custom_postcode'), 'relations.postcode_id = postcode.postcode_id',
                array('name')
            );
        $this->setCollection($collection);
        parent::_prepareCollection();
        return $this;
    }

    /**
     * @return $this
     * @throws Exception
     * @author Voronov RA
     */
    protected function _prepareColumns()
    {
        $this->addColumn('user_id', array(
            'header'    => Mage::helper('adminhtml')->__('ID'),
            'width'     => 5,
            'align'     => 'right',
            'sortable'  => true,
            'index'     => 'user_id'
        ));

        $this->addColumn('username', array(
            'header'    => Mage::helper('adminhtml')->__('User Name'),
            'index'     => 'username'
        ));

        $this->addColumn('role_name', array(
            'header'    => Mage::helper('adminhtml')->__('Role Name'),
            'sortable'  => true,
            'index'     => 'role_name'
        ));

        $this->addColumn('name', array(
            'header'    => Mage::helper('adminhtml')->__('Custom Postcode'),
            'index'     => 'name',
        ));

        return parent::_prepareColumns();
    }

    /**
     * @param $row
     *
     * @return string
     * @author Voronov RA
     */
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('user_id' => $row->getId()));
    }
}