<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Module;
use App\Models\Menubar;
use Illuminate\Http\Request;
use App\Http\Requests\MenubarRequest;
use Illuminate\Contracts\Support\ValidatedData;

class MenubarController extends Controller
{
    // private $menu, $page;
    // public function __construct(Menubar $menu, Page $page)
    // {
    //     $this->menu = $menu;
    //     $this->page = $page;
    // }


    public function index()
    {
        $menus = Menubar::all();
        // $menus = $this->menu->get();
        // dd($menus);
        return view('Dynamic.backend.menubar.index', compact('menus'));
    }


    public function create()
    {
        $module = Module::all();
        // dd($module);
        $pages = Page::all();
        return view('Dynamic.backend.menubar.create', compact('module', 'pages'));
    }

    public function store(MenubarRequest $request)
    {

        $validatedData = $request->validated();


        $validatedData['status'] = '1';
        // dd($validatedData);
        Menubar::create($validatedData);

        return redirect()->route('menu.index')->with('success', 'Menubar Created successfully');
    }

    public function edit(Menubar $menu)
    {
        $module = Module::all();
        // dd($module);
        $page = Page::all();
        return  view('Dynamic.backend.menubar.edit', compact('menu', 'module', 'page'));
    }


    public function update(MenubarRequest $request, Menubar $menu)
    {
        $validatedData = $request->validated();
        $menu->update($validatedData);

        return redirect()->route('menu.index')->with('success', 'Menubar Updated successfully');
    }


    public function destroy(Menubar $menu)
    {
        $menu->delete();
        return redirect()->route('menu.index')->with('success', 'Menubar Deleted successfully');
    }
}
