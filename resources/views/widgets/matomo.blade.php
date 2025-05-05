<div class="card p-0 content">
    <div class="flex justify-between items-center p-4 pb-2 border-b dark:bg-dark-650 dark:border-b dark:border-dark-900">
        <h2><a class="flex items-center" href="{{ config('statamic.matomo_widget.url') }}/index.php?idSite={{ config('statamic.matomo_widget.site_id') }}" target="_blank">
            <div class="h-6 w-6 rtl:ml-2 ltr:mr-2 text-gray-800 dark:text-dark-200">@cp_svg('icons/light/charts')</div>
            <span>Matomo Statistics</span>
        </a></h2>
    </div>
    <div class="px-3 py-2">
        @if(isset($error))
            <p class="text-lg font-bold mb-2">{{ $error }}</p>
        @else
            <canvas id="matomoStatsChart" height="{{ $config['chart_height'] }}"></canvas>
        @endif
    </div>
</div>

@if(! isset($error))
<script src="https://unpkg.com/chart.js@4.4.1/dist/chart.umd.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('matomoStatsChart').getContext('2d');
    const data = @json($stats);
    const labels = Object.keys(data);
    const visits = Object.values(data).map(day => day.nb_visits || 0);
    const pageviews = Object.values(data).map(day => day.nb_actions || 0);

    new Chart(ctx, {
        type: '{{ $config['chart_type'] }}',
        data: {
            labels: labels,
            datasets: [{
                label: 'Visits',
                data: visits,
                borderColor: '#007bff',
                fill: false,
                spanGaps: false
            }, {
                label: 'Actions',
                data: pageviews,
                borderColor: '#28a745',
                fill: false,
                spanGaps: false
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    ticks: {
                        callback: function(val, index) {
                            return index % 4 === 0 ? this.getLabelForValue(val) : '';
                        }
                    }
                },
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    }
                }
            }
        }
    });
});
</script>
@endif
