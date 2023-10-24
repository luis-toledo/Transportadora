<x-layout title="Caminhões">

    @if($mensagem)
        <script>
            alert('Caminhão excluído com sucesso!');
            window.location.href = '/caminhoes';
        </script>
    @endif
    @if($mensagem == false)
        <script>
            alert('Não é possível excluir este caminhão, pois ele está vinculado a um frete.');
            window.location.href = '/caminhoes';
        </script>
    @endif

</x-layout>
