<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $fillable = ['student_id'];

    public function students()
    {
    	return $this->belongsTo(Student::class);
    }
}
