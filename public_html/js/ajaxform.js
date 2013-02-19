function openModal(url, alt, larg)
{
$('#mask').css('top', alt);
$('#mask').css('left', larg);
$('box').load(url);

}