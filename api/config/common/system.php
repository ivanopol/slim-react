<?php

declare(strict_types=1);

return [
    'config' => [
        'debug' => (bool)getenv('APP_DEBUG'),
        'env' => getenv('APP_ENV') ?: 'prod',
    ],
];
