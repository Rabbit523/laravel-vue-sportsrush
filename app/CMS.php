<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CMS extends Model
{
    use SoftDeletes ;

    protected $table = 'cms' ;

    protected $fillable = [
       'who_are_we','about_us'
    ] ;

}
