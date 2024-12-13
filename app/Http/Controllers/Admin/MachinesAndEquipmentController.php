<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class MachinesAndEquipmentController extends Controller
{
    public function index(): View
    {
        $data['title'] = __('Machines And Equipment');
        return view('admin.machines-and-equipment.index', $data);
    }

    public function create(): View
    {
        $data['title'] = __('Create Machine and Equipment');
        return view('admin.machines-and-equipment.create', $data);
    }

    public function show(): View
    {
        $data['title'] = __('Show Machine and Equipment');
        return view('admin.machines-and-equipment.show', $data);
    }
}

