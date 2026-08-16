@php
    $stats = collect($stats ?? []);

    if ($stats->isEmpty()) {
        $stats = \App\Models\SiteStat::fallbackCollection();
    }
@endphp

<section class="stats">
    <div class="container">
        @foreach($stats as $stat)
            <div class="stat" data-reveal="fade">
                <b><span class="count" data-target="{{ (int) data_get($stat, 'value', 0) }}">0</span>{{ data_get($stat, 'suffix') }}</b>
                <p>{{ data_get($stat, 'label') }}</p>
            </div>
        @endforeach
    </div>
</section>
