<?php

namespace App\Interfaces\Admin;

use App\Models\Color;
use Illuminate\Database\Eloquent\Collection;

interface ColorInterface
{   
    public function getColors(): Collection;
    
    public function store(array $data): Color;

    public function edit(string $color_id):Color;

    public function delete(string $color_id):bool;

    public function update(array $arr):bool;
    
    public function brandsCount():int;

    public function remarks($remarks, $color_id):bool;
}
