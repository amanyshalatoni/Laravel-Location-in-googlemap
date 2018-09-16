<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class BaseController extends Controller
{
    protected $ClientId=1;
     public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('ClientRole');
    }
    
}