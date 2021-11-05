<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Pizza;

class Order extends Model
{
    use HasFactory;
 
    // relation one to many from user table
    public function user() {

        return $this->belongsTo(User::class);
    }

    // relation one to many from pizza table
    public function pizza() {

        return $this->belongsTo(Pizza::class);
    }

}
