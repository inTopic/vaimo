<?php

/**
 * create table with relateion custom postcode - managers
 * @author Voronov RA
 */

$tableName = 'vaimo_managers_postcode_relations';
$installer = $this;
$installer->startSetup();
$installer->run(
    "
    CREATE TABLE `{$tableName}` (
      `id` int(11) NOT NULL auto_increment,
      `postcode_id` int,
      `user_id` int,
      PRIMARY KEY  (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
"
);
$installer->endSetup();