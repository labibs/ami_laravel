<!-- resources/views/users/partials/users_table.blade.php -->

@foreach ($fakultass as $fakultas)
<tr>
    <td>
        <div class="d-flex px-2 py-1">
            <div>
                <img src="../storage/images/{{ $fakultas->avatar ?: 'togaa.png' }}" class="avatar avatar-sm me-3"
                    alt="user1">
            </div>
            <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-sm">{{ $fakultas->name }}</h6>

            </div>
        </div>
    </td>
    <td>
        <p class="text-xs font-weight-bold mb-0">
            {{ $fakultas->dekan }}</p>

    </td>
    <td class="align-middle text-center">
        <form action="{{ route('users.updateActive', ['id' => $fakultas->id]) }}" method="POST"
            class="form-check form-switch d-flex justify-content-center align-items-center">
            @csrf
            @method('PUT')

            <input class="form-check-input" type="checkbox" id="rememberMe" name="active"
                {{ $fakultas->active == 'Ya' ? 'checked' : '' }} onchange="this.form.submit()">
        </form>
    </td>

    <td class="align-middle text-center">
        <a href="javascript:;" class="btn btn-sm btn-warning text-dark font-weight-bold text-xs mt-2 editFakultas"
            data-toggle="tooltip" data-original-title="Edit Fakultas" data-bs-toggle="modal"
            data-bs-target="#editFakultasModal" data-id="{{ $fakultas->id }}"
            data-route="{{ route('fakultass.get_data', ['id' => $fakultas->id]) }}">
            <i class="fa fa-pencil text-lg"></i>
        </a>
        <a href="javascript:;" class="btn btn-sm btn-danger text-dark font-weight-bold text-xs mt-2 deleteFakultas"
            data-toggle="tooltip" data-original-title="Delete Fakultas" data-id="{{ $fakultas->id }}"
            data-route="{{ route('users.delete', ['id' => $fakultas->id]) }}">
            <i class="fa fa-trash text-lg"></i>
        </a>
    </td>
</tr>
@endforeach