<?php

return [

    // Minimum length of encoded IDs
    'length'           => 5,

    // Alphabet to be used to generate encoded IDs
    // By default this list excludes ambiguous characters
    'alphabet'         => '123456789abcdefghikmnpqrstuvwxyz',

    // Ignore uppercase/lowercase for encoded IDs
    'case-insensitive' => true,

    // Encryption salt
    // Warning: changing the salt, will produce different encoded IDs
    'salt'             => env('APP_KEY'),

    // Use a prefix to the encoded ID, to be able to recognize the model that the ID belongs to
    'prefix'           => true,

    // Character used to separate the prefix from the encoded ID
    'separator'        => '_',

];
