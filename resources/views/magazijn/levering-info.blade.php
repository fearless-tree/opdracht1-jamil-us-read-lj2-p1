<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Levering Informatie') }} - {{ $product->Naam }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if ($product->voorraad?->AantalAanwezig === null || (int) $product->voorraad->AantalAanwezig === 0)
                    <table class="w-full text-left"><tbody><tr><td class="py-2">Er is van dit product op dit moment geen voorraad aanwezig, de verwachte eerstvolgende levering is: 30-04-2023</td></tr></tbody></table>
                    <p class="text-sm text-gray-500 mt-2">Je wordt over 4 seconden teruggestuurd naar het overzicht...</p>

                    <script>
                        setTimeout(function () {
                            window.location.href = "{{ route('magazijn.overzicht') }}";
                        }, 4000);
                    </script>
                @elseif ($leveringen->isEmpty())
                    <p>Er zijn geen leveringen geregistreerd voor dit product.</p>
                @else
                    @php $leverancier = $leveringen->first()->leverancier; @endphp

                    <div class="mb-6 grid grid-cols-2 gap-2 max-w-md">
                        <div class="font-semibold">Naam leverancier:</div>
                        <div>{{ $leverancier->Naam ?? '-' }}</div>

                        <div class="font-semibold">Contactpersoon leverancier:</div>
                        <div>{{ $leverancier->ContactPersoon ?? '-' }}</div>

                        <div class="font-semibold">Leveranciernummer:</div>
                        <div>{{ $leverancier->LeverancierNummer ?? '-' }}</div>

                        <div class="font-semibold">Mobiel:</div>
                        <div>{{ $leverancier->Mobiel ?? '-' }}</div>
                    </div>

                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b-2 border-gray-300">
                                <th class="py-2 pr-4">Naam Product</th>
                                <th class="py-2 pr-4">Datum laatste levering</th>
                                <th class="py-2 pr-4">Aantal</th>
                                <th class="py-2 pr-4">Eerstvolgende levering</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($leveringen as $levering)
                                <tr class="border-b border-gray-200">
                                    <td class="py-2 pr-4">{{ $product->Naam }}</td>
                                    <td class="py-2 pr-4">{{ $levering->DatumLevering->format('d-m-Y') }}</td>
                                    <td class="py-2 pr-4">{{ $levering->Aantal }}</td>
                                    <td class="py-2 pr-4">{{ $levering->DatumEerstvolgendeLevering?->format('d-m-Y') ?? '-' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

                <p class="mt-6"><a class="underline text-indigo-600" href="{{ route('magazijn.overzicht') }}">Terug naar overzicht</a></p>
            </div>
        </div>
    </div>
</x-app-layout>
