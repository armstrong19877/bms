<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
	protected $primaryKey = 'u_id';
    protected $fillable = [ 'term', 'session', 'image', 'u_id'];



public function users(){
        return $this->belongsTo(User::class);
    }

public function students(){
	return $this->hasMany(Student::class);
}

}