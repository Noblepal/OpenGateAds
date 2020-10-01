<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Traits\UsesUUID;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Overtrue\LaravelFavorite\Traits\Favoriteable;

class Ad extends Model
{
    use HasFactory,UsesUUID,SoftDeletes,CascadeSoftDeletes,Favoriteable;
    protected $cascadeDeletes = ['reviews','photos'];

    public function reviews()
    {
        return $this->hasMany(AdReview::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function photos()
    {
        return $this->hasMany(AdPhoto::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
