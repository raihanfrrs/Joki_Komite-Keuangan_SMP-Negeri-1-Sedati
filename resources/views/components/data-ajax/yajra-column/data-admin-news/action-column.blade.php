<div class="d-flex justify-content-center">
    <a href="{{ route('admin.news.edit', $model->id) }}" target="_blank" class="text-warning"><i class="ti ti-pencil ti-sm mx-1"></i></a>
    <a href="{{ route('admin.news.show', $model->id) }}" target="_blank" class="text-success"><i class="ti ti-eye ti-sm mx-1"></i></a>
    <form action="{{ route('admin.news.destroy', $model->id) }}" class="d-inline" method="POST">
        @csrf
        @method('DELETE')
        <button class="me-2 text-danger bg-transparent border-0"><i class="ti ti-trash ti-sm"></i></button>
    </form>
</div>