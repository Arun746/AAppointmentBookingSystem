<?php

namespace App\Models;

use App\Models\Page;
use App\Models\Module;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menubar extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'order', 'type', 'module_id', 'page_id', 'external_link', 'status'];
    // In Menubar model
    public function module()
    {
        return $this->belongsTo(Module::class);
    }
    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
