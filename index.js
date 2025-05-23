const form = document.getElementById('checkoutForm');
  const overlay = document.getElementById('overlay');
  const popupContent = document.getElementById('popupContent');

  form.addEventListener('submit', function(e) {
    e.preventDefault();

    let valid = true;

    form.querySelectorAll('input[required]').forEach(input => {
      if (!input.value.trim()) {
        input.style.border = '2px solid red';
        valid = false;
      } else {
        input.style.border = '1px solid #bbb';
      }
    });

    if (!valid) return;

    overlay.classList.add('active');
    popupContent.innerHTML = `<div class="loader"></div>Processando seu pagamento...`;

    setTimeout(() => {
      const sucesso = false;
      if (sucesso) {
        popupContent.innerHTML = 'Pagamento realizado com sucesso!';
        setTimeout(() => {
          overlay.classList.remove('active');
          form.reset();
        }, 3000);
      } else {
        popupContent.innerHTML = `
          <div style="font-size: 40px; color:#e63946; margin-bottom: 15px;">&#9888;</div>
          Ops! Seu pagamento não foi realizado.<br />Tente novamente ou escolha outro método.
        `;
      }
    }, 3000);
  });