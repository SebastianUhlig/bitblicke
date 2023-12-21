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
            'meta_title' => 'Startseite',
            'slug' => '/',
            'header_nav_title' => 'Startseite',
            'footer_nav_title' => 'Startseite',
            'header_nav_active' => true,
            'h1' => 'Startseite',
            'subtitle' => 'Startseite',
            'online' => true,
            'locked' => true,
        ]);

        $parent_page = Page::factory()->create([
            'meta_title' => 'Unterseite',
            'slug' => 'unterseite',
            'header_nav_title' => 'Unterseite',
            'footer_nav_title' => 'Unterseite',
            'header_nav_active' => true,
            'h1' => 'Unterseite',
            'subtitle' => 'Unterseite',
            'online' => true,
        ]);

            Page::factory()->create([
                'parent_page_id' => $parent_page->id,
                'meta_title' => 'Untermenü 1',
                'slug' => 'untermenue-1',
                'header_nav_title' => 'Untermenü 1',
                'footer_nav_title' => 'Untermenü 1',
                'header_nav_active' => true,
                'h1' => 'Untermenü 1',
                'subtitle' => 'Untermenü 1',
                'online' => true,
            ]);

            Page::factory()->create([
                'parent_page_id' => $parent_page->id,
                'meta_title' => 'Untermenü 2',
                'slug' => 'untermenue-2',
                'header_nav_title' => 'Untermenü 2',
                'h1' => 'Untermenü 2',
                'subtitle' => 'Untermenü 2',
                'online' => true,
            ]);

        Page::factory()->create([
            'meta_title' => 'Impressum',
            'slug' => 'impressum',
            'header_nav_title' => 'Impressum',
            'footer_nav_title' => 'Impressum',
            'footer_nav_active' => true,
            'h1' => 'Impressum',
            'subtitle' => 'Impressum',
            'online' => true,
        ]);

        //Page::factory(9)->create();
    }
}
