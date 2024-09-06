const cards = document.querySelectorAll('.card');

cards.forEach(card => {
  card.addEventListener('mouseover', function() {
    this.querySelector('.card-body').style.display = 'block';
  });

  card.addEventListener('mouseout', function() {
    this.querySelector('.card-body').style.display = 'none';
  });
});

document.addEventListener('DOMContentLoaded', function() {
  const themeToggleBtn = document.getElementById('theme-toggle');
  const currentTheme = localStorage.getItem('theme') || 'light';

  if (currentTheme === 'dark') {
    document.body.classList.add('dark-mode');
    themeToggleBtn.textContent = 'Karanlık Tema';
    themeToggleBtn.classList.remove('btn-light');
    themeToggleBtn.classList.add('btn-dark');
  } else {
    document.body.classList.add('light-mode');
  }

  themeToggleBtn.addEventListener('click', function() {
    document.body.classList.toggle('dark-mode');
    document.body.classList.toggle('light-mode');

    const theme = document.body.classList.contains('dark-mode') ? 'dark' : 'light';
    localStorage.setItem('theme', theme);

    if (theme === 'dark') {
      themeToggleBtn.textContent = 'Aydınlık Tema';
      themeToggleBtn.classList.remove('btn-light');
      themeToggleBtn.classList.add('btn-dark');
    } else {
      themeToggleBtn.textContent = 'Karanlık Tema';
      themeToggleBtn.classList.remove('btn-dark');
      themeToggleBtn.classList.add('btn-light');
    }
  });
});
