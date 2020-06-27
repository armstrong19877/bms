<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{	

	//protected $primaryKey = 'user_id';

	protected $fillable = [ 'phone', 'sex', 's_class', 'p_name', 'reg_no', 'dob', 'lg', 'nation', 'state', 'add', 'reg_date'];


     public function user(){
        return $this->belongsTo(User::class);
    }

    public function results(){
        return $this->belongsTo(User::class);
    }

    public function bios(){
        return $this->belongsToMany(Biodata::class);
    }
}
