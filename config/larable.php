<?php

return [
    'subscribe' => [
        /**
         * Use uuid as primary key.
         */
        'uuids' => false,

        /*
         * User tables foreign key name.
         */
        'user_foreign_key' => 'user_id',

        /*
         * Table name for subscriptions records.
         */
        'subscriptions_table' => 'subscriptions',

        /*
         * Model name for Subscribe record.
         */
        'subscription_model' => \Obydul\Larable\Subscribe\Subscription::class,
    ],
    'follow' => [
        /*
         * Use uuid as primary key.
         */
        'uuids' => false,

        /*
         * User tables foreign key name.
         */
        'user_foreign_key' => 'user_id',

        /*
         * Table name for followers table.
         */
        'followers_table' => 'followers',

        /**
         * Model class name for followers table.
         */
        'followables_model' => \Obydul\Larable\Follow\Followable::class,
    ],
];
