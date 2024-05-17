<?php

class StaticVariable
{
    static $navbarPendeta = [
        [
            "isGroup" => true,
            "name" => "Jemaat",
            "navbars" => [
                [
                    "name" => "Data Jemaat",
                    "url" => "/pendeta/data/jemaat",
                    "icon" => '<i class="fa fa-users" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Pelayan Gereja",
            "navbars" => [
                [
                    "name" => "Lihat Data Pelayan",
                    "url" => "/pendeta/pelayangereja",
                    "icon" => '<i class="fa fa-user" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Tambah Pelayan",
                    "url" => "/pendeta/data/pelayan/add",
                    "icon" => '<i class="fa fa-user-plus" aria-hidden="true"></i>',
                ]
            ]
        ]
    ];

    static $user = null;
    static $navbarPengurusHarian = [
        [
            "isGroup" => true,
            "name" => "Keluarga",
            "navbars" => [
                [
                    "name" => "Data Keluarga",
                    "url" => "/pengurusharian/data/keluarga",
                    "icon" => '<i class="fa fa-users" aria-hidden="true"></i>',
                ]
            ]
        ],
        // Change Here...
        [
            "isGroup" => true,
            "name" => "Jemaat",
            "navbars" => [
                [
                    "name" => "Data Jemaat",
                    "url" => "/pengurusharian/data/jemaat",
                    "icon" => '<i class="fa fa-users" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Sektor",
            "navbars" => [
                [
                    "name" => "Data Sektor",
                    "url" => "/pengurusharian/data/sektor",
                    "icon" => '<i class="fa fa-users" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Tambah Sektor",
                    "url" => "/pengurusharian/data/sektor/add",
                    "icon" => '<i class="fa fa-plus" aria-hidden="true"></i>',
                ]
            ]
        ],
    ];
}
