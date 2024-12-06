@extends('layouts.base')
@section('contenido')

<style>
/* General */
body {
  font-family: 'Poppins', sans-serif;
  background: linear-gradient(120deg, #f6d365, #fda085);
  margin: 0;
  padding: 0;
  color: #333;
}

/* Bloque Inicial */
.bloque-inicial {
  text-align: center;
  padding: 60px 20px;
  background-color: rgba(255, 255, 255, 0.85);
  border-radius: 20px;
  margin: 30px auto;
  width: 80%;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}

#titulo {
  font-size: 3.5rem;
  color: #ff6347;
  text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.2);
}

/* Contenedor de Ejemplo */
.ejemplo {
  background-color: rgba(255, 255, 255, 0.9);
  padding: 40px;
  margin: 30px auto;
  width: 70%;
  border-radius: 15px;
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
  text-align: center;
}

.ejemplo h1 {
  font-size: 2.5rem;
  color: #4caf50;
  margin-bottom: 20px;
}

.datos p {
  font-size: 1.5rem;
  color: #444;
  margin: 10px 0;
}

.label {
  font-weight: bold;
  color: #333;
}

/* Checkbox y etiqueta */
.checkbox-container {
  margin-top: 20px;
}

input[type="checkbox"] {
  transform: scale(1.4);
  margin-left: 10px;
  accent-color: #4caf50;
}

/* Hover y transiciones */
h1, p, input {
  transition: transform 0.3s ease, color 0.3s ease;
}

h1:hover {
  color: #ff6347;
  transform: scale(1.05);
}

p:hover {
  color: #4caf50;
}

input:hover {
  transform: scale(1.6);
}

/* Media Query para dispositivos pequeños */
@media (max-width: 768px) {
  .bloque-inicial, .ejemplo {
    width: 90%;
  }

  #titulo {
    font-size: 2.5rem;
  }

  .ejemplo h1 {
    font-size: 2rem;
  }
}
</style>

<div class="bloque-inicial">
  <h1 id="titulo">Los mejores pasteles en Chiapas</h1>
</div>

<script type="module" src="js/firestore.js"></script>

<div class="ejemplo">
  <h1>Ejemplo de Firestore</h1>
  <div class="datos">
    <p><span class="label" id="nombre">Nombre:</span></p>
    <p><span class="label" id="edad">Edad:</span> </p>
  </div>
  
  <div class="checkbox-container">
    <label for="cartilla">Cartilla activa:</label>
    <input id="cartilla" type="checkbox" name="cartilla" checked onChange="actualiza()">
  </div>
</div>

@endsection
