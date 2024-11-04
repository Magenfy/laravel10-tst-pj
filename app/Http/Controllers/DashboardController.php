<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Analytic Dashboard
     */
    public function index()
    {
        $breadcrumbsItems = [
            [
                'name' => 'Dashboard',
                'url' => '/',
                'active' => true
            ],
        ];

        return view('homedashboard', [
            'pageTitle' => 'Dashboard',
            'breadcrumbItems' => $breadcrumbsItems
        ]);
    }




}
