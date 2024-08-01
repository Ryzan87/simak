<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\UserService;
use App\Models\KategoriModel;
use App\Models\ArsipModel;
use App\Models\RiwayatModel;

class HomeController extends Controller
{
    private $userService;
    protected $kategoriModel;
    protected $arsipModel;
    protected $riwayatModel;

    public function __construct()
    {
        $this->kategoriModel = new KategoriModel();
        $this->userService = new UserService();
        $this->arsipModel = new ArsipModel();
        $this->riwayatModel = new RiwayatModel();
    }

    public function home(Request $request)
    {
        if ($request->session()->has('role') && isset($request->session()->get('role')['is_admin'])) {
            $staffMarketing = $this->userService->getStafMarketing()->getData('data');
            $role = 1;
            $data = [
                'staffMarketing' => count($staffMarketing['data']['users']),
                'riwayat' => $this->riwayatModel->getChart($role)->toArray(),
                'arsipCount' => $this->arsipModel->count(),
                'riwayatCount' => $this->riwayatModel->where('role', $role)->count(),
                'kategori' => $this->kategoriModel->count()
            ];
            // jika user admin
            return view('layout.admin.home', $data);
        } elseif ($request->session()->has('role') && isset($request->session()->get('role')['is_staff'])) {
            $role = 0;
            $data = [
                'riwayat' => $this->riwayatModel->getChart($role)->toArray(),
                'arsipCount' => $this->arsipModel->count(),
                'riwayatCount' => $this->riwayatModel->where('role', $role)->count(),
                'kategori' => $this->kategoriModel->count()
            ];
            // jika user staf
            return view('layout.staff.home', $data);
        }

        // Jika session tidak ada atau tidak sesuai dengan role admin atau staf
        return abort(403, 'Unauthorized action.');
    }
}
