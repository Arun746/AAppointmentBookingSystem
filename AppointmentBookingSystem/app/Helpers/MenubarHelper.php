<?php

namespace App\Helpers;

use App\Models\Menubar;

class MenubarHelper
{
    public function list()
    {
        $menus = Menubar::where('status', 1)->orderBy('order')->get();
        return ($menus);
    }
}
