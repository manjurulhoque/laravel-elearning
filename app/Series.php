<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    /**
     * All database columns to be guarded from mass assignment
     *
     * @var array
     */
    protected $guarded = []; // assign all columns
}
