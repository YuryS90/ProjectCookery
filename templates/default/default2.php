<div id="slider">
    <img src="../../public/images/card/intro3.jpg" alt="Описание">
    <img src="../../public/images/card/intro2.jpg" alt="Описание">
    <img src="../../public/images/card/intro4.jpg" alt="Описание">
    <img src="../../public/images/card/intro2.jpg" alt="Описание">
    <img src="../../public/images/card/intro4.jpg" alt="Описание">
</div>

<script>

    function slider(selector) {
        let slider = $(selector);
        let imgs = slider.children();

        slider
            .addClass('slider')
            .append('<a href="#" class="slider_arrow slider_arrow_left"></a>')
            .append('<div class="slider_slides"></div>')
            .append('<div class="slider_dots"></div>')
            .append('<a href="#" class="slider_arrow slider_arrow_right"></a>')
            .on('click', '.slider_arrow, .slider_dot', function (e) {
                e.preventDefault();

                let a = $(this);
                let active = slider.find('.slider_slide_active');
                let current = active.index();
                let next = current;
                let left = false;

                if (a.hasClass('slider_arrow_left')) {
                    next = current - 1 >= 0 ? current - 1 : imgs.length - 1;
                    left = true;
                } else if (a.hasClass('slider_arrow_right')) {
                    next = (current + 1) % imgs.length;
                } else {
                    next = a.index();
                    left = next < current ? true : false;
                }

                if (current == next) {
                    return;
                }

                slider.append('<div class="slider_temp"></div>');

                let temp = slider.find('.slider_temp');
                let i = current;
                let j = 0;
                let animate = {};

                while (true) {
                    let img = imgs
                        .eq(i)
                        .clone()
                        .css({
                            display: 'inline-block',
                            width: slider.css('width')
                        });

                    if (left) {
                        img.prependTo(temp);
                    } else {
                        img.appendTo(temp);
                    }

                    if (i == next) {
                        break;
                    }

                    if (left) {
                        i = i - 1 >= 0 ? i - 1 : imgs.length - 1;
                        j--;
                    } else {
                        i = (i + 1) % imgs.length;
                        j++;
                    }

                }

                temp.css({
                    width: (Math.abs(j) + 1) * 100 + '%',
                    position: 'absolute',
                    top: 0
                });

                if (left) {
                    temp.css('left', j * 100 + '%');
                    animate.left = 0;
                } else {
                    temp.css('left', 0);
                    animate.left = j * -100 + '%';
                }

                active.removeClass('slider_slide_active');
                slider
                    .find('.slider_dot_active')
                    .removeClass('slider_dot_active');
                imgs
                    .eq(next)
                    .addClass('slider_slide_active')
                slider
                    .find('.slider_dot')
                    .eq(next)
                    .addClass('slider_dot_active');

                temp.animate(animate, 500, function () {
                    temp.remove();
                })
            });

        let slides = slider.children('.slider_slides');
        let dots = slider.children('.slider_dots');

        imgs
            .prependTo(slides)
            .each(function (i) {
                if (i == 0) {
                    dots.append(
                        '<a href="#" class="slider_dot slider_dot_active"></a>'
                    );
                } else {
                    dots.append(
                        '<a href="#" class="slider_dot"></a>'
                    );
                }
            })
            .addClass('slider_slide')
            .eq(0)
            .addClass('slider_slide_active');
    }

    slider('#slider');

    // function slider(selector) {
    //     let slider = $(selector);
    //     let imgs = slider.children();
    //
    //     slider
    //         .addClass('slider')
    //         .append('<a href="#" class="slider_arrow slider_arrow_left"></a>')
    //         .append('<div class="slider_slides"></div>')
    //         .append('<div class="slider_dots"></div>')
    //         .append('<a href="#" class="slider_arrow slider_arrow_right"></a>')
    //         .on('click', '.slider_arrow, .slider_dot', function (e) {
    //             e.preventDefault();
    //
    //             let a = $(this);
    //             let active = slider.find('.slider_slide_active');
    //             let current = active.index();
    //             let next = current;
    //             let left = false; //+
    //
    //             if (a.hasClass('slider_arrow_left')) {
    //                 next = current - 1 >= 0 ? current - 1 : imgs.length - 1;
    //                 left = true; //+
    //             } else if (a.hasClass('slider_arrow_right')) {
    //                 next = (current + 1) % imgs.length;
    //             } else {
    //                 next = a.index();
    //                 left = next < current ? true : false; //+
    //             }
    //
    //             if (current == next) {
    //                 return;
    //             }
    //
    //             slider.append('<div class="slider_temp"></div>'); //+
    //
    //             let temp = slider.find('.slider_temp'); //+
    //             let i = current; //+
    //             let j = 0;
    //             let animate = {};
    //
    //             while (true) { //+
    //                 let img = imgs //+
    //                     .eq(i) //+
    //                     .clone() //+
    //                     .css({ //+
    //                         display: 'inline-block', //+
    //                         width: slider.css('width') //+
    //                     });
    //
    //                 if (left) {
    //                     img.prependTo(temp);
    //                 } else {
    //                     img.appendTo(temp);
    //                 }
    //
    //                 if (i == next) {
    //                     break;
    //                 }
    //
    //                 if (left) {
    //                     i = i - 1 >= 0 ? i - 1 : imgs.length - 1;
    //                     j--;
    //                 } else {
    //                     i = (i + 1) % imgs.length;
    //                     j++;
    //                 }
    //             }
    //
    //             temp.css({
    //                 width: (Math.abs(j) + 1) * 100 + '%',
    //                 position: 'absolute',
    //                 top: 0
    //             });
    //
    //             if (left) {
    //                 temp.css('left', j * 100 + '%');
    //                 animate.left = 0;
    //             } else {
    //                 temp.css('left', 0);
    //                 animate.left = j * -100 + '%';
    //             }
    //
    //             active.removeClass('slider_slide_active');
    //             slider
    //                 .find('.slider_dot_active')
    //                 .removeClass('slider_dot_active');
    //             imgs
    //                 .eq(next)
    //                 .addClass('slider_slide_active')
    //             slider
    //                 .find('.slider_dot')
    //                 .eq(next)
    //                 .addClass('slider_dot_active');
    //
    //             temp.animate(animate, 500, function () {
    //                 temp.remove();
    //             })
    //         });
    //
    //     let slides = slider.children('.slider_slides');
    //     let dots = slider.children('.slider_dots');
    //
    //
    //     imgs
    //         .prependTo(slides)
    //
    //         .each(function (i) {
    //             if (i == 0) {
    //                 dots.append(
    //                     '<a href="#" class="slider_dot slider_dot_active"></a>'
    //                 );
    //             } else {
    //                 dots.append(
    //                     '<a href="#" class="slider_dot"></a>'
    //                 );
    //             }
    //         })
    //
    //         .addClass('slider_slide')
    //         .eq(0)
    //         .addClass('slider_slide_active');
    // }
    //
    // slider('#slider');

</script>