<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'featured_image'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'featured_image' => 'string',
    ];

    /**
     * Set the product's name.
     *
     * @param string $value
     * @return void
     */
    public function setNameAttribute($value) {
        $this->attributes['name'] = ucfirst( strtolower( $value ) );
    }
 }
