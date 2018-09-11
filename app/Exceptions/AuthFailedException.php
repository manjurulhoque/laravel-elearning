<?php
/**
 * Created by PhpStorm.
 * User: Rumi
 * Date: 9/11/2018
 * Time: 9:01 PM
 */

namespace App\Exceptions;

use Exception;

class AuthFailedException extends Exception
{
    public function render()
    {
        return response()->json([
            'message' => 'These credentials do not match our records.'
        ], 422);
    }
}