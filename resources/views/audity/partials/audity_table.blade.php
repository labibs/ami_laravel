<!-- resources/views/users/partials/users_table.blade.php -->

@foreach ($audity as $audity_1)
<tr>
    <td>
        <div class="d-flex px-2 py-1">
            <div>
                <!-- <img src="../storage/images/{{ $audity_1->avatar ?: 'togaa.png' }}" class="avatar avatar-sm me-3"
                    alt="user1"> -->
            </div>
            <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-sm">{{ $audity_1->name }}</h6>

            </div>
        </div>
    </td>
    <td>
        <p class="text-xs font-weight-bold mb-0">
            {{ $audity_1->fakultas->name }}</p>

    </td>
    <td class="align-middle text-center">
        <form action="{{ route('audity.updateActive', ['id' => $audity_1->id]) }}" method="POST"
            class="form-check form-switch d-flex justify-content-center align-items-center">
            @csrf
            @method('PUT')

            <input class="form-check-input" type="checkbox" id="rememberMe" name="active"
                {{ $audity_1->active == 'Ya' ? 'checked' : '' }} onchange="this.form.submit()">
        </form>
    </td>

    <td class="align-middle text-center">
        <a href="javascript:;"
            class="btn btn-sm btn-outline-secondary text-secondary font-weight-bold text-xs mt-2 editaudity"
            data-toggle="tooltip" data-original-title="Edit siklus" data-bs-toggle="modal"
            data-bs-target="#editaudityModal" data-id="{{ $audity_1->id }}"
            data-route="{{ route('audity.get_data', ['id' => $audity_1->id]) }}">
            <i class="fa fa-pencil text-lg"></i>
        </a>
        <a href="javascript:;" class="btn btn-sm btn-outline-dark text-dark font-weight-bold text-xs mt-2 deleteaudity"
            data-toggle="tooltip" data-original-title="Delete siklus" data-id="{{ $audity_1->id }}"
            data-route="{{ route('audity.delete', ['id' => $audity_1->id]) }}">
            <i class="fa fa-trash text-lg"></i>
        </a>
    </td>
</tr>
@endforeach