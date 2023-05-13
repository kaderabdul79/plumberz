<?php

namespace App\Models;

use App\TransformingAttribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Technician extends Model
{
    use HasFactory, TransformingAttribute;
}
