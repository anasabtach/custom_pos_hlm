<?php

namespace App\Interfaces\Admin;

use App\Models\Unit;
use Illuminate\Database\Eloquent\Collection;

interface UnitInterface
{
    public function getUnits(): Collection;
    
    public function store(array $data): Unit;

    public function edit(string $unit_id):Unit;

    public function delete(string $unit_id):bool;

    public function update(array $arr):bool;

    public function unitsCount():int;

    public function remarks($remarks, $unit_id):bool;

}