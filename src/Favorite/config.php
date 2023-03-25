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
     * Table name for favorites records.
     */
    'favorites_table' => 'larable_favorites',

    /*
     * Model name for favorite record.
     */
    'favorite_model' => Obydul\Larable\Favorite\Favorite::class,
];
