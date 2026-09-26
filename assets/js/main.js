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

  const emitCookieChoice = (choice) => {
    if (choice !== "all" && choice !== "necessary") {
      return;
    }

    window.argokovCookieChoice = choice;
    window.dispatchEvent(
      new CustomEvent("argokov:cookie-choice", {
        detail: { choice },
      }),
    );
  };

  const showCookieNotice = () => {
    try {
      const savedChoice = window.localStorage.getItem(COOKIE_KEY);

      if (savedChoice) {
        emitCookieChoice(savedChoice);
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
        <p>Используем cookie для корректной работы сайта и улучшения сервиса. Можно разрешить все или оставить только необходимые. <a href="/cookies/">Подробнее</a>.</p>
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

        emitCookieChoice(button.dataset.cookieChoice);
        notice.classList.add("cookie-notice--closing");
        setCookieControlsOffset(false);
        window.setTimeout(() => notice.remove(), 280);
      });
    });
  };

  window.setTimeout(showCookieNotice, 700);

  const MEGA_MENU_CLOSE_DELAY = 380;

  document.querySelectorAll(".site-nav__mega-item").forEach((item) => {
    const trigger = item.querySelector(".site-nav__mega-trigger");
    let closeTimer = 0;

    const openMenu = () => {
      window.clearTimeout(closeTimer);
      item.classList.add("is-open");
      trigger?.setAttribute("aria-expanded", "true");
    };

    const scheduleClose = () => {
      window.clearTimeout(closeTimer);
      closeTimer = window.setTimeout(() => {
        item.classList.remove("is-open");
        trigger?.setAttribute("aria-expanded", "false");
      }, MEGA_MENU_CLOSE_DELAY);
    };

    item.addEventListener("mouseenter", openMenu);
    item.addEventListener("mouseleave", scheduleClose);
    item.addEventListener("focusin", openMenu);
    item.addEventListener("focusout", (event) => {
      if (!item.contains(event.relatedTarget)) {
        scheduleClose();
      }
    });
  });

  const contactModal = document.querySelector("#contact-modal");
  const contactModalClose = contactModal?.querySelector(".contact-modal__close");

  const closeContactModal = () => {
    if (!contactModal || contactModal.hidden) {
      return;
    }

    contactModal.hidden = true;
    document.body.style.overflow = "";
    lastFocusedElement?.focus();
  };

  const openContactModal = (trigger) => {
    if (!contactModal) {
      return;
    }

    lastFocusedElement = trigger;
    trigger.closest("details")?.removeAttribute("open");
    contactModal.hidden = false;
    document.body.style.overflow = "hidden";
    contactModalClose?.focus();
  };

  contactModalClose?.addEventListener("click", closeContactModal);

  contactModal?.addEventListener("mousedown", (event) => {
    if (event.target === contactModal) {
      closeContactModal();
    }
  });

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
