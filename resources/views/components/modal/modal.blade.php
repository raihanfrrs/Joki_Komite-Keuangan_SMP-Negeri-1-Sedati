<div class="modal fade" id="importMuridModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3 class="mb-2">Import Daftar Murid</h3>
          </div>
          <form action="{{ route('wali.murid.import.murid') }}" class="d-inline" method="POST" enctype="multipart/form-data">
            @csrf
            <span class="text-danger d-block"><sup>*</sup>Data Sebelumnya Akan Di Timpa</span>
            <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror" accept=".xls,.xlsx,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required>
            <span class="text-danger">@error('file') {{ $message }} @enderror</span>
            <button type="submit" class="btn btn-primary mt-2">Import</button>
          </form>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="importWaliMuridModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3 class="mb-2">Import Daftar Wali Murid</h3>
          </div>
          <form action="{{ route('admin.master.wali-murid.import-wali-murid') }}" class="d-inline" method="POST" enctype="multipart/form-data">
            @csrf
            <span class="text-danger d-block"><sup>*</sup>Data Sebelumnya Akan Di Timpa</span>
            <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror" accept=".xls,.xlsx,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required>
            <span class="text-danger">@error('file') {{ $message }} @enderror</span>
            <button type="submit" class="btn btn-primary mt-2">Import</button>
          </form>
        </div>
      </div>
    </div>
</div>