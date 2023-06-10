<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductFormRequest;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Color;
use App\Models\ProductColor;
use App\Models\ProductImage;
use Illuminate\Filesystem\Filesystem;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function index()
    {
        $products = Product::orderBy('id','DESC')->paginate(5);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::where('status', '0')->get();
        return view('admin.products.create', compact('categories', 'brands', 'colors'));
    }

    public function store(ProductFormRequest $request)
    {
        $validatedData = $request->validated();

        $category = Category::findOrFail($validatedData['category_id']);
        $product = $category->products()->create([
            'category_id' => $validatedData['category_id'],
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['slug']),
            'brand' => $validatedData['brand'],
            'small_description' => $validatedData['small_description'],
            'description' => $validatedData['description'],
            'original_price' => $validatedData['original_price'],
            'selling_price' => $validatedData['selling_price'],
            'quantity' => $validatedData['quantity'],
            'trending' => $request->trending == true ? '1':'0',
            'featured' => $request->featured == true ? '1':'0',
            'status' => $request->status == true ? '1':'0',
            'meta_title' => $validatedData['meta_title'],
            'meta_description' => $validatedData['meta_description'],
            'meta_keyword' => $validatedData['meta_keyword'],
        ]);

        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/products/';
            $i = 1;
            foreach ($request->file('image') as $imageFile) {
                $extension = $imageFile->getClientOriginalExtension();
                $filename = time().$i++.'.'.$extension;
                $imageFile->move($uploadPath, $filename);
                $finalImagePathName = $uploadPath.$filename;

                $product->ProductImages()->create([
                    'product_id' => $product->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }

        if ($request->colors) {
            foreach ($request->colors as $key => $color) {
                $product->productColors()->create([
                    'product_id' => $product->id,
                    'color_id' => $color,
                    'quantity' => $request->colorquantity[$key] ?? 0
                ]);
            }
        }

        return redirect('admin/products')->with('message', 'Product Added Successfully');

    }

    public function edit(int $product_id)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $product = Product::findOrFail($product_id);

        $product_color = $product->productColors->pluck('color_id')->toArray();
        $colors = Color::whereNotIn('id', $product_color)->get();
        return view('admin.products.edit', compact('categories', 'brands', 'product', 'colors'));
    }

    public function update(ProductFormRequest $request, int $product_id){

        $validatedData = $request->validated();

       /* $product = Category::findOrFail($validatedData['category_id'])->products()->where('id', $product_id)->first();

        if ($product) {
            $product->update([
                'category_id' => $validatedData['category_id'],
                'name' => $validatedData['name'],
                'slug' => Str::slug($validatedData['slug']),
                'brand' => $validatedData['brand'],
                'small_description' => $validatedData['small_description'],
                'description' => $validatedData['description'],
                'original_price' => $validatedData['original_price'],
                'selling_price' => $validatedData['selling_price'],
                'quantity' => $validatedData['quantity'],
                'trending' => $request->trending == true ? '1':'0',
                'status' => $request->status == true ? '1':'0',
                'meta_title' => $validatedData['meta_title'],
                'meta_description' => $validatedData['meta_description'],
                'meta_keyword' => $validatedData['meta_keyword'],
            ]);

            if ($request->hasFile('image')) {
                $uploadPath = 'uploads/products/';

                $i = 1;
                foreach ($request->file('image') as $imageFile) {
                    $extension = $imageFile->getClientOriginalExtension();
                    $filename = time().$i++.'.'.$extension;
                    $imageFile->move($uploadPath, $filename);
                    $finalImagePathName = $uploadPath.$filename;

                    $product->ProductImages()->create([
                        'product_id' => $product->id,
                        'image' => $finalImagePathName,
                    ]);
                }
            }

            if ($request->colors) {
                foreach ($request->colors as $key => $color) {
                    $product->productColors()->create([
                        'product_id' => $product->id,
                        'color_id' => $color,
                        'quantity' => $request->colorquantity[$key] ?? 0
                    ]);
                }
            }

            return redirect('admin/products')->with('message', 'Product Updated Successfully');
        }
        else{
            return redirect('admin/products')->with('message', 'No such Product Id Found');
        }
        */

        // Recherchez le produit directement par son ID
        $product = Product::find($product_id);

        if ($product) {
            // Mettez à jour les attributs du produit
            $product->category_id = $validatedData['category_id'];
            $product->name = $validatedData['name'];
            $product->slug = Str::slug($validatedData['slug']);
            $product->brand = $validatedData['brand'];
            $product->small_description = $validatedData['small_description'];
            $product->description = $validatedData['description'];
            $product->original_price = $validatedData['original_price'];
            $product->selling_price = $validatedData['selling_price'];
            $product->quantity = $validatedData['quantity'];
            $product->trending = $request->trending == true ? '1':'0';
            $product->featured = $request->featured == true ? '1':'0';
            $product->status = $request->status == true ? '1':'0';
            $product->meta_title = $validatedData['meta_title'];
            $product->meta_description = $validatedData['meta_description'];
            $product->meta_keyword = $validatedData['meta_keyword'];

            // Enregistrez les modifications
            $product->save();

            if ($request->hasFile('image')) {
                $uploadPath = 'uploads/products/';

                $i = 1;
                foreach ($request->file('image') as $imageFile) {
                    $extension = $imageFile->getClientOriginalExtension();
                    $filename = time().$i++.'.'.$extension;
                    $imageFile->move($uploadPath, $filename);
                    $finalImagePathName = $uploadPath.$filename;

                    $product->ProductImages()->create([
                        'product_id' => $product->id,
                        'image' => $finalImagePathName,
                    ]);
                }
            }

            if ($request->colors) {
                foreach ($request->colors as $key => $color) {
                    $product->productColors()->create([
                        'product_id' => $product->id,
                        'color_id' => $color,
                        'quantity' => $request->colorquantity[$key] ?? 0
                    ]);
                }
            }

            return redirect('admin/products')->with('message', 'Product Updated Successfully');
        } else {
            return redirect('admin/products')->with('message', 'No such Product Id Found');
        }


    }

    public function destroyImage(int $product_image_id)
    {
        $ProductImage = ProductImage::findOrFail($product_image_id);
        if (File::exists($ProductImage->image)) {
            File::delete($ProductImage->image);
        }
        $ProductImage->delete();
        return redirect()->back()->with('message', 'Product Image Deleted');
    }

    public function destroy(int $product_id)
    {
        $product = Product::findOrFail($product_id);
        if ($product->productImages) {
            foreach ($product->productImages as $image) {
                if (File::exists($image->image)) {
                    File::delete($image->image);
                }
            }
        }
        $product->delete();

        return redirect()->back()->with('message', 'Product Deleted with all its images');
    }

    public function updateProductColorQuantity(Request $request, $product_color_id)
    {
        $productColorData = Product::findOrFail($request->product_id)
                                ->productColors()->where('id', $product_color_id)->first();
        $productColorData->update([
            'quantity' => $request->qty
        ]);

        return response()->json(['message' => 'Product Color Quantity Updated']);
    }

    public function deleteProductColor($product_color_id)
    {
        $product_color = ProductColor::findOrFail($product_color_id);
        $product_color->delete();
        return response()->json(['message' => 'Product Color Quantity Deleted']);
    }
}
