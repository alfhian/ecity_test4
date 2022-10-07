<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleAuthorization extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function group()
    {
        return $this->belongTo(Group::class);
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
