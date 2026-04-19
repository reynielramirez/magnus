  document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('imageModal');
    const closeBtn = document.querySelector('.modal-carousel-close');
    const prevBtn = document.querySelector('.carousel-prev');
    const nextBtn = document.querySelector('.carousel-next');
    const slidesContainer = document.querySelector('.carousel-slides');
    const slides = document.querySelectorAll('.carousel-slide');
    const indicators = document.querySelectorAll('.indicator-dot');
    const currentSlideSpan = document.querySelector('.current-slide');
    const galleryThumbs = document.querySelectorAll('.gallery-thumb');
    
    let currentIndex = 0;
    let totalSlides = slides.length;
    
    // Función para actualizar el carrusel
    function updateCarousel(index) {
      if (index < 0) {
        index = totalSlides - 1;
      } else if (index >= totalSlides) {
        index = 0;
      }
      
      currentIndex = index;
      
      // Mover el slides container
      const offset = -currentIndex * 100;
      slidesContainer.style.transform = `translateX(${offset}%)`;
      
      // Actualizar indicadores
      indicators.forEach((indicator, i) => {
        if (i === currentIndex) {
          indicator.classList.add('active');
        } else {
          indicator.classList.remove('active');
        }
      });
      
      // Actualizar contador
      if (currentSlideSpan) {
        currentSlideSpan.textContent = currentIndex + 1;
      }
      
      // Añadir animación a la imagen actual
      const currentSlide = slides[currentIndex];
      const currentImg = currentSlide.querySelector('.carousel-image');
      if (currentImg) {
        currentImg.style.animation = 'none';
        setTimeout(() => {
          currentImg.style.animation = 'zoomIn 0.3s ease';
        }, 10);
      }
    }
    
    // Navegación
    function nextSlide() {
      updateCarousel(currentIndex + 1);
    }
    
    function prevSlide() {
      updateCarousel(currentIndex - 1);
    }
    
    // Abrir modal con índice específico
    function openModal(startIndex) {
      currentIndex = startIndex;
      updateCarousel(currentIndex);
      modal.classList.add('show');
      document.body.style.overflow = 'hidden';
      
      // Prevenir scroll en touch devices
      modal.addEventListener('touchmove', preventScroll, { passive: false });
    }
    
    function closeModal() {
      modal.classList.remove('show');
      document.body.style.overflow = '';
      modal.removeEventListener('touchmove', preventScroll);
    }
    
    function preventScroll(e) {
      e.preventDefault();
    }
    
    // Event listeners para las miniaturas
    galleryThumbs.forEach((thumb, index) => {
      thumb.addEventListener('click', function() {
        openModal(index);
      });
    });
    
    // Event listeners del carrusel
    nextBtn.addEventListener('click', nextSlide);
    prevBtn.addEventListener('click', prevSlide);
    closeBtn.addEventListener('click', closeModal);
    
    // Cerrar al hacer clic en el overlay
    modal.querySelector('.modal-carousel-overlay').addEventListener('click', closeModal);
    
    // Cerrar con tecla ESC
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape' && modal.classList.contains('show')) {
        closeModal();
      }
      
      // Navegación con teclas de flecha
      if (modal.classList.contains('show')) {
        if (e.key === 'ArrowLeft') {
          prevSlide();
        } else if (e.key === 'ArrowRight') {
          nextSlide();
        }
      }
    });
    
    // Click en indicadores
    indicators.forEach((indicator, index) => {
      indicator.addEventListener('click', () => {
        updateCarousel(index);
      });
    });
    
    // Swipe para touch devices
    let touchStartX = 0;
    let touchEndX = 0;
    
    const carouselContainer = document.querySelector('.carousel-container');
    
    carouselContainer.addEventListener('touchstart', (e) => {
      touchStartX = e.changedTouches[0].screenX;
    });
    
    carouselContainer.addEventListener('touchend', (e) => {
      touchEndX = e.changedTouches[0].screenX;
      handleSwipe();
    });
    
    function handleSwipe() {
      const swipeThreshold = 50;
      const diff = touchEndX - touchStartX;
      
      if (Math.abs(diff) > swipeThreshold) {
        if (diff > 0) {
          // Swipe derecha -> anterior
          prevSlide();
        } else {
          // Swipe izquierda -> siguiente
          nextSlide();
        }
      }
    }
    
    // Prevenir que el clic en el contenido del modal lo cierre
    modal.querySelector('.modal-carousel-content').addEventListener('click', (e) => {
      e.stopPropagation();
    });
    
    // Auto-play opcional (descomentar si se desea)
    /*
    let autoPlayInterval;
    
    function startAutoPlay() {
      autoPlayInterval = setInterval(() => {
        if (modal.classList.contains('show')) {
          nextSlide();
        }
      }, 5000);
    }
    
    function stopAutoPlay() {
      clearInterval(autoPlayInterval);
    }
    
    modal.addEventListener('mouseenter', stopAutoPlay);
    modal.addEventListener('mouseleave', startAutoPlay);
    
    // Iniciar auto-play cuando se abre el modal
    const originalOpenModal = openModal;
    window.openModal = function(startIndex) {
      originalOpenModal(startIndex);
      startAutoPlay();
    };
    */
  });