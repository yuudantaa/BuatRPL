<?php

namespace App\Http\Controllers;

use App\Karyawan;
use App\Perusahaan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{

    public function home() {
        return view("home", ["key" => "home"]);
    }

    public function daftarKaryawan()
{
    $karyawans = Karyawan::with('perusahaan')->get();
    return view('daftarKaryawan', [
        'karyawans' => $karyawans,
        'key' => 'daftarKaryawan'
    ]);
}

    public function daftarPerusahaan() {
        $perusahaans = \App\Perusahaan::withCount('karyawans')->get(); // Menghitung jumlah karyawan
        return view("daftarPerusahaan", [
            "key" => "daftarPerusahaan",
            "perusahaans" => $perusahaans
        ]);
    }
    public function daftarSumberDana()
{
    $sumberDanas = \App\SumberDana::all();
    return view('daftarSumberDana', [
        'key' => 'daftarSumberDana',
        'sumberDanas' => $sumberDanas,
    ]);
}

    public function createKaryawan()
{
    // Jika ada relasi dengan Perusahaan yang harus digunakan:
    $perusahaans = \App\Perusahaan::all();
    return view('karyawan.create', compact('perusahaans'));
}



public function storeKaryawan(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'no_rekening' => 'required|numeric',
        'status' => 'required',
        'department' => 'required',
        'joining_date' => 'required|date',
        'nama_bank' => 'required',
        'perusahaan_id' => 'required|exists:perusahaans,id',
    ]);

    // Simpan data dengan perusahaan_id
    Karyawan::create($request->all());

    return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil disimpan.');
}

public function editKaryawan(Karyawan $karyawan)
{
    $perusahaans = Perusahaan::all(); // Ambil semua perusahaan
    return view('karyawan.edit', compact('karyawan', 'perusahaans'));
}
public function updateKaryawan(Request $request, Karyawan $karyawan)
{
    // Validasi input
    $validatedData = $request->validate([
        'nama' => 'required|string',
        'no_rekening' => 'required|string',
        'status' => 'required|string',
        'department' => 'required|string',
        'joining_date' => 'required|date',
        'nama_bank' => 'required|string',
        'perusahaan_id' => 'required|exists:perusahaans,id', // Validasi perusahaan_id
    ]);


    // Update data karyawan
    $karyawan->update([
        'nama' => $request->nama,
        'nama_bank' => $request->nama_bank,
        'no_rekening' => $request->no_rekening,
        'status' => $request->status,
        'department' => $request->department,
        'joining_date' => $request->joining_date,
        'nama_perusahaan' => $request->nama_perusahaan,
    ]);

    return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil diupdate.');
}


    // PageController.php

public function createPerusahaan()
{
    return view('perusahaan.createperusahaan');
}

public function storePerusahaan(Request $request)
{
    $validatedData = $request->validate([
        'nama_perusahaan' => 'required|string|max:255',
        'nama_bank' => 'required|string|max:255',
        'rekening' => 'required|string|max:20',
    ]);

    // Simpan data perusahaan baru
    $perusahaan = new \App\Perusahaan();
    $perusahaan->nama_perusahaan = $request->nama_perusahaan;
    $perusahaan->nama_bank = $request->nama_bank;
    $perusahaan->rekening = $request->rekening;
    $perusahaan->save();

    // Redirect ke halaman index perusahaan
    return redirect()->route('perusahaan.index')->with('success', 'Perusahaan berhasil ditambahkan');
}

public function editPerusahaan($id)
{
    $perusahaan = \App\Perusahaan::findOrFail($id);
    return view('perusahaan.editperusahaan', compact('perusahaan'));

}

public function updatePerusahaan(Request $request, $id)
{
    $perusahaan = \App\Perusahaan::findOrFail($id);

    $validatedData = $request->validate([
        'nama_perusahaan' => 'required|string|max:255',
        'nama_bank' => 'required|string|max:255',
        'rekening' => 'required|string|max:20',
    ]);

    $perusahaan->update($validatedData);

    return redirect()->route('perusahaan.index')->with('success', 'Perusahaan berhasil diperbarui!');
}

public function destroyPerusahaan($id)
{
    $perusahaan = \App\Perusahaan::findOrFail($id);
    $perusahaan->delete();

    return redirect()->route('perusahaan.index')->with('success', 'Perusahaan berhasil dihapus!');
}
public function destroyKaryawan($id)
{
    // Cari karyawan berdasarkan ID
    $karyawan = \App\Karyawan::findOrFail($id);

    // Hapus karyawan
    $karyawan->delete();

    // Redirect dengan pesan sukses
    return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil dihapus!');
}
public function adminDashboard()
{
    // Cek apakah pengguna memiliki role admin
    return view('admin.dashboard');
}

public function perusahaanDashboard()
{
    // Cek apakah pengguna memiliki role admin perusahaan
    return view('perusahaan.dashboard');
}

public function bankDashboard()
{
    // Cek apakah pengguna memiliki role admin bank
    return view('bank.dashboard');
}
public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle the login request
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $role = $request->input('role'); // Get the selected role

        if (Auth::attempt($credentials)) {
            // Check if the user has the selected role
            $user = Auth::user();

            if ($user->role == $role) {
                // Redirect to the appropriate dashboard based on the role
                switch ($role) {
                    case 'admin':
                        return redirect()->intended('/admin-dashboard');
                    case 'admin_perusahaan':
                        return redirect()->intended('/perusahaan-dashboard');
                    case 'admin_bank':
                        return redirect()->intended('/bank-dashboard');
                    default:
                        return redirect()->route('login')->withErrors(['role' => 'Invalid role selected.']);
                }
            } else {
                // If the role doesn't match, log the user out and return error
                Auth::logout();
                return redirect()->route('login')->withErrors(['role' => 'Your role does not match the selected role.']);
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function storeSumberDana(Request $request){
    $validatedData = $request->validate([
        'nama_sumber' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
    ]);

    \App\SumberDana::create($validatedData);

    return redirect()->route('sumberDana.index')->with('success', 'Sumber dana berhasil ditambahkan!');
    }

public function createSumberDana()
{
    return view('sumberDana.create');
}

public function editSumberDana($id)
{
    $dana = \App\SumberDana::findOrFail($id);
    return view('sumberDana.edit', compact('sumberDana'));

}

public function updateSumberDana(Request $request, $id)
{
    $dana = \App\SumberDana::findOrFail($id);

    $validatedData = $request->validate([
        'nama_sumber' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
    ]);

    $dana->update($validatedData);

    return redirect()->route('sumberDana.index')->with('success', 'Perusahaan berhasil diperbarui!');
}

public function destroySumberDana($id)
{
    $dana = \App\Perusahaan::findOrFail($id);
    $perusahaan->delete();

    return redirect()->route('perusahaan.index')->with('success', 'Perusahaan berhasil dihapus!');
}

}
