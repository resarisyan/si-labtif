<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Banner;
use App\Models\Faq;
use App\Models\MataPraktikum;
use App\Models\Supporter;
use App\Models\User;

class WelcomeController extends Controller
{
    public function index()
    {
        $data['banner'] = Banner::first();
        $data['about'] = About::first();
        $data['faqs'] = Faq::all();
        $data['supporters'] = Supporter::all();
        $data['courses'] = MataPraktikum::all();
        $data['instructors'] = User::with('asisten')->role('asisten')->where('is_active', 1)->get();

        return view('welcome')->with($data);
    }
}
