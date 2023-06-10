<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistShow extends Component
{
    public function removeWishlistItem(int $wishlistId)
    {
        Wishlist::where('user_id', auth()->user()->id)->where('id', $wishlistId)->delete();
        session()->flash('message', 'Wishlist Item Removed Successfully');
        $this->emit('wishlistAddedUpdated');
        $this->dispatchBrowserEvent('message', [
            'text' => 'Wishlist Item Removed Successfully',
            'type' => 'warning',
            'status' => 200
        ]);
    }
    public function render()
    {
        $wishlist = Wishlist::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.wishlist-show', [
            'wishlist' => $wishlist
        ]);
    }
}
