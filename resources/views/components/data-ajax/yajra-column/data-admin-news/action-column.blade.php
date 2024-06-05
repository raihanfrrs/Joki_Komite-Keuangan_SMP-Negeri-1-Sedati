<div class="d-flex justify-content-center">
    <a href="{{ route('admin.news.edit', $model->id) }}" target="_blank" class="text-warning"><i class="ti ti-pencil ti-sm mx-1"></i></a>
    <a href="{{ route('admin.news.show', $model->id) }}" target="_blank" class="text-success"><i class="ti ti-eye ti-sm mx-1"></i></a>
    <form action="{{ route('admin.news.destroy', $model->id) }}" class="d-inline form-delete-admin-news-{{ $model->id }}" method="POST">
        @csrf
        @method('DELETE')
        <a href="javascript:;" class="me-2 text-danger bg-transparent border-0" id="button-delete-admin-news" data-id="{{ $model->id }}"><i class="ti ti-trash ti-sm"></i></a>
    </form>
</div>