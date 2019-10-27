<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    //
    protected $guarded = [];

    public function type(){
        return $this->belongsTo('App\Document_types');
    }
    public function uploader(){
        return $this->belongsTo('App\User','employee_id');
    }


}
