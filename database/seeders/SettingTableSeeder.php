<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * @var array
     */
    protected $settings = [
        [
            'key'                       =>  'site_name',
            'value'                     =>  'BingueCarrefour',
        ],
        [
            'key'                       =>  'site_title',
            'value'                     =>  'BingueCarrefour',
        ],
        [
            'key'                       =>  'address',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'email1',
            'value'                     =>  'admin@gmail.com',
        ],
        [
            'key'                       =>  'email2',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'phone1',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'phone2',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'phone3',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'currency_code',
            'value'                     =>  'FCFA',
        ],
        [
            'key'                       =>  'currency_symbol',
            'value'                     =>  'cfa',
        ],
        [
            'key'                       =>  'site_logo',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'site_favicon',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'social_facebook',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'social_twitter',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'social_instagram',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'social_linkedin',
            'value'                     =>  '',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->settings as $index => $setting)
        {
            $result = Setting::create($setting);
            if (!$result) {
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }
        $this->command->info('Inserted '.count($this->settings). ' records');
    }
}
