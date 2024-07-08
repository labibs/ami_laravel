<!-- resources/views/users/partials/users_table.blade.php -->

@foreach ($standar as $standar_1)
<tr>
    <td class="align-middle text-center">
        <div class="d-flex px-2 py-1">
            <div>
                <!-- <img src="../storage/images/{{ $standar_1->avatar ?: 'togaa.png' }}" class="avatar avatar-sm me-3"
                    alt="user1"> -->
            </div>
            <div class="d-flex flex-column text-center">
                <h6 class="mb-0 text-sm">{{ $standar_1->kode }}</h6>

            </div>
        </div>
    </td>
    <td>
        <p class="text-xs font-weight-bold mb-0">
            {{ $standar_1->name }}</p>

    </td>
    <td class="align-middle text-center">
        <form action="{{ route('standar.updateActive', ['id' => $standar_1->id]) }}" method="POST"
            class="form-check form-switch d-flex justify-content-center align-items-center">
            @csrf
            @method('PUT')

            <input class="form-check-input" type="checkbox" id="rememberMe" name="active"
                {{ $standar_1->active == 'Ya' ? 'checked' : '' }} onchange="this.form.submit()">
        </form>
    </td>

    <td class="align-middle text-center">
        <a href="javascript:;" class="btn btn-sm btn-warning text-dark font-weight-bold text-xs mt-2 editstandar"
            data-toggle="tooltip" data-original-title="Edit standar" data-bs-toggle="modal"
            data-bs-target="#editstandarModal" data-id="{{ $standar_1->id }}"
            data-route="{{ route('standar.get_data', ['id' => $standar_1->id]) }}">
            <i class="fa fa-pencil text-lg"></i>
        </a>
        <a href="javascript:;" class="btn btn-sm btn-danger text-dark font-weight-bold text-xs mt-2 deletestandar"
            data-toggle="tooltip" data-original-title="Delete standar" data-id="{{ $standar_1->id }}"
            data-route="{{ route('standar.delete', ['id' => $standar_1->id]) }}">
            <i class="fa fa-trash text-lg"></i>
        </a>
    </td>
</tr>
@endforeach