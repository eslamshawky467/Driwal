<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Package;
class PackageSearch extends Component
{
    public $package_search;
    public $packages;
    public function render()
    {
        $this->packages=Package::where('name_'.app()->getLocale(),'like','%'.$this->package_search.'%')->get();
        return view('livewire.package-search');
    }
}
