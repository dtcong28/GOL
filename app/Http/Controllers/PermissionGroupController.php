<?php

namespace App\Http\Controllers;

use App\Repository\PermissionGroupRepositoryInterface;
use App\Http\Requests\Admin\PermissionGroupRequest;

class PermissionGroupController extends Controller
{
    protected $permissionGroupRepository;

    public function __construct(PermissionGroupRepositoryInterface $permissionGroupRepository)
    {
        $this->permissionGroupRepository = $permissionGroupRepository;
    }

    public function index()
    {
        return view('admin.permission-group.index', [
            'permissionGroups' => $this->permissionGroupRepository->paginate()
        ]);
    }


    public function create()
    {
        return view('admin.permission-group.form');
    }

    public function store(PermissionGroupRequest $request)
    {
        $this->permissionGroupRepository->save($request->all());
        return redirect()->route('permission-group.index');
    }

    public function show($id)
    {
        if (!$permissionGroup = $this->permissionGroupRepository->findById($id)) {
            abort(404);
        }
        return view('admin.permission-group.show', ['permissionGroup' => $permissionGroup]);
    }

    public function edit($id)
    {
        if (!$permissionGroup = $this->permissionGroupRepository->findById($id)) {
            abort(404);
        }
        return view('admin.permission-group.form', ['permissionGroup' => $permissionGroup]);
    }

    public function update(PermissionGroupRequest $request, $id)
    {
        $this->permissionGroupRepository->save($request->all(), ['id' => $id]);
        return redirect()->route('permission-group.index');
    }

    public function destroy($id)
    {
        $this->permissionGroupRepository->deleteById($id);
        return redirect()->route('permission-group.index');
    }
}
