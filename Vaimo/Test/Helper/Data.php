<?php

/**
 * Class Vaimo_Test_Helper_Data
 * @author Voronov RA
 */
class Vaimo_Test_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * using only for admin form edit
     *
     * @return array
     * @author Voronov RA
     */
    public function getCustomPostcodes()
    {
        /** @var Vaimo_Test_Model_Resource_Postcode_Collection $postcodesCollection */
        $postcodesCollection = Mage::getModel('vaimotest/postcode')->getCollection();
        $postcodesList = $postcodesCollection->getData();

        $result = array();
        foreach ($postcodesList as $key => $item) {
            $result[$key]['label'] = $item['name'];
            $result[$key]['value'] = $item['postcode_id'];
        }
        return $result;
    }

}
