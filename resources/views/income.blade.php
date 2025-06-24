<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white leading-tight">
            {{ __('Renda Fixa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white/50 dark:bg-gray-800/70 backdrop-blur-md rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold mb-4 text-center">Indicadores</h3>
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Indicador</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Valor</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Data</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse ($rates as $rate)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap font-medium">{{ $rate['name'] }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right">{{ $rate['value'] }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right">{{ $rate['date'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-4 text-center text-gray-500">Não foi possível obter os dados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <p class="text-xs text-gray-500 mt-4 text-center">Dados obtidos do Banco Central do Brasil.</p>
            </div>
        </div>
    </div>
</x-app-layout>
