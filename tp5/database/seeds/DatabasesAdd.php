<?php

use think\migration\Seeder;

class DatabasesAdd extends Seeder
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $data = [
            [
                'title'     => 'localhost',
                'current'   => 0,
                'db_host'   => '127.0.0.1',
                'db_user'   => 'root',
                'db_pwd'    => 'root',
                'db_name'   => 'test',
                'db_prefix' => '',
                'db_port'   => '3306',
            ],
        ];

        $posts = $this->table('databases');
        $posts->insert($data)
            ->save();

    }
}
