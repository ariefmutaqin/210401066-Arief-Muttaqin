<form action="{{ route('transaksi.update',$transaksi->id) }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label>NIM Mahasiswa</label>
                    <input type="text" placeholder="masukkan nim" disabled name="nim"class="form-control" autocomplete="off" value="{{ $transaksi->anggota->nim }}">
                    @error('nim')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Buku</label>

                    <input type="text" placeholder="masukkan nim" disabled name="buku_id"class="form-control" autocomplete="off" value="{{ $transaksi->buku->judul }}">
    
                    @error('buku_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Tanggal Pinjam</label>
                    <input type="date" disabled name="tgl_pinjam"class="form-control" value="{{ $transaksi->tgl_pinjam }}">
                    @error('tgl_pinjam')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Tanggal Kembali</label>
                    <input type="date" name="tgl_kembali"class="form-control" value="{{ $transaksi->tgl_kembali }}">
                    @error('tgl_kembali')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Status</label>
                    <select name="status" class="form-control">
                        <option selected disabled>-- Pilih Jenis Level -- </option>
                        <option value="pinjam" {{ $transaksi->status == 'pinjam' ? 'selected' : '' }}> Pinjam</option>
                        <option value="kembali" {{ $transaksi->status == 'kembali' ? 'selected' : '' }}> Kembali</option>
                    </select>
                 
                </div>
                @if ($transaksi->ket)
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea  name="ket"class="form-control" placeholder="optional" value = {{ $transaksi->ket }}></textarea>
                    </div>    
                @endif
                   
                <div class="float-right">
                   
                    <button type="submit" class="btn btn-primary">update</button>
                </div>
                </form>


