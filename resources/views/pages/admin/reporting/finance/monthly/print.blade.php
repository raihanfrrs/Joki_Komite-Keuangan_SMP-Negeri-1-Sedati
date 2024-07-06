@extends('layouts.main')

@section('title')
    Rekap - Keuangan Bulanan - Print
@endsection

@section('section-print')
<table class="table m-0">
    <thead class="table-light">
        <tr>
            <th>No</th>
            <th>Wali Murid</th>
            <th>Kelas</th>
            <th>Nama</th>
            <th>Keperluan</th>
            <th>Tgl. Pembayaran</th>
            <th>Nominal</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($payments as $item)
        <tr>
            <td class="text-nowrap">{{ $loop->iteration }}</td>
            <td class="text-nowrap text-capitalize">{{ $item->wali_murid->name }}</td>
            <td class="text-nowrap">{{ $item->wali_murid->kelas->name }}</td>
            <td class="text-capitalize">{{ $item->name }}</td>
            <td class="text-capitalize">{{ $item->necessity }}</td>
            <td class="text-capitalize">{{ $item->date }}</td>
            <td class="text-nowrap">@rupiah($item->nominal)</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="5" class="align-top px-4 py-3"></td>
            <td class="text-start">
                <p class="mb-0 pb-3">Total Nominal:</p>
            </td>
            <td>
                <p class="fw-semibold mb-0 pb-3">@rupiah($payments->sum('nominal'))</p>
            </td>
        </tr>
    </tbody>
</table>
@endsection