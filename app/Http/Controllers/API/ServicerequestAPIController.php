<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Servicerequest;
use Illuminate\Http\Request;

class ServicerequestAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $u = auth()->user();
        $t = [];

        if ($u->user_role == 'admin') {
            $t = Servicerequest::orderBy('id', 'desc')->with(['devis'])->get();
            $d = [];
            foreach ($t as $el) {
                $service = $el->service()->first();
                $img = $service?->image;
                if ($img) {
                    $img =   asset('storage/' . $img);
                } else {
                    $img =   asset('/assets/images/faces/9.jpg');
                }

                $d[] = (object) [
                    'id' => $el->id,
                    'servicename' => $el->servicename ?? '-',
                    'description' => $el->description,
                    'desc' => substr($el->description, 0, 100) . ' ...',
                    'serviceimg' => $img,
                    'budget' => v((float) $el->budget, 'USD'),
                    'client' => (object) [
                        'name' => $el->user->name,
                        'email' => $el->user->email,
                        'phone' => $el->user->phone,
                    ],
                    'businessname' => $el->service?->business->businessname ?? '-',
                ];
            }
            $t = $d;
        } elseif ($u->user_role == 'user') {
            $t =  Servicerequest::where('users_id', $u->id)->orderBy('id', 'desc')->with(['devis'])->get();
            $d = [];
            foreach ($t as $el) {
                $service = $el->service()->first();
                $img = $service?->image;
                if ($img) {
                    $img =   asset('storage/' . $img);
                } else {
                    $img =   asset('/assets/images/faces/9.jpg');
                }

                $d[] = (object) [
                    'id' => $el->id,
                    'servicename' => $el->servicename ?? '-',
                    'description' => $el->description,
                    'desc' => substr($el->description, 0, 100) . ' ...',
                    'serviceimg' => $img,
                    'budget' => v((float) $el->budget, 'USD'),
                ];
            }
            $t = $d;
        } elseif ($u->user_role == 'provider') {
            $sids = $u->businesses()->first()?->services()->pluck('id')->all();
            $t =  Servicerequest::whereIn('service_id', $sids)->orderBy('id', 'desc')->with(['devis'])->get();
            $d = [];
            foreach ($t as $el) {
                $service = $el->service()->first();
                $img = $service?->image;
                if ($img) {
                    $img =   asset('storage/' . $img);
                } else {
                    $img =   asset('/assets/images/faces/9.jpg');
                }

                $d[] = (object) [
                    'id' => $el->id,
                    'servicename' => $el->servicename ?? '-',
                    'description' => $el->description,
                    'desc' => substr($el->description, 0, 100) . ' ...',
                    'serviceimg' => $img,
                    'budget' => v((float) $el->budget, 'USD'),
                    'client' => (object) [
                        'name' => $el->user->name,
                        'email' => $el->user->email,
                        'phone' => $el->user->phone,
                    ]
                ];
            }
            $t = $d;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Servicerequest  $servicerequest
     * @return \Illuminate\Http\Response
     */
    public function show(Servicerequest $servicerequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Servicerequest  $servicerequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servicerequest $servicerequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servicerequest  $servicerequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servicerequest $servicerequest)
    {
        $user = auth()->user();
        abort_if($servicerequest->users_id != $user->id, 403);

        $n = $servicerequest->devis()->count();
        if ($n) {
            return ['success' => false, 'message' => 'Vous ne pouvez pas supprimer cette demande.'];
        }
        $servicerequest->delete();
        return ['success' => true, 'message' => 'Demande supprimée'];
    }
}
