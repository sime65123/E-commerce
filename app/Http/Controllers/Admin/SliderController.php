<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SliderFormRequest;
use Illuminate\Support\Facades\File;
use App\Models\Slider;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->paginate(5);
        return view('admin.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(SliderFormRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/sliders/',$filename);
            $validatedData['image'] = "uploads/sliders/$filename";
         }

        Slider::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'],
            'status' => $request->status == true ? '1':'0',
        ]);

        return redirect('admin/sliders')->with('message', 'Slider Added Successfully');
    }

    public function edit(Slider $slider){
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(SliderFormRequest $request, Slider $slider){

        $validatedData = $request->validated();

        if ($request->hasFile('image')) {

            $destination = $slider->image;
            if(File::exists($destination)){
                File::delete($destination);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/sliders/',$filename);
            $validatedData['image'] = "uploads/sliders/$filename";
         }

        Slider::where('id', $slider->id)->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'] ?? $slider->image,
            'status' => $request->status == true ? '1':'0',
        ]);

        return redirect('admin/sliders')->with('message', 'Slider Added Successfully');
    }

    public function destroy(Slider $slider)
    {
        if ($slider->count() > 0) {

            $destination = $slider->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $slider->delete();
            return redirect('admin/sliders')->with('message', 'Slider Deleted Successfully');
        }

        return redirect('admin/sliders')->with('message', 'Something Went Wrong');
    }
}
