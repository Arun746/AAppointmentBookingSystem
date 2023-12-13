<?php

namespace App\Helpers;


use App\Models\Page;

class PageHelper
{
    public function list()
    {
        $pages = Page::get();
        return ($pages);
    }
}
