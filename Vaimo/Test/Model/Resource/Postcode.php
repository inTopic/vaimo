<?php

/**
 * Class Vaimo_Test_Model_Resource_Postcode
 *
 * @author Voronov RA
 */
class Vaimo_Test_Model_Resource_Postcode extends Mage_Core_Model_Resource_Db_Abstract
{
    /**
     * Resource initialization
     */
    public function _construct()
    {
        $this->_init('vaimotest/postcode', 'postcode_id');
    }
}
