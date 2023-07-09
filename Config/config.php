<?php

declare(strict_types=1);

return [
    'name'        => 'MZagmajsterTokenBundle',
    'description' => 'Mautic Plugin Boilerplate <br /> <a href="https://maticzagmajster.ddns.net/">Website</a>',
    'version'     => '0.0.0',
    'author'      => 'Matic Zagmajster',

    'routes'      => [
        'main'   => [],  // end routes.main
        'public' => [],  // end routes.public
        'api'    => [],  // end routes.api
    ],  // end routes

    'services'    => [
        'events' => [
            'mautic.mztb.subscriber.email' => [
                'class'     => MauticPlugin\MZagmajsterTokenBundle\EventListener\EmailSubscriber::class,
                'arguments' => [],
            ],
        ],  // end services.events

        'models' => [
        ],  // end services.models

        'integrations' => [
        ],  // end services.integrations

        'forms' => [
        ],  // end services.forms

        'helpers' => [
        ],  // end services.helpers

        'other'        => [
        ],  // end services.other
    ],

    'menu'        => [],  // end menu
];
