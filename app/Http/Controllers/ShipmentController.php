<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShipmentRequest;
use App\Models\Shipment;
use App\Services\ShipmentService;
use Inertia\Inertia;

class ShipmentController extends Controller
{
    protected $shipmentService;

    public function __construct(ShipmentService $shipmentService)
    {
        $this->shipmentService = $shipmentService;
    }

    /**
     * Show the given shipment to the requesting user
     */
    public function show(Shipment $shipment): \Inertia\Response
    {
        return Inertia::render('Shipment/Show', [
            'shipment' => $shipment->load('events', 'packages'),
        ]);
    }

    /**
     * Create a new shipment for the requesting user
     */
    public function store(ShipmentRequest $shipmentRequest): \Illuminate\Http\RedirectResponse
    {
        $shipment = $this->shipmentService->create($shipmentRequest);

        return to_route('shipment.show', $shipment);
    }

    /**
     * Update a shipment for the requesting user
     */
    public function update(ShipmentRequest $shipmentRequest, Shipment $shipment): \Illuminate\Http\RedirectResponse
    {
        $shipment = $this->shipmentService->update($shipmentRequest, $shipment);

        return to_route('shipment.show', $shipment);
    }

    /**
     * Destroy a shipment for the requesting user
     */
    public function destroy(Shipment $shipment): \Illuminate\Http\RedirectResponse
    {
        $this->shipmentService->destroy($shipment);

        return to_route('dashboard');
    }
}
