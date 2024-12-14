<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ServiceAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $u = auth()->user();

        if ($u->user_role == 'admin') {
            $t = Service::orderBy('service')->with(['business'])->get();
        } elseif ($u->user_role == 'provider') {
            $t = $u->businesses()->first()?->services()->orderBy('service')->with(['business'])->get();
        }
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
        $user = auth()->user();
        abort_if(!in_array($user->user_role, ['provider']), 403);
        $rules =  [
            'service' => 'required|max:100',
            'description' => 'required|max:600',
            'image' => 'required|mimes:jpeg,jpg,png|max:500',
        ];
        $validator = Validator::make(request()->all(), $rules);
        if ($validator->fails()) {
            return [
                'message' => implode(" ", $validator->errors()->all())
            ];
        }
        $data  = $validator->validated();
        $data['service'] = ucfirst($data['service']);

        $busi = $user->businesses->first();
        $data['business_id'] = $busi->id;
        $data['image'] = request('image')->store('service', 'public');

        Service::create($data);

        return ['success' => true, 'message' => "Service créé avec succès."];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $user = auth()->user();
        abort_if(!in_array($user->user_role, ['provider']), 403);
        $rules =  [
            'service' => 'required|max:100',
            'description' => 'required|max:600',
            'image' => 'sometimes|mimes:jpeg,jpg,png|max:500',
        ];
        $validator = Validator::make(request()->all(), $rules);
        if ($validator->fails()) {
            return [
                'message' => implode(" ", $validator->errors()->all())
            ];
        }
        $data  = $validator->validated();

        $busi = $user->businesses->first();
        $data['business_id'] = $busi->id;
        if (request()->has('image')) {
            $data['image'] = request('image')->store('service', 'public');
            File::delete('storage/' . $service->image);
        }
        $data['service'] = ucfirst($data['service']);
        $service->update($data);

        return ['success' => true, 'message' => "Service mis à jour."];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $user = auth()->user();
        abort_if('provider' != $user->user_role, 403);
        abort_if($user->id != $service->business->users_id, 403);

        $n = $service->servicerequests()->count();
        if ($n) {
            return ['success' => false, 'message' => 'Ce service est lié à ' . $n . ' demande(s) de service.'];
        }

        File::delete('storage/' . $service->image);
        $service->delete();
        return ['success' => true, 'message' => 'Service supprimé'];
    }
}
