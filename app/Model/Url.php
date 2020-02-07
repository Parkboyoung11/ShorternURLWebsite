<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Url extends Model {

    protected $table = 'url';

    protected $fillable = ['link', 'id'];
}

