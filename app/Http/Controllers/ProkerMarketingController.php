<?php

namespace App\Http\Controllers;

use App\Imports\ProkerMarketingImport;
use App\Models\ProkerMarketing;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProkerMarketingController extends Controller
{
    public function index(Request $request)
    {
        $proker_marketing = ProkerMarketing::query();

        if ($request->query('search')) {
            $proker_marketing = $proker_marketing->where('nama', 'like', '%' . $request->query('search') . '%');
            $proker_marketing = $proker_marketing->orWhere('deskripsi', 'like', '%' . $request->query('search') . '%');
        }

        return view('proker-marketing.staff.index', [
            'proker_marketing' => $proker_marketing->paginate(),
        ]);
    }

    public function import(Request $request)
    {
        Excel::import(new ProkerMarketingImport, $request->file('file'));

        return redirect()->route('proker-marketing.index');
    }

    public function clear(Request $request)
    {
        ProkerMarketing::truncate();

        return redirect()->route('proker-marketing.index');
    }

    public function update(Request $request, string $id)
    {
        $proker_marketing = ProkerMarketing::find($id);

        if (!$proker_marketing) {
            return redirect()->back();
        }

        $proker_marketing->status = true;

        $proker_marketing->save();

        return redirect()->back();
    }
}
