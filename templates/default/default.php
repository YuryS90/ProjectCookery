<div id="slider">
    <img src="../../public/images/card/intro3.jpg" alt="Описание">
    <img src="../../public/images/card/intro2.jpg" alt="Описание">
    <img src="../../public/images/card/intro4.jpg" alt="Описание">
    <img src="../../public/images/card/bliny.jpg" alt="Описание">
    <img src="../../public/images/card/losos.jpg" alt="Описание">
</div>

<!--<div class="slider">-->
<!--    <a href="#" class="slider_arrow slider_arrow_left"></a>-->
<!---->
<!--    <div class="slider_slides">-->
<!--        <img src="../../public/images/card/intro3.jpg" class="slider_slide slider_slide_active" alt="Описание">-->
<!--        <img src="../../public/images/card/intro2.jpg" class="slider_slide" alt="Описание">-->
<!--        <img src="../../public/images/card/intro4.jpg" class="slider_slide" alt="Описание">-->
<!--    </div>-->
<!---->
<!--    <div class="slider_dots">-->
<!--        <a href="#" class="slider_dot slider_dot_active"></a>-->
<!--        <a href="#" class="slider_dot"></a>-->
<!--    </div>-->
<!---->
<!--    <a href="#" class="slider_arrow slider_arrow_right"></a>-->
<!--</div>-->

<!--<div class="modal fade" id="cart">-->
<!--    <div class="modal-dialog" role="document">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <h5 class="modal-title">Оформление заказа</h5>-->
<!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                    <span aria-hidden="true">&times;</span>-->
<!--                </button>-->
<!--            </div>-->
<!--            <div class="modal-body">-->
<!--                <form id="buy" method="post">-->
<!---->
<!--                    <div class="form-group">-->
<!--                        <label for="name">Ваше имя</label>-->
<!--                        <input type="name" class="form-control" id="name" placeholder="Ваше имя">-->
<!--                    </div>-->
<!---->
<!--                    <div class="form-group">-->
<!--                        <label for="email">Ваш Email</label>-->
<!--                        <input type="email" class="form-control" id="email" placeholder="Ваш Email">-->
<!--                    </div>-->
<!---->
<!--                    <div class="form-group">-->
<!--                        <label for="product">Выбранное блюдо</label>-->
<!--                        <input type="text" class="form-control" id="product" readonly>-->
<!--                    </div>-->
<!---->
<!--                    <div class="form-group">-->
<!--                        <label for="price">Цена</label>-->
<!--                        <input type="text" class="form-control" id="price" readonly>-->
<!--                    </div>-->
<!---->
<!--                    <button type="submit" class="btn btn-primary">Купить</button>-->
<!--                </form>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->


<script>
    //на вход получим селектор блока-обёртки
    function slider(selector) {
        //получим блок-обёртку
        let slider = $(selector);
        //получим изображение внутри блока-обёртки
        let imgs = slider.children();
        // на блок-обёртку повесим класс slider
        slider
            .addClass('slider')
            /*
            * добавим внутри него ссылки для переключения между слайдами влево и вправо,
            * а также блок для хранения слайдов и блок для хранения точек
            */
            .append('<a href="#" class="slider_arrow slider_arrow_left"></a>')
            .append('<div class="slider_slides">')
            .append('<div class="slider_dots">')
            .append('<a href="#" class="slider_arrow slider_arrow_right"></a>');
        // Получим блок для хранения слайдов и для хранения точек
        let slides = slider.children('.slider_slides');
        let dots = slider.children('.slider_dots');

        //Возьмём наши изображения и поместим их в блок для хранения слайдов
        imgs
            .prependTo(slides)
            /*
            * Смотрим как изменилось DOM-дерево (F12).
            * Но для начало нужно применить нашу функцию для блока обёртки
            * Для этого блок-обёртку нужно найти по селектору. Для этого задаём id="slider"
            */

            // Добавим точки. Для этого для каждого изображения вызовем функцию

            /*
            * Функция получает на вход индекс - номер изображения.
            * Если индекс равен 0, т.е. это самый первый слайд (по умолчанию является активным)
            * то добавим активную точку, иначе обычную
            */
            .each(function (i) {
                if (i = 0) {
                    dots.append(
                        '<a href="#" class="slider_dot slider_dot_active"></a>'
                    );
                } else {
                    dots.append(
                        '<a href="#" class="slider_dot"></a>'
                    );
                }
            })
            // Затем на каждое изображение повесим класс slider_slide,
            // а на нулевое изображение - slider_slide_active
            .addClass('slider_slide')
            .eq(0)
            .addClass('slider_slide_active');

    }

    slider('#slider');


    // /*
    // * У каждого блюда есть кнопка с классом buy. К этой кнопке нужно привязаться
    // * При клике по элементу с классом buy будем обрабатывать событие .click. Где по этому событию
    // * будем выполнять функцию.
    // * У каждой кнопке есть атрибут data-price и data-product, в которой храниться цена товара и наименование.
    // * Чтобы их получить...
    // * */
    // $('.buy').click(function () {
    //     // ...нужно задать переменные price и product, где возьмём у текущего элемента (this) атрибуты 'price' и 'product'
    //     let price = $(this).data('price');
    //     let product = $(this).data('product');
    //
    //     //получим значения и вызовем модальное окно
    //     // console.log('price', 'product');
    //     /*
    //     * идём в браузер и кликаем по кнопке "купить"
    //     * */
    //
    //     //добавляем в соответствующие поля формы
    //     $('#price').val('price');
    //     $('#product').val('product');
    //
    //     // вызываем к модальное окно
    //     $('#cart').modal();
    //     return false;
    //     /*
    //     * кнопка "купить" является ссылкой.
    //     * return false отменяет дефолтное поведение для ссылки (переход по ссылке)
    //     * */
    // });

</script>