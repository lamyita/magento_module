<?php namespace Egio\ControllerEgio\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
 
class UpgradeSchema implements UpgradeSchemaInterface
{
        public function upgrade( SchemaSetupInterface $setup, ModuleContextInterface $context ) {
                $installer = $setup;
 
                $installer->startSetup();
 
             
        if (!$setup->getConnection()->isTableExists($setup->getTable('reassurance'))) {
            $table = $setup->getConnection()
                ->newTable($setup->getTable('reassurance'))
                ->addColumn(
                    'reassurance_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                    'reassurance ID'
                )
                ->addColumn(
                    'Libelle',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    60,
                    ['nullable' => false, 'default' => 'simple'],
                    'Un naming destiné à être utilisé uniquement en backoffice (ex Zone1)'
                )
                ->addColumn(
                    'Description',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					['nullable' => false, 'default' => 'simple'],
                    'Micro-description (ex paiement sécurisé'
                )
				->addColumn(
                    'Icone',
                    \Magento\Framework\DB\Ddl\Table::TYPE_BLOB ,
					null,
					[ 'nullable' => true, 'default' => 'simple'],
                    'Icone de la garantie'
                )
			
				->addColumn(
                    'Alt',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					100,
					['nullable' => true, 'default' => 'simple'],
                    'Texte alt icone'
                )
				->addColumn(
                    'Statut',
                    \Magento\Framework\DB\Ddl\Table::TYPE_BOOLEAN,
					null,
					[ 'identity' => false, 'nullable' => false, 'primary' => true ],
                    'Permet de publier ou non l’élément'
                )
				->addColumn(
                    'Ordre',
                    \Magento\Framework\DB\Ddl\Table::TYPE_NUMERIC,
					null,
					['nullable' => false],
                    'Permet de contrôler la position de l’élément'
                )
				->addColumn(
                    'Lien',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					250,
					['nullable' => true, 'default' => 'simple'],
                    'Lien vers une page interne ou externet'
                )
				->addColumn(
                    'Title_du_lien',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					100,
					['nullable' => false, 'default' => 'simple'],
                    
                )
				->addColumn(
                    'Nouvelle_fenêtre',
                    \Magento\Framework\DB\Ddl\Table::TYPE_BOOLEAN,
					null,
					[ 'identity' => false, 'nullable' => false, 'primary' => false ],
                    'Par défaut non'
                )
				->addColumn(
					'Created',
					\Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
					null,
					[ 'nullable' => false ],
					'Creation Time'
				)
				->addColumn(
					'Modified',
					\Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
					null,
					[ 'nullable' => false ],
					'Modification Time'
				)
                ->setComment('Pfay Contacts Table')
                ->setOption('type', 'InnoDB')
                ->setOption('charset', 'utf8');

            $setup->getConnection()->createTable($table);
        }
        $setup->endSetup();
    }
}

// use Magento\Framework\Setup\UpgradeSchemaInterface;
// use Magento\Framework\Setup\ModuleContextInterface;
// use Magento\Framework\Setup\SchemaSetupInterface;
// use Magento\Catalog\Model\ResourceModel\Product\Gallery;
// use Magento\Catalog\Model\Product\Attribute\Backend\Media\ImageEntryConverter;

/**
 * Upgrade the Catalog module DB scheme
 */
// class UpgradeSchema implements UpgradeSchemaInterface
// {
    /**
    //  * {@inheritdoc}
     */
//     public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
//     {
//         $setup->startSetup();

//         if (version_compare($context->getVersion(), '0.2.0', '<')) {

//             $tableName = $setup->getTable('Egio_ControllerEgio');
//              $setup->getConnection()->addColumn($tableName, 'Alt', [
//                 'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
//                 'length'    => 100,
//                 'unsigned' => true,
//                 'nullable' => true,
//                 'default' => '0',
//                 'comment' => 'Texte alt icone'
//             ]);
//             $setup->getConnection()->addColumn($tableName, 'Ordre', [
//                 'type' => \Magento\Framework\DB\Ddl\Table::TYPE_NUMERIC,
//                 'length'    => 255,
//                 'unsigned' => true,
//                 'nullable' => false,
//                 'default' => '0',
//                 'comment' => 'Permet de contrôler la position de l’élément'
//             ]);
//             $setup->getConnection()->addColumn($tableName, 'Lien', [
//                 'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
//                 'length'    => 250,
//                 'unsigned' => true,
//                 'nullable' => true,
//                 'default' => '0',
//                 'comment' => 'Lien vers une page interne ou externet'
//             ]);

//         }
//         $setup->endSetup();
//     }
// }



