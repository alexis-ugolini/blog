function connect()
{
    if ($('#name').val()=='' || $('#name').val()=='Username' || $('#pass').val()=='' || $('#pass').val()=='Password') {
        alert('Renseignez votre Username et Password');
    }
    else {
        $.ajax(
            {
                url : 'templates/connect.phtml',
                type : 'post',
                data : {
                    name: $('#name').val(),
                    pass: $('#pass').val()
                },
                success : function(reponse) {
                    $('#aside').html(reponse);
                }
            }
        );
    }
}

