<?php

namespace App\Livewire;

use App\Models\Customer;
use App\Models\Product;
use Livewire\Component;

class StoreOverview extends Component
{
    public function render()
    {
        return view('livewire.store-overview', [
            'product_count' => Product::count(),
            'customer_count' => Customer::count(),
        ]);
    }
}
