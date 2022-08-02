<?php

namespace App\Http\Controllers;

use App\Repository\PermissionGroupRepositoryInterface;
use App\Http\Requests\Admin\PermissionGroupRequest;

class PermissionGroupController extends Controller
{
    private $permissionGroupRepository;

    public function __construct(PermissionGroupRepositoryInterface $permissionGroupRepository)
    {
        $this->permissionGroupRepository = $permissionGroupRepository;
    }

    public function index()
    {
        $permissionGroups = $this->permissionGroupRepository->paginate();
        return view('admin.permission_group.index', ['permissionGroups' => $permissionGroups]);
    }


    public function create()
    {
        return view('admin.permission_group.create');
    }

    public function store(PermissionGroupRequest $request)
    {
        $this->permissionGroupRepository->save($request->all());
        return redirect()->route('permission_group.index');
    }

    public function show($id)
    {
        $permissionGroupById = $this->permissionGroupRepository->findById($id);
        return view('admin.permission_group.show', ['permissionGroupById' => $permissionGroupById]);
    }

    public function edit($id)
    {
        $permissionGroupById = $this->permissionGroupRepository->findById($id);
        return view('admin.permission_group.edit', ['permissionGroupById' => $permissionGroupById]);
    }

    public function update(PermissionGroupRequest $request, $id)
    {
        $this->permissionGroupRepository->save($request->all(), ['id' => $id]);
        return redirect()->route('permission_group.index');
    }

    public function destroy($id)
    {
        $this->permissionGroupRepository->deleteById($id);
        return redirect()->route('permission_group.index');
    }
}
