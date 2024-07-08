<!-- resources/views/users/partials/users_table.blade.php -->

@foreach ($fakultas as $fakultas_1)
<tr>
    <td>
        <div class="d-flex px-2 py-1">
            <div>
                <img src="../storage/images/{{ $fakultas_1->avatar ?: 'togaa.png' }}" class="avatar avatar-sm me-3"
                    alt="user1">
            </div>
            <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-sm">{{ $fakultas_1->name }}</h6>
                <p class="text-xs text-secondary mb-0">{{ $fakultas_1->description }}</p>
            </div>
        </div>
    </td>
    <td>
        <p class="text-xs font-weight-bold mb-0">
            {{ $fakultas_1->dekan }}</p>

    </td>
    <td class="align-middle text-center">
        <form action="{{ route('fakultas.updateActive', ['id' => $fakultas_1->id]) }}" method="POST"
            class="form-check form-switch d-flex justify-content-center align-items-center">
            @csrf
            @method('PUT')

            <input class="form-check-input" type="checkbox" id="rememberMe" name="active"
                {{ $fakultas_1->active == 'Ya' ? 'checked' : '' }} onchange="this.form.submit()">
        </form>
    </td>

    <td class="align-middle text-center">
        <a href="javascript:;" class="btn btn-sm btn-warning text-dark font-weight-bold text-xs mt-2 editFakultas"
            data-toggle="tooltip" data-original-title="Edit Fakultas" data-bs-toggle="modal"
            data-bs-target="#editFakultasModal" data-id="{{ $fakultas_1->id }}"
            data-route="{{ route('fakultas.get_data', ['id' => $fakultas_1->id]) }}">
            <i class="fa fa-pencil text-lg"></i>
        </a>
        <a href="javascript:;" class="btn btn-sm btn-danger text-dark font-weight-bold text-xs mt-2 deleteFakultas"
            data-toggle="tooltip" data-original-title="Delete Fakultas" data-id="{{ $fakultas_1->id }}"
            data-route="{{ route('fakultas.delete', ['id' => $fakultas_1->id]) }}">
            <i class="fa fa-trash text-lg"></i>
        </a>
    </td>
</tr>
@endforeach