<?php
// App\Http\Controllers\DarkModeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DarkModeController extends Controller
{
    /**
     * Toggle dark mode.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function toggleDarkMode(Request $request)
    {
        // Check if 'dark_mode' session exists, if so, remove it, otherwise set it
        if ($request->session()->has('dark_mode')) {
            $request->session()->forget('dark_mode');
        } else {
            $request->session()->put('dark_mode', true);
        }

        // Redirect back to the previous page
        return redirect()->back();
    }
}
