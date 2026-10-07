<div class="mb-3">
    <label for="nama_kategori" class="form-label">Nama Kategori</label>
    <input type="text"
           name="nama_kategori"
           id="nama_kategori"
           class="form-control @error('nama_kategori') is-invalid @enderror"
           value="{{ old('nama_kategori', $kategori->nama_kategori ?? '') }}"
           required>

    @error('nama_kategori')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror

    <div class="form-text">Slug akan dibuat otomatis dari nama kategori.</div>
</div>

<div class="mb-3">
    <label for="deskripsi" class="form-label">
        Deskripsi <span class="text-secondary">(opsional)</span>
    </label>
    <textarea name="deskripsi"
              id="deskripsi"
              rows="3"
              class="form-control">{{ old('deskripsi', $kategori->deskripsi ?? '') }}</textarea>
</div>
