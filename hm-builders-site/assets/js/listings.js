/* =========================================================
   HM Builders — Projects & Plans listing / detail rendering
   Requires data.js to be loaded first.
   ========================================================= */

function statusBadge(status) {
  return `<span class="status ${status}">${status === 'completed' ? 'Completed Project' : 'Ongoing Project'}</span>`;
}

/* ---------- Projects listing (projects.html) ---------- */
function renderProjectsGrid(filter = 'all') {
  const grid = document.getElementById('projectsGrid');
  if (!grid) return;
  const items = filter === 'all' ? PROJECTS : PROJECTS.filter(p => p.status === filter);
  if (!items.length) {
    grid.innerHTML = `<div class="empty-state">No projects found in this category yet.</div>`;
    return;
  }
  grid.innerHTML = items.map((p, i) => `
    <div class="p-card" data-reveal="scale" style="--i:${i % 3}">
      <a href="project-view.html?id=${p.id}" class="thumb">
        <img src="${p.cover}" alt="${p.title}" loading="lazy">
        ${statusBadge(p.status)}
        <span class="thumb-title">${p.title}</span>
      </a>
      <div class="body">
        <div class="loc">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
          ${p.location}
        </div>
        <h3><a href="project-view.html?id=${p.id}">${p.title}</a></h3>
        <a href="project-view.html?id=${p.id}" class="view-link">View Project →</a>
      </div>
    </div>
  `).join('');
  document.querySelectorAll('#projectsGrid [data-reveal]').forEach(el => {
    const io = new IntersectionObserver((entries) => {
      entries.forEach(entry => { if (entry.isIntersecting) { entry.target.classList.add('in'); io.unobserve(entry.target); } });
    }, { threshold: .1 });
    io.observe(el);
  });
}

/* ---------- Plans listing (plans.html) ---------- */
function renderPlansGrid() {
  const grid = document.getElementById('plansGrid');
  if (!grid) return;
  grid.innerHTML = PLANS.map((p, i) => `
    <div class="p-card" data-reveal="scale" style="--i:${i % 3}">
      <a href="plan-view.html?id=${p.id}" class="thumb">
        <img src="${p.cover}" alt="${p.title}" loading="lazy">
        ${statusBadge(p.status)}
      </a>
      <div class="body">
        <div class="loc">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>
          ${p.type} · ${p.floors} Floor${p.floors > 1 ? 's' : ''}
        </div>
        <h3><a href="plan-view.html?id=${p.id}">${p.title}</a></h3>
        <a href="plan-view.html?id=${p.id}" class="view-link">View Plan →</a>
      </div>
    </div>
  `).join('');
  document.querySelectorAll('#plansGrid [data-reveal]').forEach(el => {
    const io = new IntersectionObserver((entries) => {
      entries.forEach(entry => { if (entry.isIntersecting) { entry.target.classList.add('in'); io.unobserve(entry.target); } });
    }, { threshold: .1 });
    io.observe(el);
  });
}

/* ---------- Project detail (project-view.html) ---------- */
function renderProjectDetail() {
  const root = document.getElementById('projectDetail');
  if (!root) return;
  const id = new URLSearchParams(location.search).get('id');
  const p = getProjectById(id) || PROJECTS[0];

  document.title = p.title + ' — HM Builders & Suppliers (Pvt) Ltd';
  document.getElementById('crumbCurrent').textContent = p.title;
  document.getElementById('bannerTitle').textContent = p.title;

  root.innerHTML = `
    <div class="detail-head" data-reveal="fade">
      <div>
        <h1>${p.title}</h1>
        <div class="detail-meta">
          <span class="m"><svg class="ic" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>${p.location}</span>
          <span class="m"><svg class="ic" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>${p.year}</span>
          <span class="m"><svg class="ic" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 21h18M5 21V7l7-4 7 4v14"/></svg>${p.category}</span>
        </div>
      </div>
      ${statusBadge(p.status)}
    </div>

    <div class="detail-hero-img" data-reveal="scale"><img src="${p.cover}" alt="${p.title}"></div>

    <div class="detail-body">
      <div class="content" data-reveal="left">
        <h3>Project Overview</h3>
        <p>${p.description}</p>
        <h3>Gallery</h3>
        <div class="gallery" id="projectGallery">
          ${p.gallery.map((img, i) => `<a href="#" data-idx="${i}"><img src="${img}" alt="${p.title} photo ${i + 1}" loading="lazy"></a>`).join('')}
        </div>
      </div>
      <div data-reveal="right">
        <div class="spec-card">
          <h4>Project Details</h4>
          <div class="spec-row"><span>Status</span><span>${p.status === 'completed' ? 'Completed' : 'Ongoing'}</span></div>
          <div class="spec-row"><span>Location</span><span>${p.location}</span></div>
          <div class="spec-row"><span>Category</span><span>${p.category}</span></div>
          <div class="spec-row"><span>Year</span><span>${p.year}</span></div>
          <a href="#quote" class="btn btn-primary" onclick="openDrawer(event)">Request A Similar Quote</a>
        </div>
      </div>
    </div>
  `;

  setupLightbox('#projectGallery a', p.gallery);
  renderRelatedProjects(p.id);
  document.querySelectorAll('#projectDetail [data-reveal]').forEach(el => el.classList.add('in'));
}

function renderRelatedProjects(excludeId) {
  const wrap = document.getElementById('relatedProjects');
  if (!wrap) return;
  const items = PROJECTS.filter(p => p.id !== Number(excludeId)).slice(0, 3);
  wrap.innerHTML = items.map(p => `
    <div class="p-card">
      <a href="project-view.html?id=${p.id}" class="thumb">
        <img src="${p.cover}" alt="${p.title}" loading="lazy">
        ${statusBadge(p.status)}
        <span class="thumb-title">${p.title}</span>
      </a>
      <div class="body">
        <div class="loc">${p.location}</div>
        <h3><a href="project-view.html?id=${p.id}">${p.title}</a></h3>
        <a href="project-view.html?id=${p.id}" class="view-link">View Project →</a>
      </div>
    </div>
  `).join('');
}

/* ---------- Plan detail (plan-view.html) ---------- */
function renderPlanDetail() {
  const root = document.getElementById('planDetail');
  if (!root) return;
  const id = new URLSearchParams(location.search).get('id');
  const p = getPlanById(id) || PLANS[0];

  document.title = p.title + ' — HM Builders & Suppliers (Pvt) Ltd';
  document.getElementById('crumbCurrent').textContent = p.title;
  document.getElementById('bannerTitle').textContent = p.title;

  root.innerHTML = `
    <div class="detail-head" data-reveal="fade">
      <div>
        <h1>${p.title}</h1>
        <div class="detail-meta">
          <span class="m"><svg class="ic" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/></svg>${p.type}</span>
          <span class="m"><svg class="ic" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 21h18M5 21V7l7-4 7 4v14"/></svg>${p.floors} Floor${p.floors > 1 ? 's' : ''}</span>
        </div>
      </div>
      ${statusBadge(p.status)}
    </div>

    <div class="detail-hero-img" data-reveal="scale"><img src="${p.cover}" alt="${p.title}"></div>

    <div class="detail-body">
      <div class="content" data-reveal="left">
        <h3>Plan Overview</h3>
        <p>${p.description}</p>
        <h3>Plan Gallery (${p.gallery.length} images)</h3>
        <div class="gallery" id="planGallery">
          ${p.gallery.map((img, i) => `<a href="#" data-idx="${i}"><img src="${img}" alt="${p.title} plan image ${i + 1}" loading="lazy"></a>`).join('')}
        </div>
      </div>
      <div data-reveal="right">
        <div class="spec-card">
          <h4>Plan Details</h4>
          <div class="spec-row"><span>Type</span><span>${p.type}</span></div>
          <div class="spec-row"><span>Floors</span><span>${p.floors}</span></div>
          <div class="spec-row"><span>Status</span><span>${p.status === 'completed' ? 'Completed' : 'Ongoing'}</span></div>
          <a href="#quote" class="btn btn-primary" onclick="openDrawer(event)">Request This Plan</a>
        </div>
      </div>
    </div>
  `;

  setupLightbox('#planGallery a', p.gallery);
  document.querySelectorAll('#planDetail [data-reveal]').forEach(el => el.classList.add('in'));
}

/* ---------- Lightbox (shared) ---------- */
function setupLightbox(selector, images) {
  const links = document.querySelectorAll(selector);
  const lb = document.getElementById('lightbox');
  if (!lb) return;
  const lbImg = document.getElementById('lightboxImg');
  let idx = 0;

  function show(i) {
    idx = (i + images.length) % images.length;
    lbImg.src = images[idx];
    lb.classList.add('open');
  }
  links.forEach(link => {
    link.addEventListener('click', (e) => {
      e.preventDefault();
      show(parseInt(link.dataset.idx, 10));
    });
  });
  document.getElementById('lbClose').addEventListener('click', () => lb.classList.remove('open'));
  document.getElementById('lbPrev').addEventListener('click', () => show(idx - 1));
  document.getElementById('lbNext').addEventListener('click', () => show(idx + 1));
  lb.addEventListener('click', (e) => { if (e.target === lb) lb.classList.remove('open'); });
}

/* ---------- Filter bar (projects.html) ---------- */
document.addEventListener('DOMContentLoaded', () => {
  const filterBar = document.getElementById('projectFilters');
  if (filterBar) {
    filterBar.addEventListener('click', (e) => {
      const btn = e.target.closest('button');
      if (!btn) return;
      filterBar.querySelectorAll('button').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      renderProjectsGrid(btn.dataset.filter);
    });
  }
  renderProjectsGrid();
  renderPlansGrid();
  renderProjectDetail();
  renderPlanDetail();
});
