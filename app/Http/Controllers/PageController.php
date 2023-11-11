<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\PageView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PageController extends Controller
{
    public function index()
    {
        $parentSlug = request()->parentSlug;
        $childSlug = request()->childSlug;

        // check if it's just a parent page
        if ($childSlug !== null) {
            $slug = $childSlug;
        } else {
            $slug = $parentSlug;
        }

        if ($slug === null) {
            $slug = '/';
        }

        $page = Page::query()->online()->where('slug', $slug)->with('parentPage', 'pageSliderItems')->first();

        if (!empty($page->parentPage) && $childSlug === null) {
            return redirect()->to($page->link);
        }

        if (empty($page)) {
            abort(404);
        }

        //$existingView = PageView::query()->where('page_id', $page->id)
        //    ->where('ip_address', stringEncryption('encrypt', request()->ip()))
        //    ->first();

        //if (!$existingView) {
        //    $page_view = PageView::query()->with(['teasers', 'pageSliderItems', 'publicPageSliderItems'])->create([
        //        'page_id' => $page->id,
        //        'ip_address' => stringEncryption('encrypt', request()->ip()),
        //    ]);

        //    $ip_info = ip_info(request()->ip());
        //    if(!empty($ip_info)) {
        //        $page_view->update([
        //            'location' => $ip_info
        //        ]);
        //    }
        //}

        return view('contents.page', compact('page'));
    }
}
