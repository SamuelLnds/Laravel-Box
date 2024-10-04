<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageBox extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'size',
        'monthly_cost',
        'availability',
        'tenant_id',
    ];

    protected $casts = [
        'availability' => 'boolean',
        'monthly_cost' => 'decimal:2',
    ];


    /**
     * Get the owner of the storage box.
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the tenant that is renting the storage box.
     */
    public function tenant()
    {
        return $this->belongsTo(Tenant::class, 'tenant_id');
    }

}
