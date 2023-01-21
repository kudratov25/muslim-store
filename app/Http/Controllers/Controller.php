<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use RealRashid\SweetAlert\Facades\Alert;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            if (session('success')) {
                Alert::success('Success!', session('success'));
            }
            if (session('toast_success')) {
                Alert::toast(session('toast_success'), 'success');
            }
            if (session('toast_warning')) {
                Alert::toast(session('toast_warning'), 'warning');
            }
            return $next($request);
        });
    }
}
