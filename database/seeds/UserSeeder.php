<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::create([
            'name' => 'admin',
            'email' => 'vshbmt@gmail.com',
            'phone_number' => '0332591776',
            'password' => bcrypt('123456789')
        ]);
        $role = Role::create(['guard_name' => 'api', 'name' => 'admin']);
        $permissions = Permission::pluck('id')->all();
        $role->syncPermissions($permissions);
        Role::create(['guard_name' => 'api', 'name' => 'normal_user']);
        $user->assignRole('admin');
    }
}
