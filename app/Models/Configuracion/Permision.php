<?php

namespace App\Models\Configuracion;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Models\Role as SpatieRole;
use Spatie\Permission\Models\Permission as SpatiePermission;
class Permision extends SpatiePermission
{
    use HasPermissions;

    protected $fillable = ['name','guard_name'];

}
