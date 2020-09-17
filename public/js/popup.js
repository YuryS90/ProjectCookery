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
* переменная timeout это цифра которая указана в свойстве transition 0.3s
* */
const timeout = 300;

/*
* Вешаем событие на .popup__link
* Проверка, существуют ли такие ссылки н странице. В цикле бегаем по всем этим ссылкам
* ПОлучаем кажду в переменную popupLink и на неё вешаем событие click, при котором
* берём значение атрибута href и убираем из него #, где получаем чистое имя
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

