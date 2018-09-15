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

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $with = ['lessons']; // eager loading

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
