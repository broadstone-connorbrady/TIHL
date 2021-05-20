<?php

use PhpAmqpLib\Message\AMQPMessage;

return [
    /* Default connection */
    'default'     => env('AMQP_CONNECTION', 'rabbitmq'),

    /*Available connections*/
    'connections' => [

        'rabbitmq' => [
            'connection' => [
                'host'            => env('AMQP_HOST', 'rabbitmq'),
                'port'            => env('AMQP_PORT', 5672),
                'username'        => env('AMQP_USERNAME', 'guest'),
                'password'        => env('AMQP_PASSWORD', 'guest'),
                'vhost'           => env('AMQP_VHOST', '/'),
                'connect_options' => [],
                'ssl_options'     => [],
                'ssl_protocol'    => env('AMQP_SSL_PROTOCOL', 'ssl'),
            ],

            'channel_id' => null,

            'message' => [
                'content_type'     => 'text/plain',
                'delivery_mode'    => env('AMQP_MESSAGE_DELIVERY_MODE', AMQPMessage::DELIVERY_MODE_PERSISTENT),
                'content_encoding' => 'UTF-8',
            ],

            'exchange' => [
                'name'        => env('AMQP_EXCHANGE_NAME', 'amq.topic'),
                'declare'     => env('AMQP_EXCHANGE_DECLARE', true),
                'type'        => env('AMQP_EXCHANGE_TYPE', 'topic'),
                'passive'     => env('AMQP_EXCHANGE_PASSIVE', false),
                'durable'     => env('AMQP_EXCHANGE_DURABLE', true),
                'auto_delete' => env('AMQP_EXCHANGE_AUTO_DEL', false),
                'internal'    => env('AMQP_EXCHANGE_INTERNAL', false),
                'nowait'      => env('AMQP_EXCHANGE_NOWAIT', false),
                'properties'  => [],
            ],

            'consumer' => [
                'tag'        => env('AMQP_CONSUMER_TAG', ''),
                'no_local'   => env('AMQP_CONSUMER_NO_LOCAL', false),
                'no_ack'     => env('AMQP_CONSUMER_NO_ACK', false),
                'exclusive'  => env('AMQP_CONSUMER_EXCLUSIVE', false),
                'nowait'     => env('AMQP_CONSUMER_NOWAIT', false),
                'ticket'     => null,
                'properties' => [],
            ],

            'qos' => [
                'enabled'            => env('AMQP_QOS_ENABLED', false),
                'qos_prefetch_size'  => env('AMQP_QOS_PREF_SIZE', 0),
                'qos_prefetch_count' => env('AMQP_QOS_PREF_COUNT', 1),
                'qos_a_global'       => env('AMQP_QOS_GLOBAL', false),
            ],
        ],
    ],
];
