<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ReceiptController extends Controller
{
    public function index()
    {
        return view('admin.receipt.index');
    }
}
