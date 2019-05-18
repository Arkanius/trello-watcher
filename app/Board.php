<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'trello_id',
        'trello_data',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'trello_data' => 'array'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}

