<?php

namespace App\Utils;

use App\Models\User;
use Faker\Factory;
use Illuminate\Support\Facades\Storage;

class Helpers {

    public function getImageLink($path) {
        return url("storage/images/$path");
    }

    public function createRandomImage() {
        $faker = Factory::create();
        $random = md5(uniqid(rand(), true)).".png";
        Storage::put( "public/images/$random", file_get_contents($faker->imageUrl())); //storing random images

        return  $random;
    }

    public function isItemBuyable($available_currency, $price) {
        return $available_currency >= $price;
    }

    public function responseHandler($res, $type = 'error') {
        $status = 200;
        $op['message'] = '';
        if ($type == 'error') {
            $op['errors'] = $res;
            $status = 422;
        } else {
            $op['message'] = $res;
        }
        if (isset($res['data'])) {
            $op = $res;
        }
        return response()->json($op, $status);
    }

    public function buyItem($user, $item) {

        $user->update([
           'currency'   => ($user->currency - $item->price)
        ]);

        $user->items()->attach($item->id);
    }

    public function getCurrentUser() {
        return User::find($this->getCurrentUserId());
    }

    public function getCurrentUserId() {
        return 1;  // assume user id 1 is active session;
    }
}
