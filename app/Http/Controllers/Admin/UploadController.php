<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\UploadRepository;
use Illuminate\Http\Request;
use App\Http\Services\UploadService;

class UploadController extends Controller
{
    protected $upload;
    public function __contruct(UploadRepository $upload)
    {
        $this->upload = $upload;
    }
    public function store(Request $request){

    }
}
