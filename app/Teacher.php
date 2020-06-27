<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
	protected $fillable = [ 'dob', 'state', 'phone', 'class', 'sex', 'add'];


    public function user(){
        return $this->belongsTo(User::class);
    }
}
