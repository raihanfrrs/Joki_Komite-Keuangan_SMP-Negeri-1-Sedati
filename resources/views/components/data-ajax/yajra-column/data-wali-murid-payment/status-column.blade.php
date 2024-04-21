@if ($model->status == 'approve')
    <span class="badge bg-label-success me-1">Disetujui</span>
@elseif ($model->status == 'decline')
    <span class="badge bg-label-danger me-1">Ditolak</span>
@endif