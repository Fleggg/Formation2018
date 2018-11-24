$(document).ready(function()
{
    $("#choixcateg").change(
        function()
        {
            $.ajax(
                {
                    type:'POST',
                    url:'./ObtenirLesProduits.php',
                    data:'codeCateg='+$('#choixcateg').val(),
                    success: recevoirReponseProduit
                }
            );
        }
    );
});

function recevoirReponseProduit(reponse)
{
    $('#lesProduits').css('visibility', 'visible');

    $('#lesProduits').append('<label>Produits :</label>');

    $('#lesProduits').append('<select id="produits"></select>');

    $.each(JSON.parse(reponse), function(index, value)
    {
        $('#produits').append('<option value="'+ index +'">'+ value +'</option>');
    })

    $("#produits").change(
        function()
        {
            $.ajax(
                {
                    type:'POST',
                    url:'./ObtenirPrix.php',
                    data:'CodeProduit='+$('#produits').val(),
                    success: recevoirReponsePrix
                }
            );
        });
}

function recevoirReponsePrix(reponse)
{
    $('#lePrix').css('visibility', 'visible');
    $('#lePrix').append('<p>'+ JSON.parse(reponse) +'</p>');
}
