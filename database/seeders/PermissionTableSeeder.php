<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            // Account Permissions
            'account-list',
            'account-create',
            'account-edit',
            'account-delete',
            
            // Article permissions
            'article-list',
            'article-create',
            'article-edit',
            'article-delete',

            // Contact permissions
            'contact-list',
            'contact-create',
            'contact-edit',
            'contact-delete',

            // Game event permissions
            'game-event-list',
            'game-event-create',
            'game-event-edit',
            'game-event-delete',

            // Community permissions
            'event-community-list',
            'event-community-create',
            'event-community-edit',
            'event-community-delete',

        ];

        foreach ($permissions as $permission) {

            Permission::create(['name' => $permission]);
        }
    }
}
