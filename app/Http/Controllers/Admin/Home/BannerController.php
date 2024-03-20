<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BannerRequest;
use App\Models\Banner;

class BannerController extends Controller
{
    public function index()
    {
        $data['banner'] = Banner::first();
        return view('admin.home.banner')->with($data);
    }

    public function update(BannerRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->storeAs(
                'public/banner',
                'banner.' . $request->file('image')->getClientOriginalExtension(),
                'public'
            );
        }
        $banner = Banner::first();
        $banner->update($data);
        return redirect()->back()->with('success', 'Banner updated successfully');
    }
}
