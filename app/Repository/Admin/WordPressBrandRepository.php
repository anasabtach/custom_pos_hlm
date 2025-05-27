<?php

namespace App\Repository\Admin;

use App\Interfaces\Admin\WordPressBrandInterface;
use Illuminate\Support\Facades\Http;

class WordPressBrandRepository implements WordPressBrandInterface
{
    protected $baseUrl;
    protected $consumerKey;
    protected $consumerSecret;

    public function __construct()
    {
        $this->baseUrl          = config('app.wordpress_api_url');
        $this->consumerKey      = config('app.wordpress_consumer_key');
        $this->consumerSecret   = config('app.wordpress_consumer_secret');
    }

    /**
     * Store a new brand as a WooCommerce product tag.
     */
    public function store($arr)
    {   
        $tagData = [
            'name' => $arr['brand_name'],
            'slug' => $arr['slug'] ?? '',
            'description' => $arr['description'] ?? '',
        ];

        $response = Http::withBasicAuth($this->consumerKey, $this->consumerSecret)
            ->post("{$this->baseUrl}/products/tags", $tagData);

        if ($response->successful()) {
            return $response->json()['id'] ?? null;
        }

        throw new \Exception("Tag creation failed: {$response->status()} - {$response->body()}");
    }

    /**
     * Update an existing product tag.
     */
    public function update(array $arr, $tagId = null)
    {   
        if ($tagId) {
            $tagData = [
                'name' => $arr['brand_name'],
            ];
            
            $response = Http::withBasicAuth($this->consumerKey, $this->consumerSecret)
                ->put("{$this->baseUrl}/products/tags/{$tagId}", $tagData);
            if ($response->successful()) {
                return $response->json();
            }

            throw new \Exception('Failed to update tag: ' . $response->body());
        }
    }

    /**
     * Delete a product tag (force delete).
     */
    public function delete($tagId)
    {
        $response = Http::withBasicAuth($this->consumerKey, $this->consumerSecret)
            ->delete("{$this->baseUrl}/products/tags/{$tagId}", ['force' => true]);

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception('Failed to delete tag: ' . $response->body());
    }
}
