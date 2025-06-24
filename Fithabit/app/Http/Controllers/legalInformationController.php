<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LegalInformationController extends Controller
{
    public function index()
    {
        return view("legalInformation.index");
    }
}
