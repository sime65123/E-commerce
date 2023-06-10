<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class View extends Component
{
    public $category, $product, $productColorSelectedQuantity, $quantityCount = 1, $productcolorId;

    public function addToWishlist($productId)
    {
        if (Auth::check()) {

            if (Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                session()->flash('message', 'Already Added To Wishlist');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Already Added To Wishlist',
                    'type' => 'warning',
                    'status' => 409
                ]);
                return false;
            }else {
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId
                ]);
                $this->emit('wishlistAddedUpdated');
                session()->flash('message', 'Wishlist Added Successfuly');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Wishlist Added Successfuly',
                    'type' => 'success',
                    'status' => 200
                ]);
            }

        }else {
            session()->flash('message', 'Please Login To Continue');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please Login To Continue',
                'type' => 'info',
                'status' => 401
            ]);
            return false;
        }
    }
    public function colorSelected($productcolorId)
    {
        $this->productcolorId = $productcolorId;
        $productcolor = $this->product->productColors()->where('id', $productcolorId)->first();
        $this->productColorSelectedQuantity = $productcolor->quantity;

        if ($this->productColorSelectedQuantity == 0) {
            $this->productColorSelectedQuantity = 'outOfStock';
        }
    }

    public function incrementQuantity()
    {
        if ($this->quantityCount < 50) {
            $this->quantityCount++;
        }
    }

    public function decrementQuantity()
    {
        if ($this->quantityCount > 1) {
            $this->quantityCount--;
        }
    }

    public function addToCart(int $productId)
    {
        if (Auth::check()) {
            if ($this->product->where('id', $productId)->where('status', '0')->exists()) {
                if ($this->product->productColors()->count() > 1) {
                    if ($this->productColorSelectedQuantity != NULL) {
                        if (Cart::where('user_id', auth()->user()->id)
                                ->where('product_id', $productId)
                                ->where('product_color_id', $this->productcolorId)
                                ->exists())
                        {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Product Already Added To Cart',
                                'type' => 'warning',
                                'status' => 200
                            ]);
                        }else {
                            $productcolor = $this->product->productColors()->where('id', $this->productcolorId)->first();
                            if ($productcolor->quantity >= 0) {
                                if ($productcolor->quantity >= $this->quantityCount) {
                                    Cart::create([
                                        'user_id' => auth()->user()->id,
                                        'product_id' => $productId,
                                        'product_color_id' => $this->productcolorId,
                                        'quantity' =>  $this->quantityCount
                                    ]);

                                    $this->emit('cartAddedUpdated');
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Product Added Successfuly To cart',
                                        'type' => 'success',
                                        'status' => 200
                                    ]);
                                }else {
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Only '.$productcolor->quantity.' Quantity Available',
                                        'type' => 'warning',
                                        'status' => 404
                                    ]);
                                }
                            }else {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Out Of Stock',
                                    'type' => 'warning',
                                    'status' => 404
                                ]);
                            }
                        }
                    }else {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Select Your Product Color',
                            'type' => 'warning',
                            'status' => 404
                        ]);
                    }
                }else {
                    if (Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Product Already Added',
                            'type' => 'warning',
                            'status' => 200
                        ]);
                    } else {
                        if ($this->product->quantity > 0) {
                            if ($this->product->quantity >= $this->quantityCount) {
                                Cart::create([
                                    'user_id' => auth()->user()->id,
                                    'product_id' => $productId,
                                    'quantity' =>  $this->quantityCount
                                ]);

                                $this->emit('cartAddedUpdated');
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Product Added Successfuly To cart',
                                    'type' => 'success',
                                    'status' => 200
                                ]);
                            }else {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Only '.$this->product->quantity.' Quantity Available',
                                    'type' => 'warning',
                                    'status' => 404
                                ]);
                            }
                        }else{
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Out Of Stock',
                                'type' => 'warning',
                                'status' => 404
                            ]);
                        }
                    }
                }
            }else{
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Product Does Not Exists',
                    'type' => 'info',
                    'status' => 404
                ]);
            }
        }else{
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please Login To Add To Cart',
                'type' => 'info',
                'status' => 401
            ]);
        }
    }

    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.frontend.product.view', [
            'product' => $this->product,
            'category' => $this->category
        ]);
    }
}
