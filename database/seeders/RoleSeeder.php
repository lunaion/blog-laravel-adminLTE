<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Blogger']);

        Permission::create(['name' => 'admin.home', 
                            'description' => 'Ver el dashboard'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.users.index', 
                            'description' => 'Ver listado de usurios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.edit', 
                            'description' => 'Asignar un rol'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.roles.index', 
                            'description' => 'Ver listado de roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.create', 
                            'description' => 'Crear roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.edit', 
                            'description' => 'Editar roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.destroy', 
                            'description' => 'Eliminar roles'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.categories.index', 
                            'description' => 'Ver listado de categorías'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.categories.create', 
                            'description' => 'Crear categorías'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.edit', 
                            'description' => 'Editar categorías'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.destroy', 
                            'description' => 'Eliminar categorías'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.countries.index', 
                            'description' => 'Ver listado de países'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.countries.create', 
                            'description' => 'Crear países'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.countries.edit', 
                            'description' => 'Editar países'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.countries.destroy', 
                            'description' => 'Eliminar países'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.cities.index', 
                            'description' => 'Ver listado de ciudades'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.cities.create', 
                            'description' => 'Crear ciudades'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.cities.edit', 
                            'description' => 'Editar ciudades'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.cities.destroy', 
                            'description' => 'Eliminar ciudades'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.sites.index', 
                            'description' => 'Ver listado de sedes'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.sites.create', 
                            'description' => 'Crear sedes'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.sites.edit', 
                            'description' => 'Editar sedes'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.sites.destroy', 
                            'description' => 'Eliminar sedes'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.turns.index', 
                            'description' => 'Ver listado de turnos'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.turns.create', 
                            'description' => 'Ingresar a turno'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.areas.index', 
                            'description' => 'Ver listado de áreas'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.areas.create', 
                            'description' => 'Crear áreas'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.areas.edit', 
                            'description' => 'Editar áreas'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.areas.destroy', 
                            'description' => 'Eliminar áreas'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.positions.index', 
                            'description' => 'Ver listado de cargos'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.positions.create', 
                            'description' => 'Crear cargos'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.positions.edit', 
                            'description' => 'Editar cargos'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.positions.destroy', 
                            'description' => 'Eliminar cargos'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.backups.index', 
                            'description' => 'Ver listado de backups'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.backups.create', 
                            'description' => 'Crear backups'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.backups.edit', 
                            'description' => 'Editar backups'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.backups.destroy', 
                            'description' => 'Eliminar backups'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.licenseActivations.index', 
                            'description' => 'Ver listado de activaciones de licencias'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.licenseActivations.create', 
                            'description' => 'Crear activaciones de licencias'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.licenseActivations.edit', 
                            'description' => 'Editar activaciones de licencias'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.licenseActivations.destroy', 
                            'description' => 'Eliminar activaciones de licencias'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.generalValidations.index', 
                            'description' => 'Ver listado de validaciones generales'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.generalValidations.create', 
                            'description' => 'Crear validaciones generales'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.generalValidations.edit', 
                            'description' => 'Editar validaciones generales'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.generalValidations.destroy', 
                            'description' => 'Eliminar validaciones generales'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.tags.index', 
                            'description' => 'Ver listado de etiquetas'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tags.create', 
                            'description' => 'Crear etiquetas'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tags.edit', 
                            'description' => 'Editar etiquetas'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tags.destroy', 
                            'description' => 'Eliminar etiquetas'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.posts.index', 
                            'description' => 'Ver listado de posts'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.posts.create', 
                            'description' => 'Crear posts'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.posts.edit', 
                            'description' => 'Editar posts'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.posts.destroy', 
                            'description' => 'Eliminar posts'])->syncRoles([$role1, $role2]);

        // Exportar informes
        Permission::create(['name' => 'admin.users.export', 
                            'description' => 'Exportar Lista de usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.sites.export', 
                            'description' => 'Exportar lista de sedes'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.turns.export', 
                            'description' => 'Exportar lista de ingreso a turnos'])->syncRoles([$role1]);
    }
}
