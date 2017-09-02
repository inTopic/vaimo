<?php

/**
 * Class Vaimo_Test_Block_Adminhtml_Manager_Edit_Form
 * @author Voronov RA
 */
class Vaimo_Test_Block_Adminhtml_Manager_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * @return Mage_Adminhtml_Block_Widget_Form
     * @author Voronov RA
     */
    protected function _prepareForm()
    {

        /** @var Vaimo_Test_Helper_Data $helper */
        $helper = Mage::helper('vaimo_test');
        $model = Mage::registry('current_user');


        /** here is something wrong with getRequest and getParam */
        $form = new Varien_Data_Form(
            array(
                'id'      => 'edit_form',
                'action'  => $this->getUrl(
                    '*/*/save', array(
                        'id' => $model->getId()
                    )
                ),
                'method'  => 'post',
                'enctype' => 'multipart/form-data'
            )
        );

        $this->setForm($form);

        $fieldset = $form->addFieldset('manager_form', array('legend' => $helper->__('Manager Information')));

        $fieldset->addField(
            'custom_postcode_id', 'select', array(
                'label'    => $helper->__('Custom Postcode'),
                'required' => true,
                'name'     => 'custom_postcode_id',
                'values'   => $helper->getCustomPostcodes()
            )
        );

        $form->setUseContainer(true);

        if ($data = Mage::getSingleton('adminhtml/session')->getFormData()) {
            $form->setValues($data);
        } else {
            $form->setValues($model->getData());
        }

        return parent::_prepareForm();
    }

}