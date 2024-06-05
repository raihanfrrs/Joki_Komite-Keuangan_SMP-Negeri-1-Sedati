<div class="d-flex justify-content-center">
    <a href="{{ route('wali.murid.class.edit', $model->id) }}" target="_blank" class="text-warning"><i class="ti ti-pencil ti-sm mx-1"></i></a>
    <form action="{{ route('wali.murid.class.destroy', $model->id) }}" class="d-inline" method="POST">
        @csrf
        @method('DELETE')
        <button class="me-2 text-danger bg-transparent border-0"><i class="ti ti-trash ti-sm"></i></button>
    </form>
</div>