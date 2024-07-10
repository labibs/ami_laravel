<!-- resources/views/pengukurans/partials/pengukurans_table.blade.php -->

@foreach ($pengukuran as $pengukuran_1)
<tr>
    <td>
        <div class="d-flex px-2 py-1">

            <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-sm">{{ optional($pengukuran_1->audity)->name }}
                    {{ optional($pengukuran_1->audity->fakultas)->name }}</h6>

            </div>
        </div>
    </td>
    <td>
        <p class="text-xs font-weight-bold mb-0">
            {{ $pengukuran_1->indikator->standar->kode }}. {{ $pengukuran_1->indikator->standar->name }}
            {{ $pengukuran_1->indikator->kode }}.
            {{ $pengukuran_1->indikator->indikator }}
        </p>

    </td>
    <td>
        <p class="text-xs font-weight-bold mb-0">
            {{ $pengukuran_1->tahun }}
        </p>

    </td>
    <td>
        <p class="text-xs font-weight-bold mb-0">
            {{ $pengukuran_1->value }}
        </p>

    </td>
    <td class="align-middle text-center">
        <form action="{{ route('pengukuran.updateActive', ['id' => $pengukuran_1->id]) }}" method="POST"
            class="form-check form-switch d-flex justify-content-center align-items-center">
            @csrf
            @method('PUT')

            <input class="form-check-input" type="checkbox" id="rememberMe" name="active"
                {{ $pengukuran_1->active == 'Ya' ? 'checked' : '' }} onchange="this.form.submit()">
        </form>
    </td>
    <td class="align-middle text-center">
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