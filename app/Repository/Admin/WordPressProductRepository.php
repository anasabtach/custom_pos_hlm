<?php

namespace App\Repository\Admin;

use App\Models\Product;
use Illuminate\Support\Facades\Http;

class WordPressProductRepository
{
    protected $baseUrl;
    protected $consumerKey;
    protected $consumerSecret;

    public function __construct()
    {
        $this->baseUrl          = config('app.wordpress_api_url'); // WordPress API URL
        $this->consumerKey      = config('app.wordpress_consumer_key'); // Consumer Key
        $this->consumerSecret   = config('app.wordpress_consumer_secret'); // Consumer Secret
    }

    /**
     * Create a new product in WordPress.
     */
    // public function store($arr, $image_data)
    // {     
    //     $productData = [
    //         'name'              => $arr->name,
    //         'type'              => 'simple',
    //         'regular_price'     => $arr->price,
    //         'description'       => $arr->notes ?? '',
    //         'sku'               => $arr->sku,
    //         'stock_quantity'    => $arr->stock,
    //         'manage_stock'      => true,
    //         'status'            => $arr->status == 1 ? 'publish' : 'draft',
    //         'images' => [
    //             [
    //                 'src' => asset($image_data['image']),
    //             ],
    //         ],
    //         'categories' => [
    //             [
    //                 'id' => $arr->category->wordpress_id ?? null, 
    //             ],
    //         ],
    //     ];
        
    //     // dd($productData);

    //     $response = Http::withBasicAuth($this->consumerKey, $this->consumerSecret)->post("{$this->baseUrl}/products", $productData);

    //     if ($response->successful()) {
    //         return $response->json()['id'];
    //     }else{
    //         throw new \Exception('Failed to create product: ' . $response->body());
    //     }
    // }
    // public function store($arr, $image_data)
    // {   dd($arr->variations);
    //     // Initialize the product data array
    //     $productData = [
    //         'name'              => $arr->name,
    //         'type'              => 'simple',  // You can adjust this to 'variable' if necessary
    //         'regular_price'     => $arr->price,
    //         'description'       => $arr->notes ?? '',
    //         'sku'               => $arr->sku ?? '',
    //         'stock_quantity'    => $arr->stock ?? 0,
    //         'manage_stock'      => true,
    //         'status'            => $arr->status == 1 ? 'publish' : 'draft',
    //         'images' => [
    //             [
    //                 'src' => asset($image_data['image']),
    //             ],
    //         ],
    //         'categories' => [
    //             [
    //                 'id' => $arr->category->wordpress_id ?? null,
    //             ],
    //         ],
    //     ];

    //     // Prepare attributes (supplier_id, unit_id, color) conditionally
    //     $attributes = [];

    //     if (!empty($arr->brand_id)) {
    //         $attributes[] = [
    //             'id' => 2,  // Replace with actual Supplier attribute ID
    //             'name' => 'Brand',
    //             'position' => 0,
    //             'visible' => true,
    //             'variation' => false,
    //             'options' => [$arr->brand->name],
    //         ];
    //     }

    //     // If unit_id is provided, add it to the attributes
    //     if (!empty($arr->unit_id)) {
    //         $attributes[] = [
    //             'id' => 4,  // Replace with actual Unit attribute ID
    //             'name' => 'Unit',
    //             'position' => 1,
    //             'visible' => true,
    //             'variation' => false,
    //             'options' => [$arr->unit->name],
    //         ];
    //     }

    //     // If color is provided, add it to the attributes
    //     if (!empty($arr->color)) {
    //         $attributes[] = [
    //             'id' => 1,  // Replace with actual Color attribute ID
    //             'name' => 'Color',
    //             'position' => 2,
    //             'visible' => true,
    //             'variation' => false,
    //             'options' => [$arr->color],
    //         ];
    //     }

    //     if (!empty($arr->expiration)) {
    //         $attributes[] = [
    //             'id' => 5,  // Replace with actual Color attribute ID
    //             'name' => 'Expiration',
    //             'position' => 2,
    //             'visible' => true,
    //             'variation' => false,
    //             'options' => [$arr->expiration],
    //         ];
    //     }

    //     // If there are any attributes, add them to the product data
    //     if (!empty($attributes)) {
    //         $productData['attributes'] = $attributes;
    //     }

    //     // Make the API request to create the product
    //     $response = Http::withBasicAuth($this->consumerKey, $this->consumerSecret)->post("{$this->baseUrl}/products", $productData);
    //     // Check if the request was successful
    //     if ($response->successful()) {
    //         return $response->json()['id'];
    //     } else {
    //         throw new \Exception('Failed to create product: ' . $response->body());
    //     }
    // }
    public function store($arr, $image_data)
    {   
        // Initialize the product data array
        $productData = [
            'name'              => $arr->name,
            'type'              => !empty($arr->variations) ? 'variable' : 'simple', // Use 'variable' if variations exist
            'regular_price'     => empty($arr->variations) ? $arr->price : null, // Regular price only for simple products
            'description'       => $arr->notes ?? '',
            'sku'               => $arr->sku ?? '',
            'stock_quantity'    => empty($arr->variations) ? ($arr->stock ?? 0) : null, // Stock for simple products
            'manage_stock'      => true,
            'status'            => $arr->status == 1 ? 'publish' : 'draft',
            // 'images' => [
            //     [
            //         'src' => asset($image_data['image']),
            //     ],
            // ],
            'categories' => [
                [
                    'id' => $arr->category->wordpress_id ?? null,
                ],
            ],
        ];

        // Prepare attributes conditionally
        $attributes = [];

        if (!empty($arr->brand_id)) {
            $attributes[] = [
                'id' => 2, // Replace with actual Brand attribute ID
                'name' => 'Brand',
                'position' => 0,
                'visible' => true,
                'variation' => false,
                'options' => [$arr->brand->name],
            ];
        }

        if (!empty($arr->unit_id)) {
            $attributes[] = [
                'id' => 4, // Replace with actual Unit attribute ID
                'name' => 'Unit',
                'position' => 1,
                'visible' => true,
                'variation' => empty($arr->variations) ? false : true,
                'options' => [$arr->unit->name],
            ];
        }

        if (!empty($arr->color)) {
            $attributes[] = [
                'id' => 1, // Replace with actual Color attribute ID
                'name' => 'Color',
                'position' => 2,
                'visible' => true,
                'variation' => empty($arr->variations) ? false : true,
                'options' => $arr->variations && $arr->variations instanceof \Illuminate\Support\Collection
                    ? $arr->variations->pluck('color')->unique()->values()->toArray()
                    : [$arr->color],            
                ];
        }

        if (!empty($arr->expiration)) {
            $attributes[] = [
                'id' => 5, // Replace with actual Expiration attribute ID
                'name' => 'Expiration',
                'position' => 3,
                'visible' => true,
                'variation' => empty($arr->variations) ? false : true,
                'options' => [$arr->expiration],
            ];
        }

        // If there are any attributes, add them to the product data
        if (!empty($attributes)) {
            $productData['attributes'] = $attributes;
        }

        // Make the API request to create the product
        $response = Http::withBasicAuth($this->consumerKey, $this->consumerSecret)
            ->post("{$this->baseUrl}/products", $productData);

        // Check if the request was successful
        if (!$response->successful()) {
            throw new \Exception('Failed to create product: ' . $response->body());
        }

        $productId = $response->json()['id'];

        foreach ($arr->variations as $variation) {
            
            $variationData = [
                'regular_price'   => (string)$variation['price'],
                'sku'             => $variation['sku'] ?? null,
                'manage_stock'    => true,
                'stock_quantity'  => $variation['stock'] ?? 0,
                'attributes'      => [], // Initialize attributes for the variation
            ];
        
            // Add attributes to the variation data
            if (!empty($arr->color)) {
                $variationData['attributes'][] = [
                    'id'     => 1, // Replace with the actual Color attribute ID
                    'option' => $variation['color'], // Color value specific to this variation
                ];
            }
        
            if (!empty($arr->unit_id)) {
                $variationData['attributes'][] = [
                    'id'     => 4, // Replace with actual Unit attribute ID
                    'option' => $arr->unit->name, // Unit value shared across variations
                ];
            }
        
            if (!empty($arr->expiration)) {
                $variationData['attributes'][] = [
                    'id'     => 5, // Replace with actual Expiration attribute ID
                    'option' => $arr->expiration, // Expiration value shared across variations
                ];
            }
    
            // Create the variation in WordPress using the parent product ID
            $response = Http::withBasicAuth($this->consumerKey, $this->consumerSecret)->post("{$this->baseUrl}/products/{$productId}/variations", $variationData);

            // Handle response and update Laravel database
            if ($response->successful()) {
                $wordpressVariationId = $response->json()['id'];
                // Update the variation in Laravel with the WordPress variation ID
                $variationModel = $variation instanceof \App\Models\ProductVariation ? $variation : null; // Adjust as needed
                if ($variationModel) {
                    $variationModel->update(['wordpress_id' => $wordpressVariationId]);
                }
            } else {
                throw new \Exception('Failed to create variation: ' . $response->body());
            }
        }
        
        return $productId;
    }



    /**
     * Update an existing product in WordPress.
     */
    // public function update($arr, $wordpressId = null, $image_data)
    // {   
    //     if (!is_null($wordpressId)) {
    //         $productData = [
    //             'name'              => $arr->product_name,
    //             'regular_price'     => $arr->price,
    //             'description'       => $arr->notes ?? '',
    //             'sku'               => $arr->sku ?? '',
    //             'stock_quantity'    => $arr->stock ?? 0,
    //             'manage_stock'      => true,
    //             'status'            => $arr->status == 1 ? 'publish' : 'draft',
    //             'images' => [
    //                 [
    //                     'src' => asset($image_data['image']),
    //                 ],
    //             ],
    //             'categories' => [
    //                 [
    //                     'id' => $arr->category->wordpress_id ?? null, 
    //                 ],
    //             ],
    //         ];

    //     // Prepare attributes (supplier_id, unit_id, color) conditionally
    //     $attributes = [];


    //     if (!empty($arr->brand_id)) {
    //         $attributes[] = [
    //             'id' => 2,  // Replace with actual Supplier attribute ID
    //             'name' => 'Brand',
    //             'position' => 0,
    //             'visible' => true,
    //             'variation' => false,
    //             'options' => [$arr->brand->name],
    //         ];
    //     }

    //     // If unit_id is provided, add it to the attributes
    //     if (!empty($arr->unit_id)) {
    //         $attributes[] = [
    //             'id' => 4,  // Replace with actual Unit attribute ID
    //             'name' => 'Unit',
    //             'position' => 1,
    //             'visible' => true,
    //             'variation' => false,
    //             'options' => [$arr->unit->name],
    //         ];
    //     }

    //     // If color is provided, add it to the attributes
    //     if (!empty($arr->color)) {
    //         $attributes[] = [
    //             'id' => 1,  // Replace with actual Color attribute ID
    //             'name' => 'Color',
    //             'position' => 2,
    //             'visible' => true,
    //             'variation' => false,
    //             'options' => [$arr->color],
    //         ];
    //     }

    //     if (!empty($arr->expiration)) {
    //         $attributes[] = [
    //             'id' => 5,  // Replace with actual Color attribute ID
    //             'name' => 'Expiration',
    //             'position' => 2,
    //             'visible' => true,
    //             'variation' => false,
    //             'options' => [$arr->expiration],
    //         ];
    //     }

    //     // If there are any attributes, add them to the product data
    //     if (!empty($attributes)) {
    //         $productData['attributes'] = $attributes;
    //     }
   
    //         $response = Http::withBasicAuth($this->consumerKey, $this->consumerSecret)
    //             ->put("{$this->baseUrl}/products/{$wordpressId}", $productData);

    //         if ($response->successful()) {
    //             return $response->json();
    //         }else{
    //             throw new \Exception('Failed to update product: ' . $response->body());
    //         }

    //     }
    // }
    public function update($arr, $wordpressId = null, $image_data)
    {      
        if (!is_null($wordpressId)) {
            // Prepare product data for update
            $productData = [
                'name'           => $arr->product_name,
                'regular_price'  => empty($arr->variations) ? $arr->price : null, // Price for simple products
                'description'    => $arr->notes ?? '',
                'sku'            => $arr->sku ?? '',
                'stock_quantity' => empty($arr->variations) ? $arr->stock ?? 0 : null, // Stock for simple products
                'manage_stock'   => true,
                'status'         => $arr->status == 1 ? 'publish' : 'draft',
                // 'images'         => [
                //     [
                //         'src' => asset($image_data['image']),
                //     ],
                // ],
                'categories' => [
                    [
                        'id' => $arr->category->wordpress_id ?? null,
                    ],
                ],
            ];
    
            // Prepare attributes (supplier_id, unit_id, color) conditionally
            $attributes = [];

            if (!empty($arr->brand_id)) {
                $attributes[] = [
                    'id'       => 2, // Replace with actual Supplier attribute ID
                    'name'     => 'Brand',
                    'position' => 0,
                    'visible'  => true,
                    'variation' => false,
                    'options'  => [$arr->brand->name],
                ];
            }

            if (!empty($arr->unit_id)) {
                $attributes[] = [
                    'id'       => 4, // Replace with actual Unit attribute ID
                    'name'     => 'Unit',
                    'position' => 1,
                    'visible'  => true,
                    'variation' => !empty($arr->variations), // Variation if product has variations
                    'options'  => [$arr->unit->name],
                ];
            }

            if (!empty($arr->color)) {
                $attributes[] = [
                    'id'       => 1, // Replace with actual Color attribute ID
                    'name'     => 'Color',
                    'position' => 2,
                    'visible'  => true,
                    'variation' => !empty($arr->variations), // Variation if product has variations
                    'options'  => [$arr->color],
                ];
            }

            if (!empty($arr->expiration)) {
                $attributes[] = [
                    'id'       => 5, // Replace with actual Expiration attribute ID
                    'name'     => 'Expiration',
                    'position' => 3,
                    'visible'  => true,
                    'variation' => !empty($arr->variations),
                    'options'  => [$arr->expiration],
                ];
            }

            if (!empty($attributes)) {
                $productData['attributes'] = $attributes;
            }

            // Update the product in WordPress
            $response = Http::withBasicAuth($this->consumerKey, $this->consumerSecret)
                ->put("{$this->baseUrl}/products/{$wordpressId}", $productData);

            if (!$response->successful()) {
                throw new \Exception('Failed to update product: ' . $response->body());
            }

            // Handle variations if provided
            if (!empty($arr->variations)) {
                foreach ($arr->variations as $variation) {
                    $variationData = [
                        'regular_price'   => (string)$variation['price'],
                        'sku'             => $variation['sku'] ?? null,
                        'manage_stock'    => true,
                        'stock_quantity'  => $variation['stock'] ?? 0,
                        'attributes'      => [],
                    ];

                    if (!empty($arr->color)) {
                        $variationData['attributes'][] = [
                            'id'     => 1, // Replace with actual Color attribute ID
                            'option' => $variation['color'], // Color value specific to this variation
                        ];
                    }

                    if (!empty($arr->unit_id)) {
                        $variationData['attributes'][] = [
                            'id'     => 4, // Replace with actual Unit attribute ID
                            'option' => $arr->unit->name,
                        ];
                    }

                    if (!empty($arr->expiration)) {
                        $variationData['attributes'][] = [
                            'id'     => 5, // Replace with actual Expiration attribute ID
                            'option' => $arr->expiration,
                        ];
                    }

                    if (!empty($variation['wordpress_id'])) {
                        // Update existing variation
                        $variationResponse = Http::withBasicAuth($this->consumerKey, $this->consumerSecret)
                            ->put("{$this->baseUrl}/products/{$wordpressId}/variations/{$variation['wordpress_id']}", $variationData);
                        if (!$variationResponse->successful()) {
                            throw new \Exception('Failed to update variation: ' . $variationResponse->body());
                        }
                    } else {
                        // Create new variation
                        $variationResponse = Http::withBasicAuth($this->consumerKey, $this->consumerSecret)
                            ->post("{$this->baseUrl}/products/{$wordpressId}/variations", $variationData);

                        if ($variationResponse->successful()) {
                            $variationWordpressId = $variationResponse->json()['id'];
                            // Update Laravel database with the new variation WordPress ID
                            if ($variation instanceof \App\Models\ProductVariation) {
                                $variation->update(['wordpress_id' => $variationWordpressId]);
                            }
                        } else {
                            throw new \Exception('Failed to create variation: ' . $variationResponse->body());
                        }
                    }
                }
            }
            return $response->json();
        }

        throw new \Exception('WordPress ID is required for updating the product.');
    }


    /**
     * Delete a product in WordPress.
     */
    public function delete($wordpressId)
    {   
        $response = Http::withBasicAuth($this->consumerKey, $this->consumerSecret)->delete("{$this->baseUrl}/products/{$wordpressId}");

        if ($response->successful()) {
            return true;
        }else{
            throw new \Exception('Failed to delete product: ' . $response->body());
        }
    }

    public function updateProductStock($arr, $type){
        $product_ids = array_map("hashid_decode", $arr['product_id']);
        $products    = Product::whereIn('id', $product_ids)->get();
        foreach($products AS $key=>$product){
            if(isset($product->wordpress_id)){
                $productData = [
                    'stock_quantity' => $product->stock,
                ];        
                $response = Http::withBasicAuth($this->consumerKey, $this->consumerSecret)->put("{$this->baseUrl}/products/{$product->wordpress_id}", $productData);         
            }
        }
    }


    public function updateSingleProductStock($wordpress_id, $stock){
        $productData = [
            'stock_quantity' => $stock,
        ];        
        $response = Http::withBasicAuth($this->consumerKey, $this->consumerSecret)->put("{$this->baseUrl}/products/{$wordpress_id}", $productData);    
    }

    public function updateStatus($product_id, $status){
        $product = Product::findOrFail(hashid_decode($product_id));
        if(isset($product->wordpress_id)){
            $productData = [
                'status'            => $status == 1 ? 'publish' : 'draft',
            ];
            $response = Http::withBasicAuth($this->consumerKey, $this->consumerSecret)->put("{$this->baseUrl}/products/{$product->wordpress_id}", $productData);
        }

        
    }
}
