<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Documentation;
use App\Models\EngineeringDocumentation;
use App\Models\User;

class TestCreateDoc extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:create-doc';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a test documentation for testing edit functionality';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Find first user or create one
        $user = User::first();
        
        if (!$user) {
            $user = User::create([
                'name' => 'Test User',
                'email' => 'test@test.com',
                'password' => bcrypt('password'),
                'role' => 'owner',
                'email_verified_at' => now(),
            ]);
            $this->info('Created test user: test@test.com');
        }

        // Create main documentation
        $doc = Documentation::create([
            'title' => 'Test Engineering Documentation',
            'user_id' => $user->id,
            'doc_type' => 'engineering',
        ]);

        // Create engineering documentation
        $engineeringDoc = EngineeringDocumentation::create([
            'documentation_id' => $doc->id,
            'purpose' => 'This is a test purpose',
            'scope' => 'This is a test scope',
            'definitions' => 'Test definitions',
            'overall_description' => 'Test overall description',
            'product_perspective' => 'Test product perspective',
            'user_classes' => 'Test user classes',
            'operating_environment' => 'Test operating environment',
            'constraints' => 'Test constraints',
            'assumptions' => 'Test assumptions',
            'functional_requirements' => 'Test functional requirements',
            'nonfunctional_requirements' => 'Test nonfunctional requirements',
            'use_cases' => 'Test use cases',
            'data_model' => 'Test data model',
            'interface_requirements' => 'Test interface requirements',
            'appendices' => 'Test appendices',
            'compliance_report' => 'Test compliance report',
            'database_tables' => 'Test database tables',
            'ui_ux' => 'Test UI/UX',
            'conclusion' => 'Test conclusion',
            'content' => 'Test content',
        ]);

        $this->info('Created test documentation with ID: ' . $engineeringDoc->id);
        $this->info('Main doc ID: ' . $doc->id);
        $this->info('Edit URL: /docs/' . $engineeringDoc->id . '/edit?type=engineering');
        
        return 0;
    }
}
