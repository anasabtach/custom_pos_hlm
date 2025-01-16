<?php

namespace App\Repository\Admin;

use App\Interfaces\Admin\WordPressCategoryInterface;
use App\Models\Product;
use Illuminate\Support\Facades\Http;

class WordPressCategoryRepository implements WordPressCategoryInterface
{
    protected $baseUrl;
    protected $consumerKey;
    protected $consumerSecret;

    public function __construct()
    {
        $this->baseUrl          = config('app.wordpress_api_url'); // Base URL of your WordPress site
        $this->consumerKey      = config('app.wordpress_consumer_key'); // Consumer Key
        $this->consumerSecret   = config('app.wordpress_consumer_secret'); // Consumer Secret
    }

    /**
     * Generate authentication query parameters.
     */
    private function getAuthParams()
    {
        return [
            'consumer_key' => $this->consumerKey,
            'consumer_secret' => $this->consumerSecret,
        ];
    }

    /**
     * Create a new category in WordPress.
     */
    public function store($arr)
    {   
        $categoryData = [
            'name' => $arr['category_name'],
            'description' => $arr['description'] ?? '',
            'slug' => $arr['slug'] ?? '',
        ];
        
        $response = Http::withBasicAuth( $this->consumerKey,$this->consumerSecret)->post("{$this->baseUrl}/products/categories", $categoryData);
    
        if ($response->successful()) {
            return $response->json()['id'] ?? null;
        }else{
            throw new \Exception("Error: {$response->status()} - {$response->body()}");
        }
    }

    /**
     * Update an existing category in WordPress.
     */
    public function update(array $arr, $categoryId = null)
    {   
        if (!is_null($categoryId)) {
            $categoryData = [
                'name' => $arr['category_name'], // The updated category name
                'description' => $arr['description'] ?? '', // Optional updated description
                'slug' => $arr['slug'] ?? '', // Optional updated slug
            ];

            $response = Http::withBasicAuth( $this->consumerKey,$this->consumerSecret)->post("{$this->baseUrl}/products/categories/{$categoryId}", $categoryData + $this->getAuthParams());
            
            if ($response->successful()) {
                return $response->json(); // Return the updated category data
            }
            throw new \Exception('Failed to update category: ' . $response->body());
        }
    }

    public function delete($category_id){
        $response = Http::withBasicAuth($this->consumerKey, $this->consumerSecret)->delete("{$this->baseUrl}/products/categories/{$category_id}", ['force' => true]);        
        if ($response->successful()) {
            return $response->json(); // Return the updated category data
        }
        throw new \Exception('Failed to update category: ' . $response->body());
    }


}
