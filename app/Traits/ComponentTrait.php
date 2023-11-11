<?php

namespace App\Traits;

use App\Helpers\FeatureFlag;
use App\View\Components\HtmlTags\H3;
use App\View\Components\HtmlTags\H4;
use App\View\Components\HtmlTags\H5;
use App\View\Components\HtmlTags\H6;
use App\View\Components\PageContent\BlogList;
use App\View\Components\PageContent\FeaturedBlogPost;
use App\View\Components\PageContent\Form;
use App\View\Components\PageContent\Heading;
use App\View\Components\PageContent\Image;
use App\View\Components\PageContent\Images;
use App\View\Components\PageContent\Paragraph;
use App\View\Components\PageContent\ParagraphWithImage;
use App\View\Components\PageContent\ProductList;
use App\View\Components\PageContent\ProductDetail;
use App\View\Components\PageContent\Teaser;

trait ComponentTrait
{
    public static function prepareContent(array $content)
    {
        $component = null;

        switch($content['type']) {
            case 'heading':
                switch($content['data']['variant']) {
                    case 'h3':
                        $component = new H3($content['data']['title']);
                        break;
                    case 'h4':
                        $component = new H4($content['data']['title']);
                        break;
                    case 'h5':
                        $component = new H5($content['data']['title']);
                        break;
                    case 'h6':
                        $component = new H6($content['data']['title']);
                        break;
                }
                break;

            case 'paragraph':
                $component = new Paragraph($content['data']['text']);
                break;

            case 'paragraph-with-image':
                $component = new ParagraphWithImage($content['data']['text'], $content['data']['image_id'], $content['data']['image_position']);
                break;

            case 'image':
                $component = new Image($content['data']['image_id']);
                break;

            case 'images':
                $component = new Images($content['data']['title'], $content['data']['image_ids']);
                break;

            case 'teaser_group':
                $component = new Teaser($content['data']['title'], $content['data']['teaser_items']);
                break;

            case 'blog-list':
                $component = new BlogList($content['data']['title']);
                break;

            case 'featured-blog-post':
                $component = new FeaturedBlogPost($content['data']['blog_post_id']);
                break;

            case 'product-list':
                if (FeatureFlag::isShopEnabled()) {
                    $component = new ProductList($content['data']['title']);
                }
                break;

            case 'product-detail':
                if (FeatureFlag::isShopEnabled()) {
                    $component = new ProductDetail($content['data']['product_id']);
                }
                break;

            case 'form':
                $component = new Form($content['data']['title'], $content['data']['type'], $content['data']['sender'], $content['data']['recipient']);
                break;
        }

        return !is_null($component) ? $component->render() : null;
    }
}
