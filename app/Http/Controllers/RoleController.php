<?php

namespace App\Http\Controllers;

use App\Repository\RoleRepositoryInterface;
use App\Repository\PermissionGroupRepositoryInterface;
use App\Http\Requests\Admin\RoleRequest;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    protected $roleRepository;
    protected $permissionGroupRepository;

    public function __construct(RoleRepositoryInterface $roleRepository, PermissionGroupRepositoryInterface $permissionGroupRepository)
    {
        $this->roleRepository = $roleRepository;
        $this->permissionGroupRepository = $permissionGroupRepository;
    }

    public function index()
    {
        return view('admin.role.index', [
            'roles' => $this->roleRepository->paginate()
        ]);
    }

    public function create()
    {
        return view('admin.role.form', ['permissionGroups' => $this->permissionGroupRepository->getAll()]);
    }

    public function store(RoleRequest $request)
    {
        $success = false;
        DB::beginTransaction();

        try {
            $role = $this->roleRepository->save($request->validated());
            if ($role) {
                $permission_ids = $request->input('permission_ids');
                $role->permissions()->sync($permission_ids);
                $success = true;
            }
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('message', 'Something went wrong');
        }

        if ($success) {
            DB::commit();
            return redirect()->route('role.index')->with('success', 'Creation success.');
        }
    }

    public function show($id)
    {
        if (!$role = $this->roleRepository->findById($id)) {
            abort(404);
        }
        return view('admin.role.form', ['role' => $role,'act'=> 'show','permissionGroups' => $this->permissionGroupRepository->getAll()]);
    }

    public function edit($id)
    {
        if (!$role = $this->roleRepository->findById($id)) {
            abort(404);
        }
        return view('admin.role.form', ['role' => $role,'permissionGroups' => $this->permissionGroupRepository->getAll()]);
    }

    public function update(RoleRequest $request, $id)
    {
        $success = false;
        DB::beginTransaction();

        try {
            $role = $this->roleRepository->save($request->validated(), ['id' => $id]);
            if ($role) {
                $permission_ids = $request->input('permission_ids');
                $role->permissions()->sync($permission_ids);
                $success = true;
            }
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('message', 'Something went wrong');
        }

        if ($success) {
            DB::commit();
            return redirect()->route('role.index')->with('success', 'Update success.');
        }
    }

    public function destroy($id)
    {
        $this->roleRepository->deleteById($id);
        return redirect()->route('role.index');
    }
}
