<?php

namespace App\Services;

use App\Http\Requests\ShipmentRequest;
use App\Models\Shipment;
use App\Models\User;

class ShipmentService
{
    public function create(ShipmentRequest $shipmentRequest): Shipment
    {
        $validatedData = $shipmentRequest->validated();

        $this->attachUserId($validatedData, $shipmentRequest->user());

        return Shipment::create($validatedData);
    }

    public function update(ShipmentRequest $shipmentRequest, Shipment $shipment): Shipment
    {
        $shipment->fill($shipmentRequest->validated())
            ->save();

        return $shipment;
    }

    public function destroy(Shipment $shipment): void
    {
        $shipment->delete();
    }

    private function attachUserId(array &$validatedData, User $user): void
    {
        $validatedData['user_id'] = $user->id;
    }
}
