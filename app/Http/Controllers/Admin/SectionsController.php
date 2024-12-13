<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Http\Request;

class SectionsController extends Controller
{
    public function index(): View
    {
        $data['title'] = __('sections');
        return view('admin.sections.index', $data);
    }

    public function create(): View
    {
        $data['title'] = __('Create sections');
        return view('admin.sections.create', $data);
    }

    public function show(): View
    {
        $data['title'] = __('Show sections');
        return view('admin.sections.show', $data);
    }
}
