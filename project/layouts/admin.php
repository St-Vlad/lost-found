<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title?></title>
    <link rel="stylesheet" href="<?php echo "/project/resources/css/forms/form.css";?>">
</head>
<body>
<div id="header">
    <h2>Адміністративна панель</h2>
</div>
<div id="content">
    <?= $content ?>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<input id="test-input" type="file"/>
<img id="blah" src="#" alt="your image" />

<style>
    .changed{
        background-color: #fffca6;
    }
</style>
<script>
    let before;
    let after;
    $('#finds-table td').on('click', function () {
        if ($(this).attr('contenteditable')){
            before  = $(this).html();

            $(this).on('blur', function () {
                after  = $(this).html();
                if (after !== before){
                    $(this).addClass('changed');
                }
            })
        }
    });

    $('#finds-table #image').on('click', function {
        let parent = $(this);
        $(parent).append('<input id="test-input" type="file"/>');
        $(this).unbind();
    });

    /*$( "input[type='file']" ).change(function() {
        if ($( this ).val()){
        }
    });*/

    function readImage(input) {
        if (input.files && input.files[0]) {
            let reader = new FileReader();

            reader.onload = function(e) {
                $('#pattern').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#test-input").change(function() {
        readImage(this);
    });
</script>

</body>
</html>