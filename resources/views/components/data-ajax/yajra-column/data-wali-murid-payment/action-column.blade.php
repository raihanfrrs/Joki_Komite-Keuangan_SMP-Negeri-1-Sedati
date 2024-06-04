<div class="d-flex justify-content-center">
    @if ($model->status == 'pending')
        <a href="{{ route('wali.murid.payment.edit', $model->id) }}" target="_blank" class="btn btn-sm btn-warning me-2">Ubah</a>
    @endif
    <a href="{{ route('wali.murid.payment.show', $model->id) }}" target="_blank" class="btn btn-sm btn-success me-2">Rincian</a>
    @if ($model->status == 'pending')
        <form action="{{ route('wali.murid.payment.destroy', $model->id) }}" class="d-inline" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger me-2">Hapus</button>
        </form>
    @endif
</div>