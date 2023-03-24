<?php

return [
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
    'subscriptions_table' => 'larable_subscriptions',

    /*
     * Model name for Subscribe record.
     */
    'subscription_model' => \Obydul\Larable\Subscribe\Subscription::class,
];
