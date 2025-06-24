<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white leading-tight">
            {{ __('Mercado') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white/50 dark:bg-gray-800/70 backdrop-blur-md rounded-lg shadow p-6">
                <div id="tradingview-widget" style="height:600px"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse ($stocks as $stock)
                    <div class="bg-white/50 dark:bg-gray-800/70 backdrop-blur-md rounded-lg shadow p-4">
                        <h3 class="font-semibold mb-2">{{ $stock['name'] }}</h3>
                        <p class="text-sm">Preço: {{ number_format($stock['price'], 2, ',', '.') }}</p>
                        <p class="text-sm">Abertura: {{ number_format($stock['open'], 2, ',', '.') }}</p>
                        <p class="text-sm">Alta: {{ number_format($stock['high'], 2, ',', '.') }}</p>
                        <p class="text-sm">Baixa: {{ number_format($stock['low'], 2, ',', '.') }}</p>
                    </div>
                @empty
                    <p class="col-span-full text-center text-gray-500">Não foi possível obter dados do mercado.</p>
                @endforelse
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
    <script type="text/javascript">
        new TradingView.widget({
            "container_id": "tradingview-widget",
            "autosize": true,
            "symbol": "BMFBOVESPA:IBOV",
            "interval": "60",
            "timezone": "Etc/UTC",
            "theme": "dark",
            "style": "1",
            "locale": "br",
            "enable_publishing": false,
            "hide_top_toolbar": true,
            "hide_legend": false,
            "save_image": false,
            "studies": [],
            "support_host": "https://www.tradingview.com"
        });
    </script>
</x-app-layout>
