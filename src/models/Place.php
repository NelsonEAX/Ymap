<?php

namespace NelsonEAX\Ymap\models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
   /* protected $casts = [
        'is_eax' => 'boolean',
    ];*/

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'locality', 
        'district', 
        'population',
        'date',
        'geo',
        'link',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'email_token',
        'remember_token',
        'created_at',
        'updated_at',
    ];
    
}
