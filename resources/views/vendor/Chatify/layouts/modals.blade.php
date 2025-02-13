<style>
    .a-btn-secondary {
    background-color: #b0b0b0; /* Warna abu-abu */
    color: white; /* Warna teks */
    padding: 8px 16px; /* Ukuran padding */
    border-radius: 4px; /* Membuat sudut sedikit melengkung */
    text-decoration: none; /* Menghilangkan underline */
    display: inline-block;
}
    .a-btn-danger {
    background-color: #f44a4a; 
    color: white; 
    padding: 8px 16px; 
    border-radius: 4px; 
    text-decoration: none; 
    display: inline-block;
}
    .a-btn-success {
    background-color: #f44a4a; /* Warna abu-abu */
    color: white; /* Warna teks */
    padding: 8px 16px; /* Ukuran padding */
    border-radius: 4px; /* Membuat sudut sedikit melengkung */
    text-decoration: none; /* Menghilangkan underline */
    display: inline-block;
}

.a-btn-secondary:hover {
    background-color: #9a9a9a; /* Warna abu-abu lebih gelap saat hover */
}

</style>
{{-- ---------------------- Image modal box ---------------------- --}}
<div id="imageModalBox" class="imageModal">
    <span class="imageModal-close">&times;</span>
    <img class="imageModal-content" id="imageModalBoxSrc">
  </div>

  {{-- ---------------------- Delete Modal ---------------------- --}}
  <div class="app-modal" data-name="delete">
      <div class="app-modal-container">
          <div class="app-modal-card" data-name="delete" data-modal='0'>
              <div class="app-modal-header">Apakah Anda Ingin Menghapus Dokumen chat ini?</div>
              <div class="app-modal-body">Anda bisa membatalkan aksi ini</div>
              <div class="app-modal-footer">
                <a href="javascript:void(0)" class="app-btn a-btn-secondary cancel">Cancel</a>
                  <a href="javascript:void(0)" class="app-btn a-btn-danger delete">Hapus</a>
              </div>
          </div>
      </div>
  </div>
  {{-- ---------------------- Alert Modal ---------------------- --}}
  <div class="app-modal" data-name="alert">
      <div class="app-modal-container">
          <div class="app-modal-card" data-name="alert" data-modal='0'>
              <div class="app-modal-header"></div>
              <div class="app-modal-body"></div>
              <div class="app-modal-footer">
                  <a href="javascript:void(0)" class="app-btn cancel">Cancel</a>
              </div>
          </div>
      </div>
  </div>
  {{-- ---------------------- Settings Modal ---------------------- --}}
  <div class="app-modal" data-name="settings">
      <div class="app-modal-container">
          <div class="app-modal-card" data-name="settings" data-modal='0'>
              <form id="update-settings" action="{{ route('avatar.update') }}" enctype="multipart/form-data" method="POST">
                  @csrf
                  {{-- <div class="app-modal-header">Update your profile settings</div> --}}
                  <div class="app-modal-body">
                      {{-- Udate profile avatar --}}
                      <div class="avatar av-l upload-avatar-preview chatify-d-flex"
                      style="background-image: url('{{ Chatify::getUserWithAvatar(Auth::user())->avatar }}');"
                      ></div>
                      <p class="upload-avatar-details"></p>
                      <label class="app-btn a-btn-primary update" style="background-color:{{$messengerColor}}">
                        Update Gambar baru
                          <input type="file" name="attachments[]" id="fileInput" multiple accept="image/*, video/*">
                      </label>
                      {{-- Dark/Light Mode  --}}
                      <p class="divider"></p>
                      <p class="app-modal-header">Dark Mode <span class="
                        {{ Auth::user()->dark_mode > 0 ? 'fas' : 'far' }} fa-moon dark-mode-switch"
                         data-mode="{{ Auth::user()->dark_mode > 0 ? 1 : 0 }}"></span></p>
                      {{-- change messenger color  --}}
                      <p class="divider"></p>
                      {{-- <p class="app-modal-header">Change {{ config('chatify.name') }} Color</p> --}}
                      <div class="update-messengerColor">
                      @foreach (config('chatify.colors') as $color)
                        <span style="background-color: {{ $color}}" data-color="{{$color}}" class="color-btn"></span>
                        @if (($loop->index + 1) % 5 == 0)
                            <br/>
                        @endif
                      @endforeach
                      </div>
                  </div>
                  <div class="app-modal-footer">
                      <a href="javascript:void(0)" class="app-btn a-btn-secondary cancel">Batal</a>
                      <input type="submit" class="app-btn a-btn-success update" value="Simpan" />
                  </div>
              </form>
          </div>
      </div>
  </div>
