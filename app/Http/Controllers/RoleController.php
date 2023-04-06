<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;


class RoleController extends Controller
{
    //
    public function create(){
        $all_roles = Role::all()->map(fn($r) => [
            'value' => $r->name,
            'label' => ucfirst($r->name)
        ])->toArray();
        return Inertia::render('Auth/Other/AddRoles', [
            'options' => $all_roles
        ]);
    }
}
