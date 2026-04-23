<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Layanan_spbe;
use App\Models\Mandate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PetugasController extends Controller
{
    /**
     * index(): Menampilkan ringkasan statistik dan 5 mandat terbaru.
     */
    public function index()
    {
        // Ambil user dari guard petugas
        $user = Auth::guard('petugas')->user();

        // Pastikan user ditemukan
        if (!$user) {
            return redirect()->route('login');
        }

        // Ambil data lewat relasi yang didefinisikan di Model User
        $latestTasks = $user->mandate_users()
            ->with(['ticket.jenis_layanan'])
            ->latest()
            ->take(5)
            ->get();

        $stats = [
            'total'   => $user->mandate_users()->count(),
            'pending' => $user->mandate_users()->where('status', 'pending')->count(),
            'selesai' => $user->mandate_users()->where('status', 'selesai')->count(),
        ];

        return view('petugas.index', compact('stats', 'latestTasks', 'user'));
    }



    /**
     * tugas(): Menampilkan seluruh daftar mandat dengan pagination.
     */
    public function tugas()
    {
        $user = Auth::guard('petugas')->user();
        $mandateIds = DB::table('mandate_users')
            ->where('petugas_id', $user->id)
            ->pluck('mandate_id');

        $tasks = Mandate::whereIn('id', $mandateIds)
            ->with(['ticket', 'ticket.jenis_layanan', 'ticket.inputer'])
            ->latest()
            ->paginate(10);

        return view('petugas.tugas', compact('tasks', 'user'));
    }

    /**
     * show($id): Menampilkan detail lengkap satu permohonan dari mandat.
     */
    public function show($id)
    {
        $user = Auth::guard('petugas')->user();

        // Pastikan mandat ini milik petugas yang sedang login
        $mandate = Mandate::whereHas('mandate_users', function ($q) use ($user) {
            $q->where('petugas_id', $user->id);
        })->with(['ticket', 'ticket.jenis_layanan', 'ticket.inputer', 'ticket.instansi_rel'])->findOrFail($id);

        $task = $mandate->ticket;

        return view('petugas.show', compact('task', 'mandate', 'user'));
    }

    /**
     * profile(): Menampilkan informasi profil petugas.
     */
    public function profile()
    {
        $user = Auth::guard('petugas')->user();
        return view('petugas.profile', compact('user'));
    }

    /**
     * Update status permohonan menjadi selesai.
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:selesai',
            'ketver' => 'required|string',
            'berkasver' => 'nullable|file|mimes:pdf,jpg,png,zip|max:5120',
        ]);

        $user = Auth::guard('petugas')->user();
        $mandate = Mandate::whereHas('mandate_users', function ($q) use ($user) {
            $q->where('petugas_id', $user->id);
        })->findOrFail($id);

        $task = $mandate->ticket;

        $data = [
            'status' => Layanan_spbe::STATUS_SELESAI,
            'status_ver' => 'Selesai',
            'verby' => $user->name,
            'tglver' => now(),
            'ketver' => $request->ketver,
        ];

        if ($request->hasFile('berkasver')) {
            $file = $request->file('berkasver');
            $fileName = 'ver_' . time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            $file->move(public_path('storage/doc'), $fileName);
            $data['berkasver'] = $fileName;
        }

        // Update Ticket
        $task->update($data);

        // Update Mandate Status
        $mandate->update(['status' => 'selesai']);

        \RealRashid\SweetAlert\Facades\Alert::success('Berhasil', 'Mandat telah diselesaikan!');
        return redirect()->route('petugas.tugas');
    }

    /**
     * Update profile information.
     */
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

    /**
     * Update user password.
     */
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
}
