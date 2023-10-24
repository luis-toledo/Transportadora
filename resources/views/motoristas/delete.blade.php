<x-layout title="Motoristas">

    @if($mensagem)
        <script>
            alert('Motorista excluído com sucesso!');
            window.location.href = '/motoristas';
        </script>
    @endif
    @if($mensagem == false)
        <script>
            alert('Não é possível excluir este motorista, pois ele está vinculado a um caminhão.');
            window.location.href = '/motoristas';
        </script>
    @endif

</x-layout>
