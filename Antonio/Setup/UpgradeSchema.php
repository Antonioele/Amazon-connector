<?php
namespace Aiello1\Antonio\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\DB\Ddl\Table;
class UpgradeSchema implements UpgradeSchemaInterface {
    private $installer;



    public function upgrade( SchemaSetupInterface $setup, ModuleContextInterface $context )
    {
        /** @var SchemaSetupInterface $installer */


        /** @var AdapterInterface $connection */
        $connection = $setup->getConnection();
        if (version_compare($context->getVersion(), '2.2.0', '<')) {


            $tables = [
                $this->createAccountTable( $setup)];
            foreach ($tables as $table) {
                $connection->createTable($table);
            }
        }

    }

    // channel_amazon_account

    private function createAccountTable( SchemaSetupInterface $installer): Table
    {
        return $installer->getConnection()->newTable(
            $installer->getTable('channel_amazon_account')
        )->addColumn(
            'merchant_id',
            Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'nullable' => false, 'unsigned' => true, 'primary' => true],
            'Merchant Id'
        )->addColumn(
            'setup_step',
            Table::TYPE_SMALLINT,
            null,
            ['nullable' => false, 'default' => 1],
            'Setup Step'
        )->addColumn(
            'is_active',
            Table::TYPE_SMALLINT,
            null,
            ['nullable' => false, 'default' => 2],
            'Is Active'
        )->addColumn(
            'seller_id',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Amazon Seller Id'
        )->addColumn(
            'country_code',
            Table::TYPE_TEXT,
            50,
            ['nullable' => false],
            'Service Id'
        )->addColumn(
            'base_url',
            Table::TYPE_TEXT,
            null,
            ['nullable' => false],
            'Base URL'
        )->addColumn(
            'name',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Account Name'
        )->addColumn(
            'email',
            Table::TYPE_TEXT,
            null,
            ['nullable' => false],
            'Email Address'
        )->addColumn(
            'base_url',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Base URL'
        )->addColumn(
            'consumer_key',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Consumer Key'
        )->addColumn(
            'consumer_secret',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Consumer Secret'
        )->addColumn(
            'access_token',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Access Token'
        )->addColumn(
            'access_secret',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Access Secret'
        )->addColumn(
            'report_run',
            Table::TYPE_BOOLEAN,
            null,
            ['nullable' => false, 'default' => 0],
            'All listing report run'
        )->addColumn(
            'created_on',
            Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false, 'default' => Table::TIMESTAMP_INIT],
            'Created On'
        )->addColumn(
            'uuid',
            Table::TYPE_TEXT,
            36,
            ['nullable' => false, 'comment' => 'UUID for merchant']
        )->addColumn(
            'last_updated',
            Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false, 'default' => Table::TIMESTAMP_INIT_UPDATE],
            'Last Updated'
        )->addIndex(
            $installer->getIdxName('merchant_id', ['merchant_id']),
            ['merchant_id']
       
        );
    }



}
