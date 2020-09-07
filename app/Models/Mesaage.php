<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Builder;

class Message extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'from_user_id',
        'to_user_id',
        'description'
    ];

    // relation
    public function fromUser()
    {
        return $this->belongsTo('App\User', 'from_user_id', 'id');
    }

    public function toUser()
    {
        return $this->belongsTo('App\User', 'to_user_id', 'id');
    }
}
