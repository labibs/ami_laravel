<!-- resources/views/targets/partials/targets_table.blade.php -->

@foreach ($target as $target_1)
<tr>
    <td>
        <div class="d-flex px-2 py-1">

            <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-sm">{{ optional($target_1->audity)->name }}
                    {{ optional($target_1->audity->fakultas)->name }}</h6>

            </div>
        </div>
    </td>
    <td>
        <p class="text-xs font-weight-bold mb-0">
            {{ $target_1->indikator->standar->kode }}. {{ $target_1->indikator->standar->name }}
            {{ $target_1->indikator->kode }}.
            {{ $target_1->indikator->indikator }}
        </p>

    </td>
    <td>
        <p class="text-xs font-weight-bold mb-0">
            {{ $target_1->tahun }}
        </p>

    </td>
    <td>
        <p class="text-xs font-weight-bold mb-0">
            {{ $target_1->value }}
        </p>

    </td>
    <td class="align-middle text-center">
        <form action="{{ route('target.updateActive', ['id' => $target_1->id]) }}" method="POST"
            class="form-check form-switch d-flex justify-content-center align-items-center">
            @csrf
            @method('PUT')

            <input class="form-check-input" type="checkbox" id="rememberMe" name="active"
                {{ $target_1->active == 'Ya' ? 'checked' : '' }} onchange="this.form.submit()">
        </form>
    </td>
    <td class="align-middle text-center">
        <a href="javascript:;" class=" text-warning font-weight-bold text-xs mt-2 editTarget" data-toggle="tooltip"
            data-original-title="Edit target" data-bs-toggle="modal" data-bs-target="#editTargetModal"
            data-id="{{ $target_1->id }}" data-route="{{ route('target.get_data', ['id' => $target_1->id]) }}">
            <i class="fa fa-pencil text-lg"></i>
        </a>
        <a href="javascript:;" class="  text-danger font-weight-bold text-xs mt-2 deleteTarget" data-toggle="tooltip"
            data-original-title="Edit target" data-id="{{ $target_1->id }}"
            data-route="{{ route('target.delete', ['id' => $target_1->id]) }}">
            <i class="fa fa-trash text-lg"></i>
        </a>
    </td>
</tr>
@endforeach