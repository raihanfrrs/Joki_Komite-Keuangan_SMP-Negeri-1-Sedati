@php
use App\Models\News;
use Carbon\Carbon;

    News::whereDate('date', Carbon::today())
                    ->orWhereDate('date', '<', Carbon::today())
                    ->update(['status' => 'published']);
@endphp