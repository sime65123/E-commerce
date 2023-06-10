<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Category;
use App\Models\Color;
use App\Models\Brand;
use App\Models\Product;
use App\Http\Requests\ColorFormRequest;
use Illuminate\Filesystem\Filesystem;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::latest()->paginate(5);
        return view('admin.colors.index', compact('colors'));
    }

    public function create()
    {
        return view('admin.colors.create');
    }

    public function store(ColorFormRequest $request)
    {
        $validatedData = $request->validated();
        Color::create([
            'name' => $validatedData['name'],
            'code' => $validatedData['code'],
            'status' => $request->status == true ? '1':'0',
        ]);

        return redirect('admin/colors')->with('message', 'Color Added Successfully');
    }

    public function edit(int $color_id)
    {
        $color = Color::findOrFail($color_id);
        return view('admin.colors.edit', compact('color'));
    }

    public function update(ColorFormRequest $request, int $color_id){

        $validatedData = $request->validated();
        $color = Color::findOrFail($color_id)->update([
            'name' => $validatedData['name'],
            'code' => $validatedData['code'],
            'status' => $request->status == true ? '1':'0',
        ]);

        return redirect('admin/colors')->with('message', 'Color Updated Successfully');
    }

    public function destroy(int $color_id)
    {
        $color = Color::findOrFail($color_id);
        $color->delete();

        return redirect('admin/colors')->with('message', 'Color Deleted Successfully');
    }
}
