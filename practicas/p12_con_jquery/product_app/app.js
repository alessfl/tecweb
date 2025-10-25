// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
  "precio": 0.0,
  "unidades": 1,
  "modelo": "XX-000",
  "marca": "NA",
  "detalles": "NA",
  "imagen": "img/default.png"
};

// Función que se ejecuta al cargar la página
function init() {
  // Convierte el JSON base a texto y lo muestra en el textarea
  var JsonString = JSON.stringify(baseJSON, null, 2);
  document.getElementById("description").value = JsonString;
}

// Espera a que el documento esté completamente cargado
$(document).ready(function () {
  init(); // carga el JSON base en el textarea
  listarProductos(); // muestra todos los productos al inicio

  // ============================================
  // BÚSQUEDA DE PRODUCTOS (al teclear)
  // ============================================
  $('#search').on('keyup', function () {
    let search = $(this).val();

    if (search.length > 0) {
      $.get('./backend/product-search.php', { search: search }, function (response) {
        let productos = JSON.parse(response);

        mostrarProductos(productos);

        // Mostrar nombres en la barra de estado
        let nombres = '';
        productos.forEach(p => {
          nombres += `<li>${p.nombre}</li>`;
        });
        $('#product-result').removeClass('d-none').addClass('d-block');
        $('#container').html(nombres);
      });
    } else {
      listarProductos();
      $('#product-result').removeClass('d-block').addClass('d-none');
    }
  });

  // ============================================
  // AGREGAR PRODUCTO
  // ============================================
  $('#product-form').on('submit', function (e) {
    e.preventDefault();

    // Obtiene el JSON desde el textarea
    var productoJsonString = $('#description').val();
    var finalJSON = JSON.parse(productoJsonString);
    finalJSON['nombre'] = $('#name').val();
    productoJsonString = JSON.stringify(finalJSON, null, 2);

    // Envía el producto al servidor usando AJAX
    $.ajax({
      url: './backend/product-add.php',
      method: 'POST',
      data: productoJsonString,
      contentType: "application/json;charset=UTF-8",
      success: function (response) {
        let respuesta = JSON.parse(response);
        let template_bar = `
          <li style="list-style: none;">status: ${respuesta.status}</li>
          <li style="list-style: none;">message: ${respuesta.message}</li>
        `;
        $('#product-result').removeClass('d-none').addClass('d-block');
        $('#container').html(template_bar);

        // Vuelve a listar todos los productos actualizados
        listarProductos();
      }
    });
  });

  // ============================================
  // ELIMINAR PRODUCTO
  // ============================================
  $(document).on('click', '.product-delete', function () {
    if (confirm("¿De verdad deseas eliminar el Producto?")) {
      let id = $(this).closest('tr').attr('productId');
      $.get('./backend/product-delete.php', { id: id }, function (response) {
        let respuesta = JSON.parse(response);
        let template_bar = `
          <li style="list-style: none;">status: ${respuesta.status}</li>
          <li style="list-style: none;">message: ${respuesta.message}</li>
        `;
        $('#product-result').removeClass('d-none').addClass('d-block');
        $('#container').html(template_bar);

        // Actualiza la lista después de eliminar
        listarProductos();
      });
    }
  });
});

// ============================================
// FUNCIÓN: Mostrar productos en la tabla
// ============================================
function mostrarProductos(productos) {
  let template = '';

  if (productos.length === 0) {
    template = `
      <tr>
        <td colspan="4" class="text-center">No se encontraron productos</td>
      </tr>
    `;
  } else {
    productos.forEach(producto => {
      let descripcion = `
        <li>precio: ${producto.precio}</li>
        <li>unidades: ${producto.unidades}</li>
        <li>modelo: ${producto.modelo}</li>
        <li>marca: ${producto.marca}</li>
        <li>detalles: ${producto.detalles}</li>
      `;
      template += `
        <tr productId="${producto.id}">
          <td>${producto.id}</td>
          <td>${producto.nombre}</td>
          <td><ul>${descripcion}</ul></td>
          <td><button class="btn btn-danger product-delete">Eliminar</button></td>
        </tr>
      `;
    });
  }

  $('#products').html(template);
}

// ============================================
// FUNCIÓN: Listar todos los productos
// ============================================
function listarProductos() {
  $.get('./backend/product-list.php', function (response) {
    let productos = JSON.parse(response);
    mostrarProductos(productos);
  });
}
