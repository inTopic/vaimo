<?php

/**
 * Class Vaimo_Test_Model_Relations
 *
 * @author Voronov RA
 */
class Vaimo_Test_Model_Relations extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('vaimotest/relations');
    }
}
