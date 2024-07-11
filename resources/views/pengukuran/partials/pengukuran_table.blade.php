<!-- resources/views/pengukurans/partials/pengukurans_table.blade.php -->

@foreach ($pengukuran as $pengukuran_1)

<tr>
    <td>
        <p class="text-xs font-weight-bold mb-0">
            {{ $pengukuran_1->indikator->standar->kode }}. {{ $pengukuran_1->indikator->standar->name }}
            {{ $pengukuran_1->indikator->kode }}.
            {{ $pengukuran_1->indikator->indikator }}
        </p>
    </td>
    <td>
        <p class="text-xs font-weight-bold mb-0">
            {{ $pengukuran_1->pengukuran }}
        </p>
    </td>
    <td>
        <p class="text-xs font-weight-bold mb-0">
            {{ $pengukuran_1->tahun }}
        </p>

    </td>
    <td>
        <p class="text-xs font-weight-bold mb-0">
            {{ $pengukuran_1->target->value }}
        </p>

    </td>
    <td>
        <p class="text-xs font-weight-bold mb-0">
            {{ $pengukuran_1->capaian_ukuran }}
        </p>

    </td>
    <td class="align-middle text-center">
        <a href="javascript:;" class=" text-dark font-weight-bold text-xs mt-2 nilaipengukuran" data-toggle="tooltip"
            data-original-title="Nilai pengukuran" data-bs-toggle="modal" data-bs-pengukuran="#nilaipengukuranModal"
            data-id="{{ $pengukuran_1->id }}"
            data-route="{{ route('pengukuran.get_data', ['id' => $pengukuran_1->id]) }}">
            <i class="fa fa-edit text-lg"></i>
        </a>
        <a href="javascript:;" class=" text-warning font-weight-bold text-xs mt-2 editpengukuran" data-toggle="tooltip"
            data-original-title="Edit pengukuran" data-bs-toggle="modal" data-bs-pengukuran="#editpengukuranModal"
            data-id="{{ $pengukuran_1->id }}"
            data-route="{{ route('pengukuran.get_data', ['id' => $pengukuran_1->id]) }}">
            <i class="fa fa-pencil text-lg"></i>
        </a>
        <a href="javascript:;" class="  text-danger font-weight-bold text-xs mt-2 deletepengukuran"
            data-toggle="tooltip" data-original-title="Edit pengukuran" data-id="{{ $pengukuran_1->id }}"
            data-route="{{ route('pengukuran.delete', ['id' => $pengukuran_1->id]) }}">
            <i class="fa fa-trash text-lg"></i>
        </a>
    </td>
</tr>
@endforeach