<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;

class Company extends Authenticatable implements HasMedia
{
    use HasFactory, SoftDeletes, HasMediaTrait;

    protected $table = 'companies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'password',
        'website',
        'address',
        'is_verified',
        'is_deleted',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'media',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    // 'image', 
    protected $appends = [ 'logo'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('logo')
        ->singleFile();
    } 

    /**
     * Attributes
    **/
    public function getLogoAttribute()
    {
        $image = $this->getMedia('logo')->first();
        if ($image) 
        {
            return $image->getFullUrl();
        }
        return asset('/assets/image/default.png');
    }
}
