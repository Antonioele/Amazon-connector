<?php
namespace Aiello1\Antonio\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\DB\Ddl\Table;
class UpgradeSchema implements UpgradeSchemaInterface {
    private $installer;
    private $deploymentConfig;

    public function __construct(
        \Magento\Framework\App\DeploymentConfig $deploymentConfig)
    {
        $this->deploymentConfig = $deploymentConfig;


    }


    public function upgrade( SchemaSetupInterface $setup, ModuleContextInterface $context )
    {

        if (version_compare($context->getVersion(), '1.1.0', '<')) {
            $this->installer = $setup;

            $this->installer->startSetup();
            $this->installGeneral();
            $this->installEbay();
            $this->installer->endSetup();
            return;

        }
    }
        private function installGeneral()
    {
        $listingTable = $this->installer->getConnection()->newTable($this->installer->getTable('antonio_listing'))
            ->addColumn(
                'id',
                Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'primary' => true, 'nullable' => false, 'auto_increment' => true]
            )
            ->addColumn(
                'account_id',
                Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false]
            )
            ->addColumn(
                'marketplace_id',
                Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false]
            )
            ->addColumn(
                'title',
                Table::TYPE_TEXT,
                255,
                ['nullable' => false]
            )
            ->addColumn(
                'store_id',
                Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false]
            )
            ->addColumn(
                'products_total_count',
                Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false, 'default' => 0]
            )
            ->addColumn(
                'products_active_count',
                Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false, 'default' => 0]
            )
            ->addColumn(
                'products_inactive_count',
                Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false, 'default' => 0]
            )
            ->addColumn(
                'items_active_count',
                Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false, 'default' => 0]
            )
            ->addColumn(
                'source_products',
                Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'nullable' => false, 'default' => 1]
            )
            ->addColumn(
                'additional_data',
                Table::TYPE_TEXT,
                null,
                ['default' => null]
            )
            ->addColumn(
                'component_mode',
                Table::TYPE_TEXT,
                10,
                ['default' => null]
            )
            ->addColumn(
                'auto_mode',
                Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'nullable' => false, 'default' => 0]
            )
            ->addColumn(
                'auto_global_adding_mode',
                Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'nullable' => false, 'default' => 0]
            )
            ->addColumn(
                'auto_global_adding_add_not_visible',
                Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'nullable' => false, 'default' => 1]
            )
            ->addColumn(
                'auto_website_adding_mode',
                Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'nullable' => false, 'default' => 0]
            )
            ->addColumn(
                'auto_website_adding_add_not_visible',
                Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'nullable' => false, 'default' => 1]
            )
            ->addColumn(
                'auto_website_deleting_mode',
                Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'nullable' => false, 'default' => 0]
            )
            ->addColumn(
                'update_date',
                Table::TYPE_DATETIME,
                null,
                ['default' => null]
            )
            ->addColumn(
                'create_date',
                Table::TYPE_DATETIME,
                null,
                ['default' => null]
            )
            ->addIndex('account_id', 'account_id')
            ->addIndex('marketplace_id', 'marketplace_id')
            ->addIndex('title', 'title')
            ->addIndex('store_id', 'store_id')
            ->addIndex('component_mode', 'component_mode')
            ->addIndex('auto_mode', 'auto_mode')
            ->addIndex('auto_global_adding_mode', 'auto_global_adding_mode')
            ->addIndex('auto_website_adding_mode', 'auto_website_adding_mode')
            ->addIndex('auto_website_deleting_mode', 'auto_website_deleting_mode')
            ->setOption('type', 'INNODB')
            ->setOption('charset', 'utf8')
            ->setOption('collate', 'utf8_general_ci');
        $this->installer->getConnection()->createTable($listingTable);


    }

        private function installEbay()
    {
        $ebayListingTable = $this->installer->getConnection()->newTable($this->installer->getTable('antonio_ebay_listing'))
            ->addColumn(
                'listing_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'primary' => true, 'nullable' => false]
            )
            ->addColumn(
                'products_sold_count',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false, 'default' => 0]
            )
            ->addColumn(
                'items_sold_count',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false, 'default' => 0]
            )
            ->addColumn(
                'auto_global_adding_template_category_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'default' => null]
            )
            ->addColumn(
                'auto_global_adding_template_other_category_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'default' => null]
            )
            ->addColumn(
                'auto_website_adding_template_category_id',
                Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'default' => null]
            )
            ->addColumn(
                'auto_website_adding_template_other_category_id',
                Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'default' => null]
            )
            ->addColumn(
                'template_payment_mode',
                Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'nullable' => false, 'default' => 1]
            )
            ->addColumn(
                'template_payment_id',
                Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'default' => null]
            )
            ->addColumn(
                'template_payment_custom_id',
                Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'default' => null]
            )
            ->addColumn(
                'template_shipping_mode',
                Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'nullable' => false, 'default' => 1]
            )
            ->addColumn(
                'template_shipping_id',
                Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'default' => null]
            )
            ->addColumn(
                'template_shipping_custom_id',
                Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'default' => null]
            )
            ->addColumn(
                'template_return_policy_mode',
                Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'nullable' => false, 'default' => 1]
            )
            ->addColumn(
                'template_return_policy_id',
                Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'default' => null]
            )
            ->addColumn(
                'template_return_policy_custom_id',
                Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'default' => null]
            )
            ->addColumn(
                'template_description_mode',
                Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'nullable' => false, 'default' => 1]
            )
            ->addColumn(
                'template_description_id',
                Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'default' => null]
            )
            ->addColumn(
                'template_description_custom_id',
                Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'default' => null]
            )
            ->addColumn(
                'template_selling_format_mode',
                Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'nullable' => false, 'default' => 1]
            )
            ->addColumn(
                'template_selling_format_id',
                Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'default' => null]
            )
            ->addColumn(
                'template_selling_format_custom_id',
                Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'default' => null]
            )
            ->addColumn(
                'template_synchronization_mode',
                Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'nullable' => false, 'default' => 1]
            )
            ->addColumn(
                'template_synchronization_id',
                Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'default' => null]
            )
            ->addColumn(
                'template_synchronization_custom_id',
                Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'default' => null]
            )
            ->addColumn(
                'product_add_ids',
                Table::TYPE_TEXT,
                null,
                ['default' => null]
            )
            ->addColumn(
                'parts_compatibility_mode',
                Table::TYPE_TEXT,
                10,
                ['default' => null]
            )
            ->addIndex('auto_global_adding_template_category_id', 'auto_global_adding_template_category_id')
            ->addIndex('auto_global_adding_template_other_category_id', 'auto_global_adding_template_other_category_id')
            ->addIndex('auto_website_adding_template_category_id', 'auto_website_adding_template_category_id')
            ->addIndex(
                'auto_website_adding_template_other_category_id',
                'auto_website_adding_template_other_category_id'
            )
            ->addIndex('items_sold_count', 'items_sold_count')
            ->addIndex('products_sold_count', 'products_sold_count')
            ->addIndex('template_description_custom_id', 'template_description_custom_id')
            ->addIndex('template_description_id', 'template_description_id')
            ->addIndex('template_description_mode', 'template_description_mode')
            ->addIndex('template_payment_custom_id', 'template_payment_custom_id')
            ->addIndex('template_payment_id', 'template_payment_id')
            ->addIndex('template_payment_mode', 'template_payment_mode')
            ->addIndex('template_return_policy_custom_id', 'template_return_policy_custom_id')
            ->addIndex('template_return_policy_id', 'template_return_policy_id')
            ->addIndex('template_return_policy_mode', 'template_return_policy_mode')
            ->addIndex('template_selling_format_custom_id', 'template_selling_format_custom_id')
            ->addIndex('template_selling_format_id', 'template_selling_format_id')
            ->addIndex('template_selling_format_mode', 'template_selling_format_mode')
            ->addIndex('template_shipping_custom_id', 'template_shipping_custom_id')
            ->addIndex('template_shipping_id', 'template_shipping_id')
            ->addIndex('template_shipping_mode', 'template_shipping_mode')
            ->addIndex('template_synchronization_custom_id', 'template_synchronization_custom_id')
            ->addIndex('template_synchronization_id', 'template_synchronization_id')
            ->addIndex('template_synchronization_mode', 'template_synchronization_mode')
            ->setOption('type', 'INNODB')
            ->setOption('charset', 'utf8')
            ->setOption('collate', 'utf8_general_ci');
        $this->installer->getConnection()->createTable($ebayListingTable);



    }



}
