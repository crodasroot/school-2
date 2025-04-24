<?php

namespace App\Models\Configuracion;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Models\Role as SpatieRole;
class Role extends SpatieRole
{
    use HasPermissions;

    protected $fillable = ['name'];

}
