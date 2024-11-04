<?php

namespace App\Repository\Admin;

use App\Interfaces\Admin\UnitInterface;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Collection;

class UnitRepository implements UnitInterface
{
    public $unit;
    
    public function __construct(Unit $unit)
    {
        $this->unit = $unit;    
    }
    public function store(array $data): Unit
    {       
        return $this->unit->create([
            'admin_id'   => auth()->id(),
            'name'       => $data['unit_name'],
            'short_hand' => $data['short_hand'],
        ]);
    }

    public function getUnits(): Collection
    {
        return $this->unit->latest()->get();
    }

    public function edit(string $unit_id):Unit
    {   
        return $this->unit->findOrFail(hashid_decode($unit_id));
    }

    public function update(array $arr):bool
    {   
        return $this->unit->findOrFail(hashid_decode($arr['unit_id']))->update([
            'name'  => $arr['unit_name'],
        ]);
    }

    public function delete(string $unit_id):bool
    {
        return $this->unit->destroy(hashid_decode($unit_id));
    }
}
