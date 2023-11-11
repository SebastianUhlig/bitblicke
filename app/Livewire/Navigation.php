<?php

namespace App\Livewire;

use App\Models\Page;
use Livewire\Component;

class Navigation extends Component
{
    public bool $logo = true;
    public string $position = 'header';

    public function mount(bool $logo, string $position)
    {
        $this->logo = $logo;
        $this->position = $position;
    }

    public function render()
    {
        switch ($this->position) {
            default:
            case 'header':
                $pages = Page::online()->headerNav()->with('childPages')->get();
                break;
            case 'footer':
                $pages = Page::online()->footerNav()->with('childPages')->get();
                break;
        }

        return view('livewire.navigation', compact('pages'));
    }
}
