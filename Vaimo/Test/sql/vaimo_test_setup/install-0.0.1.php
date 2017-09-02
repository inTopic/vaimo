<?php

/**
 * create custom postcode column
 * @author Voronov RA
 */

$installer = $this;
$installer->startSetup();

$installer->getConnection()->addColumn(
    $installer->getTable('admin/user'), 'custom_postcode_id', array(
    'type'    => Varien_Db_Ddl_Table::TYPE_INTEGER,
    'default' => null,
    'comment' => 'custom_postcode_id'
)
);

$installer->endSetup();