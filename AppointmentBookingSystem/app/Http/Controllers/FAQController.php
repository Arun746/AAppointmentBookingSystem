<?php

namespace App\Http\Controllers;

use App\Http\Requests\FAQRequest;
use App\Models\FAQ;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = FAQ::all();

        return view('faq.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('faq.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FAQRequest $request)
    {
        $validatedData = $request->validated();
        FAQ::create($validatedData);
        return redirect()->route('faq.index')->with('success', 'FAQ Created Successfully!!');
    }
    public function edit(FAQ $faq)
    {
        return view('faq.edit', compact('faq'));
    }

    public function update(FAQRequest $request, FAQ $faq)
    {
        $validatedData = $request->validated();
        $faq->update($validatedData);
        return redirect()->route('faq.index')->with('success', 'FAQ Updated Successfully!!');
    }

    public function destroy(FAQ $faq)
    {
        $faq->delete();
        return redirect()->route('faq.index')->with('success', 'Question deleted successfully !!');
    }
}
