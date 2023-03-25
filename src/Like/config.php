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
     * Table name for likes records.
     */
    'likes_table' => 'larable_likes',

    /*
     * Model name for like record.
     */
    'like_model' => \Obydul\Larable\Like\Like::class,
];
