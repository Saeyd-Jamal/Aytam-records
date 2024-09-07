<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', User::class);
        $users= User::get();
        return view('dashboard.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', User::class);
        $user = new User();
        return view('dashboard.users.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', User::class);
        $request->validate([
            'name' => 'required',
            'username' => 'required|string|unique:users,username',
            'password' => 'required|same:confirm_password',
            'confirm_password' => 'required|same:password',
        ],[
            'password.same' => 'كلمة المرور غير متطابقة',
            'confirm_password.same' => 'كلمة المرور غير متطابقة',
        ]);
        DB::beginTransaction();
        try{
            $user = User::create($request->all());
            foreach ($request->abilities as $role) {
                Role::create([
                    'role_name' => $role,
                    'user_id' => $user->id,
                    'ability' => 'allow',
                ]);
            }
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->back()->with('danger', $e->getMessage());
        }
        return redirect()->route('users.index')->with('success','تم اضافة المستخدم بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('update', User::class);
        $user = User::findOrFail($id);
        $btn_label = "تعديل";

        return view('dashboard.users.edit',compact('user','btn_label'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize('update', User::class);
        DB::beginTransaction();
        try{
            $user = User::findOrFail($id);
            if($request->has('password')){
                $user->update($request->all());
            }else{
                $user->update($request->except('password'));
            }
            if ($request->abilities != null) {
                $role_old = Role::where('user_id', $user->id)->pluck('role_name')->toArray();
                $role_new = $request->abilities;
                foreach ($role_old as $role) {
                    if (!in_array($role, $role_new)) {
                        Role::where('user_id', $user->id)->where('role_name', $role)->delete();
                    }
                }
                foreach ($role_new as $role) {
                    $role_f = Role::where('user_id', $user->id)->where('role_name', $role)->first();
                    if ($role_f == null) {
                        Role::create([
                            'role_name' => $role,
                            'user_id' => $user->id,
                            'ability' => 'allow',
                        ]);
                    }else{
                        $role_f->update(['ability' => 'allow']);
                    }
                }
            }else{
                Role::where('user_id', $user->id)->delete();
            }
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            throw $e;
        }
        return redirect()->route('users.index')->with('success','تم تعديل المستخدم بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('delete', User::class);
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success','تم حذف المستخدم بنجاح');
    }
}
