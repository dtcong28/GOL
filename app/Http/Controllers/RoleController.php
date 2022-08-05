<?php

namespace App\Http\Controllers;

use App\Repository\RoleRepositoryInterface;
use App\Http\Requests\Admin\RoleRequest;

class RoleController extends Controller
{
    protected $roleRepository;

    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        return view('admin.role.index', [
            'roles' => $this->roleRepository->paginate()
        ]);
    }

    public function create()
    {
        return view('admin.role.form');
    }

    public function store(RoleRequest $request)
    {
        $this->roleRepository->save($request->validated());
        return redirect()->route('role.index');
    }

    public function show($id)
    {
        if (!$role = $this->roleRepository->findById($id)) {
            abort(404);
        }
        return view('admin.role.show', ['role' => $role]);
    }

    public function edit($id)
    {
        if (!$role = $this->roleRepository->findById($id)) {
            abort(404);
        }
        return view('admin.role.form', ['role' => $role]);
    }

    public function update(RoleRequest $request, $id)
    {
        $this->roleRepository->save($request->validated(), ['id' => $id]);
        return redirect()->route('role.index');
    }

    public function destroy($id)
    {
        $this->roleRepository->deleteById($id);
        return redirect()->route('role.index');
    }
}
