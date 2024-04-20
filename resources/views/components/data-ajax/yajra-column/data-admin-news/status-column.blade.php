@if ($model->status === 'draft')
    <span class="badge bg-label-secondary me-1 rounded-pill">Unpublished</span>
@elseif ($model->status === 'published')
    <span class="badge bg-label-success me-1 rounded-pill">Published</span>
@endif