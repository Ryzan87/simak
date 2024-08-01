<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\UserService;

class ProfileController extends Controller
{
    private $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function index()
    {
        return view('profile/index');
    }

    public function password() {
        return view('profile/password');
    }

    public function updatePassword(Request $request)
    {
        $rules = [
            'password_lama' => 'required|min:8',
            'password_baru' => 'required|min:8',
            'konfirmasi_password_baru' => 'required|min:8|same:password_baru',
        ];

        $messages = [
            'password_lama.required' => 'Password lama wajib diisi.',
            'password_lama.min' => 'Password lama harus memiliki minimal 8 karakter.',
            'password_baru.required' => 'Password baru wajib diisi.',
            'password_baru.min' => 'Password baru harus memiliki minimal 8 karakter.',
            'konfirmasi_password_baru.required' => 'Konfirmasi password baru wajib diisi.',
            'konfirmasi_password_baru.min' => 'Konfirmasi password baru harus memiliki minimal 8 karakter.',
            'konfirmasi_password_baru.same' => 'Konfirmasi password baru harus sama dengan password baru.',
        ];

        $validatedData = $request->validate($rules, $messages);
        $response = $this->userService->updateMyPassword($validatedData['password_lama'], $validatedData['password_baru'])->getData('data');

        if ($response['status'] != 'success') {
            return redirect()->back()->with('errors', 'Password gagal diperbarui');
        }

        return redirect()->back()->with('success', 'Password berhasil diganti');
    }

    public function updateImage(Request $request)
    {
        $rules = [
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:3024',
        ];

        $validated = $request->validate($rules);

        if (!$validated) {
            return redirect()->back()->withErrors(['errors' => 'Pastikan file yang dikirim adalah gambar dengan format .jpg, .jpeg, atau .png, dan memiliki ukuran maksimal 3024 Kb']);
        }

        $foto = $request->file('foto');

        // Contoh pemanggilan service untuk update gambar, sesuaikan dengan implementasi Anda
        $response = $this->userService->updateMyImage($foto);

        if ($response->getData('data')['status'] != 'success') {
            return redirect()->back()->withErrors(['errors' => $response->getData('data')['message']]);
        }

        // Simpan path gambar baru ke session
        Session::put('user_image', $response->getData('data')['data']['image']);

        return redirect()->back()->with('success', $response->getData('data')['message']);
    }

}
