    <script type="text/javascript">
setInterval(function(){
    // set whatever future date / time you want here, together with
    // your timezone setting...
    var future = new Date("Feb 01 2014 23:59:59 GMT-05:00");
    var now = new Date();
    var difference = Math.floor((future - now) / 1000);

    var seconds = fixIntegers(difference % 60);
    difference = Math.floor(difference / 60);

    var minutes = fixIntegers(difference % 60);
    difference = Math.floor(difference / 60);

    var hours = fixIntegers(difference % 24);
    difference = Math.floor(difference / 24);

    var days = difference;

    $("#seconds").text(seconds);
    $("#minutes").text(minutes);
    $("#hours").text(hours);
    $("#days").text(days);
}, 1000);

function fixIntegers(integer)
{
    if (integer < 0)
        integer = 0;
    if (integer < 10)
        return "0" + integer;
    return "" + integer;
}
    </script>