<?php

namespace App\Console\Commands;

use App\Models\Blogs;
use App\Models\Category;
use App\Models\Product;
use App\Models\protfolio;
use App\Models\ShopProduct;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sitemap = Sitemap::create();

        // Add static routes
        $staticRoutes = [
            '/',
            route('about'),
            route('our.services'),
            route('our.products'),
            route('our.protfolio'),
            route('our.blogs'),
            route('contact'),
            route('our.cliends'),
            route('services.product.checkout'),
            route('services.order.checkout'),
            route('service.order.otp'),
            route('service.order.success'),
            route('privacy.policy'),
            route('terms'),
            route('landing'),
        ];

        foreach ($staticRoutes as $route) {
            $sitemap->add(Url::create($route));
        }

        // Add dynamic shop products
        $shopproducts = ShopProduct::chunk(100, function ($shopproducts) use ($sitemap) {
            foreach ($shopproducts as $product) {
                if ($product->slug) {
                    $sitemap->add(Url::create(route('product.details', $product->slug)));
                }
            }
        });


        // Add dynamic categorys
        $categorys = Category::chunk(100, function ($categorys) use ($sitemap) {
            foreach ($categorys as $categorys) {
                if ($categorys->slug) {
                    $sitemap->add(Url::create(route('services.product', $categorys->slug)));
                }
            }
        });

        // Add dynamic products
        $products = Product::chunk(100, function ($products) use ($sitemap) {
            foreach ($products as $product) {
                if ($product->slug) {
                    $sitemap->add(Url::create(route('services.product.details', $product->slug)));
                }
            }
        });

        // Add dynamic protfolio
        $protfolios = protfolio::chunk(100, function ($protfolios) use ($sitemap) {
            foreach ($protfolios as $protfolio) {
                if ($protfolio->slug) {
                    $sitemap->add(Url::create(route('portfolio.details', $protfolio->slug)));
                }
            }
        });

        // Add dynamic Blog
        $blogs = Blogs::chunk(100, function ($blogs) use ($sitemap) {
            foreach ($blogs as $blog) {
                if ($blog->slug) {
                    $sitemap->add(Url::create(route('blog.details', $blog->slug)));
                }
            }
        });


        // Write the sitemap to a file
        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully.');

        return 0;
    }
}
