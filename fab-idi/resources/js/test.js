
            //console.log($('input[name="tipo_colaborador"]:checked').val());
            console.log($(this).parent().parent().parent().find('a'));
$(document).on('change', 'input[name="tipo_colaborador"]', function () {
  if (this.checked) {
    let tipoColaborador = $(this).val();
    let usuarioId = usuario.id;
    let ruta = `/crear-colaborador/${usuarioId}/${tipoColaborador}`;
    let colaboradorBtn = $(this).siblings('a');

    colaboradorBtn.attr('href', ruta); // Primero actualizamos el atributo href
    let hrefValue = colaboradorBtn.attr('href'); // Luego obtenemos el valor actualizado
    console.log(hrefValue);

    colaboradorBtn.text(`Crear Colaborador (${ruta})`); // Agregamos la ruta al texto del enlace
  }
});
      
       
       if (this.checked) {
                  let tipoColaborador = this.value;
                  console.log('Hola');
                  rowHtml = `
                    <a href="/crear-colaborador/${usuario.id}/${tipoColaborador}" class="btn btn-success">Crear Colaborador</a>
                  </div>
                </td>
              </tr>`;
  
                  tbody.innerHTML += rowHtml;
                }
  
  
  
  // Solo dejar seleccionar un radio button
  // $('input[type="radio"]').on('click', function () {
  //   console.log('sola');
  //   // Desmarcar todos los radio buttons del mismo nombre en la página
  //   $('input[name="' + $(this).attr('name') + '"]').prop('checked', false);
  //   // Marcar solo el radio button seleccionado
  //   $(this).prop('checked', true);
  //   console.log($(this).val());
  // });

  $('input[name="tipo_colaborador"]').on('change', function () {
    console.log('sola');
  });

  
  console.log(document.querySelector('#tipo_colaborador_seleccionado'));
          

  // const radioButtons = document.querySelectorAll('input[name="tipo_colaborador"]');    
  // radioButtons.forEach(function (radioButton) {
  //   console.log(radioButton);
  //   radioButton.addEventListener('change', function () {
  //     console.log('ff');
  //     document.getElementById('tipo_colaborador_seleccionado').value = this.value;
  //   });
  // });

  // let tipoColaborador = null;
  // const tipoColaboradorSeleccionado = document.querySelector('input[name="tipo_colaborador"]:checked');
  // if (tipoColaboradorSeleccionado !== null) {
  //   tipoColaborador = tipoColaboradorSeleccionado.value;
  // }