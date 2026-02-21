(function () {
  'use strict';

  var root = document.querySelector('.dc26-examen-listing');
  if (!root) return;

  var select = root.querySelector('.dc26-examen-listing__filter');
  if (!select) return;

  var sections = root.querySelectorAll('[data-year]');

  select.addEventListener('change', function () {
    var chosen = select.value;
    sections.forEach(function (section) {
      section.classList.toggle('is-hidden', section.dataset.year !== chosen);
    });
  });
})();
