@if(session('error'))

<script>
    Swal.fire(
        'Erro :(',
        '{{ session('error') }}',
        'error'
    )
</script>

@endif