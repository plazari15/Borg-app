<?php


$factory->define(borg\Account::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'user_id' => 1,
        'cnpj' => '0051455151',
        'social' => 'Pedro Abucarma Lazari ',
        'website' => 'http://pedrolazari.com',
        'occupation' => '1',
        'cep' => '09560500',
        'address' => 'Al. São Caetano',
        'number' => '2575',
        'complement' => 'Apto 106',
        'district' => 'Santa Maria',
        'city' => 'São Caetano do Sul',
        'state' => 'São Paulo ',
        'country' => 'Brasil',
        'logo' => 'logo',
        'certificate' => 'ceritificate'
    ];
});


$factory->state(borg\Account::class, 'UserAccountNoImages' ,function (Faker\Generator $faker) {
    static $password;

    return [
        'user_id' => 1,
        'cnpj' => '0051455151',
        'social' => 'Pedro Abucarma Lazari ',
        'website' => 'http://pedrolazari.com',
        'occupation' => '1',
        'cep' => '09560500',
        'address' => 'Al. São Caetano',
        'number' => '2575',
        'complement' => 'Apto 106',
        'district' => 'Santa Maria',
        'city' => 'São Caetano do Sul',
        'state' => 'São Paulo ',
        'country' => 'Brasil',
    ];
});

$factory->state(borg\Account::class, 'UserAccountNoImagesNoSite' ,function (Faker\Generator $faker) {
    static $password;

    return [
        'user_id' => 1,
        'cnpj' => '0051455151',
        'social' => 'Pedro Abucarma Lazari ',
        'occupation' => '1',
        'cep' => '09560500',
        'address' => 'Al. São Caetano',
        'number' => '2575',
        'complement' => 'Apto 106',
        'district' => 'Santa Maria',
        'city' => 'São Caetano do Sul',
        'state' => 'São Paulo ',
        'country' => 'Brasil',
    ];
});