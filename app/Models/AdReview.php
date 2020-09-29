<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Traits\UsesUUID;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Models\Ad;
class AdReview extends Model
{
    use HasFactory,UsesUUID,SoftDeletes;

    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }
}
