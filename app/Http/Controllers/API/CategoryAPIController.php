<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $t = Category::orderBy('category')->get();
        return [
            'success' => true,
            'data' => $t
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
        $user_role = auth()->user()->user_role;
        abort_if('admin' != $user_role, 403);

        $rules =  [
            'category' => 'required|unique:category',
            'description' => 'required|string|max:255',
        ];

        $validator = Validator::make(request()->all(), $rules);

        if ($validator->fails()) {
            return [
                'message' => implode(" ", $validator->errors()->all())
            ];
        }
        $data  = $validator->validated();
        $data['category'] = ucfirst($data['category']);
        Category::create($data);
        return ['success' => true, 'message' => "Catégorie créée avec succès."];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $user_role = auth()->user()->user_role;
        abort_if('admin' != $user_role, 403);

        $rules =  [
            'category' => 'required|unique:category,category,' . $category->id,
            'description' => 'required|max:255',
        ];

        $validator = Validator::make(request()->all(), $rules);

        if ($validator->fails()) {
            return [
                'message' => implode(" ", $validator->errors()->all())
            ];
        }
        $data  = $validator->validated();
        $category->update($data);

        return ['success' => true, 'message' => 'Catégorie mise à jour.'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $user_role = auth()->user()->user_role;
        abort_if('admin' != $user_role, 403);

        $n = $category->businesses()->count();
        if ($n) {
            return ['success' => false, 'message' => 'Cette Catégorie contient ' . $n . ' Business.'];
        }
        $category->delete();
        return ['success' => true, 'message' => 'Catégorie supprimée'];
    }
}
