<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory;
        
        
        protected $fillable = ['name', 'email', 'password'];
        
        // use accessor to get the capital name of db when data access from db
        protected function getNameAttribute($value): string
        {
            return Str::upper($value);
        }

        // use mutator for hashing the password when data save to db
        public function setPasswordAttribute($value)
        {
            $this->attributes['password'] = Hash::make($value);
        }
}
