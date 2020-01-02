/** 
 * Popup
 * загружает контент через http request
 * закрывается по нажатию Esc, клику на крестик, клику вне popup
 * принимает объект-конфиг и callback, выполняемый после каждого открытия popup
 * callback можно использовать для навешивания слушателей событий на загруженный в popup конетент
 * 
 * Использование
 * .js-popup(data-container="#popup", data-content="includes/popup.html")
 * data-container — селектор открываемого popup
 * data-content — контент, который будет помещен в popup
 * (допустимо не использовать загрузку конента, а показывать статичные данные)
 * 
 * Пример инита:
 * new Popup({}, function() {
 *   console.log(this); // В this будет лежать экземпляр класса
 * });
 *
 * В toggle.popup доступны bg, popup, container, contentUrl, callback
 */

export default class Popup {
	constructor(config, callback) {
		this.defaultConfig = {
			/**
			 * Время в мс, через которое будет очищен loadedSelector 
			 * если используется css-анимация
			 */
			closeSpeed: 30,

			openClass: 'open',
			/** Класс, навешиваемый при ожидании загрузки контента */
			loadingClass: 'load',
			/** Предполагается единственным */
			bgSelector: '.js-popup-bg',
			/** Открывает popup при клике */
			toggleSelector: '.js-popup',
			/**
			 * Элемент, куда будет загружен контент popup 
			 * Предполагается единственным в popup-элементе
			 */
			loadedSelector: '.js-popup-loaded',
			closeButtonSelector: '.js-popup-close',
		};

		this.config = Object.assign({}, this.defaultConfig, config || {});
		this.callback = callback;

		// closest polyfill
		(function () {
			// проверяем поддержку
			if (!Element.prototype.closest) {
				// реализуем
				Element.prototype.closest = function(css) {
					var node = this;
					while (node) {
						if (node.matches(css)) return node;
						else node = node.parentElement;
						}
					return null;
				};
			}
			})();

		this.init();
	}

	init() {
		for (let toggle of document.querySelectorAll(this.config.toggleSelector)) {
			toggle.popup = new PopupInit(toggle, this.config, this.callback);
		}
	}
}

export class PopupInit {
	constructor(toggle, config, callback) {

		this.toggle = toggle;
		this.config = config;
		this.popup = document.querySelector(toggle.getAttribute('data-container'));
		if (this.popup) {
			this.bg = this.popup.closest(this.config.bgSelector);
			this.container = this.popup || this.popup.querySelector('.js-popup-loaded') || false;
			this.contentUrl = this.toggle.getAttribute('data-content');
		}

		this.callback = callback;
		this.bindCloseHandler = this.closeHandler.bind(this);
		
		if (this.container) {
			this.init();
		}
	}

	init() {
		if (this.bg && this.toggle) {
			this.toggle.addEventListener('click', (e) => this.open(e));
			this.bg.addEventListener('click', (e) => {
				if(e.target == this.bg) return this.close(e);
			});

			let closeBtns = this.popup.querySelectorAll(this.config.closeButtonSelector);
			for (let button of closeBtns) {
				button.addEventListener('click', (e) => this.close(e))
			}
		}
	}

	open(e) {
		e.preventDefault();
		$("#popup-order-delete").html('');
		if(this.toggle.closest("#link__cancel")) {
            let cancel = this.toggle.closest("#link__cancel").getAttribute("href");
            if (cancel) {
                cancel = cancel + "&AJAX=Y";
                const xhr = new XMLHttpRequest();
                xhr.open('GET', cancel, true);
                xhr.send();
                xhr.onreadystatechange = () => {
                    if (xhr.readyState != 4) return;

                    this.popup.classList.remove(this.config.loadingClass);
                    if (xhr.status == 200) {
                        $("#popup-order-delete").html(xhr.responseText);

                        let closeBtns = this.popup.querySelectorAll(this.config.closeButtonSelector);
                        let btnBack = document.querySelector("#back_link");
                        console.log(btnBack);

                        btnBack.addEventListener('click', (e) => this.close(e));
                        for (let button of closeBtns) {
                            button.addEventListener('click', (e) => this.close(e));
                        }
                    } else {
                        console.log(xhr.status + ': ' + xhr.statusText);
                    }

                    if (this.callback && typeof this.callback === 'function') this.callback();
                }
                this.popup.classList.add(this.config.loadingClass);
            }
		}
		this.bg.classList.add(this.config.openClass);
		this.popup.classList.add(this.config.openClass);
		disableBodyScroll(this.popup);

		if (!this.contentUrl) {
			if (this.callback && typeof this.callback === 'function') this.callback();
		}

		document.addEventListener('keydown', this.bindCloseHandler);

		return false;
	}

	close(e) {
		e.preventDefault();
		e.stopPropagation();
		this.bg.classList.remove(this.config.openClass);
		this.popup.classList.remove(this.config.openClass);
		enableBodyScroll(this.popup);
		if (this.contentUrl) {
			setTimeout(() => this.container.innerHTML = '', this.config.closeSpeed);
		}
		document.removeEventListener('keydown', this.bindCloseHandler);
	}

	closeHandler(e) {
		// Esc
		if(e.keyCode !== 27) return;
		this.close(e);
	}
}
