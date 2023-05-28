$(document).ready(function() {

    var image = SVG('svgimage');
    $.get('image.svg', function(contents) {
        var $tmp = $('svg', contents);
        image.svg($tmp.html());
    }, 'xml');

    $('#svgimage').hover(
        function() {
            image.select('rect').fill('blue');
        },
        function() {
            image.select('rect').fill('yellow');
        }
    );

});