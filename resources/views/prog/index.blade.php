@extends('layouts.admin')

@section('title', 'Emploi du temps')

@section('content')

<style>
@media print {
    body * { visibility: hidden; }
    .imprime, .imprime * { visibility: visible; }
    .imprime { position: absolute; left: 0; top: 0; width: 100%; }
    .desktop-print { display: block !important; }
    .mobile-print, .print-hidden { display: none !important; }
    table { width: 100% !important; border-collapse: collapse; }
    th, td { border: 1px solid #000 !important; color: black !important; bg: white !important; }
}
</style>

<div class="col-span-4 min-h-screen bg-gradient-to-br from-indigo-50 via-white to-purple-50 dark:from-gray-900 dark:via-gray-800 dark:to-indigo-950 p-4 md:p-6 transition-colors duration-300">

    <div class="w-full max-w-6xl mx-auto">

        {{-- TITRE --}}
        <h1 class="text-3xl md:text-4xl font-extrabold text-center mb-8
            bg-gradient-to-r from-blue-600 to-teal-500 dark:from-blue-400 dark:to-teal-300
            bg-clip-text text-transparent">
            Emploi du temps
        </h1>

        <div class="imprime">

            {{-- INFOS SEMAINE --}}
            <p class="text-center mb-6 bg-gray-800 dark:bg-indigo-900 text-white rounded-lg py-3 shadow-md font-medium">
                Semaine du {{ \Carbon\Carbon::now()->startOfWeek()->format('d/m/Y') }}
                au {{ \Carbon\Carbon::now()->endOfWeek()->format('d/m/Y') }}
            </p>

            {{-- ===================== DESKTOP ===================== --}}
            <div class="hidden md:block desktop-print rounded-xl shadow-xl overflow-hidden border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 transition-colors">
                <table class="min-w-full text-center border-collapse">
                    <thead class="bg-gray-900 dark:bg-black text-white">
                        <tr>
                            <th class="py-4 px-4 border-r border-gray-700">Jour / Horaire</th>
                            @foreach ($days as $day)
                                <th class="py-4 px-4 border-r border-gray-700">{{ $day }}</th>
                            @endforeach
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700 text-gray-800 dark:text-gray-200">
                        {{-- MATIN --}}
                        <tr class="dark:hover:bg-gray-700/30 transition-colors">
                            <td class="font-bold bg-gray-50 dark:bg-gray-800/50 border-r dark:border-gray-700">Matin <br><span class="text-xs font-normal">(8h-12h)</span></td>
                            @foreach ($days as $day)
                                <td class="py-4 px-4 border-r dark:border-gray-700">
                                    @if(isset($schedule[$day]['Matin']))
                                        @foreach ($schedule[$day]['Matin'] as $prog)
                                            {{-- ICI : On a retiré le fond et les bordures pour un style épuré --}}
                                            <div class="mb-2">
                                                <p class="font-bold text-indigo-700 dark:text-blue-400 uppercase text-sm tracking-tight">{{ $prog->cour['nom'] }}</p>
                                                <p class="text-xs font-medium text-gray-500 dark:text-gray-400">{{ $prog->nom }}</p>
                                            </div>
                                        @endforeach
                                    @else
                                        <span class="text-gray-300 dark:text-gray-600">—</span>
                                    @endif
                                </td>
                            @endforeach
                        </tr>

                        {{-- PAUSE --}}
                        <tr class="bg-gray-100 dark:bg-gray-900/50 text-gray-500 dark:text-gray-400">
                            <td class="font-semibold border-r dark:border-gray-700 py-2 italic">Pause</td>
                            @foreach ($days as $day)
                                <td class="border-r dark:border-gray-700">12h - 13h</td>
                            @endforeach
                        </tr>

                        {{-- APRES-MIDI --}}
                        <tr class="dark:hover:bg-gray-700/30 transition-colors">
                            <td class="font-bold bg-gray-50 dark:bg-gray-800/50 border-r dark:border-gray-700">Après-midi <br><span class="text-xs font-normal">(13h-17h)</span></td>
                            @foreach ($days as $day)
                                <td class="py-4 px-4 border-r dark:border-gray-700">
                                    @if(isset($schedule[$day]['Après-midi']))
                                        @foreach ($schedule[$day]['Après-midi'] as $prog)
                                            {{-- ICI AUSSI : Style minimaliste sans couleur de fond --}}
                                            <div class="mb-2">
                                                <p class="font-bold text-teal-700 dark:text-teal-400 uppercase text-sm tracking-tight">{{ $prog->cour['nom'] }}</p>
                                                <p class="text-xs font-medium text-gray-500 dark:text-gray-400">{{ $prog->nom }}</p>
                                            </div>
                                        @endforeach
                                    @else
                                        <span class="text-gray-300 dark:text-gray-600">—</span>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- ===================== MOBILE ===================== --}}
            <div class="md:hidden mobile-print mt-6">
                <select id="jourSelect" class="w-full mb-6 p-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 text-gray-900 dark:text-white shadow-sm font-bold transition-all">
                    @foreach ($days as $day)
                        <option value="{{ $day }}">{{ $day }}</option>
                    @endforeach
                </select>

                @foreach ($days as $day)
                    <div class="jour-content hidden" data-day="{{ $day }}">
                        {{-- MATIN --}}
                        <div class="bg-white dark:bg-gray-800 rounded-xl p-4 mb-4 shadow border border-gray-100 dark:border-gray-700">
                            <h3 class="font-bold text-blue-600 dark:text-blue-400 mb-3 uppercase text-xs tracking-widest">🌅 Matin (8h - 12h)</h3>
                            @if(isset($schedule[$day]['Matin']))
                                @foreach ($schedule[$day]['Matin'] as $prog)
                                    <div class="bg-blue-50/50 dark:bg-gray-900/50 rounded-lg p-3 mb-2 border-l-4 border-blue-500">
                                        <p class="font-bold text-gray-900 dark:text-white">{{ $prog->cour['nom'] }}</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400 font-medium">{{ $prog->nom }}</p>
                                    </div>
                                @endforeach
                            @else
                                <p class="italic text-gray-400 dark:text-gray-600 text-sm">Aucun cours</p>
                            @endif
                        </div>

                        {{-- APRES-MIDI --}}
                        <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow border border-gray-100 dark:border-gray-700">
                            <h3 class="font-bold text-green-600 dark:text-green-400 mb-3 uppercase text-xs tracking-widest">🌇 Après-midi (13h - 17h)</h3>
                            @if(isset($schedule[$day]['Après-midi']))
                                @foreach ($schedule[$day]['Après-midi'] as $prog)
                                    <div class="bg-green-50/50 dark:bg-gray-900/50 rounded-lg p-3 mb-2 border-l-4 border-green-500">
                                        <p class="font-bold text-gray-900 dark:text-white">{{ $prog->cour['nom'] }}</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400 font-medium">{{ $prog->nom }}</p>
                                    </div>
                                @endforeach
                            @else
                                <p class="italic text-gray-400 dark:text-gray-600 text-sm">Aucun cours</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- BOUTON IMPRIMER --}}
        <div class="mt-8 flex justify-center print-hidden">
            <button onclick="window.print()" class="bg-indigo-600 dark:bg-indigo-500 text-white font-bold py-3 px-10 rounded-full shadow-lg hover:bg-indigo-700 dark:hover:bg-indigo-400 hover:shadow-xl transition-all active:scale-95">
                Imprimer le programme
            </button>
        </div>
    </div>
</div>

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
