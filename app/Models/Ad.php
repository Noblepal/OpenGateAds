<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Traits\UsesUUID;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use Models\AdReview;
use Models\Category;
class Ad extends Model
{
    use HasFactory,UsesUUID,SoftDeletes,CascadeSoftDeletes;
    protected $cascadeDeletes = ['reviews'];

    public function reviews()
    {
        return $this->hasMany(AdReview::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
