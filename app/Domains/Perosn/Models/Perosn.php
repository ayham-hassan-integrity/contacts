<?php

namespace App\Domains\Perosn\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use App\Domains\Perosn\Models\Traits\Attribute\PerosnAttribute;
use App\Domains\Perosn\Models\Traits\Method\PerosnMethod;
use App\Domains\Perosn\Models\Traits\Relationship\PerosnRelationship;
use App\Domains\Perosn\Models\Traits\Scope\PerosnScope;


/**
 * Class Perosn.
 */
class Perosn extends Model
{
    use SoftDeletes,
        PerosnAttribute,
        PerosnMethod,
        PerosnRelationship,
        PerosnScope;

    /**
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'perosns';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [         "name",        "description",    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];


    public $timestamps =["create_at","update_at"];

    /**
     * @var array
     */
    protected $dates = [
    "create_at",
    "update_at",
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    /**
     * @var array
     */
    protected $appends = [

    ];

}