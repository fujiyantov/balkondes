<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => true,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'superadministrator' => [
            'users' => 'c,r,u,d',
            'village' => 'c,r,u,d',
            'product' => 'c,r,u,d',
            'trip' => 'c,r,u,d',
            'transaction' => 'r,u,d',
        ],
        'admin' => [
            'product' => 'c,r,u,d',
            'trip' => 'c,r,u,d',
            'village' => 'c,r,u,d',
        ],
        'user' => [
            'village' => 'c,r,u',
        ],
        'member' => [
            'transaction' => 'c,r',
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
