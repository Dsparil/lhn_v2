<?php

namespace App\Console\Commands\Migrate;

use Illuminate\Console\Command;
use App\Models\Band;

class BandsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:migrate-bands {date}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate bands from old database to new database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Migrating bands...');

        $date = $this->argument('date');
        $data = json_decode(file_get_contents(resource_path("data/lhn_webzine_band_{$date}.json")));

        foreach ($data as $band) {
            if (Band::find($band->id)) {
                $this->info("Band {$band->name} already migrated.");
                continue;
            }

            if (Band::where('slug', $band->alias)->first()) {
                $band->alias = "{$band->alias}-{$band->id}";
            }

            Band::create([
                'id'          => $band->id,
                'name'        => $band->name,
                'slug'        => $band->alias,
                'country'     => $band->country,
                'address'     => empty($band->address)? null : $band->address,
                'email'       => empty($band->email)? null : $band->email,
                'genre'       => $band->style,
                'discography' => $band->disco,
                'lineup'      => $band->lineup,
                'website'     => empty($band->web)? null : $band->web,
            ]);

            $this->info("Band {$band->name} migrated.");
        }

        $this->info('Bands migrated successfully.');
    }
}
