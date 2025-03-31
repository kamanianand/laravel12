<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB\Client;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        
        //insert
        $data = [
            'user_id' => 100,
            'latitude' => 40.7128,
            'longitude' => -74.0060,
        ];

        // DB::connection('mongodb')->table('user_lat_longs')->insert($data);

        //update
        // $data = [
        //     'latitude' => 41.7128,
        //     'longitude' => -73.0060,
        // ];
        
        // DB::connection('mongodb')
        //     ->table('user_lat_longs')
        //     ->where('_id', '67ea2b01b88c95796c0abbf7') 
        //     ->update($data);

        //delete
        // DB::connection('mongodb')
        //     ->table('user_lat_longs')
        //     ->where('_id', '67ea2b30b88c95796c0abbf8')
        //     ->delete();

        $user = DB::connection('mongodb')
            ->table('user_lat_longs')
            ->where('_id', '67ea2b01b88c95796c0abbf7')
            ->first();
            $userid = isset($user->id) ? (string) $user->id : null;
            echo "User Id : ".$userid;
            echo "User Latitude : ".$user->latitude;
            echo "User Longitude : ".$user->longitude;

        //get all data
        $result = DB::connection('mongodb')
            ->table('user_lat_longs')
            ->get();
        foreach ($result as $item) {
            $objectId = isset($item->id) ? (string) $item->id : null;
            echo "Object ID: " . $objectId . "<br>";
            echo "Latitude: " . $item->latitude . "<br>";
            echo "Longitude: " . $item->longitude . "<br><br>";
        }
        exit;

    }
}
