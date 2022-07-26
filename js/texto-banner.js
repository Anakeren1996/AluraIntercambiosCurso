var options = {
  strings: [data.texto_1, data.texto_2],
  // CONFIGURAÇÃO DA VELOCIDADE DE DIGITAÇÃO
  typeSpeed: 80,
  // VELOCIDADE PARA APAGAR AS LETRAS
  backSpeed: 80,
  // O LOOP ALTERNA ENTRE TEXTO 1 E TEXTO 2
  loop: true
};

var typed = new Typed('#texto-banner', options);
