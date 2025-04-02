function mostrarRegistro() {
    document.getElementById('formulario-registro').style.display = 'block';
}

function ocultarRegistro() {
    document.getElementById('formulario-registro').style.display = 'none';
}

function verCarrito() {
    alert("Carrito en desarrollo...");
}
let cartCount = 0;

function agregarAlCarrito() {
    cartCount++;  
    document.getElementById("cart-count").innerText = cartCount;
    localStorage.setItem("cartCount", cartCount); // Guardar el número en localStorage

    // Redirigir a la página de pago después de agregar al carrito
    window.location.href = "checkout.html";
}
function vaciarCarrito() {
    cartCount = 0; // Reinicia la variable
    document.getElementById("cart-count").innerText = cartCount; // Actualiza la vista
    localStorage.setItem("cartCount", cartCount); // Guarda en localStorage
}

// Cargar el número guardado en localStorage al recargar la página
document.addEventListener("DOMContentLoaded", () => {
    const savedCartCount = localStorage.getItem("cartCount");
    if (savedCartCount) {
        cartCount = parseInt(savedCartCount);
        document.getElementById("cart-count").innerText = cartCount;
    }
    function vaciarCarrito() {
        cartCount = 0; // Reinicia la variable
        document.getElementById("cart-count").innerText = cartCount; // Actualiza la vista
        localStorage.setItem("cartCount", cartCount); // Guarda en localStorage
    }
    function finalizarCompra() {
        alert("Compra realizada con éxito");
        localStorage.removeItem("cartCount"); // Borra la cantidad de productos
        document.getElementById("cart-count").innerText = 0; // Actualiza la vista
        window.location.href = "index.html"; // Redirige a la página principal
    }
    
    
});