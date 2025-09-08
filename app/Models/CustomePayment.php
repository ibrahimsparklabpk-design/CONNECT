<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomePayment extends Model
{
    use HasFactory;
    protected $table = "custome_payments";
    protected $primarykey = "id";

    protected $fillable = [
        'customer_id',
        'p_email',
        'delivery_country',
        'delivery_first_name',
        'delivery_last_name',
        'delivery_company',
        'delivery_address',
        'delivery_apartment',
        'delivery_city',
        'delivery_state',
        'delivery_zip_code',
        'delivery_phone',
        'account_holder_name',
        'billing_first_name',
        'billing_last_name',
        'billing_company',
        'billing_address',
        'billing_apartment',
        'billing_city',
        'billing_state',
        'billing_zip_code',
        'billing_phone',
        'price',
        'total_quantity',
        'payment',

    ];
}
