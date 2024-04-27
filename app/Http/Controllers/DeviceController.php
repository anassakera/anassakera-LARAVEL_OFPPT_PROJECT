<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    /**
     * Display a listing of the devices.
     */
    public function index()
    {
        $devices = Device::all();
        return view('devices.index', compact('devices'));
    }

    /**
     * Show the form for creating a new device.
     */
    public function create()
    {
        return view('devices.create');
    }

    /**
     * Store a newly created device in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // Validation rules
        ]);

        Device::create($validatedData);
        return redirect()->route('devices.index')->with('success', 'Device created successfully.');
    }

    /**
     * Display the specified device.
     */
    public function show(Device $device)
    {
        return view('devices.show', compact('device'));
    }

    /**
     * Show the form for editing the specified device.
     */
    public function edit(Device $device)
    {
        return view('devices.edit', compact('device'));
    }

    /**
     * Update the specified device in storage.
     */
    public function update(Request $request, Device $device)
    {
        $validatedData = $request->validate([
            // Validation rules
        ]);

        $device->update($validatedData);
        return redirect()->route('devices.index')->with('success', 'Device updated successfully.');
    }

    /**
     * Remove the specified device from storage.
     */
    public function destroy(Device $device)
    {
        $device->delete();
        return redirect()->route('devices.index')->with('success', 'Device deleted successfully.');
    }
}
