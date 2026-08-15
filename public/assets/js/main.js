/* =========================================================
   HM Builders — Shared behaviours (all pages)
   ========================================================= */

document.addEventListener('DOMContentLoaded', () => {

  /* ---------- Hero image slider (home page only) ---------- */
  const slides = document.querySelectorAll('.hero-slide');
  const dotsWrap = document.getElementById('sliderDots');
  const progress = document.getElementById('heroProgress');
  if (slides.length && dotsWrap) {
    let current = 0;
    const SLIDE_TIME = 6000;
    let slideTimer;

    slides.forEach((_, i) => {
      const b = document.createElement('button');
      if (i === 0) b.classList.add('active');
      b.setAttribute('aria-label', 'Go to slide ' + (i + 1));
      b.addEventListener('click', () => goToSlide(i));
      dotsWrap.appendChild(b);
    });
    const dots = dotsWrap.querySelectorAll('button');

    function goToSlide(i) {
      slides[current].classList.remove('active');
      dots[current].classList.remove('active');
      current = (i + slides.length) % slides.length;
      slides[current].classList.add('active');
      dots[current].classList.add('active');
      restartAutoplay();
    }
    function nextSlide() { goToSlide(current + 1); }
    function prevSlide() { goToSlide(current - 1); }

    const nextBtn = document.getElementById('nextSlide');
    const prevBtn = document.getElementById('prevSlide');
    if (nextBtn) nextBtn.addEventListener('click', nextSlide);
    if (prevBtn) prevBtn.addEventListener('click', prevSlide);

    function restartAutoplay() {
      clearTimeout(slideTimer);
      if (progress) {
        progress.style.transition = 'none';
        progress.style.width = '0%';
        requestAnimationFrame(() => {
          progress.style.transition = `width ${SLIDE_TIME}ms linear`;
          progress.style.width = '100%';
        });
      }
      slideTimer = setTimeout(nextSlide, SLIDE_TIME);
    }
    restartAutoplay();
  }

  /* ---------- Home services scroller ---------- */
  document.querySelectorAll('[data-services-carousel]').forEach(carousel => {
    const viewport = carousel.querySelector('.services-scroll');
    const cards = [...carousel.querySelectorAll('.svc-card')];
    const controls = carousel.parentElement ? carousel.parentElement.querySelector('[data-services-controls]') : null;
    const prevBtn = controls ? controls.querySelector('[data-services-prev]') : null;
    const nextBtn = controls ? controls.querySelector('[data-services-next]') : null;
    if (!viewport || cards.length < 2) return;

    let current = 0;
    let timer;

    const visibleCount = () => {
      if (window.matchMedia('(max-width: 640px)').matches) return 1;
      if (window.matchMedia('(max-width: 1080px)').matches) return 2;
      return 3;
    };
    const maxIndex = () => Math.max(cards.length - visibleCount(), 0);
    const scrollCurrent = (behavior = 'smooth') => {
      current = Math.min(current, maxIndex());
      viewport.scrollTo({ left: cards[current].offsetLeft, behavior });
    };
    const go = direction => {
      const max = maxIndex();
      if (!max) return;
      current = direction > 0 ? (current >= max ? 0 : current + 1) : (current <= 0 ? max : current - 1);
      scrollCurrent();
    };
    const stop = () => clearInterval(timer);
    const start = () => {
      stop();
      if (maxIndex()) timer = setInterval(() => go(1), 4200);
    };

    if (prevBtn) prevBtn.addEventListener('click', () => { go(-1); start(); });
    if (nextBtn) nextBtn.addEventListener('click', () => { go(1); start(); });
    carousel.addEventListener('mouseenter', stop);
    carousel.addEventListener('mouseleave', start);
    if (controls) {
      controls.addEventListener('mouseenter', stop);
      controls.addEventListener('mouseleave', start);
    }
    window.addEventListener('resize', () => { scrollCurrent('auto'); start(); });
    start();
  });

  /* ---------- Home team random slider ---------- */
  document.querySelectorAll('[data-random-team-carousel]').forEach(carousel => {
    const cards = [...carousel.querySelectorAll('.team-card')];
    if (cards.length < 2) return;

    let currentCards = [];
    let timer;

    const visibleCount = () => {
      if (window.matchMedia('(max-width: 640px)').matches) return 1;
      if (window.matchMedia('(max-width: 1080px)').matches) return 2;
      return 4;
    };
    const shuffle = items => {
      const copy = [...items];
      for (let i = copy.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [copy[i], copy[j]] = [copy[j], copy[i]];
      }
      return copy;
    };
    const chooseCards = count => {
      const freshCards = cards.filter(card => !currentCards.includes(card));
      const source = freshCards.length >= count ? freshCards : cards;
      return shuffle(source).slice(0, count);
    };
    const showRandomCards = () => {
      const count = Math.min(visibleCount(), cards.length);
      currentCards = chooseCards(count);
      cards.forEach(card => {
        card.classList.remove('is-visible');
        card.style.removeProperty('--i');
      });
      currentCards.forEach((card, i) => {
        card.style.setProperty('--i', i);
        carousel.appendChild(card);
        card.classList.add('is-visible');
      });
      cards.filter(card => !currentCards.includes(card)).forEach(card => carousel.appendChild(card));
      carousel.classList.add('is-randomized');
    };
    const stop = () => clearInterval(timer);
    const start = () => {
      stop();
      timer = setInterval(showRandomCards, 5200);
    };

    showRandomCards();
    start();
    carousel.addEventListener('mouseenter', stop);
    carousel.addEventListener('mouseleave', start);
    window.addEventListener('resize', () => {
      showRandomCards();
      start();
    });
  });

  /* ---------- Entrance / scroll reveal ---------- */
  const revealEls = document.querySelectorAll('[data-reveal]');
  const io = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const parent = entry.target.closest('.stagger');
        if (parent) {
          [...parent.children].forEach((child, i) => child.style.setProperty('--i', i));
        }
        entry.target.classList.add('in');
        io.unobserve(entry.target);
      }
    });
  }, { threshold: .15, rootMargin: '0px 0px -60px 0px' });
  revealEls.forEach(el => io.observe(el));

  /* Reveal hero / banner elements immediately on load */
  window.addEventListener('load', () => {
    document.querySelectorAll('.hero [data-reveal], .page-banner [data-reveal]').forEach(el => el.classList.add('in'));
  });

  /* ---------- Counter animation ---------- */
  const counters = document.querySelectorAll('.count');
  const cio = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const el = entry.target;
        const target = parseInt(el.dataset.target, 10);
        const duration = 1600;
        const startTime = performance.now();
        function tick(now) {
          const p = Math.min((now - startTime) / duration, 1);
          const eased = 1 - Math.pow(1 - p, 3);
          el.textContent = Math.floor(eased * target);
          if (p < 1) requestAnimationFrame(tick); else el.textContent = target;
        }
        requestAnimationFrame(tick);
        cio.unobserve(el);
      }
    });
  }, { threshold: .5 });
  counters.forEach(c => cio.observe(c));

  /* ---------- Mobile nav ---------- */
  const burger = document.getElementById('burger');
  const mobilePanel = document.getElementById('mobilePanel');
  const closeMobile = document.getElementById('closeMobile');
  if (burger && mobilePanel) {
    burger.addEventListener('click', () => mobilePanel.classList.add('open'));
    if (closeMobile) closeMobile.addEventListener('click', () => mobilePanel.classList.remove('open'));
    mobilePanel.querySelectorAll('a').forEach(a => a.addEventListener('click', () => mobilePanel.classList.remove('open')));
  }

  /* ---------- Quote drawer ---------- */
  const overlay = document.getElementById('overlay');
  const drawer = document.getElementById('drawer');
  window.openDrawer = function (e) {
    if (e) e.preventDefault();
    if (overlay) overlay.classList.add('open');
    if (drawer) drawer.classList.add('open');
  };
  window.closeDrawer = function () {
    if (overlay) overlay.classList.remove('open');
    if (drawer) drawer.classList.remove('open');
  };
  const drawerClose = document.getElementById('drawerClose');
  if (drawerClose) drawerClose.addEventListener('click', closeDrawer);
  if (overlay) overlay.addEventListener('click', closeDrawer);

  /* ---------- Header scroll back-to-top ---------- */
  const backTop = document.getElementById('backTop');
  window.addEventListener('scroll', () => {
    if (backTop) backTop.classList.toggle('show', window.scrollY > 700);
  });
  if (backTop) backTop.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

  /* ---------- Forms ---------- */
  window.handleSubmit = function (e) {
    e.preventDefault();
    const btn = e.target.querySelector('button[type="submit"]');
    const original = btn.textContent;
    btn.textContent = 'Message Sent ✓';
    btn.style.background = 'var(--secondary)';
    setTimeout(() => {
      btn.textContent = original;
      btn.style.background = '';
      e.target.reset();
      closeDrawer();
    }, 1800);
    return false;
  };

  /* ---------- Laravel card filters ---------- */
  const filterBar = document.getElementById('projectFilters');
  if (filterBar) {
    filterBar.addEventListener('click', (e) => {
      const btn = e.target.closest('button[data-filter]');
      if (!btn) return;
      const filter = btn.dataset.filter;
      filterBar.querySelectorAll('button').forEach(item => item.classList.remove('active'));
      btn.classList.add('active');
      document.querySelectorAll('[data-card-filter]').forEach(card => {
        card.style.display = filter === 'all' || card.dataset.cardFilter === filter ? '' : 'none';
      });
    });
  }

  /* ---------- Laravel gallery lightbox ---------- */
  const lb = document.getElementById('lightbox');
  const lbImg = document.getElementById('lightboxImg');
  const lbClose = document.getElementById('lbClose');
  const lbPrev = document.getElementById('lbPrev');
  const lbNext = document.getElementById('lbNext');
  let lightboxImages = [];
  let lightboxIndex = 0;

  function closeLightbox() {
    if (!lb) return;
    lb.classList.remove('open');
    lb.setAttribute('aria-hidden', 'true');
  }

  function showLightbox(index) {
    if (!lb || !lbImg || !lightboxImages.length) return;
    lightboxIndex = (index + lightboxImages.length) % lightboxImages.length;
    lbImg.src = lightboxImages[lightboxIndex].href;
    lbImg.alt = lightboxImages[lightboxIndex].querySelector('img')?.alt || '';
    lb.classList.add('open');
    lb.setAttribute('aria-hidden', 'false');
  }

  document.querySelectorAll('[data-lightbox]').forEach(link => {
    link.addEventListener('click', (e) => {
      e.preventDefault();
      const group = link.dataset.lightbox;
      lightboxImages = [...document.querySelectorAll(`[data-lightbox="${group}"]`)];
      showLightbox(lightboxImages.indexOf(link));
    });
  });
  if (lbClose) lbClose.addEventListener('click', closeLightbox);
  if (lbPrev) lbPrev.addEventListener('click', () => showLightbox(lightboxIndex - 1));
  if (lbNext) lbNext.addEventListener('click', () => showLightbox(lightboxIndex + 1));
  if (lb) lb.addEventListener('click', (e) => {
    if (e.target === lb) closeLightbox();
  });

  /* ---------- Laravel AJAX forms ---------- */
  window.handleSubmit = function (e) {
    e.preventDefault();
    const form = e.target;
    const btn = form.querySelector('button[type="submit"]');
    const original = btn ? btn.textContent : '';
    const messageTarget = form.dataset.successTarget ? document.querySelector(form.dataset.successTarget) : null;

    if (messageTarget) {
      messageTarget.className = 'form-message';
      messageTarget.textContent = '';
    }
    if (btn) {
      btn.disabled = true;
      btn.textContent = 'Sending...';
    }

    if (form.classList.contains('js-ajax-form') && form.action) {
      fetch(form.action, {
        method: form.method || 'POST',
        body: new FormData(form),
        headers: {
          'Accept': 'application/json',
          'X-Requested-With': 'XMLHttpRequest'
        }
      })
        .then(response => {
          if (!response.ok) throw new Error('Request failed');
          return response.json();
        })
        .then(data => {
          if (messageTarget) {
            messageTarget.className = 'form-message success';
            messageTarget.textContent = data.success || 'Message sent successfully.';
          }
          form.reset();
          if (form.closest('#drawer')) setTimeout(closeDrawer, 1500);
        })
        .catch(() => {
          if (messageTarget) {
            messageTarget.className = 'form-message error';
            messageTarget.textContent = 'Something went wrong. Please try again.';
          }
        })
        .finally(() => {
          if (btn) {
            btn.disabled = false;
            btn.textContent = original;
          }
        });
      return false;
    }

    if (btn) {
      btn.textContent = 'Message Sent';
      btn.style.background = 'var(--secondary)';
      setTimeout(() => {
        btn.textContent = original;
        btn.style.background = '';
        form.reset();
        closeDrawer();
      }, 1800);
    }
    return false;
  };

  document.querySelectorAll('form.js-ajax-form').forEach(form => {
    form.addEventListener('submit', window.handleSubmit);
  });

});
