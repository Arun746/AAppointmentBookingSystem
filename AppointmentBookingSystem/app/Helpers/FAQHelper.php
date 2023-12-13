<?php

namespace App\Helpers;

use App\Models\FAQ;

class FAQHelper
{
    public function list()
    {
        $faqs = FAQ::latest()->take(8)->get();
        return ($faqs);
    }
}
