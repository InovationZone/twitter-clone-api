<?php

use Phinx\Db\Table\Column;
use Phinx\Migration\AbstractMigration;

class CreateUserTable extends AbstractMigration
{
    public function change()
    {
        $col = new Column();

        $col->setName('id')
            ->setType('integer')
            ->setIdentity(true)
            ->setSigned(false);

        $table = $this->table('users', ['id' => false, 'primary_key' => 'id']);
        $table->addColumn($col)
            ->addColumn('name', 'string', ['null'=> false])
            ->addColumn('email', 'string', ['null'=> false])
            ->addColumn('password', 'string', ['null'=> false])
            ->addIndex(['email'], ['unique' => true])
            ->addTimestamps()
            ->create();
    }
}
