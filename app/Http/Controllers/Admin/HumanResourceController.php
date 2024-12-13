<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;


class HumanResourceController extends Controller
{
    public function index(): View
    {
        $data['title'] = __('Human Resource');
        return view('admin.human-resource.index', $data);
    }

    public function create(): View
    {
        $data['title'] = __('Create Human Resource');
        return view('admin.human-resource.create', $data);
    }

    public function show(): View
    {
        $data['title'] = __('Eurico Fertuzinhos');
        return view('admin.human-resource.show', $data);
    }
}
