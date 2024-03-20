<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AboutRequest;
use App\Models\About;

class AboutController extends Controller
{
    public function index()
    {
        $data['about'] = About::first();
        return view('admin.home.about')->with($data);
    }

    public function update(AboutRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('image_1')) {
            $data['image_1'] = $request->file('image_1')->storeAs(
                'public/about',
                'image_1.' . $request->file('image_1')->getClientOriginalExtension(),
                'public'
            );
        }

        if ($request->hasFile('image_2')) {
            $data['image_2'] = $request->file('image_2')->storeAs(
                'public/about',
                'image_2.' . $request->file('image_2')->getClientOriginalExtension(),
                'public'
            );
        }

        if ($request->hasFile('image_3')) {
            $data['image_3'] = $request->file('image_3')->storeAs(
                'public/about',
                'image_3.' . $request->file('image_3')->getClientOriginalExtension(),
                'public'
            );
        }
        $about = About::first();
        $about->update($data);
        return redirect()->back()->with('success', 'About updated successfully');
    }
}
