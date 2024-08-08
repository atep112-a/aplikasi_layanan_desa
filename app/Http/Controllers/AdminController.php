<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Domisili;
use App\Models\Kelahiran;
use App\Models\Kematian;
use App\Models\Skt;
use App\Models\Sktm;
use App\Models\Sku;
use App\Models\Sppt;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(): View
    {
        $admins = Admin::latest()->paginate(10);

        return view('admins.index', compact('admins'));
    }

    public function create(): View
    {
        return view('admins.create');
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|min:5',
            'password' => 'required|min:8',
        ]);

        //create admin
        Admin::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password)  // Simpan password dengan hashing
        ]);

        //redirect to index
        return redirect()->route('admins.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id): View
    {
        //get admin by ID
        $admin = Admin::findOrFail($id);

        //render view with admin
        return view('admins.edit', compact('admin'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|min:5',
            'password' => 'required|min:8',
        ]);

        //get admin by ID
        $admin = Admin::findOrFail($id);

        $admin->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),  // Simpan password dengan hashing
        ]);

        //redirect to index
        return redirect()->route('admins.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        //get admin by ID
        $admin = Admin::findOrFail($id);

        //delete admin
        $admin->delete();

        //redirect to index
        return redirect()->route('admins.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function showLoginForm(): View
    {
        return view('admins.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');


        $admin = Admin::where('email', $credentials['email'])->first();

        if ($admin) {
            Log::info('Admin found');
            if (\Hash::check($credentials['password'], $admin->password)) {
                Log::info('Password check passed for admin:');
                Auth::guard('admin')->login($admin);
                return redirect()->route('dashboard.index');
            } else {
                Log::warning('Password check failed for admin:');
            }
        } else {
            Log::warning('Admin not found with given email:', ['email' => $credentials['email']]);
        }

        return redirect()->back()->with('error', 'Invalid credentials');
    }

    public function logout(): RedirectResponse
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success', 'You have logged out.');
    }

    public function getNotifications()
{
    $sktm = Sktm::where('status', 'proses')->where('seen', false)->get();
    $sppt = Sppt::where('status', 'proses')->where('seen', false)->get();
    $domisili = Domisili::where('status', 'proses')->where('seen', false)->get();
    $kelahiran = Kelahiran::where('status', 'proses')->where('seen', false)->get();
    $kematian = Kematian::where('status', 'proses')->where('seen', false)->get();
    $skt = Skt::where('status', 'proses')->where('seen', false)->get();
    $sku = Sku::where('status', 'proses')->where('seen', false)->get();

    $notifications = [
        'sktm' => $sktm,
        'sppt' => $sppt,
        'domisili' => $domisili,
        'kelahiran' => $kelahiran,
        'kematian' => $kematian,
        'skt' => $skt,
        'sku' => $sku,
    ];

    return response()->json($notifications);
}

}
