<div id="slider">
    <img src="../../public/images/card/intro3.jpg" alt="Описание">
    <img src="../../public/images/card/intro2.jpg" alt="Описание">
    <img src="../../public/images/card/intro4.jpg" alt="Описание">
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
            .append('<div class="slider_slides"></div>')
            .append('<div class="slider_dots"></div>')
            .append('<a href="#" class="slider_arrow slider_arrow_right"></a>')
            //Добавляем событие клик по точкам и по стрелочкам, которые будут переключать слайды
            .on('click', '.slider_arrow, .slider_dot', function (e) {
                // т.к. стрелочки и точки являются ссылками,
                // то нужно отменить действие перехода по ссылке, которое по умолчанию
                e.preventDefault();
                // затем нужно получить саму ссылку
                let a = $(this);
                // получим активный слайд
                let active = slider.find('.slider_slide_active');
                // его индекс
                let current = active.index();
                // Нужно найти номер следующего слайда
                let next = current;

                /*
                * II Добавление анимации для слайдов.
                * Для начала нужно определить откуда они будут выезжать слево либо справо.
                * Для этого создаём переменную left
                */
                let left = false;

                /*
                * Теперь нужно создать условие, которое будет проверять
                * нажали ли мы по левой стрелочке либо по правой, либо по точкам
                * */
                if (a.hasClass('slider_arrow_left')) {
                    /*
                    * Если нажали стрелочку влево,то будт происходить след:
                    * если текущий слайд -1 больше либо равен 0, т.е. не достигли самого
                    * первого слайда, то выводим слайд -1;
                    * если достигли нулевого слайда, то должны прийти в конец, т.е. взять
                    * самый последний слайд. Получается зацикливание слайдов
                    * */
                    next = current - 1 >= 0 ? current - 1 : imgs.length - 1;
                    left = true;
                } else if (a.hasClass('slider_arrow_right')) {
                    // Берём по модулю количество слайдов,
                    // т.е если 4 слайда, так как индексация начинается с 0, то 4 слайд,
                    // который по идее должен быть 5, возьмётся по модулю и получиться опять 0 слайд
                    next = (current + 1) % imgs.length;
                } else {
                    // Если нажали по точке, то берём номер точки
                    next = a.index();
                    left = next < current ? true : false;
                }
                // Если следующий слайд равен текущему, то ничего не далаем,
                // т.е. завершаем выполнение функции
                if (current == next) {
                    return;
                }

                // II Создадим временный блок, а также получим его
                slider.append('<div class="slider_temp"></div>')

                let temp = slider.find('.slider_temp');

                /*
                * II Слайд от текущего к последующему нужно поместить в этот временный блок
                * Для этого создадим переменную i, которая по началу будет равна текущему слайду
                */
                let i = current;

                // II Нужно подсчитать сколько слайдов добавили
                let j = 0;

                // II СОздадим анимацию перемещения временного блока в противоположную сторону
                let animate = {};

                // II Создадим бесконечный цикл
                while (true) {
                    // Возьмём текущий слайд
                    let img = imgs
                        .eq(i)
                        // Скопируем его
                        .clone()
                        .css({
                            display: 'inline-block',
                            width: slider.css('width')
                        });
                    /*
                     * II Взависимости от того, откуда должны выезжать слайды,
                     * добавим либо в начало временного блока, либо в конец временного блока
                    */
                    if (left) {
                        img.prependTo(temp);
                    } else {
                        img.appendTo(temp);
                    }
                    /*
                    * II Добавим условие завершения бесконечного цикла.
                    * Если добавим следующий слайд, то нужно закончить бесконечный цикл
                    */
                    if (i == next) {
                        break;
                    }

                    /*
                    * II Добавим условие изменения переменной i.
                    * Если перемещаемся влево, то j будет тоже увеличиваться, но будет отрицательной
                    * Если вправо - увеличиваться, но будет положительной
                    */
                    if (left) {
                        i = i - 1 >= 0 ? i - 1 : imgs.length - 1;
                        j--;
                    } else {
                        i = (i + 1) % imgs.length;
                        j++;
                    }
                }
                /*
                * II Рассчитаем ширину временного блока.
                * Для этого возьмём j по модулю, +1 *100 и скажем, что это %
                * а также спозиционируем абсолютно
                * */
                temp.css({
                    width: (Math.abs(j) + 1) * 100 + '%',
                    position: 'absolute',
                    top: 0
                });

                /*
                 * II Разместим этот временный блок слево или справо от слайдеров.
                * */
                if (left) {
                    temp.css('left', j * 100 + '%');
                    animate.left = 0;
                } else {
                    temp.css('left', 0);
                    animate.left = j * -100 + '%';
                }


                // Затем у активного слайда удалим класс, означающий, что он активный
                active.removeClass('slider_slide_active');
                // Тоже самое с точкой
                slider
                    .find('.slider_dot_active')
                    .removeClass('slider_dot_active');
                // Затем возьмём следующий слайд и сделаем его активным
                imgs
                    .eq(next)
                    .addClass('slider_slide_active')
                // Тоже самое сделаем с точкой
                slider
                    .find('.slider_dot')
                    .eq(next)
                    .addClass('slider_dot_active');

                // II Осталось запустить анимацию для временного блока.
                // Она будет действовать 500мл/с.
                // По завершению анимации временный блок будет удаляться
                temp.animate(animate, 500, function () {
                    temp.remove();
                })

            });
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
            // Затем на каждое изображение повесим класс slider_slide,
            // а на нулевое изображение - slider_slide_active
            .addClass('slider_slide')
            .eq(0)
            .addClass('slider_slide_active');

    }

    /*
    * Как будет проходить анимация. При нажатии по стрелочке или по точке будет создаваться
    * временный блок. Этот блок будет позиционироваться слево или справо от слайдера
    * Затем слайды от текущего до следующего будут копироваться в этот временный блок.
    * Затем блок будет ехать в противоположную сторону, тем самым создавая анимацию движения слайдов
    * Затем в конце анимации временный блок будет удаляться
    * */


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