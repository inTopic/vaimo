<?php

/**
 * create table with custom postcodes and fill it
 * @author Voronov RA
 */

$installer = $this;
$installer->startSetup();
$installer->run(
    "
    CREATE TABLE `{$installer->getTable('vaimotest/postcode')}` (
      `postcode_id` int(11) NOT NULL auto_increment,
      `name` text,
      PRIMARY KEY  (`postcode_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    INSERT INTO `{$installer->getTable('vaimo_test/postcode')}` VALUES (1,'GU1 1'), (2, 'GU1 2'), (3, 'GU1 3'), (4, 'GU1 4');
"
);
$installer->endSetup();