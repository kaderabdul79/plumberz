<?php
namespace App;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

trait TransformingAttribute {
        // use accessor to get the capital name of db when data access from db
        protected function getNameAttribute($value): string
        {
            return Str::upper($value);
        }
    
        // use mutator for hashing the password when data saved to db
        public function setPasswordAttribute($value)
        {
            $this->attributes['password'] = Hash::make($value);
        }
}