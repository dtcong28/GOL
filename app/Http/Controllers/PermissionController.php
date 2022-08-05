<?php

namespace App\Http\Controllers;

use App\Repository\PermissionGroupRepositoryInterface;
use App\Repository\PermissionRepositoryInterface;
use App\Http\Requests\Admin\PermissionRequest;

class PermissionController extends Controller
{
    protected $permissionGroupRepository;
    protected $permissionRepository;

    public function __construct(PermissionGroupRepositoryInterface $permissionGroupRepository, PermissionRepositoryInterface $permissionRepository)
    {
        $this->permissionGroupRepository = $permissionGroupRepository;
        $this->permissionRepository = $permissionRepository;
    }

    public function index()
    {
        return view('admin.permission.index', [
            'permissions' => $this->permissionRepository->paginate()
        ]);
    }

    public function create()
    {
        return view('admin.permission.form', ['permissionGroups' => $this->permissionGroupRepository->getAll()]);
    }

    public function store(PermissionRequest $request)
    {
        $this->permissionRepository->save($request->validated());
        return redirect()->route('permission.index');
    }

    public function show($id)
    {
        if (!$permission = $this->permissionRepository->findById($id)) {
            abort(404);
        }
        return view('admin.permission.show', ['permission' => $permission]);
    }

    public function edit($id)
    {
        if (!$permission = $this->permissionRepository->findById($id)) {
            abort(404);
        }
        return view('admin.permission.form', ['permission' => $permission, 'permissionGroups' => $this->permissionGroupRepository->getAll()]);
    }

    public function update(PermissionRequest $request, $id)
    {
        $this->permissionRepository->save($request->validated(), ['id' => $id]);
        return redirect()->route('permission.index');
    }

    public function destroy($id)
    {
        $this->permissionRepository->deleteById($id);
        return redirect()->route('permission.index');
    }
}
