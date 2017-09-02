<?php

/**
 * Class Vaimo_Test_Block_Adminhtml_Manager
 * @author Voronov RA
 */
class Vaimo_Test_Block_Adminhtml_Manager extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'vaimo_test';
        $this->_controller = 'adminhtml_manager';

        parent::__construct();
    }
}