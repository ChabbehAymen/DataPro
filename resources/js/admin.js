import $ from 'jquery';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js'

import select2 from 'select2';
import 'select2/dist/css/select2.min.css';
import { faEdit } from '@fortawesome/free-solid-svg-icons';

select2();

$(document).ready(function () {
    $('#tags').select2({
        placeholder: "Choisissez des options",
        allowClear: true,
        theme: "classic",

    });

    $('input[name="image"]').on('change', function (e) {
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
                    $('#imageContainer').append(`<div class="h-11 w-11 bg-red-300 mr-3 rounded bg-no-repeat bg-center bg-origin-padding bg-cover ${border}" style="background-image: url(` + reader.result + ')"></div>');
                }
                reader.readAsDataURL(file);
            })
        }
    });

    function loadImages(file) {
        let dataURL;
        let img = new Image();
        img.onload = function () {
            let canvas = document.createElement('canvas');
            let ctx = canvas.getContext('2d');
            canvas.width = 300;
            canvas.height = 300;
            ctx.drawImage(img, 0, 0, 300, 300);
            dataURL = canvas.toDataURL('image/jpeg');
        };
        return dataURL;
    }
});
