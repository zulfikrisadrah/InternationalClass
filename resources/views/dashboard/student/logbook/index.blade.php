<x-app-layout>
    <x-slot name="header">
        @include('dashboard.partials.header')
    </x-slot>

    <div class="container mx-auto p-4">
        <div class="max-w-7xl mx-6">
            <div class="flex justify-end py-4 gap-4">
                <!-- Upload Certificate Button -->
                <label for="upload-certificate-modal" class="font-bold py-3 px-6 bg-blueThird text-white rounded-full cursor-pointer">
                    Upload Certificate
                </label>
                <!-- Add New Button -->
                <a href="{{ route('student.logbook.create', $program->ID_program) }}"
                   class="font-bold py-3 px-6 bg-blueThird text-white rounded-full">
                    Add New
                </a>
            </div>
        </div>

        <!-- Modal for Upload Certificate -->
        <input type="checkbox" id="upload-certificate-modal" class="modal-toggle" />
        <div class="modal">
            <div class="modal-box">
                <h3 class="font-bold text-lg">Upload Certificate</h3>
                <form action="{{ route('student.certificate.store', $program->ID_program) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Certificate File (PDF, Max 5MB)</span>
                        </label>
                        <input type="file" name="certificate" accept=".pdf" class="file-input file-input-bordered w-full" required>
                    </div>
                    <div class="modal-action">
                        <label for="upload-certificate-modal" class="btn">Cancel</label>
                        <button type="submit" class="btn btn-success text-white">Upload</button>
                    </div>
                </form>
            </div>
        </div>


        <div class="bg-white mx-6 p-6 rounded-lg shadow-md">

            @if($logbooks->isNotEmpty())
                <h2 class="text-xl font-bold mb-2">Logbook Entry</h2>
                <table class="min-w-full table-fixed border-collapse border border-gray-300">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2 font-bold text-center bg-blueThird text-white w-1/12">No</th>
                            <th class="border px-4 py-2 font-bold text-left bg-blueThird text-white w-2/12">Activity</th>
                            <th class="border px-4 py-2 font-bold text-center bg-blueThird text-white w-2/12">Start Time</th>
                            <th class="border px-4 py-2 font-bold text-center bg-blueThird text-white w-2/12">End Time</th>
                            <th class="border px-4 py-2 font-bold text-center bg-blueThird text-white w-1/12">Duration (Minutes)</th>
                            <th class="border px-4 py-2 font-bold text-left bg-blueThird text-white w-2/12">Description</th>
                            <th class="border px-4 py-2 font-bold text-center bg-blueThird text-white w-3/12">Image</th>
                            <th class="border px-4 py-2 font-bold text-center bg-blueThird text-white w-2/12">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $totalDuration = 0;
                        @endphp
                        @foreach ($logbooks as $index => $logbook)
                        @php
                            $duration = \Carbon\Carbon::parse($logbook->Start_Time)->diffInMinutes(\Carbon\Carbon::parse($logbook->End_Time));
                            $totalDuration += $duration;
                        @endphp
                            <tr>
                                <td class="border px-4 py-2 text-center">{{ $index + 1 }}</td>
                                <td class="border px-4 py-2 text-left">{{ $logbook->Logbook_Name }}</td>
                                <td class="border px-4 py-2 text-center">{{ \Carbon\Carbon::parse($logbook->Start_Time)->format('d M Y H:i') }}</td>
                                <td class="border px-4 py-2 text-center">{{ \Carbon\Carbon::parse($logbook->End_Time)->format('d M Y H:i') }}</td>
                                <td class="border px-4 py-2 text-center">{{ $duration }}</td>
                                <td class="border px-4 py-2 text-left max-w-xs break-words whitespace-normal">{{ $logbook->Logbook_Description }}</td>
                                <td class="border px-4 py-2 text-center">
                                    @if($logbook->Logbook_Image)
                                        <img src="{{ asset('storage/' . $logbook->Logbook_Image) }}" alt="Logbook Image" class="w-28 h-20 object-cover rounded-md mx-auto">
                                    @else
                                        No Image
                                    @endif
                                </td>
                                <td class="border px-4 py-2 text-center">
                                    <div class="flex justify-center space-x-2">
                                        <!-- Edit Button -->
                                        <a href="{{ route('student.logbook.edit', [$program->ID_program, $logbook->ID_Logbook]) }}"
                                           class="font-bold py-1 px-3 bg-blueThird text-white rounded-full">
                                            Edit
                                        </a>

                                        <!-- Delete Button -->
                                        <label for="delete-modal-{{ $logbook->ID_Logbook }}"
                                               class="cursor-pointer font-bold py-1 px-3 bg-red-700 text-white rounded-full">
                                            Delete
                                        </label>
                                    </div>

                                    <!-- Checkbox untuk Modal -->
                                    <input type="checkbox" id="delete-modal-{{ $logbook->ID_Logbook }}" class="modal-toggle" />
                                    <div class="modal">
                                        <div class="modal-box">
                                            <h3 class="font-bold text-lg">Confirm Deletion</h3>
                                            <p class="py-4">Are you sure you want to delete this logbook entry? This action cannot be undone.</p>
                                            <div class="modal-action">
                                                <!-- Cancel Button -->
                                                <label for="delete-modal-{{ $logbook->ID_Logbook }}" class="btn">Cancel</label>
                                                <!-- Form Penghapusan -->
                                                <form action="{{ route('student.logbook.destroy', [$program->ID_program, $logbook->ID_Logbook]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-error text-white">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" class="border px-4 py-2 font-bold text-right">Total Activity Time (Minutes):</td>
                            <td class="border px-4 py-2 text-center font-bold">{{ $totalDuration }}</td>
                            <td colspan="3" class="border px-4 py-2"></td>
                        </tr>
                    </tfoot>
                </table>

            @else
                <p class="text-center text-lg font-bold text-black">No Logbook Entries Found</p>
            @endif
        </div>
    </div>
</x-app-layout>
