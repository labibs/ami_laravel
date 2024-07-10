<!-- resources/views/users/partials/users_table.blade.php -->

@foreach ($users as $user)
<tr>
    <td>
        <div class="d-flex px-2 py-1">
            <div>
                <img src="../storage/images/{{ $user->avatar ?: 'togaa.png' }}" class="avatar avatar-sm me-3"
                    alt="user1">
            </div>
            <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-sm">{{ $user->ketua_grup }}</h6>
                <p class="text-xs text-secondary mb-0">{{ $user->email }}</p>
            </div>
        </div>
    </td>
    <td>
        <p class="text-xs font-weight-bold mb-0">
            {{ $user->jabatan }} {{ optional($user->audity)->name }}
        </p>

    </td>
    <td>
        <p class="text-xs font-weight-bold mb-0">
            {{ optional($user->fakultas)->name }}
        </p>

    </td>
    <td class="align-middle text-center">
        <span class="text-secondary text-xs font-weight-bold">{{ $user->hak_akses }}</span>
    </td>
    <td class="align-middle text-center">
        <form action="{{ route('akun.updateActive', ['id' => $user->id]) }}" method="POST"
            class="form-check form-switch d-flex justify-content-center align-items-center">
            @csrf
            @method('PUT')

            <input class="form-check-input" type="checkbox" id="rememberMe" name="active"
                {{ $user->active == 'Ya' ? 'checked' : '' }} onchange="this.form.submit()">
        </form>
    </td>
    <td class="align-middle text-center">
        <a href="javascript:;"
            class="btn btn-sm btn-outline-secondary text-secondary font-weight-bold text-xs mt-2 editUser"
            data-toggle="tooltip" data-original-title="Edit user" data-bs-toggle="modal" data-bs-target="#editUserModal"
            data-id="{{ $user->id }}" data-route="{{ route('akun.get_data', ['id' => $user->id]) }}">
            <i class="fa fa-pencil text-lg"></i>
        </a>
        <a href="javascript:;" class="btn btn-sm btn-outline-dark text-dark font-weight-bold text-xs mt-2 deleteUser"
            data-toggle="tooltip" data-original-title="Edit user" data-id="{{ $user->id }}"
            data-route="{{ route('akun.delete', ['id' => $user->id]) }}">
            <i class="fa fa-trash text-lg"></i>
        </a>
    </td>
</tr>
@endforeach