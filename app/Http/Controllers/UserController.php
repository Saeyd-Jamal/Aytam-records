<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $type_user = ['مدير رئيسي','محرر','كاتب'];

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('profile.myprofile',[
            'user' => $request->user(),
            'request'
        ]);

    }
    public function table_users()
    {
        $users = User::get();
        return view('profile.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profile.create',[
            'type_user'=>$this->type_user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => [
                'required',
                "unique:users,username,$request->username"
            ],
        ],[
            'required'=> 'This field (:attribute) is required'
        ]);
        $request->except('password');
        $request->merge([
            'password' => Hash::make($request->post('password'))
        ]);

        User::create($request->all());

        return redirect()->route('users-table')
            ->with('success','تم إضافة مستخدم جديد');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        return view('profile.profile',[
            'user' => User::findOrFail($id),
            'request'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('profile.edit',[
            'user' => User::findOrFail($id),
            'type_user'=>$this->type_user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $request->except('password');
        $request->merge([
            'password' => Hash::make($request->post('password'))
        ]);
        $user->update($request->all());
        return redirect()->route('users-table')
                    ->with('success','تم تحديث البيانات');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        if($user->id == Auth::user()->id){
            Auth::logout();
        }
        $user->delete();
        return redirect()->back()->with('danger', 'تم حذف الحساب');
    }
}
