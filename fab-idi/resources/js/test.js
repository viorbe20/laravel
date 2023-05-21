let rowHtml = `
<tr>
  <td>${usuario.nombre}</td>
  <td>${usuario.apellidos}</td>
  <td>
    <form method="post" action="{{ route('crear-colaborador-post', ['id' => ${usuario.id}]) }}">
    <div style="display:flex;justify-content: flex-end">
        <div class="form-check" style="margin: 0% 2%">
          <input class="form-check-input" type="radio" name="tipo_colaborador" id="tipo_colaborador_embajador" value="2" required>
          <label class="form-check-label" for="tipo_colaborador_embajador">
            Colaborador/Embajador
          </label>
        </div>
        <div class="form-check" style="margin: 0% 2%">
          <input class="form-check-input" type="radio" name="tipo_colaborador" id="tipo_colaborador_mentor" value="3" required>
          <label class="form-check-label" for="tipo_colaborador_mentor">
            Colaborador/Mentor
          </label>
        </div>
        <div class="form-check" style="margin: 0% 2%">
          <input class="form-check-input" type="radio" name="tipo_colaborador" id="tipo_colaborador_instituto" value="4" required>
          <label class="form-check-label" for="tipo_colaborador_instituto">
            Colaborador/Instituto
          </label>
        </div>
        <button type="submit" class="btn btn-success">Crear Colaborador</button>
      </div>
    </form>
  </td>
</tr>`;
tbody.innerHTML += rowHtml;