<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FullCustom extends Model
{
    use HasFactory;
    //kode untuk kolom tabel yang tidak boleh dimodifikasi
    protected $guarded = ['id'];
    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function message()
    {
        return $this->hasMany(Message::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('description', 'like', '%' . $search . '%')
                ->orWhere('fullcustom_date', 'like', '%' . $search . '%');
        });
    }
}
