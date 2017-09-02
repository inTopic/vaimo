<?php

/**
 * create 2 custom columns in order and order_grid tables with flag: is_managed
 * @author Voronov RA
 */

$installer = $this;
$installer->startSetup();

$installer->getConnection()
    ->addColumn(
        $installer->getTable('sales_flat_order_grid'), 'is_managed', array(
        'type'     => Varien_Db_Ddl_Table::TYPE_SMALLINT,
        'nullable' => false,
        'after'    => null,
        'default'  => 0,
        'comment'  => 'is_managed'
    )
    );

$installer->getConnection()
    ->addColumn(
        $installer->getTable('sales_flat_order'), 'is_managed', array(
        'type'     => Varien_Db_Ddl_Table::TYPE_SMALLINT,
        'nullable' => false,
        'after'    => null,
        'default'  => 0,
        'comment'  => 'is_managed'
    )
    );
$installer->endSetup();