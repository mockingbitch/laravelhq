<?php

namespace App\Repositories;

interface MenuRepository
{
    public function getAll();
    public function getById($id);
    public function create($request);
    public function update($request,$menu);
    public function destroy($menu);
    public function getParent();

}
