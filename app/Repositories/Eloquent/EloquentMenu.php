<?php

namespace App\Repositories\Eloquent;

use App\Models\Menu;
//use App\Repositories\Eloquent\MenuRepository;
use App\Repositories\MenuRepository;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class EloquentMenu implements MenuRepository
{
    private $model;

    public function __construct(Menu $model){
        $this->model=$model;

    }
    public function getAll()
    {
        return $this->model->all();
    }

    public function getById($id)
    {
        return $this->findById($id);
    }

    public function create($request)
    {
//        return $this->model->create($request);
        try {
            Menu::create([
                'name' => (string) $request->input('name'),
                'parent_id' => (int) $request->input('parent_id'),
                'description' => (string) $request->input('description'),
                'content' => (string) $request->input('content'),
                'active' => (int) $request->input('active'),
                'slug' =>Str::slug($request->input('name'),'-')
            ]);
            Session::flash('success','Tạo danh mục thành công');

        } catch (\Exception $err) {
            Session::flash('error',$err->getMessage());
            return false;
        }
        return true;
    }

    public function update( $request, $menu)
    {
        $menu->name = (string) $request->input('name');
        $menu->description = (string) $request->input('description');
        $menu->parent_id = (int) $request->input('parent_id');
        $menu->content = (string) $request->input('content');
        $menu->active = (int) $request->input('active');
        $menu->save();
        Session::flash('success','Cập nhật thành công');
        return true;
    }

    public function destroy($menu){
//        $id = (int) $request->input('id');
//        $menu = Menu::where('id',$request->input('id'))->first();
//        if($menu){
//            return Menu::where('id',$id)->orWhere('parent_id',$id)->delete();
//        }
////        return false;
        $data = Menu::where('id',$menu)->first();
        $data->delete();
//       return Menu::destroy($menu);

    }

    public function getParent()
    {
        return Menu::where('parent_id',0)->get();
    }


}
