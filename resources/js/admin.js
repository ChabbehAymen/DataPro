import $ from 'jquery';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js'

import select2 from 'select2';
import 'select2/dist/css/select2.min.css';

select2();

$(document).ready(function () {
    $('#tags').select2({
        placeholder: "Choisissez des options",
        allowClear: true,
        theme: "classic",

    });

    $('input[name="images[]"]').on('change', function (e) {
        if (e.target.files.length > 4) {
            $('#errors').append('<div class="text-red-500">You can only upload 4 images</div>');
            return;
        }
        let reader = new FileReader();
        reader.onloadend = function () {
            $('#imageHolder').css('background-image', 'url(' + reader.result + ')');
            $('#imageHolder > span').hide();
        };
        reader.readAsDataURL(e.target.files[0]);
        if (e.target.files.length > 1) {
            Array.from(e.target.files).forEach(function (file, index) {
                let border = "";
                if (index == 0) {
                    border = "border border-black";
                }
                let reader = new FileReader();
                reader.onloadend = function () {
                    $('#imageContainer').append(`<div class="cursor-pointer h-11 w-11 bg-white mr-3 rounded bg-no-repeat bg-center bg-origin-padding bg-contain ${border}" style="background-image: url(` + reader.result + ')" onclick="showImage(this)"></div>');
                }
                reader.readAsDataURL(file);
            })
        }
    });
});

function showImage(element) {
    let images = $("#imageContainer > div");
    if (images.length < 0) return;
    images.each(function () {
        $(this).css('border', '0');
    });
    $('#imageHolder').css('background-image', 'url(' + $(element).css('background-image') + ')');
    $(element).css('border', '1px solid black');
}
