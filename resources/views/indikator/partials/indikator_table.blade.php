<!-- resources/views/users/partials/users_table.blade.php -->

@foreach ($indikator as $indikator_1)
<tr>
    <td>
        <div class="d-flex px-2 py-1">
            <div>
                <!-- <img src="../storage/images/{{ $indikator_1->avatar ?: 'togaa.png' }}" class="avatar avatar-sm me-3"
                    alt="user1"> -->
            </div>
            <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-sm">{{ $indikator_1->kode}}</h6>
                <p class="text-xs text-secondary mb-0">
                    {{ $indikator_1->standar->name  }}</p>
            </div>
        </div>
    </td>
    <td>
        <p class="text-xs text-secondary mb-0">
            {{ $indikator_1->indikator}}</p>
    </td>
    <td>
        <p class="text-xs text-secondary mb-0">
            {{ $indikator_1->rujukan_paps}}</p>
    </td>
    <td>
        <p class="text-xs text-secondary mb-0">
            {{ $indikator_1->rujukan_papt}}</p>
    </td>
    <td>
        <p class="text-xs text-secondary mb-0 text-center">
            {{ $indikator_1->dokumen}}</p>
    </td>
    <td>
        <p class="text-xs text-secondary mb-0">
            {{ $indikator_1->audity}}</p>
    </td>
    <td>
        <p class="text-xs text-secondary mb-0">
            {{ $indikator_1->pemangku_kepentingan}}</p>
    </td>

    <td class="align-middle text-end">
        <form action="{{ route('indikator.updateActive', ['id' => $indikator_1->id]) }}" method="POST"
            class="form-check form-switch d-flex justify-content-center align-items-center">
            @csrf
            @method('PUT')

            <input class="form-check-input" type="checkbox" id="rememberMe" name="active"
                {{ $indikator_1->active == 'Ya' ? 'checked' : '' }} onchange="this.form.submit()">
        </form>
    </td>

    <td class="align-middle text-center">
        <a href="javascript:;" class=" text-dark font-weight-bold text-xs editIndikator text-center"
            data-toggle="tooltip" data-original-title="Edit user" data-bs-toggle="modal"
            data-bs-target="#editIndikatorModal" data-id="{{ $indikator_1->id }}"
            data-route="{{ route('indikator.get_data', ['id' => $indikator_1->id]) }}">
            <i class="fa fa-pencil text-lg text-warning "></i>
        </a>
        <a href="javascript:;" class=" text-dark font-weight-bold text-xs deleteIndikator" data-toggle="tooltip"
            data-original-title="Edit user" data-id="{{ $indikator_1->id }}"
            data-route="{{ route('indikator.delete', ['id' => $indikator_1->id]) }}">
            <i class="fa fa-trash text-lg text-danger"></i>
        </a>
        <a href="javascript:;" class=" text-dark font-weight-bold text-xs viewIndikator" data-toggle="tooltip"
            data-original-title="View Indikator" data-original-title="View Indikator" data-bs-toggle="modal"
            data-bs-target="#viewIndikatorModal" data-id="{{ $indikator_1->id }}"
            data-route="{{ route('indikator.get_data', ['id' => $indikator_1->id]) }}">
            <i class="fa fa-eye text-lg text-info"></i>
        </a>
    </td>
</tr>
@endforeach