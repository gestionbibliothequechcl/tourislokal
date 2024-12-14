<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Créer un rôle SuperAdmin
        $superAdminRole = Role::firstOrCreate(['name' => 'superadmin']);

        // Demander le nom d'utilisateur et le mot de passe avec confirmation via CLI
        $name = $this->command->ask('Entrez le nom d\'utilisateur du SuperAdmin', 'superadmin');
        $email = $this->command->ask('Entrez l\'email du SuperAdmin', 'superadmin@example.com');
        $password = $this->command->secret('Entrez le mot de passe du SuperAdmin');
        $confirmPassword = $this->command->secret('Confirmez le mot de passe');

        // Vérifier la confirmation du mot de passe
        if ($password !== $confirmPassword) {
            $this->command->error('Les mots de passe ne correspondent pas. Seed annulé.');
            return;
        }

        // Créer un utilisateur SuperAdmin avec les informations saisies
        $superAdmin = User::firstOrCreate(
            ['email' => $email],
            [
                'name' => $name,
                'password' => Hash::make($password),
            ]
        );

        // Assigner le rôle SuperAdmin à l'utilisateur
        $superAdmin->assignRole($superAdminRole);

        $this->command->info('SuperAdmin créé avec succès.');
    }
}
