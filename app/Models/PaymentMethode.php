<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethode extends Model
{
    use HasFactory;
protected $table ="payment_methode";
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
  
}



