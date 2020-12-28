<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | such as the size rules. Feel free to tweak each of these messages.
    |
    */

    "accepted"         => "Le :attribute doit être accepté.",
    "active_url"       => "Le :attribute n'est pas une URL valide.",
    "after"            => "Le :attribute doit être une date postérieure au :date.",
    "alpha"            => "Le :attribute doit seulement contenir des lettres.",
    "alpha_dash"       => "Le :attribute doit seulement contenir des lettres, des chiffres et des tirets.",
    "alpha_num"        => "Le :attribute doit seulement contenir des chiffres et des lettres.",
    "before"           => "Le :attribute doit être une date antérieure au :date.",
    "between"          => array(
        "numeric" => "La valeur de :attribute doit être comprise entre :min et :max.",
        "file"    => "Le fichier :attribute doit avoir une taille entre :min et :max kilobytes.",
        "string"  => "Le texte :attribute doit avoir entre :min et :max caractères.",
    ),
    "confirmed"        => "Les mots de passe ne sont pas identique",
    "date"             => "Le :attribute n'est pas une date valide.",
    "date_format"      => "Le :attribute ne correspond pas au format :format.",
    "different"        => "Les champs :attribute et :other doivent être différents.",
    "digits"           => "Le :attribute doit avoir :digits chiffres.",
    "digits_between"   => "Le :attribute doit avoir entre :min and :max chiffres.",
    "email"            => "Le format du :attribute est invalide.",
    "exists"           => "Le :attribute sélectionné est invalide.",
    "image"            => "Le :attribute doit être une image.",
    "in"               => "Le :attribute est invalide.",
    "integer"          => "Le :attribute doit être un entier.",
    "ip"               => "Le :attribute doit être une adresse IP valide.",
    "max"              => array(
        "numeric" => "La valeur de :attribute ne peut être supérieure à :max.",
        "file"    => "Le fichier :attribute ne peut être plus gros que :max kilobytes.",
    ),
    "mimes"            => "Le :attribute doit être un fichier de type : :values.",
    "min"              => array(
        "numeric" => "La valeur de :attribute ne doit pas être inférieure à :min.",
        "file"    => "Le fichier :attribute ne doit pas être plus que gros que :min kilobytes.",
        "string"  => "Le texte :attribute doit contenir au moins :min caractères.",
    ),
    "not_in"           => "Le mot de passe saisi est trop facile à déviner.",
    "numeric"          => "Uniqument des chiffres",
    "regex"            => "Le format du :attribute est invalide.",
    "required"         => "Le :attribute est obligatoire.",
    "required_if"      => "Le :attribute est obligatoire quand la valeur de :other est :value.",
    "required_with"    => "Le :attribute est obligatoire quand :values est présent.",
    "required_without" => "Le :attribute est obligatoire quand :values n'est pas présent.",
    "same"             => "Les champs :attribute et :other doivent être identiques.",
    "size"             => array(
        "numeric" => "La taille de la valeur de :attribute doit être :size.",
        "file"    => "La taille du fichier de :attribute doit être de :size kilobytes.",
        "string"  => "Le texte de :attribute doit contenir :size caractères.",
    ),
    "unique"           => "La valeur du :attribute est déjà utilisée.",
    "url"              => "Le format de l'URL de :attribute n'est pas valide.",

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => array(),

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => array(),
);