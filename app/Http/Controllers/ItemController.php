<?php

namespace App\Http\Controllers;

use App\Http\Requests\BuyItemRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\UserItemResource;
use App\Models\Category;
use App\Models\Item;
use App\Models\User;
use App\Utils\Facades\Helpers;
use Illuminate\Http\Request;

class ItemController extends Controller {

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index() {
        $categories = Category::inOrder()
            ->with('items')
            ->get();

        return CategoryResource::collection($categories);
    }

    /**
     * @param BuyItemRequest $request
     * @return UserItemResource|string|void
     */
    public function buyItem(BuyItemRequest $request) {
        $user = User::find(1);
        $item = Item::find($request->item);

        if (Helpers::isItemBuyable($user->currency, $item->price)) { // check if user have enough amount or not
            $items = $user->items->map(function ($q) { // check if user brought item already
                return $q->id;
            })
                ->toArray();
            if (in_array($item->id, $items)) {
                return  Helpers::responseHandler(['item' => 'Item is already brought.']);
            }
            Helpers::buyItem($user, $item);

            $user->load('items.category');

            return new UserItemResource($user);
        }

        return Helpers::responseHandler(['item' => 'You have not enough currency to buy this object.']);
    }
}
