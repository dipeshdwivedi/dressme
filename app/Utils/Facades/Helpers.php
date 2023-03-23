<?php

namespace App\Utils\Facades;

use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Facade;

class Helpers extends Facade {

    /**
     * @method static string getImageLink($path) // generate image link
     * @method static string createRandomImage() // generate image and store
     * @method static boolean isItemBuyable($available_currency, $price) // checks if user have enough currency
     * @method static Response responseHandler($response, $type = 'error')
     * @method static User getCurrentUser() // return auth user
     * @method static int getCurrentUserId() // return auth user id
     * */

    public static function getFacadeAccessor() {
        return 'helpers';
    }
}
