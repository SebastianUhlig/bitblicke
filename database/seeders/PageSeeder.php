<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Page::factory()->create([
            'meta_title' => 'Home Page',
            'slug' => '/',
            'header_nav_title' => 'Home Page',
            'footer_nav_title' => 'Home Page',
            'header_nav_active' => true,
            'h1' => 'Home Page',
            'subtitle' => 'A simple and nice Home Page',
            'online' => true,
            'locked' => true,
        ]);

        Page::factory()->create([
            'meta_title' => 'Second Page',
            'slug' => 'second-page',
            'header_nav_title' => 'Second Page',
            'footer_nav_title' => 'Second Page',
            'header_nav_active' => true,
            'h1' => 'Second Page',
            'subtitle' => 'A simple and nice Second Page',
            'online' => true,
        ]);

        $parent_page = Page::factory()->create([
            'meta_title' => 'Third Page',
            'slug' => 'third-page',
            'header_nav_title' => 'Third Page',
            'footer_nav_title' => 'Third Page',
            'header_nav_active' => true,
            'h1' => 'Third Page',
            'subtitle' => 'A simple and nice Third Page',
            'online' => true,
        ]);

            Page::factory()->create([
                'parent_page_id' => $parent_page->id,
                'meta_title' => 'Sub Page 1',
                'slug' => 'sub-page-1',
                'header_nav_title' => 'Sub Page 1',
                'footer_nav_title' => 'Sub Page 1',
                'header_nav_active' => true,
                'h1' => 'Sub Page 1',
                'subtitle' => 'A simple and nice Sub Page 1',
                'online' => true,
            ]);

            Page::factory()->create([
                'parent_page_id' => $parent_page->id,
                'meta_title' => 'Sub Page 2',
                'slug' => 'sub-page-2',
                'header_nav_title' => 'Sub Page 2',
                'h1' => 'Sub Page 2',
                'subtitle' => 'A simple and nice Sub Page 2',
                'online' => true,
            ]);

        Page::factory()->create([
            'meta_title' => 'Footer Page',
            'slug' => 'footer-page',
            'header_nav_title' => 'Footer Page',
            'footer_nav_title' => 'Footer Page',
            'footer_nav_active' => true,
            'h1' => 'Forth Page',
            'subtitle' => 'A simple and nice Footer Page',
            'online' => true,
        ]);

        //Page::factory(9)->create();
    }
}
