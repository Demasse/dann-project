@extends('layouts.admin')

@section('title', 'Emploi du temps')

@section('content')

<div class="col-span-4 min-h-screen text-black bg-gradient-to-br p-4 md:p-6 overflow-auto">

    <div class="w-full max-w-6xl mx-auto">

        {{-- TITRE --}}
        <h1 class="text-3xl md:text-4xl font-extrabold text-center mb-8
            bg-gradient-to-r from-blue-400 via-green-400 to-teal-400
            bg-clip-text text-transparent">
            Emploi du temps
        </h1>

        {{-- INFOS SEMAINE --}}
        <div class="imprime">
            <p class="text-center mb-6 bg-gray-800 text-white rounded-lg py-3 shadow">
                Semaine du {{ \Carbon\Carbon::now()->startOfWeek()->format('d/m/Y') }}
                au {{ \Carbon\Carbon::now()->endOfWeek()->format('d/m/Y') }}
            </p>

            {{-- ===================== DESKTOP ===================== --}}
            <div class="hidden md:block rounded-xl shadow-2xl overflow-hidden border">

                <table class="min-w-full text-center border-collapse">
                    <thead class="bg-gray-900 text-white">
                        <tr>
                            <th class="py-4 px-4">Jour / Horaire</th>
                            @foreach ($days as $day)
                                <th class="py-4 px-4">{{ $day }}</th>
                            @endforeach
                        </tr>
                    </thead>

                    <tbody class="bg-white">

                        {{-- MATIN --}}
                        <tr class="border-b">
                            <td class="font-semibold">Matin<br>(8h - 12h)</td>
                            @foreach ($days as $day)
                                <td class="py-4 px-4">
                                    @if(isset($schedule[$day]['Matin']))
                                        @foreach ($schedule[$day]['Matin'] as $prog)
                                            <div class="mb-2">
                                                <p class="font-semibold">{{ $prog->cour['nom'] }}</p>
                                                <p class="text-sm text-gray-600">{{ $prog->nom }}</p>
                                            </div>
                                        @endforeach
                                    @else
                                        —
                                    @endif
                                </td>
                            @endforeach
                        </tr>

                        {{-- PAUSE --}}
                        <tr class="bg-gray-100">
                            <td class="font-semibold">Pause<br>(12h - 13h)</td>
                            @foreach ($days as $day)
                                <td>—</td>
                            @endforeach
                        </tr>

                        {{-- APRES-MIDI --}}
                        <tr>
                            <td class="font-semibold">Après-midi<br>(13h - 17h)</td>
                            @foreach ($days as $day)
                                <td class="py-4 px-4">
                                    @if(isset($schedule[$day]['Après-midi']))
                                        @foreach ($schedule[$day]['Après-midi'] as $prog)
                                            <div class="mb-2">
                                                <p class="font-semibold">{{ $prog->cour['nom'] }}</p>
                                                <p class="text-sm text-gray-600">{{ $prog->nom }}</p>
                                            </div>
                                        @endforeach
                                    @else
                                        —
                                    @endif
                                </td>
                            @endforeach
                        </tr>

                    </tbody>
                </table>
            </div>

            {{-- ===================== MOBILE ===================== --}}
            <div class="md:hidden mt-6">

                <label class="block font-semibold mb-2">Choisir le jour</label>

                <select id="jourSelect"
                    class="w-full mb-6 p-3 rounded-lg bg-gray-800 text-white">
                    @foreach ($days as $day)
                        <option value="{{ $day }}">{{ $day }}</option>
                    @endforeach
                </select>

                @foreach ($days as $day)
                    <div class="jour-content hidden" data-day="{{ $day }}">

                        {{-- MATIN --}}
                        <div class="bg-gray-800 text-white rounded-xl p-4 mb-4 shadow">
                            <h3 class="font-bold text-blue-400 mb-3">
                                🌅 Matin (8h - 12h)
                            </h3>

                            @if(isset($schedule[$day]['Matin']))
                                @foreach ($schedule[$day]['Matin'] as $prog)
                                    <div class="bg-gray-900 rounded-lg p-3 mb-2 border-l-4 border-blue-500">
                                        <p class="font-semibold">{{ $prog->cour['nom'] }}</p>
                                        <p class="text-sm text-gray-300">{{ $prog->nom }}</p>
                                    </div>
                                @endforeach
                            @else
                                <p class="italic text-gray-400">Aucun cours</p>
                            @endif
                        </div>

                        {{-- PAUSE --}}
                        <div class="text-center text-gray-500 font-semibold mb-4">
                            ⏸ Pause (12h - 13h)
                        </div>

                        {{-- APRES-MIDI --}}
                        <div class="bg-gray-800 text-white rounded-xl p-4 shadow">
                            <h3 class="font-bold text-green-400 mb-3">
                                🌇 Après-midi (13h - 17h)
                            </h3>

                            @if(isset($schedule[$day]['Après-midi']))
                                @foreach ($schedule[$day]['Après-midi'] as $prog)
                                    <div class="bg-gray-900 rounded-lg p-3 mb-2 border-l-4 border-green-500">
                                        <p class="font-semibold">{{ $prog->cour['nom'] }}</p>
                                        <p class="text-sm text-gray-300">{{ $prog->nom }}</p>
                                    </div>
                                @endforeach
                            @else
                                <p class="italic text-gray-400">Aucun cours</p>
                            @endif
                        </div>

                    </div>
                @endforeach
            </div>
        </div>

        {{-- BOUTON IMPRIMER --}}
        <div class="mt-8 flex justify-center print-hidden">
            <button onclick="window.print()"
                class="bg-gradient-to-r from-blue-500 to-green-500
                text-white font-bold py-3 px-8 rounded-full shadow-lg">
                Imprimer
            </button>
        </div>

    </div>
</div>

{{-- ===================== SCRIPT MOBILE ===================== --}}
<script>
    const select = document.getElementById('jourSelect');
    const contents = document.querySelectorAll('.jour-content');

    function updateDay() {
        contents.forEach(c => {
            c.classList.toggle('hidden', c.dataset.day !== select.value);
        });
    }

    select.addEventListener('change', updateDay);
    updateDay();
</script>

@endsection
