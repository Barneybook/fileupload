<?php

?>
<html>
<head>
<title>送出URL</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<form action="receive.php" form enctype="multipart/form-data" method=POST>
<input type="hidden" name="MAX_FILE_SIZE" value="100000000">
照片上傳:<input name="userfile" type="file" id="file-input">
<hr />
<input type="submit" value="送出" name="B1">
<input type="reset" value="清空" name="B2"><br/>
</form>
<hr />

<div class="span7">
	<h2>Result</h2>
	<div class="well" id="result"><p><span class="label label-warning">Notice</span> This demo works only in browsers with support for the <a href="https://developer.mozilla.org/en/DOM/window.URL">URL</a> or <a href="https://developer.mozilla.org/en/DOM/FileReader">FileReader</a> API.</p></div>
</div>

<script src="load-image.min.js"></script>
<!-- jQuery and Bootstrap JS are not required, but included for the demo -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="http://blueimp.github.com/cdn/js/bootstrap.min.js"></script>
<script>
/*global jQuery, window, document */
(function ($) {
    'use strict';
    var result = $('#result'),
        load = function (e) {
            e = e.originalEvent;
            e.preventDefault();
            window.loadImage(
                (e.dataTransfer || e.target).files[0],
                function (img) {
                    result.children().replaceWith(img);
                },
                {
                    maxWidth: result.children().outerWidth(),
                    canvas: true
                }
            );
        };
    $(document)
        .on('dragover', function (e) {
            e = e.originalEvent;
            e.preventDefault();
            e.dataTransfer.dropEffect = e.dataTransfer.effectAllowed = 'copy';
        })
        .on('drop', load);
    $('#file-input').on('change', load);
}(jQuery));
</script>

</body>
</html>