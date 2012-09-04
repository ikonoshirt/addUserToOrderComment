<?php
/* @var $installer Mage_Sales_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();

$installer->getConnection()->addColumn(
    $installer->getTable('sales/order_status_history'),
    'admin_user_id',
    array(
        'type' => Varien_Db_Ddl_Table::TYPE_INTEGER,
        'nullable' => true,
        'default' => null,
        'comment' => 'Author'
    )
);

$installer->getConnection()->addForeignKey(
    $installer->getFkName(
        $installer->getTable('sales/order_status_history'),
        'admin_user_id',
        $installer->getTable('admin/user'),
        'user_id'
    ),
    $installer->getTable('sales/order_status_history'),
    'admin_user_id',
    $installer->getTable('admin/user'),
    'user_id',
    Varien_Db_Ddl_Table::ACTION_RESTRICT,
    Varien_Db_Ddl_Table::ACTION_RESTRICT
);

$installer->endSetup();