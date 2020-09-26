<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Traits\UsesUUID;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use Models\Ad;
class Category extends Model
{
    use HasFactory,UsesUUID,SoftDeletes,CascadeSoftDeletes;
    protected $cascadeDeletes = ['ads'];

    public function ads()
    {
        return $this->hasMany(Ad::class);
    }
}
