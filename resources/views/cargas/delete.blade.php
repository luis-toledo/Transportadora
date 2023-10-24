<x-layout title="Cargas">

    @if($mensagem)
        <script>
            alert('Carga excluída com sucesso!');
            window.location.href = '/cargas';
        </script>
    @endif
    @if($mensagem == false)
        <script>
            alert('Não é possível excluir esta carga, pois ele está vinculado a um frete.');
            window.location.href = '/cargas';
        </script>
    @endif

</x-layout>
