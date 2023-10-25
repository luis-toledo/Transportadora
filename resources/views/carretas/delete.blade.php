<x-layout title="Carretas">

    @if($mensagem)
        <script>
            alert('Carreta excluída com sucesso!');
            window.location.href = '/carretas';
        </script>
    @endif
    @if($mensagem == false)
        <script>
            alert('Não é possível excluir esta carreta, pois ele está vinculado a um caminhão.');
            window.location.href = '/carretas';
        </script>
    @endif

</x-layout>
