<?php

namespace App\View\Components\HtmlTags;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public string $variant_classes = '';

    /**
     * Create a new component instance.
     */
    public function __construct(string $variant = 'button-primary-large')
    {
        $variant_classes = '';
        $default_classes = 'uppercase transition-all flex items-center justify-center border tracking-widest focus:outline-none focus:ring-2 focus:ring-offset-2';

        if (!empty($variant)) {
            $variant_classes = match ($variant) {
                'button-link' => '',
                'button-transparent-small' => 'rounded-xl relative border-transparent transition-all duration-300 text-zinc-600 hover:text-zinc-900 dark:text-zinc-200 dark:hover:text-white',
                'button-danger-large' => 'rounded-lg rounded-2xl border-transparent scale-100 motion-safe:hover:scale-[1.03] transition-all duration-300 bg-red-600 px-8 py-3 text-base font-medium text-white hover:bg-red-700 focus:ring-red-600',
                'button-danger-medium' => 'rounded-md border-transparent scale-100 motion-safe:hover:scale-[1.03] transition-all duration-300 bg-red-600 px-4 py-2 text-xs font-semibold text-white hover:bg-red-700 focus:ring-red-600',
                //'button-primary-large-outlined' => 'border-2 border-primary-900 hover:border-primary-500 dark:border-primary-500 bg-transparent px-8 py-3 text-base font-medium text-primary-500 dark:text-primary-500 hover:text-white dark:hover:text-white hover:bg-primary-500 dark:hover:bg-primary-500 focus:ring-primary-500',
                'button-primary-large' => 'rounded-2xl border-transparent scale-100 motion-safe:hover:scale-[1.03] transition-all duration-300 bg-primary-500 px-8 py-3 text-base font-medium text-white hover:bg-primary-500 focus:ring-primary-500',
                'button-primary-medium' => 'rounded-lg border-transparent scale-100 motion-safe:hover:scale-[1.03] transition-all duration-300 bg-primary-500 px-4 py-2 text-xs font-semibold text-white hover:bg-primary-500 focus:ring-primary-500',
                'button-primary-small' => 'rounded-md border-transparent scale-100 motion-safe:hover:scale-[1.03] transition-all duration-300 bg-primary-500 px-2 py-0 !tracking-normal text-xs font-semibold text-white hover:bg-primary-500 focus:ring-primary-500',
                'button-white-large' => 'rounded-2xl border-transparent scale-100 motion-safe:hover:scale-[1.03] transition-all duration-300 bg-zinc-200 px-8 py-3 text-base font-medium text-zinc-800 hover:bg-zinc-300 focus:ring-zinc-200',
                'button-white-medium' => 'rounded-lg border-transparent scale-100 motion-safe:hover:scale-[1.03] transition-all duration-300 bg-zinc-200 px-4 py-2 text-xs font-semibold text-zinc-800 hover:bg-zinc-300 focus:ring-zinc-200',
                'button-white-small' => 'rounded-md border-transparent scale-100 motion-safe:hover:scale-[1.03] transition-all duration-300 bg-zinc-200 px-2 py-0 !tracking-normal text-xs font-semibold text-zinc-800 hover:bg-zinc-300 focus:ring-zinc-200',
            };
        }

        $this->variant_classes = $variant_classes.' '.$default_classes;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $variant_classes = $this->variant_classes;
        return view('components.html-tags.button', compact('variant_classes'));
    }
}
