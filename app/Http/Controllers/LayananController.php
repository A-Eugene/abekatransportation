<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Layanan;

use function App\Utils\Util\querySearch;

class LayananController extends Controller
{
    // Dashboard
    public function dashboardPage() {
        $perPage = request('per_halaman', 10);
        $search  = request('search');

        $query = querySearch(Layanan::class, $search);

        return view('pages.dashboard.dashboard-layanan', [
            'layanans' => $query->paginate($perPage)->withQueryString()
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string',
            'deskripsi' => 'required|string',
            'harga_per_km' => 'required|numeric|min:1',
            'harga_per_kg' => 'required|numeric|min:1',
            'biaya_minimum' => 'required|numeric|min:1',
            'berat_maks_kg' => 'required|numeric|min:1',
            'volume_maks_m3' => 'required|numeric|min:1',
            'berat_volumetrik_ratio' => 'required|numeric|min:1',
            'image'   => 'required|image|mimes:jpeg,png,jpg,gif,webp'
        ]);

        if ($validator->fails()) {
            $firstMessage = $validator->errors()->first();
            return redirect()->back()
                ->withInput()
                ->withErrors(['createError' => $firstMessage]);
        }

        $imagePath = $request->file('image')->store('images/layanan', 'public');

        Layanan::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'harga_per_km' => $request->harga_per_km,
            'harga_per_kg' => $request->harga_per_kg,
            'biaya_minimum' => $request->biaya_minimum,
            'berat_maks_kg' => $request->berat_maks_kg,
            'volume_maks_m3' => $request->volume_maks_m3,
            'berat_volumetrik_ratio' => $request->berat_volumetrik_ratio,
            'image'   => basename($imagePath),
        ]);

       return back()->with('success', 'Layanan created successfully.');
    }

    public function update(Request $request)
    {
        $layanan = Layanan::find($request->id);
        if (!$layanan) {
            return redirect()->back()->with('updateError', 'Layanan not found.');
        }

        $validator = Validator::make($request->all(), [
            'judul' => 'required|string',
            'deskripsi' => 'required|string',
            'harga_per_km' => 'required|numeric|min:1',
            'harga_per_kg' => 'required|numeric|min:1',
            'biaya_minimum' => 'required|numeric|min:1',
            'berat_maks_kg' => 'required|numeric|min:1',
            'volume_maks_m3' => 'required|numeric|min:1',
            'berat_volumetrik_ratio' => 'required|numeric|min:1',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif,webp'
        ]);

        if ($validator->fails()) {
            $firstMessage = $validator->errors()->first();
            return redirect()->back()
                ->withInput()
                ->withErrors(['updateError' => $firstMessage]);
        }

        $layanan->judul = $request->judul;
        $layanan->deskripsi = $request->deskripsi;
        $layanan->harga_per_km = $request->harga_per_km;
        $layanan->harga_per_kg = $request->harga_per_kg;
        $layanan->biaya_minimum = $request->biaya_minimum;
        $layanan->berat_maks_kg = $request->berat_maks_kg;
        $layanan->volume_maks_m3 = $request->volume_maks_m3;
        $layanan->berat_volumetrik_ratio = $request->berat_volumetrik_ratio;

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete('images/layanan/' . $layanan->image);

            $imagePath = $request->file('image')->store('images/layanan', 'public');
            $layanan->image = basename($imagePath);
        }

        $layanan->save();

       return back()->with('success', 'Layanan updated successfully.');
    }

    public function destroy(Request $request)
    {
        $layanan = Layanan::find($request->id);

        if (!$layanan) {
            return redirect()->back()->withErrors(['deleteError' => 'Layanan not found.']);
        }

        $layanan->delete();

        return redirect()->back()->with('success', 'Layanan deleted successfully.');
    }
}
