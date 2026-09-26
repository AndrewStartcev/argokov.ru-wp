(() => {
  "use strict";

  const THEME_KEY = "argokov-color-theme";
  const COOKIE_KEY = "argokov-cookie-choice";
  const header = document.querySelector(".site-header");
  const themeToggle = document.querySelector(".theme-toggle");
  const scrollTopButton = document.querySelector(".scroll-top");
  let lastFocusedElement = null;

  const getTheme = () => {
    try {
      const savedTheme = window.localStorage.getItem(THEME_KEY);

      if (savedTheme === "light" || savedTheme === "dark") {
        return savedTheme;
      }
    } catch {
      // Используем системную тему, если хранилище недоступно.
    }

    return window.matchMedia("(prefers-color-scheme: light)").matches ? "light" : "dark";
  };

  const applyTheme = (theme) => {
    document.documentElement.dataset.theme = theme;
    document.documentElement.style.colorScheme = theme;

    if (themeToggle) {
      themeToggle.setAttribute("aria-pressed", String(theme === "light"));
      themeToggle.setAttribute("aria-label", theme === "dark" ? "Включить светлую тему" : "Включить тёмную тему");
    }
  };

  applyTheme(getTheme());

  themeToggle?.addEventListener("click", () => {
    const nextTheme = document.documentElement.dataset.theme === "dark" ? "light" : "dark";
    applyTheme(nextTheme);

    try {
      window.localStorage.setItem(THEME_KEY, nextTheme);
    } catch {
      // Тема продолжит работать в пределах открытой страницы.
    }
  });

  const systemTheme = window.matchMedia("(prefers-color-scheme: light)");
  systemTheme.addEventListener("change", (event) => {
    try {
      if (window.localStorage.getItem(THEME_KEY)) {
        return;
      }
    } catch {
      // Продолжаем следовать системной теме.
    }

    applyTheme(event.matches ? "light" : "dark");
  });

  const updateScrollState = () => {
    header?.classList.toggle("site-header--scrolled", window.scrollY > 56);
    scrollTopButton?.classList.toggle("scroll-top--visible", window.scrollY > 420);
  };

  updateScrollState();
  window.addEventListener("scroll", updateScrollState, { passive: true });
  scrollTopButton?.addEventListener("click", () => window.scrollTo({ top: 0, behavior: "smooth" }));

  document.querySelectorAll(".mobile-nav a").forEach((link) => {
    link.addEventListener("click", () => link.closest("details")?.removeAttribute("open"));
  });

  const setCookieControlsOffset = (visible) => {
    themeToggle?.classList.toggle("theme-toggle--cookie-visible", visible);
    scrollTopButton?.classList.toggle("scroll-top--cookie-visible", visible);
  };

  const showCookieNotice = () => {
    try {
      if (window.localStorage.getItem(COOKIE_KEY)) {
        return;
      }
    } catch {
      // Уведомление всё равно показываем.
    }

    const notice = document.createElement("aside");
    notice.className = "cookie-notice";
    notice.setAttribute("aria-label", "Настройки файлов cookie");
    notice.innerHTML = `
      <div class="cookie-notice__icon" aria-hidden="true">
        <svg viewBox="0 0 32 32" fill="none">
          <path d="M24.8 6.5a5.2 5.2 0 0 0 1.4 5.1 5.3 5.3 0 0 0 3.2 1.5A13.5 13.5 0 1 1 18.9 2.8a5.2 5.2 0 0 0 5.9 3.7Z"></path>
          <circle cx="11" cy="12" r="1.3"></circle>
          <circle cx="18" cy="18" r="1.3"></circle>
          <circle cx="10.5" cy="22.5" r="1.3"></circle>
        </svg>
      </div>
      <div class="cookie-notice__content">
        <strong>Файлы cookie</strong>
        <p>Используем cookie для корректной работы сайта и улучшения сервиса. Можно разрешить все или оставить только необходимые.</p>
        <div class="cookie-notice__actions">
          <button type="button" data-cookie-choice="all">Принять все</button>
          <button type="button" data-cookie-choice="necessary">Только необходимые</button>
        </div>
      </div>`;

    document.body.append(notice);
    setCookieControlsOffset(true);

    notice.querySelectorAll("[data-cookie-choice]").forEach((button) => {
      button.addEventListener("click", () => {
        try {
          window.localStorage.setItem(COOKIE_KEY, button.dataset.cookieChoice);
        } catch {
          // Уведомление можно закрыть без localStorage.
        }

        notice.classList.add("cookie-notice--closing");
        setCookieControlsOffset(false);
        window.setTimeout(() => notice.remove(), 280);
      });
    });
  };

  window.setTimeout(showCookieNotice, 700);

  const contactFormMarkup = `
    <form class="contact__form contact-modal__form" aria-label="Форма для обсуждения задачи">
      <div class="contact-form__row">
        <label class="contact-form__field"><span>Имя</span><input type="text" name="name" autocomplete="name" placeholder="Как к вам обращаться"></label>
        <label class="contact-form__field"><span>Телефон</span><input type="tel" name="phone" autocomplete="tel" placeholder="+7 999 000-00-00" required></label>
      </div>
      <label class="contact-form__field"><span>Описание задачи</span><textarea name="task" rows="5" placeholder="Ссылка на сайт, что нужно сделать и какой результат хотите получить" required></textarea></label>
      <label class="contact-form__file"><span>Прикрепить файл</span><small>PDF, DOCX, XLSX, JPG, PNG или ZIP · до 10 МБ</small><input type="file" name="file" accept=".pdf,.doc,.docx,.xls,.xlsx,.jpg,.jpeg,.png,.zip"></label>
      <label class="contact-form__consent"><input type="checkbox" name="consent" required><span>Даю <a href="/consent/">согласие на обработку персональных данных</a> и подтверждаю, что ознакомлен с <a href="/privacy/">политикой обработки персональных данных</a>.</span></label>
      <div class="contact-form__submit"><button class="button" type="button">Отправить задачу <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></button><p>Ответим, уточним детали и предложим следующий шаг.</p></div>
    </form>`;

  const closeContactModal = () => {
    const modal = document.querySelector(".contact-modal");

    if (!modal) {
      return;
    }

    modal.remove();
    document.body.style.overflow = "";
    lastFocusedElement?.focus();
  };

  const openContactModal = (trigger) => {
    lastFocusedElement = trigger;
    trigger.closest("details")?.removeAttribute("open");

    const modal = document.createElement("div");
    modal.className = "contact-modal";
    modal.setAttribute("role", "presentation");
    modal.innerHTML = `
      <section class="contact-modal__panel" role="dialog" aria-modal="true" aria-labelledby="contact-modal-title">
        <header class="contact-modal__header">
          <div><p class="section-eyebrow">Обсудить задачу</p><h2 id="contact-modal-title">Расскажите о проекте</h2><p>Можно отправить ссылку, описание или готовое техническое задание. Изучим и предложим следующий шаг.</p></div>
          <button class="contact-modal__close" type="button" aria-label="Закрыть форму"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m7 7 10 10M17 7 7 17"></path></svg></button>
        </header>
        ${contactFormMarkup}
      </section>`;

    document.body.append(modal);
    document.body.style.overflow = "hidden";
    modal.querySelector(".contact-modal__close")?.focus();
    modal.querySelector(".contact-modal__close")?.addEventListener("click", closeContactModal);
    modal.addEventListener("mousedown", (event) => {
      if (event.target === modal) {
        closeContactModal();
      }
    });
  };

  document.addEventListener("click", (event) => {
    const trigger = event.target.closest("[data-contact-modal]");

    if (trigger) {
      event.preventDefault();
      openContactModal(trigger);
    }
  });

  window.addEventListener("keydown", (event) => {
    if (event.key === "Escape") {
      closeContactModal();
    }
  });

  document.addEventListener("click", (event) => {
    const submitButton = event.target.closest(".contact-form__submit .button");

    if (!submitButton) {
      return;
    }

    const form = submitButton.closest("form");

    if (form && !form.checkValidity()) {
      form.reportValidity();
    }
  });

  document.querySelectorAll(".catalog-filter").forEach((filter) => {
    const section = filter.parentElement;
    const items = section?.querySelectorAll("[data-category]");

    if (!items?.length) {
      return;
    }

    filter.querySelectorAll("button").forEach((button) => {
      button.addEventListener("click", () => {
        const category = button.dataset.filter || "all";

        filter.querySelectorAll("button").forEach((item) => {
          item.classList.toggle("is-active", item === button);
          item.setAttribute("aria-pressed", String(item === button));
        });

        items.forEach((item) => {
          item.hidden = category !== "all" && item.dataset.category !== category;
        });
      });
    });
  });

  document.querySelectorAll(".article-code").forEach((block) => {
    const button = block.querySelector(".article-code__head button");
    const code = block.querySelector("code");

    button?.addEventListener("click", async () => {
      try {
        await navigator.clipboard.writeText(code?.textContent || "");
        const originalText = button.textContent;
        button.textContent = "Скопировано";
        window.setTimeout(() => { button.textContent = originalText; }, 1800);
      } catch {
        button.textContent = "Не удалось скопировать";
      }
    });
  });
})();
