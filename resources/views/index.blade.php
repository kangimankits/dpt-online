<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name') }}</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{ asset('core.js') }}"></script>
    </head>
    <body class="bg-light">
        <div class="container" style="max-width: 600px; margin: 5rem auto">
            <div class="card shadow shadow-sm p-4 border-0 rounded-4">
                <div class="card-body text-center" id="form">
                    <form method="post">
                        <h5>Data Pemilih PILKADA 2024 <br> PPK Dawuan - Subang</h5>
                        <div class="form-group my-3">
                            <input type="text" required name="key" class="form-control form-control-lg text-center">
                        </div>
                        <div class="mb-4">
                            <small><b>Keterangan</b> : Silahan ketik Nomor Induk Kependudukan (NIK).</small>
                        </div>
                        <button class="btn btn-primary px-5">Cari</button>
                    </form>
                </div>
                <div id="failed" class="card-body text-center text-danger d-none">
                    <img src="data:image/png;base64,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">
                    {{-- <img src="data:image/png;base64,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"> --}}
                    <div class="mb-5 mt-3 msg"></div>
                    <button class="btn btn-danger px-5 back">Oke</button>
                </div>
            </div>
        </div>

        <script>
            $(function(){
                let form = $('#form');
                let failed = $('#failed');
                let success = $('#success');

                $('form').on('submit',function(e){
                    e.preventDefault();
                    var a = $(this);
                    a.aiSubmit("{{ route('core') }}",{
                        sukses : function(data){
                            alert('ok')
                        },
                    });
                });

                $('.back').click(function(){
                    form.removeClass('d-none')
                    failed.addClass('d-none');
                    success.addClass('d-none');
                });
            });
        </script>
    </body>
</html>
