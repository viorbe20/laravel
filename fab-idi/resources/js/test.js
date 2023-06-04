import $ from 'jquery';

$(document).ready(function() {
    // Variables
    var testimonials = $('.testimonial');
    var currentIndex = 0;
    var numVisible = 3; // Número de testimonios visibles a la vez
    
    // Mostrar los primeros testimonios
    testimonials.slice(0, numVisible).addClass('active');
    
    // Función para mostrar los siguientes testimonios
    function showNextTestimonials() {
      var nextIndex = (currentIndex + 1) % testimonials.length;
      
      // Calcular los índices de los testimonios visibles
      var visibleIndices = [];
      for (var i = 0; i < numVisible; i++) {
        visibleIndices.push((nextIndex + i) % testimonials.length);
      }
      
      // Ocultar los testimonios actuales
      testimonials.removeClass('active');
      
      // Mostrar los siguientes testimonios
      testimonials.each(function(index) {
        if (visibleIndices.includes(index)) {
          $(this).addClass('active');
        }
      });
      
      currentIndex = nextIndex;
    }
    
    // Intervalo para cambiar los testimonios cada 3 segundos
    setInterval(showNextTestimonials, 3000);
});
