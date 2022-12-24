<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Visa extends Model
{
    use HasFactory;
    protected $fillable=['user_id','bank_name','visa_number','visa_password'];
    use SoftDeletes;
}
