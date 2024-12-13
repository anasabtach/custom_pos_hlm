<?php

namespace App\Repository\Admin;

use App\Interfaces\Admin\ColorInterface;
use App\Models\Brand;
use App\Models\Color;
use Illuminate\Database\Eloquent\Collection;

class ColorRepository implements ColorInterface
{
    public $color;
    
    public function __construct(Color $color)
    {
        $this->color = $color;    
    }
    public function store(array $data): Color
    {       
        return $this->color->create([
            // 'shopify_brand_id'  => $data['shopify_brand_id'],
            'admin_id'   => auth()->id(),
            // 'slug'      => $data['slug'],
            'color'      => $data['color'],
        ]);
    }

    public function getColors(): Collection
    {
        return $this->color->latest()->withLog()->get();
    }

    public function edit(string $color_id):Color
    {   
        return $this->color->findOrFail(hashid_decode($color_id));
    }

    public function update(array $arr):bool
    {   
        return $this->color->findOrFail(hashid_decode($arr['color_id']))->update([
            'color'  => $arr['color'],
        ]);
    }

    public function delete(string $color_id):bool
    {
        return $this->color->destroy(hashid_decode($color_id));
    }

    public function brandsCount():int
    {
       return  $this->color->count();
    }

    public function remarks($remarks, $color_id):bool
    {
        return $this->color->where('id', hashid_decode($color_id))->update(['remarks'=>$remarks]);
    }

}
