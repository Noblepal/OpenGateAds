<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Traits\UsesUUID;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;
class County extends Model
{
    use HasFactory,UsesUUID;

}
