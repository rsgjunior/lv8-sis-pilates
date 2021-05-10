@if(session('msg'))

<script>
    Swal.fire(
        'Informação',
        '{{ session('msg') }}',
        'info'
    )
</script>

@endif