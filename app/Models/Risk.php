<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Risk extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =['assets_id' ,'description', 'frequency','impact','level'];
    protected $hidden =[];


    public function assets() {
        return $this->belongsTo(Asset::class, 'assets_id','id');
        
    }
    public function mitigations() {
        return $this->hasMany(Mitigation::class,'mitigations_id','id');
        
    }
}
