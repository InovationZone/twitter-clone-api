<?php

use Phinx\Db\Table\Column;
use Phinx\Migration\AbstractMigration;

class CreateTweetTable extends AbstractMigration
{
    public function change()
    {
        $col = new Column();

        $col->setName('id')
            ->setType('biginteger')
            ->setIdentity(true)
            ->setSigned(false);

        $table = $this->table('tweets', ['id' => false, 'primary_key' => 'id']);
        $table->addColumn($col)
            ->addColumn('user_id', 'integer', ['null' => true, 'signed' => false])
            ->addColumn('tweet', 'string', ['null'=> false, 'limit' => 140])
            ->addColumn('written_at', 'datetime', ['null'=> false])
            ->addForeignKey(
                'user_id',
                'users',
                'id',
                ['delete' => 'NO_ACTION', 'update' => 'NO_ACTION']
            )
            ->addTimestamps()
            ->create();
    }
}
