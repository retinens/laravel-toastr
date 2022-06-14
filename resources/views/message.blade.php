@if (session('toasts', collect())->count())
    <script>
        @foreach (session('toasts', collect()) as $item)
        toastr.{{$item["level"]}}('{{ $item["message"] }}','{{ $item["title"] }}')
        @endforeach
    </script>
    @php
        session()->forget('toasts')
    @endphp
@endif
