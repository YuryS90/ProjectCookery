/*
* Объявление переменных
*  в popupLinks получаем все объекты с классом popup__link
* Т.е. popup открывался при клике на любой объект с классом popup__link,
* который прописываем в HTML к ссылкам, например, картинка
* */
const popupLinks = document.querySelectorAll('.popup__link');
/*
* В переменную body получаем сам тег body, чтобы блокировать скролл внутри body
* */
const body = document.querySelector('body');
/*
* В переменную lockPadding получаем все объекты с классом lock-padding
* */
const lockPadding = document.querySelectorAll('.lock-padding');

/*
* переменная unlock нужна чтобы не было двойных нажатий
* */
let unlock = true;

/*
* переменная timeout это таже цифра, которая указана в свойстве transition 0.3s.
* Эти значения должны быть одинаковы, так как связано с блокировкой скролла и его адекватной работе
* */
const timeout = 300;

/*
* Вешаем событие на .popup__link
* Проверка, существуют ли такие ссылки н странице. В цикле бегаем по всем этим ссылкам
* ПОлучаем кажду в переменную popupLink и на неё вешаем событие click, при котором
* берём значение атрибута href и убираем из него значок #, где получаем в popupName чистое имя.
* И далее получаем сам объект попапа в переменную curentPopup получаем элемент id которого
* равен popupName.
* Далее полученный готовый объект отправляем в функцию popupOpen, которая будет заниматься
* открытием попапа. Поскольку это ссылка, свойством e.preventDefault() запрещаем перегружать страницу,
* т.е. блокируем работу ссылки!
* */
if (popupLinks.length > 0) {
    for (let index = 0; index < popupLinks.length; index++) {
        const popupLink = popupLinks[index];
        popupLink.addEventListener("click", function (e) {
            const popupName = popupLink.getAttribute('href').replace('#', '');
            const curentPopup = document.getElementById(popupName);
            popupOpen(curentPopup);
            e.preventDefault();
        });
    }
}

/*
* Это кусок кода для объектов, которые будут попап закрывать. Это любой объект, который находиться внутри
* попапа и у него есть класс .close-popup. Именно этоо класс нужно добавить в HTML в ссылке, которая с крестиком
* Далее также проверяем есть ли такие объекты вообще. Опять цикл.
* Сново получаем конкретный объект - el, на который вешаем событие клик. Только при событиии
* клик
*
* Проверка, существуют ли такие ссылки н странице. В цикле бегаем по всем этим ссылкам
* ПОлучаем кажду в переменную popupLink и на неё вешаем событие click, при котором
* берём значение атрибута href и убираем из него значок #, где получаем в popupName чистое имя.
* И далее получаем сам объект попапа в переменную curentPopup получаем элемент id которого
* равен popupName.
* Далее полученный готовый объект отправляем в функцию popupOpen, которая будет заниматься
* открытием попапа. Поскольку это ссылка, свойством e.preventDefault() запрещаем перегружать страницу,
* т.е. блокируем работу ссылки!
* */
const popupCloseIcon = document.querySelectorAll('.close-popup');
if (popupCloseIcon.length > 0) {
    for (let index = 0; index < popupCloseIcon.length; index++) {
        const el = popupCloseIcon[index];
        el.addEventListener('click', function (e) {
            popupClose(el.closest('.popup'));
            e.preventDefault();
        });
    }
}


