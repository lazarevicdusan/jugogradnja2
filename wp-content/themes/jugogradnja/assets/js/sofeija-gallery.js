(function () {
  var modal    = document.getElementById('jg-sof-modal');
  var backdrop = document.getElementById('jg-sof-backdrop');
  if (!modal || !backdrop) return;

  var modalImg  = modal.querySelector('.jg-sof-modal__img');
  var modalCap  = modal.querySelector('.jg-sof-modal__caption');
  var modalDots = modal.querySelector('.jg-sof-modal__dots');
  var btnClose  = modal.querySelector('.jg-sof-modal__close');
  var btnPrev   = modal.querySelector('.jg-sof-modal__prev');
  var btnNext   = modal.querySelector('.jg-sof-modal__next');

  var images  = [];
  var current = 0;

function openGallery(imgs) {
    images  = imgs;
    current = 0;
    showSlide(0);
    modal.removeAttribute('hidden');
    backdrop.removeAttribute('hidden');
    document.body.style.overflow = 'hidden';
    btnClose.focus();
  }

  function closeGallery() {
    modal.setAttribute('hidden', '');
    backdrop.setAttribute('hidden', '');
    document.body.style.overflow = '';
    images  = [];
    current = 0;
  }

  function showSlide(idx) {
    current = (idx + images.length) % images.length;
    modalImg.src = images[current].src;
    modalImg.alt = images[current].alt;
    if (modalCap) modalCap.textContent = images[current].alt;
    btnPrev.style.display = images.length > 1 ? '' : 'none';
    btnNext.style.display = images.length > 1 ? '' : 'none';
    buildDots();
  }

  function buildDots() {
    if (!modalDots) return;
    modalDots.innerHTML = '';
    if (images.length <= 1) return;
    images.forEach(function (_, i) {
      var dot = document.createElement('button');
      dot.className = 'jg-sof-modal__dot' + (i === current ? ' is-active' : '');
      dot.setAttribute('aria-label', 'Слика ' + (i + 1));
      dot.addEventListener('click', function () { showSlide(i); });
      modalDots.appendChild(dot);
    });
  }

  var cards = document.querySelectorAll('.jg-sofeija-gallery__card[data-gallery]');

  cards.forEach(function (card) {
    card.addEventListener('click', function () {
      var imgs;
      try { imgs = JSON.parse(card.getAttribute('data-gallery')); } catch (e) { return; }
      openGallery(imgs);
    });
  });

  btnClose.addEventListener('click', closeGallery);
  backdrop.addEventListener('click', closeGallery);
  btnPrev.addEventListener('click', function () { showSlide(current - 1); });
  btnNext.addEventListener('click', function () { showSlide(current + 1); });

  document.addEventListener('keydown', function (e) {
    if (modal.hasAttribute('hidden')) return;
    if (e.key === 'Escape')     closeGallery();
    if (e.key === 'ArrowLeft')  showSlide(current - 1);
    if (e.key === 'ArrowRight') showSlide(current + 1);
  });
})();
