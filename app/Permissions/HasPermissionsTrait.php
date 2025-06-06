<?php

namespace App\Permissions;

use Illuminate\Contracts\Auth\Access\Gate;

trait HasPermissionsTrait
{
  public function hasPermissionTo($permission)
  {
    return (bool) $this->hasPermission($permission);
  }

  public function hasRole(...$roles)
  {
    foreach ($roles as $role) {
      if ($this->user_type == $role) {
        return true;
      }
    }
    return false;
  }

  protected function hasPermission($permission)
  { 
    if ($this->user_type == 'admin') {
      return true;
    }
    $permissions = collect($this->user_permissions)->toArray();
    return (bool) in_array($permission, $permissions);
  }

  public function can($permission, $arguments = [])
  {
    
    return (bool) $this->hasPermission($permission, $arguments);
  }

  public function canAny($_permissions, $arguments = [])
  {
    if ($this->user_type == 'admin') {
      return true;
    }
    $permissions = collect($this->user_permissions);
    return (bool) $permissions->whereIn('name', $_permissions)->count();
  }

  public function cant($permission, $arguments = [])
  {
    if ($this->user_type == 'admin') {
      return false;
    }
    return !$this->hasPermission($permission, $arguments);
  }

  public function cannot($permission, $arguments = [])
  {
    return $this->cant($permission, $arguments);
  }
}
