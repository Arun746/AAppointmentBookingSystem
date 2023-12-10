<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\PageRequest;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        return view('Dynamic.backend.page.index', compact('pages'));
    }

    public function create()
    {
        return view('Dynamic.backend.page.create');
    }

    public function store(PageRequest $request)
    {
        $pageValidated = $request->validated();
        $pageValidated['status'] = 1;
        $slug = Str::slug($pageValidated['title']['en']);
        Page::create([
            'title' => [
                'en' => $pageValidated['title']['en'],
                'ne' => $pageValidated['title']['ne'],
            ],
            'description' => [
                'en' => $pageValidated['description']['en'],
                'ne' => $pageValidated['description']['ne'],
            ],
            'slug' => $slug,

            'status' => $pageValidated['status']
        ]);

        return redirect()->route('page.index')->with('success', 'Page Created successfully');
    }

    public function edit(Page $page)
    {
        return view('Dynamic.backend.page.edit', compact('page'));
    }


    public function update(PageRequest $request, Page $page)
    {
        $pageValidated = $request->validated();

        $slug = Str::slug($pageValidated['title']['en']);
        $page->update([
            'title' => [
                'en' => $pageValidated['title']['en'],
                'ne' => $pageValidated['title']['ne'],
            ],
            'description' => [
                'en' => $pageValidated['description']['en'],
                'ne' => $pageValidated['description']['ne'],
            ],
            'slug' => $slug,

            'status' => $pageValidated['status'],
        ]);

        return redirect()->route('page.index')->with('success', 'Page Updated successfully');
    }

    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('page.index')->with('success', 'Page Deleted successfully');
    }
}
