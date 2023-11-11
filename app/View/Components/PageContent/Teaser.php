<?php

namespace App\View\Components\PageContent;

use App\Models\Page;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class Teaser extends Component
{
    public string $title;
    public array $teaser_ids;
    public array $teasers;

    /**
     * Create a new component instance.
     */
    public function __construct(string $title, array $teasers)
    {
        $this->title = $title;

        $teaser_models = [];
        foreach($teasers as $teaser) {
            $teaser_id = data_get($teaser, 'data.teaser');

            if (empty($teaser_id)) {
                continue;
            }

            $from_cache = Cache::get('teaser_'.$teaser_id);

            if (empty($from_cache)) {
                $teaser_model = \App\Models\Teaser::where('id', data_get($teaser, 'data.teaser'))->first();
                Cache::add('teaser_'.$teaser_id, $teaser_model);
            } else {
                $teaser_model = $from_cache;
            }

            $teaser_models[] = $teaser_model;
        }

        $this->teasers = $teaser_models;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $title = $this->title;
        $teasers = $this->teasers;
        return view('components.page-content.teaser', compact('title', 'teasers'));
    }
}
