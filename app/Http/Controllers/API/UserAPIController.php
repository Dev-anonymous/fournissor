<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use App\Models\Business;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $role = auth()->user()->user_role;
        $data = [];
        if ('admin' == $role) {
            $type = request('type');
            $t = User::orderBy('name')->where('user_role', $type)->with(['businesses', 'businesses.category']);

            foreach ($t->get() as $el) {
                $o = (object)$el->toArray();
                $o->image = userimage($el);
                $data[] = $o;
            }
        }

        return [
            'success' => true,
            'data' => $data
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_role = request('user_role');
        if ('admin' == $user_role) {
            $rules =  [
                'user_role' => 'required|in:admin',
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
                'image' => 'sometimes|mimes:jpeg,jpg,png|max:500',
                'phone' => 'required|min:10',
            ];
        } elseif ('provider' == $user_role) {
            $rules =  [
                'user_role' => 'required|in:provider',
                'businessname' => 'required',
                'category_id' => 'required|exists:category,id',
                'description' => 'required|string|max:600',
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'phone' => 'required|min:10',
                'password' => 'required',
                'logo' => 'required|mimes:jpeg,jpg,png|max:500',
            ];
        } else {
            abort(403, 'User role');
        }

        $validator = Validator::make(request()->all(), $rules);
        if ($validator->fails()) {
            return [
                'message' => implode(" ", $validator->errors()->all())
            ];
        }

        $data  = $validator->validated();

        DB::beginTransaction();

        if ('admin' == $user_role) {
            if ($request->hasFile('image')) {
                $data['image'] = request()->file('image')->store('image', 'public');
            }

            $data['password'] = Hash::make($data['password']);
            $data['name'] = ucfirst($data['name']);
            $data['users_id'] = auth()->user()->id;
            $user = User::create($data);

            $m = 'Utilisateur créé.';
        } elseif ('provider' == $user_role) {
            $data['logo'] = request()->file('logo')->store('logo', 'public');
            $data['password'] = Hash::make($data['password']);
            $data['name'] = ucfirst($data['name']);
            $data['users_id'] = auth()->user()->id;
            $user = User::create($data);
            $data['users_id'] = $user->id;
            Business::create($data);
            $m = 'Business créé.';
        }
        DB::commit();

        return ['success' => true, 'message' => $m];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $u = auth()->user();
        $user_role = $user->user_role;
        if ($user_role == 'admin') {
            $rules =  [
                'name' => 'required',
                'email' => 'required|unique:users,email,' . $user->id,
                'password' => 'sometimes',
                'image' => 'sometimes|mimes:jpeg,jpg,png|max:500',
                'phone' => 'required|min:10||unique:users,phone,' . $user->id,
            ];
        } elseif ($user_role == 'provider') {
            $rules =  [
                'name' => 'required',
                'businessname' => 'required',
                'email' => 'required|unique:users,email,' . $user->id,
                'password' => 'sometimes',
                'phone' => 'required|min:10||unique:users,phone,' . $user->id,
                'description' => 'required|string|max:600',
                'phone' => 'required|min:10',
                'logo' => 'sometimes|mimes:jpeg,jpg,png|max:500',
            ];
        } else {
            abort(403);
        }

        $validator = Validator::make(request()->all(), $rules);

        if ($validator->fails()) {
            return [
                'message' => implode(" ", $validator->errors()->all())
            ];
        }

        $data  = $validator->validated();
        $ps = request('password');
        if (!empty($ps)) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        DB::beginTransaction();

        if ($user_role == 'admin') {
            if ($request->hasFile('image')) {
                File::delete('storage/' . $user->image);
                $data['image'] = request()->file('image')->store('image', 'public');
            }
            $data['name'] = ucfirst($data['name']);
            $user->update($data);
        } elseif ($user_role == 'provider') {
            $busi = $user->businesses()->first();
            if ($request->hasFile('logo')) {
                File::delete('storage/' . $busi->logo);
                $data['logo'] = request()->file('logo')->store('logo', 'public');
            }
            $data['name'] = ucfirst($data['name']);

            $user->update($data);
            $busi->update($data);
        }


        DB::commit();

        return ['success' => true, 'message' => 'Compte mis à jour.'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        abort_if(auth()->user()->user_role != 'admin', 403);
        if (auth()->user()->id == $user->id) {
            return [
                'message' => 'Veuillez demander à un autre administrateur de supprimer votre compte'
            ];
        }

        if ($user->user_role == 'provider') {
            $bu = $user->businesses()->first();
            File::delete('storage/' . $bu->logo);
        }

        File::delete('storage/' . $user->image);
        $user->delete();
        return ['success' => true, 'message' => 'Compte supprimé'];
    }
}
