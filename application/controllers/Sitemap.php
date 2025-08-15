<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitemap extends CI_Controller {

    public function index()
    {
        // Set header to XML
        header("Content-Type: application/xml; charset=UTF-8");

        // List of your static URLs
        $pages = [
            ['loc' => base_url('/'), 'lastmod' => '2025-05-23', 'changefreq' => 'monthly', 'priority' => '1.0'],
            ['loc' => base_url('about_us'), 'lastmod' => '2025-05-20', 'changefreq' => 'monthly', 'priority' => '0.9'],
            ['loc' => base_url('our_products'), 'lastmod' => '2025-05-20', 'changefreq' => 'monthly', 'priority' => '0.8'],
            ['loc' => base_url('contact_us'), 'lastmod' => '2025-05-20', 'changefreq' => 'monthly', 'priority' => '0.7'],
            ['loc' => base_url('privacy_policy'), 'lastmod' => '2025-05-20', 'changefreq' => 'monthly', 'priority' => '0.6'],
            ['loc' => base_url('contacterms_conditionst_us'), 'lastmod' => '2025-05-20', 'changefreq' => 'monthly', 'priority' => '0.6'],
            ['loc' => base_url('shipping_policy'), 'lastmod' => '2025-05-20', 'changefreq' => 'monthly', 'priority' => '0.6'],
            ['loc' => base_url('new_cart_page'), 'lastmod' => '2025-05-20', 'changefreq' => 'monthly', 'priority' => '0.5'],
            ['loc' => base_url('registerpage'), 'lastmod' => '2025-05-20', 'changefreq' => 'monthly', 'priority' => '0.4'],
            ['loc' => base_url('loginpage'), 'lastmod' => '2025-05-20', 'changefreq' => 'monthly', 'priority' => '0.4'],
            ['loc' => base_url('order'), 'lastmod' => '2025-05-20', 'changefreq' => 'monthly', 'priority' => '0.3'],
        ];

        // Output XML
        echo '<?xml version="1.0" encoding="UTF-8"?>';
        echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        foreach ($pages as $page) {
            echo '<url>';
            echo '<loc>' . htmlspecialchars($page['loc']) . '</loc>';
            echo '<lastmod>' . $page['lastmod'] . '</lastmod>';
            echo '<changefreq>' . $page['changefreq'] . '</changefreq>';
            echo '<priority>' . $page['priority'] . '</priority>';
            echo '</url>';
        }
        echo '</urlset>';
    }
}
