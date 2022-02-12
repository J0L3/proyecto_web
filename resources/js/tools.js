$('.input-number-line').on('input', function () { 
	this.value = this.value.replace(/[^0-9-]/g,'');
  });
   $('.input-number-guion-abajo').on('input', function () { 
	this.value = this.value.replace(/[^0-9_]/g,'');
  });
  $('.input-number').on('input', function () { 
	this.value = this.value.replace(/[^0-9]/g,'');
  });
  
   $('.texto').on('input', function () { 
	this.value = this.value.replace(/[^a-zA.():/,@ _-]/g,'');
  });
  $('.fuente').on('input', function () { 
	this.value = this.value.replace(/[^0-9a-zA-ZñÑáéíóúÁÉÍÓÚ.()/::,@ _-]/g,'');
  });