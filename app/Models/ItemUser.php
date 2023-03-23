<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ItemUser extends Pivot {

    protected $guarded = [];

    public $timestamps = false;

}
