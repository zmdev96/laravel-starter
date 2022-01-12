<?php

namespace App\Http\Controllers\Dashboard\HumanResources;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionsRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    protected string $view = 'dashboard.HumanResources.';

    public function __construct()
    {
        $this->middleware('role:app_developer');
    }

    public function index(): View
    {
        $permissions = DB::table('permissions as t_p')
            ->select('t_p.id', 't_p.name', 't_p.title', 't_p_g.name as group_name')
            ->join('permission_groups as t_p_g', 't_p.permission_group_id', '=', 't_p_g.id')
            ->get();
        return view($this->view.'permissions.index', ['permissions' => $permissions]);
    }

    public function create(): View
    {
        $permission_groups = DB::table('permission_groups')->pluck('name', 'id');
        return view($this->view.'permissions.create', ['permission_groups' => $permission_groups]);
    }

    public function store(PermissionsRequest $request): RedirectResponse
    {
        $permission = Permission::create($request->validated());
        if ($permission) {
            return redirect(dashboard_route('hr.permissions.index'))->with([
                'status' => 'success',
                'message' => 'Permission created successfully'
            ]);
        } else {
            return redirect()->back()->with([
                'status' => 'danger',
                'message' => 'Something went wrong! Please try again!'
            ]);
        }
    }

    public function show(int $id): View
    {
        return view($this->view.'permissions.show');
    }

    public function edit(int $id): View
    {
        $permission_groups = DB::table('permission_groups')->pluck('name', 'id');
        $permission = DB::table('permissions as t_p')
            ->select('t_p.id', 't_p.name', 't_p.title', 't_p_g.id as group_id', 't_p_g.name as group_name')
            ->join('permission_groups as t_p_g', 't_p.permission_group_id', '=', 't_p_g.id')
            ->where('t_p.id', $id)
            ->first();

        return $permission !== null
            ? view($this->view.'permissions.edit',
                ['permission' => $permission, 'permission_groups' => $permission_groups,])
            : abort(404);
    }

    public function update(PermissionsRequest $request, int $id): RedirectResponse
    {
        $permission = Permission::findOrFail($id)->update($request->validated());
        if ($permission) {
            return redirect(dashboard_route('hr.permissions.index'))->with([
                'status' => 'success',
                'message' => 'Permission updated successfully'
            ]);
        } else {
            return redirect()->back()->with([
                'status' => 'danger',
                'message' => 'Something went wrong! Please try again!'
            ]);
        }
    }

    public function destroy(int $id): RedirectResponse
    {
        if (Permission::findOrFail($id)->delete()) {
            return redirect(dashboard_route('hr.permissions.index'))->with([
                'status' => 'success',
                'message' => 'Permission deleted successfully'
            ]);
        }
    }
}
