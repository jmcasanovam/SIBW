$(document).ready(function () {
    $('#search-box').on('input', function () {
        const query = $(this).val();

        if (query.length > 0) {
            $.ajax({
                url: 'ajax.php',
                type: 'get',
                data: { query: query },
                beforeSend: function () {
                    $('#results-container').html('Buscando...');
                },
                success: function (data) {
                    const resultados = JSON.parse(data);
                    console.log(resultados);
                    $('#results-container').empty();
                    resultados.forEach(function (item) {
                        const div = $('<div id="results-container"></div>');
                        div.text(item.nombre);
                        div.data('id', item.id);
                        div.on('click', function () {
                            window.location.href = 'actividad.php?ev=' + item.id;
                        });
                        $('#results-container').append(div);
                    });
                }
            });
        } else {
            $('#results-container').empty();
        }
    });
});


