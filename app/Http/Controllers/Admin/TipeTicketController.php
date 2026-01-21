<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TipeTicket;
use Illuminate\Http\Request;

class TipeTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipeTickets = TipeTicket::all();
        return view('pages.admin.tipe-tiket.index', compact('tipeTickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $payload = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        if (!isset($payload['nama'])) {
            return redirect()->route('admin.tipe-tiket.index')->with('error', 'Nama tipe tiket wajib diisi.');
        }

        TipeTicket::create([
            'nama' => $payload['nama'],
        ]);

        return redirect()->route('admin.tipe-tiket.index')->with('success', 'Tipe tiket berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $payload = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        if (!isset($payload['nama'])) {
            return redirect()->route('admin.tipe-tiket.index')->with('error', 'Nama tipe tiket wajib diisi.');
        }

        $tipeTicket = TipeTicket::findOrFail($id);
        $tipeTicket->nama = $payload['nama'];
        $tipeTicket->save();

        return redirect()->route('admin.tipe-tiket.index')->with('success', 'Tipe tiket berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tipeTicket = TipeTicket::findOrFail($id);
        $tipeTicket->delete();

        return redirect()->route('admin.tipe-tiket.index')->with('success', 'Tipe tiket berhasil dihapus.');
    }
}
