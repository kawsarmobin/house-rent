<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Models\UserPersonalInfo;
use App\Http\Controllers\Controller;

class UserPersonalInfoControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        return view('admin.user_personal_infos.index')
                ->with('user', $user)
                ->with('upis', UserPersonalInfo::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        return view('admin.user_personal_infos.create')
                ->with('user', $user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'phone' => 'required',
            'image' => 'required',
            'identity_proof' => 'required',
            'identity_proof_type' => 'required'
        ]);

        $upi = new UserPersonalInfo();

        if ($avatar = $request->file('image')) {
            $newNameForAvatar = str_random(10) . time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->move('uploads\users\avatar', $newNameForAvatar);
        }

        if ($identity_proof = $request->file('identity_proof')) {
            $newNameForIdentify = str_random(10) . time() . '.' . $identity_proof->getClientOriginalExtension();
            $identity_proof->move('uploads\users\identity_proof', $newNameForIdentify);
        }

        $upi->user_id = auth()->user()->id;
        $upi->phone = $request->phone;
        $upi->image = $newNameForAvatar;
        $upi->identity_proof = $newNameForIdentify;
        $upi->identity_proof_type = $request->identity_proof_type;

        $upi->save();
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserPersonalInfo  $userPersonalInfo
     * @return \Illuminate\Http\Response
     */
    public function show(UserPersonalInfo $userPersonalInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserPersonalInfo  $userPersonalInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(UserPersonalInfo $userPersonalInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserPersonalInfo  $userPersonalInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserPersonalInfo $userPersonalInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserPersonalInfo  $userPersonalInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserPersonalInfo $userPersonalInfo)
    {
        //
    }
}
