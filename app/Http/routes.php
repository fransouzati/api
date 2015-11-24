<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */

Route::get('/', function () {
    return view('welcome');
});

Route::get('/atualizar', function (\Church\Address $address) {
    $addresses = $address->all();
    foreach ($addresses as $address) {
        $maps = new \Library\GMaps();
        $add = $address->street.', '.$address->number.' - '.$address->district.', '.$address->city.' - '.$address->state;
        if (isset($address->zipcode)) {
            $zipcode = $address->zipcode;
            $zipcode = preg_replace('/\D/', '', $zipcode);
            $add .= ', '.substr($zipcode, 0, 5).'-'.substr($zipcode, 5, 3);
        }
        $add .= ', '.$address->country;

        $location = $maps->location($add);

        if (isset($location->lat) && isset($location->lng)) {
            $address->latitude = $location->lat;
            $address->longitude = $location->lng;
        }
        $address->save();
    }
});
