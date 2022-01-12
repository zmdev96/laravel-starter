<?php

namespace App\Http\Controllers\Dashboard\HumanResources;

use App\Http\Controllers\Controller;
use App\Http\Requests\RolesRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{

    protected string $view = 'dashboard.HumanResources.';

    public function __construct()
    {
        $this->middleware('role:app_developer');
    }

    public function index(): View
    {
        $google = [
            ['result'] => [

            ]
        ];
        $roles = DB::table('roles')
            ->select('id', 'name', 'title')
            ->get();

        return view($this->view.'roles.index', ['roles' => $roles]);
    }

    public function create(): View
    {
        $permissions = DB::table('permissions as t_p')
            ->select('t_p.id', 't_p.title', 't_p_g.name as group_name')
            ->join('permission_groups as t_p_g', function ($join) {
                $join->on('t_p.permission_group_id', '=', 't_p_g.id');
                //->where('t_p_g.name', '!=', 'App Developer');
            })
            ->orderBy('group_name', 'asc')
            ->get()
            ->groupBy('group_name');

        return view($this->view.'roles.create', ['permissions' => $permissions]);
    }


    public function store(RolesRequest $request): RedirectResponse
    {

        try{
            DB::beginTransaction();

            $newRole = Role::create(Arr::except($request->validated(), 'permissions'));
            $newRole->givePermissionTdo($request->permissions);

            DB::commit();
            return redirect(dashboard_route('hr.roles.index'))->with([
                'status' => 'success',
                'message' => 'Role created successfully'
            ]);
        }catch(\Exception $e){

            DB::rollback();
            return redirect()->back()->withInput()->with([
                'status' => 'danger',
                'message' => 'Something went wrong! Please try again!'
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }


    public function edit(int $id): View
    {
        $role = Role::with('permissions')->findOrFail($id);
        $role_permissions = $role->permissions->pluck('id')->toArray();

        $permissions = DB::table('permissions as t_p')
            ->select('t_p.id', 't_p.title', 't_p_g.name as group_name')
            ->join('permission_groups as t_p_g', function ($join) {
                $join->on('t_p.permission_group_id', '=', 't_p_g.id');
                //->where('t_p_g.name', '!=', 'App Developer');
            })
            ->orderBy('group_name', 'asc')
            ->get()
            ->groupBy('group_name');

        return view($this->view.'roles.edit',[
            'role' => $role,
            'role_permissions' => $role_permissions,
            'permissions' => $permissions,
        ]);

    }


    public function update(RolesRequest $request, int $id): RedirectResponse
    {

        try{
            DB::beginTransaction();

            $role = Role::findOrFail($id);
            $role->update(Arr::except($request->validated(), 'permissions'));
            $role->syncPermissions([$request->permissions]);

            DB::commit();
            return redirect(dashboard_route('hr.roles.index'))->with([
                'status' => 'success',
                'message' => 'Role updated successfully'
            ]);
        }catch(\Exception $e){

            DB::rollback();
            return redirect()->back()->with([
                'status' => 'danger',
                'message' => 'Something went wrong! Please try again!'
            ]);
        }

    }


    public function destroy(int $id): RedirectResponse
    {
        if (Role::findOrFail($id)->delete()) {
            return redirect(dashboard_route('hr.roles.index'))->with([
                'status' => 'success',
                'message' => 'Role deleted successfully'
            ]);
        }
    }
}
