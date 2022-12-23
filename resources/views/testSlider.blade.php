<link rel="stylesheet" href="https://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>

<p>
    <label for="amount">Date range:</label>
    <input type="text" id="amount" style="border: 0; color: #f6931f; font-weight: bold;" size="100" />
</p>
<div id="slider-range"></div>


<script type="text/javascript">
     $(function () {
            $("#slider-range").slider({
                range: true,
                min: new Date('2010.01.01').getTime() / 1000,
                max: new Date('2014.01.01').getTime() / 1000,
                step: 86400,
                values: [new Date('2013.01.01').getTime() / 1000, new Date('2013.02.01').getTime() / 1000],
                slide: function (event, ui) {
                    $("#amount").val((new Date(ui.values[0] * 1000).toDateString()) + " - " + (new Date(ui.values[1] * 1000)).toDateString());
                }
            });
            $("#amount").val((new Date($("#slider-range").slider("values", 0) * 1000).toDateString()) +
                " - " + (new Date($("#slider-range").slider("values", 1) * 1000)).toDateString());
        });
</script>