<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Repositories\MenuRepository;
use Illuminate\Http\Request;
use App\Http\Requests\Menu\CreateFormRequest;

class MenuController extends Controller
{
    protected $menuRepo;

    public function __construct(MenuRepository $menuRepo)
    {
        $this->menuRepo = $menuRepo;
    }

    public function create()
    {
        return view('admin.menu.add', [
            'title' => 'Thêm danh mục',
            'menus' => $this->menuRepo->getParent()
        ]);
    }

    public function store(CreateFormRequest $request)
    {
        $result = $this->menuRepo->create($request);
        return redirect()->back();
    }

    public function index()
    {
        return view('admin.menu.list', [
            'title' => 'Danh sách danh mục',
            'menus' => $this->menuRepo->getAll()
        ]);
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
//        $result = $this->menuRepo->destroy($request);
//        if($result){
//            return response()->json([
//                'error'=>false,
//                'message'=>'Xoá danh mục thành công'
//            ]);
//        }
//        return response()->json([
//            'error'=>true
//        ]);
        $this->menuRepo->destroy($id);
//        return redirect()->route('menus.list');
        return response()->json(true);
    }

    public function update(Menu $menu)
    {
        return view('admin.menu.edit', [
            'title' => 'Sửa danh mục' . $menu->name,
            'menu' => $menu,
            'menus' => $this->menuRepo->getParent()
        ]);
    }

    public function show(CreateFormRequest $request, Menu $menu)
    {
        $result = $this->menuRepo->update($request, $menu);
        return redirect('/admin/menus/list');
    }


}
