// Import the functions you need from the SDKs you need
import { initializeApp } from "https://www.gstatic.com/firebasejs/11.0.2/firebase-app.js";
import { getFirestore, doc, getDoc, onSnapshot, setDoc } from "https://www.gstatic.com/firebasejs/11.0.2/firebase-firestore.js";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyAMDnm9pU_qX6Jmaf6Ho9XWOm2sLwNidYE",
  authDomain: "awos2-4efac.firebaseapp.com",
  projectId: "awos2-4efac",
  storageBucket: "awos2-4efac.firebasestorage.app",
  messagingSenderId: "838091303181",
  appId: "1:838091303181:web:5ad0fcf83fc7cfba77e844"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
// Your web app's Firebase configuration

const firestore = getFirestore();

console.log("Conectado a firestore");

const mascotas = doc(firestore, 'mascotas/mascota1');

async function leeMascotas() {

    const snapshot = await getDoc(mascotas); // Cambiar 'invernadero' por 'mascota'
    if (snapshot.exists()) {
        const datos = snapshot.data();
        console.log('Los datos son: ' + JSON.stringify(datos));

        $('#nombre').html('nombre: ' + datos.nombre);
        $('#edad').html('edad: ' + datos.edad + ' años');
        $('#cartilla').prop('checked', datos.cartilla ? true : false);
    } else {
        console.log("No hay datos");
    }
}

function recibeCambios() {
    onSnapshot(mascotas, (docSnapshot) => { // Cambié 'invernadero' por 'mascotas'
        if (docSnapshot.exists()) {
            const datos = docSnapshot.data();
            console.log('Los datos NUEVOS son: ' + JSON.stringify(datos));

            // Actualización de los datos en el DOM
            $('#nombre').html('Nombre: ' + datos.nombre);
            $('#edad').html('Edad: ' + datos.edad + ' años');
            $('#cartilla').prop('checked', datos.cartilla ? true : false);
        } else {
            console.log("No hay datos");
        }
    });
}
function updateMascota() {
    const datos = {
      cartilla: $('#cartilla').prop('checked') // Obtener el estado del checkbox 'cartilla'
    };
  
    setDoc(mascotas, datos, { merge: true }); // Cambié 'invernadero' por 'mascotas'
  }
  
//leeMascotas();
recibeCambios(); 
window.actualiza = updateMascota;