@if(session('success'))

<script>
    Swal.fire(
        'Sucesso!',
        '{{ session('success') }}',
        'success'
    )
</script>

@endif