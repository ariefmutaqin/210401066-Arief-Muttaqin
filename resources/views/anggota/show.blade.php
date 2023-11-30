<style>
    .list-group-item span {
        display: block;
        font-weight: bold;
        margin-bottom: 5px; /* Sesuaikan dengan jarak antara tulisan dan nilai */
    }
</style>
<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-4">
            @if ($anggota->gambar)
                <img width="150" height="150" @if($anggota->gambar) src="{{ asset('Storage/'.$anggota->gambar) }}" @endif />
            @endif
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <div class="card-text">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <span>NIM:</span> {{ $anggota->nim }}
                        </li>
                        <li class="list-group-item">
                            <span>Nama:</span> {{ $anggota->nama }}
                        </li>
                        <li class="list-group-item">
                            <span>Jenis Kelamin:</span> {{ $anggota->jenis_kelamin }}
                        </li>
                        <li class="list-group-item">
                            <span>No. Hp:</span> {{ $anggota->no_hp }}
                        </li>
                        <li class="list-group-item">
                            <span>Tanggal Lahir:</span> {{ $anggota->tgl_lahir }}
                        </li>
                    </ul>
                </div>
                <div class="card-text text-right"><small class="text-muted">{{  $anggota->jurusan }}</small></div>
            </div>
        </div>
    </div>
</div>

<script>
     function readURL() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(input).prev().attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $(".uploads").change(readURL)
            $("#f").submit(function(){
                return false
            })
        })

</script>