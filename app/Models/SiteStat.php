<?php

namespace App\Models;

use Illuminate\Support\Collection;

class SiteStat extends BaseModel
{
    protected $table = 'site_stats';

    protected $fillable = [
        'key',
        'label',
        'value',
        'suffix',
        'sort_order',
    ];

    public static function defaultRows(): array
    {
        return [
            ['key' => 'projects_completed', 'label' => 'Projects Completed', 'value' => 450, 'suffix' => '+', 'sort_order' => 1],
            ['key' => 'happy_customers', 'label' => 'Happy Customers', 'value' => 900, 'suffix' => '+', 'sort_order' => 2],
            ['key' => 'years_experience', 'label' => 'Years Of Experience', 'value' => 17, 'suffix' => '', 'sort_order' => 3],
            ['key' => 'skilled_workers', 'label' => 'Skilled Workers', 'value' => 120, 'suffix' => '+', 'sort_order' => 4],
        ];
    }

    public static function fallbackCollection(): Collection
    {
        return collect(self::defaultRows())->map(function ($row) {
            return (object) $row;
        });
    }

    public static function ensureDefaults(): void
    {
        foreach (self::defaultRows() as $row) {
            self::firstOrCreate(
                ['key' => $row['key']],
                $row
            );
        }
    }

    public static function frontendStats(): Collection
    {
        try {
            self::ensureDefaults();

            return self::orderBy('sort_order')->get();
        } catch (\Throwable $exception) {
            return self::fallbackCollection();
        }
    }
}
