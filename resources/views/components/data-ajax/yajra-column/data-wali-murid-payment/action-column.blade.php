<div class="d-flex justify-content-center">
    @if ($model->status == 'pending')
        <a href="{{ route('wali.murid.payment.edit', $model->id) }}" target="_blank" class="text-warning"><i class="ti ti-pencil ti-sm mx-1"></i></a>
    @endif
    <a href="{{ route('wali.murid.payment.show', $model->id) }}" target="_blank" class="text-success"><i class="ti ti-eye ti-sm mx-1"></i></a>
    @if ($model->status == 'pending')
        <form action="{{ route('wali.murid.payment.destroy', $model->id) }}" class="d-inline form-delete-wali-murid-payment-{{ $model->id }}" method="POST">
            @csrf
            @method('DELETE')
            <a href="javascript:;" class="me-2 text-danger bg-transparent border-0" id="button-delete-wali-murid-payment" data-id="{{ $model->id }}"><i class="ti ti-trash ti-sm"></i></a>
        </form>
    @endif
</div>