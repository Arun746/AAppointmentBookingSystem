<?php

namespace App\Helpers;


use App\Models\Page;

class PageHelper
{
    public function list($id)
    {
        $pages = Page::where('id', $id)->get();
        return ($pages);
    }
}
