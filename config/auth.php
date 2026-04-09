<?php

return [
    'defaults' => [
        'guard' => 'petugas',
        'passwords' => 'petugas',
    ],

    'guards' => [
        'petugas' => [
            'driver' => 'session',
            'provider' => 'petugas',
        ],

        'pemohon' => [
            'driver' => 'session',
            'provider' => 'pemohon',
        ],
    ],

    'providers' => [
        'petugas' => [
            'driver' => 'eloquent',
            'model' => App\Models\Petugas::class,
        ],

        'pemohon' => [
            'driver' => 'eloquent',
            'model' => App\Models\Pemohon::class,
        ],
    ],

    'passwords' => [
        'petugas' => [
            'provider' => 'petugas',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        'pemohon' => [
            'provider' => 'pemohon',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],
];
