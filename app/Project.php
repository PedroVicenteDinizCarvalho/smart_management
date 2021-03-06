<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Project extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['title', 'type', 'description', 'client', 'price', 'deadline', 'installments', 'paidOut'];

    protected $dates = ['delete_at'];


}
