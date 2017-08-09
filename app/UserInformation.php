<?php

namespace Homemate;

use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    //
    protected $table = 'user_informations';
    protected $fillable = ['user_id'];
}
