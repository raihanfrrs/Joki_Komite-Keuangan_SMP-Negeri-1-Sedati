<div class="d-flex justify-content-center">
    <a href="{{ route('admin.news.edit', $model->id) }}" target="_blank" class="btn btn-sm btn-warning me-2">Ubah</a>
    <a href="{{ route('admin.news.show', $model->id) }}" target="_blank" class="btn btn-sm btn-success me-2">Rincian</a>
    <form action="{{ route('admin.news.destroy', $model->id) }}" class="d-inline" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-sm btn-danger me-2">Hapus</button>
    </form>
</div>