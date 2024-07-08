<!-- resources/views/users/partials/users_table.blade.php -->

@foreach ($siklus as $siklus_1)
<tr>
    <td>
        <div class="d-flex px-2 py-1">
            <div>
                <!-- <img src="../storage/images/{{ $siklus_1->avatar ?: 'togaa.png' }}" class="avatar avatar-sm me-3"
                    alt="user1"> -->
            </div>
            <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-sm">{{ $siklus_1->name }}</h6>

            </div>
        </div>
    </td>
    <td>
        <p class="text-xs font-weight-bold mb-0">
            {{ $siklus_1->description }}</p>

    </td>
    <td class="align-middle text-center">
        <form action="{{ route('siklus.updateActive', ['id' => $siklus_1->id]) }}" method="POST"
            class="form-check form-switch d-flex justify-content-center align-items-center">
            @csrf
            @method('PUT')

            <input class="form-check-input" type="checkbox" id="rememberMe" name="active"
                {{ $siklus_1->active == 'Ya' ? 'checked' : '' }} onchange="this.form.submit()">
        </form>
    </td>

    <td class="align-middle text-center">
        <a href="javascript:;" class="btn btn-sm btn-warning text-dark font-weight-bold text-xs mt-2 editsiklus"
            data-toggle="tooltip" data-original-title="Edit siklus" data-bs-toggle="modal"
            data-bs-target="#editsiklusModal" data-id="{{ $siklus_1->id }}"
            data-route="{{ route('siklus.get_data', ['id' => $siklus_1->id]) }}">
            <i class="fa fa-pencil text-lg"></i>
        </a>
        <a href="javascript:;" class="btn btn-sm btn-danger text-dark font-weight-bold text-xs mt-2 deletesiklus"
            data-toggle="tooltip" data-original-title="Delete siklus" data-id="{{ $siklus_1->id }}"
            data-route="{{ route('siklus.delete', ['id' => $siklus_1->id]) }}">
            <i class="fa fa-trash text-lg"></i>
        </a>
    </td>
</tr>
@endforeach