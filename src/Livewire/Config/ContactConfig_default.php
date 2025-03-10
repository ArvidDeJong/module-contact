<?php

return [
    "tab_title" => "firstname",
    "module_name" => [
        "single" => "Contact",
        "multiple" => "Contact"
    ],
    "ereg" => [
        "tables" => [
            'contacts' => [
                'variable' => 'contact',
                "select" =>
                [
                    'locale',
                    'company',
                    'title',
                    'sex',
                    'firstname',
                    'lastname',
                    'name',
                    'email',
                    'phone',
                    'address',
                    'address_nr',
                    'zipcode',
                    'city',
                    'country',
                    'birthdate',
                    'newsletters',
                    'subject',
                    'comment',
                    'internal_contact',
                    'ip',
                    'comment_client',
                    'comment_internal',
                    'option_1',
                    'option_2',
                    'option_3',
                    'option_4',
                    'option_5',
                    'option_6',
                    'option_7',
                    'option_8',
                ]
            ],
        ]
    ],
    "settings" => [
        "CONTACT_EMAIL_RECEIVERS" => [
            "title" => "Email ontvanger(s)",
            "type" => "email_receivers",
            "default" => env('MAIL_TO_ADDRESS'),
        ],
        "CONTACT_EMAIL_SUBJECT" => [
            "title" => "Email onderwerp",
            "type" => "text",
            "default" => 'Bedankt voor uw reactie',
        ],
        "CONTACT_EMAIL_WEBMASTER_SUBJECT" => [
            "title" => "Email onderwerp webmaster",
            "type" => "",
            "default" => 'Er is een reactie via de website',
        ],
        "CONTACT_EMAIL" => [
            "title" => "Email",
            "type" => "editor",
            "default" => '',
        ],
        "CONTACT_EMAIL_WEBMASTER" => [
            "title" => "Email webmaster",
            "type" => "",
            "default" => '',
        ],
    ],

    "fields" => [
        "locale" => [
            "active" => false,
            "type" => "text",
            "title" => "Taal",
            "read" => true,
            "edit" => true,
            "required" => false,
        ],
        "company" => [
            "active" => false,
            "type" => "text",
            "title" => "Bedrijfsnaam",
            "read" => true,
            "edit" => true,
            "required" => false,
        ],
        "title" => [
            "active" => false,
            "type" => "text",
            "title" => "Titel",
            "read" => true,
            "edit" => true,
            "required" => false,
        ],
        "sex" => [
            "active" => false,
            "type" => "text",
            "title" => "Geslacht",
            "read" => true,
            "edit" => true,
            "required" => false,
        ],
        "firstname" => [
            "active" => true,
            "type" => "text",
            "title" => "Voornaam",
            "read" => true,
            "edit" => true,
            "required" => false,
        ],
        "lastname" => [
            "active" => false,
            "type" => "text",
            "title" => "Achternaam",
            "read" => true,
            "edit" => true,
            "required" => false,
        ],
        "name" => [
            "active" => true,
            "type" => "text",
            "title" => "Naam",
            "read" => true,
            "edit" => true,
            "required" => false,
        ],
        "email" => [
            "active" => true,
            "type" => "text",
            "title" => "Email",
            "read" => true,
            "edit" => true,
            "required" => false,
        ],
        "phone" => [
            "active" => true,
            "type" => "text",
            "title" => "Telefoon",
            "read" => true,
            "edit" => true,
            "required" => false,
        ],
        "address" => [
            "active" => false,
            "type" => "text",
            "title" => "Adres",
            "read" => true,
            "edit" => true,
            "required" => false,
        ],
        "address_nr" => [
            "active" => false,
            "type" => "text",
            "title" => "Huisnummer",
            "read" => true,
            "edit" => true,
            "required" => false,
        ],
        "zipcode" => [
            "active" => false,
            "type" => "text",
            "title" => "Postcode",
            "read" => true,
            "edit" => true,
            "required" => false,
        ],
        "city" => [
            "active" => false,
            "type" => "text",
            "title" => "Woonplaats",
            "read" => true,
            "edit" => true,
            "required" => false,
        ],
        "country" => [
            "active" => false,
            "type" => "text",
            "title" => "Land",
            "read" => true,
            "edit" => true,
            "required" => false,
        ],
        "birthdate" => [
            "active" => false,
            "type" => "date",
            "title" => "Geboortedatum",
            "read" => true,
            "edit" => true,
            "required" => false,
        ],
        "subject" => [
            "active" => false,
            "type" => "text",
            "title" => "Onderwerp",
            "read" => true,
            "edit" => true,
            "required" => false,
        ],
        "comment" => [
            "active" => true,
            "type" => "textarea",
            "title" => "Opmerkingen",
            "read" => true,
            "edit" => true,
            "required" => false,
        ],
        "internal_contact" => [
            "active" => false,
            "type" => "text",
            "title" => "Contact intern",
            "read" => true,
            "edit" => true,
            "required" => false,
        ],
        "contactletters" => [
            "active" => false,
            "type" => "select",
            "title" => "Ontvang nieuwsbrief",
            "read" => true,
            "edit" => true,
            "required" => false,
            "options" => [
                "1" => "Ja",
                "0" => "Nee"
            ]
        ],
        "newsletters" => [
            "active" => false,
            "type" => "checkbox",
            "title" => "Nieuwsbrieven",
            "read" => true,
            "edit" => true,
            "required" => false,
        ],
        "ip" => [
            "active" => false,
            "type" => "text",
            "title" => "IP",
            "read" => true,
            "edit" => true,
            "required" => false,
        ],
        "comment_client" => [
            "active" => false,
            "type" => "textarea",
            "title" => "Opmerkingen klant",
            "read" => true,
            "edit" => true,
            "required" => false,
        ],
        "comment_internal" => [
            "active" => false,
            "type" => "textarea",
            "title" => "Opmerkingen intern",
            "read" => true,
            "edit" => true,
            "required" => false,
        ],
        "option_1" => [
            "active" => false,
            "type" => "text",
            "title" => "Optie 1",
            "read" => true,
            "edit" => true,
            "required" => false,
        ],
        "option_2" => [
            "active" => false,
            "type" => "text",
            "title" => "Optie 2",
            "read" => true,
            "edit" => true,
            "required" => false,
        ],
        "option_3" => [
            "active" => false,
            "type" => "text",
            "title" => "Optie 3",
            "read" => true,
            "edit" => true,
            "required" => false,
        ],
        "option_4" => [
            "active" => false,
            "type" => "text",
            "title" => "Optie 4",
            "read" => true,
            "edit" => true,
            "required" => false,
        ],
        "option_5" => [
            "active" => false,
            "type" => "text",
            "title" => "Optie 5",
            "read" => true,
            "edit" => true,
            "required" => false,
        ],
        "option_6" => [
            "active" => false,
            "type" => "text",
            "title" => "Optie 6",
            "read" => true,
            "edit" => true,
            "required" => false,
        ],
        "option_7" => [
            "active" => false,
            "type" => "text",
            "title" => "Optie 7",
            "read" => true,
            "edit" => true,
            "required" => false,
        ],
        "option_8" => [
            "active" => false,
            "type" => "text",
            "title" => "Optie 8",
            "read" => true,
            "edit" => true,
            "required" => false,
        ],
    ]


];
