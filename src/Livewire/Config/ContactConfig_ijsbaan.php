<?php

return [
    "tab_title" => "firstname",
    "module_name" => [
        "single" => "Contact",
        "multiple" => "Contact"
    ],
    "fields" => [
        "locale" => [
            "active" => false,
            "type" => "text",
            "title" => "Taal",
            "read" => true,
            "required" => false,
        ],
        "company" => [
            "active" => false,
            "type" => "text",
            "title" => "Bedrijfsnaam",
            "read" => true,
            "required" => false,
        ],
        "title" => [
            "active" => false,
            "type" => "text",
            "title" => "Titel",
            "read" => true,
            "required" => false,
        ],
        "sex" => [
            "active" => false,
            "type" => "text",
            "title" => "Geslacht",
            "read" => true,
            "required" => false,
        ],
        "firstname" => [
            "active" => false,
            "type" => "text",
            "title" => "Voornaam",
            "read" => true,
            "required" => false,
        ],
        "lastname" => [
            "active" => false,
            "type" => "text",
            "title" => "Achternaam",
            "read" => true,
            "required" => false,
        ],
        "name" => [
            "active" => true,
            "type" => "text",
            "title" => "Naam",
            "read" => true,
            "required" => false,
        ],
        "email" => [
            "active" => true,
            "type" => "text",
            "title" => "Email",
            "read" => true,
            "required" => false,
        ],
        "phone" => [
            "active" => true,
            "type" => "text",
            "title" => "Telefoon",
            "read" => true,
            "required" => false,
        ],
        "address" => [
            "active" => false,
            "type" => "text",
            "title" => "Adres",
            "read" => true,
            "required" => false,
        ],
        "address_nr" => [
            "active" => false,
            "type" => "text",
            "title" => "Huisnummer",
            "read" => true,
            "required" => false,
        ],
        "zipcode" => [
            "active" => false,
            "type" => "text",
            "title" => "Postcode",
            "read" => true,
            "required" => false,
        ],
        "city" => [
            "active" => false,
            "type" => "text",
            "title" => "Woonplaats",
            "read" => true,
            "required" => false,
        ],
        "country" => [
            "active" => false,
            "type" => "text",
            "title" => "Land",
            "read" => true,
            "required" => false,
        ],
        "birthdate" => [
            "active" => false,
            "type" => "date",
            "title" => "Geboortedatum",
            "read" => true,
            "required" => false,
        ],
        "subject" => [
            "active" => false,
            "type" => "text",
            "title" => "Onderwerp",
            "read" => true,
            "required" => false,
        ],
        "comment" => [
            "active" => true,
            "type" => "textarea",
            "title" => "Opmerkingen",
            "read" => true,
            "required" => false,
        ],
        "internal_contact" => [
            "active" => false,
            "type" => "text",
            "title" => "Contact intern",
            "read" => true,
            "required" => false,
        ],
        "contactletters" => [
            "active" => false,
            "type" => "select",
            "title" => "Ontvang nieuwsbrief",
            "read" => true,
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
            "required" => false,
        ],
        "ip" => [
            "active" => false,
            "type" => "text",
            "title" => "IP",
            "read" => true,
            "required" => false,
        ],
    ]
];
