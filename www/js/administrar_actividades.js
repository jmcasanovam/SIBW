$(document).ready(function () {
    $('#search-box2').on('input', function () {
        const query = $(this).val();

        if (query.length > 0) {
            $.ajax({
                url: 'ajax2.php',
                type: 'get',
                data: { query: query },
                beforeSend: function () {
                    $('#results-container2').html('Buscando...');
                },
                success: function (data) {
                    const resultados = JSON.parse(data);
                    console.log(resultados);
                    $('#results-container2').empty();
                    resultados.forEach(function (item) {
                        const div = $('<div class="listado"></div>');
                        div.text(item.nombre);
                        div.data('id', item.id);
                        div.on('click', function () {
                            window.location.href = 'editar_actividad.php?id=' + item.id;
                        });
                        $('#results-container2').append(div);
                    });
                }
            });
        } else {
            $('#results-container2').empty();
        }
    });
});