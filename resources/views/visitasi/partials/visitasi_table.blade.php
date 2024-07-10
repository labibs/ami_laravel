<!-- resources/views/visitasis/partials/visitasis_table.blade.php -->

@foreach ($visitasi as $visitasi_1)
<tr>
    <td>
        <div class="d-flex px-2 py-1">

            <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-sm">{{ optional($visitasi_1->audity)->name }}
                    {{ optional($visitasi_1->audity->fakultas)->name }}</h6>

            </div>
        </div>
    </td>
    <td>
        <p class="text-xs font-weight-bold mb-0">
            {{ $visitasi_1->indikator->standar->kode }}. {{ $visitasi_1->indikator->standar->name }}
            {{ $visitasi_1->indikator->kode }}.
            {{ $visitasi_1->indikator->indikator }}
        </p>

    </td>
    <td>
        <p class="text-xs font-weight-bold mb-0">
            {{ $visitasi_1->tahun }}
        </p>

    </td>
    <td>
        <p class="text-xs font-weight-bold mb-0">
            {{ $visitasi_1->value }}
        </p>

    </td>
    <td class="align-middle text-center">
        <form action="{{ route('visitasi.updateActive', ['id' => $visitasi_1->id]) }}" method="POST"
            class="form-check form-switch d-flex justify-content-center align-items-center">
            @csrf
            @method('PUT')

            <input class="form-check-input" type="checkbox" id="rememberMe" name="active"
                {{ $visitasi_1->active == 'Ya' ? 'checked' : '' }} onchange="this.form.submit()">
        </form>
    </td>
    <td class="align-middle text-center">
        <a href="javascript:;" class=" text-warning font-weight-bold text-xs mt-2 editvisitasi" data-toggle="tooltip"
            data-original-title="Edit visitasi" data-bs-toggle="modal" data-bs-visitasi="#editvisitasiModal"
            data-id="{{ $visitasi_1->id }}" data-route="{{ route('visitasi.get_data', ['id' => $visitasi_1->id]) }}">
            <i class="fa fa-pencil text-lg"></i>
        </a>
        <a href="javascript:;" class="  text-danger font-weight-bold text-xs mt-2 deletevisitasi" data-toggle="tooltip"
            data-original-title="Edit visitasi" data-id="{{ $visitasi_1->id }}"
            data-route="{{ route('visitasi.delete', ['id' => $visitasi_1->id]) }}">
            <i class="fa fa-trash text-lg"></i>
        </a>
    </td>
</tr>
@endforeach