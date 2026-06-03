<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use App\Models\Jenis_layanan_spbe;
use App\Models\Kebutuhan_layanan_spbe;
use App\Models\Layanan_spbe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\Mime\Email;

class PimpinanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::guard('petugas')->user();
        $firstname = str($user->name)->before(' ')->toString();

        $stats = [
            'total' => Layanan_spbe::count(),
            'pending' => Layanan_spbe::where('status', Layanan_spbe::STATUS_PENDING)->count(),
            'proses' => Layanan_spbe::where('status', Layanan_spbe::STATUS_PROSES)->count(),
            'selesai' => Layanan_spbe::where('status', Layanan_spbe::STATUS_SELESAI)->count(),
        ];

        // Aktivitas terbaru
        $recentActivities = Layanan_spbe::latest()->take(5)->get();

        return view('pimpinan.DashboardPimpinan', [
            'title' => 'Dashboard Pimpinan',
            'dataPetugas' => $user,
            'firstname' => $firstname,
            'stats' => $stats,
            'recentActivities' => $recentActivities
        ]);
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
        //
    }
    public function show($id) {}

    /**
     * Display the specified resource.
     */
    public function showProfile()
    {
        $idPetugas = Auth::guard('petugas')->user()->id;
        $dataPetugas = User::findOrFail($idPetugas);

        return view('pimpinan.ShowProfilePimpinan', [
            'title' => 'Profil Pimpinan',
            'dataPetugas' => $dataPetugas
        ]);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::guard('petugas')->user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'no_hp' => 'required|string|max:20',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['name', 'email', 'no_hp']);

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

    public function exportPdf(Request $request)
    {
        $data = Layanan_spbe::with(['jenis_layanan', 'inputer'])->get();
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pimpinan.reports.layanan_pdf', compact('data'));
        return $pdf->download('Laporan-Layanan-SPBE-' . now()->format('Y-m-d') . '.pdf');
    }

    public function downloadSinglePdf($id)
    {
        $detail = Layanan_spbe::with('jenis_layanan')->findOrFail($id);
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pemohon.reports.permohonan_single_pdf', compact('detail'));
        return $pdf->download('Permohonan-' . $detail->noreg . '.pdf');
    }

    public function exportExcel()
    {
        return \Maatwebsite\Excel\Facades\Excel::download(new \App\Exports\LayananExport, 'Laporan-Layanan-SPBE-' . now()->format('Y-m-d') . '.xlsx');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permohonan = Layanan_spbe::findOrFail($id);
        $idPetugas = Auth::guard('petugas')->user()->id;
        $dataPetugas = User::findOrFail($idPetugas);
        $title = "Edit Deskripsi";

        return view('pimpinan.editRequest', compact('permohonan', 'title', 'dataPetugas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $permohonan = Layanan_spbe::findOrFail($id);

        $request->validate([
            'ket' => 'nullable|string',
        ]);

        $permohonan->update([
            'ket' => $request->ket,
        ]);

        Alert::success('Berhasil', 'Deskripsi berhasil diperbarui!');
        return redirect()->route('indexMandat', 1);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permohonan = Layanan_spbe::findOrFail($id);

        if ($permohonan->berkas && file_exists(public_path('storage/doc/' . $permohonan->berkas))) {
            unlink(public_path('storage/doc/' . $permohonan->berkas));
        }

        $permohonan->delete();

        Alert::success('Berhasil', 'Permohonan berhasil dihapus!');
        return redirect()->back();
    }
}
