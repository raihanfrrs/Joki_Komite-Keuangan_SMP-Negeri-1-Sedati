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
            <input type="file" name="file" id="file" class="form-control">
            <button type="submit" class="btn btn-primary mt-2">Import</button>
          </form>
        </div>
      </div>
    </div>
</div>