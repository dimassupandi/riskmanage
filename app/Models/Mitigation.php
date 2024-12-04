<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mitigation extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =['risks_id' ,'action'];
    protected $hidden =[];



    public function risks() {
        return $this->belongsTo(Risk::class, 'risks_id','id');
        
    }
}
