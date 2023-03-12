import * as ReactDOM from "react-dom/client"


require('./bootstrap');
import App from './components/app'

import 'sweetalert2/src/sweetalert2.scss'
//importar sweet alert dialog en las vistas eliminar/confirmar
 window.Swal = require('sweetalert2')
 const appReact = document.getElementById('reactapp');
 const root = ReactDOM.createRoot(appReact);

 root.render(<App />);