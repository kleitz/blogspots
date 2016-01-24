<?php

    $config = [
        "base_url" => "",
        "providers" => [
            "Google" => [ 
                "enabled" => true,
                "keys" => ["id" => "353882594479-j4itse9ilucsaer4ded7knutqp6lbc3o.apps.googleusercontent.com", 
                            "secret" => "frkHotnh5_5SrQrtBcd9393j"],
            ],
            "Facebook" => [
                "enabled" => true,
                "keys" => ["id" => "435015000027333", 
                            "secret" => "127ad0749b9e1502251ca5e64ff9bea0"],
                "scope"   => "email, public_profile, user_about_me, user_birthday, user_hometown",

            ],
            "Twitter" => [
                "enabled" => false, 
                "keys" => ["key" => "dkWQHNbHBNv6VbDcANW4b3ulA", 
                            "secret" => "fgSiOgYSFhZfoGK7vGYHirOdY1wOrHr0iOVpxmcQrxrzQ3BPfl"],
            ],
        ],
        "debug_mode" => false,
        "debug_file" => "",
    ];

    return $config;  