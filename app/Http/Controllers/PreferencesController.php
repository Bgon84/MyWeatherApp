<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Preferences;
use App\Services\UserPreferencesService;

class PreferencesController extends Controller
{
    public function edit(Request $request): View
    {
        return view('preferences.edit', [
            'user' => $request->user(),
            'preferences' => UserPreferencesService::getUserPreferences(Auth::user()->id)
        ]);
    }

    public function update(Request $request)
    {
        Preferences::updateOrCreate(
            ['user_id' => Auth::user()->id],
            [
                'favorite_location' => $request['favorite_location'],
                'wind_metric' => $request['wind_speed'],
                'temp_metric' => $request['temperature'],
                'pressure_millibar' => $request['pressure_millibar'],
            ]
        );
        return Redirect::route('preferences.edit')->with('status', 'preferences-updated');
    }
}
