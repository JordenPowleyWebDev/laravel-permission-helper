<?php

return [
    'views-namespace'   => 'laravel-permission-helper',
    'roles-enum'        => JordenPowleyWebDev\LaravelPermissionHelper\Enums\UserRoles::class,
    'model-bindings'    => [
        'user'              => [
            'model'             => '', // App\Models\User::class,
            'policy'            => '', // App\Policies\UserPolicy::class,
        ]
    ]
];