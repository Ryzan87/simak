<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserService;

class StaffController extends Controller
{
    private $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function index()
    {
        $staffMarketing = $this->userService->getStafMarketing()->getData('data')['data'];

        return view('menu-staff/admin/index', [
            'data' => $staffMarketing
        ]);
    }
}
