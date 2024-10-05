<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Seeker;

class BookForm extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Collection $categories, 
        public Collection $authors, 
        public Seeker $seeker = new Seeker(),
        public array $authorIds = []
    ) {}
        
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.seeker-form');
    }
}
