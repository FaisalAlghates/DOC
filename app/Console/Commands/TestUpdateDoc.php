<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\EngineeringDocumentation;
use App\Models\Documentation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestUpdateDoc extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:update-doc {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test updating a documentation';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $id = $this->argument('id');
        
        try {
            // Find the engineering doc
            $subDoc = EngineeringDocumentation::findOrFail($id);
            $docMain = $subDoc->documentation;
            
            $this->info('Found engineering doc: ' . $subDoc->id);
            $this->info('Main doc: ' . $docMain->id . ' - ' . $docMain->title);
            $this->info('Doc type: ' . $docMain->doc_type);
            
            // Test data
            $testData = [
                'title' => 'Updated Test Documentation - ' . now(),
                'purpose' => 'Updated purpose - ' . now(),
                'scope' => 'Updated scope - ' . now(),
                'doc_type' => 'engineering'
            ];
            
            // Update main doc
            $docMain->update([
                'title' => $testData['title'],
                'updated_at' => now(),
            ]);
            
            // Update sub doc
            $subDoc->update([
                'purpose' => $testData['purpose'],
                'scope' => $testData['scope'],
            ]);
            
            $this->info('✅ Successfully updated documentation!');
            $this->info('New title: ' . $docMain->fresh()->title);
            $this->info('New purpose: ' . $subDoc->fresh()->purpose);
            
        } catch (\Exception $e) {
            $this->error('❌ Error updating documentation: ' . $e->getMessage());
            $this->error('Stack trace: ' . $e->getTraceAsString());
        }
        
        return 0;
    }
}
