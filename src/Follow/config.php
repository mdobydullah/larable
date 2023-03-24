<?php

return [
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
    'followers_table' => 'larable_followers',

    /**
     * Model class name for followers table.
     */
    'followers_model' => \Obydul\Larable\Follow\Followable::class,
];
