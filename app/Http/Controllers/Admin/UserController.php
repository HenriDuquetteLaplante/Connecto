<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;

class UserController extends Controller
{
    /**
     * View initial user index form.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index() {

        $user = new User;
        $users = User::all();
        $edit = false;

        return view('admin.users.index', ['user' => $user, 'users' => $users, 'edit' => $edit]);
    }

    /**
     * Create a new user.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        $edit = false;
        return view('admin.users.index', ['user' => new User, 'edit' => $edit]);
    }

    /**
     * Store user data into the db.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function store(StoreUserRequest $request){

        $user = User::create($request->validated());
        $this->saveUserPassword($request, $user);

        return redirect()->route('admin.users.index')->with('success', 'L\'utilisateur a été créé!');
    }

    /**
     * Update user state (active or not).
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function updateUserState (Request $request, $id){

        $user = User::findOrFail($id);

        $user->is_active = $user->is_active == 1 ? 0 : 1;
        $user->save();

        return redirect()->route('admin.users.index');
    }

    /**
     * Edit user info's.
     *
     * @param  string  $id
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit($id){
        $user = User::findOrFail($id);
        $user->password = '';
        $users = User::all();
        $edit = true;

        return view('admin.users.index', ['user' => $user, 'users' => $users, 'edit' => $edit, 'id' => $id]);
    }

    /**
     * Update and store user info's.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function update (Request $request, $id){

        $user = User::findOrFail($id);
        $updPwd = !empty($request['password']);

        $user->update($request->validate($this->buildEditRules($request, $user, $updPwd)));

        if ($updPwd){
            $this->saveUserPassword($request, $user);
        }

        return redirect()->route('admin.users.index')->with('success', 'L\'utilisateur a été modifié!');
    }

    /**
     * Hash password and store.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     */
    private function saveUserPassword(Request $request, User $user){
        $user->password = Hash::make($request->password);
        $user->save();
    }

    /**
     * Build rules when editing user info's.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @param  string  $updPwd
     * @return  \Illuminate\Http\Request::validate
     */
    private function buildEditRules(Request $request, User $user, $updPwd){
        $nameRules = array('required', "regex:/\b([A-ZÀ-ÿ][-,a-z. ']+[ ]*)+/", 'max:255');
        $idRules = 'integer|numeric';
        $validate = ['first_name' => $nameRules, 'last_name' => $nameRules, 'role_id' => $idRules, 'is_active' => $idRules];

        if($updPwd){
            $validate['password'] = 'required|between:5,255';
        }

        if($user->email != $request['email']){
            $validate['email'] = 'required|email:rfc,dns|unique:users|max:255';
        }

        return $validate;
    }
}