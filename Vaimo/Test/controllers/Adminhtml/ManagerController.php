<?php

/**
 * Class Vaimo_Test_Adminhtml_ManagerController
 * @author Voronov RA
 */
class Vaimo_Test_Adminhtml_ManagerController extends Mage_Adminhtml_Controller_Action
{
    /**
     * index Action
     * @author Voronov RA
     */
    public function indexAction()
    {
        $this->loadLayout()
            ->_setActiveMenu('vaimotest')
            ->_title($this->__('Index Action'));

        $this->_addContent($this->getLayout()->createBlock('vaimo_test/adminhtml_manager'));
        $this->renderLayout();
    }

    /**
     * edit Action
     * @author Voronov RA
     */
    public function editAction()
    {
        $id = (int)$this->getRequest()->getParam('user_id');
        Mage::register('current_user', Mage::getModel('admin/user')->load($id));

        $this->loadLayout()->_setActiveMenu('account_manager');
        $this->_addContent($this->getLayout()->createBlock('vaimo_test/adminhtml_manager_edit'));
        $this->renderLayout();
    }

    /**
     * save Action
     * @author Voronov RA
     */
    public function saveAction()
    {
        if ($data = $this->getRequest()->getPost()) {
            try {
                $userId = $this->getRequest()->getParam('id');

                $model = Mage::getModel('admin/user')->load($userId);
                $model->addData($data);
                $model->save();

                $relations = Mage::getModel('vaimotest/relations')->load($userId, 'user_id');
                $relations->addData(array('postcode_id' => $data['custom_postcode_id'], 'user_id' => $userId));
                $relations->save();

                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Account information was saved'));
                Mage::getSingleton('adminhtml/session')->setFormData(false);
                $this->_redirect('*/*/');
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                $this->_redirect(
                    '*/*/edit', array(
                        'id' => $this->getRequest()->getParam('id')
                    )
                );
            }
            return;
        }
    }
}