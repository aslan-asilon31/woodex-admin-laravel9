<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    //kode untuk kolom tabel yang tidak boleh dimodifikasi
    protected $guarded = ['id'];
    protected $with = ['user', 'shipment'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('order_date', 'like', '%' . $search . '%')
                ->orWhere('invoice', 'like', '%' . $search . '%');
        });
        $query->when($filters['search'] ?? false, fn ($query, $search) =>
        $query->whereHas(
            'user',
            fn ($query) =>
            $query->where('name', $search)
        ));
    }
}
