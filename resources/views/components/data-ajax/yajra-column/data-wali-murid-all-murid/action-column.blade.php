<div class="d-flex justify-content-center">
    <a href="{{ route('wali.murid.class.edit', $model->id) }}" target="_blank" class="text-warning"><i class="ti ti-pencil ti-sm mx-1"></i></a>
    <form action="{{ route('wali.murid.class.destroy', $model->id) }}" class="d-inline form-delete-wali-murid-all-murid-{{ $model->id }}" method="POST">
        @csrf
        @method('DELETE')
        <a href="javascript:;" class="me-2 text-danger bg-transparent border-0" id="button-delete-wali-murid-all-murid" data-id="{{ $model->id }}"><i class="ti ti-trash ti-sm"></i></a>
    </form>
</div>