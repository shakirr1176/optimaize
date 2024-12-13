<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Http\Request;

class RoutesController extends Controller
{
    public function index(): View
    {
        $data['title'] = __('routes');
        return view('admin.routes.index', $data);
    }

    public function create(): View
    {
        $data['title'] = __('Create Human Resource');
        return view('admin.routes.create', $data);
    }

    public function show(): View
    {
        $data['title'] = __('Eurico Fertuzinhos');
        return view('admin.routes.show', $data);
    }
}
