<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Carbon;



class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $timestamp = Carbon::now();
        $arr_roles = ['admin','student','teacher', 'stuff','developer'];
        $roles = collect($arr_roles)->map(fn($role) => ['name' => $role, 'guard_name' => 'web', 'created_at' => $timestamp, 'updated_at' => $timestamp]);
        Role::insert($roles->toArray());
    }
    //https://spatie.be/docs/laravel-permission/v5/advanced-usage/seeding
}
