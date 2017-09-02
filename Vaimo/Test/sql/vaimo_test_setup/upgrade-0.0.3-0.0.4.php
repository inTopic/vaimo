<?php

/**
 * create new user role and import some users
 * @author Voronov RA
 */

$installer = $this;

/** @var Vaimo_Test_Model_Resource_Postcode_Collection $postcodesCollection */
$postcodesCollection = Mage::getModel('vaimotest/postcode')->getCollection();
$postcodesList = $postcodesCollection->getData();

$accountManagers = array(
    array(
        'username'  => 'GU1 1',
        'firstname' => 'Dave',
        'lastname'  => 'Lister',
        'email'     => 'examplegui1@gmail.com',
        'password'  => '123123qw',
        'is_active' => 1
    ),
    array(
        'username'  => 'GU1 2',
        'firstname' => 'Arnold',
        'lastname'  => 'Rimmer',
        'email'     => 'examplegui2@gmail.com',
        'password'  => '123123qw',
        'is_active' => 1
    ),
    array(
        'username'  => 'GU1 3',
        'firstname' => 'Arthur',
        'lastname'  => 'Dent',
        'email'     => 'examplegui3@gmail.com',
        'password'  => '123123qw',
        'is_active' => 1
    ),
    array(
        'username'  => 'GU1 4',
        'firstname' => 'Ford',
        'lastname'  => 'Prefect',
        'email'     => 'examplegui4@gmail.com',
        'password'  => '123123qw',
        'is_active' => 1
    ),
);

foreach ($accountManagers as $key => $manager) {
    foreach ($postcodesList as $postCode) {
        if ($manager['username'] == $postCode['name']) {
            $accountManagers[$key]['custom_postcode_id'] = $postCode['postcode_id'];
        }
    }
}

$resources = Mage::getModel('admin/roles')->getResourcesList2D();
$role = Mage::getModel('admin/role')->setRoleName('Account Manager')->setRoleType('G')->setTreeLevel(1)->save();
if ($role->getRoleId()) {
    $rules = Mage::getModel('admin/rules')->setRoleId($role->getRoleId())->setResources($resources);
    $rules = Mage::getModel('admin/resource_rules')->saveRel($rules);
}


foreach ($accountManagers as $manager) {
    $user = Mage::getModel('admin/user');
    $user->setData($manager)->save();
    $user->setRoleIds(array($role->getRoleId()))
        ->setRoleUserId($user->getUserId())
        ->saveRelations();

    /** @var Vaimo_Test_Model_Relations $relations */
    $relations = Mage::getModel('vaimotest/relations')->load($user->getId(), 'user_id');
    $relations->setData(array('postcode_id' => $manager['custom_postcode_id'], 'user_id' => $user->getId()));
    $relations->save();

}

$setup = new Mage_Eav_Model_Entity_Setup('core_setup');
$installer->startSetup();

