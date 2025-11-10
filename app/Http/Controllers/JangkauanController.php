<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Jangkauan;

use function App\Utils\Util\querySearch;

class JangkauanController extends Controller
{
    // Dashboard
    public function dashboardPage() {
        $perPage = request('per_halaman', 10);
        $search  = request('search');

        $query = querySearch(Jangkauan::class, $search);

        return view('pages.dashboard.dashboard-jangkauan', [
            'jangkauans' => $query->paginate($perPage)->withQueryString()
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lokasi'  => 'required|string',
            'alamat'  => 'required|string',
            'telepon' => 'required|string',
            'image'   => 'required|image|mimes:jpeg,png,jpg,gif,webp'
        ]);

        if ($validator->fails()) {
            $firstMessage = $validator->errors()->first();
            return redirect()->back()
                ->withInput()
                ->withErrors(['createError' => $firstMessage]);
        }

        $imagePath = $request->file('image')->store('images/jangkauan', 'public');

        Jangkauan::create([
            'lokasi'  => $request->lokasi,
            'alamat'  => $request->alamat,
            'telepon' => $request->telepon,
            'image'   => basename($imagePath),
        ]);

       return back()->with('success', 'Jangkauan created successfully.');
    }

    public function update(Request $request)
    {
        $jangkauan = Jangkauan::find($request->id);
        if (!$jangkauan) {
            return redirect()->back()->with('updateError', 'Jangkauan not found.');
        }

        $validator = Validator::make($request->all(), [
            'lokasi'  => 'required|string',
            'alamat'  => 'required|string',
            'telepon' => 'required|string',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif,webp'
        ]);

        if ($validator->fails()) {
            $firstMessage = $validator->errors()->first();
            return redirect()->back()
                ->withInput()
                ->withErrors(['updateError' => $firstMessage]);
        }

        $jangkauan->lokasi = $request->lokasi;
        $jangkauan->alamat = $request->alamat;
        $jangkauan->telepon = $request->telepon;

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete('images/jangkauan/' . $jangkauan->image);

            $imagePath = $request->file('image')->store('images/jangkauan', 'public');
            $jangkauan->image = basename($imagePath);
        }

        $jangkauan->save();

       return back()->with('success', 'Jangkauan updated successfully.');
    }

    public function destroy(Request $request)
    {
        $jangkauan = Jangkauan::find($request->id);

        if (!$jangkauan) {
            return redirect()->back()->withErrors(['deleteError' => 'Jangkauan not found.']);
        }

        $jangkauan->delete();

        return redirect()->back()->with('success', 'Jangkauan deleted successfully.');
    }
}
