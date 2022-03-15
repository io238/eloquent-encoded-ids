<?php

return [

    // Minimum length of encoded IDs
    'length'    => 5,

    // Alphabet to be used to generate encoded IDs
    'alphabet'  => '123456789abcdefghikmnpqrstuvwxyz',

    // Encryption salt
    // Warning: changing the salt, will produce different IDs
    'salt'      => env('APP_KEY'),

    // Use a prefix to the encoded ID, to be able to recognize the model that the ID belongs to
    'prefix'    => true,

    // Character used to separate the prefix from the encoded ID
    'separator' => '_',

];
