/* ── Header scroll ───────────────────────────────── */
const hdr = document.getElementById('site-header');
if (hdr) window.addEventListener('scroll', () =>
  hdr.classList.toggle('scrolled', scrollY > 10), { passive: true });

/* ── Mobile nav ──────────────────────────────────── */
const burger  = document.getElementById('hd-burger');
const mobileNav = document.getElementById('mobile-nav');
if (burger && mobileNav) {
  burger.addEventListener('click', () => {
    const open = mobileNav.classList.toggle('open');
    burger.setAttribute('aria-expanded', open);
    mobileNav.setAttribute('aria-hidden', !open);
  });
  document.addEventListener('click', e => {
    if (!hdr.contains(e.target) && !mobileNav.contains(e.target))
      mobileNav.classList.remove('open');
  });
}

/* ── Scroll reveal ───────────────────────────────── */
const reveals = document.querySelectorAll('.reveal');
if (reveals.length) {
  const io = new IntersectionObserver(entries => {
    entries.forEach((e, i) => {
      if (e.isIntersecting) {
        setTimeout(() => e.target.classList.add('in'), i * 60);
        io.unobserve(e.target);
      }
    });
  }, { threshold: .1 });
  reveals.forEach(el => io.observe(el));
}

/* ── Skill bar animation ─────────────────────────── */
const fills = document.querySelectorAll('.skill-fill');
if (fills.length) {
  const sio = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.style.width = e.target.dataset.w + '%';
        sio.unobserve(e.target);
      }
    });
  }, { threshold: .3 });
  fills.forEach(f => { f.style.width = '0'; sio.observe(f); });
}

/* ── Portfolio filter ────────────────────────────── */
document.querySelectorAll('.filter-btn').forEach(btn => {
  btn.addEventListener('click', () => {
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    const cat = btn.dataset.filter;
    document.querySelectorAll('.proj-card').forEach(card => {
      const show = cat === 'all' || card.dataset.cat === cat;
      card.style.display = show ? '' : 'none';
    });
  });
});

/* ── Contact form ────────────────────────────────── */
const form = document.getElementById('contact-form');
if (form) {
  form.addEventListener('submit', async e => {
    e.preventDefault();
    const btn    = form.querySelector('[type="submit"]');
    const fb     = document.getElementById('form-fb');
    const action = form.dataset.action || form.getAttribute('data-action');
    btn.disabled = true;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending…';
    try {
      const res  = await fetch(action, {
        method: 'POST',
        body: new FormData(form),
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
      });
      const data = await res.json();
      fb.className = 'form-feedback ' + (data.ok ? 'ok' : 'err');
      fb.innerHTML = `<i class="fas fa-${data.ok ? 'check-circle' : 'exclamation-circle'}"></i> ${data.msg}`;
      if (data.ok) form.reset();
    } catch {
      fb.className = 'form-feedback err';
      fb.innerHTML = '<i class="fas fa-exclamation-circle"></i> Something went wrong. Please try again.';
    }
    btn.disabled = false;
    btn.innerHTML = '<i class="fas fa-paper-plane"></i> Send Message';
  });
}
