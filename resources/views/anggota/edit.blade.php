<form action="{{ route('anggota.update',$anggota->id) }}" method="post">
@csrf
@method('put')
<div class="form-group">
    <label>Nama</label>
    <input type="text" name="nama"  class="form-control" value="{{ $anggota->nama }}">
</div>
<div class="form-group">
    <label>NIM</label>
    <input type="number" name="nim"  class="form-control" value="{{ $anggota->nim }}">
</div>
<div class="form-group">
    <label>No HP</label>
    <input type="number" name="no_hp"  class="form-control" value="{{ $anggota->no_hp }}">
</div>

<div class="form-group">
    <label>Tgl Lahir</label>
    <input type="date" name="tgl_lahir"  class="form-control" value="{{ $anggota->tgl_lahir }}">
</div>
<div class="form-group">
    <label>Jurusan</label>
    <input type="text" name="jurusan"  class="form-control" value="{{ $anggota->jurusan }}">
</div>
<div class="form-group">
    <label>Jenis Kelamin</label>
    <select name="jenis_kelamin" class="form-control">
        <option selected disabled style="text-transform: capitalize" >{{ $anggota->jenis_kelamin }}</option>
        <option value="{{ $anggota->jenis_kelamin == 'pria' ? 'selected' : '' }}"> Pria</option>
        <option value="{{ $anggota->jenis_kelamin == 'wanita' ? 'selected' : ''}}"> Wanita</option>
    </select>

</div>
<div class="float-right">
    <button type="submit" class="btn btn-primary">Update</button>
</div>
</form>