<?php

namespace App\Models;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected function admin(){
        return $this->belongsTo(Admin::class);
    }
    
    protected function technican(){
        return $this->hasMany(Technican::class);
    }
}
