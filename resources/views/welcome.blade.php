<x-guest-layout>
    <div class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 py-20 text-white text-center">
        <h1 class="text-5xl font-bold mb-4">Bem-vindo à FinanceCorp</h1>
        <p class="max-w-3xl mx-auto text-lg">
            A FinanceCorp é especialista em soluções de controle financeiro para empresas de todos os tamanhos.
            Nosso sistema facilita a gestão de despesas, receitas e planejamento financeiro, garantindo segurança e praticidade.
        </p>
    </div>

    <div class="max-w-4xl mx-auto my-12 bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-semibold mb-4 text-center">Ações em tempo real</h2>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ação</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Preço</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Abertura</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Alta</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Baixa</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($stocks as $stock)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap font-medium">{{ $stock['name'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right">{{ number_format($stock['price'], 2, ',', '.') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right">{{ number_format($stock['open'], 2, ',', '.') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right">{{ number_format($stock['high'], 2, ',', '.') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right">{{ number_format($stock['low'], 2, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">Não foi possível obter dados do mercado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <p class="text-xs text-gray-500 mt-4 text-center">Dados obtidos em tempo real do Yahoo Finance.</p>
    </div>

    <div class="text-center pb-8">
        @auth
            <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-md">Ir para o painel</a>
        @else
            <a href="{{ route('login') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-md">Entrar</a>
            <span class="mx-2 text-gray-600">ou</span>
            <a href="{{ route('register') }}" class="px-4 py-2 bg-purple-600 text-white rounded-md">Criar conta</a>
        @endauth
    </div>
</x-guest-layout>
