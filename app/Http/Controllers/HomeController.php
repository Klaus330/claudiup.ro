<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;


class HomeController extends Controller
{
 	public function secret()
 	{
 		return view('secret.whack');
 	}
}
