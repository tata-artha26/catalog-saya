<div class="row">

    <div class="col-md-8">

        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" name="nama_produk" id="nama_produk"
                   class="form-control @error('nama_produk') is-invalid @enderror"
                   value="{{ old('nama_produk', $produk->nama_produk ?? '') }}" required>
            @error('nama_produk') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="kategori_id" class="form-label">Kategori</label>
            <select name="kategori_id" id="kategori_id"
                    class="form-select @error('kategori_id') is-invalid @enderror" required>
                <option value="">— Pilih Kategori —</option>

                @foreach ($daftarKategori as $kategori)
                    <option value="{{ $kategori->id }}"
                        {{ old('kategori_id', $produk->kategori_id ?? '') == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama_kategori }}
                    </option>
                @endforeach

            </select>
            @error('kategori_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="harga" class="form-label">Harga (Rp)</label>
                <input type="number" name="harga" id="harga"
                       class="form-control @error('harga') is-invalid @enderror"
                       value="{{ old('harga', $produk->harga ?? '') }}" required>
                @error('harga') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="harga_coret" class="form-label">
                    Harga Coret <span class="text-secondary">(opsional)</span>
                </label>
                <input type="number" name="harga_coret" id="harga_coret"
                       class="form-control @error('harga_coret') is-invalid @enderror"
                       value="{{ old('harga_coret', $produk->harga_coret ?? '') }}">
                @error('harga_coret') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" name="stok" id="stok" class="form-control"
                       value="{{ old('stok', $produk->stok ?? 0) }}" required>
            </div>

            <div class="col-md-4 mb-3">
                <label for="berat" class="form-label">Berat (gram)</label>
                <input type="number" name="berat" id="berat" class="form-control"
                       value="{{ old('berat', $produk->berat ?? 0) }}" required>
            </div>

            <div class="col-md-4 mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select" required>
                    <option value="aktif"
                        {{ old('status', $produk->status ?? 'aktif') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="nonaktif"
                        {{ old('status', $produk->status ?? '') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label for="kode_produk" class="form-label">
                Kode Produk <span class="text-secondary">(opsional)</span>
            </label>
            <input type="text" name="kode_produk" id="kode_produk" class="form-control"
                   value="{{ old('kode_produk', $produk->kode_produk ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="4"
                      class="form-control">{{ old('deskripsi', $produk->deskripsi ?? '') }}</textarea>
        </div>

    </div>

    <div class="col-md-4">
        <label for="gambar" class="form-label">Gambar Produk</label>

        @if (! empty($produk->gambar))
            <div class="border rounded p-2 mb-2 text-center bg-body-secondary">
                <img src="{{ asset('storage/' . $produk->gambar) }}"
                     class="img-fluid rounded" style="max-height:220px"
                     alt="{{ $produk->nama_produk }}">
                <p class="text-secondary mb-0 mt-2">Gambar saat ini</p>
            </div>
        @endif

        <input type="file" name="gambar" id="gambar"
               class="form-control @error('gambar') is-invalid @enderror"
               accept="image/*">
        @error('gambar') <div class="invalid-feedback">{{ $message }}</div> @enderror

        <div class="form-text">
            Format JPG, PNG, atau WEBP. Maksimal 2 MB.
            @isset($produk)
                <br>Kosongkan bila tidak ingin mengganti gambar.
            @endisset
        </div>
    </div>

</div>
