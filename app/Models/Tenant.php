<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'address',
    ];

    protected $casts = [
        'email' => 'string',
    ];

    /**
     * Get the user associated with the tenant.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the storage boxes associated with the tenant.
     */
    public function storageBoxes()
    {
        return $this->hasMany(StorageBox::class, 'tenant_id');
    }
}
