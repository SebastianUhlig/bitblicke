<?php

namespace App\Observers;

use App\Models\Page;
use Illuminate\Support\Facades\Cache;

class PageObserver
{
    /**
     * Handle the Page "created" event.
     */
    public function created(Page $page): void
    {
        $get_page_from_cache = Cache::get('page_'.$page->slug);

        if (!empty($get_page_from_cache)) {
            Cache::delete('page_'.$page->slug);
        }

        $this->clearTeaserComponents($page);
    }

    /**
     * Handle the Page "updated" event.
     */
    public function updated(Page $page): void
    {
        $get_page_from_cache = Cache::get('page_'.$page->slug);

        if (!empty($get_page_from_cache)) {
            Cache::delete('page_'.$page->slug);
        }

        $this->clearTeaserComponents($page);
    }

    /**
     * Handle the Page "deleted" event.
     */
    public function deleted(Page $page): void
    {
        $get_page_from_cache = Cache::get('page_'.$page->slug);

        if (!empty($get_page_from_cache)) {
            Cache::delete('page_'.$page->slug);
        }

        $this->clearTeaserComponents($page);
    }

    /**
     * Handle the Page "restored" event.
     */
    public function restored(Page $page): void
    {
        $get_page_from_cache = Cache::get('page_'.$page->slug);

        if (!empty($get_page_from_cache)) {
            Cache::delete('page_'.$page->slug);
        }

        $this->clearTeaserComponents($page);
    }

    /**
     * Handle the Page "force deleted" event.
     */
    public function forceDeleted(Page $page): void
    {
        $get_page_from_cache = Cache::get('page_'.$page->slug);

        if (!empty($get_page_from_cache)) {
            Cache::delete('page_'.$page->slug);
        }

        $this->clearTeaserComponents($page);
    }

    /**
     * @param  Page  $page
     * @return void
     */
    public function clearTeaserComponents(Page $page): void
    {
        collect($page->content)->filter(function ($content) {
            return data_get($content, 'type') === 'teaser_group';
        })->map(function ($teaser_group) {
            $teaser_items = data_get($teaser_group, 'data.teaser_items');

            if (!empty($teaser_items)) {
                foreach ($teaser_items as $teaser_item) {
                    $teaser_id = data_get($teaser_item, 'data.teaser');

                    $from_cache = Cache::get('teaser_'.$teaser_id);

                    if (!empty($from_cache)) {
                        Cache::delete('teaser_'.$teaser_id);
                    }
                }
            }
        });
    }
}
