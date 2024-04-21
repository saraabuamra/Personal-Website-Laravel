<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        Session::put('page','update_user');
        return view('profile.edit_user', ['user' => $request->user(),]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Validate the request
        $validatedData = $request->validated();
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
        
            // Check if the uploaded file is valid
            if ($image->isValid()) {
                // Generate a unique filename for the image
                $imageName = uniqid().'.'.$image->getClientOriginalExtension();
        
                // Move the uploaded image to the existing directory with the generated filename
                $image->move(public_path('admin/images/admin_images'), $imageName);
        
                // Update the user's image path in the database
                $validatedData['image'] = $imageName;
            }
        }
    
        // Fill the user model with the validated data
        $request->user()->fill($validatedData);
    
        // Reset email verification if email is changed
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
    
        // Save the user model
        $request->user()->save();
         
        // Redirect with success message
        return Redirect::route('profile.edit')->with('status', 'تم تعديل بياناتك الشخصية بنجاح');
    }
    
   
}
