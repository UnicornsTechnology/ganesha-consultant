<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['name' => '/admin/jobs/list', 'fieldname' => 'Jobs List', 'list_number' => '1'],
            ['name' => '/admin/job/create', 'fieldname' => 'Jobs Create', 'list_number' => '1'],
            ['name' => '/admin/job/view/{id}', 'fieldname' => 'Jobs View', 'list_number' => '1'],
            ['name' => '/admin/job/edit/{id}', 'fieldname' => 'Jobs Edit', 'list_number' => '1'],
            ['name' => '/admin/job/status/update/{type}/{id}', 'fieldname' => 'Jobs Status', 'list_number' => '1'],

            ['name' => '/admin/blog/list', 'fieldname' => 'Blog List', 'list_number' => '2'],
            ['name' => '/admin/blog/create', 'fieldname' => 'Blog Create', 'list_number' => '2'],
            ['name' => '/admin/blog/view/{id}', 'fieldname' => 'Blog View', 'list_number' => '2'],
            ['name' => '/admin/blog/edit/{id}', 'fieldname' => 'Blog Edit', 'list_number' => '2'],

            ['name' => '/admin/employee/list', 'fieldname' => 'Employee List', 'list_number' => '3'],
            ['name' => '/admin/employee/create', 'fieldname' => 'Employee Create', 'list_number' => '3'],
            ['name' => '/admin/employee/view/{id}', 'fieldname' => 'Employee Edit', 'list_number' => '3'],
            ['name' => '/admin/employee/edit/{id}', 'fieldname' => 'Employee Status', 'list_number' => '3'],

            ['name' => '/admin/team/index', 'fieldname' => 'Team List', 'list_number' => '4'],
            ['name' => '/admin/team/create', 'fieldname' => 'Team Create', 'list_number' => '4'],
            ['name' => '/admin/team/edit/{id}', 'fieldname' => 'Team Edit', 'list_number' => '4'],
            ['name' => '/admin/team_status/{id}', 'fieldname' => 'Team Status', 'list_number' => '4'],

            ['name' => '/admin/students/list/{type}', 'fieldname' => 'Canditate List', 'list_number' => '5'],
            ['name' => '/admin/student/details/{id}', 'fieldname' => 'Canditate Profile', 'list_number' => '5'],
            ['name' => '/admin/student/activation-status/{student_id}/{status}', 'fieldname' => 'Canditate Permission', 'list_number' => '5'],
            ['name' => '/admin/student/applied-jobs/{id}', 'fieldname' => 'Canditate Apply Job', 'list_number' => '5'],
            ['name' => '/admin/student/bookmarks/{id}', 'fieldname' => 'Canditate bookmark', 'list_number' => '5'],

            ['name' => '/admin/roles', 'fieldname' => 'Roles List', 'list_number' => '6'],
            ['name' => '/admin/roles/create', 'fieldname' => 'Roles Create', 'list_number' => '6'],
            ['name' => '/admin/roles/edit/{id}', 'fieldname' => 'Roles Edit', 'list_number' => '6'],
            ['name' => '/admin/roles/trash/{id}', 'fieldname' => 'Roles Status', 'list_number' => '6'],

            ['name' => '/admin/settings/job-titles/list', 'fieldname' => 'Title', 'list_number' => '7'],
            ['name' => '/admin/settings/job-categories/list', 'fieldname' => 'Category', 'list_number' => '7'],
            ['name' => '/admin/settings/experience/list', 'fieldname' => 'Experience', 'list_number' => '7'],
            ['name' => '/admin/settings/skills/list', 'fieldname' => 'Skills', 'list_number' => '7'],
            ['name' => '/admin/settings/locations/list', 'fieldname' => 'Locations', 'list_number' => '7'],
            ['name' => '/admin/settings/company-name/list', 'fieldname' => 'Company', 'list_number' => '7'],
            ['name' => '/admin/settings/education/list', 'fieldname' => 'Education', 'list_number' => '7'],
            ['name' => '/admin/settings/job-type/list', 'fieldname' => 'Type', 'list_number' => '7'],

            ['name' => '/admin/inquiry/list', 'fieldname' => 'Inquery List ', 'list_number' => '8'],
            ['name' => '/admin/improt/index', 'fieldname' => 'Data Import List ', 'list_number' => '8'],
            ['name' => '/admin/improt/create', 'fieldname' => 'New Import Data ', 'list_number' => '8'],
            ['name' => '/admin/whatsapp/templates', 'fieldname' => 'Whatsapp Advertisement ', 'list_number' => '8'],
            ['name' => '/admin/whatsapp/create-template', 'fieldname' => 'Create Advertisement ', 'list_number' => '8'],
            ['name' => '/admin/whatsapp/send-messages', 'fieldname' => 'Sending Advertisement ', 'list_number' => '8'],
            ['name' => '/admin/most_view/job', 'fieldname' => 'Reports ', 'list_number' => '8'],


        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission['name'],
                'fieldname' => $permission['fieldname'],
                'list_number' => $permission['list_number'],
            ]);
        }
    }
}
