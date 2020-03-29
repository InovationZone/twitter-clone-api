<?php

require_once __DIR__. '/vendor/autoload.php';

$dbConfig = CONFIG['databases']['mysql'];

return [
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/db/migrations',
        'seeds' => '%%PHINX_CONFIG_DIR%%/db/seeds'
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_database' => 'default',
        'default' =>
            [
                'adapter'   => $dbConfig['driver'],
                'host'      => $dbConfig['host'],
                'name'      => $dbConfig['database'],
                'user'      => $dbConfig['username'],
                'pass'      => $dbConfig['password'],
                'port'      => $dbConfig['port'],
                'charset'   => $dbConfig['charset'],
            ]
    ]
];
