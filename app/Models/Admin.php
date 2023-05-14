<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Technician;
use Illuminate\Support\Str;
use App\TransformingAttribute;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory,TransformingAttribute;
        
        
    protected $fillable = ['name', 'email', 'password'];

    protected function technicians(){
        return $this->hasMany(Technician::class);
    }
    protected function categories(){
        return $this->hasMany(Category::class);
    }

}
