<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'address_1',
        'address_2',
        'city',
        'state',
        'zip',
        'type',
        'expected',
        'user_id',
    ];

    /**
     * Get the events for the shipment.
     */
    public function events(): HasMany
    {
        return $this->hasMany(ShipmentEvent::class);
    }

    /**
     * Get the packages for the shipment.
     */
    public function packages(): HasMany
    {
        return $this->hasMany(Package::class);
    }
}
