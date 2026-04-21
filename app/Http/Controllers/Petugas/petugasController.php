<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Layanan_spbe;
use App\Models\Mandate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetugasController extends Controller
{
    /**a
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::guard('petugas')->user();

        // Ambil mandat yang ditugaskan ke petugas ini
        $mandates = Mandate::whereHas('mandate_petugas', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->with(['ticket', 'ticket.jenis_layanan'])->latest()->paginate(10);

        $stats = [
            'total' => Mandate::whereHas('mandate_petugas', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->count(),
            'proses' => Mandate::whereHas('mandate_petugas', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->where('status', 'proses')->count(),
            'selesai' => Mandate::whereHas('mandate_petugas', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->where('status', 'selesai')->count(),
        ];

        return view('petugas.DashboardPetugas', [
            'title' => 'Dashboard Petugas',
            'dataPetugas' => $user,
            'mandates' => $mandates,
            'stats' => $stats,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('petugas.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function profile()
    {
        $user = Auth::guard('petugas')->user();
        return view('petugas.ProfilePetugas', [
            'title' => 'Profil Petugas',
            'dataPetugas' => $user
        ]);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::guard('petugas')->user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required|string|max:20',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['name', 'email', 'phone']);

        if ($request->hasFile('avatar')) {
            if ($user->avatar && file_exists(public_path('storage/avatars/' . $user->avatar))) {
                unlink(public_path('storage/avatars/' . $user->avatar));
            }
            $file = $request->file('avatar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/avatars'), $fileName);
            $data['avatar'] = $fileName;
        }

        User::where('id', $user->id)->update($data);

        \RealRashid\SweetAlert\Facades\Alert::success('Berhasil', 'Profil berhasil diperbarui!');
        return redirect()->back();
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|current_password',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        User::where('id', Auth::guard('petugas')->id())->update([
            'password' => \Illuminate\Support\Facades\Hash::make($request->new_password)
        ]);

        \RealRashid\SweetAlert\Facades\Alert::success('Berhasil', 'Kata sandi berhasil diubah!');
        return redirect()->back();
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:selesai',
            'keterangan' => 'required|string',
            'berkas' => 'nullable|file|mimes:pdf,jpg,png,zip|max:5120',
        ]);

        $mandate = Mandate::findOrFail($id);
        $ticket = $mandate->ticket;

        $fileName = $ticket->berkasver;
        if ($request->hasFile('berkas')) {
            $file = $request->file('berkas');
            $fileName = 'ver_' . time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            $file->move(public_path('storage/doc'), $fileName);
        }

        $mandate->update([
            'status' => 'selesai',
        ]);

        $ticket->update([
            'status' => Layanan_spbe::STATUS_SELESAI,
            'status_ver' => 1,
            'verby' => Auth::guard('petugas')->user()->name,
            'tglver' => now(),
            'ketver' => $request->keterangan,
            'berkasver' => $fileName,
        ]);

        \RealRashid\SweetAlert\Facades\Alert::success('Berhasil', 'Tugas telah diselesaikan!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
