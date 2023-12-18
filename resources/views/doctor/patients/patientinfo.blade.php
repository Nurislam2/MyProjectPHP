<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Patient Information') }}
        </h2>
    </x-slot>

    <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
        <!-- Ваш код для отображения информации о пациенте -->
        <p>Name: {{ $patient->user->name }}</p>
        <p>Gender: {{ $patient->gender->name }}</p>
        <!-- ... Добавьте другие детали о пациенте, которые вам нужны ... -->
    </div>
     <button  class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded mt-4">
           <a href="{{ route('doctor.patients.addmedicament', $patient->id) }}" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded mt-4">
    Add Medicament
</a>
    </button>
     <table class="min-w-full divide-y divide-gray-200 w-full">
                                <thead>
                                <tr>

                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name diagnoses
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name Medicaments
                                    </th>

                                    <th scope="col" width="200" class="px-6 py-3 bg-gray-50">

                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($Medi as $Med)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $Med->diagnoses->name }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $Med->medicaments->name }}
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

</x-app-layout>
