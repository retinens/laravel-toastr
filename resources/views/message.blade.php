@if (session('toasts', collect())->count())
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @foreach (session('toasts', collect()) as $item)
            toastr.{{$item["level"]}}('{{ $item["message"] }}','{{ $item["title"] }}')
            @endforeach
        }, false);
    </script>
    @php
        session()->forget('toasts')
    @endphp
@endif
