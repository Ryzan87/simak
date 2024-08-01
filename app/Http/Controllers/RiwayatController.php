<?php

namespace App\Http\Controllers;
use App\Models\KategoriModel;
use App\Models\ArsipModel;
use App\Models\RiwayatModel;

use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    protected $riwayatModel;

    public function __construct()
    {
        $this->riwayatModel = new RiwayatModel();
    }

    public function index()
    {
        $data = [
            'riwayat' => $this->getRiwayat()
        ];

        // dd(session()->has('role') && isset(session('role')['is_admin']));

        if (session()->has('role') && isset(session('role')['is_admin'])) {
            // jika user admin
            return view('riwayat/admin/index', $data);
        } else if (session()->has('role') && isset(session('role')['is_staff'])) {
            // jika user staf
            return view('riwayat/staff/index', $data);
        }
    }

    private function getRiwayat($id = null)
    {
        if (is_null($id)) {
            $riwayat = RiwayatModel::with('arsip')
                ->select('riwayat.*', 'riwayat.created_at as riwayat_create');

            if (session()->has('role') && isset(session('role')['is_admin'])) {
                $riwayat->where('role', '=', 1);
            }

            return $riwayat->get();
        }

        return RiwayatModel::with('arsip')
            ->select('riwayat.*', 'riwayat.created_at as riwayat_create')
            ->where('riwayat_id', $id)
            ->first();
    }
}
