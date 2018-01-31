<?php

use think\migration\db\Column;
use think\migration\Migrator;

class Databases extends Migrator
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        // create the table
        $table = $this->table('databases');
        $table
            ->addColumn('title', 'string', ['limit' => 32, 'default' => '', 'comment' => '连接名'])
            ->addColumn('current', 'integer', ['limit' => 1, 'default' => 0, 'comment' => '是否当前使用'])
            ->addColumn('db_host', 'string', ['limit' => 32, 'default' => '', 'comment' => 'DB_HOST'])
            ->addColumn('db_user', 'string', ['limit' => 32, 'default' => '', 'comment' => 'DB_USER'])
            ->addColumn('db_pwd', 'string', ['limit' => 32, 'default' => '', 'comment' => 'DB_PWD'])
            ->addColumn('db_name', 'string', ['limit' => 32, 'default' => '', 'comment' => 'DB_NAME'])
            ->addColumn('db_prefix', 'string', ['default' => '', 'comment' => 'DB_PREFIX'])
            ->addColumn('db_port', 'integer', ['limit' => 5, 'default' => '', 'comment' => 'DB_PORT'])
            ->create();
    }
}
