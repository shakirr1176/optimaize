<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(): View
    {
        $data['title'] = __('Products');
        return view('admin.products.index', $data);
    }

    public function create(): View
    {
        $data['title'] = __('Create Product');
        return view('admin.products.create', $data);
    }

    public function show(): View
    {
        $data['title'] = __('Show Product');
        return view('admin.products.show', $data);
    }
}
