<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    protected $table = 'modules';

    protected $fillable = [
        'name', 'link'
    ];

    public function menubars()
    {
        return $this->hasMany(Menubar::class, 'module_id');
    }
}
