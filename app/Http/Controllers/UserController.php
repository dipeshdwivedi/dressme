<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeItemRequest;
use App\Http\Resources\UserItemResource;
use App\Models\ItemUser;
use App\Models\User;
use App\Utils\Facades\Helpers;
use Illuminate\Http\Request;
use App\Utils\Enums;

class UserController extends Controller {

    public function currentAvatar() {
        $user = User::with([
            'items' => function($q) {
                $q->where('item_user.is_active', Enums::AVATAR_ACTIVE); // get user's current avatar
            },
            'items.category'
            ])
        ->find(Helpers::getCurrentUserId());

        return new UserItemResource($user);
    }

    public function changeAvatar(ChangeItemRequest $request) {
        $user = Helpers::getCurrentUser();
        $item_ids = $request->items;

        $user_item =  ItemUser::where('user_id', $user->id);

        $user_item->update(['is_active' => Enums::AVATAR_INACTIVE]);

        $user_item
            ->whereIn('item_id', $item_ids)
            ->update(['is_active' => Enums::AVATAR_ACTIVE]);

        $user->load('items.category');

        return new UserItemResource($user);
    }

}
