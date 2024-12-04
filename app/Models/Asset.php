<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asset extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =['name'];
    protected $hidden =[];


    public function risks() {
        return $this->hasMany(Risk::class,'risks_id','id');
        
    }
}
