<?php

namespace App\Http\Controllers\Organizer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Organiser\UpdateOrganiserInfoRequest;

class OrganiserInfoController extends Controller
{
   public function update_organiser_info(UpdateOrganiserInfoRequest $request){
        $validatedData = $request->validated();
        try {
            $user = User::findOrFail(auth()->user()->id);

            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];
            $user->phone = $validatedData['phone'] ?? $user->phone;
            $user->address = $validatedData['address'] ?? $user->address;
            $user->societe = $validatedData['societe'] ?? $user->societe;
            $user->postal_code = $validatedData['postal_code'] ?? $user->postal_code;

            if ($request->hasFile('profile_picture')) {
                $user->profile_picture = $request->file('profile_picture')->store('profile_pictures', 'public');
            }

            $user->save();

            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'An error occurred while updating organiser information: ' . $th->getMessage());
        }
   }
}
