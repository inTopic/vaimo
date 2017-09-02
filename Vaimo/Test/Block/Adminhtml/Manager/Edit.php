<?php

/**
 * Class Vaimo_Test_Block_Adminhtml_Manager_Edit
 * @author Voronov RA
 */
class Vaimo_Test_Block_Adminhtml_Manager_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    protected function _construct()
    {
        $this->_blockGroup = 'vaimo_test';
        $this->_controller = 'adminhtml_manager';
    }

    /**
     * @return string
     * @author Voronov RA
     */
    public function getHeaderText()
    {
        $helper = Mage::helper('vaimo_test');
        $model = Mage::registry('current_user');

        if ($model->getId()) {
            return $helper->__("Edit Manager '%s'", $this->escapeHtml($model->getName()));
        } else {
            return $helper->__("Add Manager");
        }
    }

}