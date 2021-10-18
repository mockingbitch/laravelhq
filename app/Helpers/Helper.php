<?php
namespace App\Helpers;
class Helper
{
    public static function menu($menus,$parent_id = 0, $char = ''){
        $html = '';
        foreach($menus as $key => $menu){

            if( $menu->active ==1){
                $active = "Hiển thị";
            }
            else{
                $active = "Ko Hiển thị";
            }
            if($menu -> parent_id == $parent_id){

                $html .='
                <tr>
                <td>'.$menu->id.'</td>
                <td>'.$char.$menu->name.'</td>
                <td>'.$active.'</td>
                <td>'.$menu->updated_at.'</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/menus/edit/'.$menu->id.'">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="/admin/menus/destroy/'.$menu->id.'">
                    '.@method('DELETE').'
                    <button name="" type="submit">
                    Del
                    </button></form>
                </td>
                </tr>
                ';
                unset($menu[$key]);
                $html .=self::menu($menus,$menu->id,$char.'|--');
            }
        }
        return $html;
    }
}
