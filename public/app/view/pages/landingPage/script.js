$(document).ready(function() {
  var lastScrollTop = 0;
  
  // Função para animar elementos quando visíveis
  function animateOnScroll() {
      var scrollTop = $(window).scrollTop();
      var windowHeight = $(window).height();
      
      $('.quemsomos, .ajuda').each(function() {
          var elementTop = $(this).offset().top;
          
          // Verifica se o elemento está visível na janela
          if (elementTop >= scrollTop && elementTop <= scrollTop + windowHeight) {
              $(this).addClass('animate');
          } else {
              $(this).removeClass('animate');
          }
      });
  }

  // Chamar a função inicialmente
  animateOnScroll();

  // Verificar a visibilidade durante o scroll
  $(window).scroll(function() {
      animateOnScroll();
  });
});
