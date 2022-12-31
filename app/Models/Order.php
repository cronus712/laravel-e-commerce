<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'total_price',
        'reference',
        'name',
        'email',
        'address',
        'country',
        'state',
        'zip',
        'status',
    ];

    public function orderitems() {
        return $this->hasMany(OrderItem::class);
    }
}
