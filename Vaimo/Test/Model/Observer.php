<?php

/**
 * Class Vaimo_Test_Model_Observer
 *
 * @author Voronov RA
 */
class Vaimo_Test_Model_Observer extends Varien_Event_Observer
{
    /**
     * save flag is_managed before order pushing
     *
     * @param $observer
     *
     * @throws Exception
     * @author Voronov RA
     */
    public function saveIsManagedValue($observer)
    {
        /** @var Mage_Sales_Model_Order $order */
        $order = $observer->getOrder();
        if ((int)$order->getBaseGrandTotal() >= 300) {
            $order->addData(array('is_managed' => 1));
            $order->save();
        }
    }
}