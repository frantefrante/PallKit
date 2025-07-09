document.addEventListener('click', function(event) {
  const info = event.target.closest('.info');
  const activeInfos = document.querySelectorAll('.info.active');
  activeInfos.forEach(el => {
    if (el !== info) el.classList.remove('active');
  });
  if (info) {
    event.preventDefault();
    info.classList.toggle('active');
  }
});
