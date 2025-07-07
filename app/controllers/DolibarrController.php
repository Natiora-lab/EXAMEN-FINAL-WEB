<?php

namespace app\controllers;

use app\models\DolibarrModel;
use Flight;

class DolibarrController {

    public function __construct() {

    }

    public function home() {
        $status = Flight::DolibarrModel()->getStatus();
        Flight::json($status);
    }

    public function homenotJson() {
        $status = Flight::DolibarrModel()->getStatus();

        $code = $status['success']['code'];
        $version = $status['success']['dolibarr_version'];
        $locked = $status['success']['access_locked'];
        $env = $status['success']['environment'];
        $timestampUtc = $status['success']['timestamp_now_utc'];
        $timezone = $status['success']['timestamp_php_tz'];
        $datetime = $status['success']['date_tz'];

        Flight::render('welcome', [
            'code' => $code,
            'version' => $version,
            'locked' => $locked,
            'env' => $env,
            'timestampUtc' => $timestampUtc,
            'timezone' => $timezone,
            'datetime' => $datetime
        ]);
    }

    public function addContact() {
        $data = Flight::request()->data;
          $result = Flight::DolibarrModel()->insertContact([
            'lastname' => $data['lastname'],
            'firstname' => $data['firstname']
        ]);
        Flight::json($result);
    }
    public function removeContact() {
        $id = Flight::request()->query['id'];
        $result = Flight::DolibarrModel()->deleteContact($id);
        $result = Flight::DolibarrModel()->getContact();
        Flight::render('Contact',['list'=>$result]);
    }
    public function getAllContact() {
        
        $result = Flight::DolibarrModel()->getContact();
        Flight::render('Contact',['list'=>$result]);
    }
    public function getContactToEdit(){
         $id = Flight::request()->query['id'];
         $dataToEdit=Flight::DolibarrModel()->getContactById($id);
         $result = Flight::DolibarrModel()->getContact();
         Flight::render('Contact',['list'=>$result,'editList'=>$dataToEdit]);
    }
    public function editContact() {
        $data = Flight::request()->data;
        $result = Flight::DolibarrModel()->updateContact($data['id'],[
            'lastname' => $data['lastname'],
            'firstname' => $data['firstname']
        ]);
        $result = Flight::DolibarrModel()->getContact();
         Flight::render('Contact',['list'=>$result]);
        //Flight::json($result);
        
    }
    public function redirectionContact() {
        $result = Flight::DolibarrModel()->getContact();
        Flight::render('Contact',['list'=>$result]);
    }
}