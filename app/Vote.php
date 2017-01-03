<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vote_type_id',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
    ];

    public function scopeToday($query)
    {
        $query->where('created_at', '>=', Carbon::today());
    }

    public function scopeWeek($query)
    {
        $query->where('created_at', '>=', Carbon::today()->subWeek());
    }

    public function scopeMonth($query)
    {
        $query->where('created_at', '>=', Carbon::today()->subMonth());
    }
}
