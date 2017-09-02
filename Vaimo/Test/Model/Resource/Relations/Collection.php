<?php

/**
 * Class Vaimo_Test_Model_Resource_Relations_Collection
 * @author Voronov RA
 */
class Vaimo_Test_Model_Resource_Relations_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('vaimotest/relations');
    }
}